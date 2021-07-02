<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\admin\controller;


use app\admin\logic\AdminLogic;

class Admin extends AdminBase
{

    /**
     * 管理员列表
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function lists()
    {
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $this->_success('',  AdminLogic::lists($get));
        }

        $this->assign('role_lists', AdminLogic::roleLists());
        return $this->fetch();
    }

    /**
     * 添加管理员
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function add()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['disable'] = isset($post['disable']) && $post['disable'] == 'on' ? 0 : 1;
            $result = $this->validate($post, 'app\admin\validate\Admin.add');
            if ($result === true) {
                AdminLogic::addAdmin($post);
                $this->_success('修改成功');
            }
            $this->_error($result);
        }
        $this->assign('role_lists', AdminLogic::roleLists());
        return $this->fetch();
    }

    /**
     * 编辑管理员
     * @param string $admin_id
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function edit($admin_id = '')
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['disable'] = isset($post['disable']) && $post['disable'] == 'on' ? 0 : 1;
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\Admin.edit');
            if ($result === true) {
                AdminLogic::editAdmin($post);
                $this->_success('修改成功');
            }
            $this->_error($result);
        }

        $this->assign('info', AdminLogic::info($admin_id));
        $this->assign('role_lists', AdminLogic::roleLists());
        return $this->fetch();
    }

    /**
     * 删除管理员
     * @param $admin_id
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del($admin_id)
    {
        if ($this->request->isAjax()) {
            $result = AdminLogic::delAdmin($admin_id);
            if ($result) {
                $this->_success('删除成功');
            }
            $this->_error('删除失败');
        }
    }

}