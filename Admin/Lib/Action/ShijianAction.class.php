<?php
	class ShijianAction extends Action{
		public function IsPassData(){
			$sql = "SELECT `id`, `p_link`, `p_score`, `p_type`, `p_class`, `p_major`, `p_a_class`, `p_stunum`, `p_week`, `p_start`, `p_teacher`,`p_note` FROM `pra_work`";
           	$Model=new Model();
		    $result=$Model->query($sql);
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
           	}
		    $this->ajaxReturn($data);
		}
		public function classIsPass(){
			$a=explode(',',$_REQUEST["id"]);
   			$y_or_no=$_REQUEST["y_or_no"];
		   	for($i=0,$len=count($a);$i<$len;$i++){
		      $sql = "UPDATE `pra_work` SET `p_note`='$y_or_no' WHERE id='$a[$i]'";
		      $Model=new Model();
		      $Model->execute($sql);
		   	}
		   	$this->ajaxReturn(1);
		}
		public function do_data_no(){
		   $sql = "SELECT `id`, `p_link`, `p_score`, `p_type`, `p_class`, `p_major`, `p_a_class`, `p_stunum`, `p_week`, `p_start`, `p_teacher`,`p_note` FROM `pra_work` where p_note='未审核'";
           $Model=new Model();
		   $result=$Model->query($sql);
           for($i=0;$i<count($result);$i++) {
               $data['data'][$i][0]='';
               $data['data'][$i][1]=$result[$i]['p_link'];
               $data['data'][$i][2]=$result[$i]['p_score'];
               $data['data'][$i][3]=$result[$i]['p_type'];
               $data['data'][$i][4]=$result[$i]['p_class'];
               $data['data'][$i][5]=$result[$i]['p_major'];
               $data['data'][$i][6]=$result[$i]['p_a_class'];
               $data['data'][$i][7]=$result[$i]['p_stunum'];
               $data['data'][$i][8]=$result[$i]['p_week'];
               $data['data'][$i][9]=$result[$i]['p_start'];
               $data['data'][$i][10]=$result[$i]['p_teacher'];
               $data['data'][$i][11]=$result[$i]['p_note'];
               $data['data'][$i][12]=$result[$i]['id'];
            }
		    $this->ajaxReturn($data);
		}
			
	}
?>
