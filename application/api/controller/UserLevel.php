<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\controller;
use app\api\logic\UserLevelLogic;

class UserLevel extends ApiBase{
    public function lists(){
        $list = UserLevelLogic::lists($this->user_id);
        $this->_success('获取成功',$list);

    }
}