<?php
	class ShijianAction extends Action{
		public function index(){
			$this->display();
		}
		public function do_data(){
			$uname=$_GET['name'];
			$Model=new Model();
    		$sql = "SELECT  `p_link`, `p_score`, `id`,`p_type`, `p_class`, `p_major`, `p_a_class`, `p_stunum`, `p_week`, `p_start`, `p_teacher`,`p_note` FROM `pra_work` where p_teacher='$uname'";
   			$result=$Model->query($sql);
		    $data=array();
		    for($i=0;$i<count($result);$i++) {
		        $data['data'][$i][0]=$result[$i]['p_link'];
        		$data['data'][$i][1]=$result[$i]['p_score'];
		        $data['data'][$i][2]=$result[$i]['p_type'];
		        $data['data'][$i][3]=$result[$i]['p_class'];
		        $data['data'][$i][4]=$result[$i]['p_major'];
		        $data['data'][$i][5]=$result[$i]['p_a_class'];
		        $data['data'][$i][6]=$result[$i]['p_stunum'];
		        $data['data'][$i][7]=$result[$i]['p_week'];
		        $data['data'][$i][8]=$result[$i]['p_start'];
		        $data['data'][$i][9]=$result[$i]['p_teacher'];
		        $data['data'][$i][10]=$result[$i]['p_note'];
		        $data['data'][$i][11]=$result[$i]['id'];
		    }
		     $this->ajaxReturn($data);
		}
		public function delect(){
			$id=$_GET['id'];
			$Model=new Model();
			$sql = "DELETE FROM `pra_work` WHERE id='$id'";
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
   			$d11=$_REQUEST['value'];
			$Model=new Model();
  			$sql="INSERT INTO `pra_work`(`id`, `p_link`, `p_score`, `p_type`, `p_class`, `p_major`, `p_a_class`, `p_stunum`, `p_week`, `p_start`, `p_teacher`,  `p_note`,`value`) VALUES (null,'$d1','$d5','$d2','$d9','$d3','$d4','$d6','$d7','$d8','$d10','未审核','$d11')";
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
   			$d11=$_REQUEST['value'];
			$Model=new Model();
   			$sql="UPDATE `pra_work` SET `p_link`='$d1',`p_score`='$d5',`p_type`='$d2',`p_class`='$d9',`p_major`='$d3',`p_a_class`='$d4',`p_stunum`='$d6',`p_week`='$d7',`p_start`='$d8',`p_teacher`='$d10',`p_note`='未审核',`value`='$d11' WHERE id='$id'";
			$array=$Model->execute($sql);
			$this->ajaxReturn(1);
		}
			
	}
?>
