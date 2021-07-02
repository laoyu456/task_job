<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\validate;
use think\Validate;

class Supplier extends Validate{
    protected $rule = [
        'name' => 'require|unique:supplier,name^del',
        'contact' => 'require',
        'tel' => 'require|mobile',
        'address' => 'require',
    ];

    protected $message = [
        'name.require'    => '供货商名称不能为空',
        'name.unique'     =>'该名称已存在',
        'contact.require'    => '联系人姓名不能为空',
        'tel.require'    => '联系电话不能为空',
        'address.require'    => '联系地址不能为空',
        'tel.mobile' => '请输入正确的手机格式'
    ];
}