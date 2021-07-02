<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\common\server;


use think\Db;
use think\facade\Config;

class ConfigServer
{
    /**
     * User: 意象信息科技 lr
     * Desc: 设置配置值
     * @param $type
     * @param $name
     * @param $value
     * @return mixed
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public static function set($type, $name, $value)
    {
        $original = $value;
        $update_time = time();
        if (is_array($value)) {
            $value = json_encode($value, true);
        }
        $data = Db::name('config')
            ->where(['type' => $type, 'name' => $name])
            ->find();
        if (empty($data)) {
            Db::name('config')
                ->insert(['type' => $type, 'name' => $name, 'value' => $value]);
        } else {
            Db::name('config')
                ->where(['type' => $type, 'name' => $name])
                ->update(['value' => $value, 'update_time' => $update_time]);
        }
        return $original;
    }

    /**
     * User: 意象信息科技 lr
     * Desc: 获取配置值
     * @param $type
     * @param $name
     * @param string $default_value
     * @return mixed|string
     */
    public static function get($type, $name = '',  $default_value = null)
    {
        if ($name) {
            $value = Db::name('config')
                ->where(['type' => $type, 'name' => $name])
                ->value('value');
            $json = json_decode($value, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $value = $json;
            }
            if ($value) {
                return $value;
            }
            if($value ===0 || $value==='0'){
                return $value;
            }
            if ($default_value !== null) {
                return $default_value;
            }
            return Config::get('default.' . $type . '.' . $name);
        }

        $data = Db::name('config')
            ->where(['type' => $type])
            ->column('value', 'name');

        foreach ($data as $k => $v) {
            $json = json_decode($v, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $data[$k] = $json;
            }
        }
        if ($data) {
            return $data;
        }
        if($data ===0 || $data==='0'){
            return $data;
        }
        if ($default_value !== null) {
            return $default_value;
        }
        return Config::get('default.' . $type . '.' . $name);
    }
}