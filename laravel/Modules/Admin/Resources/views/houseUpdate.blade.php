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
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 转移商品</strong></div>
    <form method="post" class="form-x margin-large-top" action="houseupdate">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h4 class="padding-large-left">什么是转移商品分类?</h4>
        <p class="padding-large-left">在添加商品或者在商品管理中,如果需要对商品的分类进行变更,那么你可以通过此功能,正确管理你的商品分类。</p>
        <div class="form-group">
            <div class="label">
                <label>从此仓库</label>
            </div>
            <div class="field">
                <input type="text" name="name" value="{{$res->wname}}" class="input w50"  />
            </div>
        </div>

        <div class="form-group">
            <div class="label">
                <label>商品名称</label>
            </div>
            <div class="field">
                <input type="hidden" name="wid" id="id" value="{{$res->wid}}">
                <input type="hidden" mame="g_id" value="{{$res->g_id}}">
                <input type="text" value="{{$res->pname}}" class="input w50"  />
            </div>
        </div>

        <div class="form-group">
            <div class="label">
                <label>商品数量</label>
            </div>
            <div class="field">
                <input type="text" name="number" id="number"  class="input w50"  />
            </div>
        </div>
        <div class="form-group">
            <div class="label">
                <label>转移到</label>
            </div>
            <div class="field">
                <select name="zname" class="input w50">
                    <option value="">请选择仓库</option>

                    @foreach ($data as $v)
                        @if ($v->name==$res->wname)

                        @else
                            <option value="{{$v->code}}">{{$v->name}}</option>
                        @endif

                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="label">
                <label></label>
            </div>
            <div class="field">
                <input type="submit" class="button bg-green" value="开始转移">
                <input type="reset" class="button bg-red" value="重置">
            </div>
        </div>
    </form>
</div>
</body>
<script>
    $('#number').blur(function(){
        var number = $('#number').val();

        var wid = $('#id').val();

        $.ajax({
            url:'housenumber',
            data:{'wid':wid , 'number':number},
            type:'get',
            success:function(e){
              if (e=='超出库存') {
                  alert(e);
                  history.go(0);
              }
            }
        })

    })
</script>
</html>