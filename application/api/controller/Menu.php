<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\controller;

use app\api\logic\MenuLogic;

class Menu extends ApiBase
{
    public $like_not_need_login = ['lists'];

    public function lists()
    {
        $type = $this->request->get('type', 1);
        $list = MenuLogic::getMenu($type);
        return $this->_success('获取成功', $list);
    }
}