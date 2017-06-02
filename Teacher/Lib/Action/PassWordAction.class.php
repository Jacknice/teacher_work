<?php
	class PassWordAction extends Action{
		public function update(){
			$upwd = $_REQUEST['ok_new_pwd'];
			$u_id= $_REQUEST['id'];
			$sql = "UPDATE te_name SET u_password ='$upwd' WHERE u_id='$u_id'";
			$Model=new Model();
			$arry=$Model->execute($sql);
			if($arry){
				$this->ajaxReturn(1);
			}else{
				$this->ajaxReturn(0);
			}
		}
	}
?>
