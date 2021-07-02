<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\validate;
use think\Db;
use think\Validate;

class UserLevel extends Validate{
    protected $rule = [
        'id'                    => 'require',
        'name'                  => 'require|unique:user_level,name^del',
        'growth_value'          => 'require',
//        'remark'                => 'require',
        'image'                 => 'require',
        'background_image'      => 'require',
        'privilege'             => 'checkPrivilege',
        'discount'              => 'between:0,10',
    ];
    protected $message = [
        'name.require'                  => '请输入等级名称',
        'name.unique'                   => '等级名称已存在',
        'growth_value.require'          => '请输入成长值',
        'remark.require'                => '请输入等级说明',
        'image.require'                 => '请上传等级图标',
        'background_image.require'      => '请上传等级背景图',
        'discount.between'              => '请填写0~10的折扣',
    ];
    protected function sceneAdd(){
        $this->remove(['id']);
    }
    protected function sceneDel(){
        $this->only(['id'])->append('id','checkUser');
    }

    public function checkUser($value,$rule,$data){
        if(\app\admin\model\User::get(['level'=>$value,'del'=>0])){
            return '该等级被使用，不允许删除';
        }
        return true;
    }
    public function checkPrivilege($value,$rule,$data){
        $privileges = explode(',',$value);
        $privilege_list = Db::name('user_privilege')->where(['del'=>0])->column('id');

        $privilege_diff = array_diff($privileges,$privilege_list);
        if($privilege_diff){
            return '会员权益信息错误';
        }

        return true;
    }
}