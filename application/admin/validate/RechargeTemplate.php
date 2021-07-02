<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\validate;
use think\Validate;

class RechargeTemplate extends Validate{
    protected $rule = [
        'money'          => 'require',
    ];
    protected $message = [
        'money.require'     => '请输入充值金额',
    ];
}