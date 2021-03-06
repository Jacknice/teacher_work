<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"><title>教师工作量核算系统</title><meta name="keywords" content=""><meta name="description" content=""><link href="__CSS__/bootstrap.min.css" rel="stylesheet"><link href="__PUBLIC__/font-awesome/css/font-awesome.css" rel="stylesheet"><link href="__CSS__/plugins/iCheck/custom.css" rel="stylesheet"><link href="__CSS__/animate.css" rel="stylesheet"><link href="__CSS__/style.css" rel="stylesheet"><link rel="stylesheet" href="__CSS__/sweetalert.css"/></head><body class="gray-bg signin"><div class="middle-box text-center loginscreen  animated fadeInDown"><div><div><h2 style="width: 350px;position: relative; right: 1em;" class="center-block"><b>计算机学院教师工作量核算系统</b></h2></div><h3>管理端</h3><form class="m-t" id="login" action=""><div class="form-group"><input class="form-control loginuser" placeholder="用户名" name="username" required="" form="login"></div><div class="form-group"><input type="password" class="form-control loginpwd" placeholder="密码" name="password" required=""
                       form="login"></div><div class="form-group text-right"><div class="checkbox i-checks"><label class="no-padding"><input type="checkbox" id="remember"><i></i> 保存密码</label></div></div></form><button id="loginbtn" class=" btn btn-primary block full-width m-b">登 录</button><p class="text-muted text-center"><a href="login.html#"><small>忘记密码了？</small></a> |
            <a href="register.html">注册一个新账号</a></p></div></div><!-- Mainly scripts --><script src="__JS__/jquery-2.1.1.min.js"></script><script src="__JS__/bootstrap.min.js"></script><script src="__JS__/sweetalert.min.js"></script><!-- iCheck --><script src="__JS__/plugins/iCheck/icheck.min.js"></script><script type="text/javascript">
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
        if ((localStorage.uname) && (localStorage.upwd)) {
            $(".loginuser").val(localStorage.uname);
            $(".loginpwd").val(localStorage.upwd);
        }
        $("#loginbtn").on("click", function () {
            var uname = $("input[name='username']").val();
            var user_and_pwd = $('#login').serialize();
            var remberpwd = document.getElementById('remember').checked;
			localStorage.uname=uname;
            $.ajax({
                url: "__URL__/do_login",
                type: "POST",
                data: user_and_pwd,
                success: function (data) {
                    if (data != null) {
                        localStorage.u_id=data.data[0].u_id;
                        localStorage.u_name=data.data[0].u_name;
                        localStorage.u_role=data.data[0].u_role;
                        if (remberpwd) {
                            var datas = user_and_pwd.split("&");
                            for (var i = 0, d = []; i < datas.length; i++) {
                                d.push(datas[i].split("="));
                            }
                            localStorage.uname = d[0][1];
                            localStorage.upwd = d[1][1];
                        }
//                      document.cookie = "name=" + uname;
						window.location = '__APP__/Index/index';

                    } else {
                       swal("登录失败","您输入的用户名或密码错误","error")
                    }
                },
            });
        });
    });
</script></body></html>