<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\validate;

use think\Db;
use think\Validate;

class DistributionMember extends Validate
{
    protected $rule = [
        'id|参数缺失' => 'require',
        'type|参数缺失' => 'require',
        'user_id|参数缺失' => 'require',
        'change_type|参数缺失' => 'require',
        'referrer_sn' => 'requireIf:change_type,appoint|checkReferrer',
        // 添加分销会员场景
        'sn'      => 'require|max:10',  //会员编号
        'remarks' => 'max:100' //分销会员添加备注信息
    ];

    protected $message = [
        'referrer_sn.requireIf' => '请填写上级推荐人的编号',
        'sn.require' => '请填写会员编号',
        'remarks.max'    => '备注信息不能超过100个字符'
    ];

    //添加分销会员
    public function sceneAddMember()
    {
        $this->only(['sn', 'remarks']);
    }

    //审核分销会员
    public function sceneAudit()
    {
        $this->only(['id', 'type']);
    }

    //冻结/解冻分销会员
    public function sceneFreeze()
    {
        $this->only(['id', 'type']);
    }

    //修改上级
    public function sceneUpdateLeader()
    {
        $this->only(['user_id', 'change_type', 'referrer_sn']);
    }


    //验证推荐人
    protected function checkReferrer($value, $rule, $data = [])
    {
        if (empty($value) && $data['change_type'] == 'clear'){
            return true;
        }

        $referrer = Db::name('user')->where('sn', $value)->find();

        if (!$referrer){
            return '推荐人不存在';
        }

        if ($referrer['id'] == $data['user_id']){
            return '上级推荐人不能是自己';
        }

        if ($referrer['is_distribution'] == 0){
            return '对方不是分销会员';
        }

        $ancestor_relation = explode(',', $referrer['ancestor_relation']);
        if (!empty($ancestor_relation) && in_array($data['user_id'], $ancestor_relation)) {
            return '不能循环推荐';
        }

        return true;
    }

}