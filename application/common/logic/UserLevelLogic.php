<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\common\logic;
use think\Db;

class UserLevelLogic{
    /**
     * note 更新个人会员等级
     * create_time 2020/11/26 18:52
     */
    public static function updateUserLevel($id){

        $user = Db::name('user')->where(['id'=>$id])->field('user_growth,level')->find();
        $level = Db::name('user_level')
            ->where([['growth_value','<=',$user['user_growth']],['del','=',0]])
            ->order('growth_value desc')
            ->find();

        if($level){
            $growth_value = 0;
            $user['level'] > 0 && $growth_value = Db::name('user_level')->where(['id'=>$user['level']])->value('growth_value');
            if($level['growth_value'] > $growth_value){
                Db::name('user')->where(['id'=>$id])->update(['level'=>$level['id'],'update_time'=>time()]);
            }
        }
        return true;

    }
    /**
     * note 更新所有用户的等级
     * create_time 2020/11/26 19:11
     */
    public static function updateAllUserLevel($level_id){
        $growth_value = Db::name('user_level')->where(['id'=>$level_id])->value('growth_value');
        $no_update_user_ids = Db::name('user')->alias('U')
            ->join('user_level L','U.level = L.id')
            ->where('L.growth_value','>',$growth_value)
            ->column('U.id');

        return Db::name('user')
            ->where([
                ['id','not in',$no_update_user_ids],
                ['del','=',0],
                ['user_growth','>=',$growth_value],
            ])->update(['level'=>$level_id,'update_time'=>time()]);

    }
}