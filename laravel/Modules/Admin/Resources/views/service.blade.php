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
<form method="get" action="">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
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
                <th width="120">ID</th>
                <th>姓名</th>
                <th>电话</th>
                <th>邮箱</th>
                <th>其他</th>
                <th width="25%">状态</th>
                <th width="120">留言时间</th>
                <th>操作</th>
            </tr>
        @foreach ($data as $v)
            <tr>
                <td><input type="checkbox" name="id[]" value="" />
                   </td>
                <td>{{$v->name}}</td>
                <td>13420925611</td>
                <td>564379992@qq.com</td>
                <td>深圳市民治街道</td>
                <td>
                    @if ($v->status == 1)
                        回复
                    @else
                        未回复
                    @endif
                    </td>
                <td>2016-07-01</td>
                <td><div class="button-group"><a class="button border-main" href="serviceshow?id={{$v->fid}}"><span class="icon-eye"></span>查看详情</a> <a class="button border-red" href="javascript:void(0)" onclick="return del({{$v->fid}})"><span class="icon-trash-o"></span> 删除</a> </div></td>
            </tr>
            @endforeach

                
        </table>
    </div>
</form>
<script type="text/javascript">

    function del(id){
        if(confirm("您确定要删除吗?")){

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