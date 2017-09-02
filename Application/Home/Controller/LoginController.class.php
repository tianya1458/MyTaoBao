<?php
namespace Home\Controller;
use Think\Controller;


class LoginController extends Controller {
    public function login(){
        $this->display();

     
    }

    public function login2(){
    	echo I('get.userName',0)."  ";

    	echo I('get.userPwd',0);

    	$name = I('get.userName',0);
    	$word = I('get.userPwd',0);

    	$User = M('user','tb_');

    	
		$data['user_name'] = $name;
		$data['user_password']= $word;
		$a = $User->where($data)->select();

		if ($a == null){
			echo '登陆失败';
            $this->error('登录失败','/Login/login',5);
		}
		else {
            $this->success('登陆成功','Index/index',3);
        }

	}
}
