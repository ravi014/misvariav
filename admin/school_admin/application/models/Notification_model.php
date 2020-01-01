<?php
Class Notification_model extends CI_Model
{
 	
	function getAll()
 	{	
		
   		$this -> db -> select('notification.*');
		//$this -> db -> select('standard_master.standard_name');
   		$this -> db -> from('notification');
		//$this -> db -> join('standard_master','standard_master.standard_code = notification.standard_code','left');
 	 	//$this -> db -> where('standard_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
  		$this -> db -> where('notification.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('notification.status !=','Delete');
		$this -> db -> order_by('notification.noti_code','Desc');
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
	
	
	function get_record($eid)
 	{
   		$this -> db -> select('*');
   		$this -> db -> from('notification');
		$this -> db -> where('noti_code =',''.$eid.'');
   		$this -> db -> where('status !=', 'Delete');
  $this -> db -> where('notification.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_standard_all(){
		$this -> db -> select('standard_code as id, standard_name as name');
   		$this -> db -> from('standard_master');
  $this -> db -> where('standard_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
   		$this -> db -> where('status', 'Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_division(){
		$this -> db -> select('division_code as id, name as name');
   		$this -> db -> from('division_master');
  $this -> db -> where('division_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_student_new($standard_code){
	 	$this -> db -> select('student_yearly_acccount.student_yearly_code');
   		$this -> db -> select('student_master.*');
		$this -> db -> select('standard_master.standard_name');
		
		
   		$this -> db -> from('student_yearly_acccount');
		
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		$this -> db -> join('standard_master','standard_master.standard_code = student_yearly_acccount.current_standard','left');
		$this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('standard_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		$this -> db -> where('student_yearly_acccount.current_standard',''.$standard_code.'');
		$this -> db -> where('student_yearly_acccount.status','Active');
		
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_student($standard_code){
	 	$this -> db -> select('student_yearly_acccount.student_yearly_code');
   		$this -> db -> select('student_master.*');
		$this -> db -> select('standard_master.standard_name');
		$this -> db -> select('division_master.name as division_name');
		
   		$this -> db -> from('student_yearly_acccount');
		
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		$this -> db -> join('standard_master','standard_master.standard_code = student_yearly_acccount.current_standard','left');
		$this -> db -> join('division_master','division_master.division_code = student_yearly_acccount.division_code','left');
   $this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		 $this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		 $this -> db -> where('standard_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
		 $this -> db -> where('division_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
			$this -> db -> where('student_yearly_acccount.current_standard',''.$standard_code.'');
		$this -> db -> where('student_yearly_acccount.status','Active');
		
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
		$this->db->where('noti_code', $eid);
  $this -> db -> where('notification.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
      	$this->db->delete('notification'); 
	}
	
	function get_student_gcm($arr)
	{
		$this -> db -> select('user_master.reg_id');
		
   		$this -> db -> from('student_yearly_acccount');
		
		$this -> db -> join('user_master','user_master.end_code = student_yearly_acccount.student_code and user_master.user_type_id="3"','left');
		
		if($arr['standard_code']!='' && isset($arr['standard_code'])){
			
			$this -> db -> where('student_yearly_acccount.current_standard',''.$arr['standard_code'].'');
			
		}
		
		if(isset($arr['list'])){
			
			$names = implode(',', $arr['list']);
$this->db->where_in('student_yearly_acccount.student_code', $names);
// Produces: WHERE username IN ('x', 'y', 'z')
				
		}
		  $this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
  $this -> db -> where('user_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$this -> db -> where('user_master.user_type_id','3');
		$this -> db -> where('user_master.reg_id !=','');
		$this -> db -> where('student_yearly_acccount.status','Active');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;		
	}
	
	
	
	
	function get_student_number($arr)
	{
		$this -> db -> select('student_master.phone,student_master.guardian_mobile_no');
		
   		$this -> db -> from('student_yearly_acccount');
		
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		
		$this -> db -> join('user_master','user_master.end_code = student_yearly_acccount.student_code and user_master.user_type_id = "3"','left');
		
		if($arr['standard_code']!='' && isset($arr['standard_code'])){
			
			$this -> db -> where('student_yearly_acccount.current_standard',''.$arr['standard_code'].'');
		}
		
		if(isset($arr['list'])){
			$names = implode(',', $arr['list']);
$this->db->where_in('student_yearly_acccount.student_code', $names);
// Produces: WHERE username IN ('x', 'y', 'z')
			
		}
	   $this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	        $this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	   $this -> db -> where('user_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	  	
		$this -> db -> where('user_master.reg_id = ""');
		
		$this -> db -> where('student_yearly_acccount.status','Active');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;		
	}
	
	function get_table_data($tbl, $where){
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

}
?>
