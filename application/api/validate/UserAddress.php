<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\validate;


use think\Validate;

class UserAddress extends Validate
{

    protected $rule = [
        'id'            => 'require|integer',
        'contact'       => 'require',
        'telephone'     => 'require|mobile',
        'province_id'   => 'require',
        'city_id' => 'require',
        'district_id' => 'require',
        'address'       => 'require',
        'is_default'    => 'require',
    ];

    protected $message = [
        'id.require'            => 'id不能为空',
        'id.integer'            => 'id参数错误',
        'contact.require'       => '收货人不能为空',
        'telephone.require'     => '联系方式不能为空',
        'telephone.mobile'      => '非有效手机号',
        'province_id.require'   => '所选地区不能为空',
        'city_id.require'       => '请选择完整地址',
        'district_id.require'   => '请选择完整地址',
        'address.require'       => '详细地址不能为空',
        'is_default.require'    => '是否默认不能为空',
        'province.require'      => '省不能为空',
        'city.require'          => '市不能为空',
        'district.require'      => '区不能为空',
    ];


    /**
     * 添加
     */
    public function sceneAdd()
    {
        return $this->remove('id');
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

    /**
     * 获取一条地址
     */
    public function sceneOne()
    {
        return $this->only(['id']);
    }

    /**
     * 设置默认地址
     */
    public function sceneSet()
    {
        return $this->only(['id']);
    }

    /**
     * 获取省市区id
     */
    public function sceneHandleRegion()
    {
        return $this->only(['province','city','district'])
            ->append('province','require')
            ->append('city','require')
            ->append('district','require');
    }

}