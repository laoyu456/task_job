<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------

namespace app\common\command;

use app\common\server\CrontabServer;
use Cron\CronExpression;
use think\Console;
use think\console\Command;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;
use think\Db;
use think\Exception;
use think\facade\Debug;
use think\facade\Log;

class Crontab extends Command
{
    protected function configure()
    {
        $this->setName('crontab')
            ->setDescription('定时任务');
    }

    /**
     * 启动定时任务守护进程
     * @param Input $input
     * @param Output $output
     * @return int|void|null
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    protected function execute(Input $input, Output $output)
    {
        Log::close();

        $time = time();

        $crons = Db::name('dev_crontab')
            ->where(['status' => 1])
            ->select();
        if (empty($crons)) {
            return;
        }

        foreach ($crons as $cron) {
            //规则错误，不执行
            if (CronExpression::isValidExpression($cron['expression']) === false) {
                continue;
            }
            //未到时间，不执行
            $cron_expression = CronExpression::factory($cron['expression']);
            $next_time = $cron_expression->getNextRunDate(date('Y-m-d H:i:s', $cron['last_time']))->getTimestamp();
            if ($next_time >= $time) {
                continue;
            }

            //开始执行
            try {
                Debug::remark('begin');
                $parameter = explode(' ', $cron['parameter']);
                if (is_array($parameter) && !empty($cron['parameter'])) {
                    Console::call($cron['command'], $parameter);
                } else {
                    Console::call($cron['command']);
                }
                Db::name('dev_crontab')
                    ->where(['id' => $cron['id']])
                    ->update(['error' => '']);
            } catch (\Exception $e) {
                Db::name('dev_crontab')
                    ->where(['id' => $cron['id']])
                    ->update(['error' => $e->getMessage(), 'status' => 3]);
            } finally {
                Debug::remark('end');
                $range_time = Debug::getRangeTime('begin', 'end');
                $max_time = max($cron['max_time'], $range_time);
                Db::name('dev_crontab')
                    ->where(['id' => $cron['id']])
                    ->update(['last_time' => $time, 'time' => $range_time, 'max_time' => $max_time]);
            }
        }
    }


}