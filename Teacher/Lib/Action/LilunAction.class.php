<?php
	class LilunAction extends Action{
		public function index(){
			$this->display();
		}
		public function do_data(){
			$uname=$_GET['name'];
			$Model=new Model();
			$sql = "SELECT `coures_name`,`id`, `exper_hours`, `exper_type`, `pro`,  `type2`, `this_class`, `test_way`, `stu_num`, `total_hours`,`note` FROM `te_task` where teacher_name='$uname'";
   			$array=$Model->query($sql);
		    $data=array();
		    for($i=0;$i<count($array);$i++) {
		        $data['data'][$i][0]=$array[$i]['coures_name'];
		        $data['data'][$i][1]=$array[$i]['pro'];
		        $data['data'][$i][2]=$array[$i]['type2'];
		        $data['data'][$i][3]=$array[$i]['this_class'];
		        $data['data'][$i][4]=$array[$i]['test_way'];
		        $data['data'][$i][5]=$array[$i]['stu_num'];
		        $data['data'][$i][6]=$array[$i]['total_hours'];
		        $data['data'][$i][7]=$array[$i]['exper_hours'];
		        $data['data'][$i][8]=$array[$i]['exper_type'];
		        $data['data'][$i][9]=$array[$i]['note'];
		        $data['data'][$i][10]=$array[$i]['id'];
		    }
		     $this->ajaxReturn($data);
		}
		public function delect(){
			$id=$_GET['id'];
			$Model=new Model();
			$sql = "DELETE FROM `te_task` WHERE id='$id'";
   			$array=$Model->execute($sql);
			$this->ajaxReturn(1);
		}
		public function add(){
			$d1=$_REQUEST['class_name'];
		  	$d2=$_REQUEST['score'];
		   	$d3=$_REQUEST['nianji'];
		   	$d4=$_REQUEST['zhuanye'];
		   	$d5=$_REQUEST['class_type'];
		   	$d6=$_REQUEST['banji'];
		   	$d7=$_REQUEST['kaishi'];
		   	$d8=$_REQUEST['stu_num'];
   			$d9=$_REQUEST['study_time'];
   			$d10=$_REQUEST['uname'];
			$Model=new Model();
			$sql="INSERT INTO `te_task`(`coures_name`, `exper_hours`, `exper_type`, `pro`, `type2`, `this_class`, `test_way`, `stu_num`, `total_hours`,  `teacher_name`,  `note`) VALUES ('$d1','$d2','$d3','$d4','$d5','$d6','$d7','$d8','$d9','$d10','未审核')";
   			$array=$Model->execute($sql);
			$this->ajaxReturn(1);
		}
		public function update(){
			$id=$_REQUEST['id'];
			$d1=$_REQUEST['class_name'];
		  	$d2=$_REQUEST['score'];
		   	$d3=$_REQUEST['nianji'];
		   	$d4=$_REQUEST['zhuanye'];
		   	$d5=$_REQUEST['class_type'];
		   	$d6=$_REQUEST['banji'];
		   	$d7=$_REQUEST['kaishi'];
		   	$d8=$_REQUEST['stu_num'];
   			$d9=$_REQUEST['study_time'];
   			$d10=$_REQUEST['uname'];
			$Model=new Model();
			$sql="UPDATE `te_task` SET `coures_name`='$d1',`exper_hours`='$d2',`exper_type`='$d3',`pro`='$d4',`type2`='$d5',`this_class`='$d6',`test_way`='$d7',`stu_num`='$d8',`total_hours`='$d9',`note`='未审核' WHERE id='$id'";
			$array=$Model->execute($sql);
			$this->ajaxReturn(1);
		}
			
	}
?>
