<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\logic\CommonLogic;
use app\admin\logic\WechatReplyLogic;
use app\common\model\WeChat;

class WechatReply extends AdminBase{
    public function lists(){
        if($this->request->isAjax()){
            $get = $this->request->get();
            $list = WechatReplyLogic::lists($get);
            $this->_success('',$list);

        }
        $type_list= Wechat::getCustomReply();
        $this->assign('type_list',$type_list);
        return $this->fetch();
    }
    public function add(){
        if($this->request->isAjax()){
            $post = $this->request->post();
            $result = $this->validate($post,'app\admin\validate\WeChatReply.'.$post['reply_type']);

            if ($result === true){
                 WechatReplyLogic::add($post);
                $this->_success('添加超过',[]);
            }
            $this->_error($result);

        }
        $type = $this->request->get('type');
        $template = 'add_'.$type;
        return $this->fetch($template);
    }

    public function edit($id){
        if($this->request->isAjax()){
            $post = $this->request->post();
            $result = $this->validate($post,'app\admin\validate\WeChatReply.'.$post['reply_type']);

            if ($result === true){
                WechatReplyLogic::edit($post);
                $this->_success('添加超过',[]);
            }
            $this->_error($result);

        }
        $detail = WechatReplyLogic::getReply($id);
        $this->assign('detail',$detail);
        $template = 'edit_'.$detail['reply_type'];
        return $this->fetch($template);

    }
    public function del($id){
        $result = $this->validate(['id'=>$id],'app\admin\validate\WeChatReply.del');
        if ($result === true) {
            WechatReplyLogic::del($id);
            $this->_success('删除成功');
        }
        $this->_error($result);

    }

    /*
    * 修改字段
    */
    public function changeFields(){
        $pk_value = $this->request->post('id');
        $field = $this->request->post('field');
        $field_value = $this->request->post('value');
        $reply_type = $this->request->post('reply_type');
        $result = WechatReplyLogic::changeFields($pk_value, $field, $field_value,$reply_type);
        if ($result) {
            $this->_success('修改成功');
        }
        $this->_error('修改失败');
    }
}