<?php
   include '../Classes/PHPExcel.php';
   include('0_config.php'); //包含数据库配置文件的内容在当前位置
   //创建对象
   $excel = new PHPExcel();
   //Excel表格式,这里简略写了8列
   $letter = array('A','B','C','D','E','F','F','G','H','I');
   //表头数组
   $tableheader = array('学期','姓名','理论工作量','实验工作量','实践工作量','补贴','额外工作量','额定工作量','完成工作量','是否达标');
   //填充表头信息
   for($i = 0;$i < count($tableheader);$i++) {
   $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
   }

   //表格数组
    $sql = "SELECT  `u_id`, `w_term`, `w_course`, `w_cdesign`, `w_graduation`, `w_allowance`, `w_dynamic`, `w_stipulate`, `w_workload`, `w_iscomplete` FROM `workload` ";
          $result = mysqli_query($conn,$sql);
          $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
           $data = array();
          for($i=0;$i<count($result);$i++) {
              $data[$i][0]=$result[$i]['w_term'];
              $data[$i][1]=$result[$i]['u_id'];
              $data[$i][2]=$result[$i]['w_course'];
              $data[$i][3]=$result[$i]['w_cdesign'];
              $data[$i][4]=$result[$i]['w_graduation'];
              $data[$i][5]=$result[$i]['w_allowance'];
              $data[$i][6]=$result[$i]['w_dynamic'];
              $data[$i][7]=$result[$i]['w_stipulate'];
              $data[$i][8]=$result[$i]['w_workload'];
              $data[$i][9]=$result[$i]['w_iscomplete'];
          }
   //填充表格信息
   for ($i = 2;$i <= count($data) + 1;$i++) {
   $j = 0;
   foreach ($data[$i - 2] as $key=>$value) {
   $excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");
   $j++;
   }
   }
   //创建Excel输入对象
   $write = new PHPExcel_Writer_Excel5($excel);
   header("Pragma: public");
   header("Expires: 0");
   header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
   header("Content-Type:application/force-download");
   header("Content-Type:application/vnd.ms-execl");
   header("Content-Type:application/octet-stream");
   header("Content-Type:application/download");;
   header('Content-Disposition:attachment;filename="工作量.xls"');
   header("Content-Transfer-Encoding:binary");
   $write->save('php://output');
?>