<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{ URL::asset('index/css/common.css') }}" rel="stylesheet" tyle="text/css" />
<link href="{{ URL::asset('index/css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('index/fonts/iconfont.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ URL::asset('index/js/jquery.min.1.8.2.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('index/js/jqzoom.js') }}" type="text/javascript"></script>

<script src="{{ URL::asset('index/js/jquery.SuperSlide.2.1.1.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('index/js/common_js.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('index/js/footer.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('index/js/jquery.jumpto.js') }}" type="text/javascript"></script>

<title>商品详情页</title>
<script src="{{ URL::asset('js/vue.js') }}"></script>
<script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>
<script src="https://cdn.staticfile.org/vue-resource/1.5.1/vue-resource.min.js"></script>
</head>

<body>
<!--顶部样式-->

<div id="header_top">
  <div id="top">
    <div class="Inside_pages">
      <div class="Collection">下午好，欢迎光临520私库商城！<em></em><a href="#">收藏我们</a></div>
	<div class="hd_top_manu clearfix">
	  <ul class="clearfix">
	   <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！
       @if(Session::get('user_name'))
       <a href="#" class="red">欢迎<?php echo Session::get('user_name');?>登录</a> <a href="loginout" class="red">[退出登录]</a>
       @else
       <a href="login" class="red">[请登录]</a> 新用户<a href="register" class="red">[免费注册]</a>
       </li>
       @endif
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
  <div class="logo"><a href="#"><img src="images/logo.png" /></a></div>
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
	  <a href="#" title="去购物车结算" id="btn-payforgoods" class="Shopping">去购物车结算</a>
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
     <div class="app">
     <li class="name" v-for="site in res">
		<div class="Menu_name" v-if="site.level==0"><a href="product_list.html" >@{{site.name}}</a> <span>&lt;</span></div>
		<div class="link_name" v-else-if="site.level!=0">
		  <a href="Product_Detailed.html">@{{site.name}}</a>
		</div>	 
		</li>
    </div>	

	</ul>	
	</div>		
	</div>
	<script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail",	});</script>
	<!--菜单栏-->
	<div class="Navigation" id="Navigation">
		 <ul class="Navigation_name">
         @foreach ($list as $v)
			<li><a href="#">{{$v->name}}</a></li>
        @endforeach
		 </ul>			 
		</div>
	<script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>		
  </div>
</div>
</div>
</div>
<!--产品详细页-->
<div class="clearfix  Inside_pages">
 <!--位置-->
 <div id="goodsInfo">
 <div class="Location_link">
  <em></em><a href="#">国外进口</a>  &lt;      <a href="#">商品名称</a>
 </div>
 <!--产品详细介绍-->
 <div class="Details_style clearfix" >
  <div class="mod_picfold clearfix">
    <div class="clearfix" id="detail_main_img">
	 <div class="layout_wrap preview">
     @foreach ($data as $v)
     <div id="vertical" class="bigImg">
		<img src="{{$v->image}}" width="" height="" alt="" id="midimg" />
		<div style="display:none;" id="winSelector"></div>
	</div>
     <div class="smallImg">
		<div class="scrollbutton smallImgUp disabled">&lt;</div>
		<div id="imageMenu">
			<ul>
				<li><img src="small/01.jpg" width="68" height="68" alt="洋妞"/></li>
				<li><img src="small/02.jpg" width="68" height="68" alt="洋妞"/></li>
				<li><img src="small/03.jpg" width="68" height="68" alt="洋妞"/></li>
				<li><img src="small/04.jpg" width="68" height="68" alt="洋妞"/></li>
				<li><img src="small/05.jpg" width="68" height="68" alt="洋妞"/></li>
				<li><img src="small/06.jpg" width="68" height="68" alt="洋妞"/></li>
                <li><img src="small/07.jpg" width="68" height="68" alt="洋妞"/></li>
			</ul>
		</div>
		<div class="scrollbutton smallImgDown">&gt;</div>
	</div><!--smallImg end-->	
    @endforeach
	<div id="bigView" style="display:none;"><div><img width="800" height="800" alt="" src="" /></div></div>
	 </div>
	</div>
		 <div class="Sharing">
	 <div class="bdsharebuttonbox bdshare-button-style0-16" data-bd-bind="1441079683326"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{"bdSize":16},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
  <!--收藏-->
  @foreach ($data as $v)
  
	  <div class="Collect"><a href="javascript:void(0)" id="{{$v->id}}" data-id="<?php echo Session::get('user_id');?>" data-token="<?php echo Session::get('token');?>" class="collect"><em class="ico1"></em>收藏商品( 2345 )</a></div>
	 </div>
   </div> 
   <!--信息样式-->
   
    <div class="textInfo">
    <form action="javascript:addToCart(97)" name="ECS_FORMBUY" id="ECS_FORMBUY">
	  <div class="title"><h1>Mixx 炼乳奶酪饼干 600g 马来西亚进口</h1><p>进口饼干糕点 西式糕点 休闲轻松</p></div>
	  <div class="mod_detailInfo_priceSales">
	  <div class="margins">
	  <div class="Price clearfix"><label>价格</label><span>¥{{$v->price}} <b>50000.00</b></span></div>
	  <div class="Activity clearfix"><label>活动</label><span>指定商品满¥50，可换购以下任一商品</span></div>
        <div class="p_Size clearfix"><label>规格</label><dd class="left">
        <div class="item  selected"><b></b><a href="#none" title="小礼盒">小礼盒</a></div> 
        <div class="item"><b></b><a href="#none" title="普通包装">普通包装</a></div>
        <div class="item"><b></b><a href="#none" title="大礼盒">大礼盒</a></div></dd></div>
	  </div>
	  <div class="s_Review">
	   <a href="#">好评率<b>95%</b>[评论<b>87653</b>条]</a>
	  </div>
	  </div>
	 <div class="buyinfo" id="detail_buyinfo">
		<dl>
        <dt>数量</dt>
        <dd>
		  <div class="choose-amount left">
			<a class="btn-reduce" href="javascript:;" onclick="setAmount.reduce('#buy-num')">-</a>
			<a class="btn-add" href="javascript:;" onclick="setAmount.add('#buy-num')">+</a>
			<input class="text" id="buy-num" value="1" onkeyup="setAmount.modify('#buy-num');">		
		 </div>
		 <div class="P_Quantity">剩余：50000件</div>        
        </dd>
	  <dd>
	    <div class="wrap_btn"> <a href="javascript:addToCart_bak(92)" class="wrap_btn1" title="加入购物车"></a> 
		  <a href="javascript:addToCart(92)" class="wrap_btn2" title="立即购买"></a> </div>
		  </dd>
	  </dl>
	  </div>
	  <div class="Guarantee clearfix">
	   <dl><dt>支付方式</dt><dd><em></em>货到付款（部分地区）</dd><dd><em></em>在线支付</dd> 
	   <dd> <div class="payment " id="payment">
                                    <a href="javascript:void(0);" class="paybtn">支付方式<span class="iconDetail"></span></a>
                                <ul><li>货到付款</li><li>礼品卡支付</li><li>网上支付</li><li>银行转账</li></ul></div>
	  </dd></dl></div>	  
	</form>
  </div>
 @endforeach
  <!--产品推荐-->
    <div class="Recommend">
      <div class="title_name">同类产品推荐</div>
	  <div class="Recommend_list">
	    <ul>
		 <li class="clearfix">
		 <div class="pic_img"><a href=""><img src="Products/x-3.jpg"></a></div>
		 <div class="r_content">
			<div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
			<div class="p_Price">￥32.50</div>
          </div>
		 </li>
		  <li class="clearfix">
		 <div class="pic_img"><a href=""><img src="Products/x-3.jpg"></a></div>
		 <div class="r_content">
			<div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
			<div class="p_Price">￥32.50</div>
          </div>
		 </li>
		  <li class="clearfix">
		 <div class="pic_img"><a href=""><img src="Products/x-3.jpg"></a></div>
		 <div class="r_content">
			<div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
			<div class="p_Price">￥32.50</div>
          </div>
		 </li>
		  <li class="clearfix">
		 <div class="pic_img"><a href=""><img src="Products/x-3.jpg"></a></div>
		 <div class="r_content">
			<div class="title"><a href="#">金龙鱼 东北大米 蟹稻共生 盘锦大米5KG</a></div>
			<div class="p_Price">￥32.50</div>
          </div>
		 </li>
		</ul>
	  </div>
   </div>
  </div> 
   </div>
  <!--产品-->
  <div class="clearfix">
   <div class="left_style">
   
   </div>
   <div class="right_style">	  
	<div class="inDetail_boxOut ">
	 <div class="inDetail_box">
	  <div class="fixed_out ">
	   <ul class="inLeft_btn fixed_bar">
                  <li class="active"><a id="property-id" href="#shangpsx" class="current">规格与包装</a></li>
                  <li><a id="detail-id" href="#shangpjs">商品属性</a></li>
                  <li><a id="shot-id" href="#miqsp">售后服务</a></li>
                  <li><a id="coms1-id" href="#coms1">买家评论</a></li>
                </ul>
               <div class="subbuy">
          <span class="extra currentPrice"> ¥29.90</span>
          <a href="#" class="extra  notice J_BuyButtonSub">立即购买</a></div>
	  </div>
	 </div>	  
	</div>  

   <div id="shangpsx"> 
    <ul class="shangpsx_info">
        <li><label>生产许可证编号</label><span>QS3301 1401 0973</span></li>
        <li><label>产品标准号</label><span>GB/T 18650</span></li>
        <li><label>生产日期</label><span>2015年4月</span></li>
        <li><label>有效期</label><span>三年</span></li>
        <li><label>产品名称</label><span>艺福堂茶叶 绿茶 龙井茶 西湖龙井 雨前靠谱茶</span></li>
        <li><label>净含量</label><span>250g</span></li>
        <li><label>包装</label><span>罐装</span></li>
        <li><label>品牌</label><span>艺福堂</span></li>
        <li><label>食品工艺</label><span>炒青绿茶</span></li>
        <li><label>级别</label><span>三级</span></li>
        <li><label>产地</label><span>中国大陆杭州</span></li>
        <li><label>价格</label><span>100-199元</span></li>
       </ul>
   </div>
   <div id="shangpjs"><img src="images/xinxi.png" /></div>
   <div id="miqsp">
   
   </div>
   <div id="coms1">
   
   </div>
  </div> 
  </div>
 </div>
  <!--底部样式-->
 <div class="ft_footer_service" id="footer">
  <div class="footerbox" >
  <!--底部-->
  <div class="Menu_style ensure ">
    <div class="phone">
      400-3456-333
    </div>
    <div class="icon_en">
     <a href="#" class="icon_link"><img src="images/footer_icon_31.png" /><span class="left"><h2>退换货</h2>7天无理由退换货</span></a>
     <a href="#" class="icon_link"><img src="images/footer_icon_33.png" /><span class="left"><h2>正品保障</h2>企业认证产品</span></a>
     <a href="#" class="icon_link"><img src="images/footer_icon_35.png" /><span class="left"><h2>满包邮</h2>满68元包邮</span></a>
     <a href="#" class="icon_link"><img src="images/footer_icon_37.png" /><span class="left"><h2>直供产品</h2>厂家直销平台</span></a>
    </div>
   </div>
  </div>
 </div>
 <!--底部样式-->
 <div class="footer">
  <div class="footerbox clearfix">
  <div class="clearfix">
   <div class="left help_link">
    <dl>
	 <dt>投保指南</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>
	<dl>
	 <dt>保险服务</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>
	<dl>
	 <dt>支付方式</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>
	<dl>
	 <dt>帮助中心</dt>
	 <dd><a href="#">保险需求测试</a></dd>
     <dd><a href="#">专题及活动</a></dd>
     <dd><a href="#">挑选保险产品</a> </dd>
     <dd><a href="#">常见问题 </a></dd>
	</dl>	   
   </div>
   <!--信息内容-->

  <!--认证-->
 <!--认证展示样式-->
<div class="Authenticate left clearfix" id="Authenticate_show">
  <div class="Authenticate_show">
  <div class="picMarquee-left">
			<div class="hd">
				<a class="next">&lt;</a>
				<a class="prev">&gt;</a>
			</div>
			<div class="bd">
				<ul class="picList">
					<li>
						<div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="images/pic1.jpg" /></a></div>
                          <!--<div class="title"><a href="http://www.SuperSlide2.com" target="_blank">效果图1</a></div>-->					
                    </li>
					<li>
						<div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="images/pic2.jpg" /></a></div>
						<!--<div class="title"><a href="http://www.SuperSlide2.com" target="_blank">效果图2</a></div>-->
					</li>
					<li>
						<div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="images/pic3.jpg" /></a></div>
						
					</li>
					<li>
						<div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="images/pic4.jpg" /></a></div>
						
					</li>
					<li>
						<div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="images/pic5.jpg" /></a></div>
						
					</li>
					<li>
						<div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="images/pic6.jpg" /></a></div>
						
					</li>
                    <li>
						<div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="images/pic6.jpg" /></a></div>
						
					</li>
                    <li>
						<div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="images/pic6.jpg" /></a></div>
						
					</li>
				</ul>
			</div>
		</div>

		<script type="text/javascript">
		jQuery(".picMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:2,interTime:50});
		</script>
  </div>
</div>
  </div>
 <div class="text_link">
   <p>
  <a href="#">关于我们</a>｜ <a href="#">公开信息披露</a>｜ <a href="#">加入我们</a>｜ <a href="#">联系我们</a>｜ <a href="#">版权声明</a>｜ <a href="#">隐私声明</a>｜ <a href="#">网站地图</a></p>
	 <p>蜀ICP备11017033号 Copyright ©2011 成都福际生物技术有限公司 All Rights Reserved. Technical support:CDDGG Group</p>
  </div>
  </div>
 </div>
 <!--右侧菜单栏购物车样式-->
<div class="fixedBox">
  <ul class="fixedBoxList">
      <li class="fixeBoxLi user"><a href="#"> <span class="fixeBoxSpan iconfont icon-my"></span> <strong>用户</strong></a> </li>
    <li class="fixeBoxLi cart_bd" style="display:block;" id="cartboxs">
		<p class="good_cart">0</p>
			<span class="fixeBoxSpan iconfont icon-cart"></span> <strong>购物车</strong>
			<div class="cartBox">
       		<div class="bjfff"></div><div class="message">购物车内暂无商品，赶紧选购吧</div>    </div></li>
    <li class="fixeBoxLi Service "> <span class="fixeBoxSpan iconfont icon-qq1"></span> <strong>客服</strong>
      <div class="ServiceBox">
        <div class="bjfffs"></div>
        <dl onclick="javascript:;">
		    <dt><img src="images/Service1.png"></dt>
		       <dd><strong>QQ客服1</strong>
		          <p class="p1">9:00-22:00</p>
		           <p class="p2"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=123456&amp;site=DGG三端同步&amp;menu=yes">点击交谈</a></p>
		          </dd>
		        </dl>
				<dl onclick="javascript:;">
		          <dt><img src="images/Service1.png"></dt>
		          <dd> <strong>QQ客服1</strong>
		            <p class="p1">9:00-22:00</p>
		            <p class="p2"><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=123456&amp;site=DGG三端同步&amp;menu=yes">点击交谈</a></p>
		          </dd>
		        </dl>
	          </div>
     </li>
	 <li class="fixeBoxLi code cart_bd " style="display:block;" id="cartboxs">
			<span class="fixeBoxSpan iconfont icon-weixin"></span> <strong>微信</strong>
			<div class="cartBox">
       		<div class="bjfff"></div>
			<div class="QR_code">
			 <p><img src="images/erweim.jpg" width="150px" height="150px" style=" margin-top:10px;" /></p>
			 <p>微信扫一扫，关注我们</p>
			</div>		
			</div>
			</li>

    <li class="fixeBoxLi Home"> <a href="./"> <span class="fixeBoxSpan iconfont  icon-collect"></span> <strong>收藏</strong> </a> </li>
    <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan iconfont icon-top"></span> <strong>返回顶部</strong> </li>
  </ul>
</div>
</body>
</html>
<script>
     window.onload = function(){
        var vm = new Vue({
            el:'.app',
            data:{
								msg:[],
                list:[],
                data:[],
                res:[],
            },
            mounted:function () {
								this.get();
            },
            methods:{
                get:function(){
                    //发送get请求
                    this.$http.get("http://www.shop.com/index/list").then(function(res){
                      // console.log(res.body.data);
                      // console.log(body);
                        this.msg=res.body.data;

                    },function(){
                        console.log('请求失败');
										});
										
										this.$http.get("http://www.shop.com/index/goods").then(function(result){
                      // console.log(result.body.data);
                      // console.log(body);
												this.list=result.body.data;
												// console.log(this.list);

                    },function(){
                        console.log('请求失败');
                    });

                    this.$http.get("http://www.shop.com/index/categoryList").then(function(result){
                      // console.log(result.body.data);
                      // console.log(body);
												this.data=result.body.data;
												// console.log(this.list);

                    },function(){
                        console.log('请求失败');
                    });

                    this.$http.get("http://www.shop.com/index/categoryShow").then(function(result){
                      console.log(result.body.data);
                      // console.log(body);
                    this.res=result.body.data;
                    // console.log(this.list);

                    },function(){
                        console.log('请求失败');
                    });
								}
								
								
            }
        });
    }
</script>
<script>
$('.collect').click(function(){
    // alert(1);
    goods_id = $(this).prop('id');
    user_id = $(this).attr('data-id');
    token = $(this).attr('data-token');
    // alert(token);
    $.ajax({
        url:"http://www.shop.com/api/insertCollect?token="+token,
        type:'POST',
        dataType:'json',
        data:{goods_id:goods_id,user_id:user_id,'_token':'{{csrf_token()}}'},
        success:function(res){
            console.log(res);
            if(res.code==200){
                alert("收藏成功");
            }
            if(res.code==407){
                alert("已收藏");
						}
						if(res.code==403){
							alert("token不合法");
						}
        }
    })
})
</script>
