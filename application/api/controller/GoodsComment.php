<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\controller;
use app\api\logic\GoodsCommentLogic;

class GoodsComment extends ApiBase{
    public $like_not_need_login = ['lists','category'];

    /**
     * note 商品评论分类
     * create_time 2020/11/11 16:33
     */
    public function category()
    {
        $get = $this->request->get();
        $collect = GoodsCommentLogic::category($get);
        $this->_success('获取成功', $collect);
    }
    /**
     * note 商品评论列表
     * create_time 2020/11/11 16:34
     */
    public function lists(){
        $get = $this->request->get();
        $collect = GoodsCommentLogic::lists($get, $this->page_no, $this->page_size);
        $this->_success('获取成功', $collect);

    }
    /**
     * note 添加商品评论
     * create_time 2020/11/11 15:14
     */
    public function addGoodsComment()
    {
        $post = $this->request->post();
        $post['user_id'] = $this->user_id;
        $result = $this->validate($post, 'app\api\validate\GoodsComment');
        if ($result === true) {
            $result = GoodsCommentLogic::addGoodsComment( $post,$this->user_id);
            if($result === true){
                $this->_success('评论成功');
            }
        }
        $this->_error($result);
    }
    /**
     * note 获取未评论或已评论的订单商品列表
     * create_time 2020/11/12 11:11
     */
    public function getOrderGoods(){
        $type = $this->request->get('type',1);
        $list = GoodsCommentLogic::getOrderGoods($type,$this->user_id, $this->page_no, $this->page_size);
        $this->_success('',$list);
    }

    /**
     * note 获取评论的商品信息
     * create_time 2020/11/13 14:45
     */
    public function getGoods(){
        $id = $this->request->get('id');
        if($id){
            $goods = GoodsCommentLogic::getGoods($id);
            $this->_success('获取成功',$goods);
        }
        $this->_success('请选择评论的商品');
    }
}