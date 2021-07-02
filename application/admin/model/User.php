<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\model;
use app\common\server\UrlServer;
use think\Db;
use think\Model;

class User extends Model
{
    //头像
    public function getAvatarAttr($value,$data){
//        if($value){
//            return UrlServer::getFileUrl($value);
//        }
        return $value;
    }
    //加入时间
    public function getCreateTimeAttr($value,$data)
    {
        return date('Y-m-d H:i:s',$value);
    }


    //性别转换
    public function getSexAttr($value,$data){
        switch ($value){
            case 1:
                return '男';
            case 2:
                return '女';
            default:
                return '未知';
        }
    }

    public function getBirthdayAttr($value,$data){
        if($value){
            return date('Y-m-d',$value);
        }
        return $value;
    }

    public function getUserMoneyAttr($value,$data){
        return '￥'.$value;
    }

    public function getTotalOrderAmountAttr($value,$data){
        return '￥'.$value;
    }
    //最后登录时间
    public function getLoginTimeAttr($value,$data){
        return date('Y-m-d H:i:s',$value);
    }

    public function getLevelNameAttr($value,$data){
        $leve_name = '-';
        if($data['level']){
            $leve_name = Db::name('user_level')->where(['id'=>$data['level']])->value('name');
        }
        return $leve_name;
    }
    public function getGroupNameAttr($value,$data){
        $user_group = '-';
        if($data['group_id']){
            $user_group = Db::name('user_group')->where(['del'=>0,'id'=>$data['group_id']])->value('name');
        }
        return $user_group;

    }

    //获取粉丝
    public function getFansAttr($value, $data)
    {
        $fans = Db::name('user')->where('find_in_set(' . $data['id'] . ', ancestor_relation)')->count();
        return $fans;
    }

    //分销订单
    public function getDistributionOrderAttr($value, $data)
    {
        $info = Db::name('distribution_order_goods d')
            ->join('order_goods g', 'g.id = d.order_goods_id')
            ->join('order o', 'o.id = g.order_id')
            ->field('sum(d.id) as num, sum(money) as money, sum(order_amount) as amount')
            ->where(['d.user_id' => $data['id'], 'd.status' => 2])
            ->find();
        return $info;
    }

}
