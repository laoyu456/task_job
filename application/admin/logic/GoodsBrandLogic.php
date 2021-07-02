<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\logic;
use app\common\server\UrlServer;
use think\Db;

class GoodsBrandLogic
{
    //列表
    public static function lists($get)
    {
        $where[] = ['del','=',0];

        if(isset($get['name']) && $get['name']){
            $where[] = ['name','like','%'.$get['name'].'%'];
        }

        $count = Db::name('goods_brand')
            ->where($where)
            ->count();
        $lists = Db::name('goods_brand')
            ->where($where)
            ->page($get['page'],$get['limit'])
            ->order('id desc')
            ->select();

        foreach ($lists as &$item) {
            $item['image'] = UrlServer::getFileUrl($item['image']);
        }

        return ['count' => $count,'list' => $lists];
    }
    //添加
    public static function add($post)
    {
        $data = [
            'name'              => $post['name'],
            'initial'           => $post['initial'],
            'image'             => $post['image'],
            'sort'              => $post['sort'],
            'is_show'           => $post['is_show'],
            'remark'            => $post['remark'],
            'del'               => 0,
            'create_time'       => time()
        ];
        return Db::name('goods_brand')->insert($data);
    }

    //获取单个品牌
    public static function getGoodsBrand($id)
    {
        $detail =  Db::name('goods_brand')->where(['id' => $id])->find();
        $detail['abs_image'] = UrlServer::getFileUrl($detail['image']);
        return $detail;

    }

    //编辑品牌
    public static function edit($post,$id)
    {
        $update_data = [
            'name'              => $post['name'],
            'initial'           => $post['initial'],
            'image'             => $post['image'],
            'sort'              => $post['sort'],
            'is_show'           => $post['is_show'],
            'remark'            => $post['remark'],
            'del'               => 0,
            'update_time'       => time()
        ];

        return Db::name('goods_brand')->where(['id' => $id])->update($update_data);
    }

    //删除品牌
    public static function del($id)
    {
        $update_data = [
            'del' => 1,
            'update_time' => time(),
        ];
        return Db::name('goods_brand')->where(['del' => 0, 'id' => $id])->update($update_data);
    }
    //更新品牌状态
    public static function switchStatus($data)
    {
        $update_data = [
            'is_show'       => $data['status'],
            'update_time'   => time(),
        ];
        return Db::name('goods_brand')->where(['del' =>0,'id' =>$data['id']])->update($update_data);
    }
    //获取品牌列表
    public static function getGoodsBrandList(){
        return Db::name('goods_brand')->where(['del'=>0])->field('id,name')->select();
    }
}