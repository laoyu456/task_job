<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\admin\logic\PayConfigLogic;
use app\common\server\ConfigServer;
use think\db;

class PayConfig extends AdminBase
{

    /**
     * Notes: 支付列表
     * @author 段誉(2021/3/10 11:46)
     * @return mixed
     */
    public function lists()
    {
        if ($this->request->isAjax()) {
            $this->_success('', PayConfigLogic::lists());
        }
        return $this->fetch();
    }


    /**
     * Notes: 余额支付
     * @author 段誉(2021/3/8 10:57)
     * @return mixed
     */
    public function editBalance()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            if (empty($post['icon']) && $post['status'] == 1) {
                $this->_error('请选择支付图标');
            }
            PayConfigLogic::editBalance($post);
            $this->_success('修改成功');
        }
        $this->assign('info', PayConfigLogic::info('balance'));
        return $this->fetch();
    }


    /**
     * Notes: 编辑微信
     * @author 段誉(2021/3/8 11:16)
     * @return mixed
     */
    public function editWechat()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            if ($post['status'] == 1) {
                if (empty($post['icon'])) {
                    $this->_error('请选择支付图标');
                }
                if ($post['apiclient_cert'] == '' || $post['apiclient_key'] == '') {
                    $this->_error('apiclient_cert或apiclient_key不能为空');
                }
            }
            PayConfigLogic::editWechat($post);
            $this->_success('修改成功');
        }
        $domain_name = ConfigServer::get('website', 'domain_name', '');
        $domain_name = $domain_name ? $domain_name : request()->domain();
        $this->assign('domain', $domain_name);
        $this->assign('info', PayConfigLogic::info('wechat'));
        return $this->fetch();
    }



    /**
     * Notes: 支付宝
     * @author 段誉(2021/3/10 11:47)
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function editAlipay()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            if (empty($post['icon']) && $post['status'] == 1) {
                $this->_error('请选择支付图标');
            }
            PayConfigLogic::editAlipay($post);
            $this->_success('修改成功');
        }
        $this->assign('info', PayConfigLogic::info('alipay'));
        return $this->fetch();
    }

}