<?php /*a:1:{s:78:"D:\phpStudy\PHPTutorial\WWW\views\application\admin\view\admin\exce_admin.html";i:1558271888;}*/ ?>
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
                    <h5>管理员审核列表</h5>
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
                <div class="col-sm-1">
                    <select name="admin_status" id="select_admin_status" class="form-control"  style="height: 33px;width: 123%;">
                        <option value="3" <?php echo $admin_status==3?'selected':'';?>>封号</option>
                        <option value="2" <?php echo $admin_status==2?'selected':'';?>>正常</option>
                    </select>
                </div>
                <span style="color:red;height: 20px;line-height: 33px;">*请选择</span>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>管理员名称</th>
                            <th>管理员电话</th>
                            <th>管理员电邮</th>
                            <th>管理员状态</th>
                            <th>管理员角色</th>
                            <th>注册时间</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $k => $v): ?>
                                <tr>
                                    <td><?php echo htmlentities($v['admin_id']); ?></td>
                                    <td>
                                        <?php if(isset($v['admin_name'])&&!empty($v['admin_name'])): ?>
                                            <?php echo htmlentities($v['admin_name']); else: ?>
                                            <?php echo htmlentities($v['null_name']); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo htmlentities($v['admin_phone']); ?></td>
                                    <td><?php echo $v['admin_email']=='' ? '未设置'  : htmlentities($v['admin_email']); ?></td>
                                    <td>
                                        <?php if($v['admin_status'] == 2): ?>
                                            <button class="btn btn-success updateStatus" data-admin_id="<?php echo htmlentities($v['admin_id']); ?>" data-admin_status="<?php echo htmlentities($v['admin_status']); ?>">正常</button>
                                        <?php elseif($v['admin_status'] == 3): ?>
                                        <button class="btn btn-warning updateStatus" data-admin_id="<?php echo htmlentities($v['admin_id']); ?>" data-admin_status="<?php echo htmlentities($v['admin_status']); ?>">封号</button>
                                        <?php endif; ?>
                                    </td>
                                    <td>暂无</td>
                                    <td><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($v['admin_addtime'])? strtotime($v['admin_addtime']) : $v['admin_addtime'])); ?></td>
                                    <td><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($v['admin_updatetime'])? strtotime($v['admin_updatetime']) : $v['admin_updatetime'])); ?></td>
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
     * 审核新管理员账号
     */
    $(".updateStatus").on('click',function () {
        var choose = confirm('您确定操作此账号?');
        if(!choose){
            return false;
        }

        var _this = $(this);
        var admin_id = _this.attr('data-admin_id');
        var admin_status = _this.attr('data-admin_status');

        $.post("/admin/Admin/reliAdmin",{"admin_id":admin_id,"admin_status":admin_status},function (jsonMsg) {
            var objMsg = $.parseJSON(jsonMsg);
            switch (objMsg.errorCode) {
                case 100:
                    if(admin_status == 3){
                        //通过
                        _this.removeClass('btn-warning');
                        _this.addClass('btn-success');
                        _this.text('正常');
                        _this.attr('data-admin_status',2);
                    }else{
                        //封号
                        _this.removeClass('btn-success');
                        _this.addClass('btn-warning');
                        _this.text('封号');
                        _this.attr('data-admin_status',3);
                    }
                    break;
                case 101:
                    alert(objMsg.errorMsg);
                    break;
            }
        });
    });

    /**
     * 按条件拉取信息
     */
    $("#select_admin_status").on('change',function () {
        var admin_status = $(this).val();
        var Url = "http://itblog.io/admin/Admin/exceAdmin?admin_status="+admin_status;
        location.href = Url;
    });
</script>
</body>
</html>