<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\controller;
use app\api\logic\ActivityAreaLogic;
class ActivityArea extends ApiBase{
    public $like_not_need_login = ['activityGoodsList'];

    public function activityGoodsList(){
        $id = $this->request->get('id');
        $list = ActivityAreaLogic::activityGoodsList($id,$this->page_no,$this->page_size);
        $this->_success('获取成功',$list);
    }
}