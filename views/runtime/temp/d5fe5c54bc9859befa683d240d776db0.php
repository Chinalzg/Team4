<?php /*a:1:{s:76:"D:\phpStudy\PHPTutorial\WWW\views\application\admin\view\login\do_login.html";i:1558271889;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理登录</title>
<link rel="stylesheet" type="text/css" href="/static/admin/css/loginstyle.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/css/loginbody.css"/>
</head>
<body>
<div class="container">
	<section id="content">
		<form action="<?php echo url('Login/doLogin'); ?>" method="post">
			<h1>管理员登录</h1>
			<div>
				<input type="text" placeholder="电话" required="" id="username" name="admin_phone"/>
			</div>
			<div>
				<input type="password" placeholder="密码" required="" id="password" name="admin_pwd"/>
			</div>
			 <div class="">
				<span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>			</div> 
			<div>
				<!-- <input type="submit" value="Log in" /> -->
				<input type="submit" value="登录" class="btn btn-primary" id="js-btn-login"/>
				<a href="#">忘记密码?</a>
				<a href="/admin/Account/doAccount">加入我们?</a>
				<!-- <a href="#">Register</a> -->
			</div>
		</form><!-- form -->
		 <div class="button">
			<span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>
			<a href="#">下载网盘</a>	
		</div> <!-- button -->
	</section><!-- content -->
</div>
<!-- container -->


<br><br><br><br>
<div style="text-align:center;">
	<p>
		欢迎使用ITBlog后台管理平台
	</p>
<p>模板来源:More Templates
	<a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a>
	- Collect from
	<a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
</p>
</div>
</body>
</html>