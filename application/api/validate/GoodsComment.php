<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\validate;


use think\Validate;

class GoodsComment extends Validate
{

    protected $rule = [
        'goods_comment'         =>'require',
        'description_comment'   =>'require',
        'service_comment'       =>'require',
        'express_comment'       =>'require',

    ];

    protected $message = [
        'goods_comment.require'         =>'请进行商品评价',
        'description_comment.require'   =>'请进行描述相符评价',
        'service_comment.require'       =>'请进行服务态度评价',
        'express_comment.require'       =>'请进行配送服务评价',
    ];


    /**
     * 添加
     */
    public function sceneAdd()
    {
        return $this->remove('id','require');
    }

    /**
     * 编辑
     */
    public function sceneEdit()
    {

    }

    /**
     * 删除
     */
    public function sceneDel()
    {

        return $this->only(['id']);
    }

}