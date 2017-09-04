<?php
namespace Home\Controller;
use Think\Controller;


class LoginController extends Controller {
    public function login(){
        $this->display();

     
    }

    public function login2(){               //登录
    	echo I('get.userName',0)."  ";

    	echo I('get.userPwd',0);

    	$name = I('get.userName',0);
    	$word = I('get.userPwd',0);

    	$User = M('user','tb_');

    	
		$data['user_name'] = $name;
		$data['user_password']= $word;
		$a = $User->where($data)->select();

		if ($a == null){
			
            $this->error('登录失败',U('Home/Login/login'),5);
		}
		else {
            //置登录状态为1
            $data['state'] = 1;
            $User-> where("user_name='%s' ",$name)->field('state')->filter('strip_tags')->save($data);      
            $this->success('登陆成功',U('Home/Index/index'),3);
        }

	}
}
