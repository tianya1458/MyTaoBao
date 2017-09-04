<?php
namespace Home\Controller;
use Think\Controller;


class RegController extends Controller {
    public function reg(){
        $this->display();

     
    }

    public function register(){             //注册，登录状态默认为0


    	//echo "aaa";
    	//echo I('get.userName',0)."  ";

    	//echo I('get.userPwd',0);

    	$name = I('get.userName',0);
    	$word = I('get.userPwd',0);

    	$User = M('user','tb_');

		$data['user_name'] = $name;
		$data['user_password']= $word;
        $data['state'] = 0;
		$User->add($data);

        if(true)
        {

            redirect(U('Home/Login/login'), 3, '注册成功，请登录...');
        }

		 
    }
}