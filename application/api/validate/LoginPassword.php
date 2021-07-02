<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\validate;


use app\common\logic\SmsLogic;
use think\Validate;

class LoginPassword extends Validate
{
    protected $regex = [ 'password' => '^(?=.*[a-zA-Z0-9].*)(?=.*[a-zA-Z\\W].*)(?=.*[0-9\\W].*).{6,20}$'];
    protected $rule = [
        'mobile'=>'require|mobile',
        'password'=>'require|confirm:password|regex:password',
        'repassword'=>'require|confirm:password',
        'code'=>'require|checkCode',
    ];

    protected $message = [
        'mobile.require'=>'请输入手机号',
        'password.require'=>'请输入密码',
        'password.regex'=>'密码格式错误',
        'repassword.require'=>'请再次输入密码',
        'repassword.confirm'=>'两次密码输入不一致',
        'code.require'=>'请输入验证码',
        'mobile.mobile'=>'非有效手机号码'
    ];

    public static function checkCode($value,$rule,$data){
        $sms_logic = new SmsLogic($data['message_key'],$data['mobile'],$value);
        $check = $sms_logic->checkCode();
        //检查验证码是否正确
        if($check !== true){
            return $check;
        }
        //标记验证码已验证
        $sms_logic->cancelCode();
        return true;
    }

    public function sceneCode()
    {
        $this->only(['mobile','code']);
    }


    public function sceneAdd()
    {
        $this->only(['mobile','password']);
    }


    public function sceneForget()
    {

    }

}