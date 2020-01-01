<?php
Class Event_model extends CI_Model
{
 	
 	function getAll()
 	{
		$this -> db -> select('web_event_master.*');
    	$this->db->from('web_event_master');
		$this->db->order_by("web_event_master.event_code","desc");
		$this->db->where('web_event_master.status !=','Delete');
   $this -> db -> where('web_event_master.create_by',''.$this->session->userdata['logged_in_school']['usercode'].'');			
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
 
	function get_event_title(){
		$this -> db -> select('event_title');
   		$this -> db -> from('web_event_master');
   $this->db->where('status !=','Delete');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}

	function get_record1($eid)
 	{	
		$this -> db -> select('*');
   		$this -> db -> from('user_master');
   		$this -> db -> where('usercode', ''.$eid.'');
		$this -> db -> where('create_by', ''.$this->session->userdata['logged_in_school']['usercode'].'');
    	    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	} 

	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('web_event_master');
   		$this -> db -> where('event_code', ''.$eid.'');
		  $this -> db -> where('create_by', ''.$this->session->userdata['logged_in_school']['usercode'].'');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_record_dt($eid){
		$this -> db -> select('*');
   		$this -> db -> from('web_event_detail');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('event_code', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
		
    	return $the_content;
	}
	
		function get_image_name($eid){
		$this -> db -> select('*');
   		$this -> db -> from('web_event_detail');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   		$this -> db -> where('event_dt_code', ''.$eid.'');
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
  	
	function deletercd($eid){
		$this->db->where('event_dt_code', $eid);
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
      	$this->db->delete('web_event_detail'); 
	}
  
	function get_event()
 	{
		$this -> db -> select('*');
    	$this->db->from('web_event_master');
		$this -> db -> where('web_event_master.status','Active');
    		$this -> db -> where('create_by', ''.$this->session->userdata['logged_in_school']['usercode'].'');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

    	$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	function get_eventdt($eid)
 	{
		$this -> db -> select('*');
    	$this->db->from('web_event_detail');
		$this -> db -> where('event_code', ''.$eid.'');
      $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
  	$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
}
?>
