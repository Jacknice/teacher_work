<?php
	class KechengAction extends Action{
		public function do_data(){
			$sql = "SELECT `id`, `c_name`, `c_type`, `c_hours`, `c_weeks`, `c_class`, `c_exp`, `c_now`, `c_again`, `c_imp`, `c_nice`, `u_name`, `c_zt`, `c_fc`,`c_yi` FROM `course`";
           	$Model=new Model();
		    $result=$Model->query($sql);
           	for($i=0;$i<count($result);$i++) {
           		$data['data'][$i][0]='';
               $data['data'][$i][1]=$result[$i]['c_name'];
               $data['data'][$i][2]=$result[$i]['c_type'];
               $data['data'][$i][3]=$result[$i]['c_hours'];
               $data['data'][$i][4]=$result[$i]['c_weeks'];
               $data['data'][$i][5]=$result[$i]['c_class'];
               $data['data'][$i][6]=$result[$i]['c_exp'];
               $data['data'][$i][7]=$result[$i]['c_now'];
               $data['data'][$i][8]=$result[$i]['c_again']==0?'否':'是';
               $data['data'][$i][9]=$result[$i]['c_imp']==0?'否':'是';
               $data['data'][$i][10]=$result[$i]['c_nice'];
               if($result[$i]['c_exp']>$result[$i]['c_now']){
               		$data['data'][$i][11]=$result[$i]['c_yi']==0?'否':'是';
               		$data['data'][$i][12]=$result[$i]['c_fc']==0?'否':'是';
               }else{
               		$data['data'][$i][11]='';
               		$data['data'][$i][12]='';
               }
               
               $data['data'][$i][13]=$result[$i]['u_name'];
               $data['data'][$i][14]=$result[$i]['c_zt'];
               $data['data'][$i][15]=$result[$i]['id'];
           	}
		    $this->ajaxReturn($data);
		}
		public function delect(){
			$id = $_REQUEST['id'];
			$sql = "DELETE FROM `course` WHERE id='$id'";
			$Model=new Model();
			if($Model->execute($sql)){
		    	$this->ajaxReturn(1);
		    }
		}
		public function update(){
			$id=$_REQUEST['id'];
			$d1=$_REQUEST['class_name'];
		  	$d2=$_REQUEST['class_type'];
		   	$d3=$_REQUEST['xueshi'];
		   	$d4=$_REQUEST['zhou'];
		   	$d5=$_REQUEST['banji'];
		   	$d6=$_REQUEST['ed'];
		   	$d7=$_REQUEST['shiji'];
		   	$d8=$_REQUEST['cx']=="是"?1:0;
   			$d9=$_REQUEST['hx']=="是"?1:0;
   			$d10=$_REQUEST['yz'];
   			$d11=$_REQUEST['y1']=="是"?1:0;
   			$d12=$_REQUEST['y2']=="是"?1:0;
   			$d13=$_REQUEST['uname'];
			$Model=new Model();
			$sql="UPDATE `course` SET `c_name`='$d1',`c_type`='$d2',`c_hours`='$d3',`c_weeks`='$d4',`c_class`='$d5',`c_exp`='$d6',`c_now`='$d7',`c_again`='$d8',`c_imp`='$d9', `c_nice`='$d10' ,`c_zt`='未审核',`c_fc`='$d11', `c_yi`='$d12' ,`u_name`='$d13' WHERE id='$id'";
			if($Model->execute($sql)){
				$this->ajaxReturn(1);
			}
		}
		public function add(){
			$name=$_REQUEST['uname'];
			$d1=$_REQUEST['class_name'];
		  	$d2=$_REQUEST['class_type'];
		   	$d3=$_REQUEST['xueshi'];
		   	$d4=$_REQUEST['zhou'];
		   	$d5=$_REQUEST['banji'];
		   	$d6=$_REQUEST['ed'];
		   	$d7=$_REQUEST['shiji'];
		   	$d8=$_REQUEST['cx']=="是"?1:0;
   			$d9=$_REQUEST['hx']=="是"?1:0;
   			$d10=$_REQUEST['yz'];
   			$d11=$_REQUEST['y1']=="是"?1:0;
   			$d12=$_REQUEST['y2']=="是"?1:0;
			$Model=new Model();
			$sql="INSERT INTO `course`(`id`, `c_name`, `c_type`, `c_hours`, `c_weeks`, `c_class`, `c_exp`, `c_now`, `c_again`, `c_imp`, `c_nice`, `u_name`, `c_zt`, `c_fc`, `c_yi`) VALUES (null,'$d1','$d2','$d3','$d4','$d5','$d6','$d7','$d8','$d9','$d10','$name','未审核','$d11','$d12')";
			if($Model->execute($sql)){
				$this->ajaxReturn(1);
			}
		}
		public function delgroup(){
			$a=explode(',',$_REQUEST["id"]);
		   	for($i=0,$len=count($a);$i<$len;$i++){
		      $sql = "DELETE FROM `course` WHERE id='$a[$i]'";
		      $Model=new Model();
		      $result=$Model->execute($sql);
		   	}
		   	if($result){
		    	$this->ajaxReturn(1);
		    }
		}
	}
	
?>
