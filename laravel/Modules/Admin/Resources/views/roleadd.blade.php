@extends('admin::layouts.master')

@section('content')
    <body>
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 添加角色</strong></div>
        <form method="post" class="form-x margin-large-top" action="{{'roleAdds'}}">
            <div class="form-group">
                <div class="label">
                    <label>角色名称：</label>
                </div>
                <div class="field">
                    <input type="text" name="role_name" class="input w50"  />
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>拥有权限：</label>
                </div>
                <div class="field">
                    @foreach($data as $k=>$v)
                        <input type="checkbox" name="power_name[]" value="{{$v['id']}}">{{$v['power_name']}}
                    @endforeach
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