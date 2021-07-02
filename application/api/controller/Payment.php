<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\controller;


use app\api\model\Order;
use app\common\model\Client_;
use app\common\server\AliPayServer;
use app\common\server\WeChatPayServer;
use app\common\server\WeChatServer;
use app\common\logic\PaymentLogic;
use app\common\model\Pay;
use think\Db;

/**
 * 支付逻辑
 * Class Payment
 * @package app\api\controller
 */
class Payment extends ApiBase
{

    public $like_not_need_login = ['aliNotify', 'notifyMnp', 'notifyOa', 'notifyApp'];


    /**
     * Notes: 预支付
     * @author 段誉(2021/2/23 14:33)
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function prepay()
    {
        $post = $this->request->post();
        switch ($post['from']) {
            case 'order':
                $order = Order::get($post['order_id']);
                break;
            case 'recharge':
                $order = Db::name('recharge_order')->where(['id' => $post['order_id']])->find();
                break;
        }

        //找不到订单
        if (empty($order)) {
            $this->_error('订单不存在');
        }

        //已支付
        if ($order['pay_status'] == Pay::ISPAID || $order['order_amount'] == 0) {
            $this->_success('支付成功', ['order_id' => $order['id']], 10001);
        }

        $result = PaymentLogic::pay($post['from'], $order, $post['order_source']);
        if (false === $result) {
            $this->_error(PaymentLogic::getError(), ['order_id' => $order['id']], PaymentLogic::getReturnCode());
        }

        if (PaymentLogic::getReturnCode() != 0) {
            $this->_success('', $result, PaymentLogic::getReturnCode());
        }

        $this->_success('', $result);
    }



    /**
     * Notes: pc端预支付 NATIVE
     * @author 段誉(2021/3/18 16:03)
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function pcPrepay()
    {
        $post = $this->request->post();
        $pay_way = $post['pay_way'];
        $order = Order::get($post['order_id']);

        $return_msg = ['order_id' => $order['id'], 'order_amount' => $order['order_amount']];

        //找不到订单
        if (empty($order)) {
            $this->_error('订单不存在');
        }

        //已支付
        if ($order['pay_status'] == Pay::ISPAID || $order['order_amount'] == 0) {
            $this->_success('支付成功', $return_msg, 10001);
        }

        $result = PaymentLogic::pcPay($order, $pay_way, $post['order_source']);

        if (false === $result) {
            $this->_error(PaymentLogic::getError(), $return_msg, PaymentLogic::getReturnCode());
        }

        if ($pay_way == Pay::BALANCE_PAY) {
            $this->_success('余额支付成功', $return_msg, PaymentLogic::getReturnCode());
        }

        $return_msg['data'] = $result;

        if (PaymentLogic::getReturnCode() != 0) {
            $this->_success('', $return_msg, PaymentLogic::getReturnCode());
        }

        $this->_success('', $return_msg);
    }



    /**
     * Notes: 小程序回调
     * @author 段誉(2021/2/23 14:34)
     */
    public function notifyMnp()
    {
        $config = WeChatServer::getPayConfig(Client_::mnp);
        return WeChatPayServer::notify($config);
    }


    /**
     * Notes: 公众号回调
     * @author 段誉(2021/2/23 14:34)
     */
    public function notifyOa()
    {
        $config = WeChatServer::getPayConfig(Client_::oa);
        return WeChatPayServer::notify($config);
    }


    /**
     * Notes: APP回调
     * @author 段誉(2021/2/23 14:34)
     */
    public function notifyApp()
    {
        $config = WeChatServer::getPayConfig(Client_::ios);
        return WeChatPayServer::notify($config);
    }


    /**
     * Notes: 支付宝回调
     * @author 段誉(2021/3/23 11:37)
     */
    public function aliNotify()
    {
        $data = $this->request->post();
        return (new AliPayServer())->verifyNotify($data);
    }



    /**
     * Notes:
     * @author 段誉(2021/3/23 11:36)
     * @return \think\Model[]
     */
    public function payway()
    {
        $payModel = new Pay();
        $pay = $payModel->where(['status' => 1])->order('sort')->hidden(['config'])->select()->toArray();

        foreach ($pay as $k => &$item) {
            if ($item['code'] == 'wechat') {
                $item['extra'] = '微信快捷支付';
                $item['pay_way'] = Pay::WECHAT_PAY;
            }

            if ($item['code'] == 'balance') {
                $user_money = Db::name('user')->where(['id' => $this->user_id])->value('user_money');
                $item['extra'] = '可用余额:'.$user_money;
                $item['pay_way'] = Pay::BALANCE_PAY;
            }

            if ($item['code'] == 'alipay') {
                $item['extra'] = '';
                $item['pay_way'] = Pay::ALI_PAY;
            }

            if (in_array($this->client, [Client_::mnp, Client_::oa]) && $item['code'] == 'alipay') {
                unset($pay[$k]);
            }
        }
        $this->_success('', array_values($pay));
    }

}