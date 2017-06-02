<?php

//保存文件到file下
if ($_FILES["file"]["error"] > 0) 
{ 
echo "Return Code: " . $_FILES["file"]["error"] . "<br />"; 
} 
else 
{
if (file_exists("../../Uploads/file/" . $_FILES["file"]["name"]))
{ 
//echo $_FILES["file"]["name"] . " already exists. ";
} 
else 
{ 
move_uploaded_file($_FILES["file"]["tmp_name"], 
"../../Uploads/file/" . $_FILES["file"]["name"]);
//echo "Stored in: " . "../file/" . $_FILES["file"]["name"];
} 
} 


include('0_config.php'); //包含指定文件的内容在当前位置
require_once '../Classes/PHPExcel.php';
/**对excel里的日期进行格式转化*/
function GetData($val){
$jd = GregorianToJD(1, 1, 1970);
$gregorian = JDToGregorian($jd+intval($val)-25569);
//return $gregorian;/**显示格式为 “月/日/年” */
}

$filePath = "../../Uploads/file/" . $_FILES["file"]["name"];
$PHPExcel = new PHPExcel();

/**默认用excel2007读取excel，若格式不对，则用之前的版本进行读取*/
$PHPReader = new PHPExcel_Reader_Excel2007();
if(!$PHPReader->canRead($filePath)){
$PHPReader = new PHPExcel_Reader_Excel5();
if(!$PHPReader->canRead($filePath)){
echo 'no Excel';
return ;
}
}

$PHPExcel = $PHPReader->load($filePath);
/**读取excel文件中的第一个工作表*/
$currentSheet = $PHPExcel->getSheet(0);
/**取得最大的列号*/
$allColumn = $currentSheet->getHighestColumn();
/**取得一共有多少行*/
$allRow = $currentSheet->getHighestRow();

            /**从第五行开始输出，因为excel表中第一行为列名*/
            for($currentRow = 3;$currentRow <= $allRow;$currentRow++){
            /**从第A列开始输出*/
            $s=array();
            for($currentColumn= 'B';$currentColumn<= $allColumn; $currentColumn++){
            $val= $currentSheet->getcellbycolumnandrow(ord($currentColumn) - 65,$currentRow)->getValue();/**ord()将字符转为十进制数*/
            $s[]=$val;
            }
            $sql="INSERT INTO `te_name`(`u_id`, `u_institue`,`u_depart`,`u_role`, `u_name`, `u_password`, `u_sdept`, `u_gender`, `u_phone`) VALUES (null,'计算机学院','$s[2]','$s[11]','$s[3]','123456','$s[10]','$s[4]','$s[0]')";
//          echo $currentSheet->getcellbycolumnandrow(ord("A") - 65,1)->getValue();;
            $result=mysqli_query($conn, $sql);

            }
if($result){
    echo "data_into_succ";
}
?>