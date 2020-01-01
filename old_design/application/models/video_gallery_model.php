<?php
Class video_gallery_model extends CI_Model
{
 
 
 	function get_header_img(){
		$this -> db -> select('*');
   		$this -> db -> from('gen_cms');
   		$this -> db -> where('page_type','header_img');
		$this -> db -> where('page_title','video_gallery');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_video($a,$b,$year)
	{
		$this -> db -> select('*');
   		$this -> db -> from('video_master');
		$this -> db -> where('status','Active');
		$this -> db -> where('year',''.$year.'');
		$this	->	db ->limit($b , $a);
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_record($eid)
	{
		$this -> db -> select('*');
   		$this -> db -> from('video_master');
		$this -> db -> where('video_code',''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function count_row($year){
		$this -> db -> select('count(*) as tot');
   		$this -> db -> from('video_master');
		$this -> db -> where('status','Active');
		$this -> db -> where('year',''.$year.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}

}
?>
