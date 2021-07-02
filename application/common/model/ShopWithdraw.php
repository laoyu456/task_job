<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\common\model;
use think\Model;

class ShopWithdraw extends Model{

    const WAIT_AUDIT = 1;
    const WAIT_REMITTANCE = 2;
    const SUCCEED_REMITTANCE =3;
    const AUDIT_REFUSE = 4;


    public static function getStatus($from){
        $desc = [
            self::WAIT_AUDIT            => '待审核',
            self::WAIT_REMITTANCE       => '待转账',
            self::SUCCEED_REMITTANCE    => '已转账',
            self::AUDIT_REFUSE          => '审核拒绝',
        ];
        if($from === true){
            return $desc;
        }
        return $desc[$from] ??  '';
    }
    public function getCreateTimeAttr($value,$data){
        return date('Y-m-d H:i:s',$value);
    }

    public function getMoneyAttr($value,$data){
        return '￥'.$value;
    }

    public function getStatusDescAttr($value,$data){
        return self::getStatus($data['status']);
    }
    //todo 提现方式
    public function getWithdrawWayAttr($value,$data){
        $name = '银行卡';
        if($value == 2){
            $name = '支付宝';
        }
        return $name;
    }
    public function getRemittanceTimeAttr($value,$data){
        if($value){
            return date('Y-m-d H:i:s',$value);
        }
        return $value;
    }


}