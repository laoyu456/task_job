<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\model;
use app\common\model\DistributionOrder;
use app\common\server\UrlServer;
use think\Db;
use think\Model;

class User extends Model{

    public function getAvatarAttr($value,$data){
        if($value){
            return UrlServer::getFileUrl($value);
        }
        return $value;
    }

    public function getLevelAttr($value,$data){
        $level_name = '普通买家';
        if($value){
            $level_name = Db::name('user_level')->where(['del'=>0,'id'=>$value])->value('name');
        }
        return $level_name;

    }

    public function getFansDistributionAttr($value,$data)
    {
        $distribution_order = Db::name('distribution_order_goods')
            ->field('count(id) as order_num, sum(money) as money')
            ->where(['user_id' => $data['id'], 'status' => DistributionOrder::STATUS_SUCCESS])
            ->find();

        $where1 = [
            ['first_leader', '=', $data['id']],
        ];
        $where2 = [
            ['second_leader', '=', $data['id']],
        ];
        $fans = Db::name('user')
            ->whereOr([$where1,$where2])
            ->count();

        return [
            'fans' => $fans,
            'order_num' => $distribution_order['order_num'] ?? 0,
            'money' => $distribution_order['money'] ?? 0,
        ];
    }
}