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
                        <div class="name left">用户名:<b>@{{message['0'].nickName}}</b>,  欢迎你   </div>

                    </li>

                    <li >
                           <dt >积分@{{message['0'].value}}
                           </dt></dl>
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
                <div class="title_name"  ><i></i>优惠券</div>
                <table >

                    <tr>
                        <td class="Add-text">优惠券类型</td>
                        <td class="label_name">优惠券数量 </td>

                    </tr>

                    <tr  v-for="v in message">
                      <td>
                        <div v-if="v.type == 0">
                            @{{ v.value }}
                        </div>
                        <div v-else>
                            Not sorry
                        </div>
                      </td>
                    </tr>

                </table>


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
               readyUrl: 'http://www.shop.cn/api/myMoney',
                message:[],
                readyModel: {
                    name: '',
                },
                UserModel:{
                    user_id:'<?php echo $user_id ?>',
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
                        url: vm.readyUrl,
                        type: 'get',
                        dataType: 'json',
                        data: vm.UserModel,
                        success: function(res) {
                            console.log(res.result);
 ;
                            vm.message=res.result;


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
