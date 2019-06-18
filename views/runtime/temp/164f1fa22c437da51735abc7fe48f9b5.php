<?php /*a:1:{s:76:"D:\phpStudy\PHPTutorial\WWW\views\application\admin\view\link\show_link.html";i:1558271889;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> - 基础表格</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="/static/admin/favicon.ico">
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
                    <h5>友情链接列表</h5>
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
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>连接名称</th>
                            <th>连接图片<span style="font-size: 10px;">(点图片)</span></th>
                            <th>添加时间</th>
                            <th>是否展示</th>
                            <th>所属公司</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data as $k => $v): ?>
                        <tr>
                            <td><?php echo htmlentities($v['link_name']); ?></td>
                            <td>
                                <a href="<?php echo htmlentities($v['link_link']); ?>" target="_blank">
                                <img src="/static/admin/uploads/link/<?php echo htmlentities($v['link_img']); ?>" alt="" style="width: 120px;height: 70px;">
                                </a>
                            </td>
                            <td><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($v['link_addtime'])? strtotime($v['link_addtime']) : $v['link_addtime'])); ?></td>
                            <td>
                                <?php if($v['link_isshow'] == 1): ?>
                                    <button class="btn btn-default link_isshow" data-isshow="<?php echo htmlentities($v['link_isshow']); ?>" data-link_id="<?php echo htmlentities($v['link_id']); ?>">停展</button>
                                <?php elseif($v['link_isshow'] == 2): ?>
                                    <button class="btn btn-success link_isshow" data-isshow="<?php echo htmlentities($v['link_isshow']); ?>" data-link_id="<?php echo htmlentities($v['link_id']); ?>">展示</button>
                                <?php endif; ?>
                            </td>
                            <td><?php echo htmlentities($v['link_company']); ?></td>
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

    /**
     * 更改广告状态
     */
    $(".link_isshow").on('click',function () {
        var link_isshow = $(this).attr('data-isshow');
        var link_id = $(this).attr('data-link_id');
        var _this = $(this);

        $.post("/admin/Link/updateIsshow",{"link_isshow":link_isshow,"link_id":link_id},function (jsonMsg) {
            var objMsg = $.parseJSON(jsonMsg);
            switch (objMsg.errorCode) {
                case 100:
                    /**
                     * 修改样式
                     */
                    if(link_isshow == 1){
                        _this.attr('data-isshow','2');
                        _this.removeClass('btn-default');
                        _this.addClass('btn-success');
                        _this.text('展示')
                    }else{
                        _this.attr('data-isshow','1');
                        _this.removeClass('btn-');
                        _this.addClass('btn-default');
                        _this.text('停展');
                    }
                    // alert(objMsg.errorMsg);
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