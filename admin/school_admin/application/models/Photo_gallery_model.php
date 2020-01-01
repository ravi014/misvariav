<?php
Class Photo_gallery_model extends CI_Model
{
 	function getAll()
 	{
		$this -> db -> select('*');
    	$this->db->from('web_photo_gallery_master');
	
		$this->db->where('status !=','Delete');
    	$this->db->order_by("gallery_code","desc");
      $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   	 
	
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
 
 	function get_photo_gallery_name(){
		$this -> db -> select('gallery_name');
   		$this -> db -> from('web_photo_gallery_master');
   $this->db->where('status !=','Delete');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
 	
 	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('web_photo_gallery_master');
   		$this -> db -> where('gallery_code', ''.$eid.'');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_record_dt($eid){
		$this -> db -> select('*');
   		$this -> db -> from('web_photo_gallery_detail');
   		$this -> db -> where('gallery_code', ''.$eid.'');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}

	function get_image_name($eid){
		$this -> db -> select('*');
   		$this -> db -> from('web_photo_gallery_detail');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   		$this -> db -> where('gallery_dt_code', ''.$eid.'');
		
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
		$this->db->where('gallery_dt_code', $eid);
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
      	$this->db->delete('web_photo_gallery_detail'); 
	}
  
}
?>
