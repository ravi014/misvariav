<?php
Class Subject_mst_model extends CI_Model
{
 	function getAll($eid)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('subject_master');
		$this -> db -> where('standard_code',''.$eid.'');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   		$this -> db -> where('status !=', 'Delete');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_record($eid1)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('subject_master');
		$this -> db -> where('subject_code',''.$eid1.'');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   		$this -> db -> where('status !=', 'Delete');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
 	
		function get_standard_all(){
		$this -> db -> select('standard_code, standard_name');
   		$this -> db -> from('standard_master');
   		$this -> db -> where('status', 'Active');
		$this -> db -> order_by('standard_code', 'desc');
		    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_standard_by_id($eid)
	{
		$this -> db -> select('*');
   		$this -> db -> from('standard_master');
   		$this -> db -> where('standard_code', ''.$eid.'');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function addItem($data,$table){
    	$this->db->insert($table , $data);
    	return $this->db->insert_id();
	}
	
	function update($data,$table,$wherefield,$wherevalue)
	{
		$this->db->where($wherefield, $wherevalue);
		$this->db->update($table, $data); 
	}
  	
  
	
}
?>
