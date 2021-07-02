<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\common\cache;


use think\Db;

class RegionCache extends CacheBase
{

    public function setTag()
    {
        return 'region';
    }

    /**
     * 子类实现查出数据
     * @return mixed
     */
    public function setData()
    {
        return Db::name('dev_region')
            ->column('name', 'id');
    }
}