<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\logic;
use app\common\server\UrlServer;
use think\Db;
class CommonLogic{
    /**
     * note 修改制定表的某个字段
     * author cjh 2020/10/14 14:51
     * @param $table 表名
     * @param $pk_name  id
     * @param $pk_value id的值
     * @param $field 需要修改的字段
     * @param $field_value  需要修改的值
     * @return bool
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public static function changeTableValue($table,$pk_name,$pk_value,$field,$field_value){
        //允许修改的字段
        $allow_field = [
            'is_show','sort','status','is_new','is_best','is_like','is_recommend'
        ];
        if(!in_array($field,$allow_field)){
            return false;
        }
        if(is_array($pk_value)){
            $where[] = [$pk_name,'in',$pk_value];
        }else{
            $where[] = [$pk_name,'=',$pk_value];
        }

        $data= [
            $field          => $field_value,
            'update_time'   => time(),
        ];

        return Db::name($table)->where($where)->update($data);
    }

    //获取商品列表
    public static function getGoodsList($get,$is_item = false){
        $where = [];
        $where[] = ['del', '=', '0'];
        $where[] = ['status','=',1];

        if (isset($get['keyword']) && $get['keyword']) {
            $where[] = ['name', 'like', '%' . $get['keyword'] . '%'];
        }
        if(isset($get['cid']) && $get['cid']){
            $where[] = ['first_category_id|second_category_id|third_category_id','=',$get['cid']];
        }

        $goods_count = Db::name('goods')
            ->where($where)
            ->count();

        $goods_list = Db::name('goods')
            ->where($where)
            ->page($get['page'], $get['limit'])
            ->column('*','id');

        foreach ($goods_list as &$item) {
            $item['goods_item'] = [];
            $item['price'] = '￥'.$item['min_price'];
            if($item['max_price'] != $item['min_price']){
                $item['price'] = '￥'.$item['max_price'].'~'.'￥'.$item['min_price'];
            }
            $item['create_time_desc'] = date('Y-m-d H:i:s',$item['create_time']);
            $item['image'] = UrlServer::getFileUrl($item['image']);
        }

        if($is_item){
            $goods_ids = array_keys($goods_list);
            $goods_item = Db::name('goods_item')->where(['goods_id'=>$goods_ids])->select();
            foreach ($goods_item as $items){
                if(isset($goods_list[$items['goods_id']])){
                    if($items['image']){
                        $items['image'] = UrlServer::getFileUrl($items['image']);
                    }else{
                        $items['image'] = $goods_list[$items['goods_id']]['image'];
                    }
                    $goods_list[$items['goods_id']]['goods_item'][] = $items;
                }
            }
        }
        return ['count' => $goods_count, 'list' =>array_values($goods_list)];
    }


}