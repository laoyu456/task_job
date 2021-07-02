<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\validate;

use think\Db;
use think\Validate;
use app\common\logic\SmsLogic;

class Register extends Validate
{
    protected $regex = ['password' => '^(?=.*[a-zA-Z0-9].*)(?=.*[a-zA-Z\\W].*)(?=.*[0-9\\W].*).{6,20}$'];
    protected $rule = [
        'mobile' => 'require|mobile|checkMobile',
        'password' => 'require|confirm:password|regex:password',
        'code' => 'requireIf:check_code,1|checkCode',
    ];

    protected $message = [
        'mobile.require'    => '请输入手机号',
        'password.require'  => '请输入密码',
        'password.regex'    => '密码格式错误',
        'code.requireIf'    => '请输入验证码',
        'mobile.mobile'     => '非有效手机号码'
    ];

    public function checkCode($value, $rule, $data)
    {
        $sms_logic = new SmsLogic('ZCYZ', $data['mobile'], $value);
        $check = $sms_logic->checkCode();
        //检查验证码是否正确
        if ($check !== true) {
            return $check;
        }
        //标记验证码已验证
        $sms_logic->cancelCode();
        return true;
    }


    public function sceneCode()
    {
        $this->only(['mobile', 'code']);
    }


    public function sceneAdd()
    {
        $this->only(['mobile', 'password']);
    }


    public function sceneForget()
    {

    }


    public function checkMobile($value, $data, $rule)
    {
        //检查手机号是否已存在
        $user = Db::name('user')
            ->where('mobile', '=', $value)
            ->find();

        if ($user) {
            return '此手机号已被使用';
        }

        return true;
    }

}