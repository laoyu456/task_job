<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\admin\logic;
use think\Db;

class UserGroupLogic
{

    /*
     * 分组列表
     */
    public static function lists($get)
    {
        $where = [];
        $where[] = ['del','=', '0'];

        //查询条数
        $user_group_count = Db::name('user_group')
            ->where($where)
            ->count();
        //数据查询
        $user_group_list = Db::name('user_group')
            ->where($where)
            ->field(['id','name', 'remark'])
            ->page($get['page'],$get['limit'])
            ->select();

        //返回数据及页面条数
        return ['list'=>$user_group_list,'count' =>$user_group_count];
    }

    /**
     * 分组信息
     */
    public static function info($id)
    {
        return Db::name('user_group')->where(['id' => $id])->find();
    }

    /**
     * 添加
     */
    public static function addUserGroup($post)
    {
        $time = time(); //当前时间截
        $data = [
            'name'          => $post['name'],
            'remark'        => $post['remark'],
            'create_time'   => $time
        ];
        return Db::name('user_group')->insert($data); //插入数据
    }

    /**
     * 编辑
     */
    public static function editUserGroup($post)
    {
        $time = time(); //当前时间截
        $data = [
            'name'          => $post['name'],
            'remark'        => $post['remark'],
            'update_time'   => $time
        ];
        return Db::name('user_group')->where(['del' => 0, 'id' => $post['id']])->update($data);  //逻辑删除

    }

    /**
     * 删除
     */
    public static function delUserGroup($id)
    {
        $data = [
            'del'           => 1,
            'update_time'   => time(),
        ];
        return Db::name('user_group')->where(['del' => 0, 'id' => $id])->update($data);  //逻辑删除

    }


}