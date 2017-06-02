<?php
	class BiguanAction extends Action{
		public function do_data(){
			$sql = "SELECT  `g_term`, `u_name`,`u_role`,`g_institute`, `g_sclass`,`g_id`, `g_snumber`, `g_sname`,  `g_project`, `g_note` FROM `gradution`";
	        $Model=new Model();
		    $result=$Model->query($sql);
	        for($i=0;$i<count($result);$i++) {
	            $data['data'][$i][0]='';
	            $data['data'][$i][1]=$result[$i]['g_term'];
	            $data['data'][$i][2]=$result[$i]['u_name'];
	            $data['data'][$i][3]=$result[$i]['u_role'];
	            $data['data'][$i][4]=$result[$i]['g_institute'];
	            $data['data'][$i][5]=$result[$i]['g_sclass'];
	            $data['data'][$i][6]=$result[$i]['g_snumber'];
	            $data['data'][$i][7]=$result[$i]['g_sname'];
	            $data['data'][$i][8]=$result[$i]['g_project'];
	            $data['data'][$i][9]=$result[$i]['g_note'];
	            $data['data'][$i][10]=$result[$i]['g_id'];
	        }
	        $this->ajaxReturn($data);
		}
		public function delect(){
			$stu_name=explode(',',$_REQUEST["stu_name"]);
			$Model=new Model();
			for($i=0,$len=count($stu_name);$i<$len;$i++){
	            $sql = "DELETE FROM `gradution` WHERE g_snumber='$stu_name[$i]'";
	            $result=$Model->execute($sql);
        	}
			
			if($result){
		    	$this->ajaxReturn("已删除此条信息!!!");
		    }
		}
		public function del_group(){
			$a=explode(',',$_REQUEST["id"]);
			$Model=new Model();
		   	for($i=0,$len=count($a);$i<$len;$i++){
		      $sql = "DELETE FROM `gradution` WHERE g_id='$a[$i]'";
		       $result=$Model->execute($sql);
		   	}
		   	if($result){
		    	$this->ajaxReturn(1);
		    }
		}
	}
?>
