<?php
Class student_dtl_model extends CI_Model
{
 	
	function get_record($eid){
		$this -> db -> select('student_master.*');
		$this -> db -> select('country.name as country_name');
		$this -> db -> select('state.name as state_name');
		$this -> db -> select('city.name as city_name');
		
		$this -> db -> join('country','country.countryid = student_master.country_code','left');
		$this -> db -> join('state','state.stateid = student_master.state_code','left');
		$this -> db -> join('city','city.cityid = student_master.city_code','left');
		
   		$this -> db -> from('student_master');
   		$this -> db -> where('student_master.student_code', ''.$eid.'');
   	    $this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('student_master.status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_student_yearly_info($eid){
		$this -> db -> select('student_yearly_acccount.*');
		$this -> db -> select('standard_master.standard_name');
		$this -> db -> select('division_master.name as division_name');
		
		$this -> db -> join('standard_master','standard_master.standard_code = student_yearly_acccount.current_standard','left');
		$this -> db -> join('division_master','division_master.division_code = student_yearly_acccount.division_code','left');
		
   		$this -> db -> from('student_yearly_acccount');
		$this -> db -> where('student_code',''.$eid.'');
		$this -> db -> where('student_yearly_acccount.status','Active');
   	    $this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   	    $this -> db -> where('standard_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   	    $this -> db -> where('division_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
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
	
function get_user_detail($eid){
		$this -> db -> select('*');
   		$this -> db -> from('user_master');
		$this -> db -> where('usercode',''.$eid.'');
	    $this -> db -> where('user_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}

	

}
?>
