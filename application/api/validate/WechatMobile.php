<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\validate;

use think\Validate;

class WechatMobile extends Validate
{
    protected $rule = [
        'code' => 'require',
        'encrypted_data' => 'require',
        'iv' => 'require',
    ];
}