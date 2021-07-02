<?php

namespace app\admin\controller;

use app\admin\logic\FinanceLogic;

// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

class Finance extends AdminBase
{
    public function lists()
    {
        $data = FinanceLogic::lists();
        $this->assign('data', $data);
        return $this->fetch();
    }
}