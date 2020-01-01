<?php
Class Holiday_model extends CI_Model
{
 	function getAll()
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('holiday_master');
   		$this -> db -> where('status !=', 'Delete');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> order_by("start_date", "asc");
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
 
 	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('holiday_master');
   		$this -> db -> where('holiday_code', ''.$eid.'');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
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
