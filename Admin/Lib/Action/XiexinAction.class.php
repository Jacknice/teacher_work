<?php
	class XiexinAction extends Action{
		public function index(){
			$this->display();
		}
		public function send(){
			$send=$_REQUEST["send"];
		    $received=$_REQUEST["received"];
		    $sendtime=$_REQUEST["sendtime"];
		    $theme=$_REQUEST["theme"];
		    $content=$_REQUEST["content"];
		    $isread=$_REQUEST["isread"];
		    $sql = "INSERT INTO `email` VALUES (null,'$send','$received','$sendtime','$theme','$content','$isread')";
        
    		$Model=new Model();
			$array=$Model->execute($sql);
			if($array){
   					$this->ajaxReturn(1);
   			}
		}
		public function selectUser(){
			$send=$_REQUEST["send"];
			$sql = "SELECT u_name FROM `te_name`";
			$Model=new Model();
			$array=$Model->query($sql);
			$this->ajaxReturn($array);
		}
			
	}
?>
