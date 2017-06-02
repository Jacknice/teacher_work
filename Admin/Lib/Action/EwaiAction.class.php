<?php
	class EwaiAction extends Action{
		public function IsPassData(){
			$sql = "SELECT  `d_term`, `d_workname`, `d_value`, `u_id`, `d_state` FROM `dynamic` WHERE d_state!='未审核'";
	       	$Model=new Model();
		    $result=$Model->query($sql);
	       for($i=0;$i<count($result);$i++) {
	           $data['data'][$i][0]=$result[$i]['d_term'];
	           $data['data'][$i][1]=$result[$i]['u_id'];
	           $data['data'][$i][2]=$result[$i]['d_workname'];
	           $data['data'][$i][3]=$result[$i]['d_value'];
	           $data['data'][$i][4]=$result[$i]['d_state'];
	       }
		    $this->ajaxReturn($data);
		}
		public function classIsPass(){
			$y_or_no=$_REQUEST["y_or_no"];
		   	$a=explode(',',$_REQUEST["work_name"]);
		   	$b=explode(',',$_REQUEST["uname"]);
		   	for($i=0,$len=count($a);$i<$len;$i++){
		      	$sql = "UPDATE `dynamic` SET `d_state`='$y_or_no' WHERE u_id='$b[$i]' AND d_workname='$a[$i]'";
		       	$Model=new Model();
		      	$Model->execute($sql);
		   	}
		   	$this->ajaxReturn(1);
		}
		public function do_data_no(){
			$sql = "SELECT  `d_term`, `d_workname`, `d_value`, `u_id` FROM `dynamic` WHERE d_state='未审核'";
	        $Model=new Model();
		   	$result=$Model->query($sql);
	       	for($i=0;$i<count($result);$i++) {
	           $data['data'][$i][0]="";
	           $data['data'][$i][1]=$result[$i]['d_term'];
	           $data['data'][$i][2]=$result[$i]['u_id'];
	           $data['data'][$i][3]=$result[$i]['d_workname'];
	           $data['data'][$i][4]=$result[$i]['d_value'];
	       	}
		    $this->ajaxReturn($data);
		}
			
	}
?>
