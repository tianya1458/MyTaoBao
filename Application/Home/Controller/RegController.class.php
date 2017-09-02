<?php
namespace Home\Controller;
use Think\Controller;


class RegController extends Controller {
    public function reg(){
        $this->display();

     
    }

    public function register(){


    	echo "aaa";
    	echo I('get.userName',0)."  ";

    	echo I('get.userPwd',0);

    	$name = I('get.userName',0);
    	$word = I('get.userPwd',0);

    	$User = M('user','tb_');

		$data['user_name'] = $name;
		$data['user_password']= $word;
		$User->add($data);

		echo "注册成功！";
    }
}