<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\controller;
use app\api\logic\SmsLogic;
class Sms extends ApiBase{

    public $like_not_need_login = ['send'];

    /**
     * showdoc
     * @catalog 接口/短信
     * @title 发送短信
     * @description 发送短信
     * @method post
     * @url /sms/send
     * @return {"code":1,"msg":"发送成功","data":[],"show":0,"time":"0.612711","debug":{"request":{"get":[],"post":{"mobile":"13172565144","key":"ZCYZ"},"header":{"content-length":"278","content-type":"multipart\/form-data; boundary=--------------------------990456238154467810004652","connection":"keep-alive","accept-encoding":"gzip, deflate, br","host":"www.likeb2b2c.com:20002","postman-token":"d517ed7f-5a49-46e2-b975-8828e0475501","cache-control":"no-cache","accept":"*\/*","user-agent":"PostmanRuntime\/7.26.3"}}}}
     * @return_param id int 订单id
     * @param mobile 必填 int 手机号码
     * @param key 必填 int 事件：ZCYZ-注册验证；ZHMM-找回密码;YZMDL-验证码登录; BGSJHM-更换手机号;BDSJHM-绑定手机号码
     * @remark 这里是备注信息
     * @number 0
     */
    public function send(){
        $mobile = $this->request->post('mobile');
        $key = $this->request->post('key','ZCYZ');
        $result = $this->validate(['mobile'=>$mobile,'key'=>$key],'app\api\validate\SmsSend');
        if($result !== true){
            $this->_error($result);
        }
        $send_result = SmsLogic::send($mobile,$key, $this->user_id);
        if($send_result !== true){
            $this->_error($send_result);
        }
        $this->_success('发送成功');
    }
}