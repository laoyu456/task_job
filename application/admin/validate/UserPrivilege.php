<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\validate;
use think\Db;
use think\Validate;

class UserPrivilege extends Validate {
    protected $rule = [
        'id'            => 'require|checkPrivilege',
        'name'          => 'require|unique:user_privilege,name^del',
        'image'         => 'require',

    ];
    protected $message = [
        'id.require'            => '请选择权益',
        'name.require'          => '请输入权益名称',
        'name.unique'           => '权益名称重复',
        'image.require'         => '请上传权益图标',
    ];
    protected function sceneAdd(){
        $this->remove(['id']);
    }
    protected function sceneEdit(){
        $this->remove(['id'],'checkPrivilege');
    }
    protected function sceneDel(){
        $this->remove(['name','image']);
    }
    protected function checkPrivilege($value,$rule,$data){
        $privilege = Db::name('user_level')
                    ->where("find_in_set($value,privilege) and del = 0")
                    ->column('name,privilege');
        if($privilege){
            $level_list = implode(',',array_keys($privilege));
            return '会员权益已关联'.$level_list.'会员等级，请解除关联后再删除';
        }
        return true;


    }
}