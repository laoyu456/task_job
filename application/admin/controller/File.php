<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\admin\controller;


use app\common\logic\FileCateLogic;
use app\common\server\FileServer;


class File extends AdminBase
{
    /**
     * 图片列表
     * @param string $type
     */
    public function lists($type = '')
    {
        $cate_id = $this->request->get('cate', 0);
        $this->_success('', FileServer::lists($this->page_no, $this->page_size, $cate_id, $type));
    }

    /**
     * User: 意象信息科技 mjf
     * Desc: 删除图片
     */
    public function del()
    {
        $ids = $this->request->post('ids');
        FileServer::del($ids);
        $this->_success('操作成功');
    }

    /**
     * Notes: 上传图片
     * @author 张无忌(2021/2/19 16:39)
     * @return mixed
     */
    public function image()
    {
        if ($this->request->isPost()) {
            $cate_id = $this->request->post('cate',0);
            $result = FileServer::image($cate_id);
            $this->successOrError($result);
        }

        $auth_tree = FileCateLogic::cateTree();
        $this->assign('list', json_encode($auth_tree));
        return $this->fetch();
    }

    /**
     * 视频上传
     */
    public function video(){
        if ($this->request->isPost()) {
            $result = FileServer::video('uploads/video');
            $this->successOrError($result);
        }
    }
    /**
     * 其他文件上传
     */
    public function other()
    {
        if ($this->request->isPost()) {
            $local = $this->request->get('local',0);
            $sub_dir = $this->request->get('sub_dir','');
            $local = $local == 0 ? false : true;
            $save_path = 'uploads/other';

            if ($local && $local !== '') {
                $save_path = 'uploads/other/'.$sub_dir;
            }

            $result = FileServer::other($save_path, $local);
            $this->successOrError($result);
        }
        $this->_success();
    }


}