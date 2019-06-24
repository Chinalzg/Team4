<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>title</title>
    <script src="{{ URL::asset('js/vue.js') }}"></script>
    <script src="http://39.96.167.165/jq.js"></script>
    <link href="{{ URL::asset('index/css/common.css') }}" rel="stylesheet" tyle="text/css" />
    <link href="{{ URL::asset('index/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<!--顶部样式-->
<div id="app">
<div class="common_top">
 <div class="Narrow">
  <div class=" left logo"><a href="#"><img src="images/logo.png" /></a></div>
  <!--可修改图层-->
  <div class=" left festival"><a href="#"><img src="images/logo_yd.png" /></a></div>
  <!--电话图层-->
  <div class="phone">全国服务热线：<em>400-345-5633</em></div>
 </div>
</div>
<div class="login Narrow">
   <div class="login_advertising"><img src="images/login_img_03.png" /></div>
  <div class="login_frame">
   <div class="login-form right">
     <div class="login-name"><h1 class="name">用户登录</h1><span class="login_link"><a href="registered"><b></b>用户注册</a></span></div>
	  <!--提示信息-->
	    <div class="Prompt">账号密码不能为空！ </div>
	    <div class="form clearfix">
	     <div class="item item-fore1"><label for="loginname" class="login-label name-label"></label>
			 <input name="" type="text"  class="text" placeholder="请输入用户" v-model="loginModel.username"/>
		 </div>
		 <div class="item item-fore2"><label for="nloginpwd" class="login-label pwd-label" ></label>
		 <input name="" type="password"  class="text" placeholder="用户密码" v-model="loginModel.password"/>
	     </div> 
	     <div class="Forgetpass"><a href="#">忘记密码？</a></div>
	    </div>	
	    <div class="login-btn">
	    <button class="btn_login" @click="login">登&nbsp;&nbsp;&nbsp;&nbsp;录</button>
	  </div>
    </div>
  </div>
</div>
<!--底部样式-->
 <div class="bottom_footer">
   <p><a href="#">关于我们</a> | <a href="#">联系我们</a> | <a href="#">商家入驻</a> | <a href="#">法律申明</a> | <a href="#">友情链接</a>  </p>
	 <p>Copyright©2014四川金祥保险销售有限公司.All Rights Reserved. </p>
	 <p>川ICP备09150084号</p>
   </div>
   </div>
</body>
</html>
<script>
var demo = new Vue({
	el: '#app',
	data: {
		loginUrl: 'http://www.shop.com/index/loginCheck',
		logoutUrl: 'http://localhost:10648/api/Account/Logout',
		loginModel: {
			username: '',
			password: '',
			grant_type: 'password',
			_token: '{{csrf_token()}}'
		},
		msg: '',
		userName: ''
	},

	ready: function() {
		this.userName = sessionStorage.getItem('userName')
	},
	methods: {
		login: function() {
			var vm = this
				vm.msg = ''
				vm.result = ''
			
			$.ajax({
				url: vm.loginUrl,
				type: 'POST',
				dataType: 'json',
				data: vm.loginModel,
				success: function(data) {
          console.log(data);
					vm.msg = '登录成功！'
					location.href="index";
					vm.userName = data.userName
					sessionStorage.setItem('accessToken', data.access_token)
					sessionStorage.setItem('userName', vm.userName)
				},
				error: vm.requestError
			})
		},
		logout: function() {
			var vm = this
				vm.msg = ''

			$.ajax({
				url: vm.logoutUrl,
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					
					vm.msg = '注销成功！'
					vm.userName = ''
					vm.loginModel.userName = ''
					vm.loginModel.password = ''
					
					sessionStorage.removeItem('userName')
					sessionStorage.removeItem('accessToken')
				},
				error: vm.requestError
			})
		},
		requestError: function(xhr, errorType, error) {
			this.msg = xhr.responseText
		}
	}
})
</script>