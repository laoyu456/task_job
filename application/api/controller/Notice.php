<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\controller;


use app\common\logic\NoticeLogic;

class Notice extends ApiBase
{
    //消息中心
    public function index()
    {
        $this->_success('获取成功', NoticeLogic::index($this->user_id));
    }

    //列表
    public function lists()
    {
        $type = $this->request->get('type');
        $page = $this->request->get('page_no', $this->page_no);
        $size = $this->request->get('page_size', $this->page_size);
        $this->_success('获取成功', NoticeLogic::lists($this->user_id, $type, $page, $size));
    }

}