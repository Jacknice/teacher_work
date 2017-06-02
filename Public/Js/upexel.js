//上传xls文件
(function(){
	 $("[id^='up_file']").on('click', function () {
        var upload_id = $(this).attr("id");
        var data_table = '';
        if (upload_id == "up_file_0") {
            var fileObj = document.getElementById("f").files[0];
            data_table = "teach_task";
        } else if (upload_id == "up_file_1") {
            var fileObj = document.getElementById("k").files[0];
            data_table = "gradution";
        } else if (upload_id == "up_file_2") {
            var fileObj = document.getElementById("j").files[0];
            data_table = "class_info";
        }
        //var fileObj = document.getElementById("f").files[0];
        var formData = new FormData();
        formData.append("file", fileObj);
        //console.log(fileObj);
        $.ajax({
            url: "../../Public/Data/file_upload.php?data_table=" + data_table,
            type: "POST",
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data === "data_into_succ") {
                    alert("用户数据导入成功!!!");
                }
            },
            error: function (data) {
                alert("用户数据导入失败!!!");
                //                    $( '#serverResponse').html(data.status + " : " + data.statusText + " : " + data.responseText);
            }
        });
    });
     $("#upUsers").on('click', function () {
     	alert("ss");
        var fileObj = document.getElementById("k").files[0];
        var formData = new FormData();
        formData.append("file", fileObj);
        //console.log(fileObj);
        $.ajax({
            url: "../Public/Data/upUsers.php",
            type: "POST",
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data === "data_into_succ") {
                    alert("用户数据导入成功!!!");
                }else if(data === "no Excel"){
                	alert("请添加上传文件！！！")
                }
            },
            error: function (data) {
                alert("用户数据导入失败!!!");
            }
        });
    });
    
}())
   