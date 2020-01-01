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
		$this -> db -> select('city.name');
		$this -> db -> select('state.name');
		
   		$this -> db -> from('student_yearly_acccount');
		
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		$this -> db -> join('standard_master','standard_master.standard_code = student_yearly_acccount.current_standard','left');
		$this -> db -> join('division_master','division_master.division_code = student_yearly_acccount.division_code','left');
		
		$this -> db -> join('city','city.cityid 	= student_master.city_code','left');
		$this -> db -> join('state','state.stateid = student_master.state_code','left');
		
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
	
	
	//**Get Events For Pericular School**//
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
		
	/** EVENT PHOTOS   **/
	function get_event_photo($event_code)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('web_event_detail');
		$this -> db -> where('event_code', ''.$event_code.'');
	
$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	//**Get News For Pericular School**//
	function get_news($arr)
	{
		$this -> db -> select('web_news_master.*');
 		$this -> db -> from('web_news_master');
		$this -> db -> where('master_code',''.$arr['master_code'].'');
		$this -> db -> where('status','Active');
   		$query = $this -> db -> get();
	  	$the_content = $query->result_array();
		return $the_content;
	}
	
	//**Get home & contact page For Pericular School**//
	function get_home($arr)
	{
		$this -> db -> select('settings.*');
 		$this -> db -> from('settings');
		$this -> db -> where('master_code',''.$arr['master_code'].'');
		$query = $this -> db -> get();
	  	$the_content = $query->result_array();
		return $the_content;
	}
	
//**Get photo gallery For Pericular School**//
	function get_photogallery($arr)
	{
		$this -> db -> select('web_photo_gallery_master.*');
 		$this -> db -> from('web_photo_gallery_master');
		$this -> db -> where('master_code',''.$arr['master_code'].'');
		$this -> db -> where('status','Active');
   		$query = $this -> db -> get();
	  	$the_content = $query->result_array();
		return $the_content;
	}
		
	/** Gallery PHOTOS   **/
	function get_gallery_photo($gallery_code)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('web_photo_gallery_detail');
		$this -> db -> where('gallery_code', ''.$gallery_code.'');
		
$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
		
//**Get Video gallery For Pericular School**//
	function get_videogallery($arr)
	{
		$this -> db -> select('web_video_list.*');
 		$this -> db -> from('web_video_list');
		$this -> db -> where('master_code',''.$arr['master_code'].'');
		$this -> db -> where('status','Active');
   		$query = $this -> db -> get();
	  	$the_content = $query->result_array();
		return $the_content;
	}
		
	/** Gallery Videos   **/
	function get_gallery_video($video_id)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('web_video_master');
		$this -> db -> where('video_id', ''.$video_id.'');
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
	

	//**Get Notification For All And All (Staff and Student)**//
	function get_notification_by_send_type($arr,$master_code)
	{
		$this -> db -> select('notification.*');
 		$this -> db -> from('notification');
		$this -> db -> where('send_type',''.$arr[0].'');
		$this -> db -> where('master_code',''.$master_code.'');
		$this -> db -> where('notification.status','Active');
   		$query = $this -> db -> get();
	  	$the_content = $query->result_array();
		return $the_content;
	}
	
	//**Get Notification For Pericular Standard**//
	function get_notification_by_class($arr,$master_code)
	{
		$this -> db -> select('notification.*');
 		$this -> db -> from('notification');
		$this -> db -> where('send_type',''.$arr['send_type'].'');
		$this -> db -> where('standard_code',''.$arr['standard_code'].'');
		$this -> db -> where('master_code',''.$master_code.'');
		$this -> db -> where('notification.status','Active');
   		$query = $this -> db -> get();
	  	$the_content = $query->result_array();
		return $the_content;
	}
	
	//**Get Notification For Pericular User**//
	function get_notification_by_pericular($arr,$master_code )
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
	
	
	
	
//// GET STUDENT TIME TABLE ////////
	function get_time_table($arr)
	{
		$this -> db -> select('timetable_master.*');
		$this -> db -> select('subject_master.subject_name');
		$this -> db -> from('timetable_master');
		
		$this -> db -> join('subject_master','subject_master.subject_code = timetable_master.subject_code','left');
		
		$this -> db -> where('timetable_master.standard_code',''.$arr['standard_code'].'');
		$this -> db -> where('timetable_master.division_code',''.$arr['division_code'].'');
		$this -> db -> where('timetable_master.day',''.$arr['day'].'');
		$this -> db -> where('timetable_master.master_code',''.$arr['master_code'].'');
		
		$this -> db -> order_by('timetable_master.lecture','ASC');
		
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}

//// GET EXAM SCHEDULE BY STANDARD ////////
	function get_exam_by_standard($standard,$master_code)
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
		$this -> db -> where('exam_master.master_code',''.$master_code.'');
		$this -> db -> where('exam_type.master_code',''.$master_code.'');
		$this -> db -> where('exam_details.master_code',''.$master_code.'');
		$this -> db -> where('standard_master.master_code',''.$master_code.'');
		$this -> db -> where('subject_master.master_code',''.$master_code.'');
			
		$this -> db -> where('exam_master.standard_code', ''.$standard.'');
		$this -> db -> where('exam_master.status','Active'); 
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	//// GET EXAM SCHEDULE BY STANDARD ////////
	function holiday_list($master_code)
	{
		$this -> db -> select('*');
   		$this -> db -> from('holiday_master');
		$this -> db -> where('status', 'Active');
		$this -> db -> where('master_code',''.$master_code.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	//// GET FOOD LIST ///// 
	function food_list($start_date,$end_date,$master_code)
	 {
		$this -> db -> select('*');
   		$this -> db -> from('food_master');
		$this -> db -> where('date >=', $start_date);
		$this -> db -> where('date <=', $end_date);
		$this -> db -> order_by("date", "asc");
		$this -> db -> where('status', 'Active');
		$this -> db -> where('master_code', $master_code);
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	 }
	 
	//// GET FOOD NAME BY ID ////////
	function food_name($id)
	{
		$this -> db -> select('*');
   		$this -> db -> from('food_menu');
		$this -> db -> where('id',''.$id.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	//// STUDENT RESULT ///
	function get_result_by_yearcode($eid)
	{
		$this -> db -> select('result_master.*');
		$this -> db -> select('subject_master.subject_name');
		$this -> db -> select('exam_type.exam_title');
		
   		$this -> db -> from('result_master');
		
		$this -> db -> join('subject_master','subject_master.subject_code = result_master.subject_code','left');
		$this -> db -> join('exam_type','exam_type.exam_type_code = result_master.exam_type_code','left');
		$this -> db -> where('result_master.student_yearly_code',$eid);
		$this -> db -> where('result_master.status','Active');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	
	}
	
	function get_tot_by_yearcode($eid)
	{
		$this -> db -> select('sum(result_master.marks) as tot');
		$this -> db -> from('result_master');
		$this -> db -> join('subject_master','subject_master.subject_code = result_master.subject_code','left');
		$this -> db -> join('exam_type','exam_type.exam_type_code = result_master.exam_type_code','left');
		$this -> db -> where('result_master.student_yearly_code',$eid);
		$this -> db -> where('result_master.status','Active');
		$this->db->group_by("result_master.student_yearly_code"); 
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	
	}
}
 
?>
