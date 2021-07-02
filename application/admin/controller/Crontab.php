<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\admin\controller;


use app\admin\logic\CrontabLogic;

class Crontab extends AdminBase
{
    /**
     * 定时任务列表
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function lists()
    {
        if ($this->request->isAjax()) {
            $this->_success('', CrontabLogic::lists());
        }
        return $this->fetch();
    }


    /**
     * 添加定时任务
     * @return mixed
     */
    public function add()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['status'] = isset($post['status']) && $post['status'] == 'on' ? 1 : 2;
            $result = $this->validate($post, 'app\admin\validate\Crontab.add');
            if ($result === true) {
                CrontabLogic::add($post);
                $this->_success('添加成功');
            }
            $this->_error($result);
        }
        return $this->fetch();
    }

    /**
     * 编辑定时任务
     * @return mixed
     */
    public function edit()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['status'] = isset($post['status']) && $post['status'] == 'on' ? 1 : 2;
            $result = $this->validate($post, 'app\admin\validate\Crontab');
            if ($result === true) {
                CrontabLogic::edit($post);
                $this->_success('修改成功');
            }
            $this->_error($result);
        }
        $id = $this->request->get('id');
        $this->assign('info',CrontabLogic::info($id));
        return $this->fetch();
    }

    public function del()
    {
        if ($this->request->isAjax()) {
            $id = $this->request->post('id');
            if (CrontabLogic::del($id) !== true) {
                $this->_success('删除成功');
            }
        }
        $this->_error('删除失败');
    }


    /**
     * 定时任务操作
     */
    public function operation()
    {
        $post = $this->request->post();
        $result = CrontabLogic::operation($post['operation'], $post['id']);
        if ($result !== true) {
            $this->_error('操作失败：' . $result);
        }
        $this->_success('操作成功');
    }

    /**
     * 获取接下来执行时间
     */
    public function expression()
    {
        $get = $this->request->get();
        $this->_success('', CrontabLogic::expression($get));
    }

}