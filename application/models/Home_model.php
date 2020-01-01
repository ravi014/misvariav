<?php
Class Home_model extends CI_Model
{
 	function get_slider_img(){
		$this -> db -> select('*');
   		$this -> db -> from('gen_cms');
   		$this -> db -> where('page_type','slider_img');
		$this -> db -> where('status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_announcement(){
		$this -> db -> select('*');
   		$this -> db -> from('gen_cms');
   		$this -> db -> where('page_type','announcement');
		$this -> db -> where('gen_cms.status','Active');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_latest_event(){
		$this -> db -> select('web_event_detail.*');
		$this -> db -> select('web_event_master.*');
   		$this -> db -> from('web_event_detail');
   		$this -> db -> join('web_event_master','web_event_master.event_code = web_event_detail.event_code','left');
		$this -> db -> order_by("web_event_master.event_code", "DESC");
		$this->db->group_by('web_event_detail.event_code', 'DESC');
		$this	->	db ->limit(4);
		$this -> db -> where('web_event_master.status','Active');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
}
?>
