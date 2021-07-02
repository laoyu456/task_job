<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\model;
use app\common\server\UrlServer;
use think\Model;

class GoodsImage extends Model{
    public function getUriAttr($value,$data){
        return UrlServer::getFileUrl($value);
    }
}