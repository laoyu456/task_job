<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\logic;

use app\common\model\NoticeSetting;
use app\common\model\SmsLog;

class SmsLogic
{
    protected $message_key = '';
    protected $mobile = '';
    protected $code = '';
    protected $sms = '';
    protected $indate = 300;//todo 验证码有效期

    public function __construct($key, $mobile, $code)
    {
        $this->message_key = NoticeSetting::SMS_SCENE[$key];
        $this->mobile = $mobile;
        $this->code = $code;
        $sms_Log = new SmsLog();
        $sms = $sms_Log
            ->where(['message_key' => $this->message_key, 'mobile' => $this->mobile, 'is_verify' => 0])
            ->order('id desc')
            ->field('id,code,send_time')
            ->find();

        $this->sms = $sms;
    }

    //检查验证码
    public function checkCode()
    {
        if (!isset($this->sms) || $this->sms->code !== $this->code) {
            return '验证码错误';
        }
        $send_time = $this->sms->getData('send_time');

        $now = time();
        if ($this->sms->code === $this->code && $send_time + $this->indate < $now) {
            return '验证码已过期';
        }
        return true;

    }

    //标记已验证
    public function cancelCode()
    {
        if (empty($this->sms)) {
            return false;
        }
        unset($this->sms->send_time);
        $this->sms->is_verify = 1;
        $this->sms->update_time = time();
        return $this->sms->save();
    }
}