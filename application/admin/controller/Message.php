<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\logic\MessageLogic;

class Message extends AdminBase{

    public function config(){
        $config = MessageLogic::config();
        $this->assign('config',$config);
        return $this->fetch();
    }

    public function set(){
        $id = $this->request->get('id',1);
        if($this->request->isAjax()){
            $post = $this->request->post();
            MessageLogic::setConfig($post);
            $this->_success('设置成功');


        }
        $info = MessageLogic::getMessage($id);
        $this->assign('info',$info);
        return $this->fetch();
    }
}