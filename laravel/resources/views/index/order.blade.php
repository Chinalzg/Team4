@include('index.header')
 <!--右侧样式布局-->
<div class="right_style r_user_style">
    <div class="Order_form" id="box" v-cloak>
        <div class="user_Borders">
            <div class="title_name">
                <span class="name"  v-on:click="get">我的订单</span>
                <span class="name"  v-on:click="unpaid"> 待支付</span>
                <span class="name"  v-on:click="unreceived">待收货</span>
                <span class="name" v-on:click="noComment">待评论</span>

                <a href="#">更多订单&gt;&gt;</a>
            </div>
            <div class="Order_form_list">
                <table>
                    <thead>
                    <tr><td class="list_name_title0">商品</td>
                        <td class="list_name_title1">单价(元)</td>
                        <td class="list_name_title2">数量</td>
                        <td class="list_name_title4">实付款(元)</td>
                        <td class="list_name_title5">订单状态</td>
                        <td class="list_name_title6">操作</td>
                    </tr></thead>

                    <tbody v-for="(v,k) in message">
                    <tr><td colspan="6" class="Order_form_time">2015-12-3 订单号：@{{ v.order_sn }}</td></tr>
                    <tr>
                        <td colspan="3">
                            <table class="Order_product_style">
                                <tbody><tr>
                                    <td>
                                        <div class="product_name clearfix">
                                            <a href="#" class="product_img"><img src="Products/x-2.jpg" width="80px" height="80px" alt="图片丢失"></a>
                                            <a href="3">@{{v.g_name }}</a>
                                            <p class="specification">礼盒装20个/盒</p>
                                        </div>
                                    </td>
                                    <td>@{{v.price }}元</td>
                                    <td>@{{ v.num }}</td>
                                </tr>
                                </tbody></table>
                        </td>
                        <td class="split_line">@{{ v.price * v.num}}</td>
                        <td class="split_line">
                            <div v-if="v.pay_status  == '1'">
                                已支付,

                                <div v-if="v.trade_status  == '0'">
                                    待发货
                                </div>
                                <div v-else-if="v.trade_status == '1'">
                                    交易完成
                                </div>
                                <div v-else-if="v.trade_status == '2'">
                                    已发货
                                </div>
                            </div>
                            <div v-else-if="v.pay_status == '0'">
                               未支付
                            </div>

                        </td>
                        <td class="operating">
                            <a href="#">查看详细</a>
                            {{--<a :href="comment(v.g_id )">@{{ v.g_id }}</a>--}}
                            <a :href="'comment?id=' + v.goods_id +'&userid='+v.buyer " onclick="comment(v.g_id )">评论</a>
                        </td>
                    </tr>
                    </tbody>

                </table>
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
                orderUrl: 'http://www.shop.cn/api/order',
                unpaidUrl: 'http://www.shop.cn/api/unpaid',
                unreceivedUrl: 'http://www.shop.cn/api/unreceived',
                uncommentUrl: 'http://www.shop.cn/api/noComment',
                message:[],
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
                        url: vm.orderUrl,
                        type: 'get',
                        dataType: 'json',
                        data: vm.UpdateModel,
                        success: function(res) {
                         console.log(res.result);

                            vm.registerModel.name = res.result.name;
                            vm.registerModel.email = res.result.email;
                            vm.message=res.result;


                        },
                        error: vm.requestError
                    })
                },
                unpaid: function() {

                    var vm = this
                    vm.msg = ''

                    $.ajax({
                        url: vm.unpaidUrl,
                        type: 'get',
                        dataType: 'json',
                        data: vm.UpdateModel,
                        success: function(res) {
                            console.log(res.result);

                            vm.registerModel.name = res.result.name;
                            vm.registerModel.email = res.result.email;
                            vm.message=res.result;
                        },
                        error: vm.requestError
                    })
                },
                unreceived: function() {

                    var vm = this
                    vm.msg = ''

                    $.ajax({
                        url: vm.unreceivedUrl,
                        type: 'get',
                        dataType: 'json',
                        data: vm.UpdateModel,
                        success: function(res) {
                            console.log(res.result);

                            vm.registerModel.name = res.result.name;
                            vm.registerModel.email = res.result.email;
                            vm.message=res.result;
                        },
                        error: vm.requestError
                    })
                },
                noComment: function() {

                    var vm = this
                    vm.msg = ''

                    $.ajax({
                        url: vm.uncommentUrl,
                        type: 'get',
                        dataType: 'json',
                        data: vm.UpdateModel,
                        success: function(res) {
                            console.log(res.result);

                            vm.registerModel.name = res.result.name;
                            vm.registerModel.email = res.result.email;
                            vm.message=res.result;
                        },
                        error: vm.requestError
                    })
                },
                comment: function(val) {
                    var vm = this
                    return 'http://www.shop.cn/api/comment?goodsid='+val+'&userid='+vm.UpdateModel.id;

                },


                requestError: function(xhr, errorType, error) {
                    this.msg = xhr.responseText
                }
            }
        });
    }


</script>
</html>
