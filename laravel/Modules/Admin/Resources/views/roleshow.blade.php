@extends('admin::layouts.master')

@section('content')
    <body>
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 个人角色信息展示</strong></div>
        <div class="padding border-bottom">
            <ul class="search" style="padding-left:10px;">
                <li> <a class="button border-main icon-plus-square-o" href="{{'roleAdd'}}"> 添加管理员</a> </li>
            </ul>
        </div>
        <table class="table table-hover text-center">
            <tr>
                <th>角色ID</th>
                <th>角色名称</th>
                <th>拥有权限</th>
                <th width="150">操作</th>
            </tr>
            @foreach($data as $k=>$v)
                <tr nid="<?= $v['id']?>">
                    <td><?= $v['id']?></td>
                    <td style="color: red"><?= $v['role_name']?></td>
                    <td>
                        <select>
                            @foreach($v['power'] as $key=>$val)
                                <option value=""><?= $val->power_name?></option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div class="button-group">
                            <a class="button border-red del" href="#"><span class="icon-trash-o"></span>删除</a>
                            <a class="button border-main" href="{{"roleSon?id=$v[id]"}}">角色成员列表</a>
                            <a class="button border-main" href='{{"roleUpd?id=$v[id]"}}'><span class="icon-edit (alias)"></span>编辑</a>
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
    </body>
    <script>
        $(document).on('click','.del',function () {
            var id=$(this).parents('tr').attr('nid');
            var that=$(this);
            $.ajax({
                url:"{{'roleDel'}}",
                data:{
                    id:id
                },
                dataType:"json",
                success:function (e) {
                    if(e==201){
                        alert("没有此权限");
                    }else if(e.code==200){
                        alert(e.msg);
                        that.parents('tr').remove();
                    }else{
                        alert(e.msg);
                    }
                }
            })
        })
    </script>
@stop



