<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\logic;

use app\common\server\UrlServer;
use app\common\server\ConfigServer;

class PolicyLogic
{
    public static function service()
    {
        $service = ConfigServer::get('policy', 'service', '');
        $preg = '/<img.*?src="((?!(https|http)).*?)".*?\/?>/i';
        $local_url = UrlServer::getFileUrl();
        $res = preg_replace($preg, '<img src="' . $local_url . '${1}" />', $service);
        return $res;
    }

    public static function privacy()
    {
        $privacy = ConfigServer::get('policy', 'privacy', '');
        $preg = '/<img.*?src="((?!(https|http)).*?)".*?\/?>/i';
        $local_url = UrlServer::getFileUrl();
        $res = preg_replace($preg, '<img src="' . $local_url . '${1}" />', $privacy);
        return $res;
    }

    public static function afterSale()
    {
        $after_sale = ConfigServer::get('policy', 'after_sale', '');
        $preg = '/<img.*?src="((?!(https|http)).*?)".*?\/?>/i';
        $local_url = UrlServer::getFileUrl();
        $res = preg_replace($preg, '<img src="' . $local_url . '${1}" />', $after_sale);
        return $res;
    }
}