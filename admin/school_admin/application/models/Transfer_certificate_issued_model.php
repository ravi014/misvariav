<?php
Class Transfer_certificate_issued_model extends CI_Model
{
 	
function getAll()
{
		$this -> db -> select('slc_mater.*');
		
    	$this->db->from('slc_mater');
		
		$this->db->where('slc_mater.status !=','Delete');
   		
		$this->db->order_by("slc_mater.id","desc");
		
		$query = $this -> db -> get();
		
		$the_content = $query->result_array();
		
    	return $the_content;
}
 
	
function get_record($eid){
	
		$this -> db -> select('*');
	
   		$this -> db -> from('slc_mater');
	
   		$this -> db -> where('id', ''.$eid.'');

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
	
function get_news()
{
		$this -> db -> select('*');
		
    	$this->db->from('slc_mater');
		
		$this -> db -> where('slc_mater.status','Active');
		
		$query = $this -> db -> get();
		
		$the_content = $query->result_array();
		
    	return $the_content;
}
	
}
?>
