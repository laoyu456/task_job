<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\logic;
use app\common\server\UrlServer;
use think\Db;

class UserPrivilegeLogic{

    public static function lists($get){
        $count = Db::name('user_privilege')
                ->where(['del'=>0])
                ->count();

        $list = Db::name('user_privilege')
                ->where(['del'=>0])
                ->page($get['page'], $get['limit'])
                ->select();

        foreach ($list as &$item) {
            $item['image'] = UrlServer::getFileUrl($item['image']);
        }

        return ['count' => $count, 'list' => $list];

    }

    public static function add($post){
        $post['create_time'] = time();
        $post['del'] = 0;
        return Db::name('user_privilege')->insert($post);
    }

    public static function edit($post){
        $post['update_time'] = time();
        return Db::name('user_privilege')->where(['id'=>$post['id']])->update($post);
    }

    public static function del($id){
        $update_date = [
            'update_time'       => time(),
            'del'               => 1,
        ];
        return Db::name('user_privilege')->where(['id'=>$id,'del'=>0])->update($update_date);
    }

    public static function getPrivilege($id){
        $detail = Db::name('user_privilege')->where(['id'=>$id,'del'=>0])->find();
        $detail['abs_image'] = UrlServer::getFileUrl($detail['image']);
        return $detail;
    }

}