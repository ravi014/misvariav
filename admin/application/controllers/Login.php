<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
 	{
 		
   		parent::__construct(); 
		$this->load->model('login_model','ObjM',TRUE);
   		$this->load->library('form_validation');
   		$this->load->helper('form');
   		$this->load->library('email');
		$this->load->helper('url');
		$this->load->helper('date');

 	}
	public function index()
	{
			
     		$this->load->view('login_view');
   		
	}
	
	
	function login_submit()
	{
		//echo "1";exit;
		$this->form_validation->set_rules('username', 'Username', 'required');
	 	$this->form_validation->set_rules('password', 'Password', 'required');
	 	
		if ($this->form_validation->run() == FALSE)
	 	{
		 
		$this->load->view('login_view');	
		
		}
		else{
		
			$username 	= data_filter($this->input->post('username'));
			$password	=data_filter($this->input->post('password'));
     	
			if($username='superadmin' && $password=='superadmin')
			{
				
			$this->session->set_userdata('logged_in_user',"Super Admin");
				redirect(base_url()."index.php/home");	
			}
			else{
			$username 	=data_filter($this->input->post('username'));
		 	$password	=data_filter($this->input->post('password'));
     	 	
			
			$result 	= 	$this->ObjM->loginsub($username, $password);
			
			if(count($result)> 0)
			{
				$sess_array = array();
				
				$sess_array['usercode']			=	$result[0]['usercode'];
				$sess_array['master_code']		=	$result[0]['master_code'];
				$sess_array['user_type_id']		=	$result[0]['user_type_id'];
				$sess_array['name']				=	$result[0]['name'];
				$sess_array['username']			=	$result[0]['username'];
				$sess_array['emailid']			=	$result[0]['emailid'];
				$sess_array['mobileno']			=	$result[0]['mobileno'];
				$sess_array['phone_no']			=	$result[0]['phone_no'];
				$sess_array['image']			=	$result[0]['user_img'];
				$sess_array['country']			=	$result[0]['country'];
				$sess_array['state']			=	$result[0]['state'];
				$sess_array['city']				=	$result[0]['city'];
							
			
				
				$data['usercode']			=	$result[0]['usercode'];
				$data['username']			=	$result[0]['username'];
				$data['password']			=	$result[0]['password'];
				$data['ip']					=	$_SERVER['REMOTE_ADDR'];
				$data['browserdt']			=	$_SERVER["HTTP_USER_AGENT"];
				$data['logintime']			=	time();
				$data['last_event']			=	time();
				$data['status']				=	'Sucess';
				$data['availeble']			=	'Y';
				
				$login_code					=	$this->ObjM->addItem($data,'login_info');
				$sess_array['login_code']	=	$login_code;
		
			if($result[0]['user_type_id']=='1') {
			$this->session->set_userdata('logged_in_school', $sess_array);
				header('Location: '.base_url().'school_admin/index.php/home');
				exit;
			}
			
			else if($result[0]['user_type_id']=='4') {
			$this->session->set_userdata('logged_in_school_user', $sess_array);
				header('Location: '.base_url().'school_user/index.php/home');
				exit;
			}
			
			else if($result[0]['user_type_id']=='3') {
			$this->session->set_userdata('logged_in_student', $sess_array);
				header('Location: '.base_url().'student/index.php/home');
				exit;
			}
			
			
			else{
				$data['error']='Invalid User';
         		$this->load->view('login_view',$data);	
			}
			}
			else{
				
		$now = time();
		$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
		
				$data['username']		=	$this->input->post('username');
				$data['password']		=	$this->input->post('password');
				$data['timedt']			=	$nowdt;
				$data['status']			=	'Failed';
				$data['ip']				=	$_SERVER['REMOTE_ADDR'];
				$data['browserdt']		=	$_SERVER["HTTP_USER_AGENT"];
				$data['availeble']		=	'N';
				
				$login_code					=	$this->ObjM->addItem($data,'login_info');
				
				$data['error']='Invalid Username or Password';
         		$this->load->view('login_view',$data);	
			}
			}
			
		}
	
	}
	
	//Superadmin logout
	function logout()
 	{
		$this->session->unset_userdata("logged_in_user");
		header('Location: '.base_url().'index.php/login');
		exit;
    }

//School admin logout
function schooladmin_logout()
	{
		$now = time();
		$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
		$data['availeble']		=	'N';
		$data['logout_time']	=	time();
		$this->ObjM->update($data,'login_info','login_code',$this->session->userdata['logged_in_school']['login_code']);	
		
		$this->session->unset_userdata("logged_in_school");	
		header('Location: '.base_url().'index.php/login');
		exit;
		
	}
	
	//School user logout
function schooluser_logout()
	{
		$now = time();
		$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
		$data['availeble']		=	'N';
		//$data['logout_time']	=	time();
		$this->ObjM->update($data,'login_info','login_code',$this->session->userdata['logged_in_school_user']['login_code']);	
		
		$this->session->unset_userdata("logged_in_school_user");	
		header('Location: '.base_url().'index.php/login');
		exit;
		
	}
	
	
	//Student logout
function student_logout()
	{
		$now = time();
		$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
		$data['availeble']		=	'N';
		//$data['logout_time']	=	time();
		$this->ObjM->update($data,'login_info','login_code',$this->session->userdata['logged_in_student']['login_code']);	
		
		$this->session->unset_userdata("logged_in_student");	
		header('Location: '.base_url().'index.php/login');
		exit;
		
	}
	
	// forget password
	public function forget_pwd($email){
   	
 $this->form_validation->set_rules('email', 'Emaid ID', 'trim|required|valid_email');
	 
	   if ($this->form_validation->run() == FALSE)
        {   //validation fails
     		$this->load->view('login_view');
        }
        else
        {
            //get the form data
        
		  $data=array();
		$query = $this->db->query("SELECT * FROM user_master WHERE email='".$email."'");
		if($query->num_rows()>0)
		{
			$row=$query->row_array();
			$username = $row['username'];
			$password = $row['password'];
		
	   $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => '', // change it to yours
  'smtp_pass' => '', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

        $message = '	<h2>Hello, ('.$name.')</h2>
		
		<p>Your login details for School:<br/>username='.$username.'<br/>Password='.$password.'</p>';
 
	    $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('',''); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject('Recover password for your school admin account');
      $this->email->message($message);
    if ($this->email->send())
            {
	echo "YES";
	exit;
	}
		else
		{
				
		  echo 'NO';
		 exit;
		}
		}
		else{
			 echo '0';
		exit;
		}
		

		}
	}
}


