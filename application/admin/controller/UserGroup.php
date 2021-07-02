<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\admin\controller;


use app\admin\logic\UserGroupLogic;

class UserGroup extends AdminBase
{

    /**
     * 用户分组列表
     * @return mixed
     */
    public function lists(){

        if ($this->request->isAjax()) {
            $get = $this->request->get(); //获取get请求
            $this->_success('', UserGroupLogic::lists($get)); //逻辑层处理渲染数据
        }
        return $this->fetch();  //渲染
    }

    /**
     * 添加
     * @return mixed
     */
    public function add()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\UserGroup.add');
            if ($result === true) {
                UserGroupLogic::addUserGroup($post);
                $this->_success('添加成功');
            }
            $this->_error($result);
        }

        return $this->fetch();
    }


    /**
     * 编辑
     * @param string $id
     * @return mixed
     */
    public function edit($id)
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\UserGroup.edit');
            if ($result === true) {
                UserGroupLogic::editUserGroup($post);
                $this->_success('修改成功');
            }
            $this->_error($result);
        }
        $this->assign('info', UserGroupLogic::info($id));
        return $this->fetch();
    }


    /**
     * 删除
     * @param $id
     */
    public function del($id)
    {
        if ($this->request->isAjax()) {
            $result = $this->validate(['id'=>$id], 'app\admin\validate\UserGroup.del');
            if($result === true) {
                UserGroupLogic::delUserGroup($id);
                $this->_success('删除成功');
            }
            $this->_error($result);
        }
    }


}