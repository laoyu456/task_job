<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\controller;
use app\api\logic\RechargeLogic;
class Recharge extends ApiBase{
    public $like_not_need_login = ['rechargetemplate'];
    /**
     * note 充值模板
     * create_time 2020/10/24 15:56
     */
    public function rechargeTemplate(){
        $list = RechargeLogic::getTemplate();
        $this->_success('',$list);
    }

    /**
     * note 充值
     * create_time 2020/10/24 15:56
     */
    public function recharge(){
        $post = $this->request->post();
        $result = $this->validate($post,'app\api\validate\Recharge');

        if($result === true){
            $data = RechargeLogic::recharge($this->user_id,$this->client,$post);
            if($data){
                $this->_success('',$data);
            }
            $this->_error('信息获取错误');

        }
        $this->_error($result);

    }

    /**
     * 充值记录
     */
    public function rechargeRecord()
    {
      $get = $this->request->get();
      $get['page_no'] = $get['page_no'] ?? $this->page_no;
      $get['page_size'] = $get['page_size'] ?? $this->page_size;
      $get['user_id'] = $this->user_id;
      $result =  RechargeLogic::rechargeRecord($get);
      return $this->_success('',$result);
    }
}