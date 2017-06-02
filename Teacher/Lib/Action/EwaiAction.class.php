<?php
	class EwaiAction extends Action{
		public function index(){
			$this->display();
		}
		public function do_data(){
			$uname=$_GET['name'];
			$Model=new Model();
    		$sql = "SELECT  `d_term`, `d_workname`, `d_value`, `u_id`, `d_state` FROM `dynamic` where u_id='$uname'";
   			$result=$Model->query($sql);
		    $data=array();
		    for($i=0;$i<count($result);$i++) {
		        $data['data'][$i][0]=$result[$i]['d_term'];
		        $data['data'][$i][1]=$result[$i]['u_id'];
		        $data['data'][$i][2]=$result[$i]['d_workname'];
		        $data['data'][$i][3]=$result[$i]['d_value'];
		        $data['data'][$i][4]=$result[$i]['d_state'];
		    }
		     $this->ajaxReturn($data);
		}
		public function tijiao(){
			$name=$_GET['name'];
			$type=$_GET['type'];
			if(trim($type, " \t.")=="-请选择工作量类型-"){
				echo "errtype";
				return;
			}
			switch($type){
		      case "答辩":$score=3.0; break;
		      case "项目":$score=4.0; break;
		      case "论文":$score=5.0; break;
		      case "评估":$score=6.0; break;
			}
			$type.='工作量';
			$Model=new Model();
   			$sql="SELECT `d_term` FROM `dynamic` WHERE d_workname='$type' AND u_id='$name'";
   			$array=$Model->query($sql);
   			if($array){
   				$this->ajaxReturn(2);
   			}else{
   				$sql="INSERT INTO `dynamic`(`d_id`, `d_term`, `d_workname`, `d_value`, `u_id`, `d_state`) VALUES (null,'2016-2017','$type','$score','$name','未审核')";
   				$array=$Model->execute($sql);
   				if($array){
   					$this->ajaxReturn(1);
   				}
   			}
			
		}
		public function delect(){
			$uname=$_REQUEST["uname"];
    		$work_name=$_REQUEST["stu_name"];
    		$Model=new Model();
    		$sql = "DELETE FROM `dynamic` WHERE u_id='$uname' AND d_workname='$work_name'";
			$array=$Model->execute($sql);
			if($array){
   					$this->ajaxReturn(1);
   			}
		}
			
	}
?>
