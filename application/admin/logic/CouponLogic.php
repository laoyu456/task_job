<?php
// +----------------------------------------------------------------------
// | 兼职任务app服务端
// +----------------------------------------------------------------------

// | Author: apeLiu
// +----------------------------------------------------------------------
namespace app\admin\Logic;
use app\admin\model\Coupon;
use app\common\server\UrlServer;
use think\Db;


class CouponLogic{
    public static function lists($get){
        //更新过期优惠券
        $now = time();
        Db::name('coupon')
            ->where([['send_time_start','<',$now], ['send_time_end','<',$now],['status','=',1]])
            ->update(['status'=>0,'update_time'=>$now]);

        $where[] = ['del','=',0];
        //优惠券名称搜索
        if(isset($get['name']) && $get['name']){
            $where[] = ['name','like','%'.$get['name'].'%'];
        }
        //发放优惠券
        if(isset($get['type']) && $get['type'] === 'send'){
            $where[] = ['status','=',1];
            $where[] = ['get_type','=',2];

        }
        if(isset($get['type']) && $get['type'] !== 'send' && $get['type'] !== ''){
            $where[] = ['status','=',$get['type']];
        }
        $coupon = new Coupon();

        $coupon_count = $coupon
            ->where($where)
            ->count();

        $coupon_list = $coupon
            ->where($where)
            ->page($get['page'], $get['limit'])
            ->order('id desc')
            ->select();
        $coupon_list->append(['status_desc','sent_total','send_time']);
        return ['count' => $coupon_count, 'list' => $coupon_list];

    }

    //添加优惠券
    public static function add($post){
        //拼接数据
        $add_data = [
            'name'              => $post['name'],
            'money'             => $post['money'],
            'send_time_start'   => $post['send_time_start'],
            'send_time_end'     => $post['send_time_end'],
            'send_total_type'   => $post['send_total_type'],
            'send_total'        => $post['send_total_type'] == 2 ? $post['send_total'] : '',
            'condition_type'    => $post['condition_type'],
            'condition_money'   => $post['condition_type'] == 2 ? $post['condition_money'] : '',
            'use_time_type'     => $post['use_time_type'],
            'use_time_start'    => $post['use_time_type'] == 1 ? $post['use_time_start'] : '',
            'use_time_end'      => $post['use_time_type'] == 1 ? $post['use_time_end'] : '',
            'use_time'          => $post['use_time_type'] == 2 ? $post['use_time'] : '',
            'get_type'          => $post['get_type'],
            'get_num_type'      => $post['get_num_type'],
            'get_num'           => $post['get_num'],
            'use_goods_type'    => $post['use_goods_type'],
            'status'            => 1,
        ];
        //用券时间
        if($post['use_time_type'] == 3){
            $update_data['use_time'] = $post['tomorrow_use_time'];
        }
        //领取次数
        if($post['get_num_type'] == 3){
            $update_data['get_num'] = $post['day_get_num'];
        }
        //提交订单
        Db::startTrans();
        try {
            $coupon = Coupon::create($add_data);
            if($coupon && $coupon['use_goods_type'] != 1){
                $goods_coupon = [];
                $now = time();
                foreach ($post['goods_ids'] as $item){
                    $goods_coupon[] = [
                        'coupon_id'     => $coupon->id,
                        'goods_id'      => $item,
                        'create_time'   => $now,
                    ];
                }
                Db::name('coupon_goods')->insertAll($goods_coupon);
            }
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();

            return false;
        }

    }
    public static function edit($post){

        $coupon = new Coupon();
        //拼接数据
        $update_data = [
            'name'              => $post['name'],
            'money'             => $post['money'],
            'send_time_start'   => $post['send_time_start'],
            'send_time_end'     => $post['send_time_end'],
            'send_total_type'   => $post['send_total_type'],
            'send_total'        => $post['send_total_type'] == 2 ? $post['send_total'] : '',
            'condition_type'    => $post['condition_type'],
            'condition_money'   => $post['condition_type'] == 2 ? $post['condition_money'] : '',
            'use_time_type'     => $post['use_time_type'],
            'use_time_start'    => $post['use_time_type'] == 1 ? $post['use_time_start'] : '',
            'use_time_end'      => $post['use_time_type'] == 1 ? $post['use_time_end'] : '',
            'use_time'          => $post['use_time_type'] == 2 ? $post['use_time'] : '',
            'get_type'          => $post['get_type'],
            'get_num_type'      => $post['get_num_type'],
            'get_num'           => $post['get_num_type'] == 2 ? $post['get_num'] : '',
            'use_goods_type'    => $post['use_goods_type'],
        ];
        //用券时间
        if($post['use_time_type'] == 3){
            $update_data['use_time'] = $post['tomorrow_use_time'];
        }
        //领取次数
        if($post['get_num_type'] == 3){
            $update_data['get_num'] = $post['day_get_num'];
        }

        Db::startTrans();
        try {
            $coupon->save($update_data,['id'=>$post['id']]);
            Db::name('coupon_goods')->where(['coupon_id'=>$post['id']])->delete();

            if($coupon && $coupon['use_goods_type'] != 1){
                $goods_coupon = [];
                $now = time();
                foreach ($post['goods_ids'] as $item){
                    $goods_coupon[] = [
                        'coupon_id'     => $post['id'],
                        'goods_id'      => $item,
                        'create_time'   => $now,
                    ];
                }
                Db::name('coupon_goods')->insertAll($goods_coupon);
            }
            Db::commit();
            return true;
        } catch (\Exception $e) {
            Db::rollback();
            return false;
        }


    }

    public static function getCoupon($id,$get_data = false){
        $coupon = Coupon::get($id);
        $coupon['goods_coupon'] = [];
        if($get_data) {
            $coupon = $coupon->getData();
            $coupon['send_time_start'] = date('Y-m-d H:i:s',$coupon['send_time_start']);
            $coupon['send_time_end'] = date('Y-m-d H:i:s',$coupon['send_time_end']);
            if($coupon['use_goods_type'] != 1){
                $goods_coupon= Db::name('coupon_goods cg')
                    ->join('goods g','cg.goods_id = g.id')
                    ->where(['coupon_id'=>$id])
                    ->field('g.id,name,max_price,min_price,stock')
                    ->select();
                foreach ($goods_coupon as &$item){
                    $item['price'] = '￥'.$item['min_price'].'~'.'￥'.$item['max_price'];
                    if($item['max_price'] == $item['min_price']){
                        $item['price'] = '￥'.$item['min_price'];
                    }
                }
                $coupon['goods_coupon'] = $goods_coupon;
            }
            if($coupon['use_time_start']){
                $coupon['use_time_start'] = date('Y-m-d H:i:s',$coupon['use_time_start']);
                $coupon['use_time_end'] = date('Y-m-d H:i:s',$coupon['use_time_end']);
            }
        }

        return $coupon;
    }



    /*
     * 删除优惠券 todo 删除已领取用户的优惠券
     */
    public static function del($id){
        $coupon = new Coupon();
        return $coupon->save(['del'=>1,'update_time'=>time()],['id'=>$id]);
    }

    /*
     * 发放记录
     */
    public static function log($get){
        $where[] = ['cl.del','=',0];
        $where[] = ['coupon_id','=',$get['id']];
        if(isset($get['keyword']) && $get['keyword']){
            $where[] = ['nickname|mobile','like','%'.$get['keyword'].'%'];
        }

        $log_count = Db::name('coupon_list cl')
            ->join('user u','cl.user_id = u.id')
            ->where($where)
            ->count();

        $log_list =  Db::name('coupon_list cl')
            ->join('user u','cl.user_id = u.id')
            ->where($where)
            ->field('coupon_id,status,coupon_code,cl.create_time as create_time,cl.use_time,u.nickname,u.avatar,u.mobile,u.sex,u.sn,u.level,u.create_time as u_create_time')
            ->page($get['page'], $get['limit'])
            ->select();
        $coupon_list = Db::name('coupon')->where(['del'=>0])->column('name','id');
        $level_name = Db::name('user_level')->where(['del'=>0])->column('name','id');
        foreach ($log_list as &$item)
        {
            $item['use_time_desc'] = '-';
            $item['status_desc'] = '已使用';
            $item['create_time_desc'] = '';
            $item['sex_desc'] = '未知';
            if($item['use_time']){
                $item['use_time_desc'] = date('Y-m-d H:i:s',$item['use_time']);
            }
            $item['u_create_time'] = date('Y-m-d H:i:s',$item['u_create_time']);
            if($item['status']){
                $item['status'] = '已使用';
            }

            $item['avatar'] = UrlServer::getFileUrl($item['avatar']);
            $item['coupon_name'] = $coupon_list[$item['coupon_id']] ?? '';
            $item['create_time_desc'] = date('Y-m-d H:i:s',$item['create_time']);

            $item['level_name'] = $level_name[$item['level']] ?? '';
            switch ($item['sex']){
                case 1:
                    $item['sex_desc'] = '男';
                case 2:
                    $item['sex_desc'] = '女';

            }

        }
        return ['count'=>$log_count , 'lists'=>$log_list];
    }

    /*
     * 关闭优惠券
     */
    public static function close($id){
        $coupon = new Coupon();
        return $coupon->save(['status'=>0,'update_time'=>time()],['id'=>$id]);
    }


    public static function sendCoupon($post){
        $user_ids = $post['user_ids'];
        $coupon_ids = $post['coupon_ids'];
        $now = time();
        foreach ($coupon_ids as $coupon_id){
            foreach ($user_ids  as $user_id){
                $add_data = [
                    'user_id'       => $user_id,
                    'coupon_id'     => $coupon_id,
                    'status'        => 0,
                    'coupon_code'   => create_coupon_code(),
                    'create_time'   => $now,
                ];
                Db::name('coupon_list')->insert($add_data);

            }
        }
        return true;

    }




}