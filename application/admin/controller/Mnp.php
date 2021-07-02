<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\admin\logic\MnpLogic;
use think\Request;


class Mnp extends AdminBase
{
    /**
     * 设置小程序
     * @return mixed
     */
    public function setMnp()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            MnpLogic::SetMnp($post);
            $this->_success('设置成功');
        }

        $mnp = MnpLogic::getMnp();
        $this->assign('mnp', $mnp);
        return $this->fetch();
    }
}