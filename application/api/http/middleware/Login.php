<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\http\middleware;


use app\api\cache\TokenCache;
use app\api\validate\Token as TokenValidate;

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

        //允许跨域调用
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Authorization, Sec-Fetch-Mode, DNT, X-Mx-ReqToken, Keep-Alive, User-Agent, If-Match, If-None-Match, If-Unmodified-Since, X-Requested-With, If-Modified-Since, Cache-Control, Content-Type, Accept-Language, Origin, Accept-Encoding,Access-Token,token");
        header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, post');
        header('Access-Control-Max-Age: 1728000');
        header('Access-Control-Allow-Credentials:true');
        if (strtoupper($request->method()) == "OPTIONS") {
            return response();
        }


        $token = $request->header('token');

        //无需登录
        if ($this->isNotNeedLogin($request) && empty($token)) {
            return $next($request);
        }

        //token验证
        $token_cache = new TokenCache($token, ['token' => $token]);
        //token缓存，直接通过
        if (!$token_cache->isEmpty()) {
            $request->user_info = $token_cache->get(600);
            return $next($request);
        }
        //token验证，并生成缓存
        $token_validate = new TokenValidate();
        $result = $token_validate->check(['token' => $token]);
        if ($result === true) {
            $request->user_info = $token_cache->set(600);
            return $next($request);
        }

        //无需要登录，带token的情况
        if ($this->isNotNeedLogin($request) && $token) {
            return $next($request);
        }

        //登录失败
        action('dispatch/dispatch_error', ['msg' => $token_validate->getError(), 'code' => -1]);

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
