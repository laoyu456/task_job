<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\admin\validate;


use think\Validate;

class GoodsComment extends Validate
{
    protected $rule = [
        'reply' => 'require'

    ];

    protected $message = [
        'reply.require' =>'回复不能为空'

    ];



}