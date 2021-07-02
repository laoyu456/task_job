<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\logic;


use app\common\model\NoticeSetting;


class SubscribeLogic
{
    public static function lists($scene)
    {
        $where = [
            ['mnp_notice', '<>', ''],
            ['type', '=', 1]
        ];
        $lists = NoticeSetting::where($where)->field('mnp_notice')->limit(3)->select()->toArray();

        $template_id = [];
        foreach ($lists as $item) {
            if (isset($item['mnp_notice']['status']) && $item['mnp_notice']['status'] != 1) {
                continue;
            }
            $template_id[] = $item['mnp_notice']['template_id'] ?? '';
        }
        return $template_id;
    }
}