<?php
Class food_model extends CI_Model
{
 	function getAll($eid,$eid1)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('food_master');
   		$this -> db -> where('month',''.$eid.'');
		$this -> db -> where('year',''.$eid1.'');
		$this -> db -> order_by("date", "asc");
		$this -> db -> where('status !=', 'Delete');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
 
 function get_food_by_date($eid)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('food_master');
   		$this -> db -> where('date',''.$eid.'');
		$this -> db -> order_by("date", "asc");
		$this -> db -> where('status !=', 'Delete');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
 
 
  function get_food_list($eid)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('food_menu');
   		$this -> db -> where('type',''.$eid.'');
		$this -> db -> order_by("id", "desc");
		$this -> db -> where('status', 'Active');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
 	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('food_master');
   		$this -> db -> where('food_code', ''.$eid.'');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
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
  	
	function row_delete($month,$year)
  	{
	  $this->db->where('month', $month);
      $this->db->where('year', $year);
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
      $this->db->delete('food_master'); 
   	}
  	
  
	
}
?>
