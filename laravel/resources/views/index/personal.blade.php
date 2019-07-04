@include('index.header')
 <!--右侧内容展示-->
  <div class="right_style r_user_style" id="box" v-cloak>
  <div class="Notice"><span>系统最新公告:</span>为了更好地服务于【每日鲜】的会员朋友及读者 发表意见。</div> 
   <!--用户基本信息-->
   <div class="clearfix">
    <div class="user_info clearfix">
	     <div class="user_name_info" >
          <ul>
	       <li class="us_one">
	        <div class="name left">用户名:<b>@{{message.nickName}}</b>,  欢迎你 <a href="#" class="link_user">[修改密码]</a>  </div>
	        <div class="right time"> <span>上次访问时间：2015-5-21 10:23</span></div>
	      </li>
	      <li  >
	      <dl><dt class="left">邮箱：</dt><dd>@{{message.email}}</dd></dl>
	   <dl><dt class="left">密码：</dt><dd><b>@{{message.password}}</b> </dd></dl>
	   <dl><dt class="left">账号名称展示：</dt><dd><b>@{{message.name}}</b></dd></dl>
	  </li>
	  <li >
	   <dl><dt class="left">性别：
				  </dt><dd>

			   <div v-if="message.sex == 0">
				   男
			   </div>
			   <div v-else>
				   女
			   </div>
		   </dd></dl>
	   <dl><dt >出生年月： @{{ message.bir}}</dt></dl>
	  </li>
	  <li class="us_four">
	  <div class="Address"><em></em><a href="#">地址管理&gt;</a></div>
	  </li>
	 </ul>
    </div>
   </div>  
  </div>
	  <div class="right_style r_user_style">
		  <!--地址管理-->
		  <div class="user_address">

			  <!--添加地址样式-->
			  <script src="Threelinkage/kit.js"></script>
			  <!--[if IE]>
			  <script src="Threelinkage/ieFix.js"></script>
			  <![endif]-->
			  <script type="text/javascript">
                  var _gaq = _gaq || [];
                  _gaq.push(['_setAccount', 'UA-30210234-1']);
                  _gaq.push(['_trackPageview']);
                  (function() {
                      var ga = document.createElement('script');
                      ga.type = 'text/javascript';
                      ga.async = true;
                      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                      var s = document.getElementsByTagName('script')[0];
                      s.parentNode.insertBefore(ga, s);
                  })();

			  </script>
			  <script src="Threelinkage/dom.js"></script>
			  <script src="Threelinkage/event.js"></script>
			  <script src="Threelinkage/math.js"></script>
			  <script src="Threelinkage/TreeDict.js"></script>
			  <script src="Threelinkage/form.js"></script>
			  <script src="Threelinkage/combobox.js"></script>
			  <script src="Threelinkage/suggestselect.js"></script>
			  <script src="Threelinkage/list.js"></script>
			  <!--json data-->
			  <script src="Threelinkage/json-data.js" charset="utf-8"></script>
			  <link href="Threelinkage/linkage.css" rel="stylesheet"  type="text/css"/>

			  <div class="Add_Addresss"  >
				  <div class="title_name"  ><i></i>个人信息修改</div>
				  <table>

					  <tr>
						  <td class="label_name">用户名</td><td><input name="" type="text"  v-model="registerModel.name" class="Add-text"/><i>（必填）</i></td>
						  <td class="label_name">电子邮箱</td><td><input name="" type="text"  v-model="registerModel.email" class="Add-text"/><i>（选填）</i></td>
					  </tr>
					  <tr>
						  <td class="label_name">密码</td><td><input name="" v-model="registerModel.password" type="text"  class="Add-text"/><i>（必填）</i></td>
						  <td class="label_name">性&nbsp;&nbsp;别</td><td>
							  <label class="sex"> <input type="radio" name="RadioGroup1" v-model="registerModel.sex" value="1" id="RadioGroup1_0"  class="select"/><span>男</span></label>
							  <label class="sex"><input type="radio" name="RadioGroup1"  v-model="registerModel.sex" value="2" id="RadioGroup1_1" class="select"/><span>女</span></label><i>（选填）</i> </td>
					  </tr>
					  <tr><td class="label_name">出生年月</td><td><input name="" type="date"  class="Add-text" v-model="registerModel.bir"/><i>（必填）</i></td>
						  <td class="label_name">昵称</td><td><input name="" type="text"  class="Add-text" v-model="registerModel.nickName"/><i>（选填）</i></td></tr>
					  <tr><td class="label_name"></td><td></td><td class="label_name"></td><td></td>
					  </tr>
				  </table>
				  <div class="btn">
					  <button class="Add_btn" @click="update">修改</button>


				  </div>

			  </div>

		  </div>
	  </div>

  </div>
   <!--结束-->
 </div>
</div>

 <!--底部样式-->
@include('index.button')
</body>
<script type="text/javascript">
    window.onload = function(){
        var vm = new Vue({
            el:'#box',

            data:{
                personalUrl: 'http://www.shop.cn/api/personal',
                updateUrl: 'http://www.shop.cn/api/personalUpdate',
                message:'',
                registerModel: {
                    email:"",
                    name: '',
                    nickName :'',
					password:'',
                    sex:'',
					bir:'',
                    id:'<?php echo $id ?>',
                },
                UserModel:{
                    id:'<?php echo $id ?>',

                },

            },

            mounted:function () {
                this.get();
            },
            methods:{
                get:function(){
                    //发送get请求

                    var vm = this
                    $.ajax({
                        url: vm.personalUrl,
                        type: 'get',
                        dataType: 'json',
                        data: vm.UserModel,
                        success: function(res) {
                            console.log(res.result);

                            vm.registerModel.name = res.result.name;
                            vm.registerModel.email = res.result.email;
                            vm.registerModel.nickName = res.result.nickName;
                            vm.registerModel.sex = res.result.sex;
                            vm.registerModel.password = res.result.password;
                            vm.registerModel.bir = res.result.bir;
                            vm.message=res.result;


                        },
                        error: vm.requestError
                    })
                },
                update: function() {

                    var vm = this
                    vm.msg = ''

                    $.ajax({
                        url: vm.updateUrl,
                        type: 'get',
                        dataType: 'json',
                        data: vm.registerModel,
                        success: function(res) {
                            console.log(res);
                            if (res.msg =='请求成功')
							{
                              alert('信息修改成功');
                                window.location.reload();
							}

                        },
                        error: vm.requestError
                    })
                },
                requestError: function(xhr, errorType, error) {
                    this.msg = xhr.responseText
                }
            }
        });
    }


</script>
</html>
