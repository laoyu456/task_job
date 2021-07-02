<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\validate;


use think\Validate;

class GoodsMoreSpec extends Validate
{
    protected $rule = [
        'spec_name' => 'require|array|specNameRepetition',
        'spec_values' => 'require|array|specValueRepetition',
    ];

    protected $message = [

    ];

    /**
     * 检测规格名称是否重复
     * @param $value
     * @param $rule
     * @param $data
     * @return bool|string
     */
    public function specNameRepetition($value, $rule, $data)
    {
        if (count($value) != count(array_unique($value))) {
            return '规格名称重复';
        }
        return true;
    }

    public function specValueRepetition($value, $rule, $data)
    {
        foreach ($value as $k => $v) {
            $row = explode(',', $v);
            if (count($row) != count(array_unique($row))) {
                return '同一规格的规格值不能重复';
            }
        }
        return true;
    }

}