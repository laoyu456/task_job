<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------
// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\admin\logic\TeamActivityLogic;
use app\common\model\Team;
use think\helper\Time;

/**
 * 拼团商品管理 - 控制器
 * Class TeamActivity
 * @package app\admin\controller
 */
class TeamActivity extends AdminBase
{
    /**
     * Notes: 列表
     * @author 张无忌(2021/1/12 15:51)
     * @return mixed
     */
    public function lists()
    {
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $lists = TeamActivityLogic::lists($get);
            $this->_success('获取成功', $lists);
        }

        return $this->fetch('team_activity/lists');
    }

    /**
     * Notes: 添加
     * @author 张无忌(2021/1/12 15:52)
     * @return mixed
     */
    public function add()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $check = $this->validate($post, 'app\admin\validate\TeamActivity.add');
            if ($check !== true) {
                $this->_error($check);
            }
            if (TeamActivityLogic::add($post)) {
                $this->_success('新增成功');
            } else {
                $error = TeamActivityLogic::getError() ?? '新增失败';
                $this->_error($error);
            }
        }

        return $this->fetch('team_activity/add');
    }

    /**
     * Notes: 编辑
     * @author 张无忌(2021/1/12 15:52)
     * @return mixed
     */
    public function edit()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $check = $this->validate($post, 'app\admin\validate\TeamActivity');
            if ($check !== true) {
                $this->_error($check);
            }
            if (TeamActivityLogic::edit($post)) {
                $this->_success('更新成功');
            } else {
                $error = TeamActivityLogic::getError() ?? '更新失败';
                $this->_error($error);
            }
        }

        $id = $this->request->get('id');
        $this->assign('detail', TeamActivityLogic::getDetail($id));
        return $this->fetch('team_activity/edit');
    }

    /**
     * Notes: 删除
     * @author 张无忌(2021/1/12 15:52)
     * @return mixed
     */
    public function del()
    {
        if ($this->request->isAjax()) {
            $id = $this->request->post('id');
            if (TeamActivityLogic::softDelete($id)) {
                $this->_success('删除成功');
            } else {
                $error = TeamActivityLogic::getError() ?? '删除失败';
                $this->_error($error);
            }
        }
    }

    /**
     * Notes: 切换状态
     * @author 张无忌(2021/1/13 18:01)
     */
    public function switchStatus()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            if (TeamActivityLogic::switchStatus($post)) {
                $this->_success('更新成功');
            } else {
                $error = TeamActivityLogic::getError() ?? '更新失败';
                $this->_error($error);
            }
        }
    }

    /**
     * Notes: 参团订单
     * @author 张无忌(2021/1/13 18:21)
     */
    public function teamOrder()
    {
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $lists = TeamActivityLogic::teamOrder($get);
            $this->_success('获取成功', $lists);
        }

        $team_id = $this->request->get('id', 0, 'intval');
        $this->assign('team_id', $team_id);
        $this->assign('team_status', Team::getStatusDesc(true));
        return $this->fetch('team_activity/team_order');
    }
}