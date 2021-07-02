<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\validate;


use think\Db;
use think\Validate;

class DistributionApply extends Validate
{
    protected $rule = [
        'user_id' => 'apply',
        'real_name' => 'require',
//        'mobile' => 'require|mobile',
        'province' => 'require|number',
        'city' => 'require|number',
        'district' => 'require|number',
        'reason' => 'require',
    ];

    protected $message = [
        'real_name.require' => '请填写真实姓名',
        'mobile.require' => '请填写手机号码',
        'mobile.mobile' => '请填写正确的手机号码',
        'province.province' => '请填写省份',
        'city.city' => '请填写城市',
        'district.district' => '请填写县区',
    ];


    protected function apply($user_id, $other, $data)
    {
        $result = Db::name('distribution_member_apply')
            ->where('user_id', $user_id)
            ->where('status', 0)
            ->find();
        if ($result) {
            return '正在审核中，请勿重复提交';
        }
        return true;
    }
}