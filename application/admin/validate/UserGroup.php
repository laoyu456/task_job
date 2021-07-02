<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\admin\validate;
use think\Db;
use think\Validate;

class UserGroup extends Validate
{


    protected $rule = [
        'id'   => 'require|checkUser',
        'name' => 'require|unique:user_group,name^del',

    ];

    protected $message = [
        'id.require'    => '请选择分组',
        'name.require'  => '分组名称不能为空',
        'name.unique'   => '分组名称已存在',
    ];

    public function sceneAdd()
    {
        $this->only(['name']);
    }
    public function sceneDel()
    {
        $this->only(['id']);
    }
    public function sceneEdit()
    {
        $this->remove('id','checkUser');
    }

    protected function checkUser($value,$rule,$data){
       $user = Db::name('user')->where(['del'=>0,'group_id'=>$value])->find();
       if($user){
           return '已有会员属于该分组,不能删除';
       }
       return true;
    }


}