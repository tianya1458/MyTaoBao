<?php
namespace Home\Controller;
use Think\Controller;


class GoodController extends Controller {
    public function good(){
        $this->display();

     }

     public function addCart(){									//商品加入购物车
     	$goodId = I('get.product_id');	//获取商品页商品ID
     	$goodNumber = ('get.goodNumber');  //要购买的商品数量

     	$User = ('get.userName');		//获取已登录的用户名

     	$goodDao = M('tb_product');		//链接product表
     	$goodName = $goodDao->where('product_id=%d',$goodId)->getField('product_name');	//获取该商品名
     	$goodPrice = $goodDao->where('product_id=%d',$goodId)->getField('product_price'); //获取商品价格

          $sum = $goodNumber*$goodPrice;      //计算总金额

     	$userDao = M('tb_user');		//链接user表

     	$userId = $userDao->where('user_name=%d',$User)->getField('user_id');		//登录的用户ID

     	$cartDao = M('tb_cart');		//链接cart表

     	$data['user_id'] = $userId;
     	$data['product_id'] = $goodId;
     	$data['product_name'] = $goodName;
     	$data['product_price'] = $goodPrice;
     	$data['cart_number'] = $goodNumber;
          $data['cart_sum'] = $sum;

     	$condition['user_id'] = $userId;
     	$condition['product_id'] = $goodId;		//验证购物车记录是否存在
     	$test = $cartDao->where($condition)->select(); 

     	if($test = null){
     		$cartDao -> add($data);			//无记录时新增记录，加入购物车
     	}
     	else {
     		$number = $cartDao->where('user_id=%d and product_id=%d',$userId,$goodId)->getField('cart_number');

     		$N = $number + $goodNumber;
               $S = $N*$goodPrice;
     		$data['cart_number'] = $N;			//已存在记录时数量累加
               $data['cart_sum'] = $S;

     		$cartDao -> add($data);
     	}
      }
    
}
