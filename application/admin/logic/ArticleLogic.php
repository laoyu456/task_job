<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\logic;

use app\admin\model\Article;
use app\common\server\UrlServer;
use think\Db;

class ArticleLogic
{

    public static function lists($get, $category)
    {
        $article = Db::name('article');

        $where = [];
        $where[] = ['del', '=', '0'];
        if (isset($get['is_notice']) && $get['is_notice'] != '') {
            $where[] = ['is_notice', '=', $get['is_notice']];
        }

        if (isset($get['title']) && $get['title']) {
            $where[] = ['title', 'like', '%' . $get['title'] . '%'];
        }

        if (isset($get['cid']) && $get['cid']) {
            $where[] = ['cid', '=', $get['cid']];
        }


        $count = $article->where($where)->count();
        $list = $article->where($where)->page($get['page'], $get['limit'])->order('id desc')->select();
        foreach ($list as &$item) {
            $item['image'] = UrlServer::getFileUrl($item['image']);
            $item['create_time'] = date('Y-m-d H:i:s', $item['create_time']);
            if (isset($category[$item['cid']])) {
                $item['cat_name'] = $category[$item['cid']]['name'];
            }
            if ($item['is_show'] == 1) {
                $item['is_show_text'] = '显示';
            } else {
                $item['is_show_text'] = '隐藏';
            }

            if ($item['is_notice'] == 1) {
                $item['is_notice'] = '是';

            } else if ($item['is_notice'] == 0) {
                $item['is_notice'] = '否';
            }
        }
        return ['count' => $count, 'lists' => $list];
    }


    public static function addArticle($post)
    {
        $article = new Article();

        $data = [
            'title' => $post['title'],
            'cid' => $post['cid'],
            'image' => $post['image'],
            'content' => $post['content'],
            'is_show' => $post['is_show'],
            'is_notice' => $post['is_notice'],
            'create_time' => time(),
            'sort' => $post['sort'],
            'synopsis' => $post['synopsis']
        ];
        return $article->save($data);
    }

    public static function editArticle($post)
    {
        $article = new Article();
        $data = [
            'title' => $post['title'],
            'cid' => $post['cid'],
            'image' => $post['image'],
            'content' => $post['content'],
            'is_show' => $post['is_show'],
            'is_notice' => $post['is_notice'],
            'update_time' => time(),
            'sort' => $post['sort'],
            'synopsis' => $post['synopsis']

        ];
        return $article->save($data, ['id' => $post['id'], 'del' => 0]);
    }

    public static function getArticle($id)
    {
        $article = new Article();
        $detail = $article::get(['id' => $id, 'del' => 0]);
        $detail['abs_image'] = UrlServer::getFileUrl($detail['image']);
        return $detail;
    }

    public static function delArticle($id)
    {
        $article = new Article();

        $data = [
            'del' => time(),
            'update_time' => 1
        ];
        return $article->save($data, ['id' => $id, 'del' => 0]);
    }

    public static function switchStatus($post)
    {
        $data = [
            'is_show' => $post['is_show'],
            'update_time' => time(),
        ];
        return Db::name('article')->where(['del' => 0, 'id' => $post['id']])->update($data);
    }

}