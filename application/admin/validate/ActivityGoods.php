<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\validate;
use think\Db;
use think\Validate;


class ActivityGoods extends Validate{
    protected $rule = [
        'activity_id'    => 'require',
        'goods_list'     => 'checkGoods',

    ];
    protected $message = [
        'activity_id.require'       => '请选择活动专区',

    ];
    public function sceneAdd()
    {
        $this->remove('id', ['require']);
    }

    protected function checkGoods($value,$rule,$data){
        $activity_goods = Db::name('activity_goods')
                        ->where(['activity_id'=>$data['activity_id'],'goods_id'=>$value[0]['goods_id'],'del'=>0])
                        ->find();
        if($activity_goods){
            return '该商品已在该活动专区中，请勿重复添加';
        }
        return true;
    }
}