<?php
	class ShoujianAction extends Action{
		public function index(){
			$this->display();
		}
		public function isread(){
			$received=$_REQUEST["received"];
			$sql = "SELECT `send`, `sendtime`, `theme`, `content`, `isread` FROM `email` WHERE received='$received' AND isread='否'";
			$Model=new Model();
			$array=$Model->query($sql);
			$this->ajaxReturn($array);
		}
		public function received(){
			$received=$_REQUEST["received"];
			$sql = "SELECT `send`, `sendtime`, `theme`, `content`, `isread` FROM `email` WHERE received='$received'";
			$Model=new Model();
			$array=$Model->query($sql);
			$this->ajaxReturn($array);
		}
		public function emailDetail(){
			$sendName=$_REQUEST["sN"];
			$sendObject=$_REQUEST["sO"];
			$Model=new Model();
			$sql1="UPDATE `email` SET `isread`='是' WHERE send='$sendName' AND theme='$sendObject'";
			$array=$Model->execute($sql1);
			$sql = "SELECT `send`, `sendtime`, `theme`, `content`, `isread` FROM `email` WHERE send='$sendName' AND theme='$sendObject'";
			$result=$Model->query($sql);
			$this->ajaxReturn($result);
		}
		public function delemail(){
			$theme=$_REQUEST["theme"];
     		$send=$_REQUEST["send"];
     		$sql = "DELETE FROM `email` WHERE send='$send' AND theme='$theme'";
			$Model=new Model();
			$result=$Model->query($sql);
			$this->ajaxReturn(1);
		}
			
	}
?>
