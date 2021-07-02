<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\logic;

use app\api\model\Goods;use think\Db;

class CollectLogic{
    public static function getCollectGoods($user_id,$page,$size){
        $goods = new Goods();
        $count = $goods->alias('g')
                ->leftJoin('goods_collect c','g.id=c.goods_id')
                ->where(['g.del' => 0,'status'=>1,'user_id'=>$user_id])
                ->count();

        $list = $goods->alias('g')
            ->leftJoin('goods_collect c','g.id=c.goods_id')
            ->where(['g.del' => 0,'user_id'=>$user_id])
            ->field('g.id,name,image,min_price as price')
            ->order('c.id desc')
            ->page($page, $size)
            ->select();
        $more = is_more($count,$page,$size);  //是否有下一页
        return [
            'list'      => $list,
            'count'     => $count,
            'page_no'   => $page,
            'page_size' => $size,
            'more'      =>$more
        ];

    }
    public static function handleCollectGoods($post,$user_id){
        if($post['is_collect']==1){
            $data =[
                'user_id'=>$user_id,
                'goods_id'=>$post['goods_id'],
                'create_time'=>time(),
            ];
            return Db::name('goods_collect')->insert($data);
        }
        return Db::name('goods_collect')->where(['goods_id'=>$post['goods_id']])->delete();

    }
}