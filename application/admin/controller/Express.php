<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\admin\controller;

use app\common\server\ConfigServer;
use app\admin\logic\ExpressLogic;
use think\db;

class Express extends AdminBase
{
    /**
     * lists
     * @return mixed
     * @throws \think\exception\DbException
     * @throws db\exception\DataNotFoundException
     * @throws db\exception\ModelNotFoundException
     */
    public function lists()
    {
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $this->_success('', ExpressLogic::lists($get));
        }
    }

    /**
     * 添加
     * @return mixed
     */
    public function add()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\Express.add');
            if ($result === true) {
                $result = ExpressLogic::addExpress($post);
                if ($result) {
                    $this->_success('添加成功');
                }
            }
            $this->_error($result);
        }
        return $this->fetch();
    }

    /**
     * 编辑
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\Express.edit');
            if ($result === true) {
                $result = ExpressLogic::editExpress($post);
                if ($result) {
                    $this->_success('修改成功');
                }
            }
            $this->_error($result);
        }
        $this->assign('info', ExpressLogic::info($id));
        return $this->fetch();
    }


    /**
     * 删除
     * @param $delData
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del($delData)
    {
        if ($this->request->isAjax()) {
            $result = ExpressLogic::delExpress($delData);
            if ($result) {
                $this->_success('删除成功');
            }
            $this->_error('删除失败');
        }
    }

    //查询配置
    public function setExpress()
    {
        $post = $this->request->post();
        if($post){
            ConfigServer::set('express', 'way', $post['way']);

            ConfigServer::set('kd100', 'appkey', $post['kd100_appkey']);
            ConfigServer::set('kd100', 'appsecret', $post['kd100_customer']);

            ConfigServer::set('kdniao', 'appkey', $post['kdniao_appkey']);
            ConfigServer::set('kdniao', 'appsecret', $post['kdniao_ebussinessid']);
        }
        $this->_success('操作成功');
    }
}