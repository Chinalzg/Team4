@extends('admin::layouts.master')

@section('content')
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
    <div class="logo margin-big-left fadein-top">
        <h1><img src="{{ URL::asset('static/images/y.jpg') }}" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
    </div>
    <div class="head-l">
        <a class="button button-little bg-green" href="" target="_blank">
            <span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;
        <a href="#" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;
        <a class="button button-little bg-red" href="{{'logout'}}"><span class="icon-power-off"></span> 退出登录</a>
    </div>
</div>
<div class="leftnav">
    <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
    @foreach($data as $k=>$v)
        <h2><span class="icon-home"></span>{{$v['power_name']}}</h2>

        <ul>
            @foreach($v['child'] as $k=>$vo)
                <li><a href="{{$vo['url']}}" target="right"><span class="icon-caret-right"></span>{{$vo['power_name']}}</a></li>
            @endforeach
        </ul>

    @endforeach
</div>

<script type="text/javascript">
    $(function(){
        $(".leftnav h2").click(function(){
            $(this).next().slideToggle(200);
            $(this).toggleClass("on");
        })
        $(".leftnav ul li a").click(function(){
            $("#a_leader_txt").text($(this).text());
            $(".leftnav ul li a").removeClass("on");
            $(this).addClass("on");
        })
        $(".leftnav").children("ul:last-child").css("padding-bottom","100px");
    });
</script>
<ul class="bread">
    <li><a href="{{'welcome'}}" target="right" class="icon-home"> 首页</a></li>
    <li><a href="{{'welcome'}}" id="a_leader_txt">个人信息</a></li>
    <li><b>当前语言：</b><span style="color:red;">中文</span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
    <iframe scrolling="auto" rameborder="0" src="welcome" name="right" width="100%" height="100%"></iframe>
</div>
</body>

@stop
