<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\validate;


use think\Validate;

class GoodsMoreSpecLists extends Validate
{
    protected $rule = [
//        'market_price'  => 'require|gt:0.01',
        'price'         => 'require|egt:0.01',
        'cost_price'    => 'require|egt:0.01',
        'stock'         => 'require|integer',
        'weight'        => 'egt:0',
        'volume'        => 'egt:0',
    ];

    protected $message = [
        'volume.require'        => '请输入体积',
        'volume.egt'             => '体积必须大于或等于0',
        'weight.require'        => '请输入重量',
        'weight.egt'             => '重量必须大于或等于0',
        'market_price.require'  => '请输入市场价',
        'market_price.egt'       => '市场价必须大于或等于0.01',
        'price.require'         => '请输入价格',
        'price.egt'              => '价格必须大于或等于0.01',
        'cost_price.require'    => '请输入成本价',
        'cost_price.egt'         => '成本价必须大于或等于0.01',
        'stock.require'         => '请输入库存',
        'stock.integer'         => '库存必须为整数',
    ];


}