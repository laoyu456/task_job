<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\logic;

use app\admin\model\HelpCategory;
use think\Db;

class HelpCategoryLogic
{

    public static function lists($get)
    {
        $where = [];
        $where[] = ['del', '=', '0'];

        $cate = new HelpCategory();
        $count = $cate->where($where)->count();
        $list = $cate->where($where)
            ->page($get['page'], $get['limit'])
            ->append(['is_show_text'])
            ->order('id desc')
            ->select();

        return ['count' => $count, 'lists' => $list];
    }

    /**
     * Desc: 添加文章分类
     * @param $post array 文章分类数据
     * @return boolean
     */
    public static function addHelpCategory($post)
    {
        $help_category = new HelpCategory();
        $data = [
            'name' => $post['name'],
            'is_show' => $post['is_show'],
            'create_time' => time(),
        ];
        return $help_category->save($data);
    }

    /**
     * Desc: 编辑文章分类
     * @param $post array 文章分类数据
     * @return boolean
     */
    public static function editHelpCategory($post)
    {
        $help_category = new HelpCategory();
        $data = [
            'name' => $post['name'],
            'is_show' => $post['is_show'],
            'update_time' => time(),
        ];
        return $help_category->save($data, ['id' => $post['id'], 'del' => 0]);
    }

    /**
     * Desc: 删除文章分类
     * @param $id int 文章分类id
     * @return boolean
     */
    public static function delHelpCategory($id)
    {
        $help_category = new HelpCategory();
        $data = [
            'update_time' => time(),
            'del' => 1,
        ];
        return $help_category->save($data, ['id' => $id, 'del' => 0]);
    }

    /**
     * Desc: 获取单条文章分类
     * @param $id int 文章分类id
     * @return boolean
     */
    public static function getHelpCategory($id = 0)
    {
        $where[] = ['del', '=', 0];
        if ($id) {
            $where[] = ['id', '=', $id];
        }
        $help_category = new HelpCategory();
        return $help_category->where($where)->column('*', 'id');
    }

    public static function switchStatus($post)
    {
        $data = [
            'is_show' => $post['is_show'],
            'update_time' => time(),
        ];
        return Db::name('help_category')->where(['del' => 0, 'id' => $post['id']])->update($data);
    }
}
