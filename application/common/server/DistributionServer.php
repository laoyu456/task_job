<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\common\server;


use think\Db;

class DistributionServer
{
    public static function commission($order_id)
    {
        $field = [
            'o.user_id' => 'user_id',
            'og.id' => 'order_goods_id',
            'og.goods_num' => 'goods_num',
            'og.total_pay_price' => 'total_pay_price',
            'g.first_ratio' => 'first_ratio',
            'g.second_ratio' => 'second_ratio',
            'g.three_ratio' => 'three_ratio',
            'u.first_leader' => 'first_leader',
            'u.second_leader' => 'second_leader',
            'u.third_leader' => 'third_leader',
        ];
        $goods_lists = Db::name('order_goods og')
            ->join('goods g', 'og.goods_id=g.id')
            ->join('order o', 'og.order_id=o.id')
            ->join('user u', 'o.user_id=u.id')
            ->field($field)
            ->where('o.id', $order_id)
            ->where('g.is_commission', 1)
            ->select();
        if (empty($goods_lists)) {
            //无商品需要分佣
            return;
        }

        //按商品分佣
        $time = time();
        foreach ($goods_lists as $goods) {

            //一级分佣
            if ($goods['first_ratio'] <= 0 || $goods['first_ratio'] >= 100) {
                //设置为0，不分佣
                continue;
            }
            if (empty($goods['first_leader'])) {
                //无上级，无需分佣
                continue;
            }
            $money = $goods['total_price'] * $goods['first_ratio'] / 100;
            if ($money < 0.01) {
                //金额小于0.01分佣
                continue;
            }
            self::createOrder($goods['first_leader'], $goods['order_goods_id'], $goods['goods_num'], $money, $time);

            //二级分佣
            if ($goods['second_ratio'] <= 0 || $goods['second_ratio'] >= 100) {
                //设置为0，不分佣
                continue;
            }
            $money = $goods['total_price'] * $goods['second_ratio'] / 100;
            if ($money < 0.01) {
                //金额小于0.01分佣
                continue;
            }
            if (empty($goods['second_leader'])) {
                //无上级，无需分佣
                continue;
            }
            self::createOrder($goods['second_leader'], $goods['order_goods_id'], $goods['goods_num'], $money, $time);


            //三级分佣
            if ($goods['three_ratio'] <= 0) {
                //设置为0，不分佣
                continue;
            }
            $money = $goods['total_price'] * $goods['three_ratio'] / 100;
            if ($money < 0.01) {
                //金额小于0.01分佣
                continue;
            }
            if (empty($goods['third_leader'])) {
                //无上级，无需分佣
                continue;
            }
            self::createOrder($goods['third_leader'], $goods['order_goods_id'], $goods['goods_num'], $money, $time);
        }


    }

    /**
     * 创建分佣订单
     * @param $leader_id
     * @param $source_id
     * @param $goods_num
     * @param $money
     * @param $create_time
     */
    private static function createOrder($leader_id, $source_id, $goods_num, $money, $create_time)
    {
        $data = [
            'sn' => createSn('distribution_order_goods','sn'),
            'user_id' => $leader_id,
            'order_goods_id' => $source_id,
            'goods_num' => $goods_num,
            'money' => $money,
            'status' => 1,
            'create_time' => $create_time,
        ];
        Db::name('distribution_order_goods')
            ->insert($data);
    }
}