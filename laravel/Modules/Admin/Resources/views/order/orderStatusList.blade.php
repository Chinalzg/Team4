<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>店铺列表</title>
<link rel="stylesheet" href="/static/css/pintuer.css">
<link rel="stylesheet" href="/static/css/admin.css">
<link rel="stylesheet" href="/static/css/style.css">
<!--<link rel="stylesheet" href="css/ace.min.css">-->
<script src="/static/js/jquery.js"></script>
<script src="/static/js/pintuer.js"></script>
</head>
<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 订单状态列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="add-product-2.html"> 添加订单状态</a> </li>
        <li>活动名称</li>
        <li>
          <input type="text" placeholder="活动名称" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
        </li>
        <li>店铺名称</li>
        <li>
          <input type="text" placeholder="店铺名称" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
        </li>
        <li>
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 查询</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th>编号</th>
        <th>订单状态名称</th>
        
        <th width="250">操作</th>
      </tr>
      @foreach($list as $k=>$v)
        <tr>
          <td>{{$v['id']}}
           </td>
          <td>{{$v['order_status']}}</td>
          
          <td><div class="button-group"><a class="button border-main" href="{{'orderStatusUpdate'}}?id={{$v['id']}}"><span class="icon-edit"></span> 编辑</a><a class="button border-red" href="javascript:void(0)" onclick="return del({{$v['id']}})"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
        @endforeach
      <tr>
        <td colspan="10"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">


//单个删除
function del(id){
	if(confirm("您确定要删除吗?")){
		$.ajax({
			type:'get',
			url:"{{'orderStatusDelete'}}",
			data:{id:id},
			dataType:'json',
			success:function(e){
				if(e.code==1){
					alert('删除成功');
					location.reload();
					return true;
				}else{
					alert('删除失败，请重试!');
					return false;
				}
			}
		})
	}

}





</script>
</body>
</html>



