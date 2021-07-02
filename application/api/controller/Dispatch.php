<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\controller;


class Dispatch extends ApiBase
{
    public $like_not_need_login = ['_error'];

    public function dispatch_error($msg = '', $code = 0)
    {
        return $this->_error($msg, [], $code);
    }

}