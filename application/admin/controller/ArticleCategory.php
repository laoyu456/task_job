<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\logic\{
    ArticleCategoryLogic
};
class ArticleCategory extends AdminBase {
    /**
     * 文章分类列表
     * @return mixed
     */
    public function lists(){
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $this->_success('', ArticleCategoryLogic::lists($get));
        }
        return $this->fetch();
    }
    /**
     * 添加文章分类
     * @return mixed
     */
    public function add(){
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\ArticleCategory');
            if($result === true){
                ArticleCategoryLogic::addArticleCategory($post);
                $this->_success('添加成功！');
            }
            $this->_error($result);
        }
        return $this->fetch();
    }

    /**
     * 编辑文章分类
     * @return mixed
     */
    public function edit($id){
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\ArticleCategory.edit');
            if($result === true){
                ArticleCategoryLogic::editArticleCategory($post);
                $this->_success('编辑成功！');
            }
            $this->_error($result);
        }
        $category= ArticleCategoryLogic::getArticleCategory($id);
        $this->assign('category',array_values($category)[0]);
        return $this->fetch();
    }

    /**
     * 删除文章分类
     * @return mixed
     */
    public function del($id)
    {
        if ($this->request->isAjax()) {
            $result = $this->validate(['id' => $id], 'app\admin\validate\ArticleCategory.del');
            if ($result === true) {
                ArticleCategoryLogic::delArticleCategory($id);
                $this->_success('删除成功');
            }
            $this->_error($result);
        }
    }


    /**
     * 修改状态
     */
    public function switchStatus(){
        $post = $this->request->post();
        ArticleCategoryLogic::switchStatus($post);
        $this->_success('修改成功');
    }

}