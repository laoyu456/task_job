<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\controller;

use app\api\logic\ArticleLogic;


class Article extends ApiBase
{

    public $like_not_need_login = ['lists', 'category', 'detail'];

    public function lists()
    {
        $id = $this->request->get('id');
        $article = ArticleLogic::lists($id, $this->page_no, $this->page_size);
        $this->_success('获取成功', $article);
    }


    public function category()
    {
        $article = ArticleLogic::CategoryLists();
        $this->_success('获取成功', $article);
    }


    public function detail()
    {
        $id = $this->request->get('id');
        $client = $this->request->get('client',1);
        if (!$id) {
            $this->_error('参数缺失');
        }
        $article_detail = ArticleLogic::getArticleDetail($id,$client);
        $this->_success('获取成功', $article_detail);
    }
}