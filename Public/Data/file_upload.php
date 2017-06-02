<?php
//得到的数据库名称
$data_table=$_REQUEST["data_table"];
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

if($data_table=="teach_task"){
            /**从第五行开始输出，因为excel表中第一行为列名*/
            for($currentRow = 5;$currentRow <= $allRow;$currentRow++){
            /**从第A列开始输出*/
            $s=array();
            for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){
            $val= $currentSheet->getcellbycolumnandrow(ord($currentColumn) - 65,$currentRow)->getValue();/**ord()将字符转为十进制数*/

            $s[]=$val;
            }
                        $sql = "insert into te_task (coures_name,credits,grade,pro,type1,type2,this_class,test_way,stu_num,total_hours,teach_hours,exper_hours,exper_type,weeks,teacher_name,note) values ('$s[1]','$s[2]','$s[3]','$s[4]','$s[5]','$s[6]','$s[7]','$s[8]','$s[9]','$s[10]','$s[11]','$s[12]','','$s[15]','$s[18]','$s[21]')";
                       $result=mysqli_query($conn, $sql);

            //echo $s[1];
            }
        }else if($data_table=="gradution"){
            /**从第五行开始输出，因为excel表中第一行为列名*/
            for($currentRow = 5;$currentRow <= $allRow;$currentRow++){
            /**从第A列开始输出*/
            $s=array();
            for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){
            $val= $currentSheet->getcellbycolumnandrow(ord($currentColumn) - 65,$currentRow)->getValue();/**ord()将字符转为十进制数*/

            $s[]=$val;
            }
                        $sql = "INSERT INTO `gradution`(`g_id`, `g_term`, `g_institute`, `g_sclass`, `g_snumber`, `g_sname`, `u_name`,`u_role`, `g_project`, `g_note`) VALUES (null,'2016-2107','$s[0]','$s[1]','$s[2]','$s[3]','$s[4]','$s[5]','$s[6]','$s[13]')";
                       $result=mysqli_query($conn, $sql);
            }
        }else if($data_table=="class_info"){
             /**从第五行开始输出，因为excel表中第一行为列名*/
                        for($currentRow = 5;$currentRow <= $allRow;$currentRow++){
                        /**从第A列开始输出*/
                       	$s=array();
                        for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){
                        $val= $currentSheet->getcellbycolumnandrow(ord($currentColumn) - 65,$currentRow)->getValue();/**ord()将字符转为十进制数*/

                        $s[]=$val;
                        }
                                    $sql = "INSERT INTO `pra_work`(`id`,`p_link`, `p_score`, `p_type`, `p_class`, `p_major`, `p_a_class`, `p_stunum`, `p_week`, `p_start`, `p_teacher`, `p_where`, `p_need`, `p_note`) VALUES(null,'$s[1]','$s[2]','$s[3]','$s[4]','$s[5]','$s[6]','$s[7]','$s[8]','$s[9]','$s[10]','$s[11]','$s[12]','$s[13]')";
                                   $result=mysqli_query($conn, $sql);
                        }
        }
if($result){
    echo "data_into_succ";
}
?>