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
		public function showdata(){
			$uname=$_REQUEST["name"];
       		$sql = "SELECT  `K`, `R`, `N`, `keshe`, `bishe`,`w_graduation` FROM `workload` WHERE  u_id='$uname'";
			$Model=new Model();
			$result=$Model->query($sql);
	       	$this->ajaxReturn($result);
		}
		public function lilun(){
			$uname=$_GET['name'];
			$Model=new Model();
			$sql = "SELECT  `c_name`, `c_type`, `c_hours`, `c_weeks`, `c_class`, `c_exp`, `plus`,`c_now`, `c_again`, `c_imp`, `c_nice` ,`K`, `R`, `N` FROM `course` where u_name='$uname' ";
   			$array=$Model->query($sql);
		    $data=array();
		    for($i=0;$i<count($array);$i++) {
		        $data['data'][$i][0]=$array[$i]['c_name'];
		        $data['data'][$i][1]=$array[$i]['c_type'];
		        $data['data'][$i][2]=$array[$i]['c_hours'];
		        $data['data'][$i][3]=$array[$i]['c_weeks'];
		        $data['data'][$i][4]=$array[$i]['c_class'];
		        $data['data'][$i][5]=$array[$i]['c_exp'];
		        $data['data'][$i][6]=$array[$i]['c_now'];
		        $data['data'][$i][7]=$array[$i]['c_again']==0?'否':'是';;
		        $data['data'][$i][8]=$array[$i]['c_imp']==0?'否':'是';;
		        $data['data'][$i][9]=$array[$i]['c_nice'];
		        $data['data'][$i][10]=$array[$i]['K'];
		        $data['data'][$i][11]=$array[$i]['R'];
		        $data['data'][$i][12]=$array[$i]['N'];
		        $data['data'][$i][13]=$array[$i]['plus'];
		    }
		     $this->ajaxReturn($data);
		}
		public function shiyan(){
			$uname=$_GET['name'];
			$Model=new Model();
			$sql = "SELECT DISTINCT  `coures_name` ,  `pro` ,`this_class`,`stu_num`   ,`type2` ,  `test_way` ,  `total_hours` ,  `exper_hours` ,  `exper_type` ,  `plus`  FROM  `te_task` WHERE teacher_name =  '$uname' AND note =  '已加入核算'";
   			$array=$Model->query($sql);
		    $data=array();
		    for($i=0,$j=0;$j<count($array);$i++,$j+=2) {
		        $data['data'][$i][0]=$array[$j]['coures_name'];
		        $data['data'][$i][1]=$array[$j]['pro'];
		        $data['data'][$i][2]=$array[$j]['type2'];
		    	$data['data'][$i][3]=$array[$j]['this_class'].$array[$j+1]['this_class'];
		        
		        $data['data'][$i][4]=$array[$j]['test_way'];
		    	$data['data'][$i][5]=$array[$j]['stu_num']+$array[$j+1]['stu_num'];
		        
		        $data['data'][$i][6]=$array[$j]['total_hours'];
		        $data['data'][$i][7]=$array[$j]['exper_hours'];
		        $data['data'][$i][8]=$array[$j]['exper_type'];
		        $data['data'][$i][9]=$array[$j]['plus'];
		    }
		     $this->ajaxReturn($data);
		}
		public function hesuan(){
			$name=$_REQUEST["name"];
			//Q计划学时，K为教学班人数系数；R为课程性质分类系数；N为优质课程补贴系数。
			//计算公式为：标准学时$W1=$P×$K×$R×$N;
			//c_p为学时，c_stipulate为额定人数，c_stunum为实际人数，c_type课程类型，c_k课程是否是重修，c_r否为核心，c_n招生情况，c_note否是为优质课程，c_w1是否愿意调节
			$sql="SELECT `c_name`, `c_type`, `c_hours`, `c_weeks`, `c_class`, `c_exp`, `c_now`, `c_again`, `c_imp`, `c_nice`, `u_name`, `c_zt`, `c_fc`,`c_yi` FROM `course` WHERE u_name='$name'";
		    $Model=new Model();
		    $result=$Model->query($sql);
		    $W1=0;$K=0;$P=0;$R=0;$N=0;
		    
		    //	实验教学工作量W2 = 计划学时J×K×L
			$W2=0;$L=0;$J=0;
		    
			//	实践教学W3 =计划学时Q×M周数×A
		    $W3=0;$Q=0;$M=0;$A=0;  $w1=0;$w2=0; $EX=0;
		    
//		    $ep额定人数,$sp实际人数,$xu是选修还是必修，$hx是否为核心课程,$cx是否为重修课程
		    for($i=0;$i<count($result);$i++){
		    	$P=$result[$i]['c_hours'];
		    	$ep=$result[$i]['c_exp'];
				$sp=$result[$i]['c_now'];
				$xu=$result[$i]['c_type'];
				if($result[$i]['c_again']){
					$cx=true;
				}
				$hx=$result[$i]['c_imp'];
				$yz=$result[$i]['c_nice'];
				$s=$result[$i]['c_yi'];
				$z=$result[$i]['c_fc'];
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
					if($s){
						$K=1;
					}
					if($z>0){
						if($sp/$ep>0.75||$sp/$ep<1){
							$K=1;
						}
					}else{
						if($sp/$ep<=0.75){
							$K=0.5;
						}
					}
				}
				if($xu=="选修课"){
					if($sp>$ep){
						if($ep<$sp){
								if(($sp-$ep)>($ep/10)){
								$K+=0.1;
						}else{
								$K+=($sp-$ep)/100;
							}
						}
					}else if($sp>15){
						$K=1;
					}
				}
				if($cx){
					$P=$sp;
				}
				if($hx){
					$P+=4;
				}
				if($xu=="其它"){
					$R=1.0;
				}else{
					$R=1.1;
				}
				
				switch($yz){
					case "国家级":$N=1.3;break;
					case "省级":$N=1.2;break;
					case "校级":$N=1.1;break;
				}
				$s_1=$P*$K*$R*$N;
				$W1+=$s_1;
				$c_name=$result[$i]["c_name"];
				$Model->execute("UPDATE `course` SET `K`='$K',`R`='$R',`N`='$N' ,`c_zt`='已核算' WHERE c_name='$c_name'");
				$Model->execute("UPDATE `course` SET `plus`='$s_1' WHERE c_name='$c_name'");
		    }
		
		    
		    
			$sql2="SELECT distinct `coures_name`,`exper_hours`, `exper_type` FROM `te_task` WHERE teacher_name='$name' AND note='已加入核算'";
			$Model=new Model();
		    $result2=$Model->query($sql2);
			for($k=0;$k<count($result2);$k++){
			 	$J=$result2[$k]['exper_hours'];
			 	$etype=$result2[$k]['exper_type'];
			 	$coures_name=$result2[$k]['coures_name'];
			 	switch($etype){
			 		case "上机实验":
					case "基础性实验":$L=0.8;break;
					case "一般性实验":$L=1.0;break;
					case "专业类实验":$L=1.2;break;
				}
				$s_2=$J*$L*$K;
				$W2+=$s_2;
				$Model->execute("UPDATE `te_task` SET `plus`='$s_2' WHERE coures_name='$coures_name'");
			}
//		    
		   
			$sql1="SELECT distinct `p_link`,`p_week`,`p_major`, `p_type`, `value` FROM `pra_work` WHERE p_teacher='$name'AND p_note='已加入核算' ";
			$Model=new Model();
		    $result3=$Model->query($sql1);
		    for($j=0;$j<count($result3);$j++){
		    	$M=$result3[$j]['p_week'];
		    	$p_link=$result3[$j]['p_link'];
		    	$A=$result3[$j]['value'];
		    	$type=$result3[$j]['p_type'];
		    	switch($type){
					case "实习":$Q=10;break;
					case "课程设计":$Q=12;break;
					case "工程训练":$Q=15;break;
					case "运动训练":$Q=60;break;
					case "学科竞赛":$Q=5;break;
				}
				$plus=$Q*$M*$A;
				$w1+=$plus;
				$Model->execute("UPDATE `pra_work` SET `plus`='$plus' WHERE p_link='$p_link'");
		    }


//		毕业核算设计工作量$w2+=$X*18*1;
			$count=0;
			$sql3="SELECT count(*) FROM `gradution` WHERE u_name='$name'AND g_zt='已加入核算' ";
			$Model=new Model();
		    $result3=$Model->query($sql3);
		    $count=$result3[0]['count(*)'];
//		    $X=$result3['count(*)']*15;
			$sql4="SELECT `u_role` FROM `te_name` WHERE u_name='$name'";
		    $result4=$Model->query($sql4);
		    $u_role=$result4[0]['u_role'];
		    
		    $u_role=="讲师"&&$count>8?$count=8:0;
		    $u_role=="副教授"&&$count>10?$count=10:0;
		    $u_role=="教授"&&$count>10?$count=10:0;
		    $u_role=="教师"&&$count>6?$count=6:0;
		    $u_role=="教研室主任"?$EX=40:0;
		    $u_role=="教研室副主任"?$EX=30:0;
//		    
			$X=$count*15;
			$w2+=$X;
			$W3=$w1+$w2;
				
//			额外工作量
			$W4=0;
			$ewai=new Model();
		    $res=$ewai->query("SELECT  `d_value` FROM `dynamic` WHERE u_id='$name' AND d_state='已加入核算'");
		    for($i=0;$i<count($res);$i++){
		    	$W4+=$res[$i]['d_value'];
		    }
			$NUM=$W1+$W2+$W3+$W4+$EX;
			$isPass=$NUM>150?"达标":"未达标";
			$isHave=$ewai->query("SELECT COUNT(*) AS num FROM `workload` WHERE u_id='$name'");	
			if($isHave[0]['num']==0){
				$end=$ewai->execute("INSERT INTO `workload`(`w_id`, `u_id`, `w_term`, `w_course`, `w_cdesign`, `w_graduation`, `w_allowance`, `w_dynamic`, `w_stipulate`, `w_workload`, `w_iscomplete`,`K`,`R`,`N`,`keshe`,`bishe`) VALUES (null,'$name','2016-2017','$W1','$W2','$W3','$EX','$W4','150','$NUM','$isPass','$K','$R','$N','$w1','$w2')");
			}	
			$this->ajaxReturn($end);
	}		
		
		public function ext_work(){
			$uname=$_GET['name'];
			$Model=new Model();
    		$sql = "SELECT  `d_term`, `d_workname`, `d_value`, `u_id`, `d_state` FROM `dynamic` where u_id='$uname' AND d_state='已加入核算'";
   			$result=$Model->query($sql);
		    $data=array();
		    for($i=0;$i<count($result);$i++) {
		        $data['data'][$i][0]=$result[$i]['d_term'];
		        $data['data'][$i][1]=$result[$i]['d_workname'];
		        $data['data'][$i][2]=$result[$i]['d_value'];
		    }
		     $this->ajaxReturn($data);
		}
		public function bishe(){
			$uname=$_GET['name'];
			$Model=new Model();
    		$sql = "SELECT `g_term`,`g_id`, `g_institute`, `g_sclass`, `g_snumber`, `g_sname`, `u_name`, `g_project`, `g_note`, `g_zt` FROM `gradution` where u_name='$uname' AND g_zt='已加入核算'";
   			$result=$Model->query($sql);
		    $data=array();
		    for($i=0;$i<count($result);$i++) {
		        $data['data'][$i][0]=$result[$i]['g_term'];
		        $data['data'][$i][1]=$result[$i]['g_institute'];
		        $data['data'][$i][2]=$result[$i]['g_sclass'];
		        $data['data'][$i][3]=$result[$i]['g_snumber'];
		        $data['data'][$i][4]=$result[$i]['g_sname'];
		        $data['data'][$i][5]=$result[$i]['g_project'];
		        $data['data'][$i][6]=$result[$i]['g_note'];
		    }
		     $this->ajaxReturn($data);
		}
		public function keshe(){
			$uname=$_GET['name'];
			$Model=new Model();
    		$sql = "SELECT  `p_link`, `p_score`, `id`,`plus`,`p_type`, `p_class`, `p_major`, `p_a_class`, `p_stunum`, `p_week`, `p_start`, `p_teacher`,`p_note` FROM `pra_work` where p_teacher='$uname' AND p_note='已加入核算'";
   			$result=$Model->query($sql);
		    $data=array();
		    for($i=0,$j=0;$j<count($result);$i++,$j+=2) {
		        $data['data'][$i][0]=$result[$j]['p_link'];
        		$data['data'][$i][1]=$result[$j]['p_score'];
		        $data['data'][$i][2]=$result[$j]['p_type'];
		        $data['data'][$i][3]=$result[$j]['p_class'];
		        $data['data'][$i][4]=$result[$j]['p_major'];
		        $data['data'][$i][5]=$result[$j]['p_a_class'].$result[$j+1]['p_a_class'];
		        $data['data'][$i][6]=$result[$j]['p_stunum'];
		        $data['data'][$i][7]=$result[$j]['p_week'];
		        $data['data'][$i][8]=$result[$j]['p_start'];
		        $data['data'][$i][9]=$result[$j]['plus'];
		    }
		     $this->ajaxReturn($data);
		}
		public function canvas(){
			$name=$_REQUEST["name"];
			$Model=new Model();
			$sql="SELECT  `w_course`, `w_cdesign`, `w_graduation`, `w_allowance`, `w_dynamic` FROM `workload` WHERE u_id='$name'";
			$data=array(array());
			$result=$Model->query($sql);
			$array=array("理论教学","实验教学","实践教学","补贴","额外工作量");
			$wn=array("w_course","w_cdesign","w_graduation","w_allowance","w_dynamic");
			for($i=0,$j=0;$i<5;$i++){
				$data[$i]["label"]=$array[$i];
				$data[$i]["value"]=$result[$j]["$wn[$i]"];
			}
			$this->ajaxReturn($data);
		}
	}
?>
