<?php
Class video_model extends CI_Model
{
 	function getAll()
 	{
		$this->db->select('*');
    	$this->db->from('web_video_master');
		$this->db->where('status !=','Delete');
    	         $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_video_name(){
		$this -> db -> select('video_name');
   		$this -> db -> from('web_video_master');
   $this->db->where('status !=','Delete');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	
	function get_video_by_id($vid)
 	{
		$this->db->select('*');
    	$this->db->from('web_video_master');
		$this->db->where('status !=','Delete');
$this -> db -> where('video_id', ''.$vid.'');
$this -> db -> order_by('video_code', 'desc');
    	         $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	function get_video(){
		$this -> db -> select('*');
   		$this -> db -> from('web_video_list');
   		$this -> db -> where('status !=', 'Delete');
    	         $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
 	
 	function get_record($eid)
	{
		$this -> db -> select('*');
   		$this -> db -> from('web_video_master');
   		$this -> db -> where('video_code', ''.$eid.'');
    	         $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

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
  	
	
}
?>
