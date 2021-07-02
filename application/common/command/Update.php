<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\command;

use app\common\server\ConfigServer;
use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\Db;
use think\facade\Config;

class Update extends Command
{
    protected function configure()
    {
        $this->setName('update')
            ->setDescription('更新代码、同步数据以后执行');
    }

    protected function execute(Input $input, Output $output)
    {
        $lists = Db::name('order')->alias('o')
            ->field('d.id as delivery_id,d.order_id,o.delivery_id as old_delivery_id')
            ->join('delivery d', 'd.order_id = o.id')
            ->where('o.delivery_id', '=', 0)
            ->select();

        if (empty($lists)){
            return true;
        }

        $update_num = 0;
        foreach ($lists as $item){
            Db::name('order')
                ->where('id', $item['order_id'])
                ->update([
                    'delivery_id' => $item['delivery_id'],
                ]);
            $update_num += 1;
        }
        return '修改'.$update_num.'条数据';
    }

}