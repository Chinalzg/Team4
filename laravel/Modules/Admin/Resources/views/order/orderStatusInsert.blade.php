<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title></title>

<link rel="stylesheet" href="/static/css/pintuer.css">
<link rel="stylesheet" href="/static/css/admin.css">
<script src="/static/js/jquery.js"></script>
<script src="/static/js/pintuer.js"></script>
<script type="text/javascript" src="/static/jeDate/jedate.js"></script>
</head>
<body>
<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span> 添加订单状态</strong></div>
  <div class="body-content">
    <form class="form-x" method="post" action="{{'orderStatusInsert'}}">
    	<div class="padding border-bottom margin-big-bottom">
      
       订单状态
       	<input type="hidden" name="_token" value="{{csrf_token()}}">
         <input type="text" placeholder="" class="input" style="width:250px; line-height:17px;display:inline-block" name="order_status">
        <input type="submit" value="添加" class="button bg-green">	
        
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
</script>
</body></html>