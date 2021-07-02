<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\logic;
use app\common\logic\UserLevelLogic as CommonUserLevelLogic;
use app\common\server\UrlServer;
use think\Db;

class UserLevelLogic{

    public static function lists($get){

        $count = Db::name('user_level')->where(['del'=>0])->count();
        $list = Db::name('user_level')
                ->where(['del'=>0])
                ->page($get['page'], $get['limit'])
                ->select();

        foreach ($list as &$item){
            $item['privilege_list'] = '';

            $item['image'] = UrlServer::getFileUrl($item['image']);
            $item['background_image'] = UrlServer::getFileUrl($item['background_image']);
            if($item['privilege']){
                $privileges = explode(',',$item['privilege']);
                $privilege_list = Db::name('user_privilege')
                                ->where(['del'=>0,'id'=>$privileges])
                                ->column('name');
                $item['privilege_list'] = $privilege_list ? implode('、',$privilege_list) : '';
            }

        }
        return ['count' => $count, 'list' => $list];
    }

    public static function add($post){
        $now = time();
        $post['create_time'] = $now;
        $post['update_time'] = $now;
        $id = Db::name('user_level')->insertGetId($post);
        if($id){
            CommonUserLevelLogic::updateAllUserLevel($id);
        }
        return $id;
    }

    public static function edit($post){
        $now = time();
        $post['update_time'] = $now;
        Db::name('user_level')->where(['id'=>$post['id']])->update($post);
        CommonUserLevelLogic::updateAllUserLevel($post['id']);
        return true;
    }

    public static function del($id){
        $now = time();
        $post['update_time'] = $now;
        $post['del'] = 1;
        return Db::name('user_level')->where(['id'=>$id])->update($post);
    }

    public static function getUserLevel($id){
        $detail = Db::name('user_level')->where(['id'=>$id,'del'=>0])->find();
        $detail['abs_image'] = UrlServer::getFileUrl($detail['image']);
        $detail['abs_background_image'] = UrlServer::getFileUrl($detail['background_image']);
        return $detail;
    }

    public static function getPrivilegeList(){
        return Db::name('user_privilege')->where(['del'=>0])->field('id,name')->select();
    }

}