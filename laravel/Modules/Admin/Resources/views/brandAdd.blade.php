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
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加品牌</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">    
      <div class="form-group">
        <div class="label">
          <label>品牌名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="name" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>品牌网址：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="web" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>品牌LOGO：</label>
        </div>
        <div class="field">
        <div style="padding-top:10px;"><input type="file" name="logo" accpet="image/gif,image/png,image/jpeg,image/jpg,image/bmp"></div>
					<div class="clear"></div>
				</div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>品牌描述：</label>
        </div>
        <div class="field">
          <textarea class="input" name="desc"></textarea>
        </div>
      </div>
      <div class="form-group">
      	<div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
      		<input type="text" class="input" name="order" />
   			</div>
        </div>
        <div class="form-group">
      	<div class="label">
          <label>品牌状态：</label>
        </div>
        <div class="field">
      		<div class="product-mulde product-mulde-a">
						      	<ul>
						      		<li>
                          <input type="radio" name="status" value="1"><label>启用</label>
                          <input type="radio" name="status" value="2"><label>禁用</label>
						      		</li>
						      	</ul>
						      </div>
   			</div>
        </div>
      <div class="form-group">
        <div class="text-center">
						<div class="field">
              <input type="submit" class="button bg-green" value="确定">
              <input type="reset" class="button bg-red" value="重置">
						</div>
				</div>
      </div>
    </form>
  </div>
</div>
</body></html>