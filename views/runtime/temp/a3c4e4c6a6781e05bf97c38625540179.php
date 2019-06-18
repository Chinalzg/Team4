<?php /*a:3:{s:82:"D:\phpStudy\PHPTutorial\WWW\views\application\index\view\article\show_article.html";i:1559649075;s:38:"./static/common/html/index_header.html";i:1559650103;s:35:"./static/common/html/right_box.html";i:1559216684;}*/ ?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo htmlentities($article['user_name']); ?>的博客</title>
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

<body class="user-select single">

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
      <header class="article-header">
        <h1 class="article-title"><a href="article.html"><?php echo htmlentities($article['article_title']); ?></a></h1>
        <div class="article-meta"> <span class="item article-meta-time">
          <time class="time" data-toggle="tooltip" data-placement="bottom" title="时间：2016-1-4 10:29:39"><i class="glyphicon glyphicon-time"></i> <?php echo htmlentities(date("Y-m-d",!is_numeric($article['article_addtime'])? strtotime($article['article_addtime']) : $article['article_addtime'])); ?></time>
          </span> <span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom" title="来源：第一PHP社区"><i class="glyphicon glyphicon-user"></i> <?php echo htmlentities($article['user_name']); ?></span> <span class="item article-meta-category" data-toggle="tooltip" data-placement="bottom" title="栏目：后端程序"><i class="glyphicon glyphicon-list"></i> <a href="program" title=""><?php echo htmlentities($article['cate_name']); ?></a></span> <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="查看：120"><i class="glyphicon glyphicon-eye-open"></i> 共<?php echo htmlentities($article['article_looks']); ?>人围观</span> <span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="评论：0"><i class="glyphicon glyphicon-comment"></i> <?php echo htmlentities($article['article_comms']); ?>个不明物体</span>

          <?php if((empty($attenInfo))): ?>
            <span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="评论：0">
              <i class="glyphicon fa fa-square-o" data-user_id="<?php echo htmlentities($article['article_user_id']); ?>">
              <span>加关注</span>
              </i>
            </span>
          <?php endif; ?>

          <!--<span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="评论：0">-->
            <!--<i class="glyphicon fa fa-heart" data-article_user_id="" data-article_id="">-->
              <!--<span>加收藏</span>-->
            <!--</i>-->
          <!--</span>-->

        </div>
      </header>
      <article class="article-content">
        <p> <?php echo $article['article_content']; ?> </p>
        <p class="article-copyright hidden-xs">
          未经允许不得转载：
          <a href="">异清轩博客</a> »
          <a href="article.html">php如何判断一个日期的格式是否正确</a>
        </p> 

  
        <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
        
        </div>
      <a href="javascript:void(0)" class="clicSupport" article-id="<?php echo htmlentities($article['article_title']); ?>" user-id="<?php echo htmlentities($thisUser['user_id']); ?>" supports="<?php echo htmlentities($supports); ?>">点赞：<?php echo htmlentities($supports); ?></a>

      <script>
          $(document).on('click','.clicSupport',function(){
               var article_id = $(this).attr('article-id');

              var user_id = $(this).attr('user-id');

              var supports = $(this).attr('supports');
              
              $.ajax({

                  type:'get',

                  url :'<?php echo url("user/support"); ?>',

                  data:{article_id,article_id,supports:supports,user_id:user_id},

                  dataType:'json',

                  success:function(e){
                    
                      if(e.code==1){

                          $(".clicSupport").text('点赞：'+e.data);

                          return true;

                      }else if(e.code==3){

                        alert('您已经点过赞了');
                        return false;
                      }else if(e.code==5){
                         alert('请先登录');

                          location.href = 'http://www.myblog.com/index/user/login.html';

                          return false;
                      }else{

                          alert('点赞失败');
                          return false;
                      }

                      

                      
                  }


              })

          })


      </script>



      </article>
      <div class="article-tags">标签：<a href="" rel="tag"><?php echo htmlentities($article['cate_name']); ?></a></div>
      <div class="relates">
        <div class="title">
          <h3>相关推荐</h3>
        </div>
        <ul>
          <?php foreach($recData as $k => $v): ?>
            <li><a href="/index/Article/showArticle?article_id=<?php echo htmlentities($v['article_id']); ?>"><?php echo htmlentities($v['article_title']); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="title" id="comment">
        <h3>评论 <small>抢沙发</small></h3>
      </div>
      <?php if(empty($thisUser)): ?>
        <div id="respond">
          <div class="comment-signarea">
            <h3 class="text-muted">评论前必须登录！</h3>
            <p> <a href="javascript:;" class="btn btn-primary login" rel="nofollow">立即登录</a> &nbsp; <a href="javascript:;" class="btn btn-default register" rel="nofollow">注册</a> </p>
            <h3 class="text-muted">当前文章禁止评论</h3>
          </div>
        </div>
      <?php else: ?>
        <div id="respond">
          <form action="/index/Comm/publishComm?article_id=<?php echo htmlentities($article['article_id']); ?>" method="post" id="comment-form">
            <div class="comment">
              <div class="comment-title">
                <?php if($thisUser['user_headimg'] == ''): ?>
                <img class="avatar" src="/static/index/Uploads/headImg/head.png" alt="" />
                <?php else: ?>
                <img class="avatar" src="/static/index/Uploads/headImg/<?php echo htmlentities($thisUser['user_headimg']); ?>" alt="" />
                <?php endif; ?>
              </div>
              <div class="comment-box">
                <textarea placeholder="您的评论可以一针见血" name="comm_content" id="comment-textarea" cols="100%" rows="3" tabindex="1" ></textarea>
                <div class="comment-ctrl"> <span class="emotion"><img src="/static/index/images/face/5.png" width="20" height="20" alt="" />表情</span>
                  <div class="comment-prompt"> <i class="fa fa-spin fa-circle-o-notch"></i> <span class="comment-prompt-text"></span> </div>
                  <input type="hidden" value="1" class="articleid" />
                  <button type="submit" id="comment-submit" tabindex="5" articleid="1">评论</button>
                  <input type="hidden" name="comm_article_id" value="<?php echo htmlentities($article['article_id']); ?>">
                </div>
              </div>
            </div>
          </form>
        </div>
      <?php endif; ?>

      <!--标记位置-->
      <div id="postcomments">
        <ol class="commentlist">
          <?php foreach($commData as $k => $v): ?>
            <li class="comment-content">
              <p style="float: right;margin-top: 40px;color: #8B91A0;">#<?php echo htmlentities($k+1); ?></p>
              <p style="float: right;margin-top: 40px;color: #8B91A0;margin-right: 10px;font-size: 12px;">
                <a href="javascript:void(0);" class="replybutton">回复</a>
              </p>
              <div class="comment-avatar">
                <?php if(empty($v['user_headimg'])): ?>
                  <img class="avatar" src="/static/index/Uploads/headImg/head.png" alt="" />
                <?php else: ?>
                  <img class="avatar" src="/static/index/Uploads/headImg/<?php echo htmlentities($v['user_headimg']); ?>" alt="" />
                <?php endif; ?>
              </div>
              <div class="comment-main">
                <p><span class="address"><?php echo htmlentities($v['user_name']); ?></span><span class="time">(<?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($v['comm_addtime'])? strtotime($v['comm_addtime']) : $v['comm_addtime'])); ?>)</span><br />&nbsp;<?php echo $v['comm_content']; ?>
                </p>
              </div>
            </li>
          <?php endforeach; ?>
        </ol>
        
        <div class="quotes">
          <span class="disabled">首页</span>
          <span class="disabled">上一页</span>
          <a class="current">1</a>
          <a href="">2</a>
          <span class="disabled">下一页</span>
          <span class="disabled">尾页</span>
        </div>
      </div>
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
  <div class="modal-dialog" role="document" style="margin-top:120px;width:280px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="WeChatModalLabel" style="cursor:default;">微信扫一扫</h4>
      </div>
      <div class="modal-body" style="text-align:center"> <img src="images/weixin.jpg" alt="" style="cursor:pointer"/> </div>
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
      <div class="modal-body"> <img src="images/baoman/baoman_01.gif" alt="深思熟虑" />
        <p style="padding:15px 15px 15px 100px; position:absolute; top:15px; cursor:default;">很抱歉，程序猿正在日以继夜的开发此功能，本程序将会在以后的版本中持续完善！</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">朕已阅</button>
      </div>
    </div>
  </div>
</div>

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


<div id="rightClickMenu">
  <ul class="list-group rightClickMenuList">
    <li class="list-group-item disabled">欢迎访问异清轩博客</li>
    <li class="list-group-item"><span>IP：</span>172.16.10.129</li>
    <li class="list-group-item"><span>地址：</span>河南省郑州市</li>
    <li class="list-group-item"><span>系统：</span>Windows10</li>
    <li class="list-group-item"><span>浏览器：</span>Chrome47</li>
  </ul>
</div>
<script src="/static/index/js/bootstrap.min.js"></script>
<script src="/static/index/js/jquery.ias.js"></script>
<script src="/static/index/js/scripts.js"></script>
<script src="/static/index/js/jquery.qqFace.js"></script>
<script type="text/javascript">

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
     *  回复某条消息的功能
     */
    $(".replybutton").on('click',function () {

    });

    /**
     * 关注
     */
    $(".fa-square-o").on('click',function () {
        let user_id = $(this).attr("data-user_id");

        $.post("/index/User/attenUser",{"article_user_id":user_id},function (jsonMsg) {
            let objMsg = $.parseJSON(jsonMsg);
            switch (objMsg.errorCode) {
                case 100:
                    location.reload();
                    break;
                default:
                    alert(objMsg.errorMsg);
                    break;
            }
        });
    });


    $(function(){
        $('.emotion').qqFace({
            id : 'facebox',
            assign:'comment-textarea',
            path:'/static/index/images/arclist/'	//表情存放的路径
        });
     });


    /**
     * 分享链接
     */
    window._bd_share_config = { "common": { "bdSnsKey": {}, "bdText": "", "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "1", "bdSize": "32" }, "share": {} }; with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=0.js?cdnversion=' + ~(-new Date() / 36e5)];
</script>
</body>
</html>