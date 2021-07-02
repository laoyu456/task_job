<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\controller;

use app\admin\logic\DistributionMemberLogic;
use app\common\model\DistributionMember as DistributionMemberModel;

class DistributionMember extends AdminBase
{

    /**
     * 分销会员列表/审核会员列表
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $type = $get['type'] ?? 'member';
            if ($type == 'member') {
                $this->_success('获取成功', DistributionMemberLogic::memberLists($get));
            }
            $this->_success('获取成功', DistributionMemberLogic::auditLists($get));
        }
        $this->assign('status', DistributionMemberModel::getApplyStatus(true));
        return $this->fetch('index');
    }

    /**
     * 审核分销会员
     */
    public function audit()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $check = $this->validate($post, 'app\admin\validate\DistributionMember.audit');
            if (true !== $check) {
                $this->_error($check);
            }

            if ($post['type'] == 'pass') {
                $res = DistributionMemberLogic::auditPass($post);
            } else {
                $res = DistributionMemberLogic::auditRefuse($post);
            }

            if ($res !== true) {
                $this->_error('操作失败');
            }
            $this->_success('操作成功');
        }
    }


    //冻结/解冻分销资格
    public function freeze()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $check = $this->validate($post, 'app\admin\validate\DistributionMember.freeze');
            if (true !== $check) {
                $this->_error($check);
            }
            DistributionMemberLogic::freeze($post);
            $this->_success('操作成功');
        }
        $this->_error('操作失败');
    }

    /**
     * 分销会员详情(分销资料)
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function info()
    {
        $get = $this->request->get();
        $info = DistributionMemberLogic::getMemberInfo($get);
        $this->assign('detail', $info);
        return $this->fetch();
    }

    /**
     * 推广会员
     * @return mixed
     */
    public function fans()
    {
        $user_id = $this->request->get('id');
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $this->_success('获取成功', DistributionMemberLogic::getFansLists($get));
        }
        $this->assign('user_id', $user_id);
        return $this->fetch();
    }


    /**
     * 分销收入明细
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function earningsDetail()
    {
        $user_id = $this->request->get('id');
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $this->_success('获取成功', DistributionMemberLogic::getEarningsDetail($get));
        }
        $this->assign('user_id', $user_id);
        return $this->fetch();
    }

    //修改上级
    public function updateLeader()
    {
        $user_id = $this->request->get('id');
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $check = $this->validate($post, 'app\admin\validate\DistributionMember.updateLeader');
            if (true !== $check) {
                $this->_error($check);
            }
            $res = DistributionMemberLogic::updateRelation($post);
            if ($res === true){
                $this->_success('操作成功');
            }
            $this->_error($res);
        }
        $this->assign('first_leader',DistributionMemberLogic::getLeaderInfo($user_id));
        $this->assign('user_id', $user_id);
        return $this->fetch();
    }

    /**
     * Notes: 添加分销会员
     * @author 张无忌(2021/1/11 16:32)
     */
    public function addMember()
    {
        if ($this->request->isAjax()) {
            $post = $this->request->post();
            $check = $this->validate($post, 'app\admin\validate\DistributionMember.addMember');
            if (true !== $check) {
                $this->_error($check);
            }

            $result = DistributionMemberLogic::addMember($post);

            if ($result === true) {
                $this->_success('添加成功');
            } else {
                $this->_error($result);
            }
        }

        return $this->fetch('distribution_member/add_member');
    }
}