@extends('admin::layouts.master')

@section('content')
    <body>
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 添加管理员</strong></div>
        <form method="post" class="form-x margin-large-top" action="{{'userAdds'}}">
            <div class="form-group">
                <div class="label">
                    <label>管理员名称：</label>
                </div>
                <div class="field">
                    <input type="text" name="admin_name" class="input w50"  />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>管理员密码：</label>
                </div>
                <div class="field">
                    <input type="text" name="pwd" class="input w50"  />
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>用户角色：</label>
                </div>
                <div class="field">
                    @foreach($data as $k=>$v)
                        <input type="checkbox" name="role_name[]" value="{{$v['id']}}">{{$v['role_name']}}
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