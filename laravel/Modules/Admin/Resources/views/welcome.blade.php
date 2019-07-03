<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>电子商城后台</title>
    <link rel="stylesheet" href="{{ URL::asset('static/css/pintuer.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('static/css/admin.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('static/css/style.css') }}">
    <script src="{{ URL::asset('static/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('static/js/pintuer.js') }}"></script>
    <script src="{{ URL::asset('static/js/layer/layer.js') }}"></script>
    {{-- Laravel Mix - CSS File --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/admin.css') }}"> --}}
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 个人信息</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="clearfix">
        <div class="admin_info_style">
            <div class="admin_modify_style" id="Personal">
                <div class="type_title">管理员信息</div>
                <div class="xinxi">
                    <div class=" form-group container"><label class="xs1 text-right " for="form-field-1">用户名： </label>
                        <div class="xs11"><input type="text" name="用户名" id="website-title" value="<?= $data['admin_name']?>" class="xs2 text_info" disabled="disabled">
                            &nbsp;&nbsp;&nbsp;<a href="javascript:ovid()" onclick="change_Password()" class="button button-small bg-red ">修改密码</a></div>

                    </div>

                    <div class="form-group container"><label class="xs1 text-right" for="form-field-1">角色： </label>
                        @foreach($data['role'] as $k=>$v)
                        <span><?= $v?>&nbsp;</span>
                        @endforeach
                    </div>

                    <div class="form-group container"><label class="xs1 text-right" for="form-field-1">注册时间：</label>
                        <div class="xs11" > <span><?= $data['create'] ?></span></div>
                    </div>
                    <div class="Button_operation clearfix">
                        <button onclick="modify();" class="button bg-yellow margin-right" type="submit">修改信息</button>
                        <button onclick="save_info();" class="button bg-green " type="button">保存修改</button>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>


</div>{{$id}}


<!--修改密码样式-->
<div class="change_Pass_style" id="change_Pass">
    <ul class="xg_style">
        <li><label class="label_name">原&nbsp;&nbsp;密&nbsp;码</label><input name="原密码" type="password" class="input" id="password" style="width: 150px;"></li>
        <li><label class="label_name">新&nbsp;&nbsp;密&nbsp;码</label><input name="新密码" type="password" class="input" id="Nes_pas"></li>
        <li><label class="label_name">确认密码</label><input name="再次确认密码" type="password" class="input" id="c_mew_pas"></li>

    </ul>
    <!--       <div class="center"> <button class="btn btn-primary" type="button" id="submit">确认修改</button></div>-->
</div>
<script type="text/javascript">

    //按钮点击事件
    function modify(){
        $('.text_info').attr("disabled", false);
        $('.text_info').addClass("add");
        $('#Personal').find('.xinxi').addClass("hover");
        $('#Personal').find('.btn-success').css({'display':'block'});
    };
    function save_info(){
        var num=0;
        var str="";
        $(".xinxi input[type$='text']").each(function(n){
            if($(this).val()=="")
            {

                layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                    title: '提示框',
                    icon:0,
                });
                num++;
                return false;
            }
        });
        if(num>0){  return false;}
        else{

            layer.alert('修改成功！',{
                title: '提示框',
                icon:1,
            });
            $('#Personal').find('.xinxi').removeClass("hover");
            $('#Personal').find('.text_info').removeClass("add").attr("disabled", true);
            $('#Personal').find('.btn-success').css({'display':'none'});
            layer.close(index);

        }
    };
    //初始化宽度、高度
    //  $(".admin_modify_style").height($(window).height());
    $(".recording_style").width($(window).width()-400);
    //当文档窗口发生改变时 触发
    $(window).resize(function(){
//	$(".admin_modify_style").height($(window).height());
        $(".recording_style").width($(window).width()-400);
    });
    //修改密码
    function change_Password(){
        layer.open({
            type: 1,
            title:'修改密码',
            area: ['300px','300px'],
            shadeClose: true,
            content: $('#change_Pass'),
            btn:['确认修改'],
            yes:function(index, layero){
                if ($("#password").val()==""){
                    layer.alert('原密码不能为空!',{
                        title: '提示框',
                        icon:0,

                    });
                    return false;
                }
                if ($("#Nes_pas").val()==""){
                    layer.alert('新密码不能为空!',{
                        title: '提示框',
                        icon:0,

                    });
                    return false;
                }

                if ($("#c_mew_pas").val()==""){
                    layer.alert('确认新密码不能为空!',{
                        title: '提示框',
                        icon:0,

                    });
                    return false;
                }
                if(!$("#c_mew_pas").val || $("#c_mew_pas").val() != $("#Nes_pas").val() )
                {
                    layer.alert('密码不一致!',{
                        title: '提示框',
                        icon:0,

                    });
                    return false;
                }
                else{
                    layer.alert('修改成功！',{
                        title: '提示框',
                        icon:1,
                    });
                    layer.close(index);
                }
            }
        });
    }
</script>
</body>
</html>
