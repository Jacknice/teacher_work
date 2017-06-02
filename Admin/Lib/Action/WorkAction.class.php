<?php
	class WorkAction extends Action{
		public function lodingData(){
			$sql = "SELECT  `u_id`, `w_term`, `w_course`, `w_cdesign`, `w_graduation`, `w_allowance`, `w_dynamic`, `w_stipulate`, `w_workload`, `w_iscomplete` FROM `workload` ";
	       	$Model=new Model();
		    $result=$Model->query($sql);
	       	for($i=0;$i<count($result);$i++) {
	           $data['data'][$i][1]=$result[$i]['u_id'];
	           $data['data'][$i][0]=$result[$i]['w_term'];
	           $data['data'][$i][2]=$result[$i]['w_course'];
	           $data['data'][$i][3]=$result[$i]['w_cdesign'];
	           $data['data'][$i][4]=$result[$i]['w_graduation'];
	           $data['data'][$i][5]=$result[$i]['w_allowance'];
	           $data['data'][$i][6]=$result[$i]['w_dynamic'];
	           $data['data'][$i][7]=$result[$i]['w_stipulate'];
	           $data['data'][$i][8]=$result[$i]['w_workload'];
	           $data['data'][$i][9]=$result[$i]['w_iscomplete'];
	       	}
	       	$this->ajaxReturn($data);
		}
		
			
	}
?>
