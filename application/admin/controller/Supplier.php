<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\logic\SupplierLogic;

class Supplier extends AdminBase{
    /**
     *列表
     */
    public function lists(){
        if ($this->request->isAjax()) {
            $get = $this->request->get(); //获取get请求
            $this->_success('', SupplierLogic::lists($get)); //逻辑层处理渲染数据
        }
        return $this->fetch();  //渲染
    }

    /**
     *添加
     */
    public  function add(){
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\Supplier'); //验证信息
            if($result=== true){
                SupplierLogic::add($post);  //逻辑层处理添加数据
                $this->_success('添加成功');
            }
            $this->_error($result);
        }
        return $this->fetch(); //渲染
    }

    /**
     *编辑
     */
    public function edit($id = ''){
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\Supplier'); //验证信息
            if($result=== true){
                SupplierLogic::edit($post);  //逻辑层处理添加数据
                $this->_success('修改成功');
            }
            $this->_error($result);
        }
        $this->assign('info', SupplierLogic::info($id)); //逻辑层处理数据,返回已有信息
        return $this->fetch(); //渲染
    }

    /**
     *删除
     */
    public function del($id)
    {
        if ($this->request->isAjax()) {
            $result = SupplierLogic::del($id); //逻辑层处理删除信息
            if ($result) {
                $this->_success('删除成功');
            }
            $this->_error('删除失败');
        }
    }
}