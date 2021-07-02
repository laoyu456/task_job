<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\logic;

use app\common\server\UrlServer;
use think\Db;

class HelpLogic
{
    public static function lists($id, $page, $size)
    {
        $where[] = [
            ['del', '=', 0],
            ['is_show', '=', 1],
        ];

        if (!empty($id)){
            $where[] = ['cid', '=', $id];
        }

        $res = DB::name('help')
            ->where($where)
            ->field('id,title,synopsis,image,visit,create_time')
            ->order(['create_time' => 'desc']);

        $help_count = $res->count();
        $help = $res->page($page, $size)->select();

        foreach ($help as &$item) {
            $item['create_time'] = date('Y-m-d ', $item['create_time']);
            $item['image'] = UrlServer::getFileUrl($item['image']);
        }

        $more = is_more($help_count, $page, $size);  //是否有下一页

        return [
            'list' => $help,
            'count' => $help_count,
            'page_no' => $page,
            'page_size' => $size,
            'more' => $more
        ];
    }

    public static function CategoryLists()
    {
        $res = DB::name('help_category')
            ->where('is_show', 1)
            ->where(['del' => 0])
            ->field('id,name');
        return $res->select();
    }

    public static function getHelpDetail($id,$client)
    {
        DB::name('help')
            ->where(['id' => $id, 'del' => 0])
            ->setInc('visit');

        $res = DB::name('help')
            ->where(['id' => $id, 'del' => 0])
            ->field('id,title,image,visit,create_time,content')
            ->order(['create_time' => 'desc'])
            ->find();

        $preg = '/(<img .*?src=")[^https|^http](.*?)(".*?>)/is';
        $local_url = UrlServer::getFileUrl() . '/';
        $res['content'] = preg_replace($preg, "\${1}$local_url\${2}\${3}", $res['content']);

        $res['create_time'] = date('Y-m-d ', $res['create_time']);
        $res['image'] = UrlServer::getFileUrl($res['image']);

        $recommend_list = [];
        if(2 == $client){
            $recommend_list = Db::name('help')
                ->where([['del','=','0'], ['id','<>',$id]])
                ->field('id,title,image,visit')
                ->order('visit desc')
                ->limit(5)
                ->select();


            foreach ($recommend_list as $key => $recommend){
                $recommend_list[$key]['image'] = UrlServer::getFileUrl($recommend['image']);
            }
        }
        $res['recommend_list'] = $recommend_list;

        return $res;
    }
}