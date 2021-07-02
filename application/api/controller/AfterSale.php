<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\controller;

use app\api\logic\AfterSaleLogic;

/**
 * 售后
 * Class Order
 * @package app\api\controller
 */
class AfterSale extends ApiBase
{
    public function lists()
    {
        $type = $this->request->get('type', 'normal');
        $lists = AfterSaleLogic::lists($this->user_id, $type, $this->page_no, $this->page_size);
        $this->_success('',$lists);
    }


    public function add()
    {
        $post = $this->request->post();
        $post['user_id'] = $this->user_id;
        $check = $this->validate($post, 'app\api\validate\AfterSale.add');
        if (true !== $check) {
            $this->_error($check);
        }
        return AfterSaleLogic::add($post, $this->user_id);
    }


    //售后商品信息
    public function goodsInfo()
    {
        $get = $this->request->get();
        $check = $this->validate($get, 'app\api\validate\AfterSale.info');
        if (true !== $check) {
            $this->_error($check);
        }
        $this->_success('', AfterSaleLogic::info($get['item_id'], $get['order_id']));
    }


    public function express()
    {
        $post = $this->request->post();
        $check = $this->validate($post, 'app\api\validate\AfterSale.express');
        if (true !== $check) {
            $this->_error($check);
        }
        return AfterSaleLogic::express($this->user_id, $post);
    }


    public function cancel()
    {
        $post = $this->request->post();
        $check = $this->validate($post, 'app\api\validate\AfterSale.cancel');
        if (true !== $check) {
            $this->_error($check);
        }
        AfterSaleLogic::cancel($this->user_id, $post);
        $this->_success('撤销成功');
    }


    
    public function detail()
    {
        $get = $this->request->get();
        $this->_success('', AfterSaleLogic::detail($get));
    }



    public function again()
    {
        $post = $this->request->post();
        $check = $this->validate($post, 'app\api\validate\AfterSale.again');
        if (true !== $check) {
            $this->_error($check);
        }
        return AfterSaleLogic::again($this->user_id, $post);
    }
}