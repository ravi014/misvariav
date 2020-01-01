<?php
Class student_admission_inquiry_model extends CI_Model
{
 	function getAll()
 	{	
		$this -> db -> select('*');
   		$this -> db -> from('inquiry_data');
		$this -> db -> order_by('id','Desc');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
 	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('inquiry_data');
   		$this -> db -> where('id', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	
	
	
  	
  
	
}
?>
