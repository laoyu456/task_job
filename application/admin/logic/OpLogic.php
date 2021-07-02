<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\logic;
use app\common\server\ConfigServer;

class OpLogic{
    public static function getConfig($config_list){
        $config = [];
        foreach ($config_list as $config_name){
            $value = ConfigServer::get('op', $config_name, '');
            $config[$config_name] = $value;
        }
        return $config;
    }
    public static function setConfig($config_list){
        foreach ($config_list as $config_name => $config_value){
            ConfigServer::set('op',$config_name,$config_value);

        }
        return true;
    }


}