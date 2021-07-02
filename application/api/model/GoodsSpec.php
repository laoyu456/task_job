<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\model;
use think\Model;

class GoodsSpec extends Model {
    public function GoodsSpecValue(){
        return $this->hasMany('GoodsSpecValue','spec_id','id');
    }
}