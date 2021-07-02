<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\controller;
use app\api\logic\GoodsCategoryLogic;
class GoodsCategory extends ApiBase{
    public $like_not_need_login = ['lists'];

    /**
     * Notes:获取商品分类
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @author:  2021/3/6 18:49
     */
    public function lists(){
        $client = $this->request->get('client',1);
        $cateogry = GoodsCategoryLogic::categoryThirdTree($client);
        $this->_success('获取成功',$cateogry);
    }
}