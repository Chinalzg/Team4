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
<script type="text/javascript" src="/static/jeDate/jedate.js"></script>
</head>
<body>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span> 增加活动</strong></div>
  <div class="body-content">
    <form class="form-x" method="post" action="{{'activityInsert'}}">
                    <div class="form-group">
                      <div class="label">
                        <label>活动名称：</label>

                      </div>
                      <div class="field">
                        <input type="text" class="input" name="title" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="label">
                        <label>活动分类：</label>
                      </div>
                      <div class="field">
                        <select class="input" name="activity_id">
                          @foreach($type as $k=>$t)
                          <option value="{{$t['id']}}">{{$t['activity_name']}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                     <div class="form-group">
                      <div class="label">
                        <label>活动商品：</label>
                      </div>
                      <div class="field">
                        <select class="input" name="goods_id">
                          @foreach($goods as $k=>$g)
                          <option value="{{$g->id}}">{{$g->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="label">
                        <label>活动内容：</label>

                      </div>
                      <div class="field">
                        <input type="text" class="input" name="content" />
                      </div>
                    </div>
                    
                    
                    <div class="form-group">
                      <div class="label">
                        <label>活动起始日期：</label>
                      </div>
                      <input type="hidden" name="_token" value="{{ csrf_token()}}">
                      <div class="field field-tsa">
                        <input type="text" class="input w50" id="dateinfo" name="start_time" />
                        <div class="clear"></div>
                        <p>只有当前时间介于起始日期和截止日期之间时，此类型的红包才可以发放</p>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="label">
                        <label>活动结束日期：</label>
                      </div>
                      <div class="field">
                        <input type="text" class="input w50" id="dateinfoa" name="end_time" />
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="field margin-large-top text-center">
                        
                        <input type="submit" value="确定" class="button bg-green">
                        <input type="reset" value="重置" class="button bg-red">  
                      </div>
                    </div>
                    
                  </form>
                       @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  </div>
</div>
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
</body></html>