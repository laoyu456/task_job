<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\admin\logic\{HelpCategoryLogic};

class HelpCategory extends AdminBase
{
    /**
     * 帮助分类列表
     * @return mixed
     */
    public function lists()
    {
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $this->_success('', HelpCategoryLogic::lists($get));
        }
        return $this->fetch();
    }

    /**
     * 添加帮助分类
     */
    public function add()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\HelpCategory');
            if ($result === true) {
                HelpCategoryLogic::addHelpCategory($post);
                $this->_success('添加成功！');
            }
            $this->_error($result);
        }
        return $this->fetch();
    }

    /**
     * 编辑帮助分类
     */
    public function edit($id)
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\HelpCategory.edit');
            if ($result === true) {
                HelpCategoryLogic::editHelpCategory($post);
                $this->_success('编辑成功！');
            }
            $this->_error($result);
        }

        $category = HelpCategoryLogic::getHelpCategory($id);
        $this->assign('category', array_values($category)[0]);
        return $this->fetch();
    }

    /**
     * 删除帮助分类
     */
    public function del($id)
    {
        if ($this->request->isAjax()) {
            $result = $this->validate(['id' => $id], 'app\admin\validate\HelpCategory.del');
            if ($result === true) {
                HelpCategoryLogic::delHelpCategory($id);
                $this->_success('删除成功');
            }
            $this->_error($result);
        }
    }


    /**
     * 修改状态
     */
    public function switchStatus()
    {
        $post = $this->request->post();
        HelpCategoryLogic::switchStatus($post);
        $this->_success('修改成功');
    }

}