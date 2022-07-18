<?php
class AdminModel extends Model{
	protected $id,$name,$username,$email,$password,$new_password,$salt,$last_login,$status;
	function getAdminByEmail(){
		$sql="select * from tbl_admin where email='$this->email' and status=1";
		return $this->select($sql);
	}
	function UpdatePassword()
	{
		echo $sql="update tbl_admin set password='$this->new_password' where email='$this->email' and status=1 and password='$this->password'";
		return $this->update($sql);
	}

}
?>