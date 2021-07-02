<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\admin\controller;




class Dispatch extends AdminBase
{
    public function dispatch_error($msg)
    {
        return $this->_error($msg);
    }

}