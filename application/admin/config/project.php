<?php
// +----------------------------------------------------------------------
// | 爱勤兼职任务管理
// +----------------------------------------------------------------------
// | Author: ape-liu
// +----------------------------------------------------------------------

use think\facade\Env;

return [
    //免登录页面
    'free_login' => ['account_login'],

    //样式显示
    'env_name' => Env::get('project.env_name', '本地环境-'),
    'admin_name' => Env::get('project.admin_name', '爱勤兼职任务管理后台'),
    'theme_color' => 'layui-bg-blue',
    'theme_button' => 'layui-btn-normal',
];