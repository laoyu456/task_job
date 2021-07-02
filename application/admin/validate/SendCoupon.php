<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\validate;
use think\Db;
use think\Validate;
class SendCoupon extends Validate{
    protected $rule = [
        'coupon_ids'            => 'require|checkCoupon',
    ];
    protected $message = [
        'coupon_ids.require'    => '请选择优惠券',
    ];
    protected function checkCoupon($value,$rule,$data){

        $now = time();
        $where[] = ['id','in',$value];
        $where[] = ['status','=',1];
        $where[] = ['get_type','=',2];

        $coupon_list = Db::name('coupon')
                ->where($where)
                ->column('*','id');
        foreach ($value as $coupon_id){
            $coupon = $coupon_list[$coupon_id] ?? [];
            if(empty($coupon)){
                return '优惠券信息错误';
            }
            if($coupon['send_total_type'] == 2){
                $get_total_coupon = Db::name('coupon_list')
                                ->where(['id'=>$coupon_id])
                                ->count();
                $get_total_coupon = count($data['user_ids']) + $get_total_coupon;

                if($get_total_coupon > $coupon['send_total']){
                    return $coupon['name'].'的发放的总量已达到限制';
                }
            }
            return true;

        }
    }


}