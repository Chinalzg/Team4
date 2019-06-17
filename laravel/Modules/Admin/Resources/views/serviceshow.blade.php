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
<form method="get" action="serviceinsert" class="form-x">
    <div class="panel admin-panel">
        <div class="panel-head"><strong class="icon-reorder">评论详情</strong></div>
        <div class="discuss">
            <div class="discuss-top">
                <span class="text-main">{{$data['0']->name}}</span>于2016-03-09 09:46:39对<span class="text-red">网站</span>发表评论
            </div>
            <div class="discuss-detail">
                <p>{{$data['0']->content}}</p>

                <div class="discuss-bottom">
                    评论等级: 5  IP地址: 127.0.0.1
                </div>

            </div>
            <div class="hf-dis">
                <p>回复评论</p>
                <div class="form-group">
                    <div class="label">
                        用户名：
                    </div>
                    <div class="field">
                        <input type="text" value="admin" readonly="readonly" class="input"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        Email：
                    </div>
                    <div class="field">
                        <input type="text" value="admin" readonly="readonly" class="input" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        回复内容：
                    </div>
                    <div class="field">
                        <input type="hidden" name="id" value="{{$data['0']->fid}}">
                        <textarea class="input" name="contents"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                    </div>
                    <div class="field">
                        <input type="checkbox" />邮件通知
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="label">
                    </div>
                    <div class="field">
                        <input type="submit" class="button bg-green" value="确定">
                        <input type="reset" class="button bg-red" value="重置">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</body></html>