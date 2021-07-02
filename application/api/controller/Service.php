<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\controller;
use app\api\logic\ServiceLogic;

class Service extends ApiBase {
    public $like_not_need_login = ['lists'];
    public function lists(){
        $list = ServiceLogic::getConfig();
        $this->_success('获取成功',$list);
    }
}