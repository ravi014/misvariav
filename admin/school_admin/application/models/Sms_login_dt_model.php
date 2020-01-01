<?php
Class Sms_login_dt_model extends CI_Model
{
 	function getAll()
 	{	
	
		$this -> db -> select('student_yearly_acccount.student_yearly_code');
   		$this -> db -> select('student_master.student_code,student_master.phone');
		$this -> db -> select('user_master.username,user_master.password,user_master.end_code');
   		$this -> db -> from('student_yearly_acccount');
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		$this -> db -> join('user_master','user_master.end_code = student_master.student_code and user_master.user_type_id="3"','left');
		$this -> db -> where('student_yearly_acccount.current_standard',''.$_POST['standard_code'].'');
		$this -> db -> where('student_master.phone !=','');
  $this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
  $this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
  $this -> db -> where('user_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	
	function get_standard_all()
	{
		$this -> db -> select('standard_code as id, standard_name as name');
   		$this -> db -> from('standard_master');
   		$this -> db -> where('status', 'Active');
  $this -> db -> where('standard_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
$this -> db -> where('standard_code NOT IN (select standard_code from sms_send_login_dt where master_code='.$this->session->userdata['logged_in_school']['master_code'].' group by standard_code)');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_standard_send_login()
	{
		$this -> db -> select('standard_code as id, standard_name as name');
   		$this -> db -> from('standard_master');
   		$this -> db -> where('status', 'Active');
		$this -> db -> where('standard_code IN (select standard_code from sms_send_login_dt where master_code='.$this->session->userdata['logged_in_school']['master_code'].' group by standard_code)');
  $this -> db -> where('standard_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}

	
	function get_msg_dt($eid)
 	{	
		$this -> db -> select('sms_send_login_dt.*');
   		$this -> db -> select('CONCAT(student_master.first_name," ",student_master.middle_name," ",student_master.sur_name) as name',false);
   		$this -> db -> from('sms_send_login_dt');
		$this -> db -> join('student_master','student_master.student_code = sms_send_login_dt.student_code','left');
  $this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
  $this -> db -> where('sms_send_login_dt.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('sms_send_login_dt.standard_code',''.$eid.'');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	function addItem($data,$table){
    	$this->db->insert($table , $data);
    	return $this->db->insert_id();
	}
	
	
	
	function getAll_st($i)
 	{	
		$this -> db -> select('student_yearly_acccount.student_yearly_code');
   		$this -> db -> select('student_master.student_code,student_master.phone');
		$this -> db -> select('user_master.username,user_master.password,user_master.usercode');
   		$this -> db -> from('student_yearly_acccount');
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		$this -> db -> join('user_master','user_master.usercode = student_master.student_code and user_master.user_type_id="3"','left');
		$this -> db -> where('student_yearly_acccount.current_standard',''.$i.'');
		$this -> db -> where('student_master.phone !=','');
 		$this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
  		$this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
 		$this -> db -> where('user_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function check_student($eid)
	{
		$this -> db -> select('*');
   		$this -> db -> from('sms_send_login_dt');
		$this -> db -> where('student_code',''.$eid.'');
 		$this -> db -> where('sms_send_login_dt.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;		
	}
	
	function get_url()
 	{
   		$this -> db -> select('url');
   		$this -> db -> from('settings');
        $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
  	
  
	
}
?>
