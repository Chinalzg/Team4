<?php /*a:1:{s:77:"D:\phpStudy\PHPTutorial\WWW\views\application\index\view\account\account.html";i:1558271889;}*/ ?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>成为我们的用户</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="/static/index/css/style-account.css">

    <style>
        .codeButton{
            display:inline-block;
            width: 128px;
            height:48px;
            line-height:48px;

            text-align: center;
            color: #5D92BA;;
            background-color: whitesmoke;

            cursor: pointer;
        }
    </style>

  
</head>

<body>

  <div class="container">
  <div class="login">
  	<h1 class="login-heading">
      <strong>IT博客之家.</strong> 程序猿的归宿.
    </h1>
      <form class="form" action="javascript:;">
            <input type="text" name="user_phone" placeholder="请输入手机号..." required="required" class="input-txt" />
            <input type="password" name="user_pwd" placeholder="请输入密码..." required="required" class="input-txt" />
            <input type="password" name="user_pwd_check" placeholder="请确认密码..." required="required" class="input-txt" />
            <input type="email" name="user_email" placeholder="请输入邮箱..." required="required" class="input-txt" />
            <input type="text" name="user_name" placeholder="请输入昵称..." required="required" class="input-txt" />

              <input type="text" required="required" class="input-txt" placeholder="请输入验证码..." style="width: 312px;" name="user_testCode">
              <div class="codeButton">获取验证码</div>

            <div class="login-footer">
             <a href="#" class="lnk">
              <span class="icon icon--min">ಠ╭╮ಠ</span> 
              I've forgotten something
            </a>
            <button type="submit" class="btn btn--right">注册</button>
          </div>
      </form>
  </div>
</div>

  <script  src="/static/index/js/index.js"></script>
</body>
</html>

<script src="/static/index/js/jquery-2.1.4.min.js"></script>
<script>
    /**
     * 提交注册信息
     * */
    $("button[type='submit']").on('click',function () {
        //验证密码正确性
        var user_pwd = $("input[name='user_pwd']").val();
        var user_pwd_check = $("input[name='user_pwd_check']").val();

        if(user_pwd != user_pwd_check){
            alert("两次密码不一致，请重试.");
            return false;
        }


        // 获取表单内容
        var formVal = $("form[class='form']").serializeArray();

        $.post("/index/Account/doAccount",formVal,function (jsonMsg) {
            var objMsg = $.parseJSON(jsonMsg);

            switch (objMsg.errorCode) {
                case 101:
                    alert(objMsg.errorMsg);
                    break;
                case 102:
                    alert(objMsg.errorMsg);
                    break;
                case 103:
                    alert(objMsg.errorMsg);
                    break;
                case 104:
                    alert(objMsg.errorMsg);
                    break;
                case 105:
                    alert(objMsg.errorMsg);
                    break;
                case 100:
                    location.href="/index/Index/index";
                    break;
            }
        });
        // 禁止提交表单
        // return false;
    });


    /**
     * 发送手机短信验证码
     * */
    $(".codeButton").on('click',function () {
        var buttonText = $(this).text();
        if(buttonText != '获取验证码'){
            alert('请稍后');
            return false;
        }

        /**
         * 检查管理员是否输入手机号
         */
        var user_phone = $("input[name='user_phone']").val();
        if(user_phone == ""){
            alert("请您先输入手机号");return false;
        }

        /**
         * 定义正则
         */
        var phoneREG = /^1[345678]\d{9}$/;

        if(!phoneREG.test(user_phone)){
            alert('手机号码格式有误');return false;
        }
        /**
         * 发送验证码
         */
        sendNote(user_phone);
    });

    /**
     * Ajax请求后台 请求验证码
     * */
    function sendNote(user_phone = '') {
        $.post("/index/Account/sendNote",{"user_phone":user_phone},function (msg) {
            if(msg == 'faliure'){
                alert("验证码发送失败，请重试");
            }else{
                /**
                 * 定时器功能
                 */
                SetInterval();
            }
        });
    }

    /**
     * 获取验证码倒计时不可点击功能
     * @constructor
     */
    function SetInterval() {
        var times = 120;
        var setInter = setInterval(function () {
            if(times == 0){
                $(".codeButton").removeAttr('disabled');
                $(".codeButton").text('获取验证码');
                clearInterval(setInter);
            }else{
                $(".codeButton").attr('disabled',true);
                $(".codeButton").text(times+'s');
                times--;
            }
        },1000);
    }
</script>