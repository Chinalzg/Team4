<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title></title>

<link rel="stylesheet" href="/static/css/pintuer.css">
<link rel="stylesheet" href="/static/css/admin.css">
<link rel="stylesheet" href="/static/css/style.css">
<script src="/static/js/jquery.js"></script>
<script src="/static/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>交易订单（图）</strong></div>
  <div class="body-content">
    	<div class="margin clearfix">
<div class="Order_Details_style">
 
<div class="Numbering">订单编号:<b>{{ $order['order_sn'] }}</b></div></div>
 <div class="detailed_style">
 <!--收件人信息-->
    <div class="Receiver_style">
     <div class="title_name">收件人信息</div>
     <form action="" onsubmit="return false;">
     <div class="Info_style clearfix">
        <div class="info_width">  
          <input type="hidden" name="id" value="{{$order['id']}}">
         <label class="label_name" for="form-field-2"> 收件人姓名： </label>
         <div class="o_content " ><span class="consignee">{{ $order['consignee'] }}</span><input type="hidden" name="consignee" value="{{ $order['consignee'] }}" class="userInfo"></div>

        </div>
        <div class="info_width">  
         <label class="label_name" for="form-field-2"> 收件人电话： </label>
         <div class="o_content "><span class="mobile">{{ $order['mobile'] }}</span><input type="hidden" name="mobile" value="{{ $order['mobile'] }}" class="userInfo"></div>
        </div>
         <div class="info_width">  
         <label class="label_name" for="form-field-2"> 收件地邮编： </label>
         <div class="o_content"><span class="zipcode">{{ $order['zipcode'] }}</span><input type="hidden"  name="zipcode" value="{{ $order['zipcode'] }}" class="userInfo"></div>
        </div>
         <div class="info_width">  
         <label class="label_name" for="form-field-4"> 收件人地址： </label>
         <div class="o_content "><span class="address">{{$order['address']}}</span><input type="hidden" name="address" value="{{$order['address']}}" class="userInfo"></div>
        </div>
        <div class="info_width" >
          <input type="submit" value="修改用户信息" class="btn1">
          <span id="update">

          </span>
          
        </div>
     </div>
</form>
    </div>
    <!--订单信息-->
    <div class="product_style">
    <div class="title_name">产品信息</div>
    <div class="Info_style clearfix">
      <div class="product_info clearfix">
      <a href="#" class="img_link"><img src="/static/images/p_3.jpg" /></a>
      <span>
      <a href="#" class="name_link">美果汇 美国进口嘎啦果苹果6粒装 加力果 姬娜果 伽利果 新鲜应季水果</a>
      <b>也称为姬娜果，饱满色艳，个头小</b>
      <p>规格：500g/斤</p>
      <p>数量：2kg</p>
      <p>价格：<b class="price"><i>￥</i>56</b></p>  
      <p>状态：<i class="label label-success radius">有货</i></p>   
      </span>
      </div>
      <div class="product_info clearfix">
      <a href="#" class="img_link"><img src="/static/images/p_3.jpg" /></a>
      <span>
      <a href="#" class="name_link">美果汇 美国进口嘎啦果苹果6粒装 加力果 姬娜果 伽利果 新鲜应季水果</a>
      <b>也称为姬娜果，饱满色艳，个头小</b>
      <p>规格：39.9/5kg</p>
      <p>数量：2</p>
      <p>价格：<b class="price"><i>￥</i>69.9</b></p>  
      <p>状态：<i class="label label-success radius">有货</i></p>   
      </span>
      </div>
       <div class="product_info clearfix">
      <a href="#" class="img_link"><img src="/static/images/p_3.jpg"/></a>
      <span>
      <a href="#" class="name_link">美果汇 美国进口嘎啦果苹果6粒装 加力果 姬娜果 伽利果 新鲜应季水果</a>
      <b>也称为姬娜果，饱满色艳，个头小</b>
      <p>规格：500g/斤</p>
      <p>数量：2kg</p>
      <p>价格：<b class="price"><i>￥</i>56</b></p>  
      <p>状态：<i class="label label-success radius">有货</i></p>   
      </span>
      </div>
    </div>
    </div>
    <!--总价-->
    <div class="Total_style">
     <div class="Info_style clearfix">
      <div class="info_width">  
         <label class="label_name" for="form-field-2"> 支付方式： </label>
         <div class="o_content">{{ $order['pay_method'] }}支付</div>
        </div>
        <div class="info_width">  
         <label class="label_name" for="form-field-2"> 支付状态： </label>
         <div class="o_content">{{ $order['pay_status'] }}</div>
        </div>
        <div class="info_width">  
         <label class="label_name" for="form-field-2"> 订单生成日期： </label>
         <div class="o_content"><?php echo date("Y-m-d", $order['order_time'])?></div>
        </div>
         <div class="info_width">  
         <label class="label_name" for="form-field-2"> 快递名称： </label>
         <div class="o_content">{{ $order['shipping_comp_name'] }}</div>
        </div>
         <div class="info_width">  
         <label class="label_name" for="form-field-2"> 发货日期： </label>
         <div class="o_content"><?php echo date("Y-m-d", $order['shipping_time'])?></div>
        </div>
        </div>
      <div class="Total_m_style"><span class="Total">总数：<b>10</b></span><span class="Total_price">总价：<b>345</b>元</span></div>
    </div>
    
    <!--物流信息-->
    <div class="Logistics_style clearfix">
     <div class="title_name">物流信息</div>
      <!--<div class="prompt"><img src="images/meiyou.png" /><p>暂无物流信息！</p></div>-->
       <div data-mohe-type="kuaidi_new" class="g-mohe " id="mohe-kuaidi_new">
        <div id="mohe-kuaidi_new_nucom">
            <div class="mohe-wrap mh-wrap">
                <div class="mh-cont mh-list-wrap mh-unfold">
                    <div class="mh-list">
                        <ul>
                            <li class="first">
                                <p>2015-04-28 11:23:28</p>
                                <p>妥投投递并签收，签收人：他人收 他人收</p>
                                <span class="before"></span><span class="after"></span><i class="mh-icon mh-icon-new"></i></li>
                            <li>
                                <p>2015-04-28 07:38:44</p>
                                <p>深圳市南油速递营销部安排投递（投递员姓名：蔡远发<a href="tel:18718860573">18718860573</a>;联系电话：）</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-28 05:08:00</p>
                                <p>到达广东省邮政速递物流有限公司深圳航空邮件处理中心处理中心（经转）</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-28 00:00:00</p>
                                <p>离开中山市 发往深圳市（经转）</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-27 15:00:00</p>
                                <p>到达广东省邮政速递物流有限公司中山三角邮件处理中心处理中心（经转）</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-27 08:46:00</p>
                                <p>离开泉州市 发往中山市</p>
                                <span class="before"></span><span class="after"></span></li>
                            <li>
                                <p>2015-04-26 17:12:00</p>
                                <p>泉州市速递物流分公司南区电子商务业务部已收件，（揽投员姓名：王晨光;联系电话：<a href="tel:13774826403">13774826403</a>）</p>
                                <span class="before"></span><span class="after"></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
            
 </div>
</div>
  </div>
</div>

</body></html>
<script>
          $(".btn1").click(function(){
              $(".userInfo").attr('type','text');
              $("#update").append('<input type="submit" value="确认修改" class="updates">');
          })

         $(document).on('click','.updates',function(){
            var id = $("input[name='id']").val();
            var consignee = $("input[name='consignee']").val();
            var mobile = $("input[name='mobile']").val();
            var zipcode = $("input[name='zipcode']").val();
            var address = $("input[name='address']").val();
            var that = $(this);
            $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'post',
                url:"{{'updateUserInfo'}}",
                data:{id:id, consignee:consignee, mobile:mobile, zipcode:zipcode ,address:address},
                dataType:'json',
                success:function(e){
                  if(e.code==1){
                    alert('修改成功');
                    $(".consignee").text(consignee);
                    $(".mobile").text(mobile);
                    $(".zipcode").text(zipcode);
                    $(".address").text(address);
                    $(".userInfo").attr('type','hidden');
                    $("#update").empty();
                    return true;
                  }else{
                    alert('有误，请重试');
                    return false;
                  }
                },
                error:function(res){
                  alert('规则不正确');
                }
            })
         })
</script>