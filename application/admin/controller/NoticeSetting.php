<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: LikeShop-令狐冲
// +----------------------------------------------------------------------


namespace app\admin\controller;



use app\admin\logic\NoticeSettingLogic;
use app\common\model\NoticeSetting as NoticeSettingModel;
use think\Db;

class NoticeSetting extends AdminBase
{

    /**
     * Notes: 消息设置列表
     * @author 段誉(2021/4/27 17:17)
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        if ($this->request->isAjax()) {
            $get = $this->request->get();
            $type = $get['type'] ?? NoticeSettingModel::NOTICE_USER;
            $this->_success('获取成功', NoticeSettingLogic::lists($type));
        }
        return $this->fetch();
    }



    /**
     * Notes: 设置系统通知模板
     * @author 段誉(2021/4/27 17:18)
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function set()
    {
        $id = $this->request->get('id');
        $type = $this->request->get('type');

        if ($this->request->isAjax()) {
            $post = $this->request->post();
            NoticeSettingLogic::set($post);
            $this->_success('操作成功');
        }

        $this->assign('info', NoticeSettingLogic::info($id, $type));
        $this->assign('type', $type);
        return $this->fetch('set_'.$type);
    }

    /**
     * 通知记录
     */
    public function record()
    {
        if($this->request->isAjax()) {
            $get = $this->request->get();
            $data = NoticeSettingLogic::record($get);
            $this->_success('', $data);
        }
        $param = $this->request->get();
        $this->assign('param', $param);
        return $this->fetch();
    }

    /**
     * 删除记录，直接删除（非软删除）
     */
    public function delRecord()
    {
        $id = $this->request->post('id', '', 'intval');
        if(empty($id)) {
            return $this->_error('参数缺失,删除失败');
        }
        $res = Db::name('notice')->delete($id);
        if($res) {
            return $this->_success('删除成功');
        }else{
            return $this->_error('删除失败');
        }

    }
}