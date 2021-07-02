<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\logic;

use app\admin\model\Help;
use app\common\server\UrlServer;
use think\Db;

class HelpLogic
{

    public static function lists($get, $category)
    {
        $where = [];
        $where[] = ['del', '=', '0'];
        if (isset($get['is_show']) && $get['is_show'] != '') {
            $where[] = ['is_show', '=', $get['is_show']];
        }

        if (isset($get['title']) && $get['title']) {
            $where[] = ['title', 'like', '%' . $get['title'] . '%'];
        }

        if (isset($get['cid']) && $get['cid']) {
            $where[] = ['cid', '=', $get['cid']];
        }

        $help_count = Db::name('help')->where($where)->count();
        $help_list = Db::name('help')->where($where)->page($get['page'], $get['limit'])->order('id desc')->select();

        foreach ($help_list as &$item) {
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
        }
        return ['count' => $help_count, 'lists' => $help_list];
    }


    public static function addHelp($post)
    {
        $help = new Help();
        $data = [
            'title' => $post['title'],
            'cid' => $post['cid'],
            'image' => $post['image'],
            'content' => $post['content'],
            'is_show' => $post['is_show'],
            'create_time' => time(),
            'sort' => $post['sort'],
            'synopsis' => $post['synopsis'],
            'del' => 0
        ];
        return $help->save($data);
    }

    public static function editHelp($post)
    {
        $help = new Help();
        $data = [
            'title' => $post['title'],
            'cid' => $post['cid'],
            'image' => $post['image'],
            'content' => $post['content'],
            'is_show' => $post['is_show'],
            'update_time' => time(),
            'sort' => $post['sort'],
            'synopsis' => $post['synopsis']
        ];
        return $help->save($data, ['id' => $post['id'], 'del' => 0]);
    }

    public static function getHelp($id)
    {
        $help = new Help();
        $detail =  $help::get(['id' => $id, 'del' => 0]);
        $detail['abs_image'] = UrlServer::getFileUrl($detail['image']);
        return $detail;
    }

    public static function delHelp($id)
    {
        $help = new Help();

        $data = [
            'del' => time(),
            'update_time' => 1
        ];
        return $help->save($data, ['id' => $id, 'del' => 0]);
    }

    public static function switchStatus($post)
    {
        $data = [
            'is_show' => $post['is_show'],
            'update_time' => time(),
        ];
        return Db::name('help')->where(['del' => 0, 'id' => $post['id']])->update($data);
    }

}