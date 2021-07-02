<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\admin\logic\AfterSaleLogic;
use app\common\model\AfterSale as CommonAfterSale;

class AfterSale extends AdminBase
{
    /**
     * User: 意象信息科技 mjf
     * Desc: 列表
     */
    public function lists()
    {
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $this->_success('', AfterSaleLogic::lists($get));
        }
        $this->assign('status', CommonAfterSale::getStatusDesc(true));
        return $this->fetch();
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 详情
     */
    public function detail()
    {
        $id = $this->request->get('id');
        $detail = AfterSaleLogic::getDetail($id);
        $this->assign('detail', $detail);
        return $this->fetch();
    }


    /**
     * User: 意象信息科技 mjf
     * Desc: 同意
     */
    public function agree()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post('');
            $check = $this->validate($post, 'app\admin\validate\AfterSale.agree');
            if (true !== $check) {
                $this->_error($check);
            }
            AfterSaleLogic::agree($post['id'],$this->admin_id);
            $this->_success('操作成功');
        }
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 拒绝
     */
    public function refuse()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post('');
            $check = $this->validate($post, 'app\admin\validate\AfterSale.refuse');
            if (true !== $check) {
                $this->_error($check);
            }
            AfterSaleLogic::refuse($post,$this->admin_id);
            $this->_success('操作成功');
        }
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 收货
     */
    public function take()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post('');
            $check = $this->validate($post, 'app\admin\validate\AfterSale.take');
            if (true !== $check) {
                $this->_error($check);
            }
            AfterSaleLogic::takeGoods($post,$this->admin_id);
            $this->_success('操作成功');
        }
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 拒绝收货
     */
    public function refuseGoods()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post('');
            $check = $this->validate($post, 'app\admin\validate\AfterSale.refuse_goods');
            if (true !== $check) {
                $this->_error($check);
            }
            AfterSaleLogic::refuseGoods($post,$this->admin_id);
            $this->_success('操作成功');
        }
    }


    /**
     * User: 意象信息科技 mjf
     * Desc: 确认退款
     */
    public function confirm()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post('');
            $check = $this->validate($post, 'app\admin\validate\AfterSale.confirm');
            if (true !== $check) {
                $this->_error($check);
            }
            $res = AfterSaleLogic::confirm($post,$this->admin_id);
            if ($res === true){
                $this->_success('操作成功');
            }
            $this->_error($res);
        }
    }
}