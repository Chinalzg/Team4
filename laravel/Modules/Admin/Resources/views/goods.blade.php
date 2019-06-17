<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>商品列表</title>
<link rel="stylesheet" href="{{ URL::asset('static/css/pintuer.css') }}">
<link rel="stylesheet" href="{{ URL::asset('static/css/admin.css') }}">
<link rel="stylesheet" href="{{ URL::asset('static/css/style.css') }}">
<!--<link rel="stylesheet" href="css/ace.min.css">-->
<script src="{{ URL::asset('static/js/pintuer.js') }}"></script>
<script src="{{ URL::asset('static/js/jquery.js') }}"></script>
<script src="{{ URL::asset('static/js/layer/layer.js') }}"></script>
</head>
<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 商品列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
			    <div class="border-b border-bno clearfix">
			      <a href="addProduct" class="button bg-yellow button-small"><span class="icon-plus"></span>添加新商品</a>
            <a href="createSku" class="button bg-yellow button-small"><span class="icon-plus"></span>生成sku</a>
            <a href="attribute" class="button bg-yellow button-small"><span class="icon-plus"></span>添加属性</a>
            <a href="attributeValue" class="button bg-yellow button-small"><span class="icon-plus"></span>添加属性值</a>
            <a href="attributeList" class="button bg-yellow button-small"><span class="icon-plus"></span>属性列表</a>
            <a href="attributeValueList" class="button bg-yellow button-small"><span class="icon-plus"></span>属性值列表</a>
			     </div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <!--<li> <a class="button border-main icon-plus-square-o" href="add.html"> 发布文章</a> </li>-->
        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:150px; line-height:17px;" onchange="changesearch()">
              <option value="">所有分类</option>
              <?php foreach ($list as $k => $v): ?>
              <option value=""><?php echo $v->name ?></option>
              <?php endforeach ?>
            </select>
          </li>
        </if>
        <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:150px; line-height:17px;" onchange="changesearch()">
              <option value="">所有仓库</option>
              <?php foreach ($warehouse as $k => $v): ?>
              <option value=""><?php echo $v->name ?></option>
              <?php endforeach ?>
            </select>
          </li>
        </if>
       <if condition="$iscid eq 1">
          <li>
            <select name="cid" class="input" style="width:100px; line-height:17px;" onchange="changesearch()">
              <option value="">所有品牌</option>
              <?php foreach ($data as $k => $v): ?>
              <option value=""><?php echo $v->name ?></option>
              <?php endforeach ?>
            </select>
          </li>
        </if>
        <if condition="$iscid eq 1">
          <li>
            <select name="is_hot" class="input" style="width:100px; line-height:17px;" onchange="changesearch()">
              <option value="">是否热门</option>
              <option value="1">热门</option>
              <option value="0">新品</option>

            </select>
          </li>
        </if>
        <if condition="$iscid eq 1">
          <li>
            <select name="supplier" class="input" style="width:100px; line-height:17px;" onchange="changesearch()">
              <option value="">供货商</option>
              <?php foreach ($supplier as $k => $v): ?>
              <option value="<?php echo $v->name ?>"><?php echo $v->name ?></option>
              <?php endforeach ?>
            </select>
          </li>
        </if>
        <if condition="$iscid eq 1">
          <li>
            <select name="is_new" class="input" style="width:100px; line-height:17px;" onchange="changesearch()">
              <option value="">是否上架</option>
              <option value="1">上架</option>
              <option value="0">下架</option>
            </select>
          </li>
        </if>
        <if condition="$iscid eq 1">
          <li>
            <select name="status" class="input" style="width:100px; line-height:17px;" onchange="changesearch()">
              <option value="">审核处理</option>
              <option value="1">审核</option>
              <option value="0">未审核</option>
            </select>
          </li>
        </if>
        <li>
          <input type="text" placeholder=""  class="input" style="width:250px; line-height:17px;display:inline-block" />
          <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 查询</a></li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">商品编号</th>
        <th>商品名称</th>
        <th>副标题</th>
        <th>货号</th>
        <th>所属分类</th>
        <th>所属品牌</th>
        <th>所属供货商</th>
        <th>所属仓库</th>
        <th>商品封面图</th>
        <th>当前售价</th>
        <th>市场售价</th>
        <th>当前库存</th>
        <th>是否免运费</th>
        <th>热门</th>
        <th>上架</th>
        <th>创建时间</th>
        <th>审核状态</th>
        <th width="310">操作</th>
      </tr>
      <?php foreach ($res as $k => $v): ?>

        <tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" /><?php echo $v->id ?></td>
          <td><?php echo $v->name ?></td>
          <td><?php echo $v->subtitle ?></td>
          <td><?php echo $v->number ?></td>
          <td><?php echo $v->category ?></td>
          <td><?php echo $v->brand ?></td>
          <td><?php echo $v->supplier ?></td>
          <td><?php echo $v->warehouse ?></td>
          <td> <img src="<?php echo $v->image ?>" alt="" style="width:50px;height:50px;"></td>
          <td><?php echo $v->price ?></td>
          <td><?php echo $v->marketPrice ?></td>
          <td><?php echo $v->stock ?></td>
          <td><?php echo $v->is_free ?></td>
          <td><?php echo $v->is_hot ?></td>
          <td><?php echo $v->is_new ?></td>
          <td><?php echo date('Y-m-d H:i:s',$v->create_time);?></td>
          <td><?php echo $v->status ?></td>
          <td>
          <div class="button-group">
          <a class="button border-yellow" href="goodsUpdate?id=<?php echo $v->id ?>"><span class="icon-edit (alias)"></span>编辑</a>
          <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $v->id ?>)"><span class="icon-trash-o"></span> 删除</a> 
          </div>
          </td>
        </tr>
        <?php endforeach ?>
        
      <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="10" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 批量删除</a> 
      </tr>
      <tr>
        <td colspan="10"><div class="pagelist"> {{ $res->links() }} </div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个删除
function del(id){
  var _this=$(this);
	if(confirm("您确定要删除吗?")){
    $.ajax({
      url:"goodsDelete",
      type:'GET',
      data:{id:id},
      success:function(res){
        alert('删除成功');
        window.location.reload();
        
      }
    })
	}
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

</script>
</body>
</html>