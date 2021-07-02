<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\common\model;
use think\Model;

class UserTask extends Model{
    //会员任务
    const USERTASK = [
        [
            'type'          =>'SatisfactionIntegral',
            'name'          =>'满足积分{$num}',
            'real_name'     =>'积分数',
            'max_number'    =>0,
            'min_number'    =>0,
            'unit'          =>'分'
        ],
        [
            'type'          =>'ConsumptionAmount',
            'name'          =>'消费满{$num}',
            'real_name'     =>'消费金额',
            'max_number'    =>0,
            'min_number'    =>0,
            'unit'          =>'元'
        ],
        [
            'type'          =>'ConsumptionFrequency',
            'name'          =>'消费{$num}',
            'real_name'     =>'消费次数',
            'max_number'    =>0,
            'min_number'    =>0,
            'unit'          =>'次'
        ],
        [
            'type'          =>'CumulativeAttendance',
            'name'          =>'累计签到{$num}',
            'real_name'     =>'累计签到',
            'max_number'    =>365,
            'min_number'    =>1,
            'unit'          =>'天'
        ],
        [
            'type'          =>'SharingTimes',
            'name'          =>'分享给朋友{$num}',
            'real_name'     =>'分享给朋友',
            'max_number'    =>1000,
            'min_number'    =>1,
            'unit'          =>'次'
        ],
        [
            'type'          =>'InviteGoodFriends',
            'name'          =>'邀请好友{$num}成为下线',
            'real_name'     =>'邀请好友成为下线',
            'max_number'    =>1000,
            'min_number'    =>1,
            'unit'          =>'人'
        ],
        [
            'type'          =>'InviteGoodFriendsLevel',
            'name'          =>'邀请好友{$num}成为会员',
            'real_name'     =>'邀请好友成为会员',
            'max_number'    =>1000,
            'min_number'    =>1,
            'unit'          =>'人'
        ],
    ];

}