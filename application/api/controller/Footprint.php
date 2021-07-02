<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu-张无忌
// +----------------------------------------------------------------------

namespace app\api\controller;


use app\api\logic\FootPrintLogic;

class Footprint extends ApiBase
{
    public $like_not_need_login = ['lists'];

    public function lists()
    {
        $lists = FootPrintLogic::lists();
        $this->_success('获取成功', $lists);
    }
}