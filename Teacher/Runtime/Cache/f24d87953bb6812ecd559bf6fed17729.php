<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html manifest="teacher.appcache"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit"><title>教师工作量核算系统</title><meta name="keywords" content=""><meta name="description" content=""><link rel="stylesheet" href="__PUBLIC__/layui/css/layui.css" /><link rel="shortcut icon" type="image/x-icon" href="__PUBLIC__/Images/favicon.ico"/><link href="__CSS__/bootstrap.min.css?v=3.4.0" rel="stylesheet"><link href="__PUBLIC__/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet"><link href="__CSS__/plugins/iCheck/custom.css" rel="stylesheet"><link href="__CSS__/plugins/summernote/summernote.css" rel="stylesheet"><link href="__CSS__/plugins/summernote/summernote-bs3.css" rel="stylesheet"><link rel="stylesheet" href="__CSS__/sweetalert.css"/><!-- Data Tables --><link href="__CSS__/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet"><link href="__CSS__/animate.css" rel="stylesheet"><link href="__CSS__/style.css?v=2.2.0" rel="stylesheet"><style>        .glyphicon,.add-on{cursor: pointer;}
    </style></head><body><!-- 修改密码模态框（Modal） --><div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content animated flipInY"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title" id="myModalLabel">修改密码</h4></div><div class="modal-body"><div id='pwd_alert' class="alert alert-warning" style="display: none;"><a href="#" class="close" data-dismiss="alert">                        &times;
                    </a></div><div><form class="form-horizontal"><div class="form-group"><label class="col-lg-3 control-label">新密码：</label><div class="col-lg-8"><input type="password" placeholder="新密码" id="new_pwd" class="form-control"></div></div><div class="form-group"><label class="col-lg-3 control-label">确认新密码：</label><div class="col-lg-8"><input type="password" placeholder="确认新密码" id="ok_new_pwd" class="form-control"></div></div></form></div></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal" id='close'>关闭</button><button type="button" class="btn btn-primary" id="update_upwd">提交更改</button></div></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div><!--页面显示全部--><div id="wrapper"><!-- 左边导航部分/.modal --><!-- 左边导航部分/.modal --><nav class="navbar-default navbar-static-side" role="navigation"><div class="sidebar-collapse"><ul class="nav" id="side-menu"><li class="nav-header"><div class="dropdown profile-element"><span><img alt="image" class="img-circle" style="width:64px;height: 64px"/></span><a data-toggle="dropdown" class="dropdown-toggle" href="index.html#"><span class="clear"><span class="block m-t-xs"><strong
                                            class="font-bold">Admin</strong></span><span class="text-muted text-xs block">超级管理员 <b class="caret"></b></span></span></a><ul class="dropdown-menu person_ziliao animated fadeInRight m-t-xs"><li><a class="head">修改头像</a></li><li><a class="person">个人资料</a></li><li><a href="#" data-toggle="modal" data-target="#myModal">修改密码</a></li><li class="divider"></li><li><a href="__APP__/Login/">安全退出</a></li></ul></div><div class="logo-element">                        Admin
                    </div></li><li><a href="#"><i class="fa fa-th-large"></i><span class="nav-label">理论教学信息</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/Lilun">理论教学信息</a></li></ul></li><li><a href="#"><i class="fa fa-columns"></i><span class="nav-label">实践教学信息</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/Shijian">实践教学</a></li></ul></li><li><a href="#"><i class="fa fa-flask"></i><span class="nav-label">毕业设计管理</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/Bishe">毕设管理</a></li></ul></li><li><a href="#"><i class="fa fa fa-globe"></i><span class="nav-label">额外信息管理</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/Ewai">额外工作量</a></li></ul></li><li><a href="#"><i class="fa fa-bar-chart-o"></i><span class="nav-label">工作量分配图</span><span
                            class="fa arrow"></span></a><ul class="nav nav-second-level"><li><a href="__APP__/Tubiao">分配图表</a></li><li><a href="__APP__/Tongji">统计图</a></li></ul></li><li><a href="#"><i class="fa fa-envelope"></i><span class="nav-label">邮箱 </span><span
                            class="label label-warning pull-right">16</span></a><ul class="nav nav-second-level"><li><a href="__APP__/Xiexin">写信</a></li><li><a href="__APP__/Shoujian">收件箱</a></li></ul></li><li><a href="#"><i class="fa fa-laptop"></i><span href="__APP__/Xitong">系统帮助</span></a></li></ul></div></nav><!--右边显示部分--><div id="page-wrapper" class="gray-bg dashbard-1"><!--顶部导航栏--><div class="row border-bottom"><nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0"><div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i></a><form role="search" class="navbar-form-custom" method="post" action="search_results.html"><div class="form-group"><input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search"
                                   id="top-search"></div></form></div><ul class="nav navbar-top-links navbar-right"><li><span class="m-r-sm text-muted welcome-message"><a href="index.html" title="返回首页"><i
                                        class="fa fa-home"></i></a>欢迎使用教师工作量管理系统</span></li><li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="label label-warning">0</span></a><ul class="dropdown-menu dropdown-messages"><li><div class="text-center link-block"><a href="__APP__/Shoujian"><i class="fa fa-envelope"></i><strong> 查看所有消息</strong></a></div></li></ul></li><li><a href="__APP__/Login/"><i class="fa fa-sign-out"></i> 退出
                        </a></li></ul></nav></div><!--用户管理--><div id="person" class="right" style="display: none;"><div class="row wrapper border-bottom white-bg page-heading"><div class="col-lg-12"><h2>用户管理</h2><ol class="breadcrumb"><li><a href="index.html">主页</a></li><li><strong>个人资料</strong></li></ol></div></div><div class="wrapper wrapper-content animated fadeInRight"><div class="row"><div class="col-lg-12"><div class="ibox float-e-margins"><div class="ibox-title"><h5>个人资料</h5><div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a><a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#"><i class="fa fa-wrench"></i></a><ul class="dropdown-menu dropdown-user"><li><a href="#">选项1</a></li><li><a href="#">选项2</a></li></ul><a class="close-link"><i class="fa fa-times"></i></a></div></div><div class="ibox-content"><small>首次登录必须完善信息后才可执行其他操作! <font color="red">点击小铅笔进行编辑操作,修改完毕请点击小铅笔进行保存!</font></small><div class="row"><div class="panel-body"><div class="form-horizontal"><div class="form-group"><label class="col-sm-2 control-label h5">								                    编号 </label><div class="col-sm-6"><input type="text" class="form-control" disabled='disabled' id="id" title="编号"/></div></div><div class="form-group"><label class="col-sm-2 control-label h5">								                    所属院系</label><div class="col-sm-6"><input type="text" class="form-control" disabled='disabled' id="xueyuan" title="所属学院"/></div></div><div class="form-group"><label class="col-sm-2 control-label h5">								                    教师姓名</label><div class="col-sm-6"><input type="text" class="form-control" disabled='disabled' id="name" title="教师姓名"/></div><span class="help-inline col-sm-2 "><i
								                                class="fa fa-info-circle"></i> 不可修改 </span></div><div class="form-group"><label class="col-sm-2 control-label h5">								                    性别 </label><div class="col-sm-6"><div class="input-group"><select class="form-control" id="sex" title="性别" disabled='disabled'><option value="0">未知</option><option value="男">男</option><option value="女">女</option></select><span class="input-group-addon add-on"><i class="glyphicon glyphicon-pencil"></i></span></div></div></div><div class="form-group"><label class="col-sm-2 control-label h5">								                    职称</label><div class="col-sm-6"><input type="text" class="form-control" disabled='disabled' id="clazz" title="职称"/></div></div><div class="form-group"><label class="col-sm-2 control-label h5">								            学历</label><div class="col-sm-6"><input type="text" class="form-control" disabled='disabled' id="xueli" title="学历"/></div></div><div class="form-group"><label class="col-sm-2 control-label h5">								                    联系方式 </label><div class="col-sm-6"><div class="input-group"><input type="text" class="form-control" disabled='disabled' id="phone" title="联系方式"/><span class="input-group-addon add-on"><i class="glyphicon glyphicon-pencil"></i></span></div></div><span class="help-inline col-sm-4"><i class="fa fa-info-circle"></i>								                    此项为必填项  此项为空将不能执行任何操作
								                </span></div><div class="form-group"><label class="col-sm-2 control-label h5">								                    电子邮箱 </label><div class="col-sm-6"><div class="input-group"><input type="text" class="form-control" disabled='disabled' id="email" title="电子邮箱"/><span class="input-group-addon add-on"><i class="glyphicon glyphicon-pencil"></i></span></div></div></div></div></div></div></div></div></div></div></div></div><!--富头像编辑器--><div id="head" class="right" style="display: none;"><div class="row wrapper border-bottom white-bg page-heading"><div class="col-lg-10"><h2>富头像上传编辑器</h2><ol class="breadcrumb"><li><a href="index.html">主页</a></li><li><a>表单</a></li><li><strong>头像上传编辑</strong></li></ol></div><div class="col-lg-2"></div></div><div class="wrapper wrapper-content"><div class="row"><div class="col-lg-12"><div class="ibox float-e-margins"><div class="ibox-title"><h5>头像上传编辑</h5><div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a><ul class="dropdown-menu dropdown-user"><li><a href="form_editors.html#">选项1</a></li><li><a href="form_editors.html#">选项2</a></li></ul><a class="close-link"><i class="fa fa-times"></i></a></div></div><div class="ibox-content"><ul class="nav nav-tabs" id="avatar-tab"><li class="active" id="upload"><a href="javascript:;">本地上传</a></li><li id="webcam"><a href="javascript:;">视频拍照</a></li><li id="albums"><a href="javascript:;">相册选取</a></li></ul><div class="m-t m-b"><div id="flash1"><p id="swf1">本组件需要安装Flash Player后才可使用，请从
                                            <a href="http://www.adobe.com/go/getflashplayer">这里</a>下载安装。</p></div><div id="editorPanelButtons" style="display:none"><p class="m-t"><label class="checkbox-inline"><input type="checkbox" id="src_upload">是否上传原图片？</label></p><p><a class="btn btn-w-m btn-primary button_upload"><i
                                                    class="fa fa-upload"></i> 上传</a><a href="javascript:;" class="btn btn-w-m btn-white button_cancel">取消</a></p></div><p id="webcamPanelButton" style="display:none"><a href="javascript:;" class="btn btn-w-m btn-info button_shutter"><i
                                                class="fa fa-camera"></i> 拍照</a></p><div id="userAlbums" style="display:none"><a href="__PUBLIC__/Images/a1.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a1.jpg" alt="示例图片1"/></a><a href="__PUBLIC__/Images/a2.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a2.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a3.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a3.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a4.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a4.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a5.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a5.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a6.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a6.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a7.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a7.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a8.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a8.jpg" alt="示例图片2"/></a><a href="__PUBLIC__/Images/a9.jpg" class="fancybox" title="选取该照片"><img src="__PUBLIC__/Images/a9.jpg" alt="示例图片2"/></a>></div></div></div></div></div></div></div></div><!--底部--><div class="footer"><!--<div class="pull-right">                By：
                <a href="#" target="_blank">大康</a></div>--><div><strong>Copyright</strong> 中原工学院软件学院 &copy; 2017
            </div></div><!--核算图表--><div id="tubiao" class="right" style="display: block" ;><div class="row wrapper border-bottom white-bg page-heading"><div class="col-lg-12"><h2>工作量分配图</h2><ol class="breadcrumb"><li><a href="index.html">主页</a></li><li><a>工作量分配图</a></li></ol></div></div><div class="wrapper wrapper-content animated fadeInRight"><div class="row"><div class="col-lg-12 data_show"><div class="ibox float-e-margins"><div class="ibox-title"><h5>数据展示</h5><div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a><a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#"><i class="fa fa-wrench"></i></a><ul class="dropdown-menu dropdown-user"><li><a href="#">选项1</a></li><li><a href="#">选项2</a></li></ul><a class="close-link"><i class="fa fa-times"></i></a></div></div><div class="ibox-content"><div class="col-sm-3 m-b-xs"><select class="input-sm form-control input-s-sm inline" name="" id="show_type"><option value="column2d">column2d</option><option value="column3d">column3d</option><option value="bar2d">bar2d</option><option value="bar3d">bar3d</option><option value="pie2d">pie2d</option><option value="pie3d">pie3d</option><option value="doughnut2d">doughnut2d</option><option value="doughnut3d">doughnut3d</option></select></div><a href="__PUBLIC__/Download/detail_hesuan.doc" class="pull-right">核算详细过程</a><button type="button" class="btn btn-outline btn-primary get_show_type">确定</button><div style="text-align: center;margin-top: 1em;font-size:2em">
									教师工作量分配图表
								</div><div id="container-teach-work-svg" style="text-align: center;margin-top: 2em;position: relative;"><button type="button" class="btn btn-outline btn-primary show1">提交核算</button><br /><b style="color: red;">特别提示：</b><span style="color: #F43838;">点击此按钮前请确定你的工作量是否已经全部审核完毕，此按钮只能点击一次。</span></div><br /><div id='detail_table' style="display: none" ;>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;工作量明细：
									<table id="work_num_add" class="table table-striped table-bordered table-hover"><thead><tr><th class="text-center">学期</th><th class='text-center'>姓名</th><th class='text-center'>理论教学</th><th class='text-center'>实验教学</th><th class='text-center'>实践教学</th><th class='text-center'>补贴</th><th class='text-center'>额外工作量</th><th class='text-center'>额定工作量</th><th class='text-center'>完成工作量</th><th class='text-center'>是否达标</th></tr></thead></table><ul class="tree"><li><span class="opened" onclick="toggle(this)">理论教学</span><ul class="show"><li>
													您的理论教学工作量是：<span class="ll"></span><table id="lilun" class="table table-striped table-bordered table-hover"><thead><tr><th class='text-center'>课程名</th><th class='text-center'>课程类型</th><th class='text-center'>学时</th><th class='text-center'>周数</th><th class='text-center'>班级</th><th class='text-center'>额定人数</th><th class='text-center'>实际人数</th><th class='text-center'>重修</th><th class='text-center'>核心课程</th><th class='text-center'>优质课程</th><th class='text-center'>系数K</th><th class='text-center'>系数R</th><th class='text-center'>系数N</th><th class='text-center'>工作量</th></tr></thead></table></li></ul></li><li><span class="opened" onclick="toggle(this)">实验教学</span><ul class="show"><li>
													您的实验教学工作量是：<span class="sy"></span><table id="shiyan" class="table table-striped table-bordered table-hover"><thead><tr><th class='text-center'>课程名</th><th class='text-center'>专业</th><th class='text-center'>课程类型</th><th class='text-center'>班级</th><th class='text-center'>考核方式</th><th class='text-center'>学生人数</th><th class='text-center'>总学时</th><th class='text-center'>实验学时</th><th class='text-center'>实验类型</th><th class='text-center'>工作量</th></tr></thead></table></li></ul></li><li><span class="opened" onclick="toggle(this)">实践教学</span><ul class="show"><li><span class="opened" onclick="toggle(this)">您的实践工作量是： <span class="sj"></span></span><ul><br /><li><span class="opened" onclick="toggle(this)">您的课程设计工作量是： <span class="ks"></span></span><table id="keshe" class="table table-striped table-bordered table-hover"><thead><tr><th class="text-center">环节</th><th class="text-center">学分</th><th class='text-center'>环节类别</th><th class='text-center'>年级</th><th class='text-center'>专业</th><th class='text-center'>行政班级</th><th class='text-center'>学生人数</th><th class='text-center'>环节周数</th><th class='text-center'>起止周数</th><th class='text-center'>工作量</th></tr></thead></table></li><li><span class="opened" onclick="toggle(this)">您的毕设工作量是： <span class="bs"></span></span><table id="bishe" class="table table-striped table-bordered table-hover"><thead><tr><th class="text-center">学期</th><th class='text-center'>学院</th><th class='text-center'>学生班级</th><th class='text-center'>学号</th><th class='text-center'>姓名</th><th class='text-center'>毕业设计课题名称</th><th class='text-center'>类型</th></tr></thead></table></li></ul></li></ul></li><li><span class="opened" onclick="toggle(this)">额外工作量</span><ul class="show"><br /><li>
													您的额外工作量是：<span></span><table id="ext_work" class="table table-striped table-bordered table-hover"><thead><tr><th class="text-center">学期</th><th class='text-center'>工作量名称</th><th class='text-center'>工作量值</th></tr></thead></table></li></ul></li><li><span class="opened" onclick="toggle(this)">补贴</span><ul class="show"><li>
													您的补贴是：<span class="butie"></span></li></ul></li></ul></div></div></div></div></div></div></div></div></div><!-- Mainly scripts --><script src="__PUBLIC__/layui/layui.js"></script><script src="__JS__/jquery-2.1.1.min.js"></script><script src="__JS__/bootstrap-typeahead.js"></script><script src="__JS__/bootstrap.min.js?v=3.4.0"></script><script src="__JS__/plugins/metisMenu/jquery.metisMenu.js"></script><script src="__JS__/plugins/slimscroll/jquery.slimscroll.min.js"></script><script src="__JS__/sweetalert.min.js"></script><script src="__JS__/nav.js"></script><!--<script src="js/plugins/jeditable/jquery.jeditable.js"></script>--><!-- svg prictur --><script src="__JS__/fusioncharts.js"></script><script src="__JS__/fusioncharts.charts.js"></script><!-- Data Tables --><script src="__JS__/plugins/dataTables/jquery.dataTables.js"></script><script src="__JS__/plugins/dataTables/dataTables.bootstrap.js"></script><!-- Custom and plugin javascript --><script src="__JS__/hplus.js?v=2.2.0"></script><script src="__JS__/plugins/pace/pace.min.js"></script><!-- fullavatareditor --><script type="text/javascript" src="__PUBLIC__/plugins/fullavatareditor/scripts/swfobject.js"></script><script type="text/javascript" src="__PUBLIC__/plugins/fullavatareditor/scripts/fullAvatarEditor.js"></script><script type="text/javascript" src="__PUBLIC__/plugins/fullavatareditor/scripts/jQuery.Cookie.js"></script><script type="text/javascript" src="__PUBLIC__/plugins/fullavatareditor/scripts/test.js"></script><!--<script src="js/content.min.js?v=1.0.0"></script>--><script src="__JS__/plugins/iCheck/icheck.min.js"></script><script src="__JS__/plugins/summernote/summernote.min.js"></script><script src="__JS__/plugins/summernote/summernote-zh-CN.js"></script><script src="__JS__/chart.js"></script><script src="__JS__/Teacher.js"></script><script>	(function(){
		$.ajax({
            url: "__APP__/Shoujian/isread?received="+localStorage.u_name,
            type: "POST",
            success: function (data) {
	            $(".label-warning")[1].innerHTML=data.length;
	            $(".label-warning")[0].innerHTML=data.length;
            }
       });
	}());
</script><script>
	function toggle(span) {
		//如果当前span的class为opened
		if(span.className == "opened") {
			//将span的class改为closed
			span.className = "closed";
			//将span的下一个兄弟元素的class改为hide
			span.nextElementSibling.className = "hide";
		} else { //否则
			//查找class为tree的元素下的class为opened的span，保存在变量openSpan
			var openSpan =
				document.querySelector(".tree .opened");
			//			if(openSpan) { //如果openSpan找到
			//				//将openSpan的class改为closed
			//				openSpan.className = "closed";
			//				//将openSpan的下一个兄弟元素的class改为hide
			//				openSpan.nextElementSibling
			//					.className = "hide";
			//			}
			//将span的class改为open
			span.className = "opened";
			//将span的下一个兄弟元素的class改为show
			span.nextElementSibling.className = "show";
		}
	}
</script><script>
	//绘制教师工作量图表
	var list, p = false;
	$(".get_show_type").on("click", show)
	$(".show1").one("click", function() {
		p = true;
		$("#work_num_add").dataTable({
			"ajax": "__URL__/tabledata?name=" + localStorage.u_name,
			"paging": false,
			"ordering": false,
			"info": false,
			'searching': false,
			"scrollX": true,
		});
		$.ajax({
			url: "__URL__/hesuan.php?name=" + localStorage.u_name,
			type: "POST",
			success: function(data) {
				list = eval(data);
				console.log(list);
			}
		})
		window.location = "__URL__"
	})

	function show() {
		if(p) {
			//工作量总核算数据加载
			var type = $("#show_type").val();
			var width = parseInt($("body").width() / 1.68);
			var fc = new FusionCharts({
				type: type, //column2d、column3d、bar2d、bar3d、pie2d、pie3d、doughnut2d、doughnut3d
				width: width,
				height: '400',
				dataSource: { //指定数据源
					data: list
				}
			});
			fc.render('container-teach-work-svg'); //指定渲染在哪个容器中

		} else {
			alert("请先进行核算!!!");
		}

	}
	$.ajax({
		url: "__URL__/canvas.php?name=" + localStorage.u_name,
		type: "POST",
		success: function(data) {
			list = eval(data);
			if(list[0].value) {
				$("#container-teach-work-svg").html("此处是显示教师工作量核算数据的.")
				$("#work_num_add").dataTable({
					"ajax": "__URL__/tabledata?name=" + localStorage.u_name,
					"paging": false,
					"ordering": false,
					"info": false,
					'searching': false,
					"scrollX": true,
				});
				p = true;

				$("#detail_table").css("display", "block");

				function loadling(val) {
					$("#" + val).dataTable({
						"paging": false,
						"ordering": false,
						"info": false,
						'searching': false,
						"ajax": "__URL__/" + val + "?name=" + localStorage.u_name,
						"scrollX": true,
					});
				}
				//额外工作量数据信息加载
				loadling("ext_work");
				//理论工作量数据信息加载
				loadling("lilun");
				//毕业设计数据信息加载
				loadling("bishe");
				//毕业设计数据信息加载
				loadling("shiyan");

				window.onload = function() {
					$('td').addClass('text-center');
					//  	额外工作量核算
					var ext_val = 0;
					$("#ext_work tbody tr td:last-child").each(function() {
							ext_val += parseInt($(this).html());
						})
						//	判断浏览器的宽度
					if(document.body.clientWidth > 1000) {
						//毕业设计数据信息加载
						$('#keshe').dataTable({
							"paging": false,
							"ordering": false,
							"info": false,
							'searching': false,
							"ajax": "__URL__/keshe" + "?name=" + localStorage.u_name,
						});
					}else{
						//毕业设计数据信息加载
						$('#keshe').dataTable({
							"paging": false,
							"ordering": false,
							"info": false,
							'searching': false,
							"ajax": "__URL__/keshe" + "?name=" + localStorage.u_name,
							"scrollX": true,
						});
					}

					$.ajax({
						url: "__URL__/showdata?name=" + localStorage.u_name,
						type: "POST",
						success: function(data) {
							$(".ks").html("<B style='color: chocolate;'>" + data[0].keshe + "</B>");
							$("#ext_work").parent().prev().html("<B style='color: crimson;'>" + ext_val + "</B>");
							//  	补贴
							$(".butie").html("<B style='color: crimson;'>" + $("#work_num_add tbody tr td:eq(5)").html() + "</B>");
							//  	毕设
							$(".bs").html("<B style='color: chocolate;'>" + data[0].bishe + "</B>");
							$(".sj").html("<B style='color: crimson;'>" + data[0].w_graduation + "</B>");
							$(".ll").html("<B style='color: crimson;'>" + $("#work_num_add tbody tr td:eq(2)").html() + "</B>");
							$(".sy").html("<B style='color: crimson;'>" + $("#work_num_add tbody tr td:eq(3)").html() + "</B>");
						}
					});
				}

				show();
			}

		}
	});
</script></body></html>