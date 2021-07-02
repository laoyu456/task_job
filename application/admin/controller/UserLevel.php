<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\logic\UserLevelLogic;
use app\admin\logic\UserLogic;

class UserLevel extends AdminBase{
   /**
    * note 会员列表
    * create_time 2020/12/15 11:45
    */
    public function lists(){
        $get = $this->request->get();
        if($this->request->isAjax()){
            $lists = UserLevelLogic::lists($get);
            $this->_success('',$lists);
        }
        return $this->fetch();
    }

    /**
     * note 添加会员
     * create_time 2020/12/15 11:45
     */
    public function add(){
        if($this->request->isAjax()){
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post,'app\admin\validate\UserLevel.add');
            if($result === true){
                $result =  UserLevelLogic::add($post);
                if($result){
                    $this->_success('添加成功','');
                }
                $result = '添加失败';
            }
            $this->_error($result);

        }
        $this->assign('privilege_list',UserLevelLogic::getPrivilegeList());
        return $this->fetch();
    }

    /**
     * note 会员编辑
     * create_time 2020/12/15 11:45
     */
    public function edit($id){
        if($this->request->isAjax()){
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post,'app\admin\validate\UserLevel');
            if($result === true){
                $result =  UserLevelLogic::edit($post);
                if($result){
                    $this->_success('添加成功','');
                }
                $result = '添加失败';
            }
            $this->_error($result);

        }
        $detail = UserLevelLogic::getUserLevel($id);
        $this->assign('privilege_list',UserLevelLogic::getPrivilegeList());
        $this->assign('detail',$detail);
        return $this->fetch();
    }

    /**
     * note 会员删除
     * create_time 2020/12/15 11:44
     */
    public function del($id){
        if($this->request->isAjax()){
            $result = $this->validate(['id'=>$id],'app\admin\validate\UserLevel.del');
            if($result === true){
                UserLevelLogic::del($id);
                $this->_success('删除成功','');
            }
            $this->_error('删除失败','');
        }
    }
}