<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>订单管理</title>

<link rel="stylesheet" href="/static/css/pintuer.css">
<link rel="stylesheet" href="/static/css/admin.css">
<link rel="stylesheet" href="/static/css/style.css">
<!--<link rel="stylesheet" href="css/ace.min.css">-->
<script src="/static/js/jquery.js"></script>
<script src="/static/js/pintuer.js"></script>
<script src="/static/js/layer/layer.js"></script>
<script type="text/javascript" src="/static/jeDate/jedate.js"></script>
</head>
<body>
<form method="post" action="" id="listform">

  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 订单管理</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <!--<li> <a class="button border-main icon-plus-square-o" href="add.html"> 发布文章</a> </li>-->
       <li>订单分类类型</li>
       <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:200px; line-height:17px;" onchange="changesearch()">
              <option value="">全部商品</option>
              <option value="">衣服</option>
              <option value="">食品</option>
              <option value="">电子</option>
              <option value="">旅游</option>
            </select>
          </li>
        </if>
      </ul>
    </div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <!--<li> <a class="button border-main icon-plus-square-o" href="add.html"> 发布文章</a> </li>-->
        <li>订单编号</li>
        <li>
          <input type="text" placeholder="订单编号" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
        </li>
        <li>时间</li>
        <li>
          <input type="text" placeholder=""  class="input" style="width:250px; line-height:17px;display:inline-block" id="dateinfo" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 查询</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120" style="text-align:left; padding-left:20px;">订单编号</th>
        <th>产品名称</th>
        <th>总价</th>
        <th>优惠</th>
        <th width="10%">订单时间</th>
        
        <th>数量</th>
        <th>状态</th>
        <th width="310">操作</th>
      </tr>
      	@foreach($data as $k => $order)
        <tr>
          <td style="text-align:left; padding-left:20px; width: 160px;"><input type="checkbox" name="id[]" />{{ $order['order_sn'] }}</td>

          <td>{{ $order['goods_name'] }}</td>
          <td class="text-main">{{ $order['order_amount'] }}元</td>
          <td>{{ $order['district_amount'] }}元</td>
          <td><?php echo date('Y-m-d H:i:s', $order['order_time'])?></td>
          
          <td>{{ $order['num'] }}</td>
          <td><span class="text-yellow changeStatus" id="{{ $order['id'] }}">{{ $order['trade_status'] }}</span></td>
          <td><div class="button-group">@if($order['trade_status']=='待发货')	<a class="button border-yellow" href="javascript:void(0)" onClick="Delivery_stop(this,'10034')"><span class="icon-paper-plane-o"></span> 发货</a>@endif<a class="button border-main" href="{{'orderList'}}?id={{$order['id']}}"><span class="icon-eye"></span> 查看</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(1,1,1)"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
        @endforeach
        
      <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="8" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 批量删除</a> 
      </tr>
      <tr>
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>
<!--发货-->
 <div id="Delivery_stop" style=" display:none">
  <div class=".container-layout">
    <div class="content_style-fh">
  <div class="form-group"><label class="bf25 " for="form-field-1">快递公司 </label>
       <div class="bf75"><select class="form-control" id="form-field-select-1">
																<option value="">--选择快递--</option>
																<option value="1">天天快递</option>
																<option value="2">圆通快递</option>
																<option value="3">中通快递</option>
																<option value="4">顺丰快递</option>
																<option value="5">申通快递</option>
																<option value="6">邮政EMS</option>
																<option value="7">邮政小包</option>
																<option value="8">韵达快递</option>
															</select></div>
	</div>
   <div class="form-group"><label class="bf25" for="form-field-1"> 快递号 </label>
    <div class="bf75"><input type="text" id="form-field-1" placeholder="快递号" class="col-xs-10 xb5" style="margin-left:0px;"></div>
	</div>
    <div class="form-group"><label class="bf25" for="form-field-1">货到付款 </label>
     <div class="bf75"><label><input name="checkbox" type="checkbox" class="ace" id="checkbox"><span class="lbl"></span></label></div>
	</div>
 </div>
  </div>
 </div>
<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		
	}
}
//单个置顶
function zd(id){
	$(id).click(function(){
		$(this).css("background","#2c7").css("color","#fff");
	});
	
}
//全选
$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;		
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

/**发货**/
function Delivery_stop(obj,id){
	layer.open({
        type: 1,
        title: '发货',
		maxmin: true, 
		shadeClose:false,
        area : ['500px' , ''],
        content:$('#Delivery_stop'),
		btn:['确定','取消'],
		yes: function(index, layero){		
		if($('#form-field-1').val()==""){
			layer.alert('快递号不能为空！',{
               title: '提示框',				
			  icon:0,		
			  }) 
			
			}else{			
			 layer.confirm('提交成功！',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style=" display:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="已发货"><i class="fa fa-cubes bigger-120"></i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发货</span>');
		$(obj).remove();
		layer.msg('已发货!',{icon: 6,time:1000});
			});  
			layer.close(index);    		  
		  }
		
		}
	})
};

</script>
<script type="text/javascript">
    //jeDate.skin('gray');
    jeDate({
		dateCell:"#dateinfo",
		format:"YYYY-MM-DD hh:mm:ss",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2017-01-08 00:00:00",
	})

	$(document).on('click', '.changeStatus', function(){
		var status = $(this).text();
		var id = $(this).attr('id');
		var that = $(this);
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			type:'post',
			url:"{{'orderChange'}}",
			dataType:'json',
			data:{id:id, status:status},
			success:function(e){
				
				if(e.code == 1)
				{
					// if(status == '待发货')
					// {
					// 	that.text('已发货');
						
					// }else{
					// 	that.text('待发货');
					// }
					location.reload();
				}else{
					alert('状态修改有误');
					return false;
				}
			}
		})
	})
</script>
</body>
</html>