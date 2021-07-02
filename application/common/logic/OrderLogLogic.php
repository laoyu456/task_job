<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\logic;

use app\common\model\OrderLog;

/**
 * 订单记录日志
 * Class OrderLogLogic
 * @package app\common\logic
 */
class OrderLogLogic
{
    public static function record($type, $channel, $order_id, $handle_id, $content, $desc = '')
    {
        if (empty($content)) {
            return true;
        }
        $log = new OrderLog();
        $log->type = $type;
        $log->order_id = $order_id;
        $log->channel = $channel;
        $log->handle_id = $handle_id;
        $log->content = OrderLog::getLogDesc($content);
        $log->create_time = time();

        if ($desc != '') {
            $log->content = OrderLog::getLogDesc($content) . '(' . $desc . ')';
        }

        $log->save();
    }
}