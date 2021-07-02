<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\controller;

use app\api\logic\PolicyLogic;

class Policy extends ApiBase
{

    public $like_not_need_login = ['service', 'privacy', 'aftersale'];

    /**
     * 服务协议
     */
    public function service()
    {
        $this->_success('获取成功', PolicyLogic::service());
    }

    /**
     * 隐私政策
     */
    public function privacy()
    {
        $this->_success('获取成功', PolicyLogic::privacy());
    }

    /**
     * 售后保障
     */
    public function afterSale()
    {
        $this->_success('获取成功', PolicyLogic::afterSale());
    }

}