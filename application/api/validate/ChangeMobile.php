<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\validate;

use app\common\logic\SmsLogic;
use app\common\model\Client_;
use think\Db;
use think\Validate;

class ChangeMobile extends Validate
{
    protected $rule = [
        'client'        => 'require|in:'. Client_::oa . ',' . Client_::ios . ',' . Client_::android. ',' .Client_::pc. ','. Client_::h5,
        'mobile'        => 'require|mobile',
        'new_mobile'    => 'require|mobile|checkMobile',
    ];

    protected $message = [
        'mobile.require'        => '参数缺失',
        'mobile.mobile'         => '请填写正确的手机号',
        'new_mobile.mobile'     => '请填写正确的手机号',
        'new_mobile.require'    => '请填写手机号',
        'client.require'        => '参数缺失',
        'client.in'             => '信息错误',
    ];


//    public function sceneChange()
//    {
//        $this->only(['client', 'mobile', 'new_mobile']);
//    }
    public function sceneBinding(){
        $this->only(['client','new_mobile']);
    }


    protected function checkMobile($value, $rule, $data)
    {
        //检查新手机号是否已存在
        $user = Db::name('user')
            ->where([
                ['mobile', '=', $value],
                ['id', '<>', $data['user_id']]
            ])
            ->find();

        if ($user) {
            return '此手机号已被使用';
        }

        //非小程序端,更换手机号需要手机验证码
//        if ($data['client'] == Client_::mnp) {
//            return true;
//        }

        if (!isset($data['code'])) {
            return '请填写验证码';
        }

        $mobile = $data['new_mobile'];
        if(isset($data['action']) && 'change' == $data['action']){
            $mobile = $data['mobile'];
        }
       
        $sms_logic = new SmsLogic($data['message_key'],$mobile, $data['code']);
        $check = $sms_logic->checkCode();

        //检查验证码是否正确
        if ($check !== true) {
            return $check;
        }

        //标记验证码已验证
        $sms_logic->cancelCode();
        return true;



    }
}