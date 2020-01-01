<?php
Class Users_model extends CI_Model
{
 	
 	function getAll()
 	{
		
		$this -> db -> select('*');
   		$this -> db -> from('user_master');
   		$this -> db -> order_by("usercode", "desc");
		$this->db->where('status !=','Delete');
    	     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	     $this -> db -> where('user_type_id','4');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
		
 	}
 
		function get_user_type()
 	{
		$this->db->select('*');
    	$this->db->from('user_custom_type_master');
		$this->db->where('status !=','Delete');
    $this -> db -> where('create_by', ''.$this->session->userdata['logged_in_school']['usercode'].'');
$this -> db -> order_by('user_type_id', 'desc');
  $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_user_type_by_id($uid)
 	{
		$this->db->select('*');
    	$this->db->from('user_custom_type_master');
		$this->db->where('status !=','Delete');
    $this -> db -> where('create_by', ''.$this->session->userdata['logged_in_school']['usercode'].'');
 $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
  $this -> db -> where('user_type_id',''.$uid.'');			

		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	function get_record1($eid)
 	{	
		$this -> db -> select('*');
   		$this -> db -> from('user_master');
   		$this -> db -> where('usercode', ''.$eid.'');
		$this -> db -> where('create_by', ''.$this->session->userdata['logged_in_school']['usercode'].'');
    	     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	} 

	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('user_master');
   		$this -> db -> where('usercode', ''.$eid.'');
		$this -> db -> where('create_by', ''.$this->session->userdata['logged_in_school']['usercode'].'');
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
	 function show_where($tbl,$where)
	{
		$this->db->select("*")->from($tbl)->where($where);
		$result=$this->db->get();
		return $result->result_array();	
	}
  
  	
	function get_news()
 	{
		$this -> db -> select('*');
    	$this->db->from('user_master');
		$this -> db -> where('user_master.status','Active');
         $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
}
?>
