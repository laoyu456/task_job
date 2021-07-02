<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\controller;
use app\api\logic\CouponLogic;

class Coupon extends ApiBase{
    public $like_not_need_login = ['couponlist','getgoodscoupon'];
    /**
     * note 领券中心
     * create_time 2020/10/22 12:06
     */
    public function couponList(){
        $coupon_list = CouponLogic::getCouponList($this->user_id);
        $this->_success('获取成功',$coupon_list);
    }
    /**
     * note 商品详情获取优惠券
     * create_time 2020/10/22 18:14
     */
    public function getGoodsCoupon(){
        $id = $this->request->get('id');
        $coupon_list = [];
        if($id){
            $coupon_list = CouponLogic::getGoodsCoupon($this->user_id,$id);
        }
        $this->_success('',$coupon_list);
    }

    /**
     * note 领取优惠券
     * create_time 2020/10/22 12:06
     */
    public function getCoupon(){
        $coupon_id = $this->request->post('id');
        $result = $this->validate(['id'=>$coupon_id,'user_id'=>$this->user_id],'app\api\validate\GetCoupon');
        if($result === true){
            $result = CouponLogic::userGetCoupon($coupon_id,$this->user_id);
            if($result == true){
                $this->_success('领取成功','');
            }
            $result = '领取失败';
        }
        $this->_error($result);
    }
    /**
     * note 我的优惠券
     * create_time 2020/10/26 9:37
     */
    public function myCoupon(){
        $type = $this->request->get('type',1);
        $coupon_list = CouponLogic::getMyCouponList($this->user_id,$type);
        $this->_success('获取成功',$coupon_list);

    }
    /**
     * note 下单获取优惠券
     * create_time 2020/10/28 11:06
     */
    public function orderCoupon(){
        $goods = $this->request->post('goods');
        $data = CouponLogic::orderCoupon($goods,$this->user_id);
        $this->_success('获取成功',$data);
    }
    /**
     * note 注册赠送优惠券
     * create_time 2020/12/4 10:29
     */
    public function registerSendCoupon(){
        $list =  CouponLogic::registerSendCoupon($this->user_id);
        $this->_success('获取成功',$list);
    }

}