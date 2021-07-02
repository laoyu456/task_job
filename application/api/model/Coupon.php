<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\model;

use think\Db;
use think\Model;

class Coupon extends Model
{
    public function couponGoods()
    {
        return $this->hasMany('couponGoods', 'coupon_id', 'id');
    }


    //通过(coupon_list)获取优惠券信息
    public static function getCouponByClId($coupon_id)
    {
        $result = Db::name('coupon c')
            ->join('coupon_list cl', 'c.id = cl.coupon_id')
            ->where(['cl.id ' => $coupon_id, 'c.del' => 0, 'cl.del' => 0, 'cl.status' => 0])
            ->field('c.*')
            ->find();

        return $result;
    }
}