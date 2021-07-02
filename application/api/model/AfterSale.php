<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\model;

use think\Model;

class AfterSale extends Model
{
    public function orderGoods()
    {
        return $this->hasOne('order_goods','id','order_goods_id')
            ->field('id,goods_id,item_id,total_pay_price,goods_num,goods_price,goods_info,total_price');
    }
}