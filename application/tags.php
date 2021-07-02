<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用行为扩展定义文件
return [
    // 应用初始化
    'app_init'     => [],
    // 应用开始
    'app_begin'    => [],
    // 模块初始化
    'module_init'  => [],
    // 操作开始执行
    'action_begin' => [],
    // 视图内容过滤
    'view_filter'  => [],
    // 日志写入
    'log_write'    => [],
    // 应用结束
    'app_end'      => [],
    //发送短信
    'sms_send' => [
        'app\\common\\behavior\\SmsSend'
    ],
    //模板消息
    'wx_message_send' => [
        'app\\common\\behavior\\WxMessageSend'
    ],
    //消息通知
    'notice' => [
        'app\\common\\behavior\\Notice'
    ],
    //足迹记录
    'footprint' => [
        'app\\common\\behavior\\Footprint'
    ],
    //取消订单后操作
    'cancel_order' => [
        'app\\common\\behavior\\CancelOrder'
    ],
    //发送短信
    'printer' => [
        'app\\common\\behavior\\Printer'
    ],
];
