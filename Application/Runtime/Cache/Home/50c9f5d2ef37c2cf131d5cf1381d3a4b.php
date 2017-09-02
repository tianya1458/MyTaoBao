<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>登录页</title>
  <link rel="stylesheet" type="text/css" href="/myTaoBao/Public/css/index.css" charset="utf-8"/>
</head>
<body>
    <div class="container">
        <!--登录模块-->
        <div class="login">
          <!--用户名登录-->
          <div class="login-box">
            <!--表单项-->
            <form class="box" name="name" id="name" >
              <label for="userName">用&nbsp;户&nbsp;名</label>
              <input type="text" name="userName" id="userName" />
              <i></i>
            </form>
          </div>
            <!--密码输入-->
				  <div class="login-box">
             <!--表单项-->
             <form class="box" name="pwd" id="pwd">
               <label for="userPwd">输 入 密 码</label>
               <input type="password" name="userPwd" id="userPwd"/>
               <i></i>
             </form>
          </div>
          <button type="submit" form="name,pwd" formaction="Home/Login/login2" href="<?php echo U('Home/Index/index');?>">登 录</button>
        </div>
    </div>
  
</body>
</html>