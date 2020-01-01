<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Comman_fun {
	
	function get_table_data($tbl=null, $where=null){
		
		$CI =& get_instance();
		
		$CI -> db -> select('*');
		
		$CI -> db -> from($tbl);
		
		if(is_array($where)){
			
			$CI -> db -> where($where);
			
		}
		
		$query = $CI -> db -> get();
		
    	$the_content = $query->result_array();
		
    	return $the_content;
	}
	
 	function select_query($sQuery){
		
		$CI =& get_instance();
		
		if($sQuery==''){
			
			return false;
			
		}
		
		$query = $CI->db->query($sQuery);
		
		$the_content = $query->result_array();
		
		return $the_content;
		
	}
	
	function check_record($tbl, $where){
		
		$CI =& get_instance();
		
		$CI -> db -> select('*');
		
		$CI -> db -> from($tbl);
		
		$CI -> db -> where($where);
		
		$query = $CI -> db -> get();
		
    	$the_content = $query->result_array();	
		
		$check_entry=(isset($the_content[0])) ? true : false; 
		
		return $check_entry;
		
	}
	
	function count_record($tbl, $where){
		
		$CI =& get_instance();
		
		$CI -> db -> select('count(*) as tot');
		
		$CI -> db -> from($tbl);
		
		$CI -> db -> where($where);
		
		$query = $CI -> db -> get();
		
    	$the_content = $query->result_array();	
		
		return (int)$the_content[0]['tot'];
		
	}
	
	function addItem($data,$table){
		$CI =& get_instance();	
    	$CI->db->insert($table , $data);
    	return $CI->db->insert_id();
	}
	
	function update($data,$table,$where)
	{
		
		$CI =& get_instance();	
		
		$CI->db->where($where);
		
		
		$CI->db->update($table, $data); 
		
	}
	function delete($table,$where)
	{
		$CI =& get_instance();	
		$CI->db->where($where);
		$CI->db->delete($table); 
	}
	
	
	
}
