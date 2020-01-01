<?php
Class home_model extends CI_Model
{
//All school record 
	function getAll()
 	{
		$this -> db -> select('count(*) as tot');
    	$this->db->from('school_master');
		$this->db->where('status','Active');
   		$this -> db -> where('school_master.create_by',''.$this->session->userdata['logged_in_user'].'');			
   		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
 
}
?>
