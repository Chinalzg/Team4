@extends('admin::layouts.master')

@section('content')
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 添加菜单</strong></div>
    <form method="post" class="form-x margin-large-top" action="{{'menuAdds'}}">
        <div class="form-group">
            <div class="label">
                <label>菜单名称：</label>
            </div>
            <div class="field">
                <input type="text" name="power_name" class="input w50"  />
            </div>
        </div>
        <div class="form-group">
            <div class="label">
                <label>控制器名称：</label>
            </div>
            <div class="field">
                <input type="text" name="controller_name" class="input w50"  />
            </div>
        </div>
        <div class="form-group">
            <div class="label">
                <label>方法名称：</label>
            </div>
            <div class="field">
                <input type="text" name="action_name" class="input w50"  />
            </div>
        </div>
        <div class="form-group">
            <div class="label">
                <label>所属菜单：</label>
            </div>

            <div class="field">
                <select name="pid" id="">
                    <option value="0">顶级菜单</option>
                    @foreach($data as $k=>$v)
                    <option value="{{$v['id']}}"><?= str_repeat('--',$v['level']),$v['power_name']?></option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="form-group">
            <div class="label">
                <label>是否显示：</label>
            </div>
            <div class="field">
                <div class="product-mulde product-mulde-a">
                    <ul>
                        <li><input type="radio" name="status" value="1"><label>是</label><input type="radio" name="status" value="0"><label>否</label>
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
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button class="button bg-green" type="submit">确定</button>
                <button class="button bg-red" type="reset">重置</button>
            </div>
        </div>
    </form>
</div>
</body>
@stop