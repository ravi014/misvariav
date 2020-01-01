<?php
Class Fee_head_model extends CI_Model
{
 	
 	function getAll()
 	{
		$this -> db -> select('erp_fee_head.*');
    	$this->db->from('erp_fee_head');
		$this->db->order_by("erp_fee_head.id","desc");
		$this->db->where('erp_fee_head.status !=','Delete');
	     
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
 
	function get_user_type_name(){
		$this -> db -> select('head_name');
   		$this -> db -> from('erp_fee_head');
   		$this->db->where('status !=','Delete');
   
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('erp_fee_head');
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
  
  
	function get_user_type()
 	{
		$this -> db -> select('*');
    	$this->db->from('erp_fee_head');
		$this -> db -> where('erp_fee_head.status','Active');
    	$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	
	
}
?>
