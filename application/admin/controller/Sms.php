<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\logic\SmsLogic;
use app\common\model\SmsLog;

class Sms extends AdminBase{

    public function lists(){
        if($this->request->isAjax()){
            $list = SmsLogic::configLists();
            return $this->_success('',$list);
        }
        $status_list = SmsLog::getSendStatusDesc(true);
        $this->assign('status_list',$status_list);
        return $this->fetch();
    }

    public function logLists(){
        if($this->request->isAjax()){
            $get = $this->request->get();
            $list = SmsLogic::logLists($get);
            return $this->_success('',$list);
        }
    }

    public function config(){
        $id = $this->request->get('id');
        if($this->request->isAjax()){
            $post = $this->request->post();
            SmsLogic::setConfig($post);
            return $this->_success('设置成功');
        }
        $info = SmsLogic::getConfig($id);
        $this->assign('info',$info);
        return $this->fetch();
    }
    public function detail(){
        $id = $this->request->get('id');
        $info = SmsLogic::detail($id);
        $this->assign('info',$info);
        return $this->fetch();
    }
}