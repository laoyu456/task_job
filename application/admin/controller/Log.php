<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------


namespace app\admin\controller;

use app\admin\logic\LogLogic;
use think\helper\Time;

class Log extends AdminBase
{

    /**
     * 系统日志
     * @return mixed
     */
    public function lists()
    {


        if ($this->request->isAjax()) {
            $limit = $this->request->get('limit', 20);
            $page_no = $this->request->get('page', 1);
            $get = $this->request->get();
            $this->_success('', LogLogic::lists($page_no, $limit, $get));
        }


        $today = array_map(function ($time) {
            return date('Y-m-d H:i:s', $time);
        }, Time::today());
        $this->assign('today', $today);

        $yesterday = array_map(function ($time) {
            return date('Y-m-d H:i:s', $time);
        }, Time::yesterday());
        $this->assign('yesterday', $yesterday);


        $days_ago7 = array_map(function ($time) {
            return date('Y-m-d H:i:s', $time);
        }, Time::dayToNow(7));
        $this->assign('days_ago7', $days_ago7);

        $days_ago30 = array_map(function ($time) {
            return date('Y-m-d H:i:s', $time);
        }, Time::dayToNow(30, true));
        $this->assign('days_ago30', $days_ago30);
        return $this->fetch();
    }

}