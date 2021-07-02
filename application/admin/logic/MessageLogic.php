<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\logic;
use think\Db;

class MessageLogic{

    public static function config(){
        $list = Db::name('dev_message m')
                  ->join('dev_message_extend e','m.id = e.message_id')
                  ->where(['m.del'=>0])
                  ->field('m.*,e.status')
                  ->select();

        $config = [
            'member'    => [],
            'platform'  => [],
        ];
      
        foreach ($list as $item){
            if($item['dev_type'] == 1){
                $config['member'][] = $item;
            }else{
                $config['platform'][] = $item;
            }
        }
        return $config;
    }

    public static function set($id,$type){

    }

    public static function getMessage($id){
        $config = Db::name('dev_message_extend e')
                    ->join('dev_message d','e.message_id = d.id')
                    ->where(['e.id'=>$id])
                    ->field('d.name,e.*')
                    ->find();

        if($config['variable']){
            $config['variable'] = json_decode($config['variable'],true);
        }else{
            $config['variable'] = [];
        }
        return $config;
    }

    public static function setConfig($post){
        $post['status'] = isset($post['status']) && $post['status'] == 'on' ? 1 : 0;
        return Db::name('dev_message_extend')->where(['id'=>$post['id']])->update($post);
    }
}