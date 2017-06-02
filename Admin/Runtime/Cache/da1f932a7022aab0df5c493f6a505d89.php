<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit"><title>教师工作量核算系统</title><meta name="keywords" content=""><meta name="description" content=""><link rel="stylesheet" href="__PUBLIC__/layui/css/layui.css" /><link rel="shortcut icon" type="image/x-icon" href="__PUBLIC__/Images/favicon.ico"/><link href="__CSS__/bootstrap.min.css?v=3.4.0" rel="stylesheet"><link href="__PUBLIC__/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet"><link href="__CSS__/plugins/iCheck/custom.css" rel="stylesheet"><link href="__CSS__/plugins/summernote/summernote.css" rel="stylesheet"><link href="__CSS__/plugins/summernote/summernote-bs3.css" rel="stylesheet"><link rel="stylesheet" href="__CSS__/sweetalert.css"/><!-- Data Tables --><link href="__CSS__/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet"><link href="__CSS__/animate.css" rel="stylesheet"><link href="__CSS__/style.css?v=2.2.0" rel="stylesheet"><style>        .glyphicon,.add-on{cursor: pointer;}
    </style></head><body><!-- 修改密码模态框（Modal） --><div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content animated flipInY"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title" id="myModalLabel">修改密码</h4></div><div class="modal-body"><div id='pwd_alert' class="alert alert-warning" style="display: none;"><a href="#" class="close" data-dismiss="alert">                        &times;
                    </a></div><div><form class="form-horizontal"><div class="form-group"><label class="col-lg-3 control-label">新密码：</label><div class="col-lg-8"><input type="password" placeholder="新密码" id="new_pwd" class="form-control"></div></div><div class="form-group"><label class="col-lg-3 control-label">确认新密码：</label><div class="col-lg-8"><input type="password" placeholder="确认新密码" id="ok_new_pwd" class="form-control"></div></div></form></div></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal" id='close'>关闭</button><button type="button" class="btn btn-primary" id="update_upwd">提交更改</button></div></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div><!-- 添加课程模态框（Modal） --><div class="modal fade" id="add_kc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content animated flipInX"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title">添加课程管理</h4></div><div class="modal-body" style="overflow: hidden"><div><form class="form-horizontal" id="add"><div class="col-lg-6" style="border-right: 1px solid #ddd;padding-right:5em"><div class="form-group"><label class="col-sm-6 control-label">课程名：</label><div class="col-sm-6"><input type="text" class="form-control" name="class_name" form="add" required></div></div><div class="form-group"><label class="col-sm-6 control-label">课程类型：</label><div class="col-sm-6"><input type="text" class="form-control" name="class_type" list="type" form="add"><datalist id="type"><option>必修课</option><option>任选课</option><option>其它</option></datalist></div></div><div class="form-group"><label class="col-sm-6 control-label">学时：</label><div class="col-sm-6"><input type="number" min="0" class="form-control" name="xueshi" form="add"></div></div><div class="form-group"><label class="col-sm-6 control-label">周数：</label><div class="col-sm-6"><input type="number" min="0" class="form-control" name="zhou" form="add"></div></div><div class="form-group"><label class="col-sm-6 control-label">班级：</label><div class="col-sm-6"><input type="text" class="form-control" name="banji" form="add"></div></div><div class="form-group"><label class="col-sm-6 control-label">额定人数：</label><div class="col-sm-6"><input type="number" min="0" class="form-control" name="ed" form="add"></div></div></div><div class="col-lg-6"><div class="form-group"><label class="col-sm-6 control-label">实际人数：</label><div class="col-sm-6"><input type="number" min="0" class="form-control" name="shiji" form="add"></div></div><div class="form-group"><label class="col-sm-6 control-label">重修：</label><div class="col-sm-6"><input type="text" class="form-control" list="chongx" name="cx" form="add" required><datalist id="chongx"><option>是</option><option>否</option></datalist></div></div><div class="form-group"><label class="col-sm-6 control-label">核心课程：</label><div class="col-sm-6"><input type="text" class="form-control" list="hexin" name="hx" form="add" required><datalist id="hexin"><option>是</option><option>否</option></datalist></div></div><div class="form-group"><label class="col-sm-6 control-label">优质课程：</label><div class="col-sm-6"><input type="text" class="form-control" list="youzhi" name="yz" form="add" required><datalist id="youzhi"><option>国家级</option><option>省级</option><option>校级</option></datalist></div></div><div class="form-group"><label class="col-sm-6 control-label">是否招人数少额定：</label><div class="col-sm-6"><input type="text" class="form-control" list="y1" name="y1" form="add" required><datalist id="y1"><option>是</option><option>否</option></datalist></div></div><div class="form-group"><label class="col-sm-6 control-label">是否服从(额>实)：</label><div class="col-sm-6"><input type="text" class="form-control" list="y2" name="y2" form="add" required><datalist id="y2"><option>是</option><option>否</option></datalist></div></div><div class="form-group"><label class="col-sm-6 control-label">教员：</label><div class="col-sm-6"><input type="text" class="form-control" name="uname" form="add" required></div></div></div><br/></form></div></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">关闭</button><button type="button" class="add_kecheng btn btn-primary">添加</button></div></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div><!--页面显示全部--><div id="wrapper"><!-- 左边导航部分/.modal --><nav class="navbar-default navbar-static-side" role="navigation"><div class="sidebar-collapse"><ul class="nav" id="side-menu"><li class="nav-header"><div class="dropdown profile-element"><span><img alt="image" class="img-circle" style="width:64px;height: 64px"/></span><a data-toggle="dropdown" class="dropdown-toggle" href="index.html#"><span class="clear"><span class="block m-t-xs"><strong
                                            class="font-bold">Admin</strong></span><span class="text-muted text-xs block">超级管理员 <b class="caret"></b></span></span></a><ul class="dropdown-menu person_ziliao animated fadeInRight m-t-xs"><li><a class="head">修改头像</a></li><li><a class="person">个人资料</a></li><li><a href="#" data-toggle="modal" data-target="#myModal">修改密码</a></li><li class="divider"></li><li><a href="__APP__/Login/">安全退出</a></li></ul></div><div class="logo-element">                        Admin
                    </div></li><li><a href="#"><i class="fa fa-th-large"></i><span class="nav-label">理论教学信息审核</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/Lilun/no">未审核</a></li><li><a href="__APP__/Lilun/yes">已审核</a></li></ul></li><li><a href="#"><i class="fa fa-desktop"></i><span class="nav-label">实践教学信息审核</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/Shijian/no">未审核</a></li><li><a href="__APP__/Shijian/yes">已审核</a></li></ul></li><li><a href="#"><i class="fa fa-columns"></i><span class="nav-label">毕业设计信息审核</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/Bishe/no">未审核</a></li><li><a href="__APP__/Bishe/yes">已审核</a></li></ul></li><li><a href="#"><i class="fa fa fa-globe"></i><span class="nav-label">额外信息审核</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/Ewai/no">未审核</a></li><li><a href="__APP__/Ewai/yes">已审核</a></li></ul></li><li><a href="#"><i class="fa fa-bar-chart-o"></i><span class="nav-label">用户管理</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/User">用户管理</a></li></ul></li><li><a href="#"><i class="fa fa-flask"></i><span class="nav-label">课程管理</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/Kecheng">课程管理</a></li></ul></li><li><a href="#"><i class="fa fa-flask"></i><span class="nav-label">毕业设计管理</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/Biguan">毕设管理</a></li></ul></li><li><a href="#"><i class="fa fa-edit"></i><span class="nav-label">工作量管理</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/Work">工作量管理</a></li></ul></li><li><a href="#"><i class="fa fa-files-o"></i><span class="nav-label">信息导入</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/InData/jiaoxue">教学任务信息</a></li><li><a href="__APP__/InData/shijian">实践环节信息</a></li><li><a href="__APP__/InData/bishe">毕业设计信息</a></li></ul></li><li><a href="#"><i class="fa fa-envelope"></i><span class="nav-label">邮箱 </span><span
                            class="label label-warning pull-right">16</span></a><ul class="nav nav-second-level"><li><a href="__APP__/Xiexin">写信</a></li><li><a href="__APP__/Shoujian">收件箱</a></li></ul></li><li><a href="#"><i class="fa fa-laptop"></i><span class="nav-label">系统帮助</span></a></li></ul></div></nav><!--右边显示部分--><div id="page-wrapper" class="gray-bg dashbard-1"><!--顶部导航栏--><div class="row border-bottom"><nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0"><div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i></a><form role="search" class="navbar-form-custom" method="post" action="search_results.html"><div class="form-group"><input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search"
                                   id="top-search"></div></form></div><ul class="nav navbar-top-links navbar-right"><li><span class="m-r-sm text-muted welcome-message"><a href="index.html" title="返回首页"><i
                                        class="fa fa-home"></i></a>欢迎使用教师工作量管理系统</span></li><li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="label label-warning">0</span></a><ul class="dropdown-menu dropdown-messages"><li><div class="text-center link-block"><a href="__APP__/Shoujian"><i class="fa fa-envelope"></i><strong> 查看所有消息</strong></a></div></li></ul></li><li><a href="__APP__/Login/"><i class="fa fa-sign-out"></i> 退出
                        </a></li></ul></nav></div><!--用户管理--><div id="person" class="right" style="display: none;"><div class="row wrapper border-bottom white-bg page-heading"><div class="col-lg-12"><h2>用户管理</h2><ol class="breadcrumb"><li><a href="index.html">主页</a></li><li><strong>个人资料</strong></li></ol></div></div><div class="wrapper wrapper-content animated fadeInRight"><div class="row"><div class="col-lg-12"><div class="ibox float-e-margins"><div class="ibox-title"><h5>个人资料</h5><div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a><a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#"><i class="fa fa-wrench"></i></a><ul class="dropdown-menu dropdown-user"><li><a href="#">选项1</a></li><li><a href="#">选项2</a></li></ul><a class="close-link"><i class="fa fa-times"></i></a></div></div><div class="ibox-content"><small>首次登录必须完善信息后才可执行其他操作! <font color="red">点击小铅笔进行编辑操作,修改完毕请点击小铅笔进行保存!</font></small><div class="row"><div class="panel-body"><div class="form-horizontal"><div class="form-group"><label class="col-sm-2 control-label h5">								                    编号 </label><div class="col-sm-6"><input type="text" class="form-control" disabled='disabled' id="id" title="编号"/></div></div><div class="form-group"><label class="col-sm-2 control-label h5">								                    所在单位</label><div class="col-sm-6"><div class="input-group"><input type="text" class="form-control" disabled='disabled' id="xueyuan" title="单位"/><span class="input-group-addon add-on"><i class="glyphicon glyphicon-pencil"></i></span></div></div></div><div class="form-group"><label class="col-sm-2 control-label h5">								                    姓名</label><div class="col-sm-6"><div class="input-group"><input type="text" class="form-control" disabled='disabled' id="name" title="姓名"/><span class="input-group-addon add-on"><i class="glyphicon glyphicon-pencil"></i></span></div></div></div><div class="form-group"><label class="col-sm-2 control-label h5">								                    性别 </label><div class="col-sm-6"><div class="input-group"><select class="form-control" id="sex" title="性别" disabled='disabled'><option value="0">未知</option><option value="男">男</option><option value="女">女</option></select><span class="input-group-addon add-on"><i class="glyphicon glyphicon-pencil"></i></span></div></div></div><div class="form-group"><label class="col-sm-2 control-label h5">								                    职称</label><div class="col-sm-6"><div class="input-group"><input type="text" class="form-control" disabled='disabled' id="clazz" title="职称"/><span class="input-group-addon add-on"><i class="glyphicon glyphicon-pencil"></i></span></div></div></div><div class="form-group"><label class="col-sm-2 control-label h5">								            学历</label><div class="col-sm-6"><div class="input-group"><input type="text" class="form-control" disabled='disabled' id="xueli" title="学历"/><span class="input-group-addon add-on"><i class="glyphicon glyphicon-pencil"></i></span></div></div></div><div class="form-group"><label class="col-sm-2 control-label h5">								                    联系方式 </label><div class="col-sm-6"><div class="input-group"><input type="text" class="form-control" disabled='disabled' id="phone" title="联系方式"/><span class="input-group-addon add-on"><i class="glyphicon glyphicon-pencil"></i></span></div></div><span class="help-inline col-sm-4"><i class="fa fa-info-circle"></i>								                    此项为必填项  此项为空将不能执行任何操作
								                </span></div><div class="form-group"><label class="col-sm-2 control-label h5">								                    电子邮箱 </label><div class="col-sm-6"><div class="input-group"><input type="text" class="form-control" disabled='disabled' id="email" title="电子邮箱"/><span class="input-group-addon add-on"><i class="glyphicon glyphicon-pencil"></i></span></div></div></div></div></div></div></div></div></div></div></div></div><!--富头像编辑器--><div id="head" class="right" style="display: none;"><div class="row wrapper border-bottom white-bg page-heading"><div class="col-lg-10"><h2>富头像上传编辑器</h2><ol class="breadcrumb"><li><a href="index.html">主页</a></li><li><a>表单</a></li><li><strong>头像上传编辑</strong></li></ol></div><div class="col-lg-2"></div></div><div class="wrapper wrapper-content"><div class="row"><div class="col-lg-12"><div class="ibox float-e-margins"><div class="ibox-title"><h5>头像上传编辑</h5><div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a><ul class="dropdown-menu dropdown-user"><li><a href="form_editors.html#">选项1</a></li><li><a href="form_editors.html#">选项2</a></li></ul><a class="close-link"><i class="fa fa-times"></i></a></div></div><div class="ibox-content"><ul class="nav nav-tabs" id="avatar-tab"><li class="active" id="upload"><a href="javascript:;">本地上传</a></li><li id="webcam"><a href="javascript:;">视频拍照</a></li><li id="albums"><a href="javascript:;">相册选取</a></li></ul><div class="m-t m-b"><div id="flash1"><p id="swf1">本组件需要安装Flash Player后才可使用，请从
                                            <a href="http://www.adobe.com/go/getflashplayer">这里</a>下载安装。</p></div><div id="editorPanelButtons" style="display:none"><p class="m-t"><label class="checkbox-inline"><input type="checkbox" id="src_upload">是否上传原图片？</label></p><p><a class="btn btn-w-m btn-primary button_upload"><i
                                                    class="fa fa-upload"></i> 上传</a><a href="javascript:;" class="btn btn-w-m btn-white button_cancel">取消</a></p></div><p id="webcamPanelButton" style="display:none"><a href="javascript:;" class="btn btn-w-m btn-info button_shutter"><i
                                                class="fa fa-camera"></i> 拍照</a></p><div id="userAlbums" style="display:none"><a href="__PUBLIC__/Images/a1.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a1.jpg" alt="示例图片1"/></a><a href="__PUBLIC__/Images/a2.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a2.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a3.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a3.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a4.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a4.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a5.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a5.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a6.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a6.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a7.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a7.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a8.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a8.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a9.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a9.jpg" alt="示例图片2"/></a>></div></div></div></div></div></div></div></div><!--底部--><div class="footer"><!--<div class="pull-right">                By：
                <a href="#" target="_blank">大康</a></div>--><div><strong>Copyright</strong> 中原工学院软件学院 &copy; 2017
            </div></div><!--课程管理--><div id="course_control" class="right" style="display: block" ;><div class="row wrapper border-bottom white-bg page-heading"><div class="col-lg-12"><h2>课程管理</h2><ol class="breadcrumb"><li><a href="index.html">主页</a></li><li><a>课程管理</a><li><strong>课程管理</strong></li></ol></div></div><div class="wrapper wrapper-content animated fadeInRight"><div class="row"><div class="col-lg-12"><div class="ibox float-e-margins"><div class="ibox-title"><h5>搜索结果</h5><div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a><a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#"><i class="fa fa-wrench"></i></a><ul class="dropdown-menu dropdown-user"><li><a href="#">选项1</a></li><li><a href="#">选项2</a></li></ul><a class="close-link"><i class="fa fa-times"></i></a></div></div><div class="ibox-content"><div class=""><a onclick="dele_group(this);" href="javascript:void(0);" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除</a>&nbsp;
									<a onclick="del_add(this);" href="javascript:void(0);" class="btn btn-success " data-toggle="modal" data-target="#add_kc"><span class="glyphicon glyphicon-plus"></span> 添加课程</a></div><table id="kecheng" class="table table-striped table-bordered table-hover dataTables-example"><thead><tr><th class="text-center"><label><input type="checkbox" data-check="check_kecheng"/>全选</label></th><th class='text-center'>课程名</th><th class='text-center'>课程类型</th><th class='text-center'>学时</th><th class='text-center'>周数</th><th class='text-center'>班级</th><th class='text-center'>额定人数</th><th class='text-center'>实际人数</th><th class='text-center'>重修</th><th class='text-center'>核心课程</th><th class='text-center'>优质课程</th><th class='text-center'>是否招生人数少额定</th><th class='text-center'>是否服从(额>实)</th><th class='text-center'>教员</th><th class='text-center'>状态</th><th class='text-center' style="display:none">编号</th><th class='text-center'>操作</th></tr></thead><tbody><!--<tr><td class="text-center"><button class="btn btn-xs btn-primary">未核算</button></td><td class="text-center"><span title="编辑" id="edit"
                                                                      class="glyphicon glyphicon-pencil"
                                                                      data-toggle="modal" data-target="#edit_user">&nbsp;</span><span data-toggle="modal" data-target="#alert_warning" title="删除"
                                                  class="glyphicon glyphicon-trash"></span></td></tr>--></tbody><tfoot><tr><th class="text-center">全选</th><th class='text-center'>课程名</th><th class='text-center'>课程类型</th><th class='text-center'>学时</th><th class='text-center'>周数</th><th class='text-center'>班级</th><th class='text-center'>额定人数</th><th class='text-center'>实际人数</th><th class='text-center'>重修</th><th class='text-center'>核心课程</th><th class='text-center'>优质课程</th><th class='text-center'>是否招生人数少额定</th><th class='text-center'>是否服从(额>实)</th><th class='text-center'>教员</th><th class='text-center'>状态</th><th class='text-center' style="display:none">编号</th><th class='text-center'>操作</th></tr></tfoot></table></div></div></div></div></div></div></div></div><!-- Mainly scripts --><script src="__PUBLIC__/layui/layui.js"></script><script src="__JS__/jquery-2.1.1.min.js"></script><script src="__JS__/bootstrap-typeahead.js"></script><script src="__JS__/bootstrap.min.js?v=3.4.0"></script><script src="__JS__/plugins/metisMenu/jquery.metisMenu.js"></script><script src="__JS__/plugins/slimscroll/jquery.slimscroll.min.js"></script><script src="__JS__/sweetalert.min.js"></script><script src="__JS__/nav.js"></script><!--<script src="js/plugins/jeditable/jquery.jeditable.js"></script>--><!-- svg prictur --><script src="__JS__/fusioncharts.js"></script><script src="__JS__/fusioncharts.charts.js"></script><!-- Data Tables --><script src="__JS__/plugins/dataTables/jquery.dataTables.js"></script><script src="__JS__/plugins/dataTables/dataTables.bootstrap.js"></script><!-- Custom and plugin javascript --><script src="__JS__/hplus.js?v=2.2.0"></script><script src="__JS__/plugins/pace/pace.min.js"></script><!-- fullavatareditor --><script type="text/javascript" src="__PUBLIC__/plugins/fullavatareditor/scripts/swfobject.js"></script><script type="text/javascript" src="__PUBLIC__/plugins/fullavatareditor/scripts/fullAvatarEditor.js"></script><script type="text/javascript" src="__PUBLIC__/plugins/fullavatareditor/scripts/jQuery.Cookie.js"></script><script type="text/javascript" src="__PUBLIC__/plugins/fullavatareditor/scripts/test.js"></script><!--<script src="js/content.min.js?v=1.0.0"></script>--><script src="__JS__/plugins/iCheck/icheck.min.js"></script><script src="__JS__/plugins/summernote/summernote.min.js"></script><script src="__JS__/plugins/summernote/summernote-zh-CN.js"></script><script src="__JS__/chart.js"></script><script src="__JS__/Admin.js"></script><script>	(function(){
		$.ajax({
            url: "__APP__/Shoujian/isread?received="+localStorage.u_name,
            type: "POST",
            success: function (data) {
	            $(".label-warning")[1].innerHTML=data.length;
	            $(".label-warning")[0].innerHTML=data.length;
            }
        })
	}());
	
</script><script>
	//选择课程中的倒数二行隐藏
	setTimeout(hide, 800);

	function hide() {
		$("#kecheng").find("tbody tr td:nth-child(16)").css("display", "none");
	}
	//	根据浏览器宽度看是不是加滑动条
	if(document.body.clientWidth > 1000) {
		//课程管理信息查询数据
		$('#kecheng').dataTable({
			"columnDefs": [{
				"targets": 0,
				"data": null,
				"defaultContent": "<input type='checkbox' class='check_kecheng'/>",
			}, {
				"targets": -1,
				"data": null,
				"defaultContent": '<span title="修改"class="glyphicon glyphicon-pencil up_kc" data-toggle="modal" data-target="#add_kc"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span data-toggle="modal" data-target="#alert_warning" title = "删除" class = "del_kc glyphicon glyphicon-trash"></span >',
			}],
			"ajax": "__URL__/do_data",
		});
	}else{
		//课程管理信息查询数据
		$('#kecheng').dataTable({
			"columnDefs": [{
				"targets": 0,
				"data": null,
				"defaultContent": "<input type='checkbox' class='check_kecheng'/>",
			}, {
				"targets": -1,
				"data": null,
				"defaultContent": '<span title="修改"class="glyphicon glyphicon-pencil up_kc" data-toggle="modal" data-target="#add_kc"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span data-toggle="modal" data-target="#alert_warning" title = "删除" class = "del_kc glyphicon glyphicon-trash"></span >',
			}],
			"ajax": "__URL__/do_data",
			"scrollX": true,
		});
	}

	//课程管理删除图表点击事件
	$("tbody").delegate(".del_kc", 'click', function() {
		var th = $(this);
		var id = th.parent().siblings("td:eq(15)").text();
		var url = "__URL__/delect?id=" + id;
		swal({
				title: "您确定要删除这条信息吗?",
				text: "删除后将无法恢复，请谨慎操作！",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "删除",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm) {
				if(isConfirm) {
					$.ajax({
						url: url,
						type: "POST",
						success: function(data) {
							if(data == 1) {
								th.parent().parent().fadeOut("slow");
								swal("删除成功！", "您已经永久删除了这条信息。", "success")
							}
						}
					});
				} else {
					swal("已取消", "您取消了删除操作！", "error")
				}
			}
		);
	});

	//理论教学添加课程按钮点击
	function del_add(t) {
		if($(t).html().indexOf("修改课程管理")) {
			$("#add_class").find(".modal-title").html("添加课程管理");
			$(".add_kecheng").html("添加");
		}
		var names = ['class_name', 'class_type', 'xueshi', 'zhou', 'banji', 'ed', 'shiji', 'cx', 'hx', 'yz', 'y1', 'y2', 'uname'];
		for(var i = 0; i < 13; i++) {
			//console.log(""+$(`input[name='${names[i]}']`));
			$(`input[name='${names[i]}']`).val("");
		}
	}

	//课程管理修改图标点击事件
	$("tbody").delegate(".up_kc", 'click', function() {
		$("#add_kc").find(".modal-title").html("修改课程管理");
		$(".add_kecheng").html("修改");
		th = $(this).parent();
		var names = ['class_name', 'class_type', 'xueshi', 'zhou', 'banji', 'ed', 'shiji', 'cx', 'hx', 'yz', 'y1', 'y2', 'uname'];
		for(var i = 0; i < 13; i++) {
			$(`input[name='${names[i]}']`).val(th.siblings(`td:eq(${i+1})`).text());
		}
	});

	//添加课程管理按钮点击事件
	$(".add_kecheng").on("click", function() {
		$(this).prev().click();
		var data = $('#add').serialize();
		var str = $("#add_kc").find(".modal-title").html();
		var title = '';
		var url = '';
		if(str == "修改课程管理") {
			url = "__URL__/update";
			title = "修改成功";
			data = data + '&id=' + th.siblings(`td:eq(15)`).text();
		} else if(str == "添加课程管理") {
			url = "__URL__/add";
			title = "添加成功";
			data = data;
		}
		$.ajax({
			url: url,
			data: data,
			type: "POST",
			success: function(data) {
				if(data == 1) {
					swal({
							title: title,
							text: "",
							type: "success",
							showCancelButton: false,
							confirmButtonColor: "#AEDEF4",
							confirmButtonText: "确定",
							closeOnConfirm: true,
							closeOnCancel: true
						},
						function(isConfirm) {
							if(isConfirm) {
								window.location = '__URL__';
							}
						}
					);
				}
			}
		});
	})

	//删除用户
	function dele_group(self) {
		var class_array = [];
		var th = [];
		$("input[class='check_kecheng']").prop("checked", function(i, val) {
			if(val) {
				var data = $(this).parent().siblings("td:eq(14)").text();
				console.log(data);
				class_array.push(data);
				th.push($(this));
			}
		});
		var id = class_array + "";
		swal({
				title: "您确定要删除这条信息吗?",
				text: "删除后将无法恢复，请谨慎操作！",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "删除",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm) {
				if(isConfirm) {
					$.ajax({
						url: "__URL__/delgroup",
						data: "id=" + id,
						type: "POST",
						success: function(data) {
							if(data == 1) {
								for(var i = 0; i < th.length; i++) {
									th[i].parent().parent().fadeOut("slow");
								}
								swal("删除成功！", "您已经永久删除了这条信息。", "success")
							} else {
								alert("未知错误,请联系管理员!!!");
							}
						}
					});
				} else {
					swal("已取消", "您取消了删除操作！", "error")
				}
			}
		);

	}
</script></body></html>