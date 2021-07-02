<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\model;

use app\common\server\UrlServer;
use think\Model;

class OrderGoods extends Model
{

    //订单商品退款状态
    const REFUND_STATUS_NO = 0;//未申请退款
    const REFUND_STATUS_APPLY = 1;//申请退款
    const REFUND_STATUS_WAIT = 2;//等待退款
    const REFUND_STATUS_SUCCESS = 3;//退款成功

    public function getImageAttr($value, $data)
    {
        if ($value) {
            return UrlServer::getFileUrl($value);
        }
        return $value;
    }

    public function getBaseImageAttr($value, $data)
    {
        return $data['image'];
    }

}