<?php
Class settings_mst_model extends CI_Model
{
	
	function getall()
	{
		$this -> db -> select('*');
   		$this -> db -> from('settings');
		$this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
 
 	function update($data,$table,$wherefield,$wherevalue){
		$this->db->where($wherefield, $wherevalue);
		$this->db->update($table, $data); 
	}

	function addItem($data,$table){
    	$this->db->insert($table , $data);
    	return $this->db->insert_id();
	}
	
	
	 function show_where($tbl,$where)
	{
		$this->db->select("*")->from($tbl)->where($where);
		$result=$this->db->get();
		return $result->result_array();	
	}
  
}
?>
