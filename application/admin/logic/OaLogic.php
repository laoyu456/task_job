<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\logic;
use app\common\logic\LogicBase;
use app\common\server\ConfigServer;
use app\common\server\UrlServer;
use app\common\server\WeChatServer;
use EasyWeChat\Factory;
use EasyWeChat\Kernel\Exceptions\Exception;

class OaLogic  extends LogicBase{
    public static function getOa(){
        $domain_name = $_SERVER['SERVER_NAME'];
        $qr_code = ConfigServer::get('oa', 'qr_code', '');
        $config = [
            'name'              => ConfigServer::get('oa', 'name', ''),
            'original_id'       => ConfigServer::get('oa', 'original_id', ''),
            'qr_code'           => $qr_code,
            'abs_qr_code'       => UrlServer::getFileUrl($qr_code),
            'app_id'            => ConfigServer::get('oa', 'app_id', ''),
            'app_secret'        => ConfigServer::get('oa', 'secret', ''),
            'url'               => url('api/weChat/index','','',true),
            'token'             => ConfigServer::get('oa', 'token', 'LikeShop'),
            'encoding_ses_key'  => ConfigServer::get('oa', 'encoding_ses_key', ''),
            'encryption_type'   => ConfigServer::get('oa', 'encryption_type', 1),
            'business_domain'   => $domain_name,
            'safety_domain'     => $domain_name,
            'auth_domain'       => $domain_name,
            ];
        return $config;
    }
    public static function setOa($post){
        if($post){
            if(!isset($post['encryption_type'])){
                $post['encryption_type'] = '';
            }
            ConfigServer::set('oa','name',$post['name']);
            ConfigServer::set('oa','original_id',$post['original_id']);
            ConfigServer::set('oa','qr_code',$post['qr_code']);
            ConfigServer::set('oa','app_id',$post['app_id']);
            ConfigServer::set('oa','secret',$post['app_secret']);
            ConfigServer::set('oa','token',$post['token']);
            ConfigServer::set('oa','encoding_ses_key',$post['encoding_ses_key']);
            ConfigServer::set('oa','encryption_type',$post['encryption_type']);
        }
        return true;
    }
    public static function pulishMenu($buttons){
        try {
            $config = WeChatServer::getOaConfig();

            if(empty($config['app_id']) || empty($config['secret'])){
                return self::dataError('请先配置微信公众号参数');
            }

            $app = Factory::officialAccount($config);

            $result = $app->menu->create($buttons);

            if($result['errcode'] == 0){

                ConfigServer::set('menu','wechat_menu',$buttons);
                return self::dataSuccess('菜单发布成功');
            }
            return self::dataError('菜单发布失败:'.json_encode($result));

        } catch (Exception $e){
            return self::dataError($e->getMessage());

        }


    }
}