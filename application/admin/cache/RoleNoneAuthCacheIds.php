<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\cache;

use app\admin\server\AuthServer;
use app\common\cache\CacheBase;

class RoleNoneAuthCacheIds extends CacheBase
{

    public function setTag()
    {

        return 'role_none_auth_ids';
    }

    public function setData()
    {
       return AuthServer::getRoleNoneAuthIds($this->extend['role_id']);
    }
}