<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\logic;

use app\admin\model\ArticleCategory;
use think\Db;

class ArticleCategoryLogic
{
    public static function lists($get)
    {
        $where = [];
        $where[] = ['del', '=', '0'];

        $article_category = new ArticleCategory();
        $count = $article_category->where($where)->count();
        $list = $article_category->where($where)->page($get['page'], $get['limit'])->select();

        foreach ($list as &$item) {
            $item['create_time'] = date('Y-m-d H:i:s', $item['create_time']);
            if ($item['is_show'] == 1) {
                $item['is_show_text'] = '启用';
            } else {
                $item['is_show_text'] = '停用';
            }
        }
        return ['count' => $count, 'lists' => $list];
    }

    /**
     * Desc: 添加文章分类
     * @param $post array 文章分类数据
     * @return boolean
     */
    public static function addArticleCategory($post)
    {
        $article_category = new ArticleCategory();
        $data = [
            'name' => $post['name'],
            'is_show' => $post['is_show'],
            'create_time' => time(),
        ];
        return $article_category->save($data);
    }

    /**
     * Desc: 编辑文章分类
     * @param $post array 文章分类数据
     * @return boolean
     */
    public static function editArticleCategory($post)
    {
        $article_category = new ArticleCategory();
        $data = [
            'name' => $post['name'],
            'is_show' => $post['is_show'],
            'update_time' => time(),
        ];
        return $article_category->save($data, ['id' => $post['id'], 'del' => 0]);
    }

    /**
     * Desc: 删除文章分类
     * @param $id int 文章分类id
     * @return boolean
     */
    public static function delArticleCategory($id)
    {
        $article_category = new ArticleCategory();
        $data = [
            'update_time' => time(),
            'del' => 1,
        ];
        return $article_category->save($data, ['id' => $id, 'del' => 0]);
    }

    /**
     * Desc: 获取单条文章分类
     * @param $id int 文章分类id
     * @return boolean
     */
    public static function getArticleCategory($id = 0)
    {
        $where[] = ['del', '=', 0];
        if ($id) {
            $where[] = ['id', '=', $id];
        }
        $article_category = new ArticleCategory();
        return $article_category->where($where)->column('*', 'id');
    }

    public static function switchStatus($post)
    {
        $data = [
            'is_show' => $post['is_show'],
            'update_time' => time(),
        ];
        return Db::name('article_category')->where(['del' => 0, 'id' => $post['id']])->update($data);
    }
}
