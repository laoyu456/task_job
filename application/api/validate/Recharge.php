<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\validate;
use app\common\server\ConfigServer;
use think\Db;
use think\Validate;

class Recharge extends Validate{
    protected $rule = [
        'id'        => 'checkRecharge',
        'money'     => 'checkRecharge',
        'pay_way'   => 'require',
    ];
    protected $message = [
        'pay_way.require'   => '请选择支付方式',
    ];
    protected function checkRecharge($value,$rule,$data){
        $open_racharge = ConfigServer::get('recharge','open_racharge',0);
        if(!$open_racharge){
            return '充值功能已关闭，无法充值';
        }

        if(empty($value) && $data['money']){
            return '请输入充值金额';
        }

        if(isset($data['id'])){
            $remplate = Db::name('recharge_template')
                        ->where(['id'=>$value,'del'=>0])
                        ->find();
            if(empty($remplate)){
                return '该充值模板不存在';
            }

        }else{
            $min_money = ConfigServer::get('recharge', 'min_money',0);

            if($data['money'] < $min_money){
                return '最低充值金额为'.$min_money;
            }

        }

        return true;
    }
}