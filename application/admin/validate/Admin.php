<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\validate;

use think\captcha\Captcha;
use think\Db;
use think\facade\Cache;
use think\Validate;

class Admin extends Validate
{

    protected $rule = [
        'account' => 'require|unique:admin|length:1,32',
        'password' => 'require|length:6,32｜confirm:re_password|edit',
        're_password' => 'confirm:password',
        'name' => 'require|length:1,16',
        'role_id' => 'require',
        'disable' => 'require|in:0,1',
    ];

    protected $message = [
        'account.require' => '账号不能为空',
        'account.unique' => '账号名已存在，请使用其他账号名',
        'account.length' => '账号名的长度为1到32位之间',
        'password.require' => '密码不能为空',
        'password.length' => '密码长度必须为6到16位之间',
        'password.confirm' => '两次密码输入不一致',
        're_password.confirm' => '两次密码输入不一致',
        'name.require' => '名称不能为空',
        'name.length' => '账号名的长度为1到32位之间',
        'role_id.require' => '请选择角色',
        'disable.require' => '状态错误',
        'disable.in' => '状态错误',
    ];


    /**
     * 添加
     */
    public function sceneAdd()
    {
        $this->remove('password',['edit']);
    }

    /**
     * 编辑
     */
    public function sceneEdit()
    {
        $this->remove('password', ['require', 'password']);

    }

    /**
     * 编辑的时候自定义验证方法
     * @param $password
     * @param $other
     * @param $data
     * @return bool|mixed
     */
    protected function edit($password, $other, $data)
    {
        //不填写验证
        if (empty($password) && empty($data['re_password'])) {
            return true;
        }

        //填写的时候验证
        $password_length = strlen($password);
        if ($password_length < 6 || $password_length > 16) {
            return $this->message['password.length'];
        }
        return true;
    }

}