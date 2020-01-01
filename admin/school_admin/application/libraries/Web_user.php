<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Web_user {

	function get_standard($eid=''){
		$CI =& get_instance();
		$CI -> db -> select('standard.*');
		$CI -> db -> from('standard_master');
		$CI-> db -> where('status', 'Active');
		$CI-> db -> order_by('standard_code', 'desc');
		$CI -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $CI -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
 	
	
	function get_division($eid)
	{
		$CI =& get_instance();
		$CI -> db -> select('*');
   		$CI -> db -> from('division_master');
		$CI -> db -> where('standard_code',''.$eid.'');
		
		$CI -> db -> where('status', 'Active');
	   $CI-> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

    	$query = $CI -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	

	function addItem($data,$table){
		$CI =& get_instance();	
    	$CI->db->insert($table , $data);
    	return $CI->db->insert_id();
	}
	
	function update($data,$table,$wherefield,$wherevalue){
		$CI =& get_instance();	
		$CI->db->where($wherefield, $wherevalue);
		$CI->db->update($table, $data); 
	}
	
	
	
	
	

	
	
}
