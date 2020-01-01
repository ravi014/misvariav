<?php
Class video_list_model extends CI_Model
{
 	function getAll()
 	{
		
		$this->db->select('*');
    	$this->db->from('web_video_list');
		$this->db->where('status !=','Delete');
         $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
 function get_video_list_name(){
		$this -> db -> select('video_title');
   		$this -> db -> from('web_video_list');
   $this->db->where('status !=','Delete');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
 	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('web_video_list');
   		$this -> db -> where('video_id', ''.$eid.'');
	   $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_record_dt($eid){
		$this -> db -> select('*');
   		$this -> db -> from('web_video_master');
		$this->db->where('status !=','Delete');
   		$this -> db -> where('video_id', ''.$eid.'');
       $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}

	function get_image_name($eid){
		$this -> db -> select('*');
   		$this -> db -> from('web_video_list');
   		$this -> db -> where('video_id', ''.$eid.'');
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
  	
	function deletercd($eid){
		$this->db->where('video_id', $eid);
        $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	$this->db->delete('web_video_list'); 
	}
  
	
}
?>
