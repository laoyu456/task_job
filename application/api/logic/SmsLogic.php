<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\logic;

use app\common\model\NoticeSetting;
use think\facade\Hook;

class SmsLogic{
    public static function send($mobile,$key, $user_id = 0){
        try{
            $code = create_sms_code(4);
            $send_data = [
                'key'       => NoticeSetting::SMS_SCENE[$key],
                'mobile'    => $mobile,
                'params'    => ['code'=>$code]
            ];

            if (!empty($user_id)) {
                $send_data['user_id'] = $user_id;
            }

            Hook::listen('sms_send',$send_data);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}