<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\controller;
use app\api\logic\CollectLogic;

class Collect extends ApiBase{
    /**
     * note 商品收藏列表
     * create_time 2020/10/29 10:17
     */
    public function getCollectGoods(){
        $collect = CollectLogic::getCollectGoods($this->user_id,$this->page_no,$this->page_size);
        $this->_success('获取成功',$collect);
    }
    /**
     * note 商品收藏操作
     * create_time 2020/10/29 10:17
     */
    public function handleCollectGoods(){
        $post = $this->request->post();
        $collect = CollectLogic::handleCollectGoods($post,$this->user_id);
        $this->_success('获取成功',$collect);
    }
}