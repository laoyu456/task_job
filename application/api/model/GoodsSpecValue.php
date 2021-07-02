<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\model;
use think\Model;

class GoodsSpecValue extends Model {
    public function GoodsSepc(){
        return $this->hasMany('GoodsSpec', 'goods_id', 'id');
    }

}