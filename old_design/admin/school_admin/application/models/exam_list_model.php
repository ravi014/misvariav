<?php
Class exam_list_model extends CI_Model
{
 	
 	function getAll()
 	{
		$this -> db -> select('exam_type.*');
    	$this->db->from('exam_type');
		$this->db->order_by("exam_type.exam_type_code	","desc");
		$this->db->where('exam_type.status !=','Delete');
    $this -> db -> where('exam_type.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	 
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
 
	function get_exam_list_name(){
		$this -> db -> select('exam_title');
   		$this -> db -> from('exam_type');
   $this->db->where('status !=','Delete');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('exam_type');
   		$this -> db -> where('exam_type_code	', ''.$eid.'');
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
  
  
	function get_exam_list()
 	{
		$this -> db -> select('*');
    	$this->db->from('exam_type');
		$this -> db -> where('exam_type.status','Active');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

    	$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
}
?>
