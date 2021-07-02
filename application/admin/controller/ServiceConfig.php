<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\logic\ServiceConfigLogic;

class ServiceConfig extends AdminBase{
    public function config(){
        if($this->request->isAjax()){
            $post = $this->request->post();
            ServiceConfigLogic::setConfig($post);
            return $this->_success('设置成功',[]);
        }
        $this->assign('config',ServiceConfigLogic::getConfig());
        return $this->fetch();
    }
}