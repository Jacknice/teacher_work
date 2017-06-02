<?php
	class BisheAction extends Action{
		public function IsPassData(){
			$sql = "SELECT `g_id`, `g_term`, `g_institute`, `g_sclass`, `g_snumber`, `g_sname`, `u_name`, `g_project`, `g_note`, `g_zt` FROM `gradution` WHERE `g_zt`!='未审核'";
	       	$Model=new Model();
		    $result=$Model->query($sql);
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
		public function classIsPass(){
			$cla_name=$_REQUEST["cla_name"];
   			$y_or_no=$_REQUEST["y_or_no"];
   			$a=explode(',',$cla_name);
		   	for($i=0,$len=count($a);$i<$len;$i++){
		      $sql = "UPDATE `gradution` SET`g_zt`='$y_or_no' WHERE g_id='$a[$i]'";
		      $Model=new Model();
		      $Model->execute($sql);
		   	}
		   	$this->ajaxReturn(1);
		}
		public function do_data_no(){
			$sql = "SELECT `g_id`, `g_term`, `g_institute`, `g_sclass`, `g_snumber`, `g_sname`, `u_name`, `g_project`, `g_note`, `g_zt` FROM `gradution` WHERE `g_zt`='未审核'";
	        $Model=new Model();
		   	$result=$Model->query($sql);
	       	for($i=0;$i<count($result);$i++) {
	            $data['data'][$i][0]='';
	            $data['data'][$i][1]=$result[$i]['g_term'];
	            $data['data'][$i][2]=$result[$i]['u_name'];
	            $data['data'][$i][3]=$result[$i]['g_institute'];
	            $data['data'][$i][4]=$result[$i]['g_sclass'];
	            $data['data'][$i][5]=$result[$i]['g_snumber'];
	            $data['data'][$i][6]=$result[$i]['g_sname'];
	            $data['data'][$i][7]=$result[$i]['g_project'];
	            $data['data'][$i][8]=$result[$i]['g_note'];
	            $data['data'][$i][9]=$result[$i]['g_zt'];
	            $data['data'][$i][10]=$result[$i]['g_id'];
	       	}
		    $this->ajaxReturn($data);
		}
			
	}
?>
