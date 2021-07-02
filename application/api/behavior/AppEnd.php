<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\behavior;

use think\Db;
use think\Request;

class AppEnd
{
    /**
     * 记录统计信息(用户访问量)
     * @param Request $request
     */
    public function run(Request $request)
    {
        try {
            $ip = $request->ip();
            $record = Db::name('stat')
                ->where('ip', '=', $ip)
                ->whereTime('create_time', 'today')
                ->find();

            if ($record) {
                Db::name('stat')
                    ->where('id', $record['id'])
                    ->setInc('count', 1);
            } else {
                $data = [
                    'ip'          => $ip,
                    'count'       => 1,
                    'create_time' => time()
                ];
                Db::name('stat')->insert($data);
            }
        } catch (\Exception $e) {

        }
    }
}