<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\validate;

use think\Db;
use think\Validate;

class Token extends Validate
{
    protected $rule = [
        'token' => 'require|valid|user',
    ];

    /**
     * User: 意象信息科技 lr
     * Desc: token验证
     * @param $token
     * @param $other
     * @param $data
     * @return bool|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    protected function valid($token, $other, $data)
    {
        $session = Db::name('session')
            ->where(['token' => $token])
            ->find();
        if (empty($session)) {
            return '会话失效，请重新登录';
        }
        if ($session['expire_time'] <= time()) {
            return '登录超时，请重新登录';
        }
        return true;
    }

    /**
     * User: 意象信息科技 lr
     * Desc 用户验证
     * @param $token
     * @param $other
     * @param $data
     * @return string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    protected function user($token, $other, $data)
    {
        $user_id = Db::name('session')
            ->where(['token' => $token])
            ->value('user_id');

        $user_info = Db::name('user')
            ->where(['id' => $user_id, 'del' => 0])
            ->find();
        if (empty($user_info)) {
            return '用户不存在';
        }
        if ($user_info['disable'] == 1) {
            return '用户被禁用';
        }
        return true;
    }


}