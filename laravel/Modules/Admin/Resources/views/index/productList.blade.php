<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{ URL::asset('index/css/common.css') }}" rel="stylesheet" tyle="text/css" />
<link href="{{ URL::asset('index/css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('index/fonts/iconfont.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ URL::asset('index/js/jquery.min.1.8.2.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('index/js/lrtk.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('index/js/jquery.SuperSlide.2.1.1.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('index/js/common_js.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('index/js/footer.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('index/js/jquery.jumpto.js') }}" type="text/javascript"></script>
<title>520私库-产品列表页</title>
</head>
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
 <div id="header_top">
  <div id="top">
    <div class="Inside_pages">
      <div class="Collection">下午好，欢迎光临520私库商城！<em></em><a href="#">收藏我们</a></div>
	<div class="hd_top_manu clearfix">
	  <ul class="clearfix">
	   <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！
		 @if(Session::get('user_name'))
       <a href="#" class="red">欢迎<?php echo Session::get('user_name');?>登录</a><a href="loginout" class="red">[退出登录]</a>
       @else
       <a href="login" class="red">[请登录]</a> 新用户<a href="register" class="red">[免费注册]</a>
       </li>
       @endif
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="shop_cart.html">我的订单</a></li> 
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="#">购物车(<b>0</b>)</a> </li>
	   <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="#">联系我们</a></li>
	   <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover"><a href="#" class="hd_menu">客户服务</a>
	    <div class="hd_menu_list">
		   <ul>
		    <li><a href="Helper.html">常见问题</a></li>
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
		<div class="Menu_name"><a href="product_list.html" >男装女装</a> <span>&lt;</span></div>
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
		<div class="Menu_name"><a href="#" >个性护理</a><span>&lt;</span></div>
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
	<script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail",	});</script>
	<!--菜单栏-->
	<div class="Navigation" id="Navigation">
		 <ul class="Navigation_name">
			<li><a href="index.html">首页</a></li>
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
	<script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>		
  </div>
</div>
</div>
</div>
<!--产品条件筛选样式-->
<div class="Inside_pages clearfix" >
 <!--位置-->
 <div id="Filter_style">
 <div class="Location_link">
  <em></em><a href="#">进口食品、进口牛</a>  &lt;   <a href="#">进口饼干/糕点</a>  
 </div>
 <!--筛选样式-->
 <div class="Filter">
  <div class="Filter_list clearfix">
   <div class="Filter_title"><span>品牌：</span></div>
   <div class="Filter_Entire"><a href="#">全部</a></div>
   <div class="p_f_name infonav_hidden">
    <p><a href="#" title="莱家/Loacker">莱家/Loacker </a>  
	<a href="#" title="">丽芝士/Richeese</a>  
	<a href="#" title="白色恋人/SHIROI KOIBITO ">白色恋人/SHIROI KOIBITO </a> 
	<a href="#">爱时乐/Astick </a> 
	<a href="#">利葡/LiPO </a> 
	<a href="#">友谊牌/Tipo </a> 
	<a href="#"> 三立/SANRITSU  </a>  
	<a href="#"> 皇冠/Danisa </a>  </p>
	 <p><a href="#">丹麦蓝罐/Kjeldsens</a>
	<a href="#">茱莉/Julie's </a>  
	<a href="#">向日葵/Sunflower </a>  
	<a href="#">福多/fudo </a> 
	<a href="#">非凡农庄/PEPPER...  </a>
	<a href="#">凯尔森/Kelsen </a> 
	<a href="#"> 蜜兰诺/Milano </a> 
	<a href="#">壹格/EgE  </a>  </p>
	 <p><a href="#">沃尔克斯/Walkers </a> 
	<a href="#">澳门永辉/MACAU...</a>  
    <a href="#" title="莱家/Loacker">莱家/Loacker </a>  
	<a href="#" title="">丽芝士/Richeese</a>  
	<a href="#" title="白色恋人/SHIROI KOIBITO ">白色恋人/SHIROI KOIBITO </a> 
	<a href="#">爱时乐/Astick </a> 
	<a href="#">利葡/LiPO </a> 
	<a href="#">友谊牌/Tipo </a>  </p>
	 <p><a href="#"> 三立/SANRITSU  </a>  
	<a href="#"> 皇冠/Danisa </a>  
	<a href="#">丹麦蓝罐/Kjeldsens</a>
	<a href="#">茱莉/Julie's </a>  
	<a href="#">向日葵/Sunflower </a>  
	<a href="#">福多/fudo </a> 
	<a href="#">非凡农庄/PEPPER...  </a>
	<a href="#">凯尔森/Kelsen </a>  </p>
	 <p><a href="#"> 蜜兰诺/Milano </a> 
	<a href="#">壹格/EgE  </a>  
	<a href="#">沃尔克斯/Walkers </a> 
	<a href="#">澳门永辉/MACAU...</a>  
       <a href="#" title="莱家/Loacker">莱家/Loacker </a>  
	<a href="#" title="">丽芝士/Richeese</a>  
	<a href="#" title="白色恋人/SHIROI KOIBITO ">白色恋人/SHIROI KOIBITO </a> 
	<a href="#">爱时乐/Astick </a>  </p>
	
   </div>
   <p class="infonav_more"><a href="#" class="more" href="javascript:" onclick="infonav_more_down(0);return false;">更多<em class="pullup"></em></a></p>
  </div>
  <div class="Filter_list clearfix">
  <div class="Filter_title"><span>产地：</span></div>
  <div class="Filter_Entire"><a href="#">全部</a></div>
  <div class="p_f_name">
   <a href="#">中国大陆</a>     
   <a href="#">中国台湾</a>     
   <a href="#">中国香港</a>     
   <a href="#">中国澳门</a>     
   <a href="#">日本</a>     
   <a href="#">韩国</a>     
   <a href="#">越南</a>    
   <a href="#">泰国</a>
  </div>
  </div>
  <div class="Filter_list clearfix">
  <div class="Filter_title"><span>包装方式：</span></div>
  <div class="Filter_Entire"><a href="#">全部</a></div>
  <div class="p_f_name">
  <a href="#">袋装</a><a href="#">盒装</a><a href="#">罐装</a><a href="#">礼盒装</a><a href="#">散装(称重)</a>
  </div>
  </div>
  <div class="Filter_list clearfix">
  <div class="Filter_title"><span>价格：</span></div>
  <div class="Filter_Entire"><a href="#">全部</a></div>
  <div class="p_f_name">
    <a href="#">0-50</a><a href="#">50-150</a><a href="#">150-500</a><a href="#">500-1000</a><a href="#">1000以上</a>
  </div>
  </div>
 </div>
 </div>
 <div  class="scrollsidebar side_green" id="scrollsidebar"> 
  <div class="show_btn" id="rightArrow"><span></span></div>
 <div class="page_left_style side_content"  >
  <!--浏览记录-->
 
    
  <div class="Record side_list">
     <div class="title_name"></div>
	 
	   
	 
   </div>
 </div>

 <script type="text/javascript"> 
$(function() { 
	$("#scrollsidebar").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime : 600
	});
});
</script>
 <div class="page_right_style">
 <!--排序样式-->
 <div id="Sorted">
 <div class="Sorted">
  <div class="Sorted_style">
   <a href="#" class="on">综合<i class="iconfont icon-pullup"></i></a>
   <a href="#">销量<i class="iconfont icon-pullup"></i></a>
   <a href="#">价格<i class="iconfont icon-pullup"></i></a>
   <a href="#">新品<i class="iconfont icon-pullup"></i></a>
   </div>
   <!--产品搜索-->
   <div class="product_search">
    <input name="" type="text"  class="search_text"  value="请输入你要搜索的产品" onFocus="this.value=''" onBlur="if(!value){value=defaultValue;}"/><input name="" type="submit"  value="" class="search_btn"/>
   </div>
   <!--页数-->
   <div class="s_Paging">
   <span> 1/12</span>
   <a href="#" class="on">&lt;</a>
   <a href="#">&gt;</a>
   </div>
   </div>
 </div>
 <!--结束-->
 <!--产品列表样式-->
 <div class="p_list  clearfix">
   <ul>
   @foreach($data as $v)
    <li class="gl-item">
	<div class="Borders">
	 <div class="img"><a href="#"><img src="{{$v->image}}" style="width:220px;height:220px"/></a></div>
	 <div class="Price"><b>¥{{$v->price}}</b><span>[¥49.01/500g]</span></div>
	 <div class="name"><a href="#">{{$v->name}}</a></div>
	 <div class="Review">已有<a href="#">2345</a>评论</div>
	 <div class="p-operate">
	  <a href="#" class="p-o-btn shop_cart"><em></em>加入购物车</a>
	 </div>
	 </div>
	</li>
	@endforeach
   </ul>
   <div class="Paging">
     <a href="#" class="pn-prev disabled">&lt;上一页</a>
	 <a href="#" class="on">1</a>
	 <a href="#">2</a>
	 <a href="#">3</a>
	 <a href="#">4</a>
	 <a href="#">下一页&gt;</a>
	 <a href="#">尾页</a>
	<span class="p-skip"><em>共<b>232</b>页&nbsp;&nbsp;到第</em><input id="page_jump_num" value="1" onkeydown="javascript:if(event.keyCode==13){page_jump();return false;}" class="input-txt"><em>页</em><a href="javascript:page_jump();" class="btn btn-default">确定</a></span>
   </div>
 </div>
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
</body>
</html>
