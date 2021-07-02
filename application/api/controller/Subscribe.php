<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\controller;


use app\api\logic\SubscribeLogic;

class Subscribe extends ApiBase
{
    public $like_not_need_login = ['lists'];

    public function lists()
    {
        $scene = $this->request->get('scene');
        if (!$scene) {
            $this->_error('缺少场景scene参数');
        }
        $lists = SubscribeLogic::lists($scene);
        return $this->_success('获取成功', $lists);
    }
}