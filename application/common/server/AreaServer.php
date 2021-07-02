<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\common\server;


use app\common\cache\RegionCache;
use think\Db;
use think\facade\Cache;

class AreaServer
{
    /**
     * 通过id获取地址
     * @param $val 为非数组，返回单独地点名，为数组时，按顺序拼接地址返回
     * @param string $address val为数组时，连接详细地址一起返回
     * @return mixed|string
     */
    public static function getAddress($val, $address = '')
    {
        $area_id_name = (new RegionCache(''))->set(3600);
        if (!is_array($val)) {
            return isset($area_id_name[$val]) ? $area_id_name[$val] : '';
        }
        $long_address = '';
        foreach ($val as $id) {
            $long_address .= isset($area_id_name[$id]) ? $area_id_name[$id] : '';
        }
        return $long_address . $address;
    }

    /**
     * 通过id获取地址经纬度上
     * @param $id
     * @return array|\PDOStatement|string|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public static function getDb09LngAndLat($id)
    {
        return Db::name('dev_region')
            ->where('id', '=', $id)
            ->field(['db09_lng', 'db09_lat'])
            ->find();
    }
}