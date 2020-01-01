<?php
Class Exam_mst_model extends CI_Model
{

	function getAll()
 	{	
   		$this -> db -> select('exam_details.*');
		$this -> db -> select('subject_master.subject_name');
		
   		$this -> db -> from('exam_details');
		
		$this -> db -> join('subject_master','subject_master.subject_code = exam_details.subject_code','left');
		      $this -> db -> where('subject_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$this -> db -> where('exam_details.exam_code', ''.$this->uri->segment(3).'');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_stadard(){
		$this -> db -> select('standard_code,standard_name');
   		$this -> db -> from('standard_master');
      $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   		$this -> db -> where('status','Active');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_exam_type()
	{
		$this -> db -> select('*');
   		$this -> db -> from('exam_type');
       $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
  		$this -> db -> where('status','Active');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_exam_detail($eid=null,$ac_yr=null){
		$this -> db -> select('exam_master.*');
		$this -> db -> select('exam_type.exam_title');
		
   		$this -> db -> from('exam_master');
		$this -> db -> join('exam_type','exam_type.exam_type_code = exam_master.exam_type_code','left');
	$this -> db -> where('exam_master.standard_code',''.$eid.'');
	
	    $this -> db -> where('exam_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	      $this -> db -> where('exam_type.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('exam_master.status','Active');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
		function get_current_year(){
		$this -> db -> select('*');
   		$this -> db -> from('account_year_mst');
   	    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('status', 'Active');
		$this -> db -> limit(1);
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_record($eid){
		$this -> db -> select('exam_details.*');
		$this -> db -> select('subject_master.subject_name');
   		$this -> db -> from('exam_details');
		$this -> db -> join('subject_master','subject_master.subject_code = exam_details.subject_code','left');
			      $this -> db -> where('subject_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	$this -> db -> where('exam_details.id', ''.$eid.'');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}

	
	function get_standard_subject($eid){
		$this -> db -> select('*');
   		$this -> db -> from('subject_master');
		$this -> db -> where('standard_code',''.$eid.'');
	      $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_standardnm($eid)
	{
		$this -> db -> select('*');
   		$this -> db -> from('standard_master');
  	      $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
 		$this -> db -> where('standard_code =',''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function getdet($val)
	{
		$this -> db -> select('*');
   		$this -> db -> select('exam_type.exam_title');
		
   		$this -> db -> from('exam_master');
		$this -> db -> join('exam_type','exam_type.exam_type_code = exam_master.exam_type_code','left');
	  	$this -> db -> join('standard_master','standard_master.standard_code = exam_master.standard_code','left');
	      $this -> db -> where('exam_type.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
 	    $this -> db -> where('exam_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
 	    $this -> db -> where('standard_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
 		$this -> db -> where('exam_code',''.$val.'');
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
		$this->db->where('standard_code', $eid);
  	      $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	$this->db->delete('standard_subject_detail'); 
	}
  	
  
	
}
?>
