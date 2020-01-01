<?php
Class contact_model extends CI_Model
{
 	function get_header_img(){
		$this -> db -> select('*');
   		$this -> db -> from('gen_cms');
   		$this -> db -> where('page_type','header_img');
		$this -> db -> where('page_title','contact');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_contain(){
		$this -> db -> select('*');
   		$this -> db -> from('gen_cms');
   		$this -> db -> where('page_title','contact');
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
