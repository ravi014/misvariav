<?php
Class Staff_model extends CI_Model
{
 	function get_header_img(){
		$this -> db -> select('*');
   		$this -> db -> from('gen_cms');
   		$this -> db -> where('page_type','header_img');
		$this -> db -> where('page_title','staff');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_contain(){
		$this -> db -> select('*');
   		$this -> db -> from('gen_cms');
   		$this -> db -> where('page_title','staff');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_all(){
		$this -> db -> select('*');
   		$this -> db -> from('cms_staff_master');
   		$this -> db -> where('status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_facilitator(){
		$this -> db -> select('*');
   		$this -> db -> from('cms_staff_master');
   		$this -> db -> where('staff_type','Facilitator');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_administration(){
		$this -> db -> select('*');
   		$this -> db -> from('cms_staff_master');
   		$this -> db -> where('staff_type','Administration');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_hospitality(){
		$this -> db -> select('*');
   		$this -> db -> from('cms_staff_master');
   		$this -> db -> where('staff_type','Hospitality');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_other(){
		$this -> db -> select('*');
   		$this -> db -> from('cms_staff_master');
   		$this -> db -> where('staff_type','Other');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
}
?>
