<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\controller;

use app\api\logic\HelpLogic;


class Help extends ApiBase
{
    public $like_not_need_login = ['lists', 'category', 'detail'];

    public function lists()
    {
        $id = $this->request->get('id');
        $article = HelpLogic::lists($id, $this->page_no, $this->page_size);
        $this->_success('获取成功', $article);
    }

    public function category()
    {
        $help = HelpLogic::CategoryLists();
        $this->_success('获取成功', $help);
    }


    public function detail()
    {
        $id = $this->request->get('id');
        $client = $this->request->get('client',1);
        $help_detail = HelpLogic::getHelpDetail($id,$client);
        $this->_success('获取成功', $help_detail);
    }

}