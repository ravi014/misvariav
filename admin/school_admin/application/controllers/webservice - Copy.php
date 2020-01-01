<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class webservice extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model("webservice_model",'ObjM');
		$this->load->helper("url");
		$this->load->library('session');
		
	}
	
	/***Login***/
	function login()
	{
		$username = $_REQUEST['username'];
		 $password = $_REQUEST['password'];
		
		$result = $this->ObjM->login($username,$password);
		
		if(isset($result[0]))
		{
		
		  if($result[0]['user_type_id'] == '1')
		   {
			 
			$json_arr['usercode']		 	= 	$result[0]['usercode'];
			$json_arr['user_type_id']		= 	$result[0]['user_type_id'];
			$json_arr['master_code']		=	$result[0]['master_code'];

			$json_arr['username']			=	$result[0]['username'];
			$json_arr['password']			= 	$result[0]['password'];
				
			$json_arr['name']				=	$result[0]['name'];
			$json_arr['emailid']			=	$result[0]['emailid'];
			$json_arr['mobileno']			=	$result[0]['mobileno'];
			$json_arr['phone_no']			=	$result[0]['phone_no'];
			$json_arr['country']			=	$result[0]['country'];
			$json_arr['state']				=	$result[0]['state'];
			$json_arr['city']				=	$result[0]['city'];
							
			
			 if(file_exists(main_url()."upload/img_thum/".$result[0]['user_img']) && $result[0]['user_img']!=''){
					$user_img	=	$result[0]['user_img'];
			 }
			 else{
				$user_img	=	'student.png';
			 }
			 
			 $json_arr['image']  		= 	main_url().'upload/img_thum/'.$user_img;
			
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
	
	
	//****This Fun User For get Events*****//
	
	function get_events()
	{
		$usercode=$_REQUEST['usercode'];
		
		$userdt=$this->ObjM->get_user_by_usercode($usercode);
		
		if($userdt[0]['user_type_id']=='1'){
			
			$result = $this->get_school_event($userdt);
			
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
				'event_dt'  	=>  $result[$i]['event_dt'],
				'event_code' =>  $result[$i]['event_code'],
				'event_title' 	=>  $result[$i]['event_title'],
				'cover_img' 	=>  $result[$i]['cover_img'],
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
	
	function fee_dt()
	{
		$usercode           =   $_REQUEST['usercode'];
		$userdt				=	$this->ObjM->get_user_by_usercode($usercode);
		$yearly_acccount 	=   $this->ObjM->student_yearly_acccount($userdt[0]['idcode']);
		$student_dt 		=   $this->ObjM->get_student_record($userdt[0]['idcode']);
		$fee_detail			=   $this->ObjM->get_paid_all_record($yearly_acccount[0]['student_yearly_code']);
		$fee=$this->get_payment_dt($yearly_acccount[0]);
		
		
		if($fee['total_paid']==0)
		{
			$term_1_due	 =	$fee['first_term_fee'];
			$term_2_due	 =	$fee['total_fee'] - $fee['first_term_fee'];
		}
		else{
			$term_1_due	 =	'-';
			$term_2_due	 =	$fee['total_fee'] - $fee['total_paid'];
		}
		
		$json_arr[]=array(
			'total_fee'		=>	$fee['total_fee'],
			'total_paid'	=>	$fee['total_paid'],
			'balance'		=>	$fee['grand_balance'],
			'term_1_paid'	=>	isset($fee_detail[0]) ? $fee_detail[0]['amount'] : "-",
			'term_2_paid'	=>	isset($fee_detail[1]) ? $fee_detail[1]['amount'] : "-",
			'term_1_due'	=>	$term_1_due,
			'term_2_due'	=>	$term_2_due,
			'student_name'	=>	$student_dt[0]['first_name'].' '.$student_dt[0]['middle_name'].' '.$student_dt[0]['sur_name'],
			'grno'		    =>	$student_dt[0]['grno'],
			'standard_name'	=>	$student_dt[0]['standard_name'],
			'division_name'	=>	$student_dt[0]['division_name'],
			'validation'	 =>	'true'
		);
		
		
		
		echo json_encode($json_arr);
		exit;
	}
	
	protected function get_payment_dt($yearly_acccount)
	{
		$data['total_paid']		=	$this->ObjM->get_total_paid($yearly_acccount['student_yearly_code']);
		$data['total_fee']		=	$this->ObjM->get_total_fee($yearly_acccount['current_standard']);
		$data['first_term_fee']	=	$this->ObjM->get_first_term_fee($yearly_acccount['current_standard']);
		$data['grand_balance']	=	$data['total_fee'] - $data['total_paid'];
		return $data;
	}
	
	function get_pic(){
		$usercode           =   $_REQUEST['usercode'];
		$userdt				=	$this->ObjM->get_user_by_usercode($usercode);
		$student_dt 		=   $this->ObjM->get_student_record($userdt[0]['idcode']);
		if(file_exists(FCPATH."upload/userimage/thum/".$student_dt[0]['student_photo']) && $student_dt[0]['student_photo']!=''){
			$photo	= 	'http://www.vatsalyainternational.org/admin/upload/userimage/thum/'.$student_dt[0]['student_photo'];
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
	}
	function send_feedback()
	{
	 if(isset($_REQUEST['usercode']))
			{
				$data['usercode'] = $_REQUEST['usercode'];
			}
			$user_detail = $this->ObjM->feedback_user_detail($data['usercode']);
			$data['feedback']		=$_REQUEST['feedback'];
			$data['user_type_id']	=$user_detail[0]['user_type_id'];
			
			$id=$this->ObjM->addItem($data,'feedback');
			$res=array();
			$res['id']=$id;
			$res['validation']='true';

			echo json_encode($res);
	} 
	////// For event Detail ////
	
	function academic_section_type()
	{
	 $academic_section_type   	= $this->ObjM->all_section_type(); 
	  for($i=0;$i<count($academic_section_type);$i++){
			$academic_section_type[$i]['validation']	= 'true';
		}
	 echo json_encode($academic_section_type);
	}
	
	function all_event()
	{
		if(isset($_REQUEST['section_type_code']))
			{
				$data['section_type_code'] = $_REQUEST['section_type_code'];
			}
	  
	  $event   	= $this->ObjM->get_all_event($data['section_type_code']); 
	  for($i=0;$i<count($event);$i++){
			$event[$i]['cover_img']	= 'http://www.vatsalyainternational.org/admin/upload/event_thum/'.$event[$i]['cover_img'];
			$event[$i]['event_dt']	= date("d-m-Y", strtotime($event[$i]['event_dt']));
			$event[$i]['validation']	= 'true';
		}

	  echo json_encode($event);
	}
	
  function get_photogallary()
     {
	    $event_code = $_REQUEST['event_code'];
		$photos = $this->ObjM->get_photogallary($event_code);
		
		for($i=0;$i<count($photos);$i++){
			$photos[$i]['photopath']	= 'http://www.vatsalyainternational.org/admin/upload/event/'.$photos[$i]['photopath'];
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
	
////// STUDENT ATTENDANCE ///////
	function student_attendance()
	{
		
		$usercode           =   $_REQUEST['usercode'];
		$userdt				=	$this->ObjM->get_user_by_usercode($usercode);
		$yearly_acccount 	=   $this->ObjM->student_yearly_acccount($userdt[0]['idcode']);
		
		$arr=array('student_yearly_code' =>$yearly_acccount[0]['student_yearly_code'],'attendance_month'=>$_REQUEST['month']);
		$stud_att				=	$this->ObjM->get_student_attendance($arr);
		
		if(count($stud_att)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		for($i=0;$i<count($stud_att);$i++){
				$attendance_date = date('d-m-Y',$stud_att[$i]['attendance_date']);
				$json_arr[]=array(
					'attendance_date'		=>	$attendance_date,
					'attendance'			=>	$stud_att[$i]['attendance'],
					'validation'	 		=>	'true' );
		  }
		  echo json_encode($json_arr);
			exit;
	}
//// GET STUDENT TIME TABLE ////////
	function get_time_table()
	{
		$usercode    	 	=   $_REQUEST['usercode'];
		$daycode      		=   $_REQUEST['day_code'];
		$user_dt 	 		=   $this ->ObjM->get_user_by_usercode($usercode);
		$yearly_acccount 	=   $this ->ObjM->student_yearly_acccount($user_dt[0]['idcode']);
		
		$arr=array('standard_code' =>$yearly_acccount[0]['current_standard'],'division_code' =>$yearly_acccount[0]['division_code'],'day' =>$daycode);
		$time_table			=	$this->ObjM->get_time_table($arr);
		
		if(count($time_table)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		for($i=0;$i<count($time_table);$i++){
			if($time_table[$i]['recess'] == 'Y')
			  { 
				$time = $time_table[$i]['recess_to'] .'-'. $time_table[$i]['recess_from'];
				$recess = $time_table[$i]['recess_to'] .'-'. $time_table[$i]['recess_from'];
			  }
			else
			  {
				$time = $time_table[$i]['s_time'] .'-'. $time_table[$i]['e_time'];
				$recess = '-';
			  }
			  
			if($time_table[$i]['subject_name'] == '')
			  { 
				$subject_name = '-';
			  }
			else
			  {
				$subject_name = $time_table[$i]['subject_name'];
			  }
			  
			  if($time_table[$i]['staff_name'] == '')
			  { 
				$staff_name = '-';
			  }
			else
			  {
				$staff_name = $time_table[$i]['staff_name'];
			  }
			  
			  	$lec=($i==0)?'-':$i;
			  	
				$json_arr[]=array(
					'lecture'		=>	$lec,
					'time'			=>	$time,
					'recess'		=>	$recess,
					'subject_name'	=>	$subject_name,
					'staff_name'	=>	$staff_name,
					'validation'	=>	'true' );
		  }
		  echo json_encode($json_arr);
			exit;
	}
	
//// GET EXAM SCHEDULE ////////
	 function exam_schedule()
	 {
		$standardcode           =   $_REQUEST['standardcode'];
		$exam_data 	 			=   $this ->ObjM->get_exam_by_standard($standardcode);
		//var_dump($exam_data); exit;
		
		if(count($exam_data)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		for($i=0;$i<count($exam_data);$i++){
			$exam_date = date('d-m-Y',$exam_data[$i]['date_dt']);
			$exam_time = $exam_data[$i]['start_time'].'  To  '.$exam_data[$i]['end_time'];
			
			$json_arr[]=array(
					'standard_name'		=>	$exam_data[$i]['standard_name'],
					'exam_title'		=>	$exam_data[$i]['exam_title'],
					'subject_name'		=>	$exam_data[$i]['subject_name'],
					'exam_date'			=>	$exam_date,
					'exam_time'			=>	$exam_time,
					'marks'				=>	$exam_data[$i]['marks'],
					'validation'	 		=>	'true' );
		  }
		  echo json_encode($json_arr);
			exit;
	 }
	 
//// GET HOLIDAY LIST ////////	 
	function get_holiday()
	 {
		$holiday_list 	=   $this ->ObjM->holiday_list();
		//var_dump($holiday_list); exit;
		
		if(count($holiday_list)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		for($i=0;$i<count($holiday_list);$i++){
			if($holiday_list[$i]['type'] == 'multi')
			{
			  $holiday_date = date('d-m-Y',$holiday_list[$i]['start_date']).'  To   '.date('d-m-Y',$holiday_list[$i]['end_date']);
			}
			else
			{
				$holiday_date = date('d-m-Y',$holiday_list[$i]['start_date']);	
			}
			$day  = date("D", $holiday_list[$i]['start_date']);
			
			$json_arr[]=array(
					'title'				=>	$holiday_list[$i]['title'],
					'holiday_date'		=>	$holiday_date,
					'holiday_day'		=>	$day,
					'description'		=>	$holiday_list[$i]['description'],
					'validation'	 	=>	'true' );
		  }
		  echo json_encode($json_arr);
			exit;
	 }
		
	/////// GET FOOD MENU //////////////

	function get_food_menu()
	 {
		$today_date = date("d-m-Y");
		$today_day = date('l', strtotime($today_date));
		$week_days = array('Monday', 'Tuesday', 'Wednesday','Thursday','Friday','Saturday','Sunday');
		$temp_array = array_search($today_day,$week_days);
		
		$start_date = strtotime(date("d-m-Y", strtotime($today_date)) . '-'.$temp_array.'day');
		$end_date = strtotime(date("d-m-Y",$start_date) . " +5 day");
		
		$food_list 	=   $this ->ObjM->food_list($start_date,$end_date);
		//echo $this->db->last_query(); exit;
		
		if(count($food_list)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		for($i=0;$i<count($food_list);$i++){
		   $food_date = date('d-m-Y',$food_list[$i]['date']);	
			
		   $json_arr[]=array(
					'date'				=>	$food_date,
					'day'				=>	$food_list[$i]['day'],
					'food_name'			=>	$food_list[$i]['food_name'],
					'validation'	 	=>	'true' );
		  }
		  echo json_encode($json_arr);
			exit;
	 }
	 
	 
	/* Get Complain */
	function get_complain()
	{
		 $user_code = $_REQUEST['user_code'];
		 
		 $user_dt = $this->ObjM->get_user_by_usercode($_REQUEST['user_code']);
	
		
		$all_complain = $this->ObjM->get_complain($user_dt[0]['idcode']);
	
		for($i=0;$i<count($all_complain);$i++){
			$row=$i+1;
			$all_complain[$i]['sr_no']	= $row;
			$all_complain[$i]['validation']	= 'true';
			$all_complain[$i]['date']		= date('d-m-Y H:i:s',($all_complain[$i]['timedt']));
			$all_complain[$i]['first_name']		= $all_complain[$i]['first_name'].' '.$all_complain[$i]['last_name']. '( Teacher )';
		
		  }
		if(count($all_complain)>0)
		{
			$return=$all_complain;
			echo json_encode($return);	 	
		} 
		else
		{
			 $result[0]['validation'] = "false";
			 echo json_encode($result);
		}
		
		
	}
	
	/* Get complain by code */
	
	function get_complain_by_code()
	{
		 $complaint_code = $_REQUEST['complaint_code'];
		 $complain_by_code = $this->ObjM->get_complain_by_code($complaint_code);
	
		 
		 for($i=0;$i<count($complain_by_code);$i++){
			$complain_by_code[$i]['validation']	= 'true';
			$complain_by_code[$i]['date']		= date('d-m-Y H:i:s',($complain_by_code[$i]['timedt']));
			$complain_by_code[$i]['sender_code'] = $complain_by_code[$i]['send_status'];
			$complain_by_code[$i]['first_name'] = '-';
			$complain_by_code[$i]['last_name'] = '-';
		  }
		if(count($complain_by_code)>0)
		{
			$return=$complain_by_code;
			echo json_encode($return);	 	
		} 
		else
		{
			 $result[0]['validation'] = "false";
			 echo json_encode($result);
		}
		
		
	}
	
	/* SEND COMPLAIN  By Complaint code */
	
	function send_complaint()
	{
			//?=usercode=12&complaint_code=1&description=hello sir
		 	$user_dt = $this->ObjM->get_user_by_usercode($_REQUEST['usercode']);
			
			$data['send_status'] 		= 	($user_dt[0]['user_type_id']=='2')? "1" : "0";
			$data['complaint_code']		=	$_REQUEST['complaint_code'];
			$data['description']		=	$_REQUEST['description'];
			$data['timedt']				=	time();
			$id		=	$this->ObjM->addItem($data,'complaint_detail');
			$res	=	array();
			$result[0]['validation']='true';
			echo json_encode($result);
	}
	
	function user_logout(){
		//http://vatsalyainternational.org/admin/index.php/webservice/user_logout?usercode=90
		$data	=array();
		$data['reg_id']	= '';		
		$this->ObjM->update($data,'user_master','usercode',$_REQUEST['usercode']);
		
		$json_arr[]=array('validation'=>'true' );
		 
		echo json_encode($json_arr);
	    exit;
	}
	
	
	function test_notification()
	{
		$message=array('data'=>'Hello I Am Jitu');
		$clist=array('APA91bH5C_BfwdKBFw-7muNfYBdqYVlI4NE5AFcCPutkcjBZVin5ypdlNLaAEG4-HUhwVTzix_7QOwaJgkz8E7TEynVaCRz_o6TCL5IqcgeEidJIOMvX15SCe1gN-8zjovTDoKJWSQk6');
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
	
	function get_exeat_boarder()
	{
		$exeat_boarder = $this -> ObjM -> get_exeat_boarder(); 
		
	    for($i=0;$i<count($exeat_boarder);$i++){
			$exeat_boarder[$i]['validation']	= 'true';
			$exeat_boarder[$i]['date'] = date('d-m-Y',strtotime($exeat_boarder[$i]['date']));
		  }
		if(count($exeat_boarder)>0)
		{
			$return=$exeat_boarder;
			echo json_encode($return);	 	
		} 
		else
		{
			 $result[0]['validation'] = "false";
			 echo json_encode($result);
		}
	}
	
	/////// GET Hostel FOOD MENU //////////////

	function get_hostel_food_menu()
	 {
		$today_date = date("d-m-Y");
		$today_day = date('l', strtotime($today_date));
		$week_days = array('Monday', 'Tuesday', 'Wednesday','Thursday','Friday','Saturday','Sunday');
		$temp_array = array_search($today_day,$week_days);
		
		$start_date = strtotime(date("d-m-Y", strtotime($today_date)) . '-'.$temp_array.'day');
		$end_date = strtotime(date("d-m-Y",$start_date) . " +5 day");
		
		$food_list 	=   $this ->ObjM->food_list($start_date,$end_date);
		//echo $this->db->last_query(); exit;
		
		if(count($food_list)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		for($i=0;$i<count($food_list);$i++){
		   $food_date = date('d-m-Y',$food_list[$i]['date']);	
			
		   $json_arr[]=array(
					'date'				=>	$food_date,
					'day'				=>	$food_list[$i]['day'],
					'lunch'				=>	$food_list[$i]['food_name'],
					'dinner'			=>	$food_list[$i]['dinner_name'],
					'validation'	 	=>	'true' );
		  }
		  echo json_encode($json_arr);
			exit;
	 }

	function get_student_result()
	{
		$student_yearly_code = $_REQUEST['student_yearly_code'];
		$result_dt = $this->ObjM->get_result_by_yearcode($student_yearly_code);
		
		if(count($result_dt)<1){
			$json_arr[]=array('validation'=>'false');	
			echo json_encode($json_arr);
			exit;	 
		}
		
		for($i=0;$i<count($result_dt);$i++){
		   $json_arr[]=array(
					'subject_name'		=>	$result_dt[$i]['subject_name'],
					'fa1'				=>	$result_dt[$i]['fa1'],
					'fa2'				=>	$result_dt[$i]['fa2'],
					'sa1'				=>	$result_dt[$i]['sa1'],
					'fa3'				=>	$result_dt[$i]['fa3'],
					'fa4'				=>	$result_dt[$i]['fa4'],
					'sa2'				=>	$result_dt[$i]['sa2'],
					'validation'	 	=>	'true' );
		  }
		  echo json_encode($json_arr);
			exit;
	
	}
 
 }
