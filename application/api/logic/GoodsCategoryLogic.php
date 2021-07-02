<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\api\logic;
use app\common\server\UrlServer;
use think\Db;

class GoodsCategoryLogic{
    /**
     * Notes:获取商品分类接口
     * @param $client int 终端：1-移动端；2-pc端
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @author:  2021/3/6 18:49
     */
    public static function categoryThirdTree($client){
        $lists = Db::name('goods_category')->where(['is_show'=>1,'del'=>0,'level'=>1])->order('sort desc')->column('id,name,pid,image,level','id');
        $level2 = Db::name('goods_category')->where(['is_show'=>1,'del'=>0,'level'=>2])->order('sort desc')->column('id,name,pid,image,level','id');
        $level3 = Db::name('goods_category')->where(['is_show'=>1,'del'=>0,'level'=>3])->order('sort desc')->field('id,name,pid,image,level')->select();


        //挂载第二级
        foreach ($level3 as $list3){
            if(isset($level2[$list3['pid']])){
                $list3['image'] = UrlServer::getFileUrl($list3['image']);
                $list3['type'] = 1;
                $level2[$list3['pid']]['sons'][] = $list3;
            }
        }
        //挂载第一级、并移除没有下级的二级分类
        foreach ($level2 as $key2 => $list2){
//            if(!isset($list2['sons'])){
//                unset($level2[$key2]);
//                continue;
//            }

            if(isset($lists[$list2['pid']])){
                $list2['type'] = 1;
                $list2['image'] = UrlServer::getFileUrl($list2['image']);
                $lists[$list2['pid']]['sons'][] = $list2;
            }
        }


        //移除没有完整的三级分类
        foreach ($lists as $key1 => $list1){
//            if(!isset($list1['sons'])){
//                unset($lists[$key1]);
//                continue;
//
//            }
            $lists[$key1]['image'] = UrlServer::getFileUrl($list1['image']);
            $lists[$key1]['type'] = 1;
        }

        //pc端不显示品牌
        if(1 == $client){
            $goods_brand = Db::name('goods_brand')
                ->where(['del'=>0,'is_show'=>1])
                ->field('id,name,image')
                ->order('sort desc,id desc')
                ->select();
            if($goods_brand){
                foreach ($goods_brand as &$brand_item){
                    $brand_item['type'] = 0;
                    $brand_item['image'] = UrlServer::getFileUrl($brand_item['image']);
                }

                $brand = [
                    'id'    => 0,
                    'name'  => '品牌推荐',
                    'type'  => 0,
                    'sons'  =>[
                        [
                            'id'    => 0,
                            'name'  => '热门品牌',
                            'type'  => 0,
                            'sons'  => $goods_brand,

                        ]
                    ],
                ];
                array_unshift($lists,$brand);
            }
        }


        return array_values($lists);
    }


}