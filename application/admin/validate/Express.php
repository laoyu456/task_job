<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\validate;

use think\Validate;

class Express extends Validate
{
    protected $rule = [
        'name' => 'require|unique:Express,name^del',
    ];

    protected $message = [
        'name.unique' => '该名称已存在',
    ];
}