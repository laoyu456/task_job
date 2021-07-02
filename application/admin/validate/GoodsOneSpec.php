<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\validate;


use think\Validate;

class GoodsOneSpec extends Validate
{
    protected $rule = [
//        'one_market_price' => 'require|egt:0.01',
        'one_price'        => 'require|egt:0.01',
        'one_cost_price'   => 'require|egt:0.01',
        'one_stock'        => 'require|integer',
        'one_volume'       => 'egt:0',
        'one_weight'       => 'egt:0',
    ];

    protected $message = [
        'one_volume.require'        => '请输入体积',
        'one_volume.egt'             => '体积必须为大于或等于0',
        'one_weight.require'        => '请输入重量',
        'one_weight.egt'             => '重量必须为大于或等于0',
//        'one_market_price.require'  => '请输入市场价',
//        'one_market_price.gt'       => '市场价必须大于或等于0.01',
        'one_price.require'         => '请输入价格',
        'one_price.egt'              => '价格必须大于或等于0.01',
        'one_cost_price.require'    => '请输入成本价',
        'one_cost_price.egt'         => '成本价必须大于或等于0.01',
        'one_stock.require'         => '请输入库存',
        'one_stock.integer'         => '库存必须为整型',
    ];


}