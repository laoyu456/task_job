<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\validate;

use think\Db;
use think\Validate;

class Cart extends Validate
{
    protected $rule = [
        'param' => 'require',
        'cart_id' => 'require|checkCart',
        'item_id' => 'require|checkGoods',
        'goods_num' => 'require|integer|gt:0',
        'selected' => 'require|in:0,1',
    ];

    protected $message = [
        'item_id' => '请选择商品',
        'goods_num.require' => '商品数量不能为0',
        'goods_num.gt' => '商品数量需大于0',
        'goods_num.integer' => '商品数量需为整数',
        'cart_id.require' => '参数错误',
        'param.require' => '参数错误',
        'selected.require' => '参数错误',
        'selected.in' => '参数错误',
    ];

    protected function sceneAdd()
    {
        $this->only(['item_id', 'goods_num']);
    }

    protected function sceneDel()
    {
        $this->only(['cart_id']);
    }

    protected function sceneSelected()
    {
        $this->only(['cart_id', 'selected']);
    }

    protected function sceneChange()
    {
        $this->only(['cart_id', 'goods_num']);
    }


    protected function checkCart($value, $rule, $data)
    {
        $cart = Db::name('cart')->where(['id' => $value])->find();
        if (!$cart){
            return '购物车不存在';
        }
        return true;
    }


    protected function checkGoods($value, $rule, $data)
    {
        $goods = Db::name('goods g')
            ->field('g.status')
            ->join('goods_item i', 'i.goods_id = g.id')
            ->where(['i.id' => $value, 'g.del' => 0])
            ->find();

        if (!$goods || $goods['status'] == 0) {
            return '商品已下架';
        }
        return true;
    }

}