<?php
class ProfileController extends Controller{
	function __construct(){
		@session_start();
		$this->profile=$this->loadModel('profile');
		$this->category=$this->loadModel('category');
		$this->brand=$this->loadModel('brand');
		$this->supplier=$this->loadModel('supplier');
	}

	function create(){
		// print_r($_POST);
		if (isset($_POST['btnCreate'])) {
			// print_r($_POST);
			$err=[];
			if (isset($_POST['company_name']) && !empty($_POST['company_name']) && trim($_POST['company_name']) !='') {
				$this->profile->set('company_name',$_POST['company_name']);
			}else{
				$err['company_name']='Enter Company name';
			}
			if (isset($_POST['address']) && !empty($_POST['address']) && trim($_POST['address']) !='') {
				$this->profile->set('address',$_POST['address']);
			}else{
				$err['address']='Enter Address';
			}
			if (isset($_POST['phone']) && !empty($_POST['phone']) && trim($_POST['phone']) !='') {
				$this->profile->set('phone',$_POST['phone']);
			}else{
				$err['phone']='Enter Phone number';
			}
			
			if (isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email']) !=''){
				$this->profile->set('email',$_POST['email']);				
			}else{
				$err['email']='Enter email';
			}
			if (isset($_POST['pan_no']) && !empty($_POST['pan_no']) && trim($_POST['pan_no']) !=''){
				$this->profile->set('pan_no',$_POST['pan_no']);				
			}else{
				$err['pan_no']='Enter pan_no';
			}
			if (isset($_POST['reg_no']) && !empty($_POST['reg_no']) && trim($_POST['reg_no']) !=''){
				$this->profile->set('reg_no',$_POST['reg_no']);				
			}else{
				$err['reg_no']='Enter reg_no';
			}
			if (isset($_POST['established_date']) && !empty($_POST['established_date']) && trim($_POST['established_date']) !=''){
				$this->profile->set('established_date',$_POST['established_date']);				
			}else{
				$err['established_date']='Select  established date';
			}
			
			$this->profile->set('service_charge',$_POST['service_charge']);				
			$this->profile->set('discount',$_POST['discount']);				
			$this->profile->set('vat',$_POST['vat']);				
			
			
			if (count($err)==0) {
				// print_r($_POST);
				$id=$this->profile->createProfile();
				if ($id) {
					$profile=$this->profile->getCompanyName();
					@session_start();
					$_SESSION['cname']=$profile[0]->company_name;
					$_SESSION['address']=$profile[0]->address;
					$_SESSION['phone']=$profile[0]->phone;
					$profile=$this->profile->getCompanyName();
					setcookie('cname',$profile[0]->company_name,time()+24*60*60);
					setcookie('address',$profile[0]->address,time()+24*60*60);
					setcookie('phone',$profile[0]->phone,time()+24*60*60);

					$path=base_url().'user/dashboard';
					header("location:$path");
				}else{
					$err['error_messsage']="Profile not Created";
				}
			}
			
			$this->error=$err;
	}
		
		$this->title='Create Profile';
		$this->categorydata=$this->category->getAllActiveCategory();
		$this->branddata=$this->brand->getAllActiveBrand();
		$this->supplierdata=$this->supplier->getAllActiveSupplier();
		// print_r($this->categorydata);
		$this->loadView('profile/create');

	}

	function index(){
		$this->profiledata=$this->profile->getAllProfile();
		// print_r($this->profiledata);
		$this->title='list profile';
		$this->loadView('profile/index');
		
	}
	function delete($id)
	{
		$this->profile->set('id',$id);
		$this->profile->deleteprofileByID();
		$this->categorydata=$this->category->getAllActiveCategory();
		$this->branddata=$this->brand->getAllActiveBrand();
		$this->profiledata=$this->profile->getAllProfile();
		// print_r($this->profiledata);
		$this->title='list profile';
		$this->loadView('profile/index');
	}

	function edit($id)
	{
		$this->profile->set('id',$id);
		if (isset($_POST['btnUpdate'])) {
			// print_r($_POST);
			$err=[];
			if (isset($_POST['company_name']) && !empty($_POST['company_name']) && trim($_POST['company_name']) !='') {
				$this->profile->set('company_name',$_POST['company_name']);
			}else{
				$err['company_name']='Enter Company name';
			}
			if (isset($_POST['address']) && !empty($_POST['address']) && trim($_POST['address']) !='') {
				$this->profile->set('address',$_POST['address']);
			}else{
				$err['address']='Enter Address';
			}
			if (isset($_POST['phone']) && !empty($_POST['phone']) && trim($_POST['phone']) !='') {
				if ($_POST['phone']<9899999999) {
					$this->profile->set('phone',$_POST['phone']);
				}else{
					$err['phone']='Enter valid Phone number';
				}
			}else{
				$err['phone']='Enter Phone number';
			}
			if (isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email']) !='') {
				$this->profile->set('email',$_POST['email']);
			}else{
				$err['email']='Enter email Address';
			}
			if (isset($_POST['pan_no']) && !empty($_POST['pan_no']) && trim($_POST['pan_no']) !='') {
				$this->profile->set('pan_no',$_POST['pan_no']);
			}else{
				$err['pan_no']='Enter pan Number';
			}
			if (isset($_POST['reg_no']) && !empty($_POST['reg_no']) && trim($_POST['reg_no']) !=''){
				$this->profile->set('reg_no',$_POST['reg_no']);				
			}else{
				$err['reg_no']='Enter reg no';
			}
			$this->profile->set('established_date',$_POST['established_date']);				
			// $this->profile->set('updated_by',$_SESSION['admin_username']);
			// $this->profile->set('updated_date',date('Y-m-d H:i:s'));
			
			if (count($err)==0) {
				// print_r($_POST);
				$id=$this->profile->editProfile();
				if ($id) {
					$err['sucess_messsage']="Profile Updated";
				}else{
					$err['error_messsage']="Profile not Updated";
				}
			}
			
			$this->error=$err;
		}
			$this->profiledata=$this->profile->getAllProfile();
			$this->title='Update Profile';
			$this->loadView('profile/edit');
	}
	function updateServiceCharge ($id){
		
		if (isset($_POST['btnServiceCharge'])) {
			$err=[];
			$this->profile->set('service_charge',$_POST['service_charge']);				
			$this->profile->set('id',$id);				
			$id=$this->profile->updateServiceCharge();
			if ($id) {
				$this->redirect('profile/index');
			}else{
				echo $err['error_messsage']="Profile not Updated";
			}
		}
	}
	function updateDiscount ($id){
		
		if (isset($_POST['btnDiscount'])) {
			$err=[];
			$this->profile->set('discount',$_POST['discount']);				
			$this->profile->set('id',$id);				
			$id=$this->profile->updateDiscount();
			if ($id) {
				$this->redirect('profile/index');
			}else{
				echo $err['error_messsage']="Profile not Updated";
			}
		}
	}
	function updateVat ($id){
		
		if (isset($_POST['btnVat'])) {
			$err=[];
			$this->profile->set('vat',$_POST['vat']);				
			$this->profile->set('id',$id);				
			$id=$this->profile->updateVat();
			if ($id) {
				$this->redirect('profile/index');
			}else{
				echo $err['error_messsage']="Profile not Updated";
			}
		}
	}

}

?>