<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\controller;

use app\api\logic\LoginPasswordLogic;


class LoginPassword extends ApiBase
{

    public $like_not_need_login = ['check', 'checkcode', 'forget'];

    /**
     * showdoc
     * @catalog 接口/登录注册
     * @title 密码登录
     * @description 密码登录
     * @method post
     * @url /login_password/check
     * @param mobile 必填 int 手机号
     * @param password 必填 varchar 密码
     * @param client 选填 int 不填默认1小程序-2h5-3ios-4安卓
     * @return_param token varchar token
     * @remark
     * @number 1
     * @return {"code":1,"msg":"登录成功","data":{"token":"d2800867ac869c52a7a017b89209907d"},"show":0,"time":"0.125048","debug":{"request":{"get":[],"post":{"mobile":"13711515723","password":"123456czw"},"header":{"content-length":"288","content-type":"multipart\/form-data; boundary=--------------------------249270077524121393881040","connection":"keep-alive","accept-encoding":"gzip, deflate, br","host":"www.likeb2b2c.com:20002","postman-token":"883b6917-66c2-4995-a882-fbc5625bad33","accept":"*\/*","user-agent":"PostmanRuntime\/7.26.2","token":"ff0c66fe0c89fe1e9be591d82d551521"}}}}
     */
    public function check()
    {
        $post = $this->request->post();
        $result = $this->validate($post, 'app\api\validate\LoginPassword.add');
        if ($result === true) {
            $check = LoginPasswordLogic::check($post);
            if ($check) {

                $this->_error($check['msg'], $check['data'], $check['code']);
            }
            $this->_error('获取失败', $result, 0);
        }
        $this->_error($result, '', 0);
    }

    /**
     * showdoc
     * @catalog 接口/登录注册
     * @title 验证码登录
     * @description 验证码登录
     * @method post
     * @url /login_password/checkCode
     * @param mobile 必填 int 手机号
     * @param code 必填 varchar 验证码
     * @param client 选填 int 不填默认1小程序-2h5-3ios-4安卓
     * @return_param token varchar token
     * @remark
     * @number 1
     * @return {"code":1,"msg":"登录成功","data":{"token":"c108d186a4e62bc3ac6004074930d43b"},"show":0,"time":"0.136925","debug":{"request":{"get":[],"post":{"mobile":"13711515723","code":"8888"},"header":{"content-length":"279","content-type":"multipart\/form-data; boundary=--------------------------405368968101365594543781","connection":"keep-alive","accept-encoding":"gzip, deflate, br","host":"www.likeb2b2c.com:20002","postman-token":"cd4c0d70-e3b5-4576-9f8d-58bbdb6f0e5f","accept":"*\/*","user-agent":"PostmanRuntime\/7.26.2","token":"ff0c66fe0c89fe1e9be591d82d551521"}}}}
     */
    public function checkCode()
    {
        $post = $this->request->post();
        $post['message_key'] = 'YZMDL';
        $result = $this->validate($post, 'app\api\validate\LoginPassword.code');
        if ($result === true) {
            $check = LoginPasswordLogic::checkCode($post);
            if ($check) {

                $this->_error($check['msg'], $check['data'], $check['code']);
            }
            $this->_error('获取失败', $result, 0);
        }
        $this->_error($result, '', 0);
    }


    //忘记密码
    public function forget()
    {
        $post = $this->request->post();
        $post['message_key'] = 'ZHMM';
        $result = $this->validate($post, 'app\api\validate\LoginPassword');
        if ($result === true) {
            return LoginPasswordLogic::forget($post);
        }
        $this->_error($result);
    }
}