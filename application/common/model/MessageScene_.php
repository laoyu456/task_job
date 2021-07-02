<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\model;

/**
 * 微信/公众号的消息模板场景
 * Class MessageScene_
 * @package app\common\model
 */
class MessageScene_
{
    const BUY_SUCCESS           = 1; //购买成功通知
    const DELIVER_GOODS_SUCCESS = 2; //商品发货通知
    const REFUND_SUCCESS        = 3; //退款成功通知

    function getName($value)
    {
        $name = '';
        switch ($value) {
            case self::BUY_SUCCESS:
                $name = '购买成功通知';
                break;
            case self::DELIVER_GOODS_SUCCESS:
                $name = '商品发货通知';
                break;
            case self::REFUND_SUCCESS:
                $name = '退款成功通知';
                break;
        }
        return $name;
    }
}