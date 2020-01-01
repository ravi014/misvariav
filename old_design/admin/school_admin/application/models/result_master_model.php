<?php
Class result_master_model extends CI_Model
{

/// GET ALL STANDARD NAME /////
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
	
/// GET ALL EXAM TYPE/////
	function get_exam_type()
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('exam_type');
   		$this -> db -> where('status', 'Active');
		 $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
$this -> db -> order_by ('exam_type_code','Asc');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_standard_by_year($eid)
 	{	
   		$this -> db -> select('exam_master.*,standard_master.standard_name');
   		$this -> db -> from('exam_master');
  		$this -> db -> join('standard_master','standard_master.standard_code = exam_master.standard_code','left');

	$this->db->where('exam_master.account_year_code', $eid);
		 $this -> db -> where('standard_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		 $this -> db -> where('exam_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	 $this->db->group_by('exam_master.standard_code'); 

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_exam_by_standard($eid)
 	{	
   		$this -> db -> select('exam_master.*,exam_type.exam_title');
   		$this -> db -> from('exam_master');
  		$this -> db -> join('exam_type','exam_type.exam_type_code = exam_master.exam_type_code','left');

	$this->db->where('exam_master.standard_code', $eid);
		 $this -> db -> where('exam_type.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		 $this -> db -> where('exam_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	
	function get_year()
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('account_year_mst');
   		$this -> db -> where('status', 'Active');
		 $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
$this -> db -> order_by ('account_year_code','Asc');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}

/// DELETE ALL RECORD FROM RESULT MASTER  ///
	function row_delete($standard_code,$division_code,$subject_code)
  	{
	   $this->db->where('standard_code', $standard_code);
       $this->db->where('division_code', $division_code);
		 $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	   $this->db->where('subject_code', $subject_code);
       $this->db->delete('result_master'); 
   	}

/// GET  RECORD FROM STANDARD MASTER  ///
	function get_standard_by_code($eid)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('standard_master');
		 $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   		$this -> db -> where('standard_code', ''.$eid.'');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
/// GET  RECORD FROM SUBJECT MASTER  ///	
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
	
/// GET  ALL STUDENT LIST FROM STUDENT MASTER BY STANDARD AND DIVISION CODE ///
	function getAll($std,$div)
 	{	
		$this -> db -> select('student_yearly_acccount.student_yearly_code');
   		$this -> db -> select("CONCAT(student_master.first_name,' ',student_master.middle_name,' ',student_master.sur_name) AS student_name", FALSE);
		$this -> db -> select('standard_master.standard_name');
		$this -> db -> select('division_master.name as division_name');
		
   		$this -> db -> from('student_yearly_acccount');
		
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		$this -> db -> join('standard_master','standard_master.standard_code = student_yearly_acccount.current_standard','left');
		$this -> db -> join('division_master','division_master.division_code = student_yearly_acccount.division_code','left');
		
		if($std!=''){
			$this -> db -> where('student_yearly_acccount.current_standard',''.$std.'');
		
		}
		if($div!='')
		{
			$this -> db -> where('student_yearly_acccount.division_code',''.$div.'');
	 		
		}
		 		 $this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
 		 $this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
$this -> db -> where('student_yearly_acccount.status','Active');
		$this -> db -> order_by("student_yearly_code","asc");
		
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
/// GET  ALL RECORD FROM RESULT MASTER BY STANDARD , DIVISION CODE , SUBJECT CODE ///
	function get_student_by_division($std,$div,$sub)
	{
		$this -> db -> select('result_master.*');
		$this -> db -> select('student_yearly_acccount.student_code');
		$this -> db -> select('student_master.*');
   		$this -> db -> from('result_master');
		
		$this -> db -> join('student_yearly_acccount','student_yearly_acccount.student_yearly_code = result_master.student_yearly_code','left');
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		//$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		
   		if($std!=''){
		$this -> db -> where('result_master.standard_code',''.$std.'');
		}
		if($div!='')
		{
		$this -> db -> where('result_master.division_code',''.$div.'');
		}
		if($sub!='')
		{
		$this -> db -> where('result_master.subject_code',''.$sub.'');
		}
		  $this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
 		 $this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
  	$this -> db -> where('result_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
 
 	$this -> db -> where('result_master.status','Active');
		$this -> db -> order_by("result_code","asc");
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	
	
	function get_marks($std,$sub,$exam,$year)
	{
		$this -> db -> select('exam_details.*');
		$this -> db -> from('exam_details');
		
		$this -> db -> join('exam_master','exam_master.exam_code = exam_details.exam_code','left');
		
   		$this -> db -> where('exam_master.standard_code',''.$std.'');
	
		$this -> db -> where('exam_master.exam_type_code',''.$exam.'');
	$this -> db -> where('exam_master.account_year_code',''.$year.'');
	
	$this -> db -> where('exam_details.subject_code',''.$sub.'');
	  $this -> db -> where('exam_details.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
 		 $this -> db -> where('exam_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
  	$this -> db -> where('exam_master.status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	
	
/// GET  ALL RECORD FROM DIVISION MASTER USING STANDARD CODE  ///	
	function get_division_by_standard($eid){
		$this -> db -> select('division_code as id, name');
   		$this -> db -> from('division_master');
   		$this -> db -> where('status', 'Active');
		$this -> db -> where('standard_code',''.$eid.'');
	 $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
/// GET  ALL RECORD FROM SUBJECT MASTER USING STANDARD CODE  ///
	function get_subject_by_standard($eid){
		$this -> db -> select('*');
   		$this -> db -> from('subject_master');
   		$this -> db -> where('subject_master.standard_code',''.$eid.'');
		$this -> db -> where('subject_master.status','Active');
	 $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
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
	
/// INSERT A NEW RECORD INTO TABLE////
   function addItem($data,$table){
    	$this->db->insert($table , $data);
    	return $this->db->insert_id();
	 }	
}  
?>
   