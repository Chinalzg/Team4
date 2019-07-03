<?php /*a:1:{s:76:"D:\phpStudy\PHPTutorial\WWW\views\application\admin\view\comm\show_comm.html";i:1558271889;}*/ ?>
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
                    <h5>评论审核</h5>
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
                            <th>
                                <input type="checkbox" id="allCheck">
                            </th>
                            <th>博文标题</th>
                            <th>评论人昵称</th>
                            <th>非法词汇(次)</th>
                            <th>评论内容</th>
                            <th>评论时间</th>
                            <th>当前状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $k => $v): ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="checkComm[]" class="thisCheckbox <?php echo $addData[$k]['sen_nums']=='0' ? 'normal' :  '';; ?>" value="<?php echo htmlentities($v['comm_id']); ?>">
                                    </td>
                                    <td title="<?php echo htmlentities($v['article_title']); ?>"><?php echo mb_substr($v['article_title'],0,15,'UTF-8').'...'; ?></td>
                                    <td><?php echo htmlentities($v['user_name']); ?></td>
                                    <td><?php echo htmlentities($addData[$k]['sen_nums']); ?></td>
                                    <td title="<?php echo htmlentities($v['comm_content']); ?>"><?php echo $addData[$k]['comm_content_normal']; ?></td>
                                    <td><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($v['comm_addtime'])? strtotime($v['comm_addtime']) : $v['comm_addtime'])); ?></td>
                                    <td>
                                        <?php if($v['comm_isshow'] == 1): ?>
                                        <span style="color: red;font-weight: bold;">还未审核</span>
                                        <?php elseif($v['comm_isshow'] == 3): ?>
                                        <span style="color: darkgreen;font-weight: bold;">拒绝通过</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="/admin/Comm/checkComm?comm_id=<?php echo htmlentities($v['comm_id']); ?>">通过</a> |
                                        <a href="/admin/Comm/detailComm?comm_id=<?php echo htmlentities($v['comm_id']); ?>">去审核</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button class="btn btn-primary allNormal">所有合法的</button>
                    <button class="btn btn-success manyPass">批量通过</button>
                    <button class="btn btn-warning manyDelete">批量删除</button>
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
    /**
     * 全选功能
     */
    $("#allCheck").on("click",function () {
        var allCheck_status = $(this).prop('checked');
        if(allCheck_status){
                $(".thisCheckbox").prop('checked','checked');
        }else{
                $(".thisCheckbox").prop('checked','');
        }
    });

    /**
     *  获取所有合法的评论
     */
    $(".btn.btn-primary.allNormal").on('click',function () {
        $(".normal:checkbox").prop('checked','checked');
    });

    /**
     * 批量通过
     */
    $(".manyPass:button").on('click',function () {
        var checkbox = $(":checkbox");
        var manyCommId = "";

        $.each(checkbox,function (k,v) {
                if($(":checkbox").eq(k).prop('checked') == true){
                    manyCommId += $(":checkbox").eq(k).val() + ',';
                }
        });

        if(manyCommId.indexOf("on") >=0 ){
            manyCommId = manyCommId.substr(3,manyCommId.length-4);
        }else{
            manyCommId = manyCommId.substr(0,manyCommId.length-1);
        }

        if(manyCommId == "") {
            alert("选择错误");
            return false;
        }

        $.post("/admin/Comm/checkComm",{"manyCommId":manyCommId},function (jsonMsg) {
            var objMsg = $.parseJSON(jsonMsg);
            switch (objMsg.errorCode) {
                case 100:
                    location.href = "/admin/Comm/showComm";
                    break;
                default:
                    alert(objMsg.errorMsg);
                    break;
            }
        });
    });

    /**
     * 批量删除
     */
    $(".manyDelete:button").on('click',function () {
        var checkbox = $(":checkbox");
        var manyCommId = "";

        $.each(checkbox,function (k,v) {
            if($(":checkbox").eq(k).prop('checked') == true){
                manyCommId += $(":checkbox").eq(k).val() + ',';
            }
        });

        if(manyCommId.indexOf("on") >=0 ){
            manyCommId = manyCommId.substr(3,manyCommId.length-4);
        }else{
            manyCommId = manyCommId.substr(0,manyCommId.length-1);
        }

        if(manyCommId == "") {
            alert("选择错误");
            return false;
        }

        $.post("/admin/Comm/deleteComm",{"manyCommId":manyCommId},function (jsonMsg) {
            var objMsg = $.parseJSON(jsonMsg);
            switch (objMsg.errorCode) {
                case 100:
                    location.href = "/admin/Comm/showComm";
                    break;
                default:
                    alert(objMsg.errorMsg);
                    break;
            }
        });
    });




    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
</body>
</html>