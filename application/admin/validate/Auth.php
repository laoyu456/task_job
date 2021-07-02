<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\validate;

use think\Db;
use think\Validate;

class Auth extends Validate
{

    protected $rule = [
        'name' => 'require',
        'disable' => 'require|in:0,1',
        'uri' => 'uri',
        'type' => 'type',
        'sort' => 'integer|between:1,1000'
    ];

    protected $message = [
        'name.require' => '菜单名称不能为空',
        'uri.uri' => '地址不存在',
        'sort.integer' => '排序必须为正整数',
        'sort.between' => '排序范围必须在1到1000之间',
    ];


    /**
     * url规则验证
     * @param $uri
     * @return bool
     */
    public function uri($uri)
    {
        if ($uri === '') {
            return true;
        }
        if (count(explode('/', $uri)) != 2) {
            return false;
        }

        list($controller, $function) = explode('/', $uri);
        $controller = 'app\admin\controller\\' . ucfirst($controller);
        if (!class_exists($controller)) {
            return false;
        }
        $class = new $controller;
        if (!method_exists($class, $function)) {
            return false;
        }
        return true;
    }


    /**
     * 类型验证
     * @param $type
     * @param $other
     * @param $data
     * @return bool|string
     */
    public function type($type, $other, $data)
    {
        if ($type == 2 && $data['pid'] == 0) {
            return '类型为权限的不能设置为顶级';
        }
        $data['id'] = empty($data['id']) ? 0 : $data['id'];
        $result = Db::name('dev_auth')
            ->where('id', '<>', $data['id'])
            ->where(['pid' => $data['pid'], 'del' => 0])
            ->value('type');
        if (!empty($result) && $result != $data['type']) {
            return '类型错误，必须设置与同一级一样';
        }
        return true;
    }
}