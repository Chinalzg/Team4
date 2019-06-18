<?php /*a:3:{s:77:"D:\phpStudy\PHPTutorial\WWW\views\application\index\view\user\my_collect.html";i:1558597367;s:38:"./static/common/html/index_header.html";i:1559650103;s:43:"./static/common/html/right_person_info.html";i:1558663101;}*/ ?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>异清轩博客栏目页面</title>

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
      <div class="title">
        <h3>我的收藏</h3>
        <div class="more">
          <a href="/index/User/myCollect?user_id=<?php echo htmlentities($thisUser['user_id']); ?>">全部</a>
          <?php foreach($cateData as $k =>$v): ?>
          <a href="/index/User/myCollect?cate_id=<?php echo htmlentities($v['cate_id']); ?>&user_id=<?php echo htmlentities($thisUser['user_id']); ?>"><?php echo htmlentities($v['cate_name']); ?></a>
          <?php endforeach; ?>
        </div>
      </div>

      <?php foreach($collectData as $k => $v): ?>
      <article class="excerpt excerpt-1">
        <a class="focus" href="/index/Article/showArticle?article_id=<?php echo htmlentities($v['article_id']); ?>" title="">
          <img class="thumb" data-original="images/excerpt.jpg" src="/static/index/images/excerpt.jpg" alt="">
        </a>
        <header><a class="cat" href="program">后端程序<i></i></a>
          <h2><a href="article.html" title=""><?php echo htmlentities($v['article_title']); ?></a></h2>
        </header>
        <p class="meta">
          <time class="time"><i class="glyphicon glyphicon-time"></i> <?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($v['article_addtime'])? strtotime($v['article_addtime']) : $v['article_addtime'])); ?></time>
          <span class="views"><i class="glyphicon glyphicon-eye-open"></i> 共<?php echo htmlentities($v['article_looks']); ?>人围观</span> <a class="comment" href="article.html#comment"><i class="glyphicon glyphicon-comment"></i> <?php echo htmlentities($v['article_comms']); ?>个不明物体</a></p>
        <p class="note"><?php echo $v['article_content']; ?></p>
        <ul  style="margin-top: 27px;">
          <li style="float: right;width: 50px;text-align: center;">
            <a href="/index/User/deleteCollect?article_id=<?php echo htmlentities($v['article_id']); ?>&cate_id=<?php echo htmlentities($cate_id); ?>" class="note">取消收藏</a>
          </li>
        </ul>
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
  <aside class="sidebar">
    <div class="fixed">
      <!--搜索框 -->
      <!--<div class="widget widget_search">-->
        <!--<form class="navbar-form" action="/Search" method="post">-->
          <!--<div class="input-group">-->
            <!--<input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">-->
            <!--<span class="input-group-btn">-->
            <!--<button class="btn btn-default btn-search" name="search" type="submit">搜索</button>-->
            <!--</span> </div>-->
        <!--</form>-->
      <!--</div>-->

      <!--引入用户个人信息 右侧边栏-->
      <div class="widget widget_sentence">
    <h3>导航</h3>
    <div class="widget-sentence-content">
        <div class="head" style="background-color: antiquewhite;width: 100px;height: 100px;float: right;border-radius: 50%;position: absolute;left: 246px;top: 54px;">
            <?php if(!empty($thisUser['user_headimg'])): ?>
            <img src="/static/index/Uploads/headImg/<?php echo htmlentities($thisUser['user_headimg']); ?>" style="width: 100px;height: 100px;border-radius: 50%;">
            <?php else: ?>
            <img src="/static/index/Uploads/headImg/head.png" style="width: 100px;height: 100px;border-radius: 50%;">
            <?php endif; ?>
        </div>
        <h4><?php echo htmlentities(date('Y-m-d',!is_numeric($time)? strtotime($time) : $time)); ?></h4>
        <h5>导航</h5>
        <p><a href="">首页</a></p>
        <p><a href="/index/User/writeBlog?user_id=<?php echo htmlentities($thisUser['user_id']); ?>">撰写新博客</a></p>
        <hr>
        <h5>统计</h5>
        <p><a href="/index/User/UserBlogs?user_id=<?php echo htmlentities($thisUser['user_id']); ?>">文章：<span><?php echo htmlentities($countData['articleNums']); ?></span>篇</a></p>
        <p><a href="/index/User/commMe?user_id=<?php echo htmlentities($thisUser['user_id']); ?>">评论：<span><?php echo htmlentities($countData['commsNums']); ?></span>条</a></p>
        <hr>
        <h5>个人中心<span hidden>公告</span></h5>
        <p><a href="">昵称：<?php echo htmlentities($thisUser['user_name']); ?></a></p>
        <p><a href="">园龄：<span><?php echo htmlentities($blogYear); ?></span></a></p>
        <p><a href="/index/User/myFans?user_id=<?php echo htmlentities($thisUser['user_id']); ?>">粉丝：<span><?php echo htmlentities($bulletinData['fansNums']); ?></span>个</a></p>
        <p><a href="/index/User/myAtten?user_id=<?php echo htmlentities($thisUser['user_id']); ?>">关注：<span><?php echo htmlentities($bulletinData['myattenNums']); ?></span>个</a></p>
        <br>
        <p><a href="/index/User/updateMyself?user_id=<?php echo htmlentities($thisUser['user_id']); ?>"><span>个人资料</span></a></p>
        <br>
        <p><a href="/index/User/myCollect?user_id=<?php echo htmlentities($thisUser['user_id']); ?>">我的收藏：<span><?php echo htmlentities($collectNums); ?>篇</span></a></p>
        <p><a href="/index/User/myComm?user_id=<?php echo htmlentities($thisUser['user_id']); ?>">我的评论：<span><?php echo htmlentities($commOtherPerson); ?>条(评其他人)</span></a></p>
    </div>
</div>
</div>
    </div>
    <!--热门文章-->
    <!--<div class="widget widget_hot">-->
      <!--<h3>热门文章</h3>-->
      <!--<ul>-->
        <!--<li><a href=""><span class="thumbnail"><img class="thumb" data-original="images/excerpt.jpg" src="/static/index/images/excerpt.jpg" alt=""></span><span class="text">php如何判断一个日期的格式是否正确</span><span class="muted"><i class="glyphicon glyphicon-time"></i> 2016-1-4 </span><span class="muted"><i class="glyphicon glyphicon-eye-open"></i> 120</span></a></li>-->
      <!--</ul>-->
    <!--</div>-->
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
  <div class="modal-dialog" role="document" style="margin-top:120px;width:280px;">
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
<!--右键菜单列表-->
<div id="rightClickMenu">
  <ul class="list-group rightClickMenuList">
    <li class="list-group-item disabled">欢迎访问异清轩博客</li>
    <li class="list-group-item"><span>IP：</span>172.16.10.129</li>
    <li class="list-group-item"><span>地址：</span>河南省郑州市</li>
    <li class="list-group-item"><span>系统：</span>Windows10 </li>
    <li class="list-group-item"><span>浏览器：</span>Chrome47</li>
  </ul>
</div>
<script src="/static/index/js/bootstrap.min.js"></script>
<script src="/static/index/js/jquery.ias.js"></script>
<script src="/static/index/js/scripts.js"></script>
</body>
</html>