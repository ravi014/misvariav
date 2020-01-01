<?php
Class gallery_list_model extends CI_Model
{
 
 	function get_header_img(){
		$this -> db -> select('*');
   		$this -> db -> from('gen_cms');
   		$this -> db -> where('page_type','header_img');
		$this -> db -> where('page_title','image_gallery');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_eventname(){
		$this -> db -> select('gallery_code');
   		$this -> db -> from('web_photo_gallery_master');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_event_dt($eid)
	{
		$this -> db -> select('*');
   		$this -> db -> from('web_photo_gallery_master');
   		$this -> db -> where('gallery_code',''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;	
	}
	function get_eventimg($eid)
	{
		//$this -> db -> select('photopath');
		$this -> db -> select('photopath');
		$this -> db -> from('web_photo_gallery_detail');
		$this -> db -> where('gallery_code',''.$eid.'');
		//$this->db->group_by('gallery_code', 'DESC');
		//$this -> db -> order_by('event_dt_code', "DESC");
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
}
?>
