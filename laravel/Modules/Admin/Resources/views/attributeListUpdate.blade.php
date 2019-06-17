<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>添加商品</title>
<link rel="stylesheet" href="{{ URL::asset('static/css/pintuer.css') }}">
<link rel="stylesheet" href="{{ URL::asset('static/css/admin.css') }}">
<link rel="stylesheet" href="{{ URL::asset('static/js/umeditor/themes/default/css/umeditor.css') }}">
<link rel="stylesheet" href="{{ URL::asset('static/css/style.css') }}">
<!--<link rel="stylesheet" href="css/ace.min.css">-->
<script src="{{ URL::asset('static/js/jquery.js') }}"></script>
<script src="{{ URL::asset('static/js/pintuer.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('static/jeDate/jedate.js') }}"></script>
</head>
<body>
  <div class="panel admin-panel">
      <div class="panel-head"><strong class="icon-reorder"> 添加属性</strong></div>
    	<div class="tab-box">
							<div class="tab-panel" id="tab-b">
								<div class="common-info">
									<form class="form-x" method="post" action="attributeUpdateCheck">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="<?php echo $result[0]->id ?>">
										<div class="form-group">
											<div class="label">
												<label>属性名称：</label>
											</div>
											<div class="field">
												<input type="text" class="input" name="name" value="<?php echo $result[0]->name ?>"/>
											</div>
										</div>
										
										<div class="form-group">
											<div class="label">
												<label>所属分类：</label>
											</div>
											<div class="field">
												<select class="input" name="category">
													<option value="">请选择分类</option>
													<?php foreach ($list as $k => $v): ?>
													<option value="<?php echo $v->name ?>"><?php echo $v->name ?></option>
													<?php endforeach;?>
												</select>
												<p></p>
										</div>

										<div class="form-group">
											<div class="label">
												<label>前台是否显示：</label>
											</div>
											<div class="field">
												<select class="input" name="status">
													<option value="1">是</option>
													<option value="0">否</option>
												</select>
											</div>
										</div>
                                <div class="field margin-large-top text-center">
							          <button class="button bg-green">确定</button>
							          <button class="button bg-red">重置</button>
											</div>
										</div>
									</form>
								</div>
							</div>



<script type="text/javascript">
	$(function(){
  $(":radio").click(function(){
    if($(this).val()=="默认"){
    $(this).parent().children("p").text("使用系统默认的价格模式,统一使用一样的价格");
    }else if($(this).val()=="仓库"){
    	 $(this).parent().children("p").text("使用仓库的价格模式,根据不同仓库调取不同价格");
    }else{
    	 $(this).parent().children("p").text("使用地区的价格模式,根据不同地区调取不同价格");
    }
  });
 });
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="js/umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="js/umeditor/umeditor.min.js"></script>
<script type="text/javascript" charset="utf-8" src="js/umeditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
    var umMonth = UM.getEditor('editor-year');
    $('select').select();
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
    jeDate({
		dateCell:"#dateinfoa",
		format:"YYYY-MM-DD hh:mm:ss",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2017-01-08 00:00:00",
	})
    jeDate({
		dateCell:"#dateinfob",
		format:"YYYY-MM-DD hh:mm:ss",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2017-01-08 00:00:00",
	})
    jeDate({
		dateCell:"#dateinfoc",
		format:"YYYY-MM-DD hh:mm:ss",
		isinitVal:true,
		isTime:true, //isClear:false,
		minDate:"2017-01-08 00:00:00",
	})
</script>
</body>
</html>



  