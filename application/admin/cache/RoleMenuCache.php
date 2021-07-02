<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\cache;

use app\admin\server\MenuServer;
use app\common\cache\CacheBase;

class RoleMenuCache extends CacheBase
{

    public function setTag()
    {
        return 'role_menu';
    }

    public function setData()
    {
       return MenuServer::getMenuHtml($this->extend['role_id']);
    }
}