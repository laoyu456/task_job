<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{

    protected $rule = [
        'id' => 'require',
        'title' => 'require|unique:article,title^del',
        'cid' => 'require|checkCid',
    ];

    protected $message = [
        'id.require' => 'id不可为空',
        'title.require' => '请输入文章标题',
        'title.unique' => '标题不能重复！',
        'cid.require' => '请选择分类！',
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

    protected function checkCid($value, $rule, $data)
    {
        if (\app\admin\model\ArticleCategory::get(['id' => $value, 'del' => 0])) {
            return true;
        }
        return '请选择文章分类';
    }
}