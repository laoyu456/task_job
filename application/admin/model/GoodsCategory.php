<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\model;
use think\Model;

class GoodsCategory extends Model{
    /**
     * 获取商品分类子类
     * @return \think\model\relation\HasMany
     */
    public function sons()
    {
        return $this->hasMany(self::class, 'pid','id')->where(['del'=>'0']);
    }
}