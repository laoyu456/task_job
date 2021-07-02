<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
/**
 * Created by PhpStorm.
 * User: wzg
 * Date: 2020/5/22 0022
 * Time: 16:45
 */

namespace app\admin\validate;


use think\Db;
use think\Validate;

class GoodsBrand extends Validate
{
    protected $rule = [
        'name'              => 'require|unique:GoodsBrand,name^del',
        'initial'           => 'require',
        'sort'              => 'integer|egt:0',
    ];

    protected $message = [
        'name.require'            => '品牌名称不能为空',
        'name.unique'             => '该名称已存在',
        'initial.require'         => '品牌首字母不能为空',
        'sort.integer'            => '排序请输入整数',
        'sort.egt'                => '排序值必须大于0',
    ];

    /**
     *  添加场景
     */
    public function sceneAdd()
    {

        $this->remove('id');
    }
}