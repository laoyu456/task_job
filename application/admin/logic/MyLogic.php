<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\logic;

use think\Db;

class MyLogic
{
    /**
     * 修改密码
     * @param $password
     * @param $admin_id
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public static function updatePassword($password, $admin_id)
    {
        $salt = Db::name('admin')
            ->where(['id' => $admin_id])
            ->value('salt');
        $password = create_password($password, $salt);

        Db::name('admin')
            ->where(['id' => $admin_id])
            ->update(['update_time' => time(), 'password' => $password]);
    }

}