<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\validate;
use think\Validate;

class ActivityArea extends Validate{
    protected $rule = [
        'id'        => 'require',
        'name'      => 'require|unique:ActivityArea,name^del',
        'title'     => 'require|unique:ActivityArea,title^del',
        'image'     => 'require'
    ];
    protected $message = [
        'id.require'        => '请选择编辑的活动专区',
        'name.require'      => '请输入活动名称',
        'name.unique'       => '活动名称重复',
        'title.require'     => '请输入标题',
        'title.unique'      => '活动标题重复',
        'image.require'     => '请上传图片',
    ];
    public function sceneAdd()
    {
        $this->remove('id', ['require']);

    }

}