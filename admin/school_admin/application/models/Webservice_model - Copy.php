<?php
class Webservice_model extends CI_Model
{
	
/** LOGIN DATA **/

	function login($username, $password)
 	{
		
   		$this -> db -> select('*');
   		$this -> db -> from('user_master');
   		$this -> db -> where('username', ''.$username.'');
   		$this -> db -> where('password',''.$password.'');
		$this -> db -> limit(1);
   		$query = $this -> db -> get();
   		
		$the_content = $query->result_array();
		if(count($the_content)>0)
			{
			return $the_content;
			}
		else
			{
			return $the_content;
			}
    }
	
/** STUDENT RECORD BY STUDENT CODE **/

	
	function get_student_record($eid)
	{
		$this -> db -> select('student_yearly_acccount.student_yearly_code');
   		$this -> db -> select('student_master.*');
		$this -> db -> select('standard_master.standard_name,standard_master.standard_code');
		$this -> db -> select('division_master.name as division_name');
		$this -> db -> select('section_student_dt.grno');
		$this -> db -> select('city_master.city_name');
		$this -> db -> select('state_master.state_name');
		
   		$this -> db -> from('student_yearly_acccount');
		
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		$this -> db -> join('standard_master','standard_master.standard_code = student_yearly_acccount.current_standard','left');
		$this -> db -> join('division_master','division_master.division_code = student_yearly_acccount.division_code','left');
		$this -> db -> join('section_student_dt','section_student_dt.student_code = student_yearly_acccount.student_code and section_student_dt.status="Active"','left');
		
		$this -> db -> join('city_master','city_master.city_code 	= student_master.city_code','left');
		$this -> db -> join('state_master','state_master.state_code = student_master.state_code','left');
		
		$this -> db -> where('student_yearly_acccount.student_code',''.$eid.'');
		$this -> db -> where('student_yearly_acccount.status','Active');
		
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
/** Student Boarding Record  **/
	
	function get_boarding_record($eid)
	{	
		$this -> db -> select('*');
		$this -> db -> from('hostel_student_master');
		$this -> db -> where('student_yearly_code', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;

			
	}

/** STaFF RECORD BY STaFF CODE **/

	function get_staff_record($idcode)
	{
		$this -> db -> select('staff_master.*');
		$this -> db -> select('city_master.city_name');
		$this -> db -> select('state_master.state_name');
		
 		$this -> db -> from('staff_master');
		
		$this -> db -> join('city_master','city_master.city_code 	= staff_master.city_code','left');
		$this -> db -> join('state_master','state_master.state_code = staff_master.state_code','left');
		
   		$this -> db -> where('staff_master.staff_code', ''.$idcode.'');
   		$query = $this -> db -> get();
	  	$the_content = $query->result_array();
		return $the_content;
	}

/** INSERT A NEW RECORD **/

	function addItem($data,$table){
    	$this->db->insert($table , $data);
    	return $this->db->insert_id();
	}
	
	
/** UPDATE A RECORD BASED ON PARTICULAR ID **/
	
	function update($data,$table,$wherefield,$wherevalue){
		$this->db->where($wherefield, $wherevalue);
		$this->db->update($table, $data); 
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE; 
	}
	
	function channge_pass($data,$table, $arr){
		$this->db->where('password',$arr['oldpss']);
		$this->db->where('usercode',$arr['usercode']);
		$this->db->where('user_type_id !=','1');
		$this->db->update($table, $data); 
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE; 
	}
	
	//**Get Student Yearly Acccount**//
	function student_yearly_acccount($eid)
	{
		$this -> db -> select('student_yearly_acccount.*');
		$this -> db -> from('student_yearly_acccount');
		$this -> db -> where('student_yearly_acccount.student_code',''.$eid.'');
		$this -> db -> where('student_yearly_acccount.status','Active');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	//**Get User Reocrd By Usercode**//
	function get_user_by_usercode($usercode)
	{
		$this -> db -> select('*');
 		$this -> db -> from('user_master');
   		$this -> db -> where('usercode',''.$usercode.'');
   		$query = $this -> db -> get();
	  	$the_content = $query->result_array();
		return $the_content;
	}
	
	
	//**Get Notification For Pericular Standard**//
	function get_events($arr)
	{
		$this -> db -> select('web_event_master.*');
 		$this -> db -> from('web_event_master');
		$this -> db -> where('master_code',''.$arr['master_code'].'');
		$this -> db -> where('status','Active');
   		$query = $this -> db -> get();
	  	$the_content = $query->result_array();
		return $the_content;
	}
	
	//**Get Notification For Pericular User**//
	function get_notification_by_pericular($arr)
	{
		$this -> db -> select('notification.*');
 		$this -> db -> from('notification');
		$this -> db -> join('notification_dt','notification_dt.noti_code = notification.noti_code','left');
		$this -> db -> where('notification.send_type',''.$arr['send_type'].'');
		$this -> db -> where('notification_dt.EndCode',''.$arr['EndCode'].'');
		$this -> db -> where('notification.status','Active');
   		$query = $this -> db -> get();
	  	$the_content = $query->result_array();
		return $the_content;
	}
	
	function get_total_paid($eid){
		$this -> db -> select('sum(amount) as tot');
		$this -> db -> from('income_account_dt');
		$this -> db -> where('EndCode',''.$eid.'');
		$this -> db -> where('income_type_code','1');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
		return (float)$the_content[0]['tot'];
	}
	
	function get_total_fee($eid){
		$this -> db -> select('totalamount');
		$this -> db -> from('standard_master');
		$this -> db -> where('standard_code',''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return (float)$the_content[0]['totalamount'];
	}
	function get_first_term_fee($eid){
		$this -> db -> select('term_fee_total');
		$this -> db -> from('standard_master');
		$this -> db -> where('standard_code',''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return (float)$the_content[0]['term_fee_total'];
	}
	
	function get_paid_all_record($eid){
		$this -> db -> select('*');
		$this -> db -> from('income_account_dt');
		$this -> db -> where('EndCode',''.$eid.'');
		$this -> db -> where('income_type_code','1');
		$this -> db -> order_by("income_ac_dtcode", "DESC");
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}	
	
	function feedback_user_detail($eid)
	{ 
	    $this -> db -> select('*');
		$this -> db -> from('user_master');
		$this -> db -> where('usercode',''.$eid.'');
		$this -> db -> where('status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	//////// All Event ///////

	 function all_section_type()
	 {
		$this -> db -> select('*');
		$this -> db -> from('cms_academic_section_type');
		$this -> db -> where('status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	 }
	
	function get_all_event($eid)
	{
	    $this -> db -> select('event_master.*');
		$this -> db -> select('cms_academic_section_type.name');
		
		$this -> db -> from('event_master');
		$this -> db -> join('cms_academic_section_type','cms_academic_section_type.section_type_code = event_master.event_type','left');
		
		if($eid!=''){
			$this->db->where('event_master.event_type',''.$eid.'');
		}
		
		$this -> db -> where('event_master.status','Active');
		$this -> db -> where('event_master.rec_type','Gallery');
		$this -> db -> order_by('event_master.event_dt','DESC');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	/** PHOTOS GALLARY  **/
	function get_photogallary($event_code)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('event_detail');
		$this -> db -> where('event_code', ''.$event_code.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}

	
	//// GET STUDENT attendance ////////
	function get_student_attendance($arr)
	{ 
		$this -> db -> select('student_attendance_dtl.*');
		$this -> db -> select('student_attendance_mst.attendance_date');
		$this -> db -> from('student_attendance_dtl');
		$this -> db -> join('student_attendance_mst','student_attendance_dtl.attendance_code = student_attendance_mst.attendance_code','left');
		$this -> db -> where('student_attendance_dtl.student_yearly_code',''.$arr['student_yearly_code'].'');
		$this -> db -> where('student_attendance_mst.attendance_month',''.$arr['attendance_month'].'');
		
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
//// GET STUDENT TIME TABLE ////////
	function get_time_table($arr)
	{
		$this -> db -> select('timetable_master.*');
		$this -> db -> select('subject_master.subject_name');
		$this -> db -> select('CONCAT(staff_master.first_name," ",staff_master.middle_name," ",staff_master.last_name) as staff_name',FALSE);
		$this -> db -> from('timetable_master');
		
		$this -> db -> join('subject_master','subject_master.subject_code = timetable_master.subject_code','left');
		$this -> db -> join('staff_master','staff_master.staff_code = timetable_master.staff_code','left');
		
		$this -> db -> where('timetable_master.standard_code',''.$arr['standard_code'].'');
		$this -> db -> where('timetable_master.division_code',''.$arr['division_code'].'');
		$this -> db -> where('timetable_master.day',''.$arr['day'].'');
		
		$this -> db -> order_by('timetable_master.lecture','ASC');
		
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}

//// GET EXAM SCHEDULE BY STANDARD ////////
	function get_exam_by_standard($standard)
	{
		$this -> db -> select('exam_master.*');
		$this -> db -> select('standard_master.standard_name');
		$this -> db -> select('exam_type.exam_title');
		$this -> db -> select('exam_details.*');
		$this -> db -> select('subject_master.subject_name');
		
   		$this -> db -> from('exam_master');
		
		$this -> db -> join('standard_master','standard_master.standard_code = exam_master.standard_code','left');
		$this -> db -> join('exam_type','exam_type.exam_type_code = exam_master.exam_type_code','left');
		$this -> db -> join('exam_details','exam_details.exam_code = exam_master.exam_code','left');
		$this -> db -> join('subject_master','subject_master.subject_code = exam_details.subject_code','left');
		
		$this -> db -> where('exam_master.standard_code', ''.$standard.'');
		$this -> db -> where('exam_master.status','Active'); 
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	//// GET EXAM SCHEDULE BY STANDARD ////////
	function holiday_list()
	{
		$this -> db -> select('*');
   		$this -> db -> from('holiday_master');
		$this -> db -> where('status', 'Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	//// GET FOOD LIST ///// 
	function food_list($start_date,$end_date)
	 {
		$this -> db -> select('*');
   		$this -> db -> from('food_master');
		$this -> db -> where('date >=', $start_date);
		$this -> db -> where('date <=', $end_date);
		$this -> db -> order_by("date", "asc");
		$this -> db -> where('status', 'Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	 }
	 
	 //// GET HOSTEL FOOD LIST ///// 
	function hostel_food_list($start_date,$end_date)
	 {
		$this -> db -> select('dinner_name');
   		$this -> db -> from('hostel_food_master');
		$this -> db -> where('date >=', $start_date);
		$this -> db -> where('date <=', $end_date);
		$this -> db -> order_by("date", "asc");
		$this -> db -> where('status', 'Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	 }
	 
	 //// GET Complain///// 
	function get_complain($eid)
	 {
		$this -> db -> select('complaint_master.*');
		$this -> db -> select('staff_master.first_name,staff_master.last_name');
   		$this -> db -> from('complaint_master');
		
		$this -> db -> join('staff_master','staff_master.staff_code = complaint_master.complaint_from','left');
		$this -> db -> where('complaint_master.complaint_to', $eid);
		$this -> db -> where('complaint_master.status', 'Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	 }
	 
	  //// GET Complain By code///// 
	function get_complain_by_code($eid)
	 {
		$this -> db -> select('*');
   		$this -> db -> from('complaint_detail');
		$this -> db -> where('complaint_code', $eid);
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	 }
	 
	 //// GET Exeat Boarders///// 
	 function get_exeat_boarder()
	 {
		$this -> db -> select('date,description');
   		$this -> db -> from('hostel_exeat_boarder');
		$this -> db -> where('status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	 }
	 
	//// STUDENT RESULT ///
	function get_result_by_yearcode($eid)
	{
		$this -> db -> select('result_master.*');
		$this -> db -> select('subject_master.subject_name');
		
   		$this -> db -> from('result_master');
		
		$this -> db -> join('subject_master','subject_master.subject_code = result_master.subject_code','left');
		$this -> db -> where('result_master.student_yearly_code',$eid);
		$this -> db -> where('result_master.status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	
	}
	
	
}
 
?>
