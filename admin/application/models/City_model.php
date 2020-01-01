<?php
Class City_model extends CI_Model
{
//Get all data 
 	function getAll()
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('city');
		$this->db->order_by("cityid","desc");
		$array = array('status !=' => 'Delete');
		$this->db->where($array);
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}

//Get city data by cityid	
	function get_record($eid)
 	{	
		$this -> db -> select('*');
   		$this -> db -> from('city');
   		$this -> db -> where('cityid', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	} 
	
 function show_where($tbl,$where)
	{
		$this->db->select("*")->from($tbl)->where($where);
		$result=$this->db->get();
		return $result->result_array();	
	}
  
	function addItem($data,$table)
	{
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
