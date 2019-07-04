@include('index.header')
<!--右侧样式布局-->
<div class="right_style r_user_style">
    <div class="Order_form" id="box" v-cloak>
        <div class="user_Borders">
            <div class="title_name">
                <span class="name">我的收藏</span>
                <a href="#">更多订单&gt;&gt;</a>
            </div>
            <div class="Order_form_list">
                <table>
                    <thead>
                    <tr><td class="list_name_title0">商品</td>
                        <td class="list_name_title1">单价(元)</td>
                        <td class="list_name_title2">数量</td>
                        <td class="list_name_title4">所属品牌</td>
                        <td class="list_name_title5">发货仓库</td>
                        <td class="list_name_title6">操作</td>
                    </tr></thead>

                    <tbody v-for="(v,k) in message">

                    <tr>
                        <td colspan="3">
                            <table class="Order_product_style">
                                <tbody><tr>
                                    <td>
                                        <div class="product_name clearfix">
                                            <a href="#" class="product_img"><img src="Products/x-2.jpg" width="80px" height="80px" alt="图片丢失"></a>
                                            <a href="3">@{{v.name }}</a>
                                            <p class="specification">礼盒装20个/盒</p>
                                        </div>
                                    </td>
                                    <td>@{{v.price }}元</td>
                                    <td>@{{ v.stock }}</td>
                                </tr>
                                </tbody></table>
                        </td>
                        <td class="split_line">@{{ v.brand}}</td>
                        <td class="split_line">
                        @{{ v.warehouse }}
                        </td>
                        <td class="operating">
                            <a href="#" @click="Delete(v.cid)">删除</a>
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
                collectUrl: 'http://www.shop.cn/api/collect',
                deleteUrl: 'http://www.shop.cn/api/collectDelete',
                message:[],
                UpdateModel:{
                    id:'<?php echo $id ?>',
                },
                DeleteModel:{
                    id:'',
                }

            },

            mounted:function () {
                this.get();
            },
            methods:{
                get:function(){
                    //发送get请求

                    var vm = this
                    $.ajax({
                        url: vm.collectUrl,
                        type: 'get',
                        dataType: 'json',
                        data: vm.UpdateModel,
                        success: function(res) {
                            console.log(res);

                            vm.message=res.result;


                        },
                        error: vm.requestError
                    })
                },
                Delete: function(val) {
                    console.log(val);
                    var vm = this
                    vm.DeleteModel.id=val;
                    vm.msg = ''

                    $.ajax({
                        url: vm.deleteUrl,
                        type: 'get',
                        dataType: 'json',
                        data:vm.DeleteModel,
                        success: function(res) {
                                alert('删除成功');
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
