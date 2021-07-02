<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\logic;

use app\common\server\AliPayServer;
use app\common\server\WeChatPayServer;
use app\common\model\{Client_, Order, Pay, User};
use think\facade\Env;

class PaymentLogic extends LogicBase
{

    protected static $error = '';
    protected static $return_code = 0;

    /**
     * Notes: 错误信息
     * @return string
     * @author 段誉(2021/2/1 11:19)
     */
    public static function getError()
    {
        return self::$error;
    }

    /**
     * Notes: 返回状态码
     * @return int
     * @author 段誉(2021/2/1 11:19)
     */
    public static function getReturnCode()
    {
        return self::$return_code;
    }


    /**
     * Notes: 支付
     * @param $from
     * @param $order
     * @param $order_source
     * @return array|bool|string
     * @author 段誉(2021/2/1 11:19)
     */
    public static function pay($from, $order, $order_source)
    {
        switch ($order['pay_way']) {
            case Pay::WECHAT_PAY:

                $res = WeChatPayServer::unifiedOrder($from, $order, $order_source);
                if (false === $res) {
                    self::$error = WeChatPayServer::getError();
                }
                break;

            case Pay::ALI_PAY:

                $aliPay = new AliPayServer();
                $res = $aliPay->pay($from, $order, $order_source);
                if(false === $res) {
                    self::$error = $aliPay->getError();
                } else {
                    self::$return_code = 20001;//特殊状态码,用于前端判断
                }
                break;

            default:
                self::$error = '订单异常';
                $res = false;
        }
        return $res;
    }


    /**
     * Notes: pc预支付
     * @param $order
     * @param $pay_way
     * @author 段誉(2021/3/17 14:56)
     * @return array|bool|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function pcPay($order, $pay_way, $order_source = Client_::pc)
    {
        $res = [];
        switch ($pay_way) {
            case Pay::WECHAT_PAY:
                $res = WeChatPayServer::unifiedOrder('order', $order, $order_source);
                if (false === $res) {
                    self::$error = WeChatPayServer::getError();
                    return false;
                }
                break;
            case Pay::BALANCE_PAY:
                $user = User::get($order['user_id']);
                if ($user['user_money'] < $order['order_amount']) {
                    self::$error = '余额不足';
                    return false;
                }
                self::$return_code = 10001;//特殊状态码,用于前端判断
                break;
            case Pay::ALI_PAY:
                if ($order_source != Client_::pc) {
                    self::$error = '支付类型错误';
                    return false;
                }
                $aliPay = new AliPayServer();
                $res = $aliPay->pay('order', $order, $order_source);
                if (false === $res) {
                    self::$error = $aliPay->getError();
                    return false;
                }
                self::$return_code = 20001;//特殊状态码,用于前端判断
                break;
            default:
                self::$error = '无效的支付方式';
                return false;
        }

        // 更新订单支付方式
        $order = Order::get($order['id']);
        $order->pay_way = $pay_way;
        $order->save();

        //余额支付 直接回调
        if ($pay_way == Pay::BALANCE_PAY || $order['order_amount'] == 0) {
            PayNotifyLogic::handle('order', $order['order_sn'], []);
        }

        return $res;
    }




    /**
     * Notes: 是否在白名单内支付
     * @param $user_id
     * @author 段誉(2021/2/24 10:01)
     * @return bool
     */
    public static function isPayWhiteList($user_id)
    {
        $white_list = Env::get('wechat.white_list', '');
        $white_list = explode(',', $white_list);
        if (in_array($user_id, $white_list)) {
            return true;
        }
        return false;
    }
}