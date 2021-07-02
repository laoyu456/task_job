<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\common\logic;


class LogicBase
{
    public static function dataSuccess($msg = '', $data = [], $code = 1, $show = 0)
    {
        return data_success($msg, $data, $code, $show);
    }


    public static function dataError($msg = '', $data = [], $code = 0, $show = 1)
    {
        return data_error($msg, $data, $code, $show);
    }

}