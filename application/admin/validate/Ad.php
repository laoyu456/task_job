<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\validate;

use think\Validate;

class Ad extends Validate
{

    protected $rule = [
        'id'        => 'require',
        'name'      => 'require|unique:ad,name^del^client|max:60',
        'client'    => 'require',
        'pid'       => 'require',
        'image'     => 'require',
        'link_type' => 'checkLink',

    ];

    protected $message = [
        'id.require'        => 'id不可为空',
        'name.require'      => '请输入广告标题',
        'name.unique'       => '广告标题已存在',
        'name.max'          => '广告标题过长',
        'client.require'    => '请选择广告终端',
        'pid.require'       => '请选择广告位置',
        'image.require'     => '请上传广告图片',



    ];
    protected function sceneAdd()
    {
        $this->remove(['id']);
    }



    public function sceneDel()
    {
        $this->only(['id']);
    }


    public function checkLink($value,$rule,$data){
        if($value){
            switch ($value){
                case '1':
                    if($data['page'] === ''){
                        return '请选择跳转商城页面';
                    }
                    break;
                case '2':
                    if(empty($data['goods_id'])){
                        return '请选择跳转的商品';
                    }
                    break;
                case '3':
                    if(empty($data['url'])){
                        return '请输入链接';
                    }
                    break;
            }
        }
        return true;
    }

}