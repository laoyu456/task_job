<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\admin\controller;


use app\admin\logic\MyLogic;
use yx\admin\builderClass;

class My extends AdminBase
{
    /**
     * 修改个人密码
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function password()
    {
        if ($this->request->post()) {
            $post = input('post.');
            $post['admin_id'] = $this->admin_id;
            $result = $this->validate($post, 'app\admin\validate\Password');
            if ($result === true) {
                MyLogic::updatePassword($post['password'], $this->admin_id);
                $this->_success('修改密码成功');
            }
            $this->_error($result);
        }

        return $this->fetch();
    }

}