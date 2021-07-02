<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\validate;

use think\Db;
use think\Validate;

class AdPosition extends Validate
{

    protected $rule = [
        'id' => 'require',
//        'ids' => 'checkDel',
        'name' => 'require|unique:ad_position,name^del^client|max:60',
//        'type' => 'require',
    ];

    protected $message = [
        'id.require' => 'id不能为空',
        'delData.require' => 'id不能为空',
        'name.require' => '请输入广告标题',
        'name.unique' => '广告标题已存在',
        'name.max' => '广告标题过长',
        'type.require' => '请选择广告类型',
        'attr.same'=>'属性为"系统默认"不可删除',
//        'width.require' => '请输入广告宽度',
//        'width.integer' => '请输入正确广告宽度',
//        'height.require' => '请输入广告高度',
//        'height.integer' => '请输入正确广告高度',
    ];

//    protected $data = [
//        'id'  => ['首页轮播广告','商品分类页轮播广告','新闻资讯轮播广告','帮助轮播广告'],
//        'attr'=>1,
//    ];

    protected function sceneAdd()
    {
        $this->remove(['id']);
    }

    protected function sceneEdit()
    {
    }

    protected function sceneDel()
    {
//        $this->only(['id']);
        $this->only(['delData','attr'])
            ->append('delData','require')
            ->append('delData','checkQuote')
            ->append('attr','checkAttr');
    }

    protected function checkAttr($value, $rule, $data){

        if (is_array($value)){
            foreach ($value as $item) {
                if ($item == 1) {
                    return '属性为"系统默认"不可删除';
                }
            }
        }elseif ($value == 1) {
            return '属性为"系统默认"不可删除';
        }

        return true;
    }

    protected function checkQuote($value, $rule, $data){

        if (is_array($value)){
            $pid = Db::name('ad')
                ->where(['pid'=>$value,'client'=>$data['client'],'del'=>0])
                ->select();
            if (!empty($pid)){
                return "请先删除引用该广告位的广告";
            }
        }else {
            $pid = Db::name('ad')
                ->where(['pid'=>$value,'client'=>$data['client'],'del'=>0])
                ->find();
            if (!empty($pid)){
                return "请先删除引用该广告位的广告";
            }
        }

        return true;
    }

}