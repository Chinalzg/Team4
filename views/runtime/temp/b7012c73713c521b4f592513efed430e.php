<?php /*a:1:{s:80:"D:\phpStudy\PHPTutorial\WWW\views\application\admin\view\article\show_blogs.html";i:1558271888;}*/ ?>
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
                    <h5>博文审核</h5>
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
                            <th>博文标题</th>
                            <th>博主昵称</th>
                            <th>博文分类</th>
                            <th>添加时间</th>
                            <th>非法词汇(次)</th>
                            <th>博文状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($blogData as $k => $v): ?>
                                <tr>
                                    <td title="<?php echo htmlentities($v['article_title']); ?>"><?php echo mb_substr($v['article_title'],0,15,'UTF-8').'...'; ?></td>
                                    <td><?php echo htmlentities($v['user_name']); ?></td>
                                    <td><?php echo htmlentities($v['cate_name']); ?></td>
                                    <td><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($v['article_addtime'])? strtotime($v['article_addtime']) : $v['article_addtime'])); ?></td>
                                    <td><?php echo htmlentities($addData[$k]['sen_nums']); ?></td>
                                    <td>
                                        <?php if($v['article_isshow'] == 1): ?>
                                        <span style="color: red;font-weight: bold;">还未审核</span>
                                        <?php elseif($v['article_isshow'] == 3): ?>
                                        <span style="color: darkgreen;font-weight: bold;">拒绝通过</span>
                                        <?php elseif($v['article_isshow'] == 4): ?>
                                        <span style="color: greenyellow;font-weight: bold;">再次修改</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="/admin/Article/deleteBlog?article_id=<?php echo htmlentities($v['article_id']); ?>">删除此文</a> |
                                        <a href="/admin/Article/articleCheck?article_id=<?php echo htmlentities($v['article_id']); ?>">去审核</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php echo $blogData; ?>
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