<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu-张无忌
// +----------------------------------------------------------------------


namespace app\admin\controller;

use app\admin\logic\FootprintLogic;
use app\common\server\ConfigServer;

/**
 * 访问足迹(气泡足迹)
 * Class Footprint
 * @package app\admin\controller
 */
class Footprint extends AdminBase
{
    public function index()
    {
        $set['footprint_duration'] = ConfigServer::get('footprint','footprint_duration',60);
        $set['footprint_status'] = ConfigServer::get('footprint','footprint_status',0);
        $this->assign('set', $set);
        $this->assign('footprint', FootprintLogic::lists());
        return $this->fetch();
    }

    public function edit()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $result = FootprintLogic::edit($post);
            if ($result) {
                $this->_success('编辑成功');
            }
            $this->_error('编辑失败');
        }

        $id = $this->request->get('id', 0, 'intval');
        $this->assign('info', FootprintLogic::info($id));
        return $this->fetch();
    }

    public function set()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $result = FootprintLogic::set($post);
            if ($result) {
                $this->_success('更新成功');
            }
            $this->_error('更新失败');
        }
    }
}