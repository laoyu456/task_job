<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\model;

use think\Model;

class HelpCategory extends Model
{
    protected $name = 'help_category';

    public function getCreateTimeAttr($value, $data)
    {
        if($value){
            return date('Y-m-d H:i:s', $value);
        }
        return $value;
    }

    public function getIsShowTextAttr($value, $data)
    {
        if ($data['is_show'] == 1){
            return '启用';
        }
        return '停用';
    }
}