<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\validate;
use think\Validate;

class User extends Validate{

    protected $rule = [
        'id'        => 'require',
        'nickname'  => 'require',
        'avatar'    => 'require',
//        'mobile'    => "mobile|unique:user,mobile^del"
        'mobile'    => "mobile|checkMobile"
    ];

    protected $message = [
        'id.require'       => '请选择会员',
        'nickname.require' => '请输入会员昵称',
        'avatar.require'   => '请输入会员头像',
        'mobile.mobile'    => '请输入正确手机号',
        'mobile.unique'    => '手机号已被使用',
    ];


    protected function checkMobile($value, $rule, $data)
    {
        $user = \app\admin\model\User::where([
            ['id', '<>', $data['id']],
            ['mobile', '=', $value],
            ['del', '=', 0]
        ])->find();

        if ($user) {
            return '手机号已被使用';
        }
        return true;
    }
}