<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{ URL::asset('index/css/common.css') }}" rel="stylesheet" tyle="text/css" />
<link href="{{ URL::asset('index/css/style.css') }}" rel="stylesheet" type="text/css" />
<title>用户注册</title>
<script src="{{ URL::asset('js/vue.js') }}"></script>
<script src="http://39.96.167.165/jq.js"></script>
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
<div class="rgister Narrow">
  <div class="Sign">
     <div class="AD_img"><img  src="images/adbg_03.png" /></div>
     <div class="rgister-form">
      <div class="rgister-name"><span class="name">用户注册</span> <span class="English">REGISTER</span></div>
	  
	   <div class="form clearfix">	
	    <div class="item"><label class="rgister-label">用&nbsp;&nbsp;户&nbsp;&nbsp;名：</label>
			<input name="" type="text"  class="text" v-model="registerModel.name"/><b>*</b></div>
		<div class="item"><label class="rgister-label" >密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</label>
		<input name="" type="password"  class="text" v-model="registerModel.password"/><b>*</b></div> 
	    <div class="Password_qd"><ul><li class="r">弱</li><li class="z">中</li><li class="q">强</li></ul></div>
		<div class="item"><label class="rgister-label " >确认密码：</label>
		<input name="" type="password"  class="text" v-model="registerModel.surePassword" /><b>*</b></div>
	    <div class="item"><label class="rgister-label" >电子邮箱：
			</label><input name="" type="text"  class="text" v-model="registerModel.email"/><b>*</b></div> 
	 
	   
		<div class="item-ifo">
                    <input type="checkbox" class="checkbox left" checked="checked" id="readme" onclick="agreeonProtocol();">
                    <label for="protocol" class="left">我已阅读并同意<a href="#" class="blue" id="protocol">《福际商城用户注册协议》</a></label>
                </div>
	  </div>	
	  <div class="rgister-btn">
	  <button class="btn_rgister" @click="register">注&nbsp;&nbsp;&nbsp;&nbsp;册</button>
	  </div>
	  <div class="Note"><span class="login_link">已是会员<a href="login">请登录</a></span></div>	  
	  
		</div>		
   </div>
</div>
<!--底部样式-->

</div>
</body>
</html>
<script>
var demo = new Vue({
	el: '#app',
	data: {
		registerUrl: 'http://www.shop.com/api/register',
		registerModel: {
			name: '',
			password: '',
			surePassword:'',
			email: '',
			_token: '{{csrf_token()}}'
		},
		msg: ''
	},
	methods: {
		register: function() {
			var vm = this
			vm.msg = ''
			
			$.ajax({
				url: vm.registerUrl,
				type: 'POST',
				dataType: 'json',
				data: vm.registerModel,
				success: function(data) {
					console.log(data);
					alert("注册成功");
					location.href="login";
					vm.msg = '注册成功！'
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
