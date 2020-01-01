<?php
Class user_type_model extends CI_Model
{
 	
 	function getAll()
 	{
		$this -> db -> select('user_custom_type_master.*');
    	$this->db->from('user_custom_type_master');
		$this->db->order_by("user_custom_type_master.user_type_id","desc");
		$this->db->where('user_custom_type_master.status !=','Delete');
   $this -> db -> where('user_custom_type_master.create_by',''.$this->session->userdata['logged_in_school']['usercode'].'');			
    $this -> db -> where('user_custom_type_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	 
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
 
	function get_user_type_name(){
		$this -> db -> select('name');
   		$this -> db -> from('user_custom_type_master');
   $this->db->where('status !=','Delete');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('user_custom_type_master');
   		$this -> db -> where('user_type_id', ''.$eid.'');
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
  
  
	function get_user_type()
 	{
		$this -> db -> select('*');
    	$this->db->from('user_custom_type_master');
		$this -> db -> where('user_custom_type_master.status','Active');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

    	$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
}
?>
