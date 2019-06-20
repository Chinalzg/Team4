<?php /*a:2:{s:78:"D:\phpStudy\PHPTutorial\WWW\views\application\index\view\user\update_blog.html";i:1558593952;s:38:"./static/common/html/index_header.html";i:1559216585;}*/ ?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>异清轩博客</title>

    <!--表单Css-->
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/admin/css/animate.css" rel="stylesheet">
    <!--<link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">-->


    <link rel="stylesheet" type="text/css" href="/static/index/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/static/index/css/nprogress.css">
    <link rel="stylesheet" type="text/css" href="/static/index/css/style.css">
    <link rel="stylesheet" type="text/css" href="/static/index/css/font-awesome.min.css">
    <link rel="apple-touch-icon-precomposed" href="/static/index/images/icon/icon.png">
    <link rel="shortcut icon" href="/static/index/images/icon/favicon.ico">
    <script src="/static/index/js/jquery-2.1.4.min.js"></script>
    <script src="/static/index/js/nprogress.js"></script>
    <script src="/static/index/js/jquery.lazyload.min.js"></script>
    <!--[if gte IE 9]>
    <script src="/static/index/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="/static/index/js/html5shiv.min.js" type="text/javascript"></script>
    <script src="/static/index/js/respond.min.js" type="text/javascript"></script>
    <script src="/static/index/js/selectivizr-min.js" type="text/javascript"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script>window.location.href='upgrade-browser.html';</script>
    <![endif]-->

</head>

<body class="user-select gray-bg">
<!--引入页头-->
<header class="header">
    <nav class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="header-topbar hidden-xs link-border">
                <ul class="site-nav topmenu">
                    <li><a href="tags.html">标签云</a></li>
                    <li><a href="readers.html" rel="nofollow">读者墙</a></li>
                    <li><a href="/index/Link/showLink" rel="nofollow">友情链接</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" rel="nofollow">关注本站 <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu header-topbar-dropdown-menu">
                            <li>
                                <a data-toggle="modal" data-target="#WeChat" rel="nofollow"><i class="fa fa-weixin"></i> 微信</a>
                            </li>
                            <li>
                                <a href="#" rel="nofollow"><i class="fa fa-weibo"></i> 微博</a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#areDeveloping" rel="nofollow"><i class="fa fa-rss"></i> RSS</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!--用户登录信息-->
                <?php if(isset($thisUser['user_name']) && !empty($thisUser['user_name'])){?>
                <a href="/index/Login/loginOut" data-toggle="" data-target="" class="" rel="nofollow">
                    Hii,<?php echo $thisUser['user_name'];?>
                </a>,<a href="/index/User/userBlogs?user_id=<?php echo htmlentities($thisUser['user_id']); ?>">我的博客</a>
                <?php }elseif(isset($thisUser['user_phone']) && !empty($thisUser['user_phone'])){?>
                <a href="/index/Login/loginOut" data-toggle="" data-target="" class="" rel="nofollow">
                    Hii,<?php echo $thisUser['user_phone'];?>
                </a>,<a href="/index/User/userBlogs?user_id=<?php echo htmlentities($thisUser['user_id']); ?>">我的博客</a>
                <?php }else{?>
                <a data-toggle="modal" data-target="#loginModal" class="login" rel="nofollow">
                    Hi,请登录
                </a>
                <?php }?>
                &nbsp;&nbsp
                <a href="/index/Account/doAccount" class="register" rel="nofollow">我要注册</a>&nbsp;
                <a href="/index/Account/findPwd" rel="nofollow">找回密码</a>
                <!---->
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <h1 class="logo hvr-bounce-in"><a href="/index/Index/index" title=""><img src="/static/index/images/logo.png" alt=""></a></h1>
            </div>
            <div class="collapse navbar-collapse" id="header-navbar">
                <!--<ul class="nav navbar-nav navbar-right">-->
                    <!--<li class="hidden-index active"><a data-cont="异清轩首页" href="/index/Index/index">异清轩首页</a></li>-->
                    <!--<li><a href="category.html">前端技术</a></li>-->
                    <!--<li><a href="category.html">后端程序</a></li>-->
                    <!--<li><a href="category.html">管理系统</a></li>-->
                    <!--<li><a href="category.html">授人以渔</a></li>-->
                    <!--<li><a href="category.html">程序人生</a></li>-->
                <!--</ul>-->
                <form class="navbar-form visible-xs" action="/Search" method="post">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off">
                        <span class="input-group-btn">
            <button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
            </span> </div>
                </form>
            </div>
        </div>
    </nav>
</header>
<!--表单容器-->
<section class="container">

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <!--<div class="ibox-title">-->
                        <!--<h5>横向表单</h5>-->
                        <!--<div class="ibox-tools">-->
                            <!--<a class="collapse-link">-->
                                <!--<i class="fa fa-chevron-up"></i>-->
                            <!--</a>-->
                            <!--<a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">-->
                                <!--<i class="fa fa-wrench"></i>-->
                            <!--</a>-->
                            <!--<ul class="dropdown-menu dropdown-user">-->
                                <!--<li><a href="form_basic.html#">选项1</a>-->
                                <!--</li>-->
                                <!--<li><a href="form_basic.html#">选项2</a>-->
                                <!--</li>-->
                            <!--</ul>-->
                            <!--<a class="close-link">-->
                                <!--<i class="fa fa-times"></i>-->
                            <!--</a>-->
                        <!--</div>-->
                    <!--</div>-->
                    <div class="ibox-content">
                        <form class="form-horizontal" action="/index/User/updateBlog" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-1 control-label">博文标题：</label>
                                <div class="col-sm-8">
                                    <input type="text" placeholder="标题" class="form-control" name="article_title" value="<?php echo htmlentities($thisBlog['article_title']); ?>">
                                    <span class="help-block m-b-none">博文主标题</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">博文分类： </label>
                                <div class="col-sm-8">
                                    <select name="article_cateid" class="form-control" style="width: 130px;">
                                        <?php foreach($cateData as $k => $v): ?>
                                        <option value="<?php echo htmlentities($v['cate_id']); ?>" <?php if($v['cate_id']==$thisBlog['article_cateid']){echo 'selected';}?> >
                                        <?php echo htmlentities($v['cate_name']); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<label class="col-sm-3 control-label">博文分类： </label>-->
                                <div id="div1"><?php echo $thisBlog['article_content']; ?></div>
                                <textarea id="editor" hidden name="article_content"><?php echo $thisBlog['article_content']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <button class="btn btn-sm btn-info" type="submit">发 表</button>
                                </div>
                            </div>
                            <input type="hidden" name="article_id" value="<?php echo htmlentities($thisBlog['article_id']); ?>">
                            <input type="hidden" name="article_user_id" value="<?php echo htmlentities($thisBlog['article_user_id']); ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<footer class="footer">
    <div class="container">
        <p>&copy; 2016 <a href="">ylsat.com</a> &nbsp; <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">豫ICP备20151109-1</a> &nbsp; <a href="sitemap.xml" target="_blank" class="sitemap">网站地图</a></p>
    </div>
    <div id="gotop"><a class="gotop"></a></div>
</footer>
<!--微信二维码模态框-->
<div class="modal fade user-select" id="WeChat" tabindex="-1" role="dialog" aria-labelledby="WeChatModalLabel">
    <div class="modal-dialog" role="document" style="margin-top:120px;max-width:280px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="WeChatModalLabel" style="cursor:default;">微信扫一扫</h4>
            </div>
            <div class="modal-body" style="text-align:center"> <img src="/static/index/images/weixin.jpg" alt="" style="cursor:pointer"/> </div>
        </div>
    </div>
</div>
<!--该功能正在日以继夜的开发中-->
<div class="modal fade user-select" id="areDeveloping" tabindex="-1" role="dialog" aria-labelledby="areDevelopingModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="areDevelopingModalLabel" style="cursor:default;">该功能正在日以继夜的开发中…</h4>
            </div>
            <div class="modal-body"> <img src="/static/index/images/baoman/baoman_01.gif" alt="深思熟虑" />
                <p style="padding:15px 15px 15px 100px; position:absolute; top:15px; cursor:default;">很抱歉，程序猿正在日以继夜的开发此功能，本程序将会在以后的版本中持续完善！</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">朕已阅</button>
            </div>
        </div>
    </div>
</div>

<!--登录注册模态框-->
<div class="modal fade user-select" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="javascript:;" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="loginModalLabel">登录</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="loginModalUserNmae">手机号</label>
                        <input type="text" class="form-control" id="loginModalUserNmae" placeholder="请输入手机号" name="user_phone" autofocus maxlength="15" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="loginModalUserPwd">密码</label>
                        <input type="password" class="form-control" id="loginModalUserPwd" placeholder="请输入密码" maxlength="18" autocomplete="off" required name="user_pwd">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary doLogin">登录</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--右键菜单列表-->
<!--<div id="rightClickMenu">-->
<!--<ul class="list-group rightClickMenuList">-->
<!--<li class="list-group-item disabled">欢迎访问异清轩博客</li>-->
<!--<li class="list-group-item"><span>IP：</span>172.16.10.129</li>-->
<!--<li class="list-group-item"><span>地址：</span>河南省郑州市</li>-->
<!--<li class="list-group-item"><span>系统：</span>Windows10 </li>-->
<!--<li class="list-group-item"><span>浏览器：</span>Chrome47</li>-->
<!--</ul>-->
<!--</div>-->
<script src="/static/index/js/bootstrap.min.js"></script>
<script src="/static/index/js/jquery.ias.js"></script>
<script src="/static/index/js/scripts.js"></script>
<script src="/static/index/js/wangEditor.js"></script>
</body>
</html>
<script src="/static/index/js/jquery-2.1.4.min.js"></script>
<script>
    /**
     * 异步登录
     */
    $(".doLogin").on('click',function () {
        /**
         * 获取用户登录信息
         */
        var user_phone = $("input[name='user_phone']").val();
        var user_pwd = $("input[name='user_pwd']").val();

        $.post("/index/Login/doLogin",{"user_phone":user_phone,"user_pwd":user_pwd},function (jsonMsg) {
            var objMsg = $.parseJSON(jsonMsg);

            switch (objMsg.errorCode) {
                case 100:
                    //登录成功，刷新当前页面
                    location.reload();
                    break;
                case 101:
                    alert(objMsg.errorMsg);
                    break;
            }
        });
    });

    /**
     * 监听页面刷新
     * @param event
     */
    window.onbeforeunload = function(event) {
        event.returnValue = "我在这写点东西...";
    };

    /**
     * 富文本编辑器
     */
    var E = window.wangEditor;
    var editor = new E('#div1');
    var $text1 = $('#editor');
    editor.customConfig.onchange = function (html) {
        // 监控变化，同步更新到 textarea
        $text1.val(html)
    };
    editor.create();
    // 初始化 textarea 的值
    $text1.val(editor.txt.html());
</script>