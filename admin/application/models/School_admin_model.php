<?php
Class School_admin_model extends CI_Model
{
 	function getAll()
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('school_master');
		$this->db->order_by("school_code","desc");
		$array = array('status !=' => 'Delete');

		$this->db->where($array);
		$this -> db -> where('school_master.create_by',''.$this->session->userdata['logged_in_user'].'');			
    	$query = $this -> db -> get();
		
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	function check_user_code($arr)
	{
		$this -> db -> select('*');
   		$this -> db -> from('user_master');
		$this -> db -> where('username',''.$arr['username'].'');
		if($arr['mode']=='Edit')
		{
			$this -> db -> where('master_code !=',''.$arr['eid'].'');
			$this -> db -> where('user_type_id !=','1');
		}
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
  
	
		function get_login_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('school_master');
   		$this -> db -> where('school_code', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	
	function get_record($eid)
 	{	
		$this -> db -> select('*');
   		$this -> db -> from('school_master');
   		$this -> db -> where('school_code', ''.$eid.'');
		$this -> db -> where('create_by', ''.$this->session->userdata['logged_in_user'].'');
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
	
	
	function update1($data,$table,$where)
	{
		$this->db->where($where);
		$this->db->update($table, $data); 
		
	}	
}
?>
