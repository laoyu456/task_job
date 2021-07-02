<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\logic;

use app\common\model\Ad;
use app\common\server\UrlServer;
use think\Db;

class AdLogic
{
    public static function lists($pid, $client)
    {
        $ad_list = Db::name('ad a')
            ->join('ad_position ap', 'a.pid = ap.id')
            ->where(['pid' => $pid, 'ap.client' => $client, 'a.status' => 1, 'a.del' => 0, 'ap.status' => 1, 'ap.del' => 0])
            ->field('a.*')
            ->select();

        $list = [];
        foreach ($ad_list as $key => $ad) {
            $url = $ad['link'];
            $is_tab = 0;
            $params = [];
            switch ($ad['link_type']) {
                case 1:

                    $page = Ad::getLinkPage($ad['client'], $ad['link']);
                    $url = $page['path'];
                    $is_tab = $page['is_tab'] ?? 0;
                    break;
                case 2:
                    $goods_path = Ad::getGoodsPath($ad['client']);
                    $url = $goods_path;
                    $params = [
                        'id' => $ad['link'],
                    ];
                    break;
            }
            $list[] = [
                'image'     => UrlServer::getFileUrl($ad['image']),
                'link'      => $url,
                'link_type' => $ad['link_type'],
                'params'    => $params,
                'is_tab'    => $is_tab,
            ];
        }
        return $list;
    }
}