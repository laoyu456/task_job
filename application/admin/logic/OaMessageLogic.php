<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\admin\logic;


use app\common\logic\LogicBase;
use app\common\model\MessageScene_;
use app\common\server\WeChatServer;
use EasyWeChat\Factory;
use think\Db;

class OaMessageLogic extends LogicBase
{

    // 获取表
    public static function lists($get)
    {
        $where[] = ['type', '=', 2];

        if(isset($get['disable']) && is_numeric($get['disable'])){
            $where[] = ['disable', '=', (int)$get['disable']];
        }

        $count = Db::name('dev_message_template')
            ->where($where)
            ->count();
        $lists = Db::name('dev_message_template')
            ->where($where)
            ->page($get['page'],$get['limit'])
            ->select();

        $scene = (new MessageScene_());
        foreach ($lists as &$item) {
            $item['scene'] = $scene->getName($item['scene']);
        }

        return ['count' => $count,'list' => $lists];
    }

    // 获取单个消息模板
    public static function getTemplateMessage($id)
    {
        return Db::name('dev_message_template')->where(['id' => (int)$id])->find();
    }

    // 更新消息模板状态
    public static function switchStatus($data)
    {
        $update_data = [
            'disable' => $data['disable']
        ];
        return Db::name('dev_message_template')->where(['id' => (int)$data['id']])->update($update_data);
    }

    // 同步消息模板到公众号
    public static function synchro($data)
    {
        try {
            $model = Db::name('dev_message_template')->where(['id' => (int)$data['id']])->find();
            // 发起同步到公众号
            $config = WeChatServer::getOaConfig();
            $app = Factory::officialAccount($config);
            $result = $app->template_message->addTemplate($model['template_id_short']);

            // 保存返回的template_id
            if ($result['errcode'] === 0 && isset($result['template_id'])) {
                $update_data = ['template_id' => $result['template_id']];
                Db::name('dev_message_template')->where(['id' => (int)$data['id']])->update($update_data);
                return true;
            }
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }
}