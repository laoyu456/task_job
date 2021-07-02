<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\logic\OaLogic;
use app\admin\logic\WeChatLogic;
use app\common\server\ConfigServer;

class Oa extends AdminBase {
    /**
     * note 设置公众号
     * create_time 2020/12/11 11:28
     */
    public function setOa(){
        if($this->request->isAjax()){
            $post = $this->request->post();
            OaLogic::setOa($post);
            $this->_success('设置成功');
        }
        $oa = OaLogic::getOa();
        $this->assign('oa',$oa);
        return $this->fetch();
    }
    /**
     * note 微信菜单
     * create_time 2020/12/11 11:28
     */
    public function oaMenu(){
        $wechat_menu = ConfigServer::get('menu', 'wechat_menu',[]);
        $this->assign('menu',$wechat_menu);
        return $this->fetch();
    }

    /**
     * note 发布菜单
     * create_time 2020/12/11 11:28
     */
    public function pulishMenu(){
        $menu = $this->request->post('button');
        if(empty($menu)){
            $this->_error('请设置菜单');
        }
        $result = OaLogic::pulishMenu($menu);
        if($result['code'] == 1){
            $this->_success($result['msg']);
        }
        $this->_error($result['msg']);

    }

}