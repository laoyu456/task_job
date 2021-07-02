<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\command;

use app\common\logic\OrderRefundLogic;
use app\common\model\Order;
use app\common\model\OrderLog;
use app\common\model\Pay;
use app\common\model\Team;
use app\common\model\TeamFollow;
use app\common\model\TeamFound;
use app\common\server\ConfigServer;
use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\Db;
use think\Exception;


class TeamEnd extends Command
{
    protected function configure()
    {
        $this->setName('team_end')
            ->setDescription('结束已超时的拼团');
    }

    protected function execute(Input $input, Output $output)
    {
        $now = time();

        //关闭活动
        $activity = Db::name('team_activity')
            ->where('end_time', '<=', $now)
            ->select();
        //更新商品is_team
        $team_ids = array_column($activity,'team_id');

        Db::name('goods g')
            ->join('team_goods_item i', 'i.goods_id = g.id')
            ->where('i.team_id', 'in', $team_ids)
            ->update(['is_team' => 0]);

        Db::name('team_activity')
            ->where('team_id', 'in', $team_ids)
            ->update(['status' => 0]);


        $map1 = [
            ['found_end_time', '<=', $now],
            ['status', '=', 0]
        ];

        $map2 = [
            ['team_id', 'in', $team_ids],
            ['status', '=', 0]
        ];
        //已过团结束时间,但未成团
        $lists = Db::name('team_found')
            ->field('id')
            ->whereOr([ $map1, $map2 ])
            ->select();

        if (empty($lists)){
            return true;
        }

        //需要退款的团id
        $refound_found_ids = [];

        //系统自动成团: 0-关闭; 1-开启
        $setting = ConfigServer::get('team', 'automatic', 0);

        //更新拼团状态
        foreach ($lists as $item){
            $found = TeamFound::get($item['id']);
            if ($found['join'] == $found['need'] || $setting == 1){
                //人数凑齐,拼团成功 或者 系统自动成团
                $team_status = Team::STATUS_SUCCESS;
            } else {
                //人数不齐,拼团失败
                $team_status = Team::STATUS_ERROR;
                $refound_found_ids[] = $item['id'];
            }
            $found->status = $team_status;
            $found->team_end_time = time();
            $found->save();

            TeamFollow::where(['found_id' => $item['id']])
                ->update(['status' => $team_status, 'team_end_time' => time()]);
        }

        if (empty($refound_found_ids)){
            return true;
        }

        //失败的订单才退款
        $orders = Db::name('order')
            ->where(['team_found_id' => $refound_found_ids, 'del' => 0])
            ->select();

        foreach ($orders as $order){
            Db::startTrans();
            try{
                if ($order['order_status'] == Order::STATUS_CLOSE){
                    continue;
                }
                if ($order['pay_status'] == Pay::REFUNDED || $order['pay_status'] == Pay::UNPAID){
                    continue;
                }

                //取消订单
                OrderRefundLogic::cancelOrder($order['id'], OrderLog::TYPE_SYSTEM);
                //更新订单状态
                OrderRefundLogic::cancelOrderRefundUpdate($order);
                //订单退款
                OrderRefundLogic::refund($order, $order['order_amount'], $order['order_amount']);

                Db::commit();

            } catch (Exception $e) {
                Db::rollback();
                //错误记录
                OrderRefundLogic::addErrorRefund($order, $e->getMessage());
            }  catch ( \EasyWeChat\Kernel\Exceptions\Exception $we_e){
                Db::rollback();
                //错误记录
                OrderRefundLogic::addErrorRefund($order, $we_e->getMessage());
            } catch (\Exception $e2){
                Db::rollback();
                //错误记录
                OrderRefundLogic::addErrorRefund($order, $e2->getMessage());
            }
        }
    }
}