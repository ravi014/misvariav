<?php
Class Standard_mst_model extends CI_Model
{
 	
 	function getAll()
 	{
		$this -> db -> select('standard_master.*');
    	$this->db->from('standard_master');
		$this->db->order_by("standard_master.standard_code","desc");
		$this->db->where('standard_master.status !=','Delete');
    $this -> db -> where('standard_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	 
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
 
	function get_standard_mst_name(){
		$this -> db -> select('standard_name');
   		$this -> db -> from('standard_master');
   $this->db->where('status !=','Delete');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_record($eid){
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
	
	function update($data,$table,$wherefield,$wherevalue){
		$this->db->where($wherefield, $wherevalue);
		$this->db->update($table, $data); 
	}
  
  
	function get_standard_mst()
 	{
		$this -> db -> select('*');
    	$this->db->from('standard_master');
		$this -> db -> where('standard_master.status','Active');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

    	$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
}
?>
