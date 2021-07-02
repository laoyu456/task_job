<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\logic;
use app\common\model\NoticeSetting;
use app\common\model\SmsLog;
use think\Db;
class SmsLogic{

    public static function configLists(){
        $list = Db::name('sms_config')->where(['del'=>0])
            ->field('id,name,status,describe')
            ->select();
        foreach ($list as &$item){
            $item['status_desc'] = '关闭';
            if($item['status']){
                $item['status_desc'] = '开启';
            }
        }
        return ['count'=>count($list),'list'=>$list];
    }

    public static function logLists($get){
        $where = [];
        if(isset($get['name']) && $get['name']){
            $where[] = ['d.name','like','%'.$get['name'].'%'];
        }
        if(isset($get['mobile']) && $get['mobile']){
            $where[] = ['mobile','like','%'.$get['mobile'].'%'];
        }
        if(isset($get['send_status'])  && $get['send_status']){
            $where[] = ['send_status','=',$get['send_status']];
        }
        if(isset($get['start_time']) && $get['start_time']){
            $where[] = ['create_time', '>=', strtotime($get['start_time'])];
        }
        if(isset($get['end_time']) && $get['end_time']){
            $where[] = ['create_time', '<=', strtotime($get['end_time'])];
        }
        $sms_log = new SmsLog();

        $count = $sms_log->alias('s')
                ->where($where)
                ->where('message_key', 'in', NoticeSetting::SMS_SCENE)
                ->count();


        $list = $sms_log->alias('s')
                ->field('s.*')
                ->where('message_key', 'in', NoticeSetting::SMS_SCENE)
                ->where($where)
                ->order('s.id desc')
                ->page($get['page'],$get['limit'])
                ->select();

        foreach ($list as $item) {
            $item['name'] = NoticeSetting::getSceneDesc($item['message_key']) ?? '短信通知';
        }

        return ['count'=>$count,'list'=>$list];

    }
    public static function setConfig($post){
        $post['status'] = isset($post['status']) && $post['status'] == 'on' ? 1 : 0;
        Db::name('sms_config')->where(['id'=>$post['id']])->update($post);
        return true;

    }
    public static function getConfig($id){
        return Db::name('sms_config')->where(['id'=>$id,'del'=>0])->find();
    }
    public static function detail($id){
        $sms_log = new SmsLog();
        $log = $sms_log->alias('s')
                ->where('s.message_key', 'in', NoticeSetting::SMS_SCENE)
                ->field('s.*')->where(['s.id'=>$id])
                ->find();

        $log['name'] = NoticeSetting::getSceneDesc($log['message_key']);
        return $log;
    }

}