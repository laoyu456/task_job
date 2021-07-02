<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\model;

use think\Db;
use think\Model;

class Goods extends Model
{
    /**
     * User: 意象信息科技 mjf
     * Desc: 获取以规格id为键的商品信息
     * @param string $field
     * @return array
     */
    public static function getColumnGoods($field = '*')
    {
        $info = Db::name('goods_item i')
            ->join('goods g', 'g.id = i.goods_id')
            ->column($field, 'i.id');

        return $info;
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 通过规格id获取商品信息
     * @param $item_id
     * @param string $field
     * @return array|\PDOStatement|string|Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getOneByItem($item_id, $field = '*')
    {
       $info = Db::name('goods_item i')
            ->field($field)
            ->join('goods g', 'g.id = i.goods_id')
            ->where('i.id', $item_id)
            ->find();

       return $info;
    }

}