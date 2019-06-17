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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>编辑内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">  
      <div class="form-group">
        <div class="label">
          <label>分类名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="name" placeholder="<?php echo $data['name'] ?>" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>分类编码：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="code" placeholder="<?php echo $data['code'] ?>" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>上级分类：</label>
        </div>
        <div class="field">
          <select name="pid" class="input w50">
            <option value="0">顶级分类</option>
            @foreach ($res as $k => $v)
              <?php if($data['pid'] == $v->id){ ?>
                  <option value="{{$v->id}}" selected="">
                    |<?php echo str_repeat('--', $v->level)?>{{$v->name}}
                  </option>
              <?php }else{?>
                  <option value="{{$v->id}}">
                    |<?php echo str_repeat('--', $v->level)?>{{$v->name}}
                  </option>
              <?php } ?>  
                
            @endforeach
          </select>
          
          <div class="tips">不选择上级分类默认为一级分类</div>
        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label>品牌状态：</label>
        </div>
        <div class="field">
          <div class="product-mulde product-mulde-a">
                    <ul>
                      <li><input type="radio" name="status" value="1"><label>启用</label>
                          <input type="radio" name="status" value="2"><label>禁用</label>
                      </li>
                    </ul>
                  </div>
        </div>
        </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>