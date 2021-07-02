<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\model;


use think\Model;

/**
 * 分销会员
 * Class DistributionMember
 * @package app\common\model
 */
class DistributionMember extends Model
{
    protected $name = 'distribution_member_apply';

    //分销会员申请状态
    const STATUS_WAIT_AUDIT = 0;     //待审核
    const STATUS_AUDIT_SUCCESS = 1;  //审核通过
    const STATUS_AUDIT_ERROR = 2;   //审核拒绝


    //分销会员申请状态
    public static function getApplyStatus($status = true)
    {
        $desc = [
            self::STATUS_WAIT_AUDIT => '待审核',
            self::STATUS_AUDIT_SUCCESS => '审核通过',
            self::STATUS_AUDIT_ERROR => '审核拒绝',
        ];
        if ($status === true) {
            return $desc;
        }
        return $desc[$status] ?? '未知';
    }
}