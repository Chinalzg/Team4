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
<form method="post" action="" id="listform">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
        <div class="padding border-bottom">
            <ul class="search" style="padding-left:10px;">
                <li>搜索：</li>


                <li>
                    <form action="houseshow" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" placeholder="请输入搜索关键字" name="key" class="input" style="width:250px; line-height:17px;display:inline-block" />
                    <input type="submit" class="button border-main icon-search" value="搜索">
                    </form>
                </li>
            </ul>
        </div>
        <table class="table table-hover text-center">
            <tr>
                <th width="100" style="text-align:left; padding-left:20px;">ID</th>
                <th>仓库编码</th>
                <th>仓库名称</th>
                <th>所在地区</th>
                <th>服务地区</th>
                <th>货品编号</th>
                <th>数量</th>
                <th>持有人</th>
                <th width="10%">是否启用</th>
                <th>创建时间</th>
                <th width="310">操作</th>
            </tr>

            @foreach ($data as $v)
                <tr>
                    <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
                        1</td>
                    <td>
                        {{$v->code}}
                    </td>
                    <td >
                        {{$v->name}}
                    </td>
                    <td>{{$v->service}}</td>
                    <td>{{$v->area}}</td>
                    <td>{{$v->id}}</td>
                    <td>{{$v->number}}</td>
                    <td>{{$v->name}}</td>
                    <td>
                        @if ($v->wstatus ==0)
                            未启用
                        @else
                            启用
                        @endif
                    </td>
                    <td>{{ date( "Y-m-d", + "$v->wcreate_time")}}</td>
                    <td><div class="button-group"><a class="button border-green" href="houseupdate?id={{$v->id}}"><span class="icon-exchange"></span>转移</a> <a class="button border-red" href="javascript:void(0)" onclick="return update({{$v->cid}})"><span class="icon-trash-o"></span>
                                @if ($v->wstatus ==0)
                                     启用
                                @else
                                    停用
                                @endif

                            </a> </div></td>
                </tr>

            @endforeach


            <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
                全选 </td>

            </tr>

        </table>
    </div>
</form>
<script type="text/javascript">

    //搜索
    function changesearch(){

    }

    //单个删除
    function update(id){
        if(confirm("您确定要停用吗?")){
            $.ajax({
                url:'statusupdates',
                data:{'id':id},
                type:'get',
                success:function(e){
                    alert(e);
                    history.go(0)
                }

            })
        }
    }

    //全选
    $("#checkall").click(function(){
        $("input[name='id[]']").each(function(){
            if (this.checked) {
                this.checked = false;
            }
            else {
                this.checked = true;
            }
        });
    })

    //批量删除
    function DelSelect(){
        var Checkbox=false;
        $("input[name='id[]']").each(function(){
            if (this.checked==true) {
                Checkbox=true;
            }
        });
        if (Checkbox){
            var t=confirm("您确认要删除选中的内容吗？");
            if (t==false) return false;
            $("#listform").submit();
        }
        else{
            alert("请选择您要删除的内容!");
            return false;
        }
    }

</script>
</body>
</html>