$().ready(function () {
    //理论教学数据信息加载
    $('#table_teach_info_pass').dataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": '<span title="修改"class="glyphicon glyphicon-pencil update" data-toggle="modal" data-target="#add_class">&nbsp;</span> <span title="删除" class="glyphicon glyphicon-trash del_lilun"></span>'
        }],
        "ajax": "data/start_loading_data.php?num="+3+"&name="+localStorage.u_name,
    });
})
