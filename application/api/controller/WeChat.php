<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\controller;

use app\api\logic\WeChatLogic;

class WeChat extends ApiBase
{

    public $like_not_need_login = ['jsconfig', 'index'];

    /**
     * showdoc
     * @catalog 接口列表/微信
     * @title 微信JSSDK授权接口
     * @description
     * @method get
     * @url we_chat/jsconfig
     * @param url 必填 varchar 前端当前url
     * @return_param appId string appid,公众号的唯一标识
     * @return_param timestamp int 生成签名的时间戳
     * @return_param nonceStr string 生成签名的随机串
     * @return_param signature string 签名
     * @return_param jsApiList array 需要使用的JS接口列表
     * @remark allow_share: 传入1时,则返回允许分享到朋友圈的配置
     * @number 0
     * @return {"code":1,"msg":"获取成功","data":{"config":{"debug":true,"beta":false,"jsApiList":["onMenuShareTimeline","onMenuShareWeibo","openLocation","getLocation","chooseWXPay","updateTimelineShareData"],"appId":"wx9d4……","nonceStr":"Ge8wD……","timestamp":1592707100,"url":"http:\/\/dragon.yixiang……","signature":"8421cfbc……"}}}
     */
    public function jsConfig()
    {
        $url = $this->request->get('url');
        $result = WeChatLogic::jsConfig($url);
        if ($result['code'] != 1) {
            $this->_error('', ['config' => $result['data']]);
        }
        $this->_success('', ['config' => $result['data']]);
    }


    public function index()
    {
        WeChatLogic::index();
    }

}