<?php
	class TongjiAction extends Action{
		public function index(){
			$this->display();
		}
		public function data(){
			$sql = "SELECT  `u_id`  FROM `workload`";
			$Model=new Model();
			$array=$Model->query($sql);
			$category=array();
			for($i=0;$i<count($array);$i++) {
	           $category['category'][$i]["label"]=$array[$i]['u_id'];
	       	}
	       	$this->ajaxReturn($category);
		}
		public function lilun(){
			$sql = "SELECT  `w_course`  FROM `workload`";
			$Model=new Model();
			$array=$Model->query($sql);
			$category=array();
			for($i=0;$i<count($array);$i++) {
	           $category['data'][$i]["value"]=$array[$i]['w_course'];
	       	}
	       	$this->ajaxReturn($category);
		}
		public function shijian(){
			$sql = "SELECT  `w_cdesign`  FROM `workload`";
			$Model=new Model();
			$array=$Model->query($sql);
			$category=array();
			for($i=0;$i<count($array);$i++) {
	           $category['data'][$i]["value"]=$array[$i]['w_cdesign'];
	       	}
	       	$this->ajaxReturn($category);
		}
		public function bishe(){
			$sql = "SELECT  `w_graduation`  FROM `workload`";
			$Model=new Model();
			$array=$Model->query($sql);
			$category=array();
			for($i=0;$i<count($array);$i++) {
	           $category['data'][$i]["value"]=$array[$i]['w_graduation'];
	       	}
	       	$this->ajaxReturn($category);
		}
	}
?>
