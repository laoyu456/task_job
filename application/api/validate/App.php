<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\validate;


use app\common\model\Client_;
use think\Validate;

class App extends Validate
{
    protected $rule = [
        'client' => 'require|in:'.Client_::ios.','.Client_::android,
    ];
}