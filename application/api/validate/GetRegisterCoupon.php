<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\validate;
use think\Db;
use think\Validate;

class GetRegisterCoupon extends Validate {
    protected $rule = [
        'coupon_ids'        => 'checkCoupon',
    ];
    protected function checkCoupon($value,$rule,$data){
        return true;

    }
}