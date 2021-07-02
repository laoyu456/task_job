<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\common\model;
use think\Model;

class SmsLog extends Model{
    const send_ing = 0;
    const send_success = 1;
    const send_fail = 2;

    public static function getSendStatusDesc($from){
        $desc = [
            self::send_ing          => '发送中',
            self::send_success      => '发送成功',
            self::send_fail         => '发送失败',
        ];
        if($from === true){
            return $desc;
        }
        return $desc[$from] ?? '';
    }

    public static function getCreateTimeAttr($value,$data){
         return date('Y-m-d H:i:s',$value);
    }
    public static function getSendTimeAttr($value,$data){
        if($value){
            return date('Y-m-d H:i:s',$value);
        }
        return '';
    }

    public static function getSendStatusAttr($value,$data){
        return self::getSendStatusDesc($value);
    }

    public static function getResultsAttr($value,$data){
        if($value){
            $result = json_decode($value,true);
            if(is_array($result)){
                return implode('，',$result);
            }
            return $result;
        }
        return '';

    }
}