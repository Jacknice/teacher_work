<?php
	class BisheAction extends Action{
		public function index(){
			$this->display();
		}
		public function do_data(){
			$uname=$_GET['name'];
			$Model=new Model();
    		$sql = "SELECT `g_term`,`g_id`, `g_institute`, `g_sclass`, `g_snumber`, `g_sname`, `u_name`, `g_project`, `g_note`, `g_zt` FROM `gradution` where u_name='$uname'";
   			$result=$Model->query($sql);
		    $data=array();
		    for($i=0;$i<count($result);$i++) {
		        $data['data'][$i][0]=$result[$i]['g_term'];
		        $data['data'][$i][1]=$result[$i]['u_name'];
		        $data['data'][$i][2]=$result[$i]['g_institute'];
		        $data['data'][$i][3]=$result[$i]['g_sclass'];
		        $data['data'][$i][4]=$result[$i]['g_snumber'];
		        $data['data'][$i][5]=$result[$i]['g_sname'];
		        $data['data'][$i][6]=$result[$i]['g_project'];
		        $data['data'][$i][7]=$result[$i]['g_note'];
		        $data['data'][$i][8]=$result[$i]['g_zt'];
		        $data['data'][$i][9]=$result[$i]['g_id'];
		    }
		     $this->ajaxReturn($data);
		}
		public function delect(){
			$id=$_GET['id'];
			$Model=new Model();
			$sql = "DELETE FROM `gradution` WHERE g_id='$id'";
   			$array=$Model->execute($sql);
			$this->ajaxReturn(1);
		}
		public function add(){
			$d1=$_REQUEST['class_name'];
		  	$d2=$_REQUEST['score'];
		   	$d3=$_REQUEST['nianji'];
		   	$d4=$_REQUEST['zhuanye'];
		   	$d6=$_REQUEST['banji'];
		   	$d7=$_REQUEST['kaishi'];
		   	$d8=$_REQUEST['stu_num'];
   			$d9=$_REQUEST['study_time'];
   			$d10=$_REQUEST['uname'];
			$Model=new Model();
   			$sql="INSERT INTO `gradution`(`g_id`, `g_term`, `u_name`,`g_institute`, `g_sclass`, `g_snumber`, `g_sname`,  `g_project`, `g_note`, `g_zt`)  VALUES (null,'$d1','$d10','$d2','$d9','$d3','$d4','$d6','$d7','未审核')";
   			
   			$array=$Model->execute($sql);
			$this->ajaxReturn(1);
		}
		public function update(){
			$id=$_REQUEST['id'];
			$d1=$_REQUEST['class_name'];
		  	$d2=$_REQUEST['score'];
		   	$d3=$_REQUEST['nianji'];
		   	$d4=$_REQUEST['zhuanye'];
		   	$d6=$_REQUEST['banji'];
		   	$d7=$_REQUEST['kaishi'];
		   	$d8=$_REQUEST['stu_num'];
   			$d9=$_REQUEST['study_time'];
   			$d10=$_REQUEST['uname'];
			$Model=new Model();
   			$sql="UPDATE `gradution` SET `g_term`='$d1',`u_name`='$d10',`g_institute`='$d2',`g_sclass`='$d9',`g_snumber`='$d3',`g_sname`='$d4',`g_project`='$d6',`g_zt`='未审核',`g_note`='$d7' WHERE g_id='$id'";
			$array=$Model->execute($sql);
			$this->ajaxReturn(1);
		}
			
	}
?>
