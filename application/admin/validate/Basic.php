<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\validate;

use think\captcha\Captcha;
use think\Db;
use think\facade\Cache;
use think\Validate;

class Basic extends Validate
{

    protected $rule = [
        'name'        => 'require',

    ];

    protected $message = [
        'name.require'        => '网站名称不可为空',


    ];
    protected function sceneAdd()
    {


    }

    protected function sceneEdit()
    {

    }

    public function sceneDel()
    {

    }


}