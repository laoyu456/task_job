<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu-段誉
// +----------------------------------------------------------------------


namespace app\common\logic;

use app\common\server\AliPayServer;

class AliPayLogic
{

    //支付宝app支付
    public static function appPay($order)
    {
        $data = [
            'body'=>'商品简述',
            'subject'=>'商品名',
            'out_trade_no'=> $order['sn'],
            'timeout_express'=>'30m',
            'total_amount'=> $order['order_amount'],
            'product_code'=>'FAST_INSTANT_TRADE_PAY'
        ];
        $notify_url = 'http://tp.test/api/index/notify';

        $alipay = new AliPayServer();
        return $alipay->appAlipay($data, $notify_url);
    }
}