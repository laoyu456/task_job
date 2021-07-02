<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\behavior;

use app\common\logic\NoticeLogic;
use app\common\model\Client_;
use app\common\model\NoticeSetting;
use app\common\server\WxMessageServer;
use think\Db;
use think\Exception;

/**
 * 通知信息
 * Class Notice
 * @package app\common\behavior
 */
class Notice
{
    public function run($params)
    {
        try {
            if (empty($params['scene'])) {
                throw new Exception('参数缺失');
            }

            //找到当前场景的通知设置记录,发送通知
            $this->noticeByScene($params['user_id'], $params);

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    /**
     * Notes: 根据各个场景发送通知
     * @param $user_id
     * @param $params
     * @author 段誉(2021/4/28 18:21)
     * @throws Exception
     */
    public function noticeByScene($user_id, $params)
    {
        $scene_info = NoticeSetting::where('scene', $params['scene'])->find();

        if (empty($scene_info)) {
            throw new Exception('信息错误');
        }

        $params = $this->mergeParams($params);

        //发送系统消息
        if (isset($scene_info['system_notice']['status']) && $scene_info['system_notice']['status'] == 1) {
            $content = NoticeLogic::contentFormat($scene_info['system_notice']['content'], $params);
            NoticeLogic::addNoticeLog($params, $scene_info,NoticeSetting::SYSTEM_NOTICE, $content);
        }

        //发送短信记录
        if (isset($scene_info['sms_notice']['status']) && $scene_info['sms_notice']['status'] == 1) {

        }

        //发送公众号记录
        if (isset($scene_info['oa_notice']['status']) && $scene_info['oa_notice']['status'] == 1) {
            (new WxMessageServer($user_id,Client_::oa))->send($params);
        }

        //发送小程序记录
        if (isset($scene_info['mnp_notice']['status']) && $scene_info['mnp_notice']['status'] == 1) {
            (new WxMessageServer($user_id, Client_::mnp))->send($params);
        }
    }




    /**
     * Notes: 拼装额外参数
     * @param $params
     * @author 段誉(2021/4/28 18:21)
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function mergeParams($params)
    {
        //订单相关信息
        if (!empty($params['order_id'])) {
            $order = Db::name('order')->where(['id' => $params['order_id']])->find();
            $order_goods = Db::name('order_goods')->alias('og')
                ->field('g.name')
                ->join('goods g', 'og.goods_id = g.id')
                ->where('og.order_id', $params['order_id'])
                ->find();

            $goods_name = $order_goods['name'] ?? '商品';
            if (mb_strlen($goods_name) > 8 ) {
                $goods_name = mb_substr($goods_name,0,8) . '..';
            }
            $params['goods_name'] = $goods_name;
            $params['order_sn'] = $order['order_sn'];
            $params['time'] = date('Y-m-d H:i', $order['create_time']);
            $params['total_num'] = $order['total_num'];
            $params['order_amount'] = $order['order_amount'];
        }

        //用户相关信息
        if (!empty($params['user_id'])) {
            $user = Db::name('user')->where('id', $params['user_id'])->find();
            $params['nickname'] = $user['nickname'];
        }

        //下级名称;(邀请人场景)
        if (!empty($params['lower_id'])) {
            $params['lower_name'] = Db::name('user')->where('id', $params['user_id'])->value('nickname');
        }

        //跳转路径
        $jump_path = NoticeSetting::getPathByScene($params['scene'], $params['order_id'] ?? 0);
        $params['url'] = $jump_path['url'];
        $params['page'] = $jump_path['page'];

        return $params;
    }


}