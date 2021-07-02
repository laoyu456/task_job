<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------

return [
    'app\common\command\Crontab',
    'app\common\command\OrderClose',
    'app\common\command\UserDistribution',//更新会员分销信息
    'app\common\command\DistributionOrder',//结算分销订单进行分佣
    'app\common\command\Update',//更新后执行
    'app\common\command\TeamEnd',//处理已过成团时间的拼团
    'app\common\command\OrderFinish',//自动确认收货(待收货订单)
    'app\common\command\BargainEnd',
];
