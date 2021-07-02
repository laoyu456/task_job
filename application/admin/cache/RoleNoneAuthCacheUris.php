<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\cache;

use app\admin\server\AuthServer;
use app\common\cache\CacheBase;

class RoleNoneAuthCacheUris extends CacheBase
{

    public function setTag()
    {

        return 'role_none_auth_uris';
    }

    public function setData()
    {
       return AuthServer::getRoleNoneAuthUris($this->extend['role_id']);
    }
}