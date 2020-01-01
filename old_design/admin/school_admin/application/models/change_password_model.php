<?php
Class change_password_model extends CI_Model
{
	
 	 function get_all(){
		$this -> db -> select('*');
   		$this -> db -> from('user_master');
   		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	
	}
	
	 function update_password($eid){
		$this -> db -> select('*');
   		$this -> db -> from('user_master');
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
