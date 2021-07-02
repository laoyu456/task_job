<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\behavior;

use app\api\logic\DistributionLogic;
use app\api\model\Order;
use app\common\logic\IntegralLogic;
use app\common\logic\OrderGoodsLogic;
use app\common\logic\OrderLogLogic;
use app\common\model\AccountLog;
use app\common\model\OrderLog;


/**
 * 取消订单后的操作
 * Class CancelOrder
 * @package app\common\behavior
 */
class CancelOrder
{
    public function run($params)
    {

        $order_id = $params['order_id'];
        $handle_id = $params['handle_id'] ?? 0;
        $handle_type = $params['handle_type'] ?? 0;

        $order = Order::get(['id' => $order_id], ['orderGoods']);
        if (empty($order)){
            return false;
        }

        $user_id = $order['user_id'];

        //订单取消后更新分销订单为已失效状态
        DistributionLogic::setDistributionOrderFail($order_id);

        //下单扣库存的话(deduct_type=1),回退库存,支付后扣库存的话(deduct_type=0),判断订单是否支付才去回退库存
        OrderGoodsLogic::backStock($order['orderGoods'], $order['pay_status']);

        //扣除每日首单奖励
//        IntegralLogic::backIntegral($user_id, $order_id);

        //下单是否使用积分
        if ($order['use_integral'] > 0){
            IntegralLogic::handleIntegral(
                $user_id,
                $order['use_integral'],
                AccountLog::cancel_order_refund_integral,
                $order_id
            );
        }

        //订单日志
        switch ($handle_type){
            case OrderLog::TYPE_USER:
                OrderLogLogic::record(
                    OrderLog::TYPE_USER,
                    OrderLog::USER_CANCEL_ORDER,
                    $order_id,
                    $user_id,
                    OrderLog::USER_CANCEL_ORDER
                );
                break;

            case OrderLog::TYPE_SHOP:
                OrderLogLogic::record(
                    OrderLog::TYPE_SHOP,
                    OrderLog::SHOP_CANCEL_ORDER,
                    $order_id,
                    $handle_id,
                    OrderLog::SHOP_CANCEL_ORDER
                );
                break;

            default:
                OrderLogLogic::record(
                    OrderLog::TYPE_SYSTEM,
                    OrderLog::SYSTEM_CANCEL_ORDER,
                    $order_id,
                    0,
                    OrderLog::SYSTEM_CANCEL_ORDER
                );
        }
        return true;
    }
}