<?php
	class LoginAction extends Action{
		public function index(){
			$this->display();
		}
		public function do_login(){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$user=M('Name');
			$where['u_phone']=$username;
			$where['u_password']=$password;
			$c=$user->where($where)->count();
			if($c>0){
				$_SESSION['name']=$username;
				$Model=new Model();
				$picture="http://127.0.0.1/teacher_work/Uploads/".$username.".jpg";
				$arry=$Model->query("SELECT u_id,u_name, u_role FROM te_name WHERE u_phone='$username' AND u_password='$password'");
				$Model->query("UPDATE `te_name` SET`u_picture`='$picture' WHERE u_phone='$username'");
				
				$this->ajaxReturn($arry,'登录成功!!!',1,JSON);
//				$this->redirect('Index/index');
			}else{
				$this->ajaxReturn(null);
			}
		}
	}
?>
