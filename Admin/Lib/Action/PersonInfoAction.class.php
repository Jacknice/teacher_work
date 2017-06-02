<?php
	class PersonInfoAction extends Action{
		public function loading(){
			$id=$_GET['id'];
			$Model=new Model();
			$arry=$Model->query("SELECT `u_id`, `u_institue`, `u_role`, `u_name`, `u_sdept`, `u_gender`, `u_phone`, `u_mail` FROM `te_name` WHERE u_id='$id'");
			$this->ajaxReturn($arry,'登录成功!!!',1);
		}
		public function update(){
			$id=$_REQUEST["id"];
			$value=$_REQUEST["value"];
			$name=$_REQUEST["name"];
			if($id=="sex"){
				$sql="UPDATE `te_name` SET `u_gender`='$value' WHERE u_name='$name'";
			}else if($id=="email"){
				$sql="UPDATE `te_name` SET `u_mail`='$value' WHERE u_name='$name'";
			}else if($id=="xueyuan"){
				$sql="UPDATE `te_name` SET `u_institue`='$value' WHERE u_name='$name'";
			}else if($id=="name"){
				$sql="UPDATE `te_name` SET `u_name`='$value' WHERE u_name='$name'";
			}else if($id=="clazz"){
				$sql="UPDATE `te_name` SET `u_role`='$value' WHERE u_name='$name'";
			}else if($id=="xueli"){
				$sql="UPDATE `te_name` SET `u_sdept`='$value' WHERE u_name='$name'";
			}else{
				$sql="UPDATE `te_name` SET `u_phone`='$value' WHERE u_name='$name'";
			}
			$Model=new Model();
			$arry=$Model->query($sql);
			$this->ajaxReturn(1);
		}
	}
?>
