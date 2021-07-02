<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\common\logic;


use think\Db;

class FileCateLogic
{

    /**
     * Desc: 详情
     * @param $id
     * @return array|\PDOStatement|string|\think\Model|null
     */
    public static function info($id)
    {
        return Db::name('file_cate')->where(['id' => $id])->find();
    }

    /**
     * Desc: 添加分类
     * @param $post
     * @return bool
     */
    public static function add($post)
    {
        $level = 0;

        if ($post['pid']) {
            $level = Db::name('file_cate')
                ->where(['id' => $post['pid']])
                ->where(['del' => 0])
                ->value('level');
        }

        $data = [
            'name' => $post['name'],
            'pid' => $post['pid'],
            'sort' => $post['sort'],
            'level' => $level + 1,
            'create_time' => time(),
        ];
        Db::name('file_cate')->insert($data);
        return true;
    }

    /**
     * Desc: 编辑分类
     * @param $post
     * @return bool
     */
    public static function edit($post)
    {
        $level = 0;
        $data = [
            'pid' => $post['pid'],
            'name' => $post['name'],
            'sort' => $post['sort'],
            'update_time' => time(),
        ];

        if ($post['pid']) {
            $level = Db::name('file_cate')
                ->where(['id' => $post['pid']])
                ->where(['del' => 0])
                ->value('level');
        }

        $data['level'] = $level + 1;

        Db::name('file_cate')->where('id', $post['id'])->update($data);
        return true;
    }


    /**
     * Desc: 删除
     * @param $id
     * @return int|string
     */
    public static function del($id)
    {
        $data = [
            'del' => 1,
            'update_time' => time(),
        ];
        return Db::name('file_cate')->where(['del' => 0, 'id' => $id])->update($data);
    }


    /**
     * Desc: 树形结构
     * @return array
     */
    public static function cateTree()
    {
        $lists = Db::name('file_cate')
            ->where(['del' => 0])
            ->order('sort')
            ->select();

        $tree = self::cateListToTree($lists, 0);
        $all = [
            'id' => 0,
            'field' => 'all',
            'title' => '全部',
            'children' => [],
        ];
        array_unshift($tree,$all);
        return $tree;
    }


    public static function cateListToTree($lists, $pid = 0)
    {
        $tree = [];
        foreach ($lists as $k => $v) {
            if ($v['pid'] == $pid) {
                $temp['id'] = $v['id'];
                $temp['field'] = 'id';
                $temp['title'] = $v['name'];
                $temp['children'] = self::cateListToTree($lists, $v['id']);
                $temp['spread'] = true;
                $tree[] = $temp;
            }
        }
        return $tree;
    }


    /**
     * Desc: 下拉框树状结构
     * @return array
     */
    public static function categoryToSelect()
    {
        $lists = Db::name('file_cate')
            ->where(['del' => 0])
            ->order('sort')
            ->select();

        $tree = [];
        foreach ($lists as $val) {

            if ($val['pid'] != 0) {
                continue;
            }

            $tree[$val['id']] = "|----" . $val['name'];
            foreach ($lists as $val2) {
                if ($val2['pid'] == $val['id']) {
                    $tree[$val2['id']] = "|--------" . $val2['name'];
                }
            }

        }
        return $tree;
    }

}