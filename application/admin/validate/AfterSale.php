<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\validate;

use think\Db;
use think\Validate;

class AfterSale extends Validate
{
    protected $rule = [
        'id' => 'require|checkAfterSale',
        'remark' => 'require',
    ];

    protected $message = [
        'id.require' => '参数缺失',
        'remark.require' => '请填写拒绝原因',
    ];

    //商家同意
    public function sceneAgree()
    {
        $this->only(['id']);
    }

    //商家拒绝
    public function sceneRefuse()
    {
        $this->only(['id','remark']);
    }

    //商家收货
    public function sceneTake()
    {
        $this->only(['id']);
    }

    //拒绝收货
    public function sceneRefuseGoods()
    {
        $this->only(['id','remark']);
    }

    //确认退款
    public function sceneConfirm()
    {
        $this->only(['id'])->append('id','checkIsRefund');
    }

    protected function checkAfterSale($value, $rule, $data)
    {
        $after_sale = \app\common\model\AfterSale::where('del',0)
            ->where('id',$value)
            ->find();

        if (!$after_sale){
            return '订单异常,暂不可操作!';
        }
        return true;
    }

    protected function checkIsRefund($value, $rule, $data)
    {
        $after_sale = \app\common\model\AfterSale::where('del',0)
            ->where('id',$value)
            ->find();

        if ($after_sale['status'] == \app\common\model\AfterSale::STATUS_SUCCESS_REFUND){
            return '此订单已退款';
        }
        return true;
    }
}