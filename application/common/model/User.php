<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\model;

use app\common\server\UrlServer;
use think\Model;

class User extends Model
{
    //头像
    public function getAvatarAttr($value, $data)
    {
        if ($value) {
            return UrlServer::getFileUrl($value);
        }
        return $value;
    }

    public function getBaseAvatarAttr($value, $data)
    {
        return $data['avatar'];
    }

    //加入时间
    public function getCreateTimeAttr($value, $data)
    {
        return date('Y-m-d H:i:s', $value);
    }

    //性别转换
    public function getSexAttr($value, $data)
    {
        switch ($value) {
            case 1:
                return '男';
            case 2:
                return '女';
            default:
                return '未知';
        }
    }

    public function level()
    {
        return $this->hasOne('UserLevel','id', 'level');
    }
}
