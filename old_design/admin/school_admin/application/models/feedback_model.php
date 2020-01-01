<?php
Class feedback_model extends CI_Model
{
 	function getAll($st)
 	{
		$this -> db -> select('feedback.*');
		$this -> db -> select('user_master.name, user_master.phone_no, user_master.mobileno');
		
		$this -> db -> from('feedback');
		$this -> db -> join('user_master','user_master.usercode = feedback.usercode','left');
		
		$this->db->where('feedback.status','Active');
		$this->db->where('feedback.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');
		if($st=='replay'){
			$this->db->where('feedback.feedback_replay !=','');
		}
		if($st=='noreplay'){
			$this->db->where('feedback.feedback_replay','');
		}
		
		$this->db->order_by("id", "desc");
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
  	
  
	
}
?>
