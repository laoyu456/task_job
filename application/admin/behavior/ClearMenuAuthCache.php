<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: LikeShop-令狐冲
// +----------------------------------------------------------------------


namespace app\admin\behavior;


use app\admin\cache\RoleMenuCache;
use app\admin\cache\RoleNoneAuthCacheUris;

class ClearMenuAuthCache
{

    /**
     * 清除菜单权限缓存
     */
    public function run()
    {
        (new RoleMenuCache())->delAll();
        (new RoleNoneAuthCacheUris())->delAll();
    }
}