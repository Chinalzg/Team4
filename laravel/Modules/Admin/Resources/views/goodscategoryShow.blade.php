<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/static/css/pintuer.css">
<link rel="stylesheet" href="/static/css/admin.css">
<script src="/static/js/jquery-3.3.1.min.js"></script>
<script src="/static/js/jquery.js"></script>
<script src="/static/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 分类管理</strong></div>
  <div class="padding border-bottom">
    <a class="button border-yellow" href="cateedit-1.html"><span class="icon-plus-square-o"></span> 添加分类</a>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th>分类名称</th>
      <th>分类编码</th>
      <th>分类状态</th>
      <th width="310">操作</th>
    </tr>
    <tbody id="tb">
    <?php foreach ($data as $k => $v) { ?>
        <tr id="<?php echo $v['id'] ?>" pid="<?php echo $v['pid'] ?>" >
          <td width="700px"><span class="icon-plus-square padding-right text-main zhankai"></span><?php echo $v['name'] ?></td>
          <td width="100px"><?php echo $v['code'] ?></td>
          <td width="100px">
              <?php if ($v['status'] == 1) { ?>
                  <span class='sta' style='color:green' id="<?php echo $v['status'] ?>" >启用</span>
              <?php } else { ?>
                  <span class='sta' style='color:red' id="<?php echo $v['status'] ?>" >禁用</span>
              <?php } ?>
          </td>
          <td>
            <div class="button-group">
              <a class="button border-main" href="/admin/goodscategoryupdate?id=<?php echo $v['id'] ?>"><span class="icon-edit"></span> 编辑</a> 
              <a class="button border-red del" href="javascript:;">
          <span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
        <?php foreach ($v['child'] as $key => $val) { ?>
            <tr class="hidden-tr" style="display: none;" id="<?php echo $val['id'] ?>" pid="<?php echo $val['pid'] ?>">

              <td width="700px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <?php echo $val['name'] ?></td>
              <td width="100px"><?php echo $val['code'] ?></td>
              <td width="100px">
                <?php if ($val['status'] == 1) { ?>
                    <span class='sta' style='color:green' id="<?php echo $val['status'] ?>" >启用</span>
                <?php } else { ?>
                    <span class='sta' style='color:red' id="<?php echo $val['status'] ?>" >禁用</span>
                <?php } ?>
              </td>
              <td><div class="button-group"><a class="button border-main" href="/admin/goodscategoryupdate?id=<?php echo $val['id'] ?>"><span class="icon-edit"></span> 编辑</a>
               <a class="button border-red del" href="javascript:;">
              <span class="icon-trash-o"></span> 删除</a>  </div></td>
          </tr>
        <?php } ?>
    <?php } ?>
    </tbody>
    
  </table>
</div>
<script type="text/javascript">
$('.del').click(function()
{
    var id = $(this).parents('tr').attr('id');
    var _this = $(this);
    var r = confirm('确定要删除吗');
    if(r == true) {
        $.ajax({ 
            url: "goodscategorydel",
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
$(function(){
	$(".zhankai").click(function(){
    var this_pid = $(this).parents('tr').attr('id');
    $("#tb tr").each(function(){
        var pid = $(this).attr('pid');
        if( this_pid == pid ){
          $(this).toggle();
        }
    });
    // console.log(pids);
		// $(this).parent().parent().next(".hidden-tr").toggle();
    // var pid = [];
    // var trLength = $(this).parent().parent().nextAll("tr").length;
	});
	
});

//即点即改————品牌状态
$('.sta').click(function(){
    var id = $(this).parents('tr').attr('id');
    var status = $(this).attr('id');
    var _this = $(this);
    $.ajax({ 
        url: "goodscategoryupdsta",
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