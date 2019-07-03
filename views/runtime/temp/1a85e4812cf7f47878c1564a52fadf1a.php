<?php /*a:3:{s:73:"D:\phpStudy\PHPTutorial\WWW\views\application\index\view\index\index.html";i:1559284827;s:38:"./static/common/html/index_header.html";i:1559650103;s:35:"./static/common/html/right_box.html";i:1559216684;}*/ ?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>异清轩博客</title>
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

<body class="user-select">
<!--引入页头-->
<header class="header">
    <nav class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="header-topbar hidden-xs link-border">
                <ul class="site-nav topmenu">
                   
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
<section class="container">
  <div class="content-wrap">
    <div class="content">
      <div class="jumbotron">
        <h1>欢迎访问异清轩博客</h1>
        <p>在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！</p>
      </div>
      <div id="focusslide" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#focusslide" data-slide-to="0" class="active"></li>
          <li data-target="#focusslide" data-slide-to="1"></li>
          <li data-target="#focusslide" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item active"> <a href="<?php echo htmlentities($slide_active['ad_link']); ?>" target="_blank"><img src="/static/admin/uploads/ad/<?php echo htmlentities($slide_active['ad_img']); ?>" alt="" class="img-responsive"></a>
            <!--<div class="carousel-caption"> </div>--> 
          </div>
          <?php foreach($slide as $k => $v): ?>
              <div class="item"> <a href="<?php echo htmlentities($v['ad_link']); ?>" target="_blank"><img src="/static/admin/uploads/ad/<?php echo htmlentities($v['ad_img']); ?>" alt="" class="img-responsive"></a>
              <!--<div class="carousel-caption"> </div>-->
              </div>
          <?php endforeach; ?>

        </div>
        <a class="left carousel-control" href="#focusslide" role="button" data-slide="prev" rel="nofollow"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">上一个</span> </a> <a class="right carousel-control" href="#focusslide" role="button" data-slide="next" rel="nofollow"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">下一个</span> </a> </div>

      <article class="excerpt-minic excerpt-minic-index">
        <h2><span class="red">【今日推荐】</span><a href="" title="">从下载看我们该如何做事</a></h2>
        <p class="note">一次我下载几部电影，发现如果同时下载多部要等上几个小时，然后我把最想看的做个先后排序，去设置同时只能下载一部，结果是不到一杯茶功夫我就能看到最想看的电影。 这就像我们一段时间内想干成很多事情，是同时干还是有选择有顺序的干，结果很不一样。同时...</p>
      </article>
      <div class="title">
        <h3>最新发布</h3>
        <div class="more">
          <a href="/index/index/index">全部</a>
          <?php foreach($cateData as $k =>$v): ?>
            <a href="/index/index/index?cate_id=<?php echo htmlentities($v['cate_id']); ?>"><?php echo htmlentities($v['cate_name']); ?></a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php foreach($indexArticles as $k => $v): ?>
        <article class="excerpt excerpt-1"><a class="focus" href="/index/Article/showArticle?article_id=<?php echo htmlentities($v['article_id']); ?>" title=""><img class="thumb" data-original="images/excerpt.jpg" src="/static/index/images/excerpt.jpg" alt=""></a>
          <header><a class="cat" href="program">后端程序<i></i></a>
            <h2><a href="article.html" title=""><?php echo htmlentities($v['article_title']); ?></a></h2>
          </header>
          <p class="meta">
            <time class="time">
              <i class="glyphicon glyphicon-time"></i> <?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($v['article_addtime'])? strtotime($v['article_addtime']) : $v['article_addtime'])); ?>
            </time>
            <span class="views">
              <i class="glyphicon glyphicon-eye-open"></i> 共<?php echo htmlentities($v['article_looks']); ?>人围观
            </span>
            <a class="comment" href="article.html#comment">
              <i class="glyphicon glyphicon-comment"></i> <?php echo htmlentities($v['article_comms']); ?>个不明物体
            </a>
            <span class="views atten">
              <?php if(in_array($v['article_user_id'],$attenData)): ?>
              <i class="glyphicon fa fa-check-square-o" style="color: coral;" data-user_id="<?php echo htmlentities($v['article_user_id']); ?>">  <span>已关注</span></i>
              <?php else: ?>
              <i class="glyphicon fa fa-square-o" data-user_id="<?php echo htmlentities($v['article_user_id']); ?>"> <span>加关注</span></i>
              <?php endif; ?>
            </span>

            <span class="views collect">
              <?php if(in_array($v['article_id'],$collectData)): ?>
              <i class="glyphicon fa fa-heart-o" style="color: coral;" data-article_user_id="<?php echo htmlentities($v['article_user_id']); ?>" data-article_id="<?php echo htmlentities($v['article_id']); ?>"> <span>已收藏</span></i>
              <?php else: ?>
              <i class="glyphicon fa fa-heart" data-article_user_id="<?php echo htmlentities($v['article_user_id']); ?>" data-article_id="<?php echo htmlentities($v['article_id']); ?>"> <span>加收藏</span></i>
              <?php endif; ?>
            </span>

          </p>
          <p class="note"><?php echo substr($v['article_content'],0,150);?></p>
        </article>
      <?php endforeach; ?>

      <nav class="pagination" style="display: none;">
        <ul>
          <li class="prev-page"></li>
          <li class="active"><span>1</span></li>
          <li><a href="?page=2">2</a></li>
          <li class="next-page"><a href="?page=2">下一页</a></li>
          <li><span>共 2 页</span></li>
        </ul>
      </nav>
    </div>
  </div>
  <!--右侧边栏-->
  <aside class="sidebar">
    <!--<div class="fixed">-->
        <!--<div class="widget widget-tabs">-->
            <!--<ul class="nav nav-tabs" role="tablist">-->
                <!--<li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab">网站公告</a></li>-->
                <!--<li role="presentation"><a href="#centre" aria-controls="centre" role="tab" data-toggle="tab">会员中心</a></li>-->
                <!--<li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">联系站长</a></li>-->
            <!--</ul>-->
            <!--<div class="tab-content">-->
                <!--<div role="tabpanel" class="tab-pane notice active" id="notice">-->
                    <!--<ul>-->
                        <!--<li>-->
                            <!--<time datetime="2016-01-04">01-04</time>-->
                            <!--<a href="" target="_blank">欢迎访问异清轩博客</a></li>-->
                        <!--<li>-->
                            <!--<time datetime="2016-01-04">01-04</time>-->
                            <!--<a target="_blank" href="">在这里可以看到前端技术，后端程序，网站内容管理系统等文章，还有我的程序人生！</a></li>-->
                        <!--<li>-->
                            <!--<time datetime="2016-01-04">01-04</time>-->
                            <!--<a target="_blank" href="">在这个小工具中最多可以调用五条</a></li>-->
                    <!--</ul>-->
                <!--</div>-->
                <!--<div role="tabpanel" class="tab-pane centre" id="centre">-->
                    <!--<h4>需要登录才能进入会员中心</h4>-->
                    <!--<p> <a data-toggle="modal" data-target="#loginModal" class="btn btn-primary">立即登录</a> <a href="javascript:;" class="btn btn-default">现在注册</a> </p>-->
                <!--</div>-->
                <!--<div role="tabpanel" class="tab-pane contact" id="contact">-->
                    <!--<h2>Email:<br />-->
                        <!--<a href="mailto:admin@ylsat.com" data-toggle="tooltip" data-placement="bottom" title="admin@ylsat.com">admin@ylsat.com</a></h2>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
        <!--<div class="widget widget_search">-->
            <!--<form class="navbar-form" action="/Search" method="post">-->
                <!--<div class="input-group">-->
                    <!--<input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">-->
                    <!--<span class="input-group-btn">-->
            <!--<button class="btn btn-default btn-search" name="search" type="submit">搜索</button>-->
            <!--</span> </div>-->
            <!--</form>-->
        <!--</div>-->
    <!--</div>-->
    <div class="widget widget_sentence">
        <h3>每日一句</h3>
        <div class="widget-sentence-content">
            <h4>2016年01月05日星期二</h4>
            <p>Do not let what you cannot do interfere with what you can do.<br />
                别让你不能做的事妨碍到你能做的事。（John Wooden）</p>
        </div>
    </div>
    <div class="widget widget_hot">
        <h3>热门文章</h3>
        <ul>
            <?php foreach($hotData as $k => $v): ?>
                <li>
                    <a href="/index/Article/showArticle?article_id=<?php echo htmlentities($v['article_id']); ?>">
                <span class="thumbnail">
                  <img class="thumb" data-original="images/excerpt.jpg" src="/static/index/images/excerpt.jpg" alt="">
                </span>
                        <span class="text"><?php echo htmlentities($v['article_title']); ?></span>
                        <span class="muted"><i class="glyphicon glyphicon-time"></i> <?php echo htmlentities(date("Y-m-d",!is_numeric($v['article_addtime'])? strtotime($v['article_addtime']) : $v['article_addtime'])); ?> </span>
                        <span class="muted"><i class="glyphicon glyphicon-eye-open"></i> <?php echo htmlentities($v['article_looks']); ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>
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
        <!--人机-->
        <div id="vaptchaContainer" style="width: 358px;height: 36px;margin-left: 30px;">
          <div class="vaptcha-init-main">
            <div class="vaptcha-init-loading">
              <a href="https://www.vaptcha.com" target="_blank">
                <img src="https://cdn.vaptcha.com/vaptcha-loading.gif" />
              </a>
              <span class="vaptcha-text">Vaptcha启动中...</span>
            </div>
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
</body>
</html>
<script src="/static/index/js/jquery-2.1.4.min.js"></script>
<script src="https://cdn.vaptcha.com/v2.js"></script>
<script>
    /**
     * 异步登录
     */
    $(".doLogin").on('click',function () {
        //检测人机验证
        if(!vaptMsg){
            alert("请进行人机验证");return false;
        }
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
     * 取消关注功能
     */
    $(".atten").on('click',".fa-check-square-o",function () {
        var article_user_id = $(this).attr('data-user_id');
        var _this = $(this);

        $.post("/index/User/unattenUser",{"article_user_id":article_user_id},function (jsonMsg) {
            let objMsg = $.parseJSON(jsonMsg);

            switch (objMsg.errorCode) {
                case 100:
                    _this.removeClass("fa-check-square-o");
                    _this.addClass("fa-square-o");
                    _this.css("color","");
                    _this.children().text("加关注");
                    break;
                default:
                    alert(objMsg.errorMsg);
                    break;
            }
        });
    });

    /**
     * 关注功能
     */
    $(".atten").on('click',".fa-square-o",function () {
        var _this = $(this);
        var article_user_id = $(this).attr('data-user_id');

        $.post("/index/User/attenUser",{"article_user_id":article_user_id},function (jsonMsg) {
            let objMsg = $.parseJSON(jsonMsg);
            switch (objMsg.errorCode) {
                case 100:
                    _this.removeClass("fa-square-o");
                    _this.addClass("fa-check-square-o");
                    _this.css("color","coral");
                    _this.children().text("已关注");
                    break;
                default:
                    alert(objMsg.errorMsg);
                    break;
            }
        });
    });


    /**
     * 取消收藏
     */
    $(".collect").on('click',".fa-heart-o",function () {
        let _this = $(this);
        let article_id = $(this).attr('data-article_id');
        let article_user_id = $(this).attr('data-article_user_id');

        $.post("/index/User/uncollectBlog",{"article_id":article_id,"article_user_id":article_user_id},function (jsonMsg) {
            let objMsg = $.parseJSON(jsonMsg);
            switch (objMsg.errorCode) {
                case 100:
                    _this.removeClass("fa-heart-o");
                    _this.addClass("fa-heart");
                    _this.css('color','');
                    _this.children().text('加收藏');
                    break;
                default:
                    alert(objMsg.errorMsg);
                    break;
            }
        });
    });


    /**
     * 加入收藏
     */
    $(".collect").on('click',".fa-heart",function () {
        let _this = $(this);
        let article_id = $(this).attr('data-article_id');
        let article_user_id = $(this).attr('data-article_user_id');

        $.post("/index/User/collectBlog",{"article_id":article_id,"article_user_id":article_user_id},function (jsonMsg) {
            let objMsg = $.parseJSON(jsonMsg);
            switch (objMsg.errorCode) {
                case 100:
                    _this.removeClass("fa-heart");
                    _this.addClass("fa-heart-o");
                    _this.css('color','coral');
                    _this.children().text('已收藏');
                    break;
                default:
                    alert(objMsg.errorMsg);
                    break;
            }
        });
    });

    /**
     * 人机验证
     */
    var vaptMsg;
    vaptcha({
        //配置参数
        vid: '5cf0c92dfc650e0d4c96150b', // 验证单元id
        type: 'click', // 展现类型 点击式
        container: '#vaptchaContainer' // 按钮容器，可为Element 或者 selector
    }).then(function (vaptchaObj) {

        vaptchaObj.listen('pass', function() {
            vaptMsg = true;
        });

        vaptchaObj.render()// 调用验证实例 vaptchaObj 的 render 方法加载验证按钮
    });
</script>