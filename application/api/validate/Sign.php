<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\validate;
use think\Db;
use think\Validate;

class Sign extends Validate{
    protected $rule = [
        'user_id'       => 'checkSign',
    ];

    public function checkSign($value,$data,$rule){
        $today = Db::name('user_sign')
            ->where('del',0)
            ->where('user_id',$value)
            ->whereTime('sign_time', 'today')
            ->find();
        if($today){
            return '您今天已签到过了';
        }
       
        return true;
    }
}