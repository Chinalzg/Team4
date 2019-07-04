<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="/static/index/" />
<link href="css/common.css" rel="stylesheet" tyle="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="fonts/iconfont.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="js/payfor.js" type="text/javascript"></script>
<script src="js/lrtk.js" type="text/javascript"></script>
<script src="js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="js/common_js.js" type="text/javascript"></script>
<script src="js/footer.js" type="text/javascript"></script>
<script src="js/jquery.jumpto.js" type="text/javascript"></script>
<title>购物车</title>
</head>
<script type="text/javascript">
$(document).ready(function () {
   //全选
   $("#CheckedAll").click(function () {
	   if (this.checked) {                 //如果当前点击的多选框被选中
		   $('input[type=checkbox][name=checkitems]').attr("checked", true);
	   } else {
		   $('input[type=checkbox][name=checkitems]').attr("checked", false);
	   }
   });
   $('input[type=checkbox][name=checkitems]').click(function () {
	   var flag = true;
	   $('input[type=checkbox][name=checkitems]').each(function () {
		   if (!this.checked) {
			   flag = false;
		   }
	   });

	   if (flag) {
		   $('#CheckedAll').attr('checked', true);
	   } else {
		   $('#CheckedAll').attr('checked', false);
	   }
   });
   //输出值
   $("#send").click(function () {
	      if($("input[type='checkbox'][name='checkitems']:checked").attr("checked")){
	   var str = "你是否要删除选中的商品：\r\n";
	   $('input[type=checkbox][name=checkitems]:checked').each(function () {
		   str += $(this).val() + "\r\n";
	   })
	   alert(str);
		  }
		  else{
			   var str = "你未选中任何商品，请选择后在操作！"; 
			   alert(str);
       }
	   	    
   });
})
</script>
<body>
 <div id="header_top">
  <div id="top">
    <div class="Inside_pages">
      <div class="Collection">下午好，欢迎光临520私库商城！<em></em><a href="#">收藏我们</a></div>
	<div class="hd_top_manu clearfix">
	  <ul class="clearfix">
	   <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">欢迎光临本店！<a href="#" class="red">[请登录]</a> 新用户<a href="#" class="red">[免费注册]</a></li>
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
			<li><a href="#">购物车</a></li>
		 </ul>			 
		</div>
	<script>$("#Navigation").slide({titCell:".Navigation_name li"});</script>		
  </div>
</div>
</div>
</div>
<!--购物车样式图层-->
<div class="Inside_pages">
 <div class="shop_carts">
   <div class="Process"></div>
 <div class="Shopping_list">
  <div class="title_name">
    <ul>
	<li class="checkbox"></li>
	<li class="name">商品名称</li>
	<li class="scj">市场价</li>
	<li class="bdj">本店价</li>
	<li class="sl">购买数量</li>
	<li class="xj">小计</li>
	<LI class="cz">操作</LI>
  </ul>
 </div>
  <div class="shopping">
  	
  <form  method="post" action="">

 <table class="table_list">

</table>
   <div><center><span class="page"></span></center></div>
 <div class="sp_Operation clearfix">
  <div class="select-all">
  <div class="cart-checkbox"><input type="checkbox"   id="CheckedAll" name="toggle-checkboxes" class="jdcheckbox" clstag="clickcart">全选</div>
  
    </div>    
	 <!--结算-->
	<div class="toolbar_right">
    <ul class="Price_Info">
    <li class="p_Total"><label class="text">商品总价:</label><span class="total_amount" style="color: red;"></span></li>
	
    </ul>
	<div class="btn"><a class="cartsubmit" href="Orders.html"></a><a class="continueFind" href="Orders.html"></a></div>
  </div>
  </div>
   </form>
 </div>
 </div>
 </div>
 <?php $a=4;?>
 {{view()->share('token',$a)}}
{{$token}}
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

</body>
</html>
<script>
			var urls = 'http://laravel.test/api/';
			var amount = 0;
			var total_amount = 0;
	$(function(){
		$.ajax({
			type:'get',
			url:urls+'cartShow',
			data:{id:1},
			dataType:'json',
			success:function(e){
				$.each(e.data, function(k, v){
				amount = v.price*v.goods_num;
				total_amount+=amount;
				$(".total_amount").text('￥ '+total_amount);
				$(".table_list").append('<tr class="tr">\
			   	<td class="checkbox"><input name="checkitems" type="checkbox"/></td>\
			    <td class="name">\
				  <div class="img"><a href="#"><img src="'+v.image+'" /></a></div>\
				  <div class="p_name"><a href="#">'+v.goods_name+'</a></div>\
				</td>\
				<td class="scj sp"><span id="Original_Price_1">￥'+v.price+'</span></td>\
				<td class="bgj sp" ><span id="price_item_1" class="price'+v.id+'">￥'+v.price+'</span></td>\
				<td class="sl">\
	    <div class="Numbers">\
		  <a  class="jian">-</a>\
          <input type="text" name="qty_item_" value="'+v.goods_num+'"   class="number_text nums'+v.id+'" id="'+v.id+'">\
		  <a  class="jia">+</a>\
		 </div>\
	</td>\
	<td class="xj js'+v.id+'" >'+amount+'</td>\
				<td class="cz">\
				 <p><a href="http://laravel.test/api/cartDel?id='+v.id+'">删除</a><P>\
				 <p><a href="#"><input type="hidden" /></a></p>\
				</td>\
			   </tr>')
				})
			}
		})
	})

	$(document).on('click', '.jian', function(){
		var id = $(this).next().attr('id');
		var price = $(".price"+id).text();
		var sum= $(".js"+id).text();
		var num = $(".nums"+id).val();
		
		price = price.substr(1);
		sum = parseFloat(sum)-parseFloat(price);

		num = num-1;
		if(num<1){
			alert('别调皮');return false;
		}
		$(".nums"+id).val(num);
		$(".js"+id).text(sum);
		
		total_amount = parseFloat(total_amount)-parseFloat(price);
		$(".total_amount").text('￥ '+total_amount);

		$.ajax({
			type:'post',
			url:urls+"cartUpd",
			dataType:'json',
			data:{id:id},
			success:function(e){
				if(e.status == 200){
					return true;
				}
			}
		})

	})

	$(document).on('click', '.jia', function(){
		var id = $(this).prev().attr('id');
		var price = $(".price"+id).text();
		var sum= $(".js"+id).text();
		var num = $(".nums"+id).val();
		
		price = price.substr(1);
		sum = parseFloat(sum)+parseFloat(price);

		num = parseInt(num)+1;
		$(".nums"+id).val(num);
		$(".js"+id).text(sum);
		total_amount = parseFloat(total_amount)+parseFloat(price);
		$(".total_amount").text('￥ '+total_amount);
		$.ajax({
			type:'post',
			url:urls+"cartUpd",
			dataType:'json',
			data:{type:1, id:id},
			success:function(e){
				
				if(e.status == 200){
					return true;
				}
			}
		})
	})

		


</script>