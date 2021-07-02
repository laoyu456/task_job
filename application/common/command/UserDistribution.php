<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\command;

use app\common\model\Pay;
use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\Db;

class UserDistribution extends Command
{
    protected function configure()
    {
        $this->setName('user_distribution')
            ->setDescription('更新会员分销信息');
    }

    protected function execute(Input $input, Output $output)
    {
        $users = Db::name('user u')
            ->field('d.*')
            ->join('user_distribution d', 'd.user_id = u.id')
            ->where(['u.del' => 0])
            ->select();

        if (!$users){
            return true;
        }

        foreach ($users as $user){

            //粉丝数量
            $where1 = [
                ['first_leader', '=', $user['user_id']],
            ];
            $where2 = [
                ['second_leader', '=', $user['user_id']],
            ];
            $fans = Db::name('user')
                ->whereOr([$where1,$where2])
                ->count();

            //分销订单信息
            $distribution = Db::name('distribution_order_goods')
                ->field('sum(money) as money, count(id) as order_num')
                ->where(['user_id' => $user['user_id']])
                ->find();

            //订单信息
            $order = Db::name('order')
                ->field('sum(order_amount) as order_amount, count(id) as order_num')
                ->where([
                    'user_id' => $user['user_id'],
                    'pay_status' => Pay::ISPAID,
                    'refund_status' => 0
                ])
                ->find();


            $data = [
                'distribution_order_num' => $distribution['order_num'] ?? 0,
                'distribution_money' => $distribution['money'] ?? 0,
                'order_num' => $order['order_num'] ?? 0,
                'order_amount' => $order['order_amount'] ?? 0,
                'fans' => $fans,
                'update_time' => time(),
            ];

            //更新会员分销信息表
            Db::name('user_distribution')
                ->where('user_id', $user['user_id'])
                ->update($data);
        }
    }

}