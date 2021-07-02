<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\api\controller;

use think\App;
use think\Controller;
use think\exception\HttpResponseException;
use think\facade\Config;
use think\facade\Debug;
use think\Response;

class ApiBase extends Controller
{
    public $user_info = [];
    public $user_id = null;
    public $client = null;

    public $page_no = 1;
    public $page_size = 15;

    public $like_not_need_login = [];

    /**
     * 底层控制器初始化
     * ApiBase constructor.
     * @param App|null $app
     */
    public function __construct(App $app = null)
    {
        parent::__construct($app);
        self::setValue();
    }

    /**
     * User: 意象信息科技 lr
     * Desc: 设置基础控制器属性值
     */
    private function setValue()
    {

        //用户信息
        $this->user_info = $this->request->user_info ?? [];
        $this->user_id = $this->request->user_info['id'] ?? null;
        $this->client = $this->request->user_info['client'] ?? null;

        //分页参数
        $page_no = (int)$this->request->get('page_no');
        $this->page_no = $page_no && is_numeric($page_no) ? $page_no : $this->page_no;
        $page_size = (int)$this->request->get('page_size');
        $this->page_size = $page_size && is_numeric($page_size) ? $page_size : $this->page_size;
        $this->page_size = min($this->page_size, 100);
    }

    /**
     * User: 意象信息科技 lr
     * Desc: 请求成功
     * @param string $msg
     * @param array $data
     * @param int $code
     * @param int $show
     * @param array $header
     */
    protected function _success($msg = '', $data = [], $code = 1, $show = 0, array $header = [])
    {
        $type = $this->getResponseType();
        $time = Debug::getUseTime();
        $result = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
            'show' => $show,
            'time' => $time,
        ];

        if (Config::get('app_trace')) {
            $result['debug'] = [
                'request' => [
                    'get' => $this->request->get(),
                    'post' => $this->request->post(),
                    'header' => $this->request->header(),
                ]
            ];
        }
        $type = $this->getResponseType();
        // 把跳转模板的渲染下沉，这样在 response_send 行为里通过getData()获得的数据是一致性的格式
        if ('html' == strtolower($type)) {
            $type = 'jump';
        }

        $response = Response::create($result, $type)->header($header)->options(['jump_template' => $this->app['config']->get('dispatch_success_tmpl')]);

        throw new HttpResponseException($response);
    }

    /**
     * User: 意象信息科技 lr
     * Desc: 请求失败
     * @param string $msg
     * @param array $data
     * @param int $code
     * @param int $show
     * @param array $header
     */
    protected function _error($msg = '', $data = [], $code = 0, $show = 1, array $header = [])
    {
        $type = $this->getResponseType();
        $time = Debug::getUseTime();
        $result = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
            'show' => $show,
            'time' => $time,
        ];

        if (Config::get('app_trace')) {
            $result['debug'] = [
                'request' => [
                    'get' => $this->request->get(),
                    'post' => $this->request->post(),
                    'header' => $this->request->header(),
                ]
            ];
        }

        if ('html' == strtolower($type)) {
            $type = 'jump';
        }

        $response = Response::create($result, $type)->header($header)->options(['jump_template' => $this->app['config']->get('dispatch_error_tmpl')]);

        throw new HttpResponseException($response);
    }


}