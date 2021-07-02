<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\validate;
use app\common\model\Menu_;
use think\Validate;

class MenuDecorate extends Validate{

    protected $rule = [
        'id'        => 'require',
        'name'      => 'require|unique:MenuDecorate,name^del^decorate_type^client',
        'image'     => 'require',
        'link_type' => 'checkLinkType',
    ];

    protected $message = [
        'id.require'    => '缺少参数',
        'name.require'  => '请输入菜单名称',
        'name.unique'   => '菜单名称已存在',
        'image.require' => '请上传菜单图标',

    ];
    protected function sceneAdd()
    {
        $this->remove('id');
    }

    protected function sceneEdit()
    {

    }

    public function sceneDel()
    {
        $this->only(['id']);
    }

    protected function checkLinkType($value,$rule,$data){
      if($value == 1){
//            $menu = Menu_::getStoreMenu($data['menu']);
//            if(empty($menu)){
//                return '请选择菜单';
//            }
      }
      if($value == 2){
        if(empty($data['url'])){
            return '请输入链接';
        }
      }

      return true;
    }

}