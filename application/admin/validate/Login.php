<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\validate;

use think\Db;
use think\facade\Cache;
use think\Validate;

class Login extends Validate
{
    protected $rule = [
        'code' => 'require|captcha',
        'account' => 'require',
        'password' => 'require|password',
    ];

    protected $message = [
        'code.require' => '验证码不能为空',
        'code.captcha' => '验证码错误',
        'account.require' => '账号不能为空',
        'password.require' => '密码不能为空',
        'password.password' => '账号密码错误',
    ];

    /**
     * 账号密码验证码
     * @param $password
     * @param $other
     * @param $data
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    protected function password($password, $other, $data)
    {
        if ($this->safe() === false) {
            $this->message['password.password'] .= ':多次输入错误';
            return false;
        }
        $admin_info = Db::name('admin')
            ->where(['account' => $data['account'], 'del' => 0])
            ->find();
        if (empty($admin_info)) {
            $this->safe(true);
            return false;
        }
        if ($admin_info['disable']) {
            return '账号被禁用';
        }
        $password = create_password($password, $admin_info['salt']);
        if ($password != $admin_info['password']) {
            $this->safe(true);
            return false;
        }
        return true;
    }

    /**
     * 连续30分钟内15次输错密码，无法登录
     * @param bool $add
     * @return bool
     */
    protected function safe($add = false)
    {
        $cache_name = 'admin_login_error_count' . request()->ip();
        if ($add) {
            $admin_login_error_count = Cache::get($cache_name);
            $admin_login_error_count++;
            Cache::tag('admin_login_error_count')->set($cache_name, $admin_login_error_count, 1800);
        }
        $count = Cache::get($cache_name);
        if (!empty($count) && $count >= 15) {
            return false;
        }
        return true;
    }

}