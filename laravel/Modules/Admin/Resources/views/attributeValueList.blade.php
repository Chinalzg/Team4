<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>属性管理</title>
<link rel="stylesheet" href="{{ URL::asset('static/css/pintuer.css') }}">
<link rel="stylesheet" href="{{ URL::asset('static/css/admin.css') }}">
<link rel="stylesheet" href="{{ URL::asset('static/css/style.css') }}">
<!--<link rel="stylesheet" href="css/ace.min.css">-->
<script src="{{ URL::asset('static/js/jquery.js') }}"></script>
<script src="{{ URL::asset('static/js/pintuer.js') }}"></script>
<script src="{{ URL::asset('static/js/layer/layer.js') }}"></script>
</head>
<body>
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 属性管理</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="amounts_style">
			    <div class="border-b clearfix">
			      <span class="l_f">
			      <a href="attributeValue" class="button bg-yellow button-small"><span class="icon-plus"></span>添加属性值</a>
			       </span>
			       <span class="r_f">共：<b>5</b>类</span>
			     </div>
			 </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="80" style="text-align:left; padding-left:20px;">请选择</th>
        <th>属性值名称</th>
        <th width="300">是否前台显示</th>
        <th width="300">创建时间</th>
        <th width="210">操作</th>
      </tr>
      @foreach ($list as $v)
        <tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
           </td>
          <td>{{$v->attribute_val}}</td>
          <td>
          @if($v->status==1)
          是
          @else
          否
          @endif
          </td>
          <td><?php echo date('Y-m-d H:i:s',$v->create_time); ?></td>
          <td>
          <div class="button-group">
          <a class="button border-main" href="attributeValueUpdate?id={{$v->id}}"><span class="icon-edit (alias)"></span> 编辑</a> 
          <a class="button border-red" href="javascript:void(0)" onclick="Competence_del({{$v->id}})"><span class="icon-trash-o"></span> 删除</a> 
          </div>
          </td>
        </tr>
      @endforeach
      <tr>
        <td colspan="8"><div class="pagelist"></div></td>
      </tr>
    </table>
  </div>
<script type="text/javascript">




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

function Competence_del(id){
	layer.confirm('确认要删除吗？',function(index){
        // alert(id);
	$.ajax({
      url:"attributeValueDelete",
      type:'GET',
      data:{id:id},
      success:function(res){
        alert('删除成功');
        window.location.reload();
        
      }
    })
	});
}











</script>
</body>
</html>