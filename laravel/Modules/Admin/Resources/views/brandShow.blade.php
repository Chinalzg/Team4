<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>商品列表</title>
<link rel="stylesheet" href="/static/css/pintuer.css">
<link rel="stylesheet" href="/static/css/admin.css">
<link rel="stylesheet" href="/static/css/style.css">
<!--<link rel="stylesheet" href="css/ace.min.css">-->
<script src="/static/js/jquery-3.3.1.min.js"></script>
<!-- <script src="/static/js/jquery.js"></script> -->
<script src="/static/js/pintuer.js"></script>
<script src="/static/js/layer/layer.js"></script>

</head>
<body>
<form method="post" action="" id="listform">
  @csrf
  <input type="hidden" name="_token" value="{{ csrf_token() }}">  
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 商家品牌</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
			    <div class="border-b border-bno clearfix">
			      <a href="/admin/brandadd" class="button bg-yellow button-small"><span class="icon-plus"></span> 添加品牌</a>
			     </div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li>
          <input type="text" name="key_name" class="input" style="width:250px; line-height:17px;display:inline-block" />
          <button type="submit" class="button border-main icon-search">查询</button>
          </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th style="text-align:left; padding-left:20px;">品牌ID</th>
        <th>品牌名称</th>
        <th>品牌网站</th>
        <th>品牌logo</th>
        <th>品牌描述</th>
        <th>排序</th>
        <th>品牌状态</th>
        <th>操作</th>
      </tr>
      @foreach ($data as $k => $v) 
        <tr id="{{$v->id}}">
          <td width="100" style="text-align:left; padding-left:20px;">
            <input type="checkbox" name="box" value="{{$v->id}}" />{{$v->id}}
          </td>
          <td width="150">{{$v->name}}</td>
          <td width="200">{{$v->web}}</td>
          <td width="200"><img src="{{asset('storage'.$v->logo)}}" alt="" width="200" height="120"></td>
          <!-- <td><img src="{{ asset('storage/app/public/'.$v->logo) }}" alt=""></td> -->
          <td width="600">{{$v->desc}}</td>
          <td width="50">{{$v->order}}</td>
          <td width="100">
            <?php if ($v->status == 1) { ?>
                <span class='sta' style='color:green' id="{{$v->status}}" >启用</span>
            <?php } else { ?>
                <span class='sta' style='color:red' id="{{$v->status}}" >禁用</span>
            <?php } ?>
            
          </td>
          <td><div class="button-group"><a class="button border-main" href="/admin/brandupdate?id={{$v->id}}">
          <span class="icon-edit (alias)"></span>编辑</a>
          <a class="button border-red del" href="javascript:;">
          <span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
      @endforeach
        
      <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="10" style="text-align:left;padding-left:20px;">
          <a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="del_all()"> 批量删除</a> 
      </tr>
      <tr>
        <td colspan="8">
          <div class="pagelist">{{$data->links()}}</div>
        </td>
      </tr>
    </table>
  </div>
</form>

<script type="text/javascript">

//全选
$("#checkall").click(function(){ 
  $("input[name='box']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})


//单删
$('.del').click(function()
{
    var id = $(this).parents('tr').attr('id');
    var _this = $(this);
    var r = confirm('确定要删除吗');
    if(r == true) {
        $.ajax({ 
            url: "branddel",
            data:{id:id},
            success: function(data){
                if(data==1) {
                    alert('删除成功');
                    _this.parents('tr').remove();
                } else {
                    alert('删除失败');
                }
            }
        });
    }
})


//批量删除
function del_all()
{      
    var Checkbox=false;
	  $("input[name='box']").each(function(){
    	  if (this.checked==true) {		
    		    Checkbox=true;	
    	  }
	  });
	  if (Checkbox){
		    var t=confirm("您确认要删除选中的内容吗？");
		    if (t==false) {
            return false;		
        }else{
            var  box = $("input[name='box']");
            length =box.length;
            var str ="";
            for(var i=0;i<length;i++){
                if(box[i].checked==true){
                    str =str+","+box[i].value;
                }
            }
            str = str.substr(1);
            $.ajax({
                url:"branddelall",
                data:{str:str},
                success: function(data){
                    if(data==1) {
                        alert('删除成功');
                        for(var i=box.length-1;i>=0;i--){
                          if(box[i].checked==true){
                            box[i].parentNode.parentNode.remove();
                          }
                        }
                    } else {
                        alert('删除失败');
                    }
                }
            })
        }	
	  }else{
    		alert("请选择您要删除的内容!");
    		return false;
	  }
}


//即点即改————品牌状态
$('.sta').click(function(){
    var id = $(this).parents('tr').attr('id');
    var status = $(this).attr('id');
    var _this = $(this);
    $.ajax({ 
        url: "brandupdsta",
        data:{id:id, status:status},
        success: function(data){
            if(data != 0) {
                alert('操作成功');
                if(data == 2){
                    _this.html('禁用');
                    _this.attr('style', 'color:red');
                    _this.attr('id', '2');
                }else{
                    _this.html('启用');
                    _this.attr('style', 'color:green');
                    _this.attr('id', '1');
                }
            } else {
                alert('操作失败');
            }
    }});
})


</script>
</body>
</html>