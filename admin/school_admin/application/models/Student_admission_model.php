<?php
Class Student_admission_model extends CI_Model
{
 	function getAll()
 	{	
		$this -> db -> select('student_yearly_acccount.student_yearly_code');
   		$this -> db -> select('student_master.*');
		$this -> db -> select('standard_master.standard_name');
		//$this -> db -> select('division_master.name as division_name');
	
   		$this -> db -> from('student_yearly_acccount');
		
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		$this -> db -> join('standard_master','standard_master.standard_code = student_yearly_acccount.current_standard','left');
		//$this -> db -> join('division_master','division_master.division_code = student_yearly_acccount.division_code','left');
	
		if($this->uri->segment(3)!=''){
			
			$this -> db -> where('student_yearly_acccount.current_standard',''.$this->uri->segment(3).'');
		}
		
		if($this->uri->segment(4)!='')
		{
			$this -> db -> where('student_yearly_acccount.division_code',''.$this->uri->segment(4).'');
		}
   		$this->db->where('student_master.status !=','Delete');
		
		$this->db->order_by('student_master.sur_name','asc');
		
		$this->db->order_by('student_master.first_name','asc');
		
		$this->db->order_by('student_master.middle_name','asc');
		
		//$this -> db -> where('student_yearly_acccount.status','Active');
	    $this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	    $this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_user_master($eid){
		$this -> db -> select('*');
   		$this -> db -> from('user_master');
   		$this -> db -> where('end_code', ''.$eid.'');
		$this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
 	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('student_master');
   		$this -> db -> where('student_code', ''.$eid.'');
		$this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	
	
	function get_division_by_standard($eid){
		$this -> db -> select('division_master.division_code as id,division_master.name, division_master.standard_code');
   		$this -> db -> select('standard_master.division');
   		$this -> db -> from('division_master');
   		$this -> db -> join('standard_master','standard_master.standard_code = division_master.standard_code','left');
		$this -> db -> where('division_master.status', 'Active');
		$this -> db -> where('division_master.standard_code',''.$eid.'');
	     $this -> db -> where('division_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_standard_all(){
		$this -> db -> select('standard_code as id, standard_name as name');
   		$this -> db -> from('standard_master');
   		$this -> db -> where('status', 'Active');
   	    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_gen_option($type){
		$this -> db -> select('filed_name as name, field_value as id');
   		$this -> db -> from('general_option');
   		$this -> db -> where('type', ''.$type.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	

	
	function get_division(){
		$this -> db -> select('division_code as id, name');
   		$this -> db -> from('division_master');
		$this -> db -> where('status','Active');
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
	
	function get_country(){
		$this -> db -> select('countryid, name');
   		$this -> db -> from('country');
   		$this -> db -> where('status', 'Active');
		$this->db->order_by("countryid","desc");
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	
	
	function get_state($eid){
		$this -> db -> select('stateid, name');
   		$this -> db -> from('state');
   		$this -> db -> where('status', 'Active');
		$this -> db -> where('countryid', ''.$eid.'');
		$this->db->order_by("stateid","desc");
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_city($eid){
		$this -> db -> select('cityid, name');
   		$this -> db -> from('city');
		$this -> db -> where('stateid', ''.$eid.'');
   		$this -> db -> where('status', 'Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	
	function get_student_yearly_code($eid){
		$this -> db -> select('*');
   		$this -> db -> from('student_yearly_acccount');
		$this -> db -> where('student_code', ''.$eid.'');
   	    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   		$this -> db -> where('status', 'Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	
	
	function get_student_yearly_info($eid){
		$this -> db -> select('*');
   		$this -> db -> from('student_yearly_acccount');
		$this -> db -> where('student_code',''.$eid.'');
   	    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
		
	
	 function show_where1($tbl,$where)
	{
		$this->db->select("*")->from($tbl)->where($where);
		$result=$this->db->get();
		return $result->result_array();	
	}
	
	function addItem($data,$table){
    	$this->db->insert($table , $data);
    	return $this->db->insert_id();
	}
	
	function update($data,$table,$wherefield,$wherevalue){
		$this->db->where($wherefield, $wherevalue);
		$this->db->update($table, $data); 
	}
  	
	
	function all_user_cng_user(){
		$this -> db -> select('*');
   		$this -> db -> from('user_master');
   		$this -> db -> where('end_code != "0"');
		$this -> db -> where('username != ""');
		$this -> db -> where('status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function getAll_export()
 	{	
		$this -> db -> select('student_yearly_acccount.student_yearly_code');
   		$this -> db -> select('student_master.*');
		$this -> db -> select('user_master.*');
		$this -> db -> select('standard_master.standard_name');
		
   		$this -> db -> from('student_yearly_acccount');
		
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		$this -> db -> join('standard_master','standard_master.standard_code = student_yearly_acccount.current_standard','left');
		$this -> db -> join('user_master','user_master.end_code = student_master.student_code','left');
		
		if($this->uri->segment(3)!=''){
			
			$this -> db -> where('student_yearly_acccount.current_standard',''.$this->uri->segment(3).'');
		}
		
		if($this->uri->segment(4)!='')
		{
			$this -> db -> where('student_yearly_acccount.division_code',''.$this->uri->segment(4).'');
		}
   		$this->db->where('student_master.status !=','Delete');
		$this -> db -> where('user_master.status','Active');
	    $this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	    $this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
  
	
}
?>
