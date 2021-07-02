<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\index\controller;

use app\common\server\ConfigServer;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $template = app()->getRootPath() . 'public/pc/index.html';
        if (is_mobile()) {
            $template = app()->getRootPath() . 'public/mobile/index.html';
        }
        if (file_exists($template)) {
            return view($template);
        }
        return '';
    }


    public function app()
    {

        if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')) {
            $url = ConfigServer::get('app', 'line_ios', '');
        } else {
            $url = ConfigServer::get('app', 'line_android', '');
        }

        if (empty($url)) {
            echo '未设置app下载链接';
            exit;
        }
        if (!preg_match("/^http(s)?:\\/\\/.+/", $url)) {
            $url = "http://".$url;
        }

        $this->redirect($url);
    }
}
