<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\controller;
use app\api\logic\GoodsLogic;
class Goods extends ApiBase{

    public $like_not_need_login = ['getgoodsdetail', 'getgoodslist','getbestlist','gethostlist','getsearchpage'];

    /**
     * note 商品列表
     * create_time 2020/10/20 11:12
     */
    public function getGoodsList(){
        $get = $this->request->get();
        $goods_list = GoodsLogic::getGoodsList($this->user_id, $get, $this->page_no, $this->page_size);
        $this->_success('获取成功',$goods_list);

    }


    /**
     * note 商品详情
     * create_time 2020/10/20 11:12
     */
    public function getGoodsDetail(){
        $id = $this->request->get('id');
        $goods = GoodsLogic::getGoodsDetail($this->user_id,$id);
        if($goods){
            $this->_success('获取成功',$goods);
        }
        $this->_error('商品不存在',[],0,0);
    }

    /**
     * note 首页好物优选
     * create_time 2020/10/21 19:04
     */
    public function getBestList()  {
        $goods_list = GoodsLogic::getBestList($this->page_no, $this->page_size);
        $this->_success('获取成功', $goods_list);

    }
    /**
     * note 热销商品
     * create_time 2020/11/17 9:52
     */
    public function getHostList(){
        $goods_list = GoodsLogic::getHostList($this->page_no, $this->page_size);
        $this->_success('获取成功', $goods_list);
    }


    /**
     * note 获取搜索页数据
     * create_time 2020/10/22 16:01
     */
    public function getSearchPage(){
        $limit = $this->request->get('limit ',10);
        $list = GoodsLogic::getSearchPage($this->user_id,$limit);
        $this->_success('',$list);
    }
    /**
     * note 清空搜索记录
     * create_time 2020/12/18 10:26
     */
    public function clearSearch(){
        $result = GoodsLogic::clearSearch($this->user_id);
        if($result){
            $this->_success('清理成功','');
        }
        $this->_error('清理失败','');

    }
}