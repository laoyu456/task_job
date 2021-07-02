<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;


use app\admin\logic\UserLogic;
use app\common\server\ConfigServer;

class User extends AdminBase
{
    /**
     * 会员列表
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function lists(){
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $this->_success('', UserLogic::lists($get));

        }
        $this->assign('level_list',UserLogic::getLevelList());
        $this->assign('group_list',UserLogic::getGroupList());
        return $this->fetch();
    }
    /*
     * 设置分组
     */
    public function setGroup(){
        if($this->request->isAjax()){
            $post = $this->request->post();
            UserLogic::setGroup($post);
            $this->_success('设置成功','');
        }
        $this->assign('group_list',UserLogic::getGroupList());
        return $this->fetch();
    }


    /**
     * 账户调整
     * @param $id
     * @return mixed
     */
    public function adjustAccount($id){
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $result = $this->validate($post,'app\admin\validate\AdjustAccount');
            if($result === true){
                $result = UserLogic::adjustAccount($post); //逻辑层处理信息
                if($result){
                    $this->_success('操作成功',$result);
                }
                $result = '操作失败';
            }
            $this->_error($result);

        }
        $this->assign('info',UserLogic::getUser($id));
        return $this->fetch();
    }

    /*
     * 等级调整
     */
    public function adjustLevel($id){
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $result = $this->validate($post,'app\admin\validate\AdjustUserLevel');
            if($result === true){
                $result = UserLogic::adjustLevel($post); //逻辑层处理信息
                if($result){
                    $this->_success('操作成功',$result);
                }
                $result = '操作失败';
            }
            $this->_error($result);
        }
        $this->assign('info',UserLogic::getUser($id));
        $this->assign('user_level',UserLogic::getLevelList());
        return $this->fetch();

    }
    /*
     * 会员编辑
     */
    public function edit($id){
        if($this->request->isAjax()){
            $post = $this->request->post();
            $result = $this->validate($post,'app\admin\validate\User');
            if($result === true){
                UserLogic::edit($post);
                $this->_success('保存成功');
            }
            return $this->_error($result);
        }
        $detail = UserLogic::getUser($id,true);
        $this->assign('info',$detail);
        return $this->fetch();
    }
    /*
     * 会员详情
     */
    public function info($id){
        $detail = UserLogic::getUser($id,false,true);
        $this->assign('detail',$detail);

        return $this->fetch();
    }

    public function getList(){
        $post = $this->request->get('');
        $list = UserLogic::getList($post);
        $this->_success('',$list);
    }
    public function sendCouponList(){
        if($this->request->isAjax()){
            $list = UserLogic::sendCouponList();
            $this->_success('',$list);
        }
        return $this->fetch();
    }

        /**
     * 转账记录
     */
    public function transferRecord()
    {
      if($this->request->isAjax()) {
        $get = $this->request->get();
        $get['page'] = $get['page'] ?? $this->page_no;
        $get['limit'] = $get['limit'] ?? $this->page_size;
        $data = UserLogic::transferRecord($get);
        $this->_success('', $data);
      }
      return $this->fetch();
    }
}
