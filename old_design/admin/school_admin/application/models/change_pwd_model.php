<?php
Class change_pwd_model extends CI_Model
{
 
		
	function get_old_password()
	{
		$this -> db -> select('user_master.*');
		$this -> db -> from('user_master');
		$this -> db -> where('user_master.usercode =',''.$this->session->userdata['logged_in_school']['usercode'].'');
				$this -> db -> where('user_master.master_code =',''.$this->session->userdata['logged_in_school']['master_code'].'');

		$this -> db -> where('user_master.user_type_id','1');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function update($data,$table,$wherefield,$wherevalue){
		$this->db->where($wherefield, $wherevalue);
		$this->db->update($table, $data); 
	}

	
 
}
?>
