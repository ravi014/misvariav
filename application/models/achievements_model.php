<?php
Class achievements_model extends CI_Model
{
 	function get_header_img(){
		$this -> db -> select('*');
   		$this -> db -> from('gen_cms');
   		$this -> db -> where('page_type','header_img');
		$this -> db -> where('page_title','achievements');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_contain(){
		$this -> db -> select('*');
   		$this -> db -> from('gen_cms');
   		$this -> db -> where('page_title','achievements');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}	
	
	function get_achievement(){
		$this -> db -> select('*');
   		$this -> db -> from('achievement_master');
		$this -> db -> where('status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}	
}
?>
