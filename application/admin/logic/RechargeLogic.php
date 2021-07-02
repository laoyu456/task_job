<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\logic;
use app\common\server\ConfigServer;
use think\Db;

class RechargeLogic{
    public static function templatelists(){
        $list = Db::name('recharge_template')->where(['del'=>0])->select();
        foreach ($list as &$item){
            $item['money'] && $item['money'] = '￥'.$item['money'];
            $item['give_money'] && $item['give_money'] = '￥'.$item['give_money'];
        }
        return $list;
    }

    public static function getRechargeConfig(){
       $config =  [
           'open_racharge'  => ConfigServer::get('recharge','open_racharge',0),
           'give_integral'  => ConfigServer::get('recharge', 'give_integral', ''),
           'give_growth'    => ConfigServer::get('recharge', 'give_growth', ''),
           'min_money'      => ConfigServer::get('recharge', 'min_money', ''),
       ];
       return [$config];
    }
    public static function setRecharge($post){
        ConfigServer::set('recharge','open_racharge',$post['open_racharge']);
        ConfigServer::set('recharge','give_integral',$post['give_integral']);
        ConfigServer::set('recharge','give_growth',$post['give_growth']);
        ConfigServer::set('recharge','min_money',$post['min_money']);
    }

    public static function add($post){
        $new = time();
        $add_data = [
            'money'         => $post['money'],
            'give_money'    => $post['give_money'],
            'sort'          => $post['sort'],
            'is_recommend'  => $post['is_recommend'],
            'create_time'   => $new,
            'update_time'   => $new,
        ];
        return Db::name('recharge_template')->insert($add_data);
    }

    public static function edit($post){
        $new = time();
        $update_data = [
            'money'         => $post['money'],
            'give_money'    => $post['give_money'],
            'sort'          => $post['sort'],
            'is_recommend'  => $post['is_recommend'],
            'update_time'   => $new,
        ];
        return Db::name('recharge_template')->where(['id'=>$post['id']])->update($update_data);
    }

    public static function getRechargeTemplate($id){
        return Db::name('recharge_template')->where(['id'=>$id])->find();
    }


    public static function del($id){
        return Db::name('recharge_template')->where(['id'=>$id])->update(['update_time'=>time(),'del'=>1]);
    }
}