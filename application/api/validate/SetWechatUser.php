<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\validate;


use think\Validate;

/**
 * 更新微信信息验证器
 * Class UpdateWechatUser
 * @package app\api\validate
 */
class SetWechatUser extends Validate
{
    protected $rule = [
        'nickname'  => 'require',
        'avatar'    => 'require',
        'sex'       => 'require',
    ];

    protected $message = [
        'nickname.require'  => '参数缺失',
        'avatar.require'    => '参数缺失',
        'sex.require'       => '参数缺失',
    ];

}