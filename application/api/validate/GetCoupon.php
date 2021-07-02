<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\validate;
use think\Db;
use think\Validate;

class GetCoupon extends Validate{
    protected $rule = [
        'id'            => 'require|checkCoupon',
    ];
    protected $message = [
        'id.require'    => '请选择优惠券',
    ];
    public function checkCoupon($value,$rule,$data){

        $coupon = Db::name('coupon')->where(['id'=>$value,'status'=>1,'del'=>0,'get_type'=>1])->find();
        if(!$coupon){
            return '优惠券已下架';
        }
        $now = time();
        if($coupon['send_time_start'] > $now || $coupon['send_time_end'] < $now){
            return '未到领取时间';
        }

        //限量发放，验证是否达到数量
        if($coupon['send_total_type'] == 2){
            $total_coupon = Db::name('coupon_list')->where(['coupon_id'=>$value,'del'=>0])->count();
            if($total_coupon >= $coupon['send_total']){
                return '优惠券已领完';
            }
        }
        //限制每人领取次数
        if($coupon['get_num_type'] == 2){

            $total_coupon = Db::name('coupon_list')->where(['user_id'=>$data['user_id'],'coupon_id'=>$value,'del'=>0])->count();
            if($total_coupon >= $coupon['get_num']) {
                return '您已达到领取次数了';
            }

        }
        if($coupon['get_num_type'] == 3){
            $today = date("Y-m-d");
            $tomorrow = date("Y-m-d",strtotime("+1 day"));
            $total_coupon = Db::name('coupon_list')->where(['user_id'=>$data['user_id'],'coupon_id'=>$value,'del'=>0])
                ->whereTime('create_time', 'between',[$today,$tomorrow])
                ->count();

            if($total_coupon >= $coupon['get_num']) {
                return '您已达到领取次数了';
            }
        }

        return true;

    }
}