<?php
Class School_information_model extends CI_Model
{
 	function get_header_img(){
		$this -> db -> select('*');
   		$this -> db -> from('gen_cms');
   		$this -> db -> where('page_type','header_img');
		$this -> db -> where('page_title','school_information');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}	
	function get_contain(){
		$this -> db -> select('*');
   		$this -> db -> from('gen_cms');
   		$this -> db -> where('page_title','school_information');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}	
}
?>
