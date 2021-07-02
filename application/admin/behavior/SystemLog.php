<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: LikeShop-令狐冲
// +----------------------------------------------------------------------


namespace app\admin\behavior;


use think\Db;
use think\Request;

class SystemLog
{
    /**
     * 记录后台操作日志
     * @param Request $request
     */
    public function run(Request $request)
    {
        $admin_info = session('admin_info');
        if (!session('admin_info')) {
            return;
        }
        $data = [
            'admin_id' => $admin_info['id'],
            'account' => $admin_info['account'],
            'name' => $admin_info['name'],
            'create_time' => time(),
            'uri' => url(),
            'type' => $request->isPost() ? 'POST' : 'GET',
            'param' => json_encode($request->param(),JSON_UNESCAPED_UNICODE),
            'ip' => $request->ip(),
        ];
        Db::name('system_log')->insert($data);
    }
}