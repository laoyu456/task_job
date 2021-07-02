<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\model;

use think\Model;

class AfterSale extends Model
{
    //售后状态
    const STATUS_APPLY_REFUND           = 0;//申请退款
    const STATUS_REFUSE_REFUND          = 1;//商家拒绝
    const STATUS_WAIT_RETURN_GOODS      = 2;//商品待退货
    const STATUS_WAIT_RECEIVE_GOODS     = 3;//商家待收货
    const STATUS_REFUSE_RECEIVE_GOODS   = 4;//商家拒收货
    const STATUS_WAIT_REFUND            = 5;//等待退款
    const STATUS_SUCCESS_REFUND         = 6;//退款成功

    //退款类型
    const TYPE_ONLY_REFUND      = 0;//仅退款
    const TYPE_REFUND_RETURN    = 1;//退款退货

    //售后状态描述
    public static function getStatusDesc($state)
    {
        $data = [
            self::STATUS_APPLY_REFUND           => '申请退款',
            self::STATUS_REFUSE_REFUND          => '商家拒绝',
            self::STATUS_WAIT_RETURN_GOODS      => '商品待退货',
            self::STATUS_WAIT_RECEIVE_GOODS     => '商家待收货',
            self::STATUS_REFUSE_RECEIVE_GOODS   => '商家拒收货',
            self::STATUS_WAIT_REFUND            => '等待退款',
            self::STATUS_SUCCESS_REFUND         => '退款成功',
        ];
        if ($state === true) {
            return $data;
        }
        return $data[$state] ?? '';
    }
    

    //售后类型描述
    public static function getRefundTypeDesc($type)
    {
        $data = [
            self::TYPE_ONLY_REFUND      => '仅退款',
            self::TYPE_REFUND_RETURN    => '退款退货',
        ];
        if ($type === true) {
            return $data;
        }
        return $data[$type] ?? '';
    }


    //售后原因
    public static function getReasonLists()
    {
        $data = [
            '7天无理由退换货',
            '大小尺寸与商品描述不符',
            '颜色/图案/款式不符',
            '做工粗糙/有瑕疵',
            '质量问题',
            '卖家发错货',
            '少件（含缺少配件）',
            '不喜欢/不想要',
            '快递/物流一直未送到',
            '空包裹',
            '快递/物流无跟踪记录',
            '货物破损已拒签',
            '其他',
        ];
        return $data;
    }



    public function orderGoods()
    {
        return $this->hasMany('order_goods', 'id', 'order_goods_id');
    }

    public function user()
    {
        return $this->hasOne('user', 'id', 'user_id')
            ->field('id,sn,nickname,avatar,mobile,sex,create_time');
    }

    public function order()
    {
        return $this->hasOne('order', 'id', 'order_id')
            ->field('id,order_sn,total_amount,order_amount,pay_way,order_status');
    }


    public function logs()
    {
        return $this->hasMany('after_sale_log', 'after_sale_id', 'id')->order('id desc');
    }
}