<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: LikeShop-令狐冲
// +----------------------------------------------------------------------

namespace app\admin\http\middleware;


use app\admin\logic\LoginLogic;
use app\admin\server\LoginServer;

class Login
{
    /**
     * 登录验证
     * @param $request
     * @param \Closure $next
     * @return mixed|\think\response\Redirect
     */
    public function handle($request, \Closure $next)
    {

        //系统拦截强制下线
        if (session('admin_info') && (LoginServer::isLogin(session('admin_info.id'))) == false) {
            LoginLogic::logout(session('admin_info.id'));
        }

        //已登录的访问登录页
        if (session('admin_info') && !$this->isNotNeedLogin($request)) {
            return $next($request);
        }

        //已登录的访问非登录页
        if (session('admin_info') && $this->isNotNeedLogin($request)) {
            return redirect('index/index');
        }

        //未登录的访问非登录页
        if (!session('admin_info') && $this->isNotNeedLogin($request)) {
            return $next($request);
        }

        //未登录访问登录页
        return redirect('account/login');
    }


    /**
     * 是否免登录验证
     * @param $request
     * @return bool
     */
    private function isNotNeedLogin($request)
    {
        $data = app()->controller($request->controller())->like_not_need_login;
        if (empty($data)) {
            return false;
        }
        $action = strtolower($request->action());
        $data = array_map('strtolower', $data);
        if (!in_array($action, $data)) {
            return false;
        }
        return true;
    }
}
