<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\model;

use think\Model;

class Cart extends Model
{
    protected $name = 'cart';

    const  IS_SELECTED = 1;//选中
    const  NO_SELECTED = 0;//未选中


    public function goods()
    {
        return $this->hasOne('Goods', 'goods_id', 'goods_id');
    }

}