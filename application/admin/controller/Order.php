<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\common\model\OrderLog;
use app\admin\logic\OrderLogic;
use app\common\model\Client_;
use app\common\model\Order as CommonOrder;
use app\common\model\Pay;
use think\Db;

class Order extends AdminBase
{
    /**
     * User: 意象信息科技 mjf
     * Desc: 订单列表
     */
    public function lists()
    {
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $this->_success('', OrderLogic::lists($get));
        }
        $this->assign('order_status', CommonOrder::getOrderStatus(true));
        $this->assign('order_type', CommonOrder::getOrderType(true));
        $this->assign('pay_way', Pay::getPayWay(true));
        $this->assign('delivery_type', CommonOrder::getDeliveryType(true));
        $this->assign('order_source', Client_::getClient(true));
        return $this->fetch();
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 订单详情
     */
    public function detail()
    {
        $id = $this->request->get('id');
        $detail = OrderLogic::getDetail($id);
        $this->assign('detail', $detail);
        $this->assign('logs', OrderLog::getOrderLog($id));
        return $this->fetch();
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 取消订单
     */
    public function cancel()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post('');
            $check = $this->validate($post, 'app\admin\validate\Order.cancel');
            if (true !== $check) {
                $this->_error($check);
            }
            $res = OrderLogic::cancel($post['order_id'], $this->admin_id);
            if ($res === true) {
                $this->_success('取消成功');
            }
            $this->_error($res);
        }
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 删除订单
     */
    public function del()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post('');
            $check = $this->validate($post, 'app\admin\validate\Order.del');
            if (true !== $check) {
                $this->_error($check);
            }
            OrderLogic::del($post['order_id'], $this->admin_id);
            $this->_success('删除成功');
        }
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 发货
     */
    public function delivery()
    {
        $id = $this->request->get('id');
        $detail = OrderLogic::getDetail($id);
        $this->assign('detail', $detail);
        $this->assign('express', OrderLogic::express());
        return $this->fetch();
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 发货操作
     */
    public function deliveryHandle()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post('');
            $check = $this->validate($post, 'app\admin\validate\Order.delivery');
            if (true !== $check) {
                $this->_error($check);
            }
            OrderLogic::deliveryHandle($post, $this->admin_id);
            $this->_success('发货成功');
        }
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 确认收货
     */
    public function confirm()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post('');
            $check = $this->validate($post, 'app\admin\validate\Order.confirm');
            if (true !== $check) {
                $this->_error($check);
            }
            OrderLogic::confirm($post['order_id'], $this->admin_id);
            $this->_success('确认成功');
        }
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 物流信息
     */
    public function express()
    {
        $id = $this->request->get('id');
        $detail = OrderLogic::getDetail($id);
        $detail['shipping'] = OrderLogic::shippingInfo($detail['id']);
        $this->assign('detail', $detail);
        return $this->fetch();
    }

    public function remarks()
    {
        // 获取的
        if ($this->request->isAjax() && $this->request->isGet()){
            $get = $this->request->get();
            $detail = OrderLogic::remarks($get, 'get');
            $this->_success('获取成功', $detail);
        }

        // 提交的
        if ($this->request->isAjax() && $this->request->isPost()) {
            $post = $this->request->post();
            $result = OrderLogic::remarks($post, 'post');
            if ($result) {
                $this->_success('保存成功');
            }
            $this->error('保存失败');
        }

    }

    /**
     * Notes:打印接口
     */
    public function orderPrint(){
        $id = $this->request->post('id');
        $result = $this->validate(['id'=>$id],'app\admin\validate\OrderPrint');
        if(true === $result){
            $result = OrderLogic::orderPrint($id);
            if(true === $result){
                $this->success('打印机成功，如未出小票，请检查打印机是否在线');
            }
        }
        $this->_error($result);
    }
}