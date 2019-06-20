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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>仓库添加</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="housesave">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        <div class="label">
          <label>仓库名称: </label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="name" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>所在地区</label>
        </div>
        <div class="field">
          <select name="area" class="input w50">
            <option value="">请选择地区</option>
            @foreach ($data as $v)
              <option value="{{$v->city}}">{{$v->city}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>服务地区</label>
        </div>
        <div class="field">
          <select name="service" class="input w50">
            <option value="">请选择地区</option>
            @foreach ($data as $v)
              <option value="{{$v->city}}">{{$v->city}}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>是否启用：</label>
        </div>
        <div class="field">
          <div class="product-mulde product-mulde-a">
            <ul>
              <li><input type="radio" name="status" value="1" ><label>是</label><input type="radio" name="status"checked value="0"><label>否</label>
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
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </form>
  </div>
</div>
</body></html>