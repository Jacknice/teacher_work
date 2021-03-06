<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit"><title>教师工作量核算系统</title><meta name="keywords" content=""><meta name="description" content=""><link rel="stylesheet" href="__PUBLIC__/layui/css/layui.css" /><link rel="shortcut icon" type="image/x-icon" href="__PUBLIC__/Images/favicon.ico"/><link href="__CSS__/bootstrap.min.css?v=3.4.0" rel="stylesheet"><link href="__PUBLIC__/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet"><link href="__CSS__/plugins/iCheck/custom.css" rel="stylesheet"><link href="__CSS__/plugins/summernote/summernote.css" rel="stylesheet"><link href="__CSS__/plugins/summernote/summernote-bs3.css" rel="stylesheet"><link rel="stylesheet" href="__CSS__/sweetalert.css"/><!-- Data Tables --><link href="__CSS__/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet"><link href="__CSS__/animate.css" rel="stylesheet"><link href="__CSS__/style.css?v=2.2.0" rel="stylesheet"><style>        .glyphicon,.add-on{cursor: pointer;}
    </style></head><body><!-- 修改密码模态框（Modal） --><div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content animated flipInY"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 class="modal-title" id="myModalLabel">修改密码</h4></div><div class="modal-body"><div id='pwd_alert' class="alert alert-warning" style="display: none;"><a href="#" class="close" data-dismiss="alert">                        &times;
                    </a></div><div><form class="form-horizontal"><div class="form-group"><label class="col-lg-3 control-label">新密码：</label><div class="col-lg-8"><input type="password" placeholder="新密码" id="new_pwd" class="form-control"></div></div><div class="form-group"><label class="col-lg-3 control-label">确认新密码：</label><div class="col-lg-8"><input type="password" placeholder="确认新密码" id="ok_new_pwd" class="form-control"></div></div></form></div></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal" id='close'>关闭</button><button type="button" class="btn btn-primary" id="update_upwd">提交更改</button></div></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div><!--页面显示全部--><div id="wrapper"><!-- 左边导航部分/.modal --><!-- 左边导航部分/.modal --><nav class="navbar-default navbar-static-side" role="navigation"><div class="sidebar-collapse"><ul class="nav" id="side-menu"><li class="nav-header"><div class="dropdown profile-element"><span><img alt="image" class="img-circle" style="width:64px;height: 64px"/></span><a data-toggle="dropdown" class="dropdown-toggle" href="index.html#"><span class="clear"><span class="block m-t-xs"><strong
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
            </div></div><!--收件箱--><div id="mailbox" class="right" style="display: block;"><div class="row wrapper border-bottom white-bg page-heading"><div class="col-lg-10"><h2>邮箱</h2><ol class="breadcrumb"><li><a href="index.html">主页</a></li><li><a>邮箱</a></li><li><strong>收件箱</strong></li></ol></div><div class="col-lg-2"></div></div><div class="wrapper wrapper-content"><div class="row"><div class="col-sm-12 animated fadeInRight"><div class="mail-box-header"><form method="get" action="index.html" class="pull-right mail-search"><div class="input-group"><input type="text" class="form-control input-sm" name="search"
                                           placeholder="搜索邮件标题，正文等"><div class="input-group-btn"><button type="submit" class="btn btn-sm btn-primary">                                            搜索
                                        </button></div></div></form><h2>                                收件箱 (16)
                            </h2><div class="mail-tools tooltip-demo m-t-md"><div class="btn-group pull-right"><button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button><button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button></div><button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left"
                                        title="刷新邮件列表"><i class="fa fa-refresh"></i> 刷新
                                </button><button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="标为已读"><i class="fa fa-eye"></i></button><button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="标为重要"><i class="fa fa-exclamation"></i></button><button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top"
                                        title="标为垃圾邮件"><i class="fa fa-trash-o"></i></button></div></div><div class="mail-box"><table class="table table-hover table-mail"><tbody></tbody></table></div></div></div></div></div><!--查看邮件--><div id="mail_detail" class="right" style="display: none;"><div class="row wrapper border-bottom white-bg page-heading"><div class="col-lg-10"><h2>邮箱</h2><ol class="breadcrumb"><li><a href="index.html">主页</a></li><li><a>邮箱</a></li><li><strong>收件箱</strong></li></ol></div><div class="col-lg-2"></div></div><div class="wrapper wrapper-content"><div class="row"><div class="row"><div class="col-sm-12 animated fadeInRight"><div class="mail-box-header"><h2>                                    查看邮件
                                </h2><div class="mail-tools tooltip-demo m-t-md"><h3><span class="font-noraml">主题： </span></h3><h5><span class="pull-right font-noraml"></span><span class="font-noraml">发件人： </span></h5></div></div><div class="mail-box"><div class="mail-body"></div><div class="mail-body text-right tooltip-demo"><a href="__APP__/Xiexin" class="btn btn-sm btn-white" title="back"><i class="fa fa-reply"></i>                                        回复</a><a class="btn btn-sm btn-white" title="next"><i
                                            class="fa fa-arrow-right"></i> 下一封</a><button title="" data-placement="top" data-toggle="tooltip"
                                            data-original-title="删除邮件" class="btn btn-sm btn-white"><i
                                            class="fa fa-trash-o"></i> 删除
                                    </button></div><div class="clearfix"></div></div></div></div></div></div></div></div></div><!-- Mainly scripts --><script src="__PUBLIC__/layui/layui.js"></script><script src="__JS__/jquery-2.1.1.min.js"></script><script src="__JS__/bootstrap-typeahead.js"></script><script src="__JS__/bootstrap.min.js?v=3.4.0"></script><script src="__JS__/plugins/metisMenu/jquery.metisMenu.js"></script><script src="__JS__/plugins/slimscroll/jquery.slimscroll.min.js"></script><script src="__JS__/sweetalert.min.js"></script><script src="__JS__/nav.js"></script><!--<script src="js/plugins/jeditable/jquery.jeditable.js"></script>--><!-- svg prictur --><script src="__JS__/fusioncharts.js"></script><script src="__JS__/fusioncharts.charts.js"></script><!-- Data Tables --><script src="__JS__/plugins/dataTables/jquery.dataTables.js"></script><script src="__JS__/plugins/dataTables/dataTables.bootstrap.js"></script><!-- Custom and plugin javascript --><script src="__JS__/hplus.js?v=2.2.0"></script><script src="__JS__/plugins/pace/pace.min.js"></script><!-- fullavatareditor --><script type="text/javascript" src="__PUBLIC__/plugins/fullavatareditor/scripts/swfobject.js"></script><script type="text/javascript" src="__PUBLIC__/plugins/fullavatareditor/scripts/fullAvatarEditor.js"></script><script type="text/javascript" src="__PUBLIC__/plugins/fullavatareditor/scripts/jQuery.Cookie.js"></script><script type="text/javascript" src="__PUBLIC__/plugins/fullavatareditor/scripts/test.js"></script><!--<script src="js/content.min.js?v=1.0.0"></script>--><script src="__JS__/plugins/iCheck/icheck.min.js"></script><script src="__JS__/plugins/summernote/summernote.min.js"></script><script src="__JS__/plugins/summernote/summernote-zh-CN.js"></script><script src="__JS__/chart.js"></script><script src="__JS__/Admin.js"></script><script>	(function(){
		$.ajax({
            url: "__APP__/Shoujian/isread?received="+localStorage.u_name,
            type: "POST",
            success: function (data) {
	            $(".label-warning")[1].innerHTML=data.length;
	            $(".label-warning")[0].innerHTML=data.length;
            }
        })
	}());
	
</script><script type="text/javascript">//发送邮件数据到客户端
    (function(){
        var received=localStorage.u_name;
        $.ajax({
                url: "__URL__/received?received="+received,
                type: "POST",
                success: function (data) {
//              	$(".label-warning")[1].innerHTML=data.length;
//              	$(".label-warning")[0].innerHTML=data.length;
                	var html="";
                	for(var i=0;i<data.length;i++){
                		var time=parseInt(data[i].sendtime);
                		var nDate = new Date(time);   //直接将毫秒数当参数传进去。
						var date=nDate.toLocaleTimeString();
                        if(data[i].isread=="是"){
                            html+=`<tr class="read"><td class="check-mail"><a title="已读" class="glyphicon glyphicon-eye-open"></a></td>`;
                        }else{
                            html+=`<tr class="unread"><td class="check-mail"><a title="未读" class="glyphicon glyphicon-eye-close"></a></td>                            `;
                        }
                		html+=`
                                    <td class="mail-ontact"><a>${data[i].send}</a></td><td class="mail-subject"><a>${data[i].theme}</a></td><td class=""><i class="fa fa-paperclip"></i></td><td class="text-right mail-date">${date}</td></tr>`;
                	}
                	$(".table-mail>tbody").html(html);
                }
            });
    }());
    //点击进入邮件详情页
    $(".table-mail").delegate("tr[class$='read']","click",emailDetail);
    function emailDetail(){
        if($(this).attr("class")=="unread"){
            $(this).attr("class","read").children(".check-mail").html("").html('<a title="已读" class="glyphicon glyphicon-eye-open"></a>');
        };
        var sendName=$(this).children(".mail-ontact").children().html();
        var sendObject=$(this).children(".mail-subject").children().html();
        $("#mailbox").css("display","none");
        $.ajax({
            url: "__URL__/emailDetail?sN="+sendName+"&sO="+sendObject,
            type: "POST",
            success: function (data) {
                var html="";
                var html1="";
                var time=parseInt(data[0].sendtime);
                var nDate = new Date(time);   //直接将毫秒数当参数传进去。
                var date=nDate.toLocaleDateString();
                var shijian=nDate.toLocaleTimeString().slice(2);
                var wh="";
                var Time=date.split("/");
                var weekDay = ["星期天", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];
                var dateStr = Time[0]+"-"+Time[1]+"-"+Time[2];
                var myDate = new Date(Date.parse(dateStr.replace(/-/g, "/")));
                hour = nDate.getHours()
                if(hour < 6){wh="凌晨好！"}
                else if (hour < 9){wh="早上"}
                else if (hour < 12){wh="上午"}
                else if (hour < 14){wh="中午"}
                else if (hour < 17){wh="下午"}
                else if (hour < 19){wh="傍晚"}
                else if (hour < 22){wh="晚上"}
                else {wh="夜里好！"}
                html+=` <h3><span class="font-noraml">主题： </span><a href="#">${data[0].theme}</a></h3><h5><span class="pull-right font-noraml">${Time[0]}年${Time[1]}月${Time[2]}日(${weekDay[myDate.getDay()]})${wh}${shijian}</span><span class="font-noraml">发件人： </span><a href="#">${data[0].send}</a></h5>`;
                html1=`${data[0].content}`;

                $(".mail-tools:eq(1)").html(html);
                $(".mail-box:eq(1)").children(".mail-body:eq(0)").html(html1);
            }
        });
        $("#mail_detail").css("display","block");
    }

//删除邮件
    $("button[data-original-title='删除邮件']").on("click",delectEmail);
    $("a[data-original-title='删除邮件']").on("click",delectEmail);
    function delectEmail(){
        var theme=$(".mail-tools:eq(1)").children("h3").children('a').html();
        var send=$(".mail-tools:eq(1)").children("h5").children('a').html();
        $.ajax({
            url: "__URL__/delemail?send="+send+"&theme="+theme+"&num="+2,
            dataType : 'text',
            type: "POST",
            success: function (data) {
                if(data==1){
                    alert("邮件删除成功!!!");
                    window.location = '__URL__';
                }
            }
        });
    };
</script></body></html>