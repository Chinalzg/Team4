<?php /*a:1:{s:83:"D:\phpStudy\PHPTutorial\WWW\views\application\admin\view\article\article_check.html";i:1558271888;}*/ ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> - 基本表单</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" href="/static/admin/img/favicon.ico">
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
                        <h5>审核博文</h5>
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
                        <form class="form-horizontal" action="javascript:;">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">博文标题：</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo htmlentities($data['article_title']); ?>" disabled>
                                    <!--<span class="help-block m-b-none">请输入您注册时所填的E-mail</span>-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">博文分类：</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo htmlentities($data['cate_name']); ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">博文内容：</label>
                                <div class="col-sm-8">
                                    <div id="div1" disabled class="" style="width: 100%;height: auto;" cols="30" rows="10"><?php echo $data['article_content_normal']; ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">非法词：</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="出现 <?php echo htmlentities($data['totalSenNums']); ?> 次" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">发布人：</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo htmlentities($data['user_name']); ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">当前状态：</label>
                                <div class="col-sm-8" style="margin-top: 7px;">
                                    <?php if($data['article_isshow'] == 1): ?>
                                    <span style="color: red;font-weight: bold;" >还未审核</span>
                                    <?php elseif($data['article_isshow'] == 3): ?>
                                    <span style="color: darkgreen;font-weight: bold;">拒绝通过</span>
                                    <?php elseif($data['article_isshow'] == 4): ?>
                                    <span style="color: greenyellow;font-weight: bold;">再次修改</span>
                                    <?php elseif($data['article_isshow'] == 2): ?>
                                    <span style="color: limegreen;font-weight: bold;">正常</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <input type="hidden" name="article_id" value="<?php echo htmlentities($data['article_id']); ?>">
                                    <button class="btn btn-sm btn-success blogCheck" data-status="succ" type="button">通过</button> |
                                    <button class="btn btn-sm btn-default blogCheck" data-status="fail" type="button">拒绝</button>
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
    <script src="/static/index/js/wangEditor.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });

        /**
         * 审核博文
         */
        $(".blogCheck").on('click',function () {
            var articleStatus = $(this).attr('data-status');
            var article_id = $("input[name='article_id']").val();

            $.post("/admin/Article/articleCheck",{"articleStatus":articleStatus,"article_id":article_id},function(jsonMsg){
                var objMsg = $.parseJSON(jsonMsg);
                switch (objMsg.errorCode){
                    case 100:
                        alert(objMsg.errorMsg);
                        location.href="/admin/Article/showBlogs";
                        break;
                    case 101:
                        alert(objMsg.errorCode);
                        break;
                    case  102:
                        alert(objMsg.errorCode);
                        break;
                }
            });
        });

        /**
         * 富文本编辑器
         */
        var E = window.wangEditor;
        var editor = new E('#div1');
        // 禁用编辑功能
        // editor.$textElem.attr('contenteditable', false);
        // editor.$textElem.attr('contenteditable', true);

        var $text1 = $('#editor');
        editor.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
            $text1.val(html)
        };
        editor.create();
        // 初始化 textarea 的值
        $text1.val(editor.txt.html());

    </script>
</body>
</html>