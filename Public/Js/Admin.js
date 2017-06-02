	//选择未审核表格中的最后一行隐藏
	setTimeout(hide,500);
	function hide(){
	    $("#table_teach_info_nopass").find("tbody tr td:last-child").css("display","none");
	    $("#bishe_nopass").find("tbody tr td:last-child").css("display","none");
	    $("#gradution").find("tbody tr td:nth-child(11)").css("display","none");
	    $("#shijian_nopass").find("tbody tr td:last-child").css("display","none");
	};
	//头像加载
    (function(){
        var user_header=localStorage.uname;
        $("strong[class='font-bold']").html(localStorage.u_role);
        $(".logo-element").html(localStorage.u_name);
        $(".text-muted:first").html(localStorage.u_name);
        $(".img-circle:first").attr("src","/teacher_work/Uploads/"+user_header+".jpg");
    }());
    (function(){
    	if($("#teach_info_pass").length||$("#teach_info_nopass").length){
			$("#side-menu>li:nth-child(2)").addClass("active");
		}
    	if($("#shijian_work1").length||$("#shijian_work2").length){
			$("#side-menu>li:nth-child(3)").addClass("active");
		}
    	if($("#graduate_info_pass").length||$("#graduate_info_nopass").length){
			$("#side-menu>li:nth-child(4)").addClass("active");
		}
		if($("#extra_info_nopass").length||$("#extra_info_pass").length){
			$("#side-menu>li:nth-child(5)").addClass("active");
		}
		if($("#user_control").length){
			$("#side-menu>li:nth-child(6)").addClass("active");
		}
		if($("#course_control").length){
			$("#side-menu>li:nth-child(7)").addClass("active");
		}
		if($("#graduation_design").length){
			$("#side-menu>li:nth-child(8)").addClass("active");
		}
    	if($("#worknum_management").length){
			$("#side-menu>li:nth-child(9)").addClass("active");
		}
    	if($("#teach_info").length||$("#class_info").length||$("#bishe_info").length){
			$("#side-menu>li:nth-child(10)").addClass("active");
		}
    	if($("#mail_compose").length||$("#mailbox").length){
			$("#side-menu>li:nth-child(11)").addClass("active");
		}
    }());
    var sex = true;
    //加载个人信息
    $.ajax({
        url: "/teacher_work/admin.php/PersonInfo/loading?id="+localStorage.u_id,
        type: "POST",
        success: function (data) {
			$("#id").val(data.data[0].u_id);
			$("#xueyuan").val(data.data[0].u_institue);
			$("#name").val(data.data[0].u_name);
			if(data.data[0].u_gender=="女"){
				$("#sex option:last-child").attr("selected","selected");
			}else if(data.data[0].u_gender=="男"){
				$("#sex option:eq(1)").attr("selected","selected");
			}else{
				sex = false;
			}
			$("#clazz").val(data.data[0].u_role);
			$("#xueli").val(data.data[0].u_sdept);
			$("#phone").val(data.data[0].u_phone);
			$("#email").val(data.data[0].u_mail);
        }
    });
	//修改个人信息
	$(".add-on").on("click",function(){
		var target=$(this);
		if(sex) {
			if(target.prev().val()==0){
				alert("选择错误,请重新选择!!!");
				return;
			}
		}
		var att=target.prev().attr("disabled");
		if(att=="disabled"){
			target.prev().prop("disabled", false);
		}else{
			target.prev().prop("disabled",true);
			var id=target.prev().attr("id");
			var value=target.prev().val();
			$.ajax({
            url: "/teacher_work/admin.php/PersonInfo/update",
            data:"id="+id+"&value="+value+"&name="+localStorage.u_name,
            type: "POST",
            success: function (data) {
                if(data==1){
                    alert("修改成功!!!");
                }
            }
        });
		}
	})
    