<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\validate;


use app\common\model\Client_;
use think\Validate;

class OpLogin extends Validate
{
    protected $rule = [
        'code' => 'require',
        'client' => 'require|in:'.Client_::ios.','.Client_::android,
    ];
}