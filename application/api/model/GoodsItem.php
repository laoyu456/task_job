<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\model;
use app\common\server\UrlServer;
use think\Model;

class GoodsItem extends Model {
    public function getImageAttr($value,$data){
        if($value){
            return UrlServer::getFileUrl($value);
        }
        return $value;
    }
}