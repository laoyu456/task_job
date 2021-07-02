<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu-张无忌
// +----------------------------------------------------------------------

namespace app\admin\logic;


use app\common\model\Footprint;
use app\common\server\ConfigServer;

class FootprintLogic
{
    // 列表
    public static function lists()
    {
        $footprintModel = new Footprint();
        return $footprintModel->select();
    }

    // 获取详情
    public static function info($id)
    {
        $footprintModel = new Footprint();
        return $footprintModel->where(['id'=>(int)$id])->find();
    }

    public static function edit($post)
    {
        try {
            $footprintModel = new Footprint();
            $footprintModel->where(['id' => (int)$post['id']])
                ->update(['status' => $post['status']]);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function set($post)
    {
        try {
            ConfigServer::set('footprint', 'footprint_duration', $post['duration']);
            ConfigServer::set('footprint', 'footprint_status', $post['status']);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}