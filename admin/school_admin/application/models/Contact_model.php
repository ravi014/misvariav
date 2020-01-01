<?php
Class Contact_model extends CI_Model
{
 	function getAll($st)
 	{
		$this -> db -> select('*');
   		$this -> db -> from('alumni_contact');
   				
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
 
	
	function addItem($data,$table){
    	$this->db->insert($table , $data);
    	return $this->db->insert_id();
	}
	
	function update($data,$table,$wherefield,$wherevalue){
		$this->db->where($wherefield, $wherevalue);
		$this->db->update($table, $data); 
	}
  	
  
	
}
?>
