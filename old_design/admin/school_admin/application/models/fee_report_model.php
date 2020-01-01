<?php
Class fee_report_model extends CI_Model
{
 	
 	function getStd()
 	{
		$this->db->select('standard_master.*');
		
    	$this->db->from('standard_master');
		
		$this->db->order_by("standard_master.standard_code","ASC");
		
		$this->db->where('standard_master.status !=','Delete');
		
    	$query = $this -> db -> get();
		
		$the_content = $query->result_array();
		
    	return $the_content;
		
 	}
 
	function get_user_type_name(){
		$this -> db -> select('head_name');
   		$this -> db -> from('erp_fee_head');
   		$this->db->where('status !=','Delete');
   
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('erp_fee_head');
   		$this -> db -> where('id', ''.$eid.'');
    
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
  
  
	function get_user_type()
 	{
		$this -> db -> select('*');
    	$this->db->from('erp_fee_head');
		$this -> db -> where('erp_fee_head.status','Active');
    	$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	function total_fee_term_standard($eid){
	
		$this -> db -> select('SUM(amt) as tot, term_id, standard_code');
		
   		$this -> db -> from('fee_income_dt');
		
   		$this -> db -> where('standard_code', ''.$eid.'');
		
		$this -> db -> group_by('term_id');
		
		$this -> db -> order_by('term_id','ASC');
				
     	$query = $this -> db -> get();
		
    	$the_content = $query->result_array();
		
    	return $the_content;
	
	}
	
	
	function total_fee_term_student($eid){
	
		$this -> db -> select('SUM(amt) as tot, term_id, standard_code');
		
   		$this -> db -> from('fee_income_dt');
		
   		$this -> db -> where('student_yearly_code', ''.$eid.'');
		
		$this -> db -> group_by('term_id');
		
		$this -> db -> order_by('term_id','ASC');
				
     	$query = $this -> db -> get();
		
    	$the_content = $query->result_array();
		
    	return $the_content;
	
	}
	
	function get_student($arr){	
	
		$this -> db -> select('student_yearly_acccount.student_yearly_code');
				
   		$this -> db -> select('student_master.*');
		
		$this -> db -> select('standard_master.standard_name');
		
		$this -> db -> select('city.name as city_name');
		
   		$this -> db -> from('student_yearly_acccount');
		
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		
		$this -> db -> join('standard_master','standard_master.standard_code = student_yearly_acccount.current_standard','left');
		
		$this -> db -> join('city','city.cityid = student_master.city_code','left');
	
		if($arr['standard']!=''){
			
			$this -> db -> where('student_yearly_acccount.current_standard',''.$arr['standard'].'');
		}
		
		
   		$this->db->where('student_master.status !=','Delete');
		
		$this -> db -> where('student_yearly_acccount.status','Active');
		
	    $this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');	
				
	    $this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

    	$query = $this -> db -> get();
		
    	$the_content = $query->result_array();
		
    	return $the_content;
 	}
	
	
	
	
}
?>
