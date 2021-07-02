<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\controller;

use app\api\logic\CartLogic;

/**
 * 购物车
 * Class Cart
 * @package app\api\controller
 */
class Cart extends ApiBase
{

    public function lists()
    {
        $this->_success('', CartLogic::lists($this->user_id));
    }


    public function add()
    {
        $post = $this->request->post();
        $check = $this->validate($post, 'app\api\validate\Cart.add');
        if (true !== $check) {
            $this->_error($check);
        }
        $res = CartLogic::add($post['item_id'], $post['goods_num'], $this->user_id);
        if ($res === true) {
            $this->_success('加入成功');
        }
        $this->_error($res);
    }


    public function change()
    {
        $post = $this->request->post();
        $check = $this->validate($post, 'app\api\validate\Cart.change');
        if ($check !== true) {
            $this->_error($check);
        }
        $res = CartLogic::change($post['cart_id'], $post['goods_num']);
        if ($res === true) {
            $this->_success();
        }
        $this->_error($res);
    }


    public function del()
    {
        $post = $this->request->post();
        $check = $this->validate($post, 'app\api\validate\Cart.del');
        if (true !== $check) {
            $this->_error($check);
        }
        if (CartLogic::del($post['cart_id'], $this->user_id)) {
            $this->_success('删除成功');
        }
        $this->_error('删除失败');
    }


    public function selected()
    {
        $post = $this->request->post();
        $check = $this->validate($post, 'app\api\validate\Cart.selected');
        if (true !== $check) {
            $this->_error($check);
        }
        CartLogic::selected($post, $this->user_id);
        $this->_success();
    }


    public function num()
    {
        $this->_success('',CartLogic::cartNum($this->user_id));
    }
}