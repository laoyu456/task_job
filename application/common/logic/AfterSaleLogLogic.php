<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\logic;

use app\common\model\AfterSaleLog;

/**
 * 售后记录日志
 * Class AfterSaleLogLogic
 * @package app\common\logic
 */
class AfterSaleLogLogic
{
    public static function record($type, $channel, $order_id, $after_sale_id, $handle_id, $content, $desc = '')
    {
        if (empty($content)) {
            return true;
        }
        $log = new AfterSaleLog();
        $log->type = $type;
        $log->channel = $channel;
        $log->order_id = $order_id;
        $log->after_sale_id = $after_sale_id;
        $log->handle_id = $handle_id;
        $log->content = AfterSaleLog::getLogDesc($content);
        $log->create_time = time();

        if ($desc != ''){
            $log->content = AfterSaleLog::getLogDesc($content).'('.$desc.')';
        }

        $log->save();
    }
}