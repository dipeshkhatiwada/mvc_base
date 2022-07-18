<?php
class UserController extends Controller{
	function __construct(){
		@session_start();
		$this->admin=$this->loadModel('admin');
		$this->profile=$this->loadModel('profile');
	}
	function login(){
		// require_once "model/AdminModel.php";
		// $this->admin=new AdminModel();
		if (isset($_POST['btnLogin'])) {
			$err=[];
			if (isset($_POST['email']) && !empty($_POST['email'])) {
				$email=$this->admin->set('email',$_POST['email']);
			}else{
				$err['email']= "Enter email";
			}
			if (isset($_POST['password']) && !empty($_POST['password'])) {
				$password=$_POST['password'];
					// echo $salt=uniqid();
					// echo '<br>';
					// echo $pass=sha1($salt.$_POST['password']);
			}else{
				$err['password']= "Enter password";
			}
			if (count($err)==0) {
				$data=$this->admin->getAdminByEmail();
				// print_r($data);
				if (count($data)==1) {
					$np=sha1($data[0]->salt.$password);
					if ($np==$data[0]->password) {
						$profile=$this->profile->getCompanyName();
						$_SESSION['admin_name']=$data[0]->name;
						$_SESSION['admin_email']=$data[0]->email;
						$_SESSION['admin_username']=$data[0]->username;
						$_SESSION['admin_image']=$data[0]->image;
						$_SESSION['cname']=$profile[0]->company_name;
						$_SESSION['address']=$profile[0]->address;
						$_SESSION['phone']=$profile[0]->phone;
						if (isset($_POST['remember_me']) && !empty($_POST['remember_me'])) {
							setcookie('admin_name',$data[0]->name,time()+24*60*60);
							setcookie('admin_email',$data[0]->email,time()+24*60*60);
							setcookie('admin_username',$data[0]->username,time()+24*60*60);
							setcookie('admin_image',$data[0]->image,time()+24*60*60);
							setcookie('cname',$profile[0]->company_name,time()+24*60*60);
							setcookie('address',$profile[0]->address,time()+24*60*60);
							setcookie('phone',$profile[0]->phone,time()+24*60*60);
						}
						$path=base_url().'user/dashboard';
						header("location:$path");
					}else{
						$err['password']="Password not match";
					}
				}else{
					$err['email']="Email not found";
				}
			}
		}
		require_once "view/user/login.php";
	}

	function register()
	{
		require_once "view/user/error.php";
	}
	function dashboard(){
		// @session_start();
		// $this->title="Dashboard";		

		// $this->loadView('user/dashboard');

		$profile=$this->profile->getCompanyName();
		// print_r($profile);
		if (count($profile) > 0) {
			@session_start();
		$this->title="Dashboard";		

		$this->loadView('user/dashboard');

		}else{
		$this->title="Profile";		
		require_once "view/user/profile.php";
			// echo "string";
		}
		

	}
	function logout(){
		@session_start();
		session_destroy();
		setcookie('admin_name','',time()-1);
		setcookie('admin_email','',time()-1);
		setcookie('admin_username','',time()-1);
		$path=base_url().'user/login';
		header("location:$path");

	}
	function changePassword ()
	{
		if (isset($_POST['btnChangePassword'])) {
			$err=[];
			if (isset($_POST['old_password']) && !empty($_POST['old_password']) && trim($_POST['old_password']) !='') {
				$password=$_POST['old_password'];
			}else{
				$err['old_password']='Enter old Password';
			}
			if (isset($_POST['new_password']) && !empty($_POST['new_password']) && trim($_POST['new_password']) !='') {
				$new_password=$_POST['new_password'];
			}else{
				$err['new_password']='Enter New Password';
			}
			if (isset($_POST['confirm_password']) && !empty($_POST['confirm_password']) && trim($_POST['confirm_password']) !='') {
				if ($_POST['confirm_password']!=$new_password) {
					$err['confirm_password']='Password and confirm password not match';
				}
			}else{
				$err['confirm_password']='Enter confirm Password';
			}
			$this->admin->set('username',$_SESSION['admin_username']);
			$this->admin->set('email',$_SESSION['admin_email']);
			if (count($err)==0){
			$data=$this->admin->getAdminByEmail();
			// print_r($data);
				if (count($data)==1){
					 $p=sha1($data[0]->salt.$password);
					if ($p==$data[0]->password){
						$np=sha1($data[0]->salt.$new_password);
						$this->admin->set('password',$p);
						$this->admin->set('new_password',$np);
						$id=$this->admin->UpdatePassword();
						if ($id) {
							$err['sucess_messsage']="Password Changed Successfully";
						}else{
							$err['error_messsage']="Password Changed Fail";
						}
					}else{
						$err['error_messsage']="Old Password doesnot match";
					}

				}

			}
			$this->error=$err;
		}
		$this->title="Change Password";		

		$this->loadView('user/changepassword');
	}
}

?>