<?php
Class Web_video_model extends CI_Model
{
 	function getAll()
 	{
		$this->db->select('*');
    	$this->db->from('video_master');
		$this->db->where('status !=','Delete');
    	$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
 
 	function get_record($eid)
	{
		$this -> db -> select('*');
   		$this -> db -> from('video_master');
   		$this -> db -> where('video_code', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_record_dt($eid)
	{
		$this -> db -> select('*');
   		$this -> db -> from('event_detail');
   		$this -> db -> where('event_code', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}

	function get_image_name($eid)
	{
		$this -> db -> select('*');
   		$this -> db -> from('event_detail');
   		$this -> db -> where('event_dt_code', ''.$eid.'');
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
  	
	function deletercd($eid)
	{
		$this->db->where('event_dt_code', $eid);
      	$this->db->delete('event_detail'); 
	}
  
	
}
?>
