<?php
Class Country_model extends CI_Model
{
	//All data of country
 	function getAll()
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('country');
		$this->db->order_by("countryid","desc");
		$array = array('status !=' => 'Delete');
		$this->db->where($array);
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	//Country details by countryid
	function get_record($eid)
 	{	
		$this -> db -> select('*');
   		$this -> db -> from('country');
   		$this -> db -> where('countryid', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
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
