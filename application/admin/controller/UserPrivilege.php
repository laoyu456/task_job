<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\logic\UserPrivilegeLogic;
class UserPrivilege extends AdminBase{
    /**
     * note 权益列表
     * create_time 2020/12/2 11:04
     */
    public function lists(){
        if($this->request->isAjax()){
            $get = $this->request->get();
            $list = UserPrivilegeLogic::lists($get);
            $this->_success('',$list);
        }
        return $this->fetch();
    }


    /**
     * note 添加权益
     * create_time 2020/12/2 11:04
     */
    public function add(){
        if($this->request->isAjax()){
            $post = $this->request->post();
            $result = $this->validate($post,'app\admin\validate\UserPrivilege.add');
            if($result === true){
                UserPrivilegeLogic::add($post);
                $this->_success('添加成功',[]);
            }
            $this->_error($result,[]);
        }
        return $this->fetch();
    }

    /**
     * note 编辑权益
     * create_time 2020/12/2 11:40
     */
    public function edit($id){
        if($this->request->isAjax()){
            $post = $this->request->post();
            $result = $this->validate($post,'app\admin\validate\UserPrivilege.edit');
            if($result === true){
                UserPrivilegeLogic::edit($post);
                $this->_success('添加成功',[]);
            }
            $this->_error($result,[]);
        }

        $this->assign('detail',UserPrivilegeLogic::getPrivilege($id));
        return $this->fetch();

    }

    /**
     * note 删除权益
     * create_time 2020/12/2 11:40
     */
    public function del($id){
        if($this->request->isAjax()){
            $result = $this->validate(['id'=>$id],'app\admin\validate\UserPrivilege.del');
            if($result === true){
                UserPrivilegeLogic::del($id);
                $this->_success('删除成功','');
            }
            $this->_error($result,'');
        }
    }
}