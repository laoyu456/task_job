<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\cache;

use app\admin\server\MenuServer;
use app\common\cache\CacheBase;

/**
 * 登录控制
 * Class LoginCtrlCache
 * @package app\admin\cache
 */
class LoginStateCache extends CacheBase
{

    public function setTag()
    {
        return 'login_state';
    }

    public function setData()
    {
       return time();
    }
}