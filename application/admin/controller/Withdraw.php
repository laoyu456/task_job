<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\admin\logic\WithdrawLogic;
use app\common\model\Withdraw as WithdrawModel;
use think\helper\Time;
use app\admin\logic\WechatCorporatePaymentLogic;

class Withdraw extends AdminBase
{

    /**
     * 提现列表
     * @return mixed
     */
    public function lists()
    {
        if($this->request->isAjax()) {
          $get = $this->request->get();
          return $this->_success('获取列表成功', WithdrawLogic::lists($get));
        }

        $this->assign('type', WithdrawModel::getTypeDesc(true));
        $this->assign('status', WithdrawModel::getStatusDesc(true));
        
        $today = array_map(function ($time) {
            return date('Y-m-d H:i:s', $time);
        }, Time::today());
        $this->assign('today', $today);

        $yesterday = array_map(function ($time) {
            return date('Y-m-d H:i:s', $time);
        }, Time::yesterday());
        $this->assign('yesterday', $yesterday);


        $days_ago7 = array_map(function ($time) {
            return date('Y-m-d H:i:s', $time);
        }, Time::dayToNow(7));
        $this->assign('days_ago7', $days_ago7);

        $days_ago30 = array_map(function ($time) {
            return date('Y-m-d H:i:s', $time);
        }, Time::dayToNow(30, true));
        $this->assign('days_ago30', $days_ago30);
        return $this->fetch();
    }


    /**
     * Desc: 审核通过
     */
    public function confirm()
    {
        if ($this->request->isAjax()){
            $post = $this->request->post();
            $result = WithdrawLogic::confirm($post);
            if($result['code']) {
              return $this->_success($result['msg']);
            }else{
              return $this->_error($result['msg']);
            }
        }
    }


    /**
     * Desc: 审核拒绝
     */
    public function refuse()
    {
        if ($this->request->isAjax()){
            $post = $this->request->post();
            WithdrawLogic::refuse($post);
            $this->_success('已拒绝提现');
        }
    }

    /**
     * 提现详情
     */
    public function detail()
    {
      $id = $this->request->get('id', '', 'intval');
      $detail = WithdrawLogic::detail($id);
      $this->assign('detail', $detail);
      return $this->fetch();
    }

    /**
     * 显示提现审核界面
     */
    public function review()
    {
      $id = $this->request->get('id', '', 'intval');
      $this->assign('id', $id);
      return $this->fetch();
    }

    /**
     * 显示提现转账界面
     */
    public function transfer()
    {
      $id = $this->request->get('id', '', 'intval');
      $this->assign('id', $id);
      return $this->fetch();
    }

    /**
     * 转账失败
     */
    public function transferFail()
    {
      $post = $this->request->post();
      $result = WithdrawLogic::transferFail($post);
      if($result['code']) {
        return $this->_success($result['msg']);
      }else{
        return $this->_error($result['msg']);
      }
    }

    /**
     * 转账成功
     */
    public function transferSuccess()
    {
      $post = $this->request->post();
      $result = WithdrawLogic::transferSuccess($post);
      if($result['code']) {
        return $this->_success($result['msg']);
      }else{
        return $this->_error($result['msg']);
      }
    }

    /**
     * 提现结果查询
     */
    public function search()
    {
      $id = $this->request->post('id', '', 'intval');
      $result = WithdrawLogic::search($id);
      if($result['code']) {
        return $this->_success($result['msg']);
      }else{
        return $this->_error($result['msg']);
      }
    }

    /**
     * 提现失败
     */
    public function withdrawFailed() {
      $id = $this->request->post('id', '', 'intval');
      $result = WithdrawLogic::withdrawFailed($id);
      $this->_success('提现失败已回退佣金');
    }
}