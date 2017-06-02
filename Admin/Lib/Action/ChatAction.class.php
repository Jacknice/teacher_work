<?php
	class ChatAction extends Action{
		public function index(){
			$Model=new Model();
			$uname=$_REQUEST["uname"];
			$data=array('code'=>0,"msg"=>'',
			"data"=>array("mine"=>array()));
			$data['data']['mine']['username']=$uname;
		    $sql = "SELECT `u_id`, `u_institue`, `sign`,`status` ,`u_picture` FROM `te_name` WHERE u_name='$uname'";
		   	$result=$Model->query($sql);
		   	$data['data']['mine']['id']=$result[0]['u_id'];
	        $data['data']['mine']['status']=$result[0]['status'];
	        $data['data']['mine']['sign']=$result[0]['sign'];
	        $data['data']['mine']['avatar']=$result[0]['u_picture'];
	        $data['data']['friend'][0]['groupname']=$result[0]['u_institue'];
			$data['data']['friend'][0]['id']=1;
			$data['data']['friend'][0]['online']=2;
			
			$xy=$data['data']['friend'][0]['groupname'];
		    $sql1 = "SELECT `u_id`, `u_name`, `sign`,`u_picture` FROM `te_name` WHERE u_institue='$xy' AND u_name!='$uname'";
		    $result1=$Model->query($sql1);
		    for($i=0;$i<count($result1);$i++) {
		        $data['data']['friend'][0]['list'][$i]['username']=$result1[$i]['u_name'];
		        $data['data']['friend'][0]['list'][$i]['id']=$result1[$i]['u_id'];
		        $data['data']['friend'][0]['list'][$i]['avatar']=$result1[$i]['u_picture'];
		        $data['data']['friend'][0]['list'][$i]['sign']=$result1[$i]['sign'];
		    }
   			$this->ajaxReturn($data);
		}
		public function isonline(){
			$zt=$_REQUEST["zt"];
			$uname=$_REQUEST["uname"];
   			$sql="UPDATE `te_name` SET `status` = '$zt' WHERE `user`.`u_name` = '$uname'";
   			$Model=new Model();
   			$result=$Model->execute($sql);
		}
		public function sign(){
			$sign=$_REQUEST["sign"];
			$uname=$_REQUEST["uname"];
   			$sql="UPDATE `te_name` SET `sign` = '$sign' WHERE `user`.`u_name` = '$uname'";
   			$Model=new Model();
   			$result=$Model->execute($sql);
		}
		public function send(){
			$who=$_REQUEST["who"];
			$send=$_REQUEST["send"];
			$id=$_REQUEST["id"];
			$type=$_REQUEST["type"];
			$avatar=$_REQUEST["avatar"];
			$content=$_REQUEST["content"];
			$zt=$_REQUEST["zt"];
			$sql="INSERT INTO `chat`(`mine`, `send`, `content`,`id`, `type`, `avatar`, `zt`) VALUES ('$who','$send','$content','$id','$type','$avatar','$zt')";
   			$Model=new Model();
   			$result=$Model->execute($sql);
		}
		public function timeout(){
			$send=$_REQUEST["send"];
			$sql="SELECT `mine`, `send`, `content`,`id`, `type`, `avatar`, `zt` FROM `chat` WHERE send='$send'";
   			$Model=new Model();
   			$result=$Model->query($sql);
   			$sql1="DELETE FROM `chat`  WHERE send='$send'";
   			$result1=$Model->execute($sql1);
   			$this->ajaxReturn($result);

		}
	}
	
?>