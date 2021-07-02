<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\logic;

use app\common\model\Client_;
use app\common\logic\LogicBase;
use think\Db;
use think\facade\Config;

class LoginPasswordLogic extends LogicBase
{

    // 手机+密码登录
    public static function check($post)
    {

        $client = Client_::mnp;
        if (isset($post['client']) && $post['client'] == 1) {
            $client = Client_::mnp;
        } elseif (isset($post['client']) && $post['client'] == 2) {
            $client = Client_::oa;
        } elseif (isset($post['client']) && $post['client'] == 3) {
            $client = Client_::ios;
        } elseif (isset($post['client']) && $post['client'] == 4) {
            $client = Client_::android;
        }

        $account = db::name('user')
            ->where(['mobile' => $post['mobile'], 'del' => 0])
            ->find();
        $salt = $account['salt'];
        $password = create_password($post['password'], $salt);//生成密码
        if ($password == $account['password'] && $account) {
            //创建会话
            $user_info['token'] = LoginLogic::createSession($account['id'], $client);
            return self::dataSuccess('登录成功', $user_info);
        } elseif (!$account) {
            return self::dataError('账号不存在');
        } elseif ($password != $account['password']) {
            return self::dataError('密码不正确');
        }
        return false;

    }

    //todo 手机+验证码登录
    public static function checkCode($post)
    {

        $client = Client_::mnp;
        if (isset($post['client']) && $post['client'] == 1) {
            $client = Client_::mnp;
        } elseif (isset($post['client']) && $post['client'] == 2) {
            $client = Client_::oa;
        } elseif (isset($post['client']) && $post['client'] == 3) {
            $client = Client_::ios;
        } elseif (isset($post['client']) && $post['client'] == 4) {
            $client = Client_::android;
        }

        $account = db::name('user')
            ->where(['mobile' => $post['mobile'], 'del' => 0])
            ->find();
        //验证码
        if ($account) {
            $user_info['token'] = LoginLogic::createSession($account['id'], $client);
            return self::dataSuccess('登录成功', $user_info);
        } elseif (!$account) {
            return self::dataError('账号不存在');
        }
        return false;


    }


    //忘记密码
    public static function forget($post)
    {
        $client = self::getClient($post);
        $account = Db::name('user')
            ->where(['mobile' => $post['mobile'], 'del' => 0])
            ->find();

        if (!$account) {
            return self::dataError('账号不存在');
        }

        //更新密码
        $password = create_password($post['password'], $account['salt']);//生成密码
        if ($account['password'] == $password) {
            return self::dataError('密码未改动');
        }

        $data = [
            'password' => $password,
            'update_time' => time(),
        ];
        Db::name('user')
            ->where(['id' => $account['id'], 'del' => 0])
            ->update($data);

        $token = LoginLogic::createSession($account['id'], $client);
        return self::dataSuccess('修改成功', ['token' => $token]);
    }


    public static function getClient($post)
    {
        $client = $post['client'] ?? Client_::mnp;
        $client_arr = array_keys(Client_::getClient(true));
        if (in_array($client, $client_arr)) {
            return $client;
        }
        return Client_::mnp;
    }
}