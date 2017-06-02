<?php
	class UserAction extends Action{
		public function add(){
			$num=$_REQUEST["num"];
			$name=$_REQUEST["uname"];
			$yx=$_REQUEST["yx"];
			$zc=$_REQUEST["zc"];
			$xl=$_REQUEST["xl"];
			$phone=$_REQUEST["phone"];
			if($num==1){
			   $sql="INSERT INTO `te_name`(`u_name`, `u_institue`,  `u_role`, `u_password`, `u_sdept`, `u_phone`,`u_picture`) VALUES ('$name','$yx','$zc','123456','$xl','$phone','http://192.168.191.1/teacher_work/Uploads/.$phone.jpg')";
			}
			if($num==2){
			   $sql="UPDATE `te_name` SET `u_institue`='$yx',`u_role`='$zc',`u_sdept`='$xl',`u_phone`='$phone' WHERE u_name='$name'";
			}
			$Model=new Model();
		    $result=$Model->execute($sql);
		    if($result){
		    	$this->ajaxReturn(1);
		    }
		}
		public function select(){
			$sql = "SELECT  `u_institue`, `u_role`, `u_name`,  `u_sdept`,  `u_phone` FROM `te_name` WHERE u_name!='超级管理员'";
	       	$Model=new Model();
		    $result=$Model->query($sql);
	       	for($i=0;$i<count($result);$i++) {
	           $data['data'][$i][0]='';
	           $data['data'][$i][1]=$result[$i]['u_name'];
	           $data['data'][$i][2]=$result[$i]['u_institue'];
	           $data['data'][$i][3]=$result[$i]['u_role'];
	           $data['data'][$i][4]=$result[$i]['u_sdept'];
	           $data['data'][$i][5]=$result[$i]['u_phone'];
	       	}
	       	$this->ajaxReturn($data);
		}
		public function delect(){
			$name = $_REQUEST['uname'];
			$sql = "DELETE FROM `te_name` WHERE u_name='$name'";
			$Model=new Model();
			if($Model->execute($sql)){
		    	$this->ajaxReturn(1);
		    }
		}
		public function delgroup(){
			$a=explode(',',$_REQUEST["uname"]);
		   	for($i=0,$len=count($a);$i<$len;$i++){
		      $sql = "DELETE FROM `te_name` WHERE u_name='$a[$i]'";
		      $Model=new Model();
		      $result=$Model->execute($sql);
		   	}
		   	if($result){
		    	$this->ajaxReturn(1);
		    }
		}
	}
?>
