<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\admin\controller;
use app\admin\logic\{
    GoodsCategoryLogic
};
use app\common\logic\CommonLogic;

class GoodsCategory extends AdminBase
{
    /**
     * 商品分类列表
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function lists(){
        $category_tree = GoodsCategoryLogic::categoryThirdTree();
        $this->assign('category_tree', json_encode($category_tree));
        return $this->fetch();
    }

    /**
     * 添加商品分类
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function add(){
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\GoodsCategory.add');
            if ($result === true) {
                GoodsCategoryLogic::add($post);
                $this->_success('添加成功！');
            }
            $this->_error($result);
        }
        $category_list = GoodsCategoryLogic::categoryTwoTree();
        $this->assign('category_list', $category_list);
        return $this->fetch();
    }

    /**
     * 编辑商品分类
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function edit($id){
        if ($this->request->isAjax()) {
            $post = $this->request->post();

            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\GoodsCategory.edit');
            if ($result === true) {
                GoodsCategoryLogic::edit($post);
                $this->_success('修改成功');
            }
            $this->_error($result);
        }
        $category_info = GoodsCategoryLogic::getCategory($id);
        $category_list = GoodsCategoryLogic::categoryTwoTree();

        $this->assign('info',$category_info);
        $this->assign('category_list', $category_list);
        return $this->fetch();
    }
    /**
     * 删除商品分类
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function del(){
        $id = $this->request->post('ids');
        $result = $this->validate(['id'=>[$id]], 'app\admin\validate\GoodsCategory.del');
        if ($result === true) {
            GoodsCategoryLogic::del($id);
            $this->_success('删除成功！');
        }
        $this->_error($result);
    }
    /**
     * note 修改品牌的显示状态
     */
    public function switchStatus(){
        $post = $this->request->post();
        $result =GoodsCategoryLogic::switchStatus($post);
        if ($result) {
            $this->_success('修改成功');
        }
        $this->_success('修改失败');
    }
}