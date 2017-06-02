<?php
	class TubiaoAction extends Action{
		public function index(){
			$this->display();
		}
		public function tabledata(){
			$uname=$_REQUEST["name"];
       		$sql = "SELECT  `u_id`, `w_term`, `w_course`, `w_cdesign`, `w_graduation`, `w_allowance`, `w_dynamic`, `w_stipulate`, `w_workload`, `w_iscomplete` FROM `workload` WHERE  u_id='$uname'";
			$Model=new Model();
			$result=$Model->query($sql);
			$data=array();
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
		public function hesuan(){
			$name=$_REQUEST["name"];
			//Q计划学时，K为教学班人数系数；R为课程性质分类系数；N为优质课程补贴系数。
			//计算公式为：标准学时$W1=$P×$K×$R×$N;
			//c_p为学时，c_stipulate为额定人数，c_stunum为实际人数，c_type课程类型，c_k课程是否是重修，c_r否为核心，c_n招生情况，c_note否是为优质课程，c_w1是否愿意调节
			$sql="SELECT `c_p`,`c_stipulate`,`c_stunum`,`c_type`,`c_k`,`c_r`,`c_n`,`c_note`,`c_w1` FROM `course` WHERE u_id='$name'";
			$result = mysqli_fetch_row(mysqli_query($conn,$sql));
			$P=$result[0];
			//$ep额定人数,$sp实际人数,$xu是选修还是必修，$hx是否为核心课程,$cx是否为重修课程
			$ep=$result[1];
			$sp=$result[2];
			$xu=$result[3];
			$cx=$result[4];
			$hx=$result[5];
			$z=$result[6];
			$y=$result[7];
			$s=$result[8];
			// z表示因招生生源情况等原因而导致教学班人数少于额定教学班人数的
			//$z=true;
			//$s=true;
			//  (1)
				if($ep<$sp){
					$K=1;
					//  (2)
					if(($sp-$ep)>($ep/10)){
						$K+=0.1;
					}else{
						$K+=($sp-$ep)/100;
					}
			//	(3)
				}else{
					if($z){
						$K=1;
					}
					if($s>0){
						if($sp/$ep>0.75||$sp/$ep<1){
							$K=1;
						}
					}else{
						if($sp/$ep<0.75){
							$K=0.5;
						}else{
							$K=1;
						}
					}
				}
				if($xu=="选修课"){
					$K=1;
					if($sp>$ep){
						if($ep<$sp){
								if(($sp-$ep)>($ep/10)){
								$K+=0.1;
						}else{
								$K+=($sp-$ep)/100;
							}
						}
					}
				}
				if($cx=="重修"){
					$P=$sp;
					$K=1;
				}
				if($hx=="核心"){
					$P+=4;
				}
				$R=1.1;
				switch($y){
					case "国家级":$N=1.3;break;
					case "省级":$N=1.2;break;
					case "校级":$N=1.1;break;
				}
				$W1=$P*$K*$R*$N;
				$sql="SELECT  `exper_hours` FROM `teach_task` WHERE teacher_name='$name'";
				$res= mysqli_fetch_row(mysqli_query($conn,$sql));
				$p=$res[0];
			//	实验教学工作量W2 = 计划学时p×K×L
				$W2=$p*$K*0.8;
			//	标准学时W3 =计划学时Q×周数×A
				$sql="SELECT  `p_type`,`p_week` FROM `pra_work` WHERE p_teacher='$name' AND p_note='已加入核算'";
				$res= mysqli_fetch_row(mysqli_query($conn,$sql));
				$Q=$res[0];
				$Z=$res[1];
				switch($Q){
					case "实习":$Q=10;break;
					case "课程设计":$Q=12;break;
				}
				$W3=$Q*$Z*1;
				$sql="SELECT COUNT(*) AS count FROM `gradution` WHERE u_name='$name' AND g_zt='已加入核算'";
				$res= mysqli_fetch_array(mysqli_query($conn,$sql));
				$count=$res['count'];
				$W4=$count*15*1;
				$sql="SELECT `u_sdept` FROM `user` WHERE u_name='$name'";
				$res= mysqli_fetch_assoc(mysqli_query($conn,$sql));
				if($res['u_sdept']=="教研室主任"){
					$W5=40;
				}else if($res['u_sdept']=="教研室副主任"){
					$W5=30;
				}else{
					$W5=0;
				}
				$sql="SELECT  `d_value` FROM `dynamic` WHERE u_id='$name'";
				$res= mysqli_fetch_all(mysqli_query($conn,$sql), MYSQLI_ASSOC);
				$W6=$res[0]['d_value']+$res[1]['d_value']+$res[2]['d_value'];
				$w1=$W1+$W2;
				$w2=$W1+$W2+$W3+$W4+$W5+$W6;
				$w3=$w2>200?"达标":"未达标";
				$sql="SELECT COUNT(*) AS num FROM `workload` WHERE u_id='$name'";
				$res= mysqli_fetch_row(mysqli_query($conn,$sql));
				if(!$res[0]){
					$sql="INSERT INTO `workload`(`w_id`, `u_id`, `w_term`, `w_course`, `w_cdesign`, `w_graduation`, `w_allowance`, `w_dynamic`, `w_stipulate`, `w_workload`, `w_iscomplete`) VALUES (null,'$name','2016-2017','$w1','$W3','$W4','$W5','$W6','200','$w2','$w3')";	
					$result=mysqli_query($conn,$sql);
				}
			      if($result){
			         echo "ok";
			      }else{
			         echo "error";
			      }
		}
		public function canvas(){
			$name=$_REQUEST["name"];
			$Model=new Model();
			$sql="SELECT  `w_course`, `w_cdesign`, `w_graduation`, `w_allowance`, `w_dynamic` FROM `workload` WHERE u_id='$name'";
			$data=array(array());
			$result=$Model->query($sql);
			$array=array("理论工作量","课设工作量","毕设工作量","补贴","额外工作量");
			$wn=array("w_course","w_cdesign","w_graduation","w_allowance","w_dynamic");
			for($i=0,$j=0;$i<5;$i++){
				$data[$i]["label"]=$array[$i];
				$data[$i]["value"]=$result[$j]["$wn[$i]"];
			}
			$this->ajaxReturn($data);
		}
	}
?>
