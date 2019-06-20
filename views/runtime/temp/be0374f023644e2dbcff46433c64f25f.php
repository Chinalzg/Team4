<?php /*a:1:{s:76:"D:\phpStudy\PHPTutorial\WWW\views\application\admin\view\user\show_user.html";i:1558271889;}*/ ?>
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
                    <h5>普通用户信息展示</h5>
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
                            <th>用户名称</th>
                            <th>用户电话</th>
                            <th>用户电邮</th>
                            <th>用户状态</th>
                            <th>注册时间</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $k => $v): ?>
                                <tr>
                                    <td><?php echo htmlentities($v['user_id']); ?></td>
                                    <td><?php echo htmlentities($v['user_name']); ?></td>
                                    <td><?php echo htmlentities($v['user_phone']); ?></td>
                                    <td><?php echo htmlentities($v['user_email']); ?></td>
                                    <td>
                                        <?php if($v['user_status'] == 2): ?>
                                            <button class="btn btn-success updateStatus" data-user_id="<?php echo htmlentities($v['user_id']); ?>" data-user_status="<?php echo htmlentities($v['user_status']); ?>">正常</button>
                                        <?php elseif($v['user_status'] == 3): ?>
                                        <button class="btn btn-primary updateStatus" data-user_id="<?php echo htmlentities($v['user_id']); ?>" data-user_status="<?php echo htmlentities($v['user_status']); ?>">封号</button>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($v['user_addtime'])? strtotime($v['user_addtime']) : $v['user_addtime'])); ?></td>
                                    <td><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($v['user_updatetime'])? strtotime($v['user_updatetime']) : $v['user_updatetime'])); ?></td>
                                    <td>
                                        <a href="">删除</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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

    /**
     * 更改普通用户状态
     */
    $(".updateStatus").on('click',function () {
        var _this = $(this);
        var user_id = _this.attr('data-user_id');
        var user_status = _this.attr('data-user_status');

        $.post("/admin/User/updateStatus",{"user_id":user_id,"user_status":user_status},function (jsonMsg) {
            var objMsg = $.parseJSON(jsonMsg);
            switch (objMsg.errorCode) {
                case 100:
                    if(user_status == 2){
                        _this.removeClass('btn-success');
                        _this.addClass('btn-primary');
                        _this.attr('data-user_status',3);
                        _this.text('封号');
                    }else{
                        _this.removeClass('btn-primary');
                        _this.addClass('btn-success');
                        _this.attr('data-user_status',2);
                        _this.text('正常');
                    }
                    break;
                case 101:
                    alert(objMsg.errorMsg);
                    break;
            }
        });
    });

</script>
</body>
</html>