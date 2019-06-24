<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<link href="{{ URL::asset('index/css/common.css') }}" rel="stylesheet" tyle="text/css" />
<link href="{{ URL::asset('index/css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('index/fonts/iconfont.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ URL::asset('index/js/jquery.min.1.8.2.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('index/js/jquery.SuperSlide.2.1.1.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('index/js/common_js.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('index/js/footer.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('index/js/jquery.jumpto.js') }}" type="text/javascript"></script>
<title>商城首页-传统版</title>
<script src="{{ URL::asset('js/vue.js') }}"></script>
<script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>
<script src="https://cdn.staticfile.org/vue-resource/1.5.1/vue-resource.min.js"></script>
</head>

<body>
<script type="text/javascript" charset="UTF-8">
<!--
 //点击效果start
 function infonav_more_down(index)
 {
  var inHeight = ($("div[class='p_f_name infonav_hidden']").eq(index).find('p').length)*30;//先设置了P的高度，然后计算所有P的高度
  if(inHeight > 60){
   $("div[class='p_f_name infonav_hidden']").eq(index).animate({height:inHeight});
   $(".infonav_more").eq(index).replaceWith('<p class="infonav_more"><a class="more"  onclick="infonav_more_up('+index+');return false;" href="javascript:">收起<em class="pulldown"></em></a></p>');
  }else{
   return false;
  }
 }
 function infonav_more_up(index)
 {
  var infonav_height = 85;
  $("div[class='p_f_name infonav_hidden']").eq(index).animate({height:infonav_height});
  $(".infonav_more").eq(index).replaceWith('<p class="infonav_more"> <a class="more" onclick="infonav_more_down('+index+');return false;" href="javascript:">更多<em class="pullup"></em></a></p>');
 }
   
 function onclick(event) {
  info_more_down();
 return false;
 }
 //点击效果end  
//-->
</script>
<body>
<div id="app">
 <div id="header_top">
  <div id="top">
    <div class="Inside_pages">
      <div class="Collection">下午好，欢迎光临520私库商城！<em></em><a href="#">收藏我们</a></div>
	<div class="hd_top_manu clearfix">
	  <ul class="clearfix">
	   <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="login" class="red">[请登录]</a> 新用户<a href="registered" class="red">[免费注册]</a></li>
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
  <div id="allSortOuterbox">
    <div class="t_menu_img"></div>
    <div class="Category"><a href="#"><em></em>所有产品分类</a></div>
    <div class="hd_allsort_out_box_new">
	 <!--左侧栏目开始-->
	 <ul class="Menu_list">	
	    <li class="name">
		<div class="Menu_name" ><a href="product_list.html" >男装女装</a> <span>&lt;</span></div>
		<div class="link_name">
		  <p><a href="Product_Detailed.html">茅台</a>  <a href="#">五粮液</a>  <a href="#">郎酒</a>  <a  href="#">剑南春</a></p>
          <p><a href="Product_Detailed.html">酱香型</a>  <a href="#">四川</a>  <a href="#">贵州</a>  <a  href="#">养生酒</a></p>
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
		<div class="Menu_name"><a href="#" >个性护理</a><span>&lt;</span></div>
		<div class="link_name">
		 <a href="Product_Detailed.html">饼干蛋糕</a><a href="#">糖果</a><a href="#">巧克力</a><a href="#">坚果</a>
         <a href="Product_Detailed.html">饼干蛋糕</a><a href="#">糖果</a><a href="#">巧克力</a><a href="#">坚果</a>
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
	<script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail",	});</script>
	<!--菜单栏-->
	<div class="Navigation" id="Navigation">
		 <ul class="Navigation_name">
			<li v-for="site in msg"><a href="">@{{site.name}}</a></li>
		 </ul >			 
		</div>
	<script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>		
  </div>
</div>
</div>
<div class="Slide_style" >
<!--幻灯片样式1-->
<div class="Menu_style clearfix" id="Slide">
  	<div id="xiao_slideBox" class="xiao_slideBox">
			<div class="hd">
				<ul class="smallUl"></ul>
			</div>
			<div class="bd">
				<ul>
				
					<li><a href="#" target="_blank"><div style="background:url(images/1234_03.jpg) no-repeat; background-position:center; width:100%; height:645px;"></div></a></li>
					<li><a href="#" target="_blank"><div style="background:url(images/AD-03.jpg) no-repeat; background-position:center; width:100%; height:645px;"></div></a></li>
				</ul>
			</div>
			<!-- 下面是前/后按钮代码，如果不需要删除即可 -->
			<a class="prev" href="javascript:void(0)"></a>
			<a class="next" href="javascript:void(0)"></a>

		</div>
		<script type="text/javascript">
		jQuery(".xiao_slideBox").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,interTime:9000});
		</script>
</div>
<!--幻灯片样式-->
   	<div id="slideBox" class="slideBox">
			<div class="hd">
				<ul class="smallUl"></ul>
			</div>
			<div class="bd">
				<ul>
					<li><a href="#" target="_blank"><div style="background:url(images/ADimg_14.jpg) no-repeat; background-position:center; width:100%; height:645px; background-size:100% 100%"></div></a></li>
					<li><a href="#" target="_blank"><div style="background:url(images/AD-02.jpg) no-repeat; background-position:center; width:100%; height:645px;background-size:100% 100%"></div></a></li>
					<li><a href="#" target="_blank"><div style="background:url(images/AD-03.jpg) no-repeat; background-position:center; width:100%; height:645px;background-size:100% 100%"></div></a></li>
				</ul>
			</div>
			<!-- 下面是前/后按钮代码，如果不需要删除即可 -->
			<a class="prev" href="javascript:void(0)"><em class="left_arrow"></em></a>
			<a class="next" href="javascript:void(0)"><em class="right_arrow"></em></a>

		</div>
		<script type="text/javascript">
		jQuery(".slideBox").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,delayTime:500,interTime:5000});
		</script>
 </div>

<div class="index_style clearfix">



 <!--推荐图层样式-->
  
  <!--品牌列表样式-->

  <!--产品版块样式图层-->
  <div class="Product_area clearfix">
   <div class="area_title"><div class="name"><span class="floors">1F</span>男装女装</div></div>
   <div class="list_style clearfix">
    <div class="Left_side">
     <ul>


		 <!-- <li v-for="site in msg"><a href="">@{{site.name}}</a></li> -->
      <li v-for="site in list">
			<a href="#">
			<img :src="site.image" style="width:220px;height:220px;"/>
			</a>
			</li>



     </ul>
    </div>
    <div class="middle">
     <!--广告-->
      <div class="hd">
         <a class="prev" href="javascript:void(0)">&gt;</a>
		<a class="next" href="javascript:void(0)">&lt;</a>
      </div>
      <div class="bd">
      <ul>
       <li><a href="#"><img src="Products/AD-5.jpg" /></a></li>
        <li><a href="#"><img src="Products/AD-6.jpg" /></a></li>
      </ul>
      </div>    
    </div>
    <script type="text/javascript">
		jQuery(".middle").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,interTime:7000});
		</script>
     <div class="Left_side">
     <ul>

		 <li v-for="site in list">
			<a href="#">
			<img :src="site.image" style="width:220px;height:220px;"/>
			</a>
			</li>

     </ul>
    </div>
    <div class="advertising">
     <a href="#"><img src="Products/AD-7.jpg"  width="219" height="150"/></a>
     <a href="#"><img src="Products/AD-8.jpg" width="219" height="150"/></a>
     <a href="#" class="da_AD"><img src="Products/AD-9.jpg" width="318" height="150"/></a>
     <a href="#"><img src="Products/AD-10.jpg" width="219" height="150"/></a>
     <a href="#"><img src="Products/AD-7.jpg" width="219" height="150"/></a>
    </div>
    <!--品牌-->
    <div class="Brand_Gallery">
     <a href="#"><img src="Brand/p-1.jpg"  width="120" height="32"/></a>
     <a href="#"><img src="Brand/p-4.jpg"  width="120" height="32"/></a>
     <a href="#"><img src="Brand/p-6.jpg"  width="120" height="32"/></a>
     <a href="#"><img src="Brand/p-11.jpg"  width="120" height="32"/></a>
     <a href="#"><img src="Brand/p-14.jpg"  width="120" height="32"/></a>
     <a href="#"><img src="Brand/p-17.jpg"  width="120" height="32"/></a>
     <a href="#"><img src="Brand/p-19.jpg"  width="120" height="32"/></a>
     <a href="#"><img src="Brand/p-13.jpg"  width="120" height="32"/></a>
    </div>
   </div>
  </div>
  <!--底部样式-->

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
						<div class="pic"><a href="" target="_blank"><img src="images/pic1.jpg" /></a></div>
                          <!--<div class="title"><a href="http://www.SuperSlide2.com" target="_blank">效果图1</a></div>-->					
          </li>
					<li>
						<div class="pic"><a href="" target="_blank"><img src="images/pic2.jpg" /></a></div>
						<!--<div class="title"><a href="http://www.SuperSlide2.com" target="_blank">效果图2</a></div>-->
					</li>
					<li>
						<div class="pic"><a href="" target="_blank"><img src="images/pic3.jpg" /></a></div>
						
					</li>
					<li>
						<div class="pic"><a href="" target="_blank"><img src="images/pic4.jpg" /></a></div>
						
					</li>
					<li>
						<div class="pic"><a href="" target="_blank"><img src="images/pic5.jpg" /></a></div>
						
					</li>
					<li>
						<div class="pic"><a href="" target="_blank"><img src="images/pic6.jpg" /></a></div>
						
					</li>
                    <li>
						<div class="pic"><a href="" target="_blank"><img src="images/pic6.jpg" /></a></div>
						
					</li>
                    <li>
						<div class="pic"><a href="" target="_blank"><img src="images/pic6.jpg" /></a></div>
						
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
</div>
</body>
</html>
<script>
     window.onload = function(){
        var vm = new Vue({
            el:'#app',
            data:{
								msg:[],
								list:[],
            },
            mounted:function () {
								this.get();
            },
            methods:{
                get:function(){
                    //发送get请求
                    this.$http.get("http://www.shop.com/index/list").then(function(res){
                      console.log(res.body.data);
                      // console.log(body);
                        this.msg=res.body.data;

                    },function(){
                        console.log('请求失败');
										});
										
										this.$http.get("http://www.shop.com/index/goods").then(function(result){
                      console.log(result.body.data);
                      // console.log(body);
												this.list=result.body.data;
												// console.log(this.list);

                    },function(){
                        console.log('请求失败');
                    });
								}
								
								
            }
        });
    }

</script>

