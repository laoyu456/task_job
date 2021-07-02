<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\admin\logic\AdLogic;

class Ad extends AdminBase
{

    /**
     * 广告管理列表
     * @return mixed
     */
    public function lists()
    {
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $this->_success('获取成功', AdLogic::lists($get));
        }
        $type = \app\common\model\Ad::getAdTypeDesc(true);
        $this->assign('type', $type);
        return $this->fetch();
    }

    /**
     * 添加
     * @return mixed
     */
    public function add($client = '')
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\Ad.add');
            if ($result === true) {
                $result = AdLogic::add($post);
                if ($result) {
                    $this->_success('添加成功！');
                } else {
                    $this->_error('添加失败');
                }
            }
            $this->_error($result);
        }
        $this->assign('category_list',AdLogic::getGoodsCategory());
        $this->assign('link_page', \app\common\model\Ad::getLinkPage($client));
        $this->assign('position_list', AdLogic::infoPosition($client));
        return $this->fetch();
    }


    /**
     * 编辑
     * @param string $id
     * @return mixed
     */
    public function edit($id = '')
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $post['del'] = 0;
            $result = $this->validate($post, 'app\admin\validate\Ad');
            if ($result === true) {
                $result = AdLogic::edit($post);
                if ($result) {
                    $this->_success('编辑成功！');
                } else {
                    $this->_error('编辑失败');
                }
            }
            $this->_error($result);
        }
        $info = AdLogic::info($id);
        $this->assign('position_list', AdLogic::infoPosition($info['client']));
        $this->assign('category_list',AdLogic::getGoodsCategory());
        $this->assign('link_page', \app\common\model\Ad::getLinkPage($info['client']));
        $this->assign('info', $info);
        return $this->fetch();
    }


    /**
     * 删除
     * @param $delData
     */
    public function del($id, $client)
    {
        if ($this->request->isAjax()) {
            $result = AdLogic::del($id, $client);
            if ($result) {
                $this->_success('删除成功');
            }
            $this->_error('删除失败');
        }
    }


    /**
     * 修改状态
     */
    public function switchStatus()
    {
        $post = $this->request->post();
        $result = AdLogic::switchStatus($post);
        if ($result) {
            $this->_success('修改成功');
        }
        $this->_error('修改失败');
    }

    /**
     * 获取相应广告位置尺寸
     */
    public function imgSize()
    {
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $result = AdLogic::imgSize($get);
            if ($result) {
                $this->_success('', $result);
            }
            $this->_error($result);
        }

    }

    /**
     * 获取对应终端的广告位置列表
     */
    public function getPosition()
    {
        if ($this->request->isAjax()) {
            $client = $this->request->get('client');
            $result = AdLogic::infoPosition($client);
            if ($result) {
                $this->_success('', $result);
            }
            $this->_error($result);
        }
    }

}