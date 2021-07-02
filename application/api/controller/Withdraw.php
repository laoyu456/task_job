<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\controller;

use app\api\logic\WithdrawLogic;

class Withdraw extends ApiBase
{

    //提现申请
    public function apply()
    {
        $post = $this->request->post();
        $post['user_id'] = $this->user_id;
        $check = $this->validate($post, 'app\api\validate\Withdraw.apply');
        if (true !== $check) {
            $this->_error($check);
        }
        return WithdrawLogic::apply($this->user_id, $post);
    }

    //提现配置
    public function config()
    {
        $data = WithdrawLogic::config($this->user_id);
        $this->_success('', $data);
    }


    //提现记录
    public function records()
    {
        $get = $this->request->get();
        $page = $this->request->get('page_no', $this->page_no);
        $size = $this->request->get('page_size', $this->page_size);
        $res = WithdrawLogic::records($this->user_id, $get, $page, $size);
        $this->_success('', $res);
    }


    //提现详情
    public function info()
    {
        $get = $this->request->get('');
        $check = $this->validate($get, 'app\api\validate\Withdraw.info');
        if (true !== $check) {
            $this->_error($check);
        }
        $this->_success('', WithdrawLogic::info($get['id'], $this->user_id));
    }
}