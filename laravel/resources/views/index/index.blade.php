@include('index.header')

    <!--右侧样式布局-->
    <div class="right_style r_user_style" id="box"  v-cloak>
        <!--地址管理-->


        <div class="user_address">
            <div class="title_name"> <span class="name">地址管理</span></div>

            <div class="Address_List clearfix">
 
                <ul class="Address_info" v-for="(v,k) in msg">
                    <div class="address_title"><a :href="'addressUpdate?id=' + v.a_id " class="modify " title="修改信息"></a>地址信息 <a href="javascript:over('0')" class="delete" @click="Delete(v.a_id)"><i class="iconfont icon-close"></i></a></div>
                    <li>姓名:@{{ v.name }}</li>
                    <li>地址:@{{ v.address}}</li>
                    <li>电话:@{{ v.tel }}</li>
                    <li>固话:@{{ v.phone }}</li> 
                </ul>
            </div>
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

                <div class="title_name"  ><i></i>添加地址</div>
                <table>
                    <tr>
                        <td class="label_name">收货地址</td>
                        <td><input name="" type="text"  v-model="registerModel.address" class="Add-text"/><i>（必填)  <span>@{{msgaddress}}123</span>  </i></td>
                        <td><input type="hidden"  v-model="registerModel.id"></td>
                        <span>@{{msgaddress}}</span>
                    </tr>

                    <tr>
                        <td class="label_name">收件人姓名</td><td><input name="" type="text" @blur="checkname"  v-model="registerModel.name" class="Add-text"/><i>（必填）<span>@{{ msgname }}</span> </i></td>
                        <td class="label_name">电子邮箱</td><td><input name="" type="text"  v-model="registerModel.email" class="Add-text"/><i>（选填）</i></td>
                    </tr>
                    <tr>
                        <td class="label_name">邮&nbsp;&nbsp;编</td><td><input name="" v-model="registerModel.postal" type="text"  class="Add-text"/><i>（必填）</i></td>
                        <td class="label_name">性&nbsp;&nbsp;别</td><td>
                            <label class="sex"> <input type="radio" name="RadioGroup1" v-model="registerModel.sex" value="1" id="RadioGroup1_0"  class="select"/><span>男</span></label>
                            <label class="sex"><input type="radio" name="RadioGroup1"  v-model="registerModel.sex" value="2" id="RadioGroup1_1" class="select"/><span>女</span></label><i>（选填）</i> </td>
                    </tr>
                    <tr><td class="label_name">手&nbsp;&nbsp;机</td><td><input name="" type="text"  class="Add-text" v-model="registerModel.tel"/><i>（必填）</i></td>
                        <td class="label_name">固定电话</td><td><input name="" type="text"  class="Add-text" v-model="registerModel.phone"/><i>（选填）</i></td></tr>
                    <tr><td class="label_name"></td><td></td><td class="label_name"></td><td></td>
                    </tr>
                </table>
                <div class="address_Note"><span>注：</span>只能添加5个收货地址信息。请乎用假名填写地址，如造成损失由收货人自己承担。</div>
                <div class="btn">
                    <button class="Add_btn" @click="register">注册</button>
                </div>
            </div>
            <p style="display: block">@{{msgname}}</p>


        </div>
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
                registerUrl: 'http://www.shop.cn/api/addressCreate',
                deleteUrl:'http://www.shop.cn/api/addressDelete',
                msg:[],
                msgname:"",
                msgmail:"",
                registerModel: {
                    email: '',
                    name: '',
                    postal :'',
                    address:'',
                    tel :'',
                    phone :'',
                    sex:'',
                    id:'',

                },
                deleteModel:{
                     id:'',
                },
            },

            mounted:function () {
                this.get();
            },
            methods:{
                checkname:function(){
                    if(this.registerModel.name==""){
                        this.msgname = "用户名不能为空";

                        alert(this.msgname);
                    }else{
                        this.msgname ="123";
                        // alert(this.msgname);
                    }
                },
                get:function(){
                    //发送get请求
                    this.$http.get("http://www.shop.cn/api/personalShow").then(function(res){

                        var body=JSON.parse(res.body);
                        console.log(body.result);
                        this.registerModel.id = body.result.user_id;
                        this.msg=body.result.data;

                    },function(){
                        console.log('请求失败处理');
                    });
                },


                register: function() {
                    var vm = this
                    vm.msg = ''

                    $.ajax({
                        url: vm.registerUrl,
                        type: 'get',
                        dataType: 'json',
                        data: vm.registerModel,
                        success: function(res) {
                           if (res.msg=='执行失败')
                           {
                               alert('执行失败');
                           }else{
                               alert('执行成功');
                                history.go(0);
                           }
                        },
                        error: vm.requestError
                    })
                },
                 Delete: function(val) {
                    console.log(val);
                    var vm = this
                    vm.deleteModel.id=val;
                    vm.msg = ''

                    $.ajax({
                        url: vm.deleteUrl,
                        type: 'get',
                        dataType: 'json',
                        data:vm.deleteModel,
                        success: function(res) {
                            alert('删除成功');
                             history.go(0);
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

