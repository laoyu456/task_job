<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\common\logic\FileCateLogic;

/**
 * 图片分类
 * Class FileCate
 * @package app\admin\controller
 */
class FileCate extends AdminBase
{

    public function add()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $result = $this->validate($post, 'app\admin\validate\FileCate.add');
            if ($result !== true) {
                $this->_error($result);
            }
            $result = FileCateLogic::add($post);
            if ($result !== true) {
                $this->_error($result);
            }
            $this->_success('添加成功');
        }
        $tree = FileCateLogic::categoryToSelect();
        $this->assign('cate_tree', $tree);
        return $this->fetch();
    }


    public function edit($id = '')
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $result = $this->validate($post, 'app\admin\validate\FileCate.edit');
            if ($result !== true) {
                $this->_error($result);
            }
            $result = FileCateLogic::edit($post);
            if ($result !== true) {
                $this->_error($result);
            }
            $this->_success('编辑成功');
        }
        $tree = FileCateLogic::categoryToSelect();
        $this->assign('cate_tree', $tree);
        $this->assign('detail', FileCateLogic::info($id));
        return $this->fetch();
    }


    public function del()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $result = $this->validate($post, 'app\admin\validate\FileCate.del');
            if ($result !== true) {
                $this->_error($result);
            }
            FileCateLogic::del($post['id']);
            $this->_success('删除成功');
        }
    }
}