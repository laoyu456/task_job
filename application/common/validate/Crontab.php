<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\common\validate;


use think\Db;
use think\Validate;

class Crontab extends Validate
{
    protected $rule = [

    ];
    protected $message = [
    ];


    public function ruleFormat($rule)
    {
        $arr = explode(' ', $rule);
        if (count($arr) != 5) {
            return false;
        }
        list($minute, $hour, $day_of_month, $month, $day_of_week) = $arr;
    }

}