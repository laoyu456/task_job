<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: LikeShop-令狐冲
// +----------------------------------------------------------------------


namespace app\admin\server;


use think\Db;

class AuthServer
{

    /**
     * 获取角色没有的权限id
     * @param int $role_id
     * @return array
     */
    public static function getRoleNoneAuthIds($role_id)
    {
        if ($role_id == 0) {
            return [];
        }
        $role_auth = self::getRoleAuth($role_id);
        $all_auth = self::getAllAuth();
        return array_diff($all_auth, $role_auth);
    }

    /**
     * 获取角色没有的uri
     * @param $role_id
     */
    public static function getRoleNoneAuthUris($role_id)
    {
        $ids = self::getRoleNoneAuthIds($role_id);
        $result = Db::name('dev_auth')
            ->where('id', 'in', $ids)
            ->column('uri');
        $data = [];
        foreach ($result as $k => $v) {
            if (empty($v)) {
                continue;
            }
            $data[] = strtolower($v);
        }
        return $data;
    }

    /**
     * 获取角色权限
     * @param $role_id
     * @return array
     */
    private static function getRoleAuth($role_id)
    {
        return Db::name('role_dev_auth_index')
            ->where(['role_id' => $role_id])
            ->column('menu_auth_id');
    }

    /**
     * 获取系统所有权限
     * @return array
     */
    private static function getAllAuth()
    {
        return Db::name('dev_auth')
            ->where(['del' => 0, 'disable' => 0])
            ->column('id');
    }

    /**
     * 获取用户没有权限uri
     * @param $role_id
     * @return array
     */
    public static function getRoleNoneAuthArr($role_id)
    {
        return Db::name('dev_auth')
            ->where('id', 'in', self::getRoleNoneAuthIds($role_id))
            ->column('uri');
    }


}