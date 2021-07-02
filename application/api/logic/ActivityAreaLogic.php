<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\logic;
use app\api\model\Goods;
use think\Db;


class ActivityAreaLogic{
    public static function activityGoodsList($id,$page,$size){
        $where[] = ['AG.del','=',0];
        $where[] = ['G.del','=',0];
        $where[] = ['G.status','=',1];
        $where[] = ['activity_id','=',$id];

        $goods = new Goods();
        $count = $goods->alias('G')
                ->join('activity_goods AG','G.id = AG.goods_id')
                ->where($where)
                ->group('AG.goods_id')
                ->count();
        

        $list = $goods->alias('G')
                ->join('activity_goods AG','G.id = AG.goods_id')
                ->where($where)
                ->group('AG.goods_id')
                ->field('G.id,G.name,G.image,G.min_price as price,sales_sum+virtual_sales_sum as sales_sum,G.market_price,AG.activity_id')
                ->select();

        $more = is_more($count,$page,$size);  //是否有下一页

        $data = [
            'list'          => $list,
            'page_no'       => $page,
            'page_size'     => $size,
            'count'         => $count,
            'more'          => $more
        ];

        return $data;
    }

}