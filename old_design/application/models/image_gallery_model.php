<?php
Class image_gallery_model extends CI_Model
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
	
	function get_eventname($a,$b,$year){
		$this -> db -> select('web_photo_gallery_detail.*');
		$this -> db -> select('web_photo_gallery_master.gallery_name, web_photo_gallery_master.gallery_cover_img');
   		$this -> db -> from('web_photo_gallery_detail');
		$this -> db -> join('web_photo_gallery_master','web_photo_gallery_master.gallery_code = web_photo_gallery_detail.gallery_code and web_photo_gallery_master.year="'.$year.'"','left');
		$this -> db -> where('web_photo_gallery_master.status','Active');
		$this -> db -> group_by('web_photo_gallery_detail.gallery_code', 'DESC');
		$this -> db -> order_by("web_photo_gallery_master.gallery_dt", "DESC");
		$this	->	db ->limit($b , $a);
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	
	
	
	function get_lastimage($eid){
		$this -> db -> select('photopath');
   		$this -> db -> from('web_photo_gallery_detail');
		$this -> db -> where('gallery_code',''.$eid.'');
		//$this -> db -> order_by("event_dt_code", "DESC");
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content[0]['photopath'];
	}
	
	function get_eventimage($eid){
		$this -> db -> select('photopath');
   		$this -> db -> from('web_photo_gallery_detail');
		$this -> db -> where('gallery_code',''.$eid.'');
		//$this -> db -> order_by('event_dt_code', "DESC");
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function count_row($year){
		$this -> db -> select('count(*) as tot');
   		$this -> db -> from('web_photo_gallery_master');
		$this -> db -> where('status','Active');
		$this -> db -> where('year',''.$year.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	


}
?>
