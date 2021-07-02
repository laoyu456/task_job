<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\logic;
use app\common\server\ConfigServer;
use app\common\server\UrlServer;

class ServiceLogic{
    public static function getConfig(){
        $config = [
            'wechat'   => ConfigServer::get('service','wechat',''),
            'phone'    => ConfigServer::get('service','phone',''),
            'time'     => ConfigServer::get('service','time',''),
            'image'    => ConfigServer::get('service','image',''),
        ];
        $config['image'] = UrlServer::getFileUrl($config['image']);
        return $config;
    }
}