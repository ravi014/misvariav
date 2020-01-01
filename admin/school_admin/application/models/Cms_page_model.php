<?php
Class Cms_page_model extends CI_Model
{
 	function getAll(){
		$this->db->select('*');
    	$this->db->from('gen_cms');
		$this -> db -> where('page_type', 'cms_page');
		$this->db->where('status !=','Delete');
		$this -> db -> order_by('gen_cms_code', 'DESC');
    	$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
 
 	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('gen_cms');
   		$this -> db -> where('gen_cms_code', ''.$eid.'');
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
  	
	function deletercd($eid){
		$this->db->where('gen_cms_code', $eid);
      	$this->db->delete('gen_cms'); 
	}
  
	
}
?>
