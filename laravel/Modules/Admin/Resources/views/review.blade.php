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
<form method="post" action="">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 用户评论</strong></div>
        <div class="padding border-bottom">
            <ul class="search">
                <li>
                    <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
                    <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
                </li>
            </ul>
        </div>
        <table class="table table-hover text-center">
            <tr>
                <th width="120">编号</th>
                <th>用户名</th>
                <th>商家名称</th>
                <th>类型</th>
                <th width="25%">评论对象</th>
                <th>回复内容</th>
                <th width="160">评论时间</th>
                <th>状态</th>
                <th width="200">操作</th>
            </tr>
            @foreach ($data as $v)


            <tr>
                <td>
                    <input type="checkbox" name="id[]" value="{{$v->cid}}" />

                </td>
                <td>{{$v->name}}</td>
                <td>{{$v->shopname}}</td>
                <td>商品</td>
                <td><a href="reviewshow?id={{$v->id}}">{{$v->pname}}</a></td>
                <td>{{$v->contents}}</td>
                <td>{{ date( "Y-m-d", + "$v->ctime")}}</td>
                <td>
                    @if ($v->cstatus == 1)
                        审核
                    @else
                      未审核
                    @endif
                </td>
                <td><div class="button-group"><a class="button border-main" href="reviewshow?id={{$v->cid}}"><span class="icon-eye"></span>查看详情</a> <a class="button border-red" href="javascript:void(0)" onclick="return del({{$v->cid}})"><span class="icon-trash-o"></span> 删除</a> </div></td>
            </tr>
            @endforeach
            <tr>
                <td colspan="9">
                    {{ $data->links() }}
                </td>

            </tr>
        </table>
    </div>
</form>
<script type="text/javascript">

    function del(id){
        if(confirm("您确定要删除吗?")){
            $.ajax({
            url:'commentDel',
            data:{'id':id},
            type:'get',
            success:function(e)
            {
                alert(e);
                location.reload()
            }
            })
        }
    }

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
        }
        else{
            alert("请选择您要删除的内容!");
            return false;
        }
    }

</script>
</body></html>