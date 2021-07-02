<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\validate;

use think\Validate;

class ArticleCategory extends Validate
{

    protected $rule = [
        'id'    => 'require|CheckArticle',
        'name'  => 'require|unique:article_category,name^del',
        'is_show'=>'require'
    ];

    protected $message = [
        'id.require'    => 'id不可为空',
        'name.require'  => '分类名称不能为空！',
        'name.unique'   => '分类名称已存在',
        'is_show.require'=>'请选择显示状态'
    ];
    protected function sceneAdd()
    {
        $this->only(['name']);

    }

    protected function sceneEdit()
    {
        $this->only(['id','name'])
             ->remove('id', 'CheckArticle');
    }

    public function sceneDel()
    {
        $this->only(['id']);
    }

    protected function CheckArticle($value, $rule, $data){
        if(\app\admin\model\Article::get(['cid'=>$value,'del'=>0])){
            return '该分类下有文章，不可删除';
        }
        return true;
    }

}