<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\logic;
use app\common\server\ConfigServer;
use app\common\server\UrlServer;

class ServiceConfigLogic{
    public static function getConfig(){
        $config = [
            'file_url' => UrlServer::getFileUrl('/'),
            'wechat'   => ConfigServer::get('service','wechat',''),
            'phone'    => ConfigServer::get('service','phone',''),
            'time'     => ConfigServer::get('service','time',''),
            'image'    => ConfigServer::get('service','image',''),
        ];
        return $config;

    }
    public static function setConfig($post){

        foreach ($post as $config_name => $config_value){
            ConfigServer::set('service',$config_name,$config_value);
        }

    }
}