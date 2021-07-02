<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\logic\GoodsCategoryLogic;
use app\admin\logic\CommonLogic;

class Common extends AdminBase{
    public function selectGoods(){
        if ($this->request->isAjax()){
            $get = $this->request->get();
            $goods_list = CommonLogic::getGoodsList($get,true);
            $this->_success('',$goods_list);
        }
        $category_list = GoodsCategoryLogic::categoryTreeeTree();
        $this->assign('category_list', $category_list);
        return $this->fetch();
    }
}