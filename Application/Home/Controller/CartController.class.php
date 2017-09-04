<?php
namespace Home\Controller;
use Think\Controller;


class CartController extends Controller {
    public function cart(){
        $this->display(self::cart_read());

     
    }

    public function cart_read(){        //返回购物车数组

        $User = M('user','tb_');

        $uid = $User->where('state = 1')->getField('user_id');

        $Dao = M('cart','tb_');

        $list = $Dao->where("user_id=%d",$uid)
        ->select();

        //dump($list);
        $this->assign('cart',$list);

        //	在HTML中使用以下volist标签获取数组，表项可增加
        //	<volist name="cart" id="vo">
		//	{$vo.product_id}:{$vo.product_name}:{$vo.product_price}:{$vo.cart_number}<br/>
		//	</volist>

    }

    //子朝逻辑完整版，考虑到了多人登录的问题，参数可改成用GET获取
    //通过用户id获取购物车内容接口
    public function getCartGoodList($user_id)
    {
        //检查天涯是否给你传了user_id
        if (!$user_id) {
            //没传告诉他要传
            $this->error("请输入用户名");
        }
        //获取用户表
        $userDao = M("tb_user");
        //设置查找条件
        $condition['user_id'] = $user_id;
        //获取符合的用户组
        $users = $userDao
        ->where($condition)
        ->select();
        //获取这个用户
        $user = $users[0];
        if (!$user) {//没有获取到说明没有这个用户
            $this->error("该用户不存在！");
        }
        if ($user['state'] == 0) {//如果用户未登录，让他直接去登录
            $this->redirect("Home/Login/login");
        }
        //获取购物车表
        $cartDao = M("tb_cart");
        //  查找user_id用户的所有物品
        $list = $cartDao
        ->where($condition)
        ->select();

        //dump($list);测试用
        //输出
        $this->assign('cart',$list);
        $this->display();
    }

    public function cart_delate(){							//购物车记录删除
    	$user_name = I('get.user_name');	//购物车用户
    	$goodName = I('get.product_name');	//获取购物车商品名
     	$goodNumber = I('get.goodNumber');  //购物车商品数量

     	$userDao = M("tb_user");

     	$userId = $userDao -> where('user_id = %d',$userId) -> getField('user_name');

     	$cartDao = M("tb_cart");
     	$cartDao -> where("user_id=%d and product_name='%s' and cart_number= $d",$userId,$goodName,$goodNumber)->delete();
    }
}
