<?php
	class LilunAction extends Action{
		public function IsPassData(){
		    $sql = "SELECT `coures_name`, `exper_hours`, `exper_type`, `pro`,  `type2`, `this_class`, `test_way`, `stu_num`, `total_hours`,`teacher_name`,`note` FROM `te_task` where note!='未审核'";
		    $Model=new Model();
		    $result=$Model->query($sql);
		    for($i=0;$i<count($result);$i++) {
		        $data['data'][$i][0]=$result[$i]['coures_name'];
		        $data['data'][$i][1]=$result[$i]['pro'];
		        $data['data'][$i][2]=$result[$i]['type2'];
		        $data['data'][$i][3]=$result[$i]['this_class'];
		        $data['data'][$i][4]=$result[$i]['test_way'];
		        $data['data'][$i][5]=$result[$i]['stu_num'];
		        $data['data'][$i][6]=$result[$i]['total_hours'];
		        $data['data'][$i][7]=$result[$i]['exper_hours'];
		        $data['data'][$i][8]=$result[$i]['exper_type'];
		        $data['data'][$i][9]=$result[$i]['teacher_name'];
		        $data['data'][$i][10]=$result[$i]['note'];
		    }
		    $this->ajaxReturn($data);
		}
		public function classIsPass(){
			$cla_name=$_REQUEST["cla_name"];
		   	$y_or_no=$_REQUEST["y_or_no"];
		   	$a=explode(',',$cla_name);
		   	for($i=0,$len=count($a);$i<$len;$i++){
		      $sql = "UPDATE `te_task` SET `note`='$y_or_no' WHERE id='$a[$i]'";
		      $Model=new Model();
		      $Model->execute($sql);
		   	}
		   	$this->ajaxReturn(1);
		}
		public function do_data_no(){
    		$sql = "SELECT `id`,`coures_name`, `exper_hours`, `exper_type`, `pro`,  `type2`, `this_class`, `test_way`, `stu_num`, `total_hours`,`teacher_name`,`note` FROM `te_task` where note='未审核'";
		   	$Model=new Model();
		   	$result=$Model->query($sql);
		    for($i=0;$i<count($result);$i++) {
		            $data['data'][$i][0]='';
		            $data['data'][$i][1]=$result[$i]['coures_name'];
		            $data['data'][$i][2]=$result[$i]['pro'];
		            $data['data'][$i][3]=$result[$i]['type2'];
		            $data['data'][$i][4]=$result[$i]['this_class'];
		            $data['data'][$i][5]=$result[$i]['test_way'];
		            $data['data'][$i][6]=$result[$i]['stu_num'];
		            $data['data'][$i][7]=$result[$i]['total_hours'];
		            $data['data'][$i][8]=$result[$i]['exper_hours'];
		            $data['data'][$i][9]=$result[$i]['exper_type'];
		            $data['data'][$i][10]=$result[$i]['teacher_name'];
		            $data['data'][$i][11]=$result[$i]['note'];
		            $data['data'][$i][12]=$result[$i]['id'];
		    }
		    $this->ajaxReturn($data);
		}
	}
?>
