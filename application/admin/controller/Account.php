<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: LikeShop-令狐冲
// +----------------------------------------------------------------------


namespace app\admin\controller;


use app\admin\logic\LoginLogic;
use app\admin\validate\Login;
use think\facade\Url;

class Account extends AdminBase
{

    public $like_not_need_login = ['login'];

    /**
     * 登录
     * @return mixed
     */
    public function login()
    {
        if ($this->request->isAjax()) {
            $post = input('post.');
            $result = $this->validate($post, 'app\admin\validate\Login');
            if ($result === true) {
                LoginLogic::login($post);
                $this->_success('登录成功');
            }
            $this->_error($result);
        }
        $this->assign('account', cookie('account'));

        //首页配置
        $this->assign('config', LoginLogic::config());
        return $this->fetch();
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        LoginLogic::logout(session('admin_info.id'));
        $url = Url::build('account/login');
        $this->redirect($url);
    }
}