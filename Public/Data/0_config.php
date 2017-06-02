<?php
/**此页面需要被其它页面包含**/
$db_url = '192.168.191.1';
$db_user = "root";
$db_pwd = '';
$db_name = 'teacher';
$db_port = 3306;

$conn = mysqli_connect($db_url, $db_user, $db_pwd, $db_name, $db_port);
//设置编码方式
$sql = "SET NAMES UTF8";
mysqli_query($conn, $sql);