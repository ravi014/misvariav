<?php
Class Student_timetable_model extends CI_Model
{
 	function getAll()
 	{	
   		$this -> db -> select('timetable_master.*');
		$this -> db -> select('standard_master.standard_name');
		$this -> db -> select('subject_master.subject_name');
		
   		$this -> db -> from('timetable_master');
		$this -> db -> join('standard_master','standard_master.standard_code = timetable_master.standard_code','left');
		$this -> db -> join('subject_master','subject_master.subject_code = timetable_master.subject_code','left');
     $this -> db -> where('timetable_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
     $this -> db -> where('subject_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
     $this -> db -> where('standard_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   		$this -> db -> where('timetable_master.status !=', 'Delete');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
 	function get_lecture()
 	{
   		$this -> db -> select('lecture');
   		$this -> db -> from('settings');
        $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
   function getstandard()
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('standard_master');
   		$this -> db -> where('status !=', 'Delete');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_standard_by_code($eid)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('standard_master');
   		$this -> db -> where('standard_code', ''.$eid.'');
      $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	 function getsubject($eid)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('subject_master');
		$this -> db -> where('standard_code', ''.$eid.'');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   		$this -> db -> where('status !=', 'Delete');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	 function get_lac_by_day($eid,$day,$lecture)
 	{	
   		$this -> db -> select('timetable_master.lecture');
		$this -> db -> select('subject_master.subject_name');
   		$this -> db -> from('timetable_master');
		$this -> db -> join('subject_master','subject_master.subject_code = timetable_master.subject_code','left');
   		$this -> db -> where('timetable_master.standard_code', ''.$eid.'');
		$this -> db -> where('timetable_master.day', ''.$day.'');
		$this -> db -> where('timetable_master.lecture', ''.$lecture.'');
      $this -> db -> where('subject_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
     $this -> db -> where('timetable_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_time_table_record($arr){
		$this -> db -> select('*');
   		$this -> db -> from('timetable_master');
   		$this -> db -> where('standard_code',''.$arr['standard_code'].'');
		$this -> db -> where('division_code',''.$arr['division_code'].'');
		$this -> db -> where('day',''.$arr['day'].'');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('lecture',''.$arr['lecture'].'');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	

 	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('timetable_master');
   		$this -> db -> where('standard_code', ''.$eid.'');
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
	
	function delete_time_table($id)
	{
		$this->db->where('standard_code', $id);
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this->db->delete('timetable_master');
	}
	
	
	function getstandardbycode($eid)
 	{	
   		$this -> db -> select('standard_code');
   		$this -> db -> from('standard_master');
		$this -> db -> where('standard_name',''.$eid.'');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	 function getsubjectbycode($eid)
 	{	
   		$this -> db -> select('subject_code');
   		$this -> db -> from('subject_master');
		$this -> db -> where('subject_name',''.$eid.'');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	function getsubject_by_standard($eid)
	{
		$this -> db -> select('standard_subject_detail.*');
		$this -> db -> select('subject_master.subject_name');
   		$this -> db -> from('standard_subject_detail');
		$this -> db -> join('subject_master','subject_master.subject_code = standard_subject_detail.subject_code','left');
   		$this -> db -> where('standard_subject_detail.standard_code', ''.$eid.'');
	     $this -> db -> where('subject_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');				
     $this -> db -> where('standard_subject_detail.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');				

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
		
	}
	
	
	 function getsubjectbyname($eid)
 	{	
   		$this -> db -> select('subject_name');
   		$this -> db -> from('subject_master');
		$this -> db -> where('subject_code',''.$eid.'');
     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	

	function get_single_record($id1,$id2,$id3)
	{
		$this -> db -> select('timetable_master.*');
		$this -> db -> select('subject_master.subject_name');
	 		$this -> db -> from('timetable_master');
		
		$this -> db -> join('subject_master','subject_master.subject_code = timetable_master.subject_code','left');
	     $this -> db -> where('subject_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');				
   		
	   $this -> db -> where('timetable_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');				

		$this -> db -> where('timetable_master.standard_code',''.$id1.'');
		$this -> db -> where('timetable_master.day',''.$id2.'');
		$this -> db -> where('timetable_master.lecture',''.$id3.'');
		$this -> db -> where('timetable_master.status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
		
		
	}
	
	function row_delete($standard_code,$division_code)
  	{
	  $this->db->where('standard_code', $standard_code);
      $this->db->where('division_code', $division_code);
      $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
     $this->db->delete('timetable_master'); 
   	}
  	
	
	function get_division_by_standard($eid){
		$this -> db -> select('division_code as id, name');
   		$this -> db -> from('division_master');
   		$this -> db -> where('status', 'Active');
	     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	$this -> db -> where('standard_code',''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
  
	
}
?>
