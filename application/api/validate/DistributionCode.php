<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\validate;


use think\Db;
use think\Validate;

class DistributionCode extends Validate
{
    protected $rule = [
        'code' => 'require|checkCode',
    ];

    protected $message = [
        'code.require' => '请输入邀请码',
    ];

    /**
     * 填写邀请码验证
     * @param $code
     * @param $other
     * @param $data
     * @return bool|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    protected function checkCode($code, $other, $data)
    {
        $my_first_leader = Db::name('user')
            ->where(['id' => $data['user_id']])
            ->value('first_leader');
        if ($my_first_leader) {
            return '已有邀请人';
        }
        $first_leader = Db::name('user')
            ->field(['is_distribution', 'id', 'ancestor_relation'])
            ->where(['distribution_code' => $code])
            ->find();
        if (empty($first_leader)) {
            return '请填写有效的邀请码';
        }
        if ($first_leader['is_distribution'] == 0) {
            return '对方不是分销会员';
        }
        if ($first_leader['id'] == $data['user_id']) {
            return '不能邀请自己';
        }
        $ancestor_relation = explode(',', $first_leader['ancestor_relation']);
        if (!empty($ancestor_relation) && in_array($data['user_id'], $ancestor_relation)) {
            return '不能填写所有下级的任意一人的邀请码';
        }

        return true;
    }
}