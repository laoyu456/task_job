<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\logic;
use app\common\model\Pay;
use think\Db;
use think\helper\Time;

class RechargeLogLogic{
    public static function lists($get){
        $where = [];
        if(isset($get['keyword']) && $get['keyword']){
            $where[] = [$get['type'],'like','%'.$get['keyword'].'%'];
        }
        if(isset($get['order_source']) && $get['order_source']){
            $where[] = ['order_source','=',$get['order_source']];
        }
        if(isset($get['pay_status']) && $get['pay_status']){
            $where[] = ['pay_status','=',$get['pay_status']];
        }
        if(isset($get['pay_way']) && $get['pay_way']){
            $where[] = ['pay_way','=',$get['pay_way']];
        }
        if (isset($get['start_time']) && $get['start_time'] && isset($get['end_time']) && $get['end_time']) {
            $where[] = ['ro.create_time', 'between', [strtotime($get['start_time']), strtotime($get['end_time'])]];
        }else{
            $where[] = ['ro.create_time', 'between', Time::today()];
        }
        if(isset($get['create_end']) && $get['create_end']!=''){
            $where[] = ['ro.create_time','<=',strtotime($get['create_end'])];
        }

        $count = Db::name('recharge_order')->alias('ro')
                ->join('user u','ro.user_id = u.id')
                ->where($where)
                ->count();
        $list =  Db::name('recharge_order')->alias('ro')
                ->join('user u','ro.user_id = u.id')
                ->where($where)
                ->field('ro.id,order_sn,order_amount,give_money,give_integral,give_growth,pay_time,pay_way,pay_status,ro.create_time')
                ->page($get['page'],$get['limit'])
                ->order('ro.id desc')
                ->select();
        foreach ($list as &$order){
            $order['order_amount'] = '￥'.$order['order_amount'];
            $order['pay_way'] = Pay::getPayWay($order['pay_way']);
            $order['pay_status'] = Pay::getPayStatus($order['pay_status']);
            if($order['pay_time']){
                $order['pay_time'] = date('Y-m-d H:i:s',$order['pay_time']);
            }
            $order['create_time'] = date('Y-m-d H:i:s',$order['create_time']);
        }
        return ['count'=>$count , 'lists'=>$list];
    }
}