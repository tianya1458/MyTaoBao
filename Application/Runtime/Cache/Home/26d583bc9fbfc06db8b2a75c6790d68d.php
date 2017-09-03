<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>注册页</title>
		<link rel="stylesheet" type="text/css" href="/myTaoBao/Public/css/index.css" charset="utf-8"/>
	</head>
	
        <body>
		<!--版心-->
		<div class="container">
			<!--注册模块-->
			<div class="register">
				<!--用户名注册-->
				<div class="register-box">
					<!--表单项-->
					<div class="box">
						<label for="userName">用&nbsp;户&nbsp;名</label>
						<input type="text" name="userName" id="userName" placeholder="您的账户名和登录名" />
						<i></i>
					</div>
					<!--提示信息-->
					<div class="remind">
						<i></i>
						<span></span>
					</div>
				</div>

				<!--设置密码-->
				<div class="register-box">
					<!--表单项-->
					<div class="box">
						<label for="userPwd">设 置 密 码</label>
						<input type="password" name="userPwd" id="userPwd" placeholder="建议至少使用两种字符组合" />
						<i></i>
					</div>
					<!--提示信息-->
					<div class="remind">
						<i></i>
						<span></span>
					</div>
				</div>

				<!--确认密码-->
				<div class="register-box">
					<!--表单项-->
					<div class="box">
						<label for="confirmPwd">确 认 密 码</label>
						<input type="password" name="confirmPwd" id="confirmPwd" placeholder="请再次输入密码" />
						<i></i>
					</div>
					<!--提示信息-->
					<div class="remind">
						<i></i>
						<span></span>
					</div>
				</div>
 
 
				<!--验证码-->
				<div class="register-box">
					<!--表单项-->
					<div class="box verify">
						<label for="code">验&nbsp;证&nbsp;码</label>
						<input type="text" name="code" id="code" placeholder="请输入验证码" />
						<div class="verifyCode" id="verifyCode">
							abC12
						</div>
					</div>

					<!--提示信息-->
					<div class="remind">
						<i></i>
						<span></span>
					</div>
				</div>
				<!--协议-->
				<div class="agreement">
					<!--表单项-->
					<div class="agreeBox">
						<input type="checkbox" name="agreement" id="agreement"/>
						<span>我已阅读并同意<a href="#">《用户最终协议》</a></span>
					</div>
					<!--提示信息-->
					<div class="remind">
						<i></i>
						<span></span>
					</div>
				</div>
				<!--注册-->
				<button id="btn">立即注册</button>
			</div>			
		</div>
		<script src="/myTaoBao/Public/js/regExpManger.js" type="text/javascript" charset="utf-8"></script>
		<script src="/myTaoBao/Public/js/generateCode.js" type="text/javascript" charset="utf-8"></script>
		<script src="/myTaoBao/Public/js/register.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>