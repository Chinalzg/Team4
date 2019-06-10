<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" id="token" content="{{csrf_token()}}">
    <title>电子商城后台</title>
    <link rel="stylesheet" href="{{ URL::asset('static/css/pintuer.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('static/css/admin.css') }}">
    <script src="{{ URL::asset('static/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('static/js/pintuer.js') }}"></script>
    {{-- Laravel Mix - CSS File --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/admin.css') }}"> --}}
</head>
<body>
<div class="bg"></div>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <div style="height:150px;"></div>
            <div class="media media-y margin-big-bottom">
            </div>
            <form>
                <div class="panel loginbox">
                    <div class="text-center margin-big padding-big-top"><h1>后台管理中心</h1></div>
                    <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                        <div class="form-group">
                            <div class="field field-icon-right">
                                <input type="text" class="input input-big" id="uname" name="admin_name" placeholder="登录账号" data-validate="required:请填写账号" />
                                <span class="icon icon-user margin-small"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="field field-icon-right">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="password" class="input input-big" id="pwd" name="pwd" placeholder="登录密码" data-validate="required:请填写密码" />
                                <span class="icon icon-key margin-small"></span>
                            </div>
                        </div>
                    </div>

                    <div style="padding:30px;"><input type="button" id="btn" class="button button-block bg-main text-big input-big" value="登录"></div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(document).on('click','#btn',function () {
        var name=$('#uname').val();
        var pwd=$('#pwd').val();
        $.ajax({
            type:"post",
            url:"{{'select'}}",
            data:{
                name:name,
                pwd:pwd,

            },
            dataType: "json",
            success:function (e) {
                console.log(e);
            }
        })
    })
</script>
