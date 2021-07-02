<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\model;

use think\Model;

class Freight extends Model
{
    protected $name = 'freight';

    protected $autoWriteTimestamp = true;

    //计费方式
    const CHARGE_WAY_WEIGHT = 1;//按重量计费
    const CHARGE_WAY_VOLUME = 2; //体积计费
    const CHARGE_WAY_PIECE = 3;//按件计费


    public static function getChargeWay($type)
    {
        $data = [
            self::CHARGE_WAY_WEIGHT => '按重量计费',
            self::CHARGE_WAY_VOLUME => '按体积计费',
            self::CHARGE_WAY_PIECE => '按件计费',
        ];

        if ($type === true) {
            return $data;
        }

        return $data[$type] ?? '未知';
    }

    public function getChargeWayTextAttr($value, $data)
    {
        return self::getChargeWay($data['charge_way']);
    }


    public function configs()
    {
        return $this->hasMany('freight_config', 'freight_id', 'id');
    }

}