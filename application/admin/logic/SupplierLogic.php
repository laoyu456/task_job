<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\logic;
use think\db;

class SupplierLogic{
    /**
     * 列表
     */
    public static function lists($get){
        $where =[];
        if(isset($get['keyword']) && $get['keyword']){
            $where[] = ['name','like','%'.$get['keyword'].'%'];
        }
        $res = db::name('supplier')
            ->where('del',0)
            ->where($where);
        $count = $res->count();
        $lists = $res->page($get['page'],$get['limit'])->select();
        return[
            'count' =>$count,
            'lists' =>$lists,
        ];
    }

    /**
     * 添加
     */
    public static function add($post){

        $data = [
            'name'      => $post['name'],
            'contact'   => $post['contact'],
            'tel'       => $post['tel'],
            'remark'    => $post['remark'],
            'address'   => $post['address'],
            'create_time' => time(),
        ];

        db::name('supplier')
            ->insert($data);
    }

    /**
     * 编辑
     */
    public static function edit($post){

        $data = [
            'name'      => $post['name'],
            'contact'   => $post['contact'],
            'tel'       => $post['tel'],
            'remark'    => $post['remark'],
            'address'   => $post['address'],
            'update_time' => time(),
        ];

        db::name('supplier')
            ->where(['id'=>$post['id']])
            ->update($data);
    }

    /**
     * 信息
     */
    public static function info($id){
        $info = db::name('supplier')
            ->where(['id'=>$id])
            ->find();
        return $info;

    }

    /**
     * 删除
     */
    public static function del($id)
    {

        $data = [
            'del' => 1,
            'update_time' => time()];
        return Db::name('supplier')->where(['del' => 0, 'id' =>$id])->update($data);  //逻辑删除


    }
    /**
     * note 获取所有供应商
     */
    public static function getSupplierList(){
        $list = Db::name('supplier')
                ->field('id,name')
                ->where(['del' => 0])
                ->select();
        return $list;
    }
}