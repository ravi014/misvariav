<?php
Class profile_model extends CI_Model
{
 
		
	function show_where($tbl,$where)
	{
		$this->db->select("*")->from($tbl)->where($where);
	 $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	$this -> db -> where('user_type_id','1');
		$result=$this->db->get();
		return $result->result_array();	
	}
	 function show_where1($tbl,$where)
	{
		$this->db->select("*")->from($tbl)->where($where);
		$result=$this->db->get();
		return $result->result_array();	
	}
  
	function update($data,$table,$wherefield,$wherevalue){
		$this->db->where($wherefield, $wherevalue);
		$this->db->update($table, $data); 
	}

	function check_user_code($arr)
	{
		$this -> db -> select('*');
   		$this -> db -> from('user_master');
			$this -> db -> where('username',''.$arr['username'].'');
		$this -> db -> where('usercode !=',''.$arr['eid'].'');
		$this -> db -> where('user_type_id','1');
			 $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
 
}
?>
