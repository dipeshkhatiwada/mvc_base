<?php
class BrandController extends Controller{
	function __construct(){
		session_start();
		$this->brand=$this->loadModel('brand');
		
	}
	function create(){
		// print_r($_POST);
		if (isset($_POST['btnCreate'])) {
			// print_r($_POST);
			$err=[];
			if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name']) !='') {
				$this->brand->set('name',$_POST['name']);
			}else{
				$err['name']='Enter name';
			}

			
			$this->brand->set('status',$_POST['status']);
			// $this->brand->set('slug',$_POST['slug']);
			$this->brand->set('created_by',$_SESSION['admin_username']);
			$this->brand->set('created_date',date('Y-m-d H:i:s'));
			// print_r($_FILES);
			// if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
			// 	move_uploaded_file($_FILES['image']['tmp_name'],'public/images/'.$_FILES['image']['name']);
   //              $this->brand->set('image',$_FILES['image']['name']);                 
			// }else{
			// 	$err['image']='Choose image';
			// }
			if (count($err)==0) {
			$id=$this->brand->createBrand();
			if ($id) {
				$err['sucess_messsage']="Brand Created with Id $id";
			}else{
				$err['error_messsage']="Brand not Created";
			}
			}
			
			$this->error=$err;
		}
		
		$this->title='Create Brand';
		$this->loadView('brand/create');

	}

	function index()
	{
		$this->branddata=$this->brand->getAllBrand();
		// print_r($this->categorydata);
		$this->title='list Brand';
		$this->loadView('brand/index');
		
	}
	function delete($id)
	{
			$this->brand->set('id',$id);
			$this->brand->deleteBrandByID();
			$this->branddata=$this->brand->getAllBrand();
		// print_r($this->categorydata);
		$this->title='list Brand';
		$this->loadView('brand/index');
	}

	function edit($id)
	{
			$this->brand->set('id',$id);
			$this->branddata=$this->brand->getBrandByID();
			if (isset($_POST['btnUpdate'])) {
			// print_r($_POST);
			$err=[];
			if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name']) !='') {
				$this->brand->set('name',$_POST['name']);
			}else{
				$err['name']='Enter name';
			}

			
			$this->brand->set('status',$_POST['status']);
			// $this->brand->set('slug',$_POST['slug']);
			$this->brand->set('updated_by',$_SESSION['admin_username']);
			$this->brand->set('updated_date',date('Y-m-d H:i:s'));
			// if (isset($_FILES['image']['name'])&& !empty($_FILES['image']['name'])) {
   //      		move_uploaded_file($_FILES['image']['tmp_name'],'public/images/'.$_FILES['image']['name']);
   //              $this->brand->set('image',$_FILES['image']['name']); 
	  //       }else{
	  //           $this->brand->set('image',$this->branddata[0]->image);
	  //        }
			if (count($err)==0) {
			$test=$this->brand->editBrand();
			if ($test) {
				$err['sucess_messsage']="Brand Updated";
			}else{
				$err['error_messsage']="Brand Update Failed";
			}
			}
			
			$this->error=$err;
		}
			$this->branddata=$this->brand->getBrandByID();
			$this->title='Update Brand';
			// $this->parentbrand=$this->brand->getAllParentCategory();
			$this->loadView('brand/edit');
	}
	

}
?>