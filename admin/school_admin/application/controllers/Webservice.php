<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webservice extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model("webservice_model",'ObjM');
		$this->load->helper("url");
		$this->load->library('session');
		
	}
	
	/***Login***/
//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/login?username=manali&password=12345

//http://172.16.16.23/school_new/school_admin/index.php/webservice/login?username=manali&password=12345

	function login()
	{
		 $username = $_REQUEST['username'];
		  $password = $_REQUEST['password'];
		
		$result = $this->ObjM->login($username,$password);
		
		if(isset($result[0]))
		{
		
		  if($result[0]['user_type_id'] == '3')
		   {
		 $dt_record 			= $this->ObjM->get_student_record($result[0]['end_code']);

			$json_arr['usercode']		 	= 	$result[0]['usercode'];
			$json_arr['user_type_id']		= 	$result[0]['user_type_id'];
			$json_arr['master_code']		=	$result[0]['master_code'];

			$json_arr['username']			=	$result[0]['username'];
			$json_arr['password']			= 	$result[0]['password'];
			
				
			$json_arr['name']				=	$result[0]['name'];
			$json_arr['emailid']			=	$result[0]['emailid'];
			$json_arr['phone_no']			=	$result[0]['phone_no'];
			$json_arr['country']			=	$result[0]['country'];
			$json_arr['state']				=	$result[0]['state'];
			$json_arr['city']				=	$result[0]['city'];
			
			 $json_arr['first_name']	 	= 	$dt_record[0]['first_name'];
			 $json_arr['middle_name'] 		= 	$dt_record[0]['middle_name'];
			 $json_arr['sur_name'] 		 	= 	$dt_record[0]['sur_name'];
			 $json_arr['admission_dt'] 		 	= 	$dt_record[0]['admission_dt'];
			 $json_arr['bloodgrop'] 		 	= 	$dt_record[0]['bloodgrop'];
			 $json_arr['student_address'] 		 	= 	$dt_record[0]['student_address'];
			 $json_arr['birthdt']				= 	$dt_record[0]['birthdt'];
			 $json_arr['gender'] 		 		= 	$dt_record[0]['gender'];
		
			 $json_arr['student_yearly_code'] = $dt_record[0]['student_yearly_code'];
			 $json_arr['standard_code'] 	= 	$dt_record[0]['standard_code'];
			 $json_arr['standard_name'] 	= 	$dt_record[0]['standard_name'];
			 $json_arr['division_name'] 	= 	$dt_record[0]['division_name'];
					 	
			 $json_arr['guardian_first_name']	 	= 	$dt_record[0]['guardian_first_name'];
			 $json_arr['guardian_middle_name'] 		= 	$dt_record[0]['guardian_middle_name'];
			 $json_arr['guardian_sur_name'] 		 	= 	$dt_record[0]['guardian_sur_name'];
			 $json_arr['guardian_mobile_no'] 		 	= 	$dt_record[0]['guardian_mobile_no'];
			 $json_arr['guardian_phone_no'] 		 	= 	$dt_record[0]['guardian_phone_no'];
 			 $json_arr['guardian_email'] 		 	= 	$dt_record[0]['guardian_email'];
			 $json_arr['guardian_phone_no'] 		 	= 	$dt_record[0]['guardian_phone_no'];
			 $json_arr['g_country_code'] 		 	= 	$dt_record[0]['g_country_code'];
			 $json_arr['g_state_code'] 		 	= 	$dt_record[0]['g_state_code'];
			 $json_arr['g_city_code'] 		 	= 	$dt_record[0]['g_city_code'];
			 $json_arr['guardian_address'] 		 	= 	$dt_record[0]['guardian_address'];

			
			 if($result[0]['user_img']!=''){
					$user_img	=	$result[0]['user_img'];
			 }
			 else{
				$user_img	=	'student.png';
			 }
			 
			 $json_arr['image']  		= 	main_url().'upload/img/'.$user_img;
			
			 $json_arr['validation']	 =	'true';
			 echo json_encode($json_arr); exit;
			 
			}
		 
	     }
	    else
		   {
			$json_arr['validation'] = "false";
			echo json_encode($json_arr); exit;
		   }
	 }
	
	
	//****This Fun is Use For get Events*****//
	//http://172.16.16.23/school_new/school_admin/index.php/webservice/get_events?usercode=4
	//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/get_events?usercode=4
	function get_events()
	{
		 $usercode=$_REQUEST['usercode'];
		
		$userdt=$this->ObjM->get_user_by_usercode($usercode);
		
		$result = $this->get_school_event($userdt);
		
		if(count($result)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		
		for($i=0;$i<count($result);$i++){
			$sr_no=$i+1;
			$json_arr[]=array(
				'sr_no' 	=>  $sr_no,
				'event_dt'  	=>  $result[$i]['event_dt'],
				'event_code' =>  $result[$i]['event_code'],
				'event_title' 	=>   urldecode($result[$i]['event_title']),
				'cover_img' 	=>  main_url().'upload/img/'.$result[$i]['cover_img'],
				'validation'=>'true'
			);
		}
		
		echo json_encode($json_arr);
	}
	
	
	//****Get School Events*****//
	protected function get_school_event($userdt){
		
	
		$arr			=	array('master_code'=> $userdt[0]['master_code']);
		$record_arr=	$this->ObjM->get_events($arr);

		return $record_arr;
		
	}
	
		//****This Fun is Use For get Events  photos by event code*****//
	//http://172.16.16.23/school_new/school_admin/index.php/webservice/get_event_photo?event_code=1	
	//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/get_event_photo?event_code=1
	function get_event_photo()
	
  
     {
	    $event_code = $_REQUEST['event_code'];
	
		$photos = $this->ObjM->get_event_photo($event_code);
		
		for($i=0;$i<count($photos);$i++){
			$photos[$i]['image']	= main_url().'upload/img/'.$photos[$i]['image'];
			$photos[$i]['validation']	= 'true';
		  }
		if(count($photos)>0)
		{
			$return=$photos;
			echo json_encode($return);	 	
		} 
		else
		{
			 $result[0]['validation'] = "false";
			 echo json_encode($result);
		}
     }

		//****This Fun is Use For get News*****//
	//http://172.16.16.23/school_new/school_admin/index.php/webservice/get_news?usercode=4	
	//http://localhost/school/school_admin/index.php/webservice/get_news?usercode=4	
	function get_news()
	{
		$usercode=$_REQUEST['usercode'];
		
		$userdt=$this->ObjM->get_user_by_usercode($usercode);
		
			
			$result = $this->get_school_news($userdt);
			
			
		if(count($result)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		
		for($i=0;$i<count($result);$i++){
			$sr_no=$i+1;
			$json_arr[]=array(
				'sr_no' 	=>  $sr_no,
				'news_dt'  	=>  $result[$i]['news_dt'],
				'news_code' =>  $result[$i]['news_code'],
				'news_title' 	=> urldecode($result[$i]['news_title']),
				'news_desc' 	=>  urldecode($result[$i]['news_desc']),
				'cover_img' 	=> main_url().'upload/img/'.$result[$i]['cover_img'],
				'validation'=>'true'
			);
		}
		
		echo json_encode($json_arr);
	}
	
	
	//****Get School news*****//
	protected function get_school_news($userdt){
		
	
		$arr			=	array('master_code'=> $userdt[0]['master_code']);
		$record_arr=	$this->ObjM->get_news($arr);

		return $record_arr;
		
	}
	
	
	//****This Fun is Use For get Photo Gallery*****//
	//http://172.16.16.23/school_new/school_admin/index.php/webservice/get_photogallery?usercode=4
	//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/get_photogallery?usercode=4
	function get_photogallery()
	{
		$usercode=$_REQUEST['usercode'];
		
		$userdt=$this->ObjM->get_user_by_usercode($usercode);
		
			$result = $this->get_school_photogallery($userdt);
		
		if(count($result)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		
		for($i=0;$i<count($result);$i++){
			$sr_no=$i+1;
			$json_arr[]=array(
				'sr_no' 				=>  $sr_no,
				'gallery_dt'  			=>  $result[$i]['gallery_dt'],
				'gallery_code' 			=>  $result[$i]['gallery_code'],
				'gallery_name' 			=> urldecode($result[$i]['gallery_name']),
				'gallery_desc' 			=>  urldecode($result[$i]['gallery_desc']),
				'gallery_cover_img' 	=>  main_url().'upload/img/'.$result[$i]['gallery_cover_img'],
				'year' 					=>  $result[$i]['year'],
				'month' 				=>  $result[$i]['month'],
				'validation'			=>	'true'
			);
		}
		
		echo json_encode($json_arr);
	}
	
	
	//****Get School photo gallery*****//
	protected function get_school_photogallery($userdt){
		
	
		$arr			=	array('master_code'=> $userdt[0]['master_code']);
		$record_arr		=	$this->ObjM->get_photogallery($arr);

		return $record_arr;
		
	}
	
		//****This Fun is Use For get photo gallery by gallery code*****//
	//http://172.16.16.23/school_new/school_admin/index.php/webservice/get_gallery_photo?gallery_code=1
	//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/get_gallery_photo?gallery_code=1
	function get_gallery_photo()
	{
	    $gallery_code = $_REQUEST['gallery_code'];
		$photos = $this->ObjM->get_gallery_photo($gallery_code);
		
		for($i=0;$i<count($photos);$i++){
			$photos[$i]['photopath']	= main_url().'upload/img/'.$photos[$i]['photopath'];
			$photos[$i]['validation']	= 'true';
		  }
		if(count($photos)>0)
		{
			$return=$photos;
			echo json_encode($return);	 	
		} 
		else
		{
			 $result[0]['validation'] = "false";
			 echo json_encode($result);
		}
     }


	//****This Fun is Use For get Video Gallery*****//
	//http://172.16.16.23/school_new/school_admin/index.php/webservice/get_videogallery?usercode=4	
	//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/get_videogallery?usercode=4	
	function get_videogallery()
	{
		$usercode=$_REQUEST['usercode'];
		
		$userdt=$this->ObjM->get_user_by_usercode($usercode);
		
		
			$result = $this->get_school_videogallery($userdt);
		
		if(count($result)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		
		for($i=0;$i<count($result);$i++){
			$sr_no=$i+1;
			$json_arr[]=array(
				'sr_no' 		=>  $sr_no,
				'video_id'		=>  $result[$i]['video_id'],
				'video_title' 	=>  urldecode($result[$i]['video_title']),
				'cover_img' 	=>	main_url().'upload/img/'.$result[$i]['cover_img'],
				'validation'	=>	'true'
			);
		}
		
		echo json_encode($json_arr);
	}
	
	
	//****Get School Video gallery*****//
	protected function get_school_videogallery($userdt){
		
	
		$arr			=	array('master_code'=> $userdt[0]['master_code']);
		$record_arr		=	$this->ObjM->get_videogallery($arr);

		return $record_arr;
		
	}
	
		//****This Fun is Use For get Video gallery by Video Id*****//
	//http://172.16.16.23/school_new/school_admin/index.php/webservice/get_gallery_video?video_id=1
	//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/get_gallery_video?video_id=1
	function get_gallery_video()
	{
	    $video_id = $_REQUEST['video_id'];
		$photos = $this->ObjM->get_gallery_video($video_id);
		
		if(count($photos)<1){
		$json_arr[]=array('validation'=>'false');	
		echo json_encode($json_arr);
		exit;	 
		}
		
		
		for($i=0;$i<count($photos);$i++){
			$sr_no=$i+1;
			$json_arr[]=array(
				'sr_no' 		=>  $sr_no,
				'video_code' 	=>  $photos[$i]['video_code'],
				'video_id'		=>  $video_id,
				'video_name' 	=>  urldecode($photos[$i]['video_name']),
				'video_desc' 	=>  urldecode($photos[$i]['video_desc']),
				'video_url' 	=>  $photos[$i]['video_url'],
				'cover_img' 	=>  main_url().'upload/img/'.$photos[$i]['cover_img'],
				'video_dt' 		=>	$photos[$i]['video_dt'],
				'year' 			=>  $photos[$i]['year'],
				'month' 		=>  $photos[$i]['month'],
				'validation'	=>	'true',
			);
		  }
		echo json_encode($json_arr);
     }




	//****This Fun is Use For get Home Page & contact page*****//
	//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/home?usercode=4
    //http://172.16.16.23/school_new/school_admin/index.php/webservice/home?usercode=4
	function home()
	{
		$usercode=$_REQUEST['usercode'];
		
		$userdt=$this->ObjM->get_user_by_usercode($usercode);
	
		$arr			=	array('master_code'=> $userdt[0]['master_code']);
		$record_arr=	$this->ObjM->get_home($arr);

		$result = $record_arr;
			
			
		if(count($result)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		
		for($i=0;$i<count($result);$i++){
			$sr_no=$i+1;
			$json_arr[]=array(
			
				'school_img'  	=> main_url().'upload/img/'.$result[$i]['school_img'],
				'school_logo' =>  main_url().'upload/img/'.$result[$i]['school_logo'],
				'name' 	=>  urldecode($result[$i]['name']) ,
				'address' 	=>  urldecode($result[$i]['address']),
				'email' 	=> $result[$i]['email'],
				'phone' 	=> $result[$i]['phone'],
				'mobile' 	=> $result[$i]['mobile'],
				'validation'=>'true'
			);
		}
		
		echo json_encode($json_arr);
	}
	
	
		 function registration_id(){
//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/registration_id?reg_id=11111111&usercode=4

//http://172.16.16.23/school_new/school_admin/index.php/webservice/registration_id?reg_id=11111111&usercode=5	
		 
		 if($_REQUEST['reg_id']!='' && $_REQUEST['usercode']!=''){
			 
			$data['reg_id']	= $_REQUEST['reg_id'];	
			
			$chk=$this->ObjM->update($data,'user_master','usercode',$_REQUEST['usercode']);
			
			if($chk){
				$json_arr['validation']		 =	'true';
			}
			else{
				$json_arr['validation']		 =	'false';
				$json_arr['msg']		 	=	'Invalid Request';	
			}
		
		 }
		 else{
			 
			 $json_arr['validation']		 =	'false';
			 
		 }
		echo json_encode($json_arr);	
	}
	
	
	
	//****This Fun User For get Notification*****//
	
//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/get_notification?usercode=3	
//http://172.16.16.23/school_new/school_admin/index.php/webservice/get_notification?usercode=3
	function get_notification()
	{
		$usercode=$_REQUEST['usercode'];
		
		$userdt=$this->ObjM->get_user_by_usercode($usercode);
		if($userdt[0]['user_type_id']=='3'){
			$result = $this->get_student_notification($userdt);
		}
		
		
		if(count($result)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		
		for($i=0;$i<count($result);$i++){
			$sr_no=$i+1;
			$json_arr[]=array(
				'sr_no' 	=>  $sr_no,
				'date'  	=>  urldecode($result[$i]['noti_date']),
				'noti_code' =>  $result[$i]['noti_code'],
				'title' 	=>  urldecode($result[$i]['noti_title']),
				'desc'  	=>  urldecode($result[$i]['noti_desc']), 
				'validation'=>'true'
			);
		}
		
		echo json_encode($json_arr);
	}
	
	//****Get Student Notification*****//
	protected function get_student_notification($userdt){
		
		$dt_record 		= $this->ObjM->student_yearly_acccount($userdt[0]['end_code']);
		
		$arr=array('All_Student');
		$record_all		=	$this->ObjM->get_notification_by_send_type($arr,$userdt[0]['master_code']);
		
		
		$arr			=	array('send_type'=>'Selected_Standard','standard_code'=> $dt_record[0]['current_standard']);
		$record_class	=	$this->ObjM->get_notification_by_class($arr,$userdt[0]['master_code']);
		
		$noti_arr = array_merge($record_all, $record_class);
		
		
		$arr			=	array('send_type'=>'Selected_Student','EndCode'=> $userdt[0]['end_code']);
		$record_pericular=	$this->ObjM->get_notification_by_pericular($arr);
		$noti_arr = array_merge($noti_arr, $record_pericular);
		
		return $noti_arr;
		
	}
	
//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/change_pass?usercode=3&oldpass=123&newpass=1234
//http://172.16.16.23/school_new/school_admin/index.php/webservice/change_pass?usercode=3&oldpass=12345&newpass=123456	
	function change_pass(){
		 
		 if($_REQUEST['usercode']!='' && $_REQUEST['oldpass']!='' && $_REQUEST['newpass']!=''){
			 
			$data['password']	= $_REQUEST['newpass'];	
			
			$arr=array('oldpss'=>$_REQUEST['oldpass'],'usercode'=>$_REQUEST['usercode']);
			
			$chk=$this->ObjM->channge_pass($data,'user_master',$arr);
			
			if($chk){
				$json_arr['validation']		 =	'true';
			}
			else{
				$json_arr['validation']		 =	'false';
				$json_arr['msg']		 	=	'Invaied Request';	
			}
		
		 }
		 else{
			 $json_arr['validation']		 =	'false';
		 }
		echo json_encode($json_arr);		
	}
	

	
//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/send_feedback?usercode=3&feedback=no feedback	
//http://172.16.16.23/school_new/school_admin/index.php/webservice/send_feedback?usercode=3&feedback=no feedback	
	function send_feedback()
	{
	 if($_REQUEST['usercode']!='')
			{
				$data['usercode'] = $_REQUEST['usercode'];
			
			$user_detail = $this->ObjM->feedback_user_detail($data['usercode']);
			$data['feedback']		=urldecode($_REQUEST['feedback']);
			$data['user_type_id']	=$user_detail[0]['user_type_id'];
			$data['master_code']	=$user_detail[0]['master_code'];
			
			$id=$this->ObjM->addItem($data,'feedback');
			
			$res=array();
			
		if($id){
				$res['id']=$id;
				$res['validation']='true';
			}
			else{
				$res['validation']		 =	'false';
				$res['msg']		 	=	'Invalid Request';	
			}
		
			}
		 else{
			 $res['validation']		 =	'false';
		 }
			echo json_encode($res);
	} 
	
  //// GET STUDENT TIME TABLE ////////
  
//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/get_time_table?usercode=4&day_code=1	
//http://172.16.16.23/school_new/school_admin/index.php/webservice/get_time_table?usercode=4&day_code=1	

	function get_time_table()
	{
		$usercode    	 	=   $_REQUEST['usercode'];
		$daycode      		=   $_REQUEST['day_code'];
		$user_dt 	 		=   $this ->ObjM->get_user_by_usercode($usercode);
		$yearly_acccount 	=   $this ->ObjM->student_yearly_acccount($user_dt[0]['end_code']);
		
		$arr=array('standard_code' =>$yearly_acccount[0]['current_standard'],'division_code' =>$yearly_acccount[0]['division_code'],'day' =>$daycode,'master_code' =>$user_dt[0]['master_code']);
		$time_table			=	$this->ObjM->get_time_table($arr);
		
		if(count($time_table)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		for($i=0;$i<count($time_table);$i++){
			if($time_table[$i]['recess'] == 'Y')
			  { 
				$time = $time_table[$i]['s_time'] .'-'. $time_table[$i]['e_time'];
				$recess = $time_table[$i]['recess_to'] .'-'. $time_table[$i]['recess_from'];
			  }
			else
			  {
				$time = $time_table[$i]['s_time'] .'-'. $time_table[$i]['e_time'];
				$recess = '-';
			  }
			  
			  	if($time_table[$i]['subject_name'] == '-1')
			  { 
				$subject_name = 'Free';
			  }
			else if($time_table[$i]['subject_name'] == '')
			  { 
				$subject_name = '-';
			  }
			else
			  {
				$subject_name = $time_table[$i]['subject_name'];
			  }
			  
			 	$lec=$time_table[$i]['lecture'];
			  	
				$json_arr[]=array(
					'lecture'		=>	$lec,
					'time'			=>	$time,
					'recess'		=>	$recess,
					'subject_name'	=>	$subject_name,
					
					'validation'	=>	'true' );
		  }
		  echo json_encode($json_arr);
			exit;
	}
	
	//// GET EXAM SCHEDULE ////////
	
//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/exam_schedule?standardcode=4&usercode=3
//http://172.16.16.23/school_new/school_admin/index.php/webservice/exam_schedule?standardcode=4&usercode=3

	 function exam_schedule()
	 {
		$standardcode           =   $_REQUEST['standardcode'];
		$usercode    	 	=   $_REQUEST['usercode'];
		$user_dt 	 		=   $this ->ObjM->get_user_by_usercode($usercode);
		
		$exam_data 	 			=   $this ->ObjM->get_exam_by_standard($standardcode,$user_dt[0]['master_code']);
		//var_dump($exam_data); exit;
		
		if(count($exam_data)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		for($i=0;$i<count($exam_data);$i++){
			$exam_date = $exam_data[$i]['date_dt'];
			$exam_time = $exam_data[$i]['start_time'].'  To  '.$exam_data[$i]['end_time'];
			
			$json_arr[]=array(
					'standard_name'		=>	$exam_data[$i]['standard_name'],
					'exam_title'		=>	urldecode($exam_data[$i]['exam_title']),
					'subject_name'		=>	$exam_data[$i]['subject_name'],
					'exam_date'			=>	$exam_date,
					'exam_time'			=>	$exam_time,
					'min_marks'				=>	$exam_data[$i]['min_marks'],
					'max_marks'				=>	$exam_data[$i]['max_marks'],
					'validation'	 		=>	'true' );
		  }
		  echo json_encode($json_arr);
			exit;
	 }
 //// GET HOLIDAY LIST ////////	
 
 //http://172.16.16.23/school_new/school_admin/index.php/webservice/get_holiday?usercode=3
//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/get_holiday?usercode=3		 
 
	function get_holiday()
	 {
		 $usercode    	 	=   $_REQUEST['usercode'];
		$user_dt 	 		=   $this ->ObjM->get_user_by_usercode($usercode);
		
		$holiday_list 	=   $this ->ObjM->holiday_list($user_dt[0]['master_code']);
		//var_dump($holiday_list); exit;
		
		if(count($holiday_list)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		for($i=0;$i<count($holiday_list);$i++){
			if($holiday_list[$i]['type'] == 'multi')
			{
			  $holiday_date = $holiday_list[$i]['start_date'].'  To   '.$holiday_list[$i]['end_date'];
			}
			else
			{
				$holiday_date = $holiday_list[$i]['start_date'];	
			}
			$day  = date("D", $holiday_list[$i]['start_date']);
			
			$json_arr[]=array(
					'title'				=>	$holiday_list[$i]['title'],
					'holiday_date'		=>	$holiday_date,
					'holiday_day'		=>	$day,
					'description'		=>	urldecode($holiday_list[$i]['description']),
					'validation'	 	=>	'true' );
		  }
		  echo json_encode($json_arr);
			exit;
	 }
		
			/////// GET FOOD MENU //////////////
			
//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/get_food_menu?usercode=4
//http://172.16.16.23/school_new/school_admin/index.php/webservice/get_food_menu?usercode=14

	function get_food_menu()
	 {
		 $usercode    	 	=   $_REQUEST['usercode'];
		$user_dt 	 		=   $this ->ObjM->get_user_by_usercode($usercode);
		 
		$today_date = date("d-m-Y");
		$today_day = date('l', strtotime($today_date));
		$week_days = array('Monday', 'Tuesday', 'Wednesday','Thursday','Friday','Saturday','Sunday');
		$temp_array = array_search($today_day,$week_days);
		
		$start_date = date("d-m-Y", strtotime($today_date). '-'.$temp_array.'day');
		$end_date = date("d-m-Y",strtotime($start_date) . " +5 day");
		
		$food_list 	=   $this ->ObjM->food_list($start_date,$end_date,$user_dt[0]['master_code']);
		//echo $this->db->last_query(); exit;
		
		if(count($food_list)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		for($i=0;$i<count($food_list);$i++){
		   $food_date = $food_list[$i]['date'];	
			//$fid= explode(',',$food_list[$i]['food_name']);
		 $fid=explode(',',$food_list[$i]['food_name']);
			foreach($fid as $f){
				$food_menu_list=   $this ->ObjM->food_name($f);
				$arr[] = $food_menu_list[0]['name'];
					
				}
						$name_list = implode(",",$arr);
					
					
					//echo $imp=implode(',',$food_menu_list[0]['name']);
		   			$json_arr[]=array(
					'date'				=>	$food_date,
					'day'				=>	$food_list[$i]['day'],
					'food_name'			=>	$name_list,
					'validation'	 	=>	'true' );
		  }
		  echo json_encode($json_arr);
			exit;
	 }
	 

	
//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/get_student_result?student_yearly_code=3
//http://172.16.16.23/school_new/school_admin/index.php/webservice/get_student_result?student_yearly_code=3	
	function get_student_result()
	{
		$student_yearly_code = $_REQUEST['student_yearly_code'];
		$result_dt = $this->ObjM->get_result_by_yearcode($student_yearly_code);
		$result_tot = $this->ObjM->get_tot_by_yearcode($student_yearly_code);
		if(count($result_dt)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		for($i=0;$i<count($result_dt);$i++){
		   $json_arr1[]=array(
					'subject_name'		=>	$result_dt[$i]['subject_name'],
					'marks'				=>	$result_dt[$i]['marks'],
					
					'exam_title'		=>	urldecode($result_dt[$i]['exam_title']),
					'validation'	 	=>	'true' );
		  }
		 for($j=0;$j<count($result_dt);$j++){
			
			$json_arr[] = array_merge($json_arr1[$j], array("total"=>''.$result_tot[0]['tot'].''));
		}	
	
	
		  echo json_encode($json_arr);
			exit;
	
	}
	
		 	
//http://phoenixdepo.com/school_new/school_admin/index.php/webservice/user_logout?usercode=3
//http://172.16.16.23/school_new/school_admin/index.php/webservice/user_logout?usercode=3
	
	function user_logout(){
		$data	=array();
		$data['reg_id']	= '';		
		$this->ObjM->update($data,'user_master','usercode',$_REQUEST['usercode']);
		
		$json_arr[]=array('validation'=>'true' );
		 
		echo json_encode($json_arr);
	    exit;
	}
	
	function test_notification()
	{
		$message=array('data'=>'Hello I Am Roshni');
		//$clist=array('APA91bH5C_BfwdKBFw-7muNfYBdqYVlI4NE5AFcCPutkcjBZVin5ypdlNLaAEG4-HUhwVTzix_7QOwaJgkz8E7TEynVaCRz_o6TCL5IqcgeEidJIOMvX15SCe1gN-8zjovTDoKJWSQk6');
		
	 $clist=array('AIzaSyB_1fB4FZRQ3c_QQsUAM4_LQtJHD9-KFcA');

		$this->send_notification($clist,$message);		
	}
	
	protected function send_notification($registatoin_ids, $message) {
      
        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
 
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
 		
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
 
        // Close connection
        curl_close($ch);
        echo $result;
    }
	

	
	
	/*function get_pic(){
		$usercode           =   $_REQUEST['usercode'];
		$userdt				=	$this->ObjM->get_user_by_usercode($usercode);
		$student_dt 		=   $this->ObjM->get_student_record($userdt[0]['end_code']);
		if($student_dt[0]['student_photo']!=''){
			$photo	= 	 main_url().'upload/img_thum/'.$student_dt[0]['student_photo'];
			$validation='true';
	     }else{
			$photo='';
			$validation='false';	
		}
		$json_arr[]=array(
			'photo'		     =>	  $photo,
			'validation'	 =>	 $validation
		);
		echo json_encode($json_arr);
		exit;
	}*/
	
	
 }
