<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\logic;
use app\common\server\ConfigServer;
use think\Db;

class MarketingConfigLogic{
    public static function getConfig($config_list){
        $config = [];
        foreach ($config_list as $config_name){
            $value = ConfigServer::get('marketing',$config_name,0);
            $config[$config_name] = $value;
        }
        return $config;
    }
    public static function setConfig($post){
        foreach ($post as $config_name => $config_value){
            ConfigServer::set('marketing',$config_name,$config_value);
        }
        return true;
    }
    public static function getCouponList(){
        return Db::name('coupon')->where(['status'=>1,'del'=>0,'get_type'=>2])->field('id,name')->select();
    }
}