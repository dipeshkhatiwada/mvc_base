<?php
class BrandModel extends Model{
	protected $id,$name,$status,$created_by,$created_date,$updated_by,$updated_date;
	function createbrand(){
	$sql="insert into tbl_brand(name,status,created_by,created_date) values('$this->name','$this->status','$this->created_by','$this->created_date')";
		return $this->insert($sql);
	}
	function getAllBrand()
	{
		$sql="select * from tbl_brand order by created_date  desc";
		return $this->select($sql);
	}
	function getAllActiveBrand()
	{
		$sql="select * from tbl_brand where status=1 order by created_date  desc";
		return $this->select($sql);
	}
	function deleteBrandByID(){
		$sql="delete from tbl_brand where id='$this->id'";
		return $this->delete($sql);
	}
	function getBrandByID(){
		$sql="select * from tbl_brand where id='$this->id'";
		return $this->select($sql);
	}
	function editBrand(){
		$sql="update tbl_brand set name='$this->name',status='$this->status',updated_by='$this->updated_by',updated_date='$this->updated_date' where id='$this->id'";
		return $this->update($sql);
	}
	

}
?>