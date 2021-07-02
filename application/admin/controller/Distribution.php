<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;


use app\common\server\ConfigServer;

/**
 * 分销设置
 * Class Distribution
 * @package app\admin\controller
 */
class Distribution extends AdminBase
{

    /**
     * 分销会员列表/审核会员列表
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function setting()
    {
        $config = [
            'is_open' => ConfigServer::get('distribution', 'is_open', 1),
            'member_apply' => ConfigServer::get('distribution', 'member_apply', 1),
        ];
        $this->assign('config', $config);
        return $this->fetch('');
    }


    /**
     * 设置分销配置
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function setDistribution()
    {
        $post = $this->request->post();
        if ($post) {
            ConfigServer::set('distribution', 'is_open', $post['is_open']);
            ConfigServer::set('distribution', 'member_apply', $post['member_apply']);
            $this->_success('修改成功');
        }
    }
}