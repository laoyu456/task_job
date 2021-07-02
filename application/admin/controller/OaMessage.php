<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;


use app\admin\logic\OaMessageLogic;

class OaMessage extends AdminBase
{

    /**
     * Notes: 模板消息管理
     */
    public function lists()
    {
        if($this->request->isAjax()){
            $get = $this->request->get();
            $list = OaMessageLogic::lists($get);
            $this->_success('', $list);
        }
        return $this->fetch();
    }

    /**
     * Notes: 编辑模板消息
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $info = OaMessageLogic::getTemplateMessage($id);
        $this->assign('info',$info);
        return $this->fetch();
    }

    /**
     * Notes: 修改消息模板使用状态
     */
    public function switchStatus()
    {
        $get = $this->request->get();
        $result = OaMessageLogic::switchStatus($get);
        if ($result) {
            $this->_success('修改成功');
        }
        $this->_success('修改失败');
    }

    /**
     * Notes: 同步消息模板到公众号
     */
    public function synchro()
    {
        $post = $this->request->post();
        $result = OaMessageLogic::synchro($post);
        if ($result === true) {
            $this->_success('同步成功');
        }
        $this->_error('同步失败,请检查配置信息');
    }
}