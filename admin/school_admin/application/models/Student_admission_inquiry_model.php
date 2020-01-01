<?php
Class Student_admission_inquiry_model extends CI_Model
{
 	function getAll()
 	{	
		$this -> db -> select('*');
   		$this -> db -> from('enquiry');
		$this -> db -> order_by('e_id','Desc');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
 	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('enquiry');
   		$this -> db -> where('e_id', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
		function deletercd($eid){
		$this->db->where('e_id',$eid);
      	$this->db->delete('enquiry'); 
	}
}
?>
