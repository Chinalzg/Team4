@extends('admin::layouts.master')

@section('content')
    <body>
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder"> 修改菜单</strong></div>
        <form method="post" class="form-x margin-large-top" action="{{'menuUpdate'}}">
            <div class="form-group">
                <div class="label">
                    <label>菜单名称：</label>
                </div>
                <div class="field">
                    <input type="text" name="power_name" value="{{$data['power_name']}}" class="input w50"  />
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>是否显示：</label>
                </div>
                <div class="field">
                    <div class="product-mulde product-mulde-a">
                        <ul>
                            @if($data['status']==1)
                            <li>
                                <input type="radio" name="status" value="1" checked><label>是</label>
                                <input type="radio" name="status" value="0"><label>否</label>
                            </li>
                            @else
                                <li>
                                    <input type="radio" name="status" value="1"><label>是</label>
                                    <input type="radio" name="status" value="0" checked><label>否</label>
                                </li>
                            @endif
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
                    <input type="hidden" name="id" value="{{$data['id']}}">
                    <button class="button bg-green" type="submit">确定</button>
                    <button class="button bg-red" type="reset">重置</button>
                </div>
            </div>
        </form>
    </div>
    </body>
@stop