<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\validate;

use app\common\logic\SmsLogic;
use app\common\model\Client_;
use think\Db;
use think\Validate;

class UpdateUser extends Validate
{
    protected $rule = [
        'field' => 'require|checkField',
        'value' => 'require',
    ];

    protected $message = [
        'field.require' => '参数缺失',
        'value.require' => '请填写完整',
    ];


    public function sceneSet()
    {
        $this->only(['field', 'value']);
    }

    protected function checkField($value, $rule, $data)
    {
        $allow_field = ['nickname', 'sex', 'avatar', 'mobile'];
        if (in_array($value, $allow_field)) {
            return true;
        }
        return '操作失败';
    }
}