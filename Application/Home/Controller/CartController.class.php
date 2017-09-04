<?php
namespace Home\Controller;
use Think\Controller;


class CartController extends Controller {
    public function cart(){
        $this->display(self::cart_read(),self::cart_submit());
        //$this->display(self::cart_submit());
     
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

     	$userId = $userDao -> where("user_name = '%s' ",$user_name) -> getField('user_id');     ///////////

     	$cartDao = M("tb_cart");
     	$cartDao -> where("user_id=%d and product_name='%s' and cart_number= $d",$userId,$goodName,$goodNumber)->delete();
    }

    public function cart_clear(){                           //清空某用户购物车
        $user_name = I('get.user_name');    //购物车用户
        
        $userDao = M("tb_user");

        $userId = $userDao -> where("user_name = '%s' ",$user_name) -> getField('user_id');

        $cartDao = M("tb_cart");
        $cartDao -> where("user_id=%d",$userId)->delete();
    }

    public function cart_updata(){                          //购物车某商品数量更新，传入数量更新
        $user_name = I('get.user_name');    //购物车用户
        $goodName = I('get.product_name');  //获取购物车商品名
        $goodNumber = I('get.goodNumber');                  //获取更改后购物车商品数量

        $userDao = M("tb_user");

       $userId = $userDao -> where("user_name = '%s' ",$user_name) -> getField('user_id');

        $cartDao = M("tb_cart");

        $data['cart_number'] = $goodNumber;
        $cartDao -> where("user_id=%d and product_name='%s'",$userId,$goodName)->save($data);
    }

    public function cart_submit(){                          //购物车订单提交
        $user_name = I('get.user_name');    //购物车用户
        
        $userDao = M("tb_user");

        $userId = $userDao -> where("user_name = '%s' ",$user_name) -> getField('user_id');

        $cartDao = M("tb_cart");
        $cart = $cartDao -> where("user_id=%d",$userId)->select();

        if ($cart == null)
        {
            $this->error('您的购物车是空的，结算失败。。。',U('Home/Cart/cart'),3);       //购物车为空时跳转
        }
        else {
            $sumList = $cartDao -> where("user_id=%d",$userId)->getField('cart_sum');     //获取商品金额数组
            foreach ($sumList as $value){
                $sum = $sum + $value;
                $this->assign('sum',$sum);
            }                                                                             //计算总金额，用模板输出sum
            $cartDao -> where("user_id=%d",$userId)->delete();                            //结算后清空购物车
            $this->success('正在跳转至支付页面。。。',U('Home/Index/index'),3);           ////////////成功跳转
        }
    }
}
