<?php /*a:1:{s:80:"D:\phpStudy\PHPTutorial\WWW\views\application\admin\view\account\do_account.html";i:1558271888;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册管理员</title>
<link rel="stylesheet" type="text/css" href="/static/admin/css/loginstyle.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/css/loginbody.css"/>
</head>
<body>
<div class="container">
	<section id="content">
		<form action="javascript:;" method="post">
			<h1>加入我们</h1>
			<div>
				<input type="text" placeholder="电话" required="" id="username" name="admin_phone"/>
			</div>
			<div>
				<input type="password" placeholder="密码" required="" id="password" name="admin_pwd"/>
			</div>
			<div>
				<input type="text" placeholder="验证码" required="" id="testCode" name="admin_testCode" style="margin-left:-15px;width: 50%;"/>
				<button  id="CodeButton" type="button">获取验证码</button>
			</div>
			 <div class="">
				<span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>			</div> 
			<div>
				<!-- <input type="submit" value="Log in" /`> -->
				<input type="submit" value="注册" class="btn btn-primary" id="js-btn-login"/>
				<a href="">忘记密码?</a>
				<a href="">去登录?</a>
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

<script src="/static/common/jquery-3.4.1/jquery-3.4.1.js"></script>
<script>
	/**
	 * 提交登录
	 * */
	$("input[type='submit']").on('click',function () {
			var admin_phone = $("input[name='admin_phone']").val();
			var admin_pwd = $("input[name='admin_pwd']").val();
			var admin_testCode = $("input[name='admin_testCode']").val();

			$.post("/admin/Account/doAccount",{"admin_phone":admin_phone,"admin_pwd":admin_pwd,"admin_testCode":admin_testCode},function (jsonMsg) {
					var objMsg = $.parseJSON(jsonMsg);
					
					switch (objMsg.errorCode) {
                        case 100:
                            location.href = "/admin/Index/index";
                            break;
                        case 101:
                            alert(objMsg.errorMsg);
                            break;
						case 102:
						    alert(objMsg.errorMsg);
						    break;
                    }
            });
    });




    /**
	 * 获取验证码
     */
    $("#CodeButton").on('click',function () {
        /**
		 * 检查管理员是否输入手机号
         */
        var admin_phone = $("input[name='admin_phone']").val();
        if(admin_phone == ""){
            alert("请您先输入手机号");return false;
		}

        /**
		 * 定义正则
         */
        var phoneREG = /^1[345678]\d{9}$/;

        if(!phoneREG.test(admin_phone)){
            alert('手机号码格式有误');return false;
		}
        /**
		 * 发送验证码
         */
        sendNote(admin_phone);
    });

	/**
	 * Ajax请求后台 请求验证码
	 * */
    function sendNote(admin_phone = '') {
		$.post("/admin/Account/sendNote",{"admin_phone":admin_phone},function (msg) {
			if(msg == 'faliure'){
			    alert("验证码发送失败，请重试");
			}else{
                /**
				 * 定时器功能
                 */
                SetInterval();
			}
        });
    }

    /**
	 * 获取验证码倒计时不可点击功能
     * @constructor
     */
    function SetInterval() {
        var times = 120;
		var setInter = setInterval(function () {
			if(times == 0){
                $("#CodeButton").removeAttr('disabled');
                $("#CodeButton").text('获取验证码');
                clearInterval(setInter);
			}else{
				$("#CodeButton").attr('disabled',true);
				$("#CodeButton").text(times+'s');
				times--;
			}
        },1000);
    }
</script>