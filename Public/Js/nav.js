$(document).ready(function () {
	
    //修改密码
    $("#update_upwd").on("click", function () {
        if (($("#ok_new_pwd").val()) === ($("#new_pwd").val())) {
            $.ajax({
                url: "/teacher_work/index.php/PassWord/update",
                type: "POST",
                data: "ok_new_pwd="+ $("#ok_new_pwd").val()+"&id="+localStorage.u_id,
                success: function (data) {
                    if (data == 1) {
                        $("#pwd_alert > p").html('');
                        $("#pwd_alert").removeClass("alert-warning").addClass("alert-success").css("display", "block").append('<p><strong>恭喜！</strong>密码修改成功!!!</p>');
                    }else if(data==0){
                    	$("#pwd_alert > p").html('');
                    	$("#pwd_alert").removeClass("alert-warning").addClass("alert-warning").css("display", "block").append('<p><strong>警告！</strong>请不要修改和最近相同的密码!!!</p>');
                    }
                },
            });
        } else {
            $("#pwd_alert > p").html('');
            $("#pwd_alert").removeClass("alert-warning").addClass("alert-warning").css("display", "block").append('<p><strong>警告！</strong>两次密码输入不一样!!!</p>');
        }
    });
    //一键换肤
    //从localStorge中读取mainStyle样式
    function read_style() {
        var mainStyle = localStorage.getItem("mainStyle");
        if (mainStyle != "undefined") {
            $("body").removeClass().addClass(mainStyle);
        }
        setTimeout(read_style, 1000);
    }

    read_style();
    //向localStorge中写入mainStyle样式
    function write_style() {
        var bodyClass = $("body").attr('class');
        if (bodyClass !== " pace-running") {
            localStorage.setItem("mainStyle", bodyClass);
        }
        setTimeout(write_style, 50);
    }

    write_style();
    //导航栏链接
    function navlink() {
        var target = "#" + $(this).attr("class");
        $(".right").css("display", "none");
        $(target).css("display", "block");
    }

    $(".navbar-default .nav > li > a").on("click", navlink);
    $(".person_ziliao > li > a").on("click", navlink);
    $(".nav.navbar-top-links .link-block a").on("click", navlink);
    //头像上传实时刷新
    function head() {
        var user=localStorage.uname;
        $.ajax({
            url: "/teacher_work/Uploads/"+user+".jpg",
            type: "POST",
            success: function (data) {
                $(".img-circle:first").removeAttr("src").attr("src", "/teacher_work/Uploads/"+user+".jpg");
            }
        })
    }

    function header() {
        timeId = setTimeout(head, 1000);
    }

    $(".button_upload").on("click", header);
    //全选按钮
    $("input[data-check^='check']").on('click', function () {
        var str1 = "." + $(this).attr("data-check");
        var box = $(this).prop("checked");
        if (box) {
            $(str1).prop("checked", true);
        } else {
            $(str1).prop("checked", false);
        }
    });
    
    
 	var th=null;
    //判断修改和删除按钮能不能点击
	var time=setInterval(panduan,2000);
	function panduan(){
		function inner(c1,c2,c3){
			$(`#${c1}`).find(`tbody tr td:nth-child(${c2})`).each(function(indx,val){
				if($(this).html()=="已加入核算"){
					$(this).next().css("cursor","not-allowed");
					$(this).next().children().css({"cursor":"not-allowed","color":"#ccc"}).removeAttr("data-target").removeClass(`${c3}`);
				}
			});
		}
		inner("bishe",9,"del_bishe");
		if(time>5){
			clearInterval(time);
		}
	}
	
});
window.onload =function(){$('td').addClass('text-center')}