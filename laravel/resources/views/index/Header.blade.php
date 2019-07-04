<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ asset('/index/css/common.css')}}" rel="stylesheet" tyle="text/css" />
    <link href="{{asset('/index/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/index/fonts/iconfont.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/index/css/Orders.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('/index/js/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/index/js/jquery.SuperSlide.2.1.1.js')}}" type="text/javascript"></script>
    <script src="{{asset('/index/js/common_js.js')}}" type="text/javascript"></script>
    <script src="{{asset('/index/js/footer.js')}}" type="text/javascript"></script>
    <script src="{{asset('/index/js/jquery.jumpto.js')}}" type="text/javascript"></script>
    {{--<script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>--}}
    <script src="https://cdn.bootcss.com/vue/2.0.3/vue.js"></script>
    <script src="//cdn.bootcss.com/vue-resource/1.0.3/vue-resource.js" type="text/javascript" charset="utf-8"></script>
    <title>用户地址管理</title>
    <style>
        .role input[type='file']{opacity:0;}
        .role{border:1px solid #c9cccf;text-align:center;width:200px;height:200px;line-height:200px;font-size:18px;margin-top:15px;float:left;margin-left:5px;}

        .role img{width: 198px;height: 198px;display: none;}
         [v-cloak] {
        display: none;
    }
    </style>
</head>

<body>
<!--顶部样式-->
<div id="header_top">
    <div id="top">
        <div class="Inside_pages">
            <div class="Collection">下午好，欢迎光临520私库商城！<em></em><a href="#">收藏我们</a></div>
            <div class="hd_top_manu clearfix">
                <ul class="clearfix">
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="login.html" class="red">[请登录]</a> 新用户<a href="registered.html" class="red">[免费注册]</a></li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">我的订单</a></li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="#">购物车(<b>0</b>)</a> </li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">联系我们</a></li>
                    <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover"><a href="#" class="hd_menu">客户服务</a>
                        <div class="hd_menu_list">
                            <ul>
                                <li><a href="#">常见问题</a></li>
                                <li><a href="#">在线退换货</a></li>
                                <li><a href="#">在线投诉</a></li>
                                <li><a href="#">配送范围</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="hd_menu_tit phone_c" data-addclass="hd_menu_hover"><a href="#" class="hd_menu "><em class="iconfont icon-phone"></em>手机版</a>
                        <div class="hd_menu_list erweima">
                            <ul>
                                <img src="images/erweima.png"  width="100px" height="100"/>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--样式-->
    <!--顶部样式2-->
    <div id="header "  class="header page_style">
        <div class="logo"><a href="#"><img src="{asset('images/logo.png')}" /></a></div>
        <!--可修改图层-->
        <div class="festival"><a href="#"><img src="images/logo_yd.png" /></a></div>
        <!--结束图层-->
        <div class="Search">
            <p><input name="" type="text"  class="text"/><input name="" type="submit" value="搜 索"  class="Search_btn"/></p>
            <p class="Words"><a href="#">苹果</a><a href="#">香蕉</a><a href="#">菠萝</a><a href="#">西红柿</a><a href="#">橙子</a><a href="#">苹果</a></p>
        </div>
        <!--可修改图层2-->
        <!--<div class="festival1"><a href="#"><img src="images/logo_sd.png" /></a></div>--><!--结束-->
        <!--购物车样式-->
        <div class="hd_Shopping_list" id="Shopping_list">
            <div class="s_cart"><em></em><a href="#">我的购物车</a> <i class="ci-right">&gt;</i><i class="ci-count" id="shopping-amount">0</i></div>
            <div class="dorpdown-layer">
                <div class="spacer"></div>
                <!--<div class="prompt"></div><div class="nogoods"><b></b>购物车中还没有商品，赶紧选购吧！</div>-->
                <ul class="p_s_list">
                    <li>
                        <div class="img"><img src="images/tianma.png"></div>
                        <div class="content"><p><a href="#">产品名称</a></p><p>颜色分类:紫花8255尺码:XL</p></div>
                        <div class="Operations">
                            <p class="Price">￥55.00</p>
                            <p><a href="#">删除</a></p></div>
                    </li>
                </ul>
                <div class="Shopping_style">
                    <div class="p-total">共<b>1</b>件商品　共计<strong>￥ 515.00</strong></div>
                    <a href="shop_cart.html" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>
                </div>
            </div>
        </div>
    </div>
    <!--菜单导航样式-->
    <div id="Menu" class="clearfix">
        <div class="Inside_pages">
            <div id="allSortOuterbox" class="display">
                <div class="t_menu_img"></div>
                <div class="Category"><a href="#"><em></em>所有产品分类</a></div>
                <div class="hd_allsort_out_box_new">
                    <!--左侧栏目开始-->
                    <ul class="Menu_list">
                        <li class="name">
                            <div class="Menu_name"><a href="#" >男装女装</a> <span>&lt;</span></div>
                            <div class="link_name">
                                <p><a href="#">茅台</a>  <a href="#">五粮液</a>  <a href="#">郎酒</a>  <a  href="#">剑南春</a></p>
                                <p><a href="#">酱香型</a>  <a href="#">四川</a>  <a href="#">贵州</a>  <a  href="#">养生酒</a></p>
                            </div>
                            <div class="menv_Detail">
                                <div class="cat_pannel clearfix">
                                    <div class="hd_sort_list">
                                        <dl class="clearfix" data-tpc="1">
                                            <dt>白酒</dt>
                                            <dd><a href="#">酱香型</a></dd>
                                            <dd><a href="#">浓香型</a></dd>
                                            <dd><a href="#">清香型</a></dd>
                                            <dd><a href="#">绵柔香型</a></dd>
                                            <dd><a href="#">老白干香型</a></dd>
                                            <dd><a href="#">凤香型</a></dd>
                                            <dd><a href="#">馥香型</a></dd>
                                            <dd><a href="#">米香型</a></dd>
                                            <dd><a href="#">青稞清香型</a></dd>
                                            <dd><a href="#">董香型</a></dd>
                                            <dd><a href="#">特香型</a></dd>
                                            <dd><a href="#">芝麻香型</a></dd>
                                        </dl>
                                        <dl class="clearfix" data-tpc="2">
                                            <dt>葡萄酒</dt>
                                            <dd><a href="#">酱香型</a></dd>
                                            <dd><a href="#">浓香型</a></dd>
                                            <dd><a href="#">清香型</a></dd>
                                            <dd><a href="#">绵柔香型</a></dd>
                                            <dd><a href="#">老白干香型</a></dd>
                                            <dd><a href="#">凤香型</a></dd>
                                            <dd><a href="#">馥香型</a></dd>
                                            <dd><a href="#">米香型</a></dd>
                                            <dd><a href="#">青稞清香型</a></dd>
                                            <dd><a href="#">董香型</a></dd>
                                            <dd><a href="#">特香型</a></dd>
                                            <dd><a href="#">芝麻香型</a></dd>
                                        </dl>
                                        <dl class="clearfix" data-tpc="3">
                                            <dt>洋酒</dt>
                                            <dd><a href="#">酱香型</a></dd>
                                            <dd><a href="#">浓香型</a></dd>
                                            <dd><a href="#">清香型</a></dd>
                                            <dd><a href="#">绵柔香型</a></dd>
                                            <dd><a href="#">老白干香型</a></dd>
                                            <dd><a href="#">凤香型</a></dd>
                                            <dd><a href="#">馥香型</a></dd>
                                            <dd><a href="#">米香型</a></dd>
                                            <dd><a href="#">青稞清香型</a></dd>
                                            <dd><a href="#">董香型</a></dd>
                                            <dd><a href="#">特香型</a></dd>
                                            <dd><a href="#">芝麻香型</a></dd>
                                        </dl>
                                        <dl class="clearfix" data-tpc="4">
                                            <dt>啤酒/养生酒</dt>
                                            <dd><a href="#">酱香型</a></dd>
                                            <dd><a href="#">浓香型</a></dd>
                                            <dd><a href="#">清香型</a></dd>
                                            <dd><a href="#">绵柔香型</a></dd>
                                            <dd><a href="#">老白干香型</a></dd>
                                            <dd><a href="#">凤香型</a></dd>
                                            <dd><a href="#">馥香型</a></dd>
                                            <dd><a href="#">米香型</a></dd>
                                            <dd><a href="#">青稞清香型</a></dd>
                                            <dd><a href="#">董香型</a></dd>
                                            <dd><a href="#">特香型</a></dd>
                                            <dd><a href="#">芝麻香型</a></dd>
                                        </dl>
                                    </div><div class="Brands">
                                        <a href="#"><img src="Products/p_logo_1.jpg" /></a>
                                        <a href="#"><img src="Products/p_logo_2.jpg" /></a>
                                        <a href="#"><img src="Products/p_logo_3.jpg" /></a>
                                        <a href="#"><img src="Products/p_logo_4.jpg" /></a>
                                        <a href="#"><img src="Products/p_logo_5.jpg" /></a>
                                    </div>
                                </div>
                                <!--品牌-->
                            </div>
                        </li>
                        <li class="name">
                            <div class="Menu_name"><a href="#" >个人护理</a><span>&lt;</span></div>
                            <div class="link_name">
                                <a href="#">饼干蛋糕</a><a href="#">糖果</a><a href="#">巧克力</a><a href="#">坚果</a>
                                <a href="#">饼干蛋糕</a><a href="#">糖果</a><a href="#">巧克力</a><a href="#">坚果</a>
                            </div>
                            <div class="menv_Detail">
                                <div class="cat_pannel clearfix">
                                </div>
                            </div>
                        </li>
                        <li class="name">
                            <div class="Menu_name"><a href="#" >鞋子箱包</a><span>&lt;</span></div>
                            <div class="link_name">
                                <a href="#">休闲零食</a><a href="#">坚果炒货</a><a href="#">饼干蛋糕</a>
                                <a href="#">饼干蛋糕</a><a href="#">糖果</a><a href="#">巧克力</a><a href="#">坚果</a>
                            </div>
                            <div class="menv_Detail">
                                <div class="cat_pannel clearfix">
                                </div>
                            </div>
                        </li>
                        <li class="name">
                            <div class="Menu_name"><a href="#" >食品保健</a><span>&lt;</span></div>
                            <div class="link_name">
                                <a href="#">休闲零食</a><a href="#">坚果炒货</a><a href="#">饼干蛋糕</a>
                                <a href="#">饼干蛋糕</a><a href="#">糖果</a><a href="#">巧克力</a><a href="#">坚果</a>
                            </div>
                            <div class="menv_Detail">
                                <div class="cat_pannel clearfix">
                                </div>
                            </div>
                        </li>
                        <li class="name">
                            <div class="Menu_name"><a href="#" >综合百货</a><span>&lt;</span></div>
                            <div class="link_name">
                                <a href="#">休闲零食</a><a href="#">坚果炒货</a><a href="#">饼干蛋糕</a>
                                <a href="#">饼干蛋糕</a><a href="#">糖果</a><a href="#">巧克力</a><a href="#">坚果</a>
                            </div>
                            <div class="menv_Detail">
                                <div class="cat_pannel clearfix">
                                </div>
                            </div>
                        </li>
                        <li class="name customize">
                            <div class="Menu_name"><a href="#" >私人定制</a><span>&lt;</span></div>
                        </li>
                    </ul>
                </div>
            </div>
            {{--<script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail",	});</script>--}}
            <!--菜单栏-->
            <div class="Navigation" id="Navigation">
                <ul class="Navigation_name">
                    <li><a href="#">美食</a></li>
                    <li><a href="#">美妆</a></li>
                    <li><a href="#">服饰</a></li>
                    <li><a href="#">产品预订</a></li>
                    <li><a href="#">积分商城</a></li>
                    <li><a href="#">礼品DIY</a></li>
                    <li><a href="#">区域合作</a></li>
                    <li><a href="#">联系我们</a></li>
                    <li><a href="shop_cart.html">购物车</a></li>
                </ul>
            </div>
            {{--<script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>--}}
        </div>
    </div>
</div>
</div>
<div class="user_style clearfix" id="user">

    <!--用户中心布局样式-->
    <div class="left_style">
        <!--栏目名称-->
        <div class="title_username">个人中心</div>

        <div class="user_Head">
            <div class="user_time">
                <h4 id="y" class="years"></h4>
                <h1></h1>
                <h4 id="D"></h4>
            </div>
            <div class="user_portrait">
                <a href="#" title="修改头像"></a> <img src="images/people.png" />
                <div class="background_img"></div></div>

        </div>
        <ul class="Section">
            <li><a href="#" class="on"><em></em><span>我的特色馆</span></a></li>
            <li><a href="personal?user_id=1"><em></em><span>个人信息</span></a></li>
            <li><a href="myMoney?user_id=1"><em></em><span>我的钱包</span></a></li>
            <li><a href="order?user_id=1"><em></em><span>订单管理</span></a></li>
            <li><a href="recommend?user_id=1"><em></em><span>我的推荐</span></a></li>
            <li><a href="information?user_id=1"><em></em><span>我的消息</span></a></li>
            <li><a href="collect?user_id=1"><em></em><span>我的收藏</span></a></li>
            <li><a href="addressshow?user_id=1"><em></em><span>收货地址管理</span></a></li>
        </ul>
    </div>