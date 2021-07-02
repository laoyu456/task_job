<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\admin\logic\ExpressLogic;
use app\common\server\ConfigServer;
use app\admin\logic\FreightLogic;
use app\admin\model\Freight as FreightModel;

class Freight extends AdminBase
{
    /**
     * User: 意象信息科技 mjf
     * Desc: 设置快递方式
     */
    public function set()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['type'] = isset($post['type']) && $post['type'] == 'on' ? 1 : 0;
            ConfigServer::set('express', 'is_express', $post['type']);
            $this->_success('操作成功');
        }
        $type = ConfigServer::get('express', 'is_express');
        $this->assign('type', $type);
        return $this->fetch();
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 运费模板列表
     */
    public function lists()
    {
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $this->_success('获取成功', FreightLogic::lists($get));//运费模板页
        }
        $this->assign('charge_way_lists', FreightModel::getChargeWay(true));
        $this->assign('config', ExpressLogic::getExpress());
        return $this->fetch('index');
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 添加运费模板
     */
    public function add()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $result = $this->validate($post, 'app\admin\validate\Freight.add');
            if ($result === true) {
                FreightLogic::add($post);
                $this->_success('添加成功！');
            }
            $this->_error($result);
        }
        return $this->fetch();
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 删除运费模板
     */
    public function del()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $result = $this->validate($post, 'app\admin\validate\Freight.del');
            if ($result === true) {
                FreightLogic::del($post);
                $this->_success('删除成功！');
            }
            $this->_error($result);
        }
        return $this->fetch();
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 运费模板详情
     */
    public function detail()
    {
        $id = $this->request->get('id');
        $detail = FreightLogic::detail($id);
        $this->assign('detail', $detail);
        return $this->fetch();
    }


    /**
     * User: 意象信息科技 mjf
     * Desc: 运费模板编辑
     */
    public function edit()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $result = $this->validate($post, 'app\admin\validate\Freight.edit');
            if ($result !== true) {
                $this->_error($result);
            }
            FreightLogic::edit($post);
            $this->_success('编辑成功！');
        }
        $id = $this->request->get('id');
        $detail = FreightLogic::detail($id);
        $this->assign('detail', $detail);
        return $this->fetch();
    }



    public function area()
    {
        return $this->fetch();
    }

    //编辑页的地区选择
    public function areaEdit()
    {
        return $this->fetch();
    }
}