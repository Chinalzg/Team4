@include('index.header')
<!--右侧样式布局-->
<div class="right_style r_user_style">
    <div class="Order_form" id="box" v-cloak>
        <div class="user_Borders">
            <div class="title_name">
                <span class="name"  v-on:click="get">@{{ message['0'].shopname }}的店铺</span>
            </div>

            <div class="user_info_p_s clearfix" >
                <div class="left_user_cont">
                    <div class="us_Orders left clearfix" v-for="(v,k) in message">


                            <tbody >

                            <div v-if="!v.contents">

                            </div>
                            <div v-else>
                                <tr>
                                    <td class="img">
                                        <a :href="'informationShow?id=' + v.id + '&admin_id='+v.admin_id "><span class="left">@{{ v.shopname }} </span>
                                        </a>
                                    </td>
                                    <td><span class="left">:@{{ v.contents }}</span></td>
                                </tr>

                            </div>

                            <br>
                            <div v-if="!v.content">

                            </div>
                            <div v-else>
                                 我:
                                @{{ v.content }}

                            </div>

                            </tbody>

                    </div>
                    <p  v-if="show">我: @{{msg}}</p>
                </div>
                <div>  <h4>消息回复</h4>
                    <input v-model="msg" placeholder="编辑我……">
                     <button @click="checkcontent" >发送</button>

                </div>
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
                readyUrl: 'http://www.shop.cn/api/informationShow',
                createUrl: 'http://www.shop.cn/api/informationCreate',
                message:[],
                content:"",
                msg:'',
                show:false,
                UpdateModel:{
                    id:'',
                },
                ShowModel:{
                    id:'<?php echo $data['id']?>',
                    admin_id:'<?php echo $data['admin_id']?>',
                    content:'',
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
                        url: vm.readyUrl,
                        type: 'get',
                        dataType: 'json',
                        data: vm.ShowModel,
                        success: function(res) {
                            console.log(res.result);

                            vm.message=res.result;


                        },
                        error: vm.requestError
                    })
                },
                checkcontent:function( ){
                    this.show = !this.show;
                    var vm = this
                    vm.ShowModel.content = vm.msg;

                    $.ajax({
                        url: vm.createUrl,
                        type: 'get',
                        dataType: 'json',
                        data: vm.ShowModel,
                        success: function(res) {
                            console.log(res.result);



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
<script type="text/javascript">
    //点击圆框时上传图片
    function file(evn) {
        var img_obj = $(evn).children(".file")
        var file_id = $(img_obj[1]).attr("id")
        document.getElementById(file_id).click()
    }


    //点击时复制角色框
    function copy(evn) {
        var obj = $(evn).prev();
        var num =  $(".role").length
        console.log(num)
        if (num>4){
            alert('禁止上传图片');
        }else{
            $(obj).clone().insertBefore(evn);
            $(obj).css("display","block")
            var img_obj = $(obj).children(".file")
            console.log(img_obj)
            var img_id = $(img_obj[0]).attr("id","goods_"+num)
            var file_id = $(img_obj[1]).attr("id","goods"+num)
        }

    }
    //左侧图像点击时显示图像
    function le(evn){
        var id = $(evn).attr('id');//获取id
        var num = "goods_"+id.substr(5,1);
        var file = event.target.files[0];
        if (window.FileReader) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
//监听文件读取结束后事件
            reader.onloadend = function (e) {
                var divObj= $(evn).prev()  //获取div的DOM对象
                $(divObj).html("") //插入文件名
                $("#"+num).css("display","block");
                $("#"+num).attr("src",e.target.result);    //e.target.result就是最后的路径地址
            };
        }
    }


</script>
</html>
