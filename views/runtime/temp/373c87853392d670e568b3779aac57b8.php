<?php /*a:1:{s:80:"D:\phpStudy\PHPTutorial\WWW\views\application\admin\view\sensitive\show_sen.html";i:1558271889;}*/ ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 基础表格</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="/static/admin/favicon.ico"> <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
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
                    <h5>非法字符展示</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="table_basic.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="table_basic.html#">选项1</a>
                            </li>
                            <li><a href="table_basic.html#">选项2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>词汇类型</th>
                            <th>词汇内容</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $k => $v): ?>
                        <tr>
                            <td><?php echo htmlentities($v['sensitive_id']); ?></td>
                            <td><?php echo htmlentities($v['sensitive_type']); ?></td>
                            <td><?php echo htmlentities($v['sensitive_word']); ?></td>
                            <td>
                                <a href="">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php echo $data; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 全局js -->
<script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
<!-- Peity -->
<script src="/static/admin/js/plugins/peity/jquery.peity.min.js"></script>
<!-- 自定义js -->
<script src="/static/admin/js/content.js?v=1.0.0"></script>
<!-- iCheck -->
<script src="/static/admin/js/plugins/iCheck/icheck.min.js"></script>
<!-- Peity -->
<script src="/static/admin/js/demo/peity-demo.js"></script>
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
