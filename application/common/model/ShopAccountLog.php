<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\common\model;
use think\Model;

class ShopAccountLog extends Model{
    const ORDER_SETTLE = 100;           //店铺结算
    const WITHDRAW_AUDIT = 200;         //店铺提现
    const WITHDRAW_REFUSE = 201;        //店铺提现拒绝


    public static function getSourceTypeDesc($from){
        $desc = [
            self::ORDER_SETTLE      => '店铺结算',
            self::WITHDRAW_AUDIT    => '店铺提现',
            self::WITHDRAW_REFUSE   => '店铺提现拒绝',
        ];
        if($from === true){
            return $desc;
        }
        return $desc[$from] ?? '账户变动';
    }

    public static function getRemarkDesc($from,$source_sn,$remark){
        $desc = [
            self::ORDER_SETTLE      => '结算单号：'.$source_sn,
            self::WITHDRAW_AUDIT    => '提现单号：'.$source_sn,
        ];
        return $desc[$from] ?? $remark;
    }
}