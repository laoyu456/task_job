<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\logic\GoodsCommentLogic;

class GoodsComment  extends AdminBase{

    /**
     * 列表
     */
    public function lists(){
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $this->_success('', GoodsCommentLogic::lists($get));
        }
        return $this->fetch();
    }

    /**
     * 删除
     */
    public function del($delData)
    {
        if ($this->request->isAjax()) {
            $result = GoodsCommentLogic::del($delData); //逻辑层处理删除信息
            if ($result) {
                $this->_success('删除成功');
            }
            $this->_error('删除失败');
        }
    }

    /**
     * 修改状态
     */
    public function switchStatus(){
        $get = $this->request->get();
        GoodsCommentLogic::switchStatus($get);
        $this->_success('修改成功');
    }

    //回复
    public function reply($id){
        if ($this->request->isAjax()) {

            $post = $this->request->post();
            $result = $this->validate($post, 'app\admin\validate\GoodsComment');
            if($result === true){
                GoodsCommentLogic::reply($post);
                $this->_success('回复成功！');
            }
            $this->_error($result);

        }
        $this->assign('res',GoodsCommentLogic::info($id));
        return $this->fetch();
    }


}