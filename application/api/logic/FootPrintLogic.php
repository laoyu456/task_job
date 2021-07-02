<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu-张无忌
// +----------------------------------------------------------------------

namespace app\api\logic;


use app\common\model\FootprintRecord;
use app\common\server\ConfigServer;

class FootPrintLogic
{
    public static function lists()
    {
        $config = ConfigServer::get('footprint',0);
        if (empty($config['footprint_status']) or $config['footprint_status'] === 0) {
            return ['time'=>time(), 'lists'=>[]];
        }

        $where = [];
        if ($config['footprint_duration'] and $config['footprint_duration'] > 0) {
            $duration = ($config['footprint_duration'] * 60);
            $time = time() - $duration; //获取多少分钟前
            $where = [
                ['create_time', '>=', $time]
            ];
        }

        $model = new FootprintRecord();
        $lists = $model->field(true)->where($where)
            ->with(['user'=>function($query){
                    $query->withAttr('nickname', function ($value){
                        if (mb_strlen($value) > 4) {
                            return mb_substr($value, 0, 4).'**';
                        }
                        return $value;
                    });
            }])->order('id', 'desc')
            ->limit(50)
            ->append(['time'])->select();

        foreach ($lists as &$item) {
            $item['template'] = self::getTemplate($item);
            unset($item['user_id']);
            unset($item['foreign_id']);
        }
        return ['time'=>time(), 'lists'=>$lists];
    }

    // 获取模板
    private static function getTemplate($data)
    {
        $nickname = $data['user']['nickname'].' ';
        $time = $data['time'];
        return $nickname.$time.$data['template'];
    }
}