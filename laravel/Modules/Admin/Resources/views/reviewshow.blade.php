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
	<script src="/static/js/jquery.js"></script>
	<script src="/static/js/pintuer.js"></script>
</head>
<body>
<form method="get" action="commentReply" class="form-x">
  <div class="panel admin-panel">
    	<div class="panel-head"><strong class="icon-reorder">评论详情</strong></div>

    	<div class="discuss">
    		<div class="discuss-top">
    			<span class="text-main">{{$data['0']->name}}</span>于2016-03-09 09:46:39对<span class="text-red">{{$data[0]->pname}}</span>发表评论
    		</div>
    		<div class="discuss-detail">
    			<p>{{$data['0']->content}}</p>
    			<div class="discuss-imgbox">
					@foreach ($image as $v)
						<img src="/static/images/{{$v}}" alt="未上传图片"/>
					@endforeach
    			</div>
    			<div class="discuss-bottom">
    				评论等级: 5  IP地址: 127.0.0.1
    			</div>
    			<div class="text-center">
					<input type="hidden"  id="id" name="id" value="{{$data['0']->cid}}">
					<input type="button"  id="display" class="button bg-main" value="允许显示">

    			</div>
    		</div>

    		<div class="hf-dis">
    			<p>回复评论</p>
    			<div class="form-group">
    				<div class="label">
    					用户名：
    				</div>
    				<div class="field">
    					<input type="text" value="{{$data[0]->name}}" name="shop_name" readonly="readonly" class="input"/>
    				</div>
    			</div>

    			<div class="form-group">
    				<div class="label">
    					回复内容：
    				</div>
    				<div class="field">
    					<textarea name="contents" class="input" id="contents"  style="width: 500px; height:100px;"  ></textarea>
    				</div>
    			</div>

    			<div class="form-group text-center">
    				<div class="label">
    				</div>
    				<div class="field">
						<input type="submit" class="button bg-green" value="确定">
						<input type="reset" class="button bg-red" value="重置">
				  </div>
    			</div>
    		</div>
    	</div>
  </div>
</form>
</body>

</html>
<script>
    $('#display').click(function(){
      var id=$('#id').val();

      var contents=$('#contents').val();
      $.ajax({
		  url:'reviewupdate',
		  type:'GET',
		  data:{'id':id },
		  success:function(e){
			 alert('已审核');
		  }
	  })
    })
</script>