@extends('admin::layouts.master')

@section('content')
<body>
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 个人菜单展示</strong></div>
        <div class="padding border-bottom">
            <ul class="search" style="padding-left:10px;">
                <li> <a class="button border-main icon-plus-square-o" href="{{'menuAdd'}}"> 添加菜单</a> </li>
            </ul>
        </div>
        <table class="table table-hover text-center">
            <tr>
                <th>菜单ID</th>
                <th>菜单名称</th>
                <th>父菜单ID</th>
                <th>父菜单名称</th>
                <th>是否显示</th>
                <th width="150">操作</th>
            </tr>
            @foreach($data as $k=>$v)
            <tr nid="<?= $v['id']?>">
                <td><?= $v['id']?></td>
                <td style="color: red"><?= $v['power_name']?></td>
                <td><?= $v['pid']?></td>
                <td>顶级菜单</td>
                @if($v['status'] == 1)
                <td>显示</td>
                @else
                <td>不显示</td>
                @endif
                <td>
                    <div class="button-group">
                        <a class="button border-main show" href="#">查看子菜单</a>
                        <a class="button border-red del" href="#"><span class="icon-trash-o"></span>删除</a>
                        <a class="button border-main" href='{{"menuUpd?id=$v[id]"}}'><span class="icon-edit (alias)"></span>编辑</a>
                    </div>
                </td>
            </tr>
            @endforeach

        </table>
    </div>


</body>

<script>

    $(document).on('click','.unshow',function () {

        var id = $(this).parents('tr').attr('nid');
        var cid = $('.'+id+'').last().attr('nid');
        $('.'+id+'').remove();
        $('.'+cid+'').remove();
        $(this).removeClass('unshow')
        $(this).addClass('show')
        $(this).text('查看子菜单')

    })

    $(document).on('click','.show',function () {

        var id = $(this).parents('tr').attr('nid');
        var that = $(this);

        $.ajax({
            'url':"{{'childPower'}}",
            data:{
                id:id
            },
            dataType:"json",
            success:function (e) {
                console.log(e);
                var arr=e.data;
                var str='';
                if(e.code==200){
                    $(arr).each(function (k,v){
                        str += '<tr class='+v.pid+' nid='+v.id+' id="son'+v.id+'">';
                        str += '<td>'+v.id+'</td>';
                        str += '<td>'+v.power_name+'</td>';
                        str += '<td>'+v.pid+'</td>';
                        str += '<td>'+e.info.power_name+'</td>';

                        if(v.status==1){
                            str += '<td>显示</td>';
                        }else{
                            str += '<td>不显示</td>';
                        }
                        str += '<td>';
                        str += '<div class="button-group">';
                        str += '<a class="button border-main show" href="#">查看子菜单</a>';
                        str += '<a class="button border-red del" href="#"><span class="icon-trash-o"></span>删除</a>';
                        str += '<a class="button border-main" href="menuUpd?id='+v.id+'"><span class="icon-edit (alias)"></span>编辑</a>';
                        str +='</div>';
                        str += '</td>';
                        str += '</tr>';
                    });
                    that.parents('tr').after(str)
                    that.removeClass('show')
                    that.addClass('unshow')
                    that.text('收起菜单')
                }else if(e.code==201){
                    alert(e.msg);
                }else{
                    alert("网络错误");
                }
            }
        })
    })

    $(document).on('click','.del',function () {
        var id = $(this).parents('tr').attr('nid');
        $.ajax({
            url:"{{'menuDel'}}",
            data:{
                id:id
            },
            dataType:"json",
            success:function (e) {
                if(e == 201)
                {
                    alert("您没有此权限")
                }else if(e.code==202){
                    alert(e.msg);
                }else if(e.code==203){
                    alert(e.msg);
                }else{
                    alert(e.msg);
                    $("#son"+id).remove();
                }
            }
        })
    })
</script>

@stop



