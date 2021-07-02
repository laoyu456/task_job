<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: LikeShop-令狐冲
// +----------------------------------------------------------------------


namespace app\admin\http\middleware;

use app\admin\cache\RoleNoneAuthCacheUris;

class Auth
{
    /**
     * 权限控制
     * @param $request
     * @param \Closure $next
     * @return mixed|\think\response\Redirect
     */
    public function handle($request, \Closure $next)
    {

        //未登录的无需权限控制
        if (empty(session('admin_info'))) {
            return $next($request);
        }

        //如果id为1，视为系统超级管理，无需权限控制
        if (session('admin_info.id') == 1) {
            return $next($request);
        }

        //权限控制判断
        $controller_action = $request->controller() . '/' . $request->action();////当前访问
        $controller_action = strtolower($controller_action);
        $auth_cache = new RoleNoneAuthCacheUris(session('admin_info.role_id'), ['role_id' => session('admin_info.role_id')]);
        $none_auth = $auth_cache->set(3600);
        if (empty($none_auth) || !in_array($controller_action, $none_auth)) {
            //通过权限控制
            return $next($request);
        }
        return redirect('dispatch/dispatch_error',['msg' => '权限不足，无法访问']);
    }
}