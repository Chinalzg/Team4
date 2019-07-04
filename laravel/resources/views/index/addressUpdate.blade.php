@include('index.header')

    <!--右侧样式布局-->

    <div class="right_style r_user_style" id="box" v-cloak>

        <!--地址管理-->
        <div class="user_address">
            <div class="title_name"> <span class="name">地址管理</span></div>

            <div class="Address_List clearfix">
                <ul class="Address_info"  >

                    <div class="address_title"><a  class="modify " title="修改信息"></a>地址信息 <a href="javascript:over('0')" class="delete "><i class="iconfont icon-close"></i></a></div>
                    <li>
                      昵称:  @{{ registerModel.name }}
                    </li>
                    <li>
                       邮箱: @{{ registerModel.email }}
                    </li>
                    <li>
                      邮编:  @{{ registerModel.postal }}
                    </li>
                    <li>地址:@{{ registerModel.address }}</li>
                    <li>电话:@{{ registerModel.tel }}</li>
                    <li>性别:
                        <li v-if="registerModel.sex == 1">
                            男
                        </li>
                        <li v-else>
                          女
                        </li>
                    </li>
                    <li>@{{ registerModel.aid }}</li>
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
                <div class="title_name" @click="create"><i></i>修改地址</div>
                <table>
                    <tr>
                        <td class="label_name">收货地址</td>

                        <td><input name=""  v-model="registerModel.address" class="Add-text"/><i>(必填)</i></td>
                        <td><input v-model="registerModel.name"></td>
                    </tr>
                    <tr>
                        <td class="label_name">收件人姓名</td><td><input name="" type="text"  v-model="registerModel.name" class="Add-text"/><i>(必填)</i></td>
                        <td class="label_name">电子邮箱</td><td><input name="" type="text"  v-model="registerModel.email" class="Add-text"/><i>（选填）</i></td>
                    </tr>
                    <tr>
                        <td class="label_name">邮&nbsp;&nbsp;编</td><td><input name="" v-model="registerModel.postal" type="text"  class="Add-text"/><i>(必填)</i></td>
                        <td class="label_name">性&nbsp;&nbsp;别</td><td>
                            <label class="sex"> <input type="radio" name="RadioGroup1" v-model="registerModel.sex" value="1" id="RadioGroup1_0"  class="select"/><span>男</span></label>
                            <label class="sex"><input type="radio" name="RadioGroup1"  v-model="registerModel.sex" value="2" id="RadioGroup1_1" class="select"/><span>女</span></label><i>（选填）</i> </td>
                    </tr>
                    <tr><td class="label_name">手&nbsp;&nbsp;机</td><td><input name="" type="text"  class="Add-text" v-model="registerModel.tel"/><i>(必填)</i></td>
                        <td class="label_name">固定电话</td><td><input name="" type="text"  class="Add-text" v-model="registerModel.phone"/><i>（选填）</i></td></tr>
                    <tr><td class="label_name"></td><td></td><td class="label_name"></td><td></td>
                    </tr>
                </table>
                <div class="address_Note"><span>注：</span>请乎用假名填写地址，如造成损失由收货人自己承担。</div>
                <div class="btn">
                    <button class="Add_btn" @click="register">修改</button>


                </div>

            </div>

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
                message:'',
                registerUrl: 'http://www.shop.cn/api/addressFind',
                updateUrl:'http://www.shop.cn/api/addressUpdate',
                registerModel: {
                    email:"",
                    name: '',
                    postal :'',
                    address:'',
                    tel :'',
                    phone :'',
                    sex:'',
                },
                UpdateModel:{
                    id:'1',
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
                        url: vm.registerUrl,
                        type: 'get',
                        dataType: 'json',
                        data: vm.UpdateModel,
                        success: function(res) {
                            console.log(res.result);

                            vm.registerModel.name = res.result.name;
                            vm.registerModel.email = res.result.email;
                            vm.registerModel=res.result;

                        },
                        error: vm.requestError
                    })
                },
                register: function() {
                    var vm = this
                    vm.msg = ''

                    $.ajax({
                        url: vm.updateUrl,
                        type: 'get',
                        dataType: 'json',
                        data: vm.registerModel,
                        success: function(res) {
                            if (res.msg=='执行失败')
                            {
                                alert('执行失败');
                            }else{
                                alert('执行成功');
                                location. reload()
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

