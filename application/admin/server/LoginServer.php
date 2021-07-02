<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: LikeShop-令狐冲
// +----------------------------------------------------------------------


namespace app\admin\server;


use app\admin\cache\LoginStateCache;

class LoginServer
{

    public static function setState($admin_id, $login = true)
    {
        //登录标识，该标示消失，自动下线
        $login_ctrl = new LoginStateCache($admin_id);
        if ($login) {
            $login_ctrl->set();
        } else {
            $login_ctrl->del();
        }
    }

    /**
     * 判断是否登录中
     * @param $admin_id
     * @return bool
     */
    public static function isLogin($admin_id)
    {
        $login_state = new LoginStateCache($admin_id);
        return $login_state->isEmpty() ? false : true;
    }

}