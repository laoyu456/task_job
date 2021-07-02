<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu-张无忌
// +----------------------------------------------------------------------
namespace app\common\model;


use think\Model;

class Footprint extends Model
{
    const enter_mall = 1;
    const browse_goods = 2;
    const add_cart = 3;
    const receive_coupon = 4;
    const place_order = 5;

    public static function getText($value)
    {
        $name  = '';
        switch ($value) {
            case self::enter_mall:
                $name = '访问商城';
                break;
            case self::browse_goods:
                $name = '浏览商品';
                break;
            case self::add_cart:
                $name = '加入购物车';
                break;
            case self::receive_coupon:
                $name = '领取优惠券';
                break;
            case self::place_order:
                $name = '下单结算';
                break;
        }
        return $name;
    }
}