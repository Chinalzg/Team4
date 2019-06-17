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
      <div class="panel-head"><strong class="icon-reorder"> 添加新商品</strong></div>
    	<div class="tab-box">
							<div class="tab-panel" id="tab-b">
								<div class="common-info">
									<form class="form-x" method="post" action="goodsUpdateCheck" enctype="multipart/form-data">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="<?php echo $result[0]->id ?>">
										<div class="form-group">
											<div class="label">
												<label>商品名称：</label>
											</div>
											<div class="field">
												<input type="text" class="input" name="name" value="<?php echo $result[0]->name ?>"/>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>副标题：</label>
											</div>
											<div class="field">
												<input type="text" class="input" name="subtitle" value="<?php echo $result[0]->subtitle ?>"/>
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
												<label>所属品牌：</label>
											</div>
											<div class="field">
												<select class="input" name="brand">
													<option value="">请选择品牌</option>
													<?php foreach ($data as $k => $v): ?>
													<option value="<?php echo $v->name ?>"><?php echo $v->name ?></option>
													<?php endforeach;?>
												</select>
											</div>
										</div>

										<div class="form-group">
											<div class="label">
												<label>所属仓库：</label>
											</div>
											<div class="field">
												<select class="input" name="warehouse">
													<option value="">请选择仓库</option>
													<?php foreach ($resu as $k => $v): ?>
													<option value="<?php echo $v->name ?>"><?php echo $v->name ?></option>
													<?php endforeach;?>
												</select>
											</div>
										</div>

										<div class="form-group">
											<div class="label">
												<label>选择供货商：</label>
											</div>
											<div class="field">
												<select class="input" name="supplier">
													<option value="">请选择供货商</option>
													<?php foreach ($res as $k => $v): ?>
													<option value="<?php echo $v->name ?>"><?php echo $v->name ?></option>
													<?php endforeach;?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>是否热门：</label>
											</div>
											<div class="field">
												<select class="input" name="is_hot">
													<option value="1">是</option>
													<option value="0">否</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>是否上架：</label>
											</div>
											<div class="field">
												<select class="input" name="is_new">
													<option value="1">是</option>
													<option value="0">否</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>本店售价：</label>
											</div>
											<div class="field">
												<input type="text" class="input" name="price" value="<?php echo $result[0]->price ?>"/>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>库存：</label>
											</div>
											<div class="field">
												<input type="text" class="input" name="stock" value="<?php echo $result[0]->stock ?>"/>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>会员价格：</label>
											</div>
											<div class="field field-ts">
												<label>普通用户</label><input type="text" class="input"  name="common" value="<?php echo $result[0]->common ?>"/>
												<label>铜牌</label><input type="text" class="input" name="copper" value="<?php echo $result[0]->copper ?>"/>
												<label>银牌</label><input type="text" class="input" name="sliver" value="<?php echo $result[0]->sliver ?>"/>
												<label>金牌</label><input type="text" class="input" name="gold" value="<?php echo $result[0]->gold ?>"/>
												<div class="clear"></div>
												<p>会员价格为-1时表示会员价格按会员等级折扣率计算。你也可以为每个等级指定一个固定价格</p>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>商品优惠价格：</label>
											</div>
											<div class="field field-ts">
												<label>优惠数量</label><input type="text" class="input"  name="discounts" value="<?php echo $result[0]->discounts ?>"/>
												<label>优惠价格</label><input type="text" class="input" name="discountsPrice" value="<?php echo $result[0]->discountsPrice ?>"/>
												<div class="clear"></div>
												<p>会员价格为-1时表示会员价格按会员等级折扣率计算。你也可以为每个等级指定一个固定价格</p>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>市场售价：</label>
											</div>
											<div class="field">
												<input type="text" class="input" name="marketPrice" value="<?php echo $result[0]->marketPrice ?>"/>
											</div>
										</div>

										<div class="form-group">
											<div class="label">
												<label>促销日期：</label>
											</div>
											<div class="field field-ts">
												<label>开始日期</label><input type="date" class="input" style="width: 165px;"  id="dateinfo" name="start_time" value="<?php echo $result[0]->start_time ?>"/>
												<label>结束日期</label><input type="date" class="input" style="width: 165px;" id="dateinfoa" name="end_time" value="<?php echo $result[0]->end_time ?>"/>
												<div class="clear"></div>
											</div>
										</div>
										<div class="form-group">
											<div class="label">
												<label>限购：</label>
											</div>
											<div class="field">
												<input type="text" class="input" name="purchase" value="<?php echo $result[0]->purchase ?>"/>
											</div>
										</div>

										<div class="form-group">
											<div class="label">
												<label>是否为免运费商品：</label>
											</div>
											<div class="field margin-small-top">
												<label><input type="checkbox"  name="is_free" value="1"/>打勾表示此商品不会产生运费花销，否则按照正常运费计算。</label>
											</div>
										</div>



										<div class="form-group">
											<div class="label">
												<label>上传商品图片：</label>
											</div>
											<div class="field">
							          <input type="text" id="url1" name="slogo" class="input tips" style="width:25%; float:left;" value="" data-toggle="hover" data-place="right" data-image="" title="">
							          <input type="file" class="button bg-blue margin-left" id="image1" value="+ 浏览上传" name="img">

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



  