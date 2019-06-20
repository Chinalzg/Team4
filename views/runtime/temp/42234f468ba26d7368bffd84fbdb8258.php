<?php /*a:1:{s:75:"D:\phpStudy\PHPTutorial\WWW\views\application\admin\view\link\add_link.html";i:1558271889;}*/ ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 基本表单</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="/static/admin/images/favicon.ico">
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/admin/css/animate.css" rel="stylesheet">
    <link href="/static/admin/css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>添加友情链接</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="form_basic.html#">选项1</a>
                            </li>
                            <li><a href="form_basic.html#">选项2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" action="/admin/Link/addLink" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">链接名称：</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="链接昵称或描述..." class="form-control" name="link_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">链接素材：</label>
                            <div class="col-sm-8">
                                <input type="file" placeholder="请添商标图" class="form-control" name="link_img" style="padding: 0;height: 35px;" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否展示：</label>
                            <div class="col-sm-2" style="margin-top: 5px;">
                                <select name="link_isshow" class="form-control" style="padding: 4px 12px;">
                                    <option value="2">展示</option>
                                    <option value="1">不展示</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">所属公司：</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="请输入合作公司名..." class="form-control" name="link_company" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">链接地址：</label>
                            <div class="col-sm-1" style="width: 120px;">
                                <select name="link_link_type" class="form-control">
                                    <option value="https://">https://</option>
                                    <option value="http://">http://</option>
                                </select>
                            </div>
                            <div class="col-sm-7" style="margin-left: -28px;">
                                <input type="text" placeholder="请输入链接地址..." class="form-control" name="link_link" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-8">
                                <button class="btn btn-sm btn-info" type="submit">添加 链接</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 全局js -->
<script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
<!-- 自定义js -->
<script src="/static/admin/js/content.js?v=1.0.0"></script>
<!-- iCheck -->
<script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
</body>
</html>