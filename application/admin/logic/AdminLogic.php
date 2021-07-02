<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\admin\logic;


use app\admin\server\LoginServer;
use think\Db;

class AdminLogic
{
    /**
     * 管理员列表
     * @param $get
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function lists($get)
    {
        $role_id_name = Db::name('role')
            ->column('name', 'id');

        $where[] = ['del', '=', 0];
        if (isset($get['role_id']) && $get['role_id']) {
            $where[] = ['role_id', '=', $get['role_id']];
        }
        if (isset($get['name']) && $get['name']) {
            $where[] = ['name', 'like', "%{$get['name']}%"];
        }
        if (isset($get['account']) && $get['account']) {
            $where[] = ['account', 'like', "%{$get['account']}%"];
        }

        $admin_count = Db::name('admin')
            ->where($where)
            ->count();
        $admin_lists = Db::name('admin')
            ->where($where)
            ->field(['id', 'root', 'name', 'account', 'role_id', 'create_time', 'login_time', 'login_ip', 'disable'])
            ->select();
        foreach ($admin_lists as $k => $v) {
            if ($v['root'] == 1) {
                $admin_lists[$k]['role'] = '超级管理员';
            } else {
                $admin_lists[$k]['role'] = $role_id_name[$v['role_id']];
            }
            $admin_lists[$k]['create_time_str'] = date('Y-m-d H:i:s', $v['create_time']);
            $admin_lists[$k]['login_time'] = empty($v['login_time']) ? '' : date('Y-m-d H:i:s', $v['login_time']);
            $admin_lists[$k]['login_state'] = LoginServer::isLogin($v['id']) ? 1 : 0;
        }
        return ['count' => $admin_count, 'lists' => $admin_lists];
    }

    /**
     * 管理员信息
     * @param $admin_id
     * @return array|\PDOStatement|string|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function info($admin_id)
    {
        return Db::name('admin')->where(['id' => $admin_id])->find();
    }

    /**
     * 角色信息
     * @return array|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function roleLists()
    {
        return Db::name('role')
            ->where(['del' => 0])
            ->field(['id', 'name'])
            ->select();
    }

    /**
     * 添加管理员
     * @param $post
     * @return mixed
     */
    public static function addAdmin($post)
    {
        $time = time();
        $salt = substr(md5($time . $post['name']), 0, 4);//随机4位密码盐
        $password = create_password($post['password'], $salt);//生成密码
        $data = [
            'name'     => $post['name'],
            'root'     => 0,
            'account'  => $post['account'],
            'password' => $password,
            'salt'     => $salt,
            'role_id'  => $post['role_id'],
            'create_time' => $time,
            'disable' => $post['disable']
        ];
        return Db::name('admin')->insert($data);
    }

    /**
     * 编辑管理员
     * @param $post
     * @return mixed
     */
    public static function editAdmin($post)
    {
        $time = time();
        $data = [
            'name' => $post['name'],
            'account' => $post['account'],
            'role_id' => $post['role_id'],
            'update_time' => $time,
            'disable' => $post['disable']
        ];

        if ($post['password']) {
            $salt = Db::name('admin')->where(['id' => $post['id']])->value('salt');
            $data['password'] = create_password($post['password'], $salt);//生成密码
        }

        $role_id = Db::name('admin')->where(['id' => $post['id']])->value('role_id');
        if ($post['disable'] == 1 || $role_id != $post['role_id']) {
            //禁用管理员并强制下线
            LoginServer::setState($post['id'], false);
        }

        return Db::name('admin')->where(['id' => $post['id']])->update($data);
    }

    /**
     * 删除管理员
     * @param $admin_id
     * @return int|string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public static function delAdmin($admin_id)
    {
        $time = time();
        return Db::name('admin')
            ->where(['id' => $admin_id, 'del' => 0])
            ->update(['account' => $time . '_' . $admin_id, 'del' => 1]);
    }
}