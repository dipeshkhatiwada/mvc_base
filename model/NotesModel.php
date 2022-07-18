<?php
class NotesModel extends Model{
	protected $id,$title,$description,$date,$status,$created_by,$created_date,$updated_by,$updated_date;
	function createNotes(){
		$sql="insert into tbl_notes(title,description,date,status,created_by,created_date) values('$this->title','$this->description','$this->date','$this->status','$this->created_by','$this->created_date')";
		return $this->insert($sql);
	}
	function getAllNotes()
	{
		$sql="select * from tbl_notes order by created_date  desc";
		return $this->select($sql);
	}
	function deleteNotesByID(){
		$sql="delete from tbl_notes where id='$this->id'";
		return $this->delete($sql);
	}
	function getNotesByID(){
		$sql="select * from tbl_notes where id='$this->id'";
		return $this->select($sql);
	}
	function editNotes(){
		$sql="update tbl_notes set title='$this->title',description='$this->description',date='$this->date',status='$this->status',updated_by='$this->updated_by',updated_date='$this->updated_date' where id='$this->id'";
		return $this->update($sql);
	}
	function getNotesByDate(){
		$sql="select * from tbl_notes where date='$this->date' and status=1 order by created_date";
		return $this->select($sql);
	}
	function updateNotesByID(){
		$sql="update tbl_notes set status=0 where id='$this->id'";
		return $this->update($sql);
	}
	

}
?>