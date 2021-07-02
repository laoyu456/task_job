<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\api\controller;


use app\api\logic\AdLogic;

class Ad extends ApiBase
{
    public $like_not_need_login = ['lists'];

    /**
     * showdoc
     * @catalog 接口/广告
     * @title 获取广告列表
     * @description 获取广告列表
     * @method get
     * @url ad/lists
     * @param pid 必填 int 广告位id
     * @param client 必填 int 终端,1-移动端商城；2-PC端商城
     * @return_param image string 广告图片
     * @return_param link_type int 广告类型：1-商场页面；2-商品页面；3-自定义类型
     * @return_param link string 广告链接
     * @return_param params string 参数
     * @return_param is_tab int 是否tab页：1-是；0-否
     * @remark
     * @number 0
     * @return {"code":1,"msg":"获取成功","data":{"lists":["http:\/\/www.likeb2b2c.com:20002\/uploads\/images\/20200706\/e4bdb.jpg","http:\/\/www.likeb2b2c.com:20002\/uploads\/images\/20200708\/893ae.jpg"]},"show":0,"time":"0.686155","debug":{"request":{"get":{"pid":"1"},"post":[],"header":{"connection":"keep-alive","accept-encoding":"gzip, deflate, br","host":"www.likeb2b2c.com:20002","postman-token":"f804bef0-b397-4590-a67f-b489830cd37b","accept":"*\/*","user-agent":"PostmanRuntime\/7.26.1","token":"ff0c66fe0c89fe1e9be591d82d551521","content-type":"","content-length":""}}}}
     */
    public function lists()
    {
        $pid = $this->request->get('pid');
        $client = $this->request->get('client', 1);
        if ($pid) {
            $list = AdLogic::lists($pid, $client);
        } else {
            $list = [];
        }
        $this->_success('获取成功', $list);
    }
}