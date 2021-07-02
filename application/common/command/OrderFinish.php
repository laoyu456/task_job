<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\command;

use app\common\logic\OrderLogLogic;
use app\common\model\Order;
use app\common\model\OrderLog;
use app\common\model\Pay;
use app\common\server\ConfigServer;
use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\Db;
use think\facade\Log;

/**
 * 确认收货
 * Class OrderFinish
 * @package app\common\command
 */
class OrderFinish extends Command
{
    protected function configure()
    {
        $this->setName('order_finish')
            ->setDescription('自动确认收货(待收货订单)');
    }

    protected function execute(Input $input, Output $output)
    {
        $now = time();
        $config = ConfigServer::get('trading', 'order_finish', 0);
        if($config == 0){
            return true;
        }

        $finish_limit = $config * 24 * 60 * 60;

        $orders = Db::name('order')
            ->where(['order_status' => Order::STATUS_WAIT_RECEIVE, 'pay_status' => Pay::ISPAID, 'del' => 0])
            ->where(Db::raw("shipping_time+$finish_limit < $now"))
            ->select();
        if (empty($orders)){
            return true;
        }

        Db::startTrans();
        try{
            foreach ($orders as $order){
                Db::name('order')
                    ->where(['id' => $order['id']])
                    ->update([
                        'order_status' => Order::STATUS_FINISH,
                        'update_time' => $now,
                        'confirm_take_time' => $now,
                    ]);

                //订单日志
                OrderLogLogic::record(
                    OrderLog::TYPE_SYSTEM,
                    OrderLog::SYSTEM_CONFIRM_ORDER,
                    $order['id'],
                    0,
                    OrderLog::SYSTEM_CONFIRM_ORDER
                );
            }
            Db::commit();
        } catch (\Exception $e){
            Log::write('订单自动确认失败,失败原因:'.$e->getMessage());
            Db::rollback();
        }
    }
}