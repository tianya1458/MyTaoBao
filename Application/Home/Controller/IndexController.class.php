<?php
namespace Home\Controller;
use Think\Controller;


class IndexController extends Controller {
    public function index(){
      
         $this->display(self::userstate());
    }

    public function userstate (){

        $User = M('user','tb_');

        $logedUser = $User->where('state = 1')->getField('user_name');

        $this->assign('logedUser',$logedUser);
        

        //在HTML中使用{$logedUser}可获得登录的用户名
    }
}
