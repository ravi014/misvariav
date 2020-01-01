<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct()
	{
		parent::__construct(); 
		$this->load->model('contact_model','',TRUE);
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('date');

		
	}
	public function index()
	{
		$this->view();
	}
	public function view(){
		$data['header_img']=$this->contact_model->get_header_img();
		$data['result']=$this->contact_model->get_contain();
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('contact_view',$data);
		$this->load->view('comman/footer');
	}
	function insertCon12(){

		 	$this->form_validation->set_rules('first_nm','First Name', 'xss_clean|required|trim');
			
			 $this->form_validation->set_rules('emailid','Email Id', 'xss_clean|valid_email|required|trim');
			
			 $this->form_validation->set_rules('contactno','Program_complete', 'xss_clean|numeric|required|trim'); 
			
			 $this->form_validation->set_rules('name','Name', 'xss_clean|required|trim');

			 $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_check_google_validate_captcha');

			 
		if ($this->form_validation->run() == FALSE)
		{
			$this->index();   
		}
		else
		{

			$first_nm = $this->input->post('first_nm');
			$emailid = $this->input->post('emailid');
			$contactno = $this->input->post('contactno');
			$name = $this->input->post('name');


			$data = array(
				'first_nm' => $first_nm,
				'emailid' => $emailid,
				'contactno' => $contactno,
				'name' => $name);
			
			//$this->db->insert('alumni_contact',$data);
			
			$this->contact_model->addItem($data,'alumni_contact');
			
			header('Location: '.base_url().'index.php/contact/');	
			exit;
		}
	}


	function insertCon()
	{
	
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			
		
			$this->form_validation->set_rules('first_nm','First Name', 'xss_clean|required|trim');
			
			$this->form_validation->set_rules('emailid','Email Id', 'xss_clean|valid_email|required|trim');
			
			$this->form_validation->set_rules('contactno','contactno', 'xss_clean|numeric|required|trim'); 
			
			$this->form_validation->set_rules('txtcomment','Comment', 'xss_clean|required|trim');

			$this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_check_google_validate_captcha');
			
			
			if ($this->form_validation->run() === FALSE){
				$this->view();
			}
			else
			{	
				$this->_check();
			}	
		}
	}
	
	protected function _check()
	{		
		
			
			$first_nm = $this->input->post('first_nm');
			$emailid = $this->input->post('emailid');
			$contactno = $this->input->post('contactno');
			$name = $this->input->post('txtcomment');


			$data = array(
				'first_nm' => $first_nm,
				'emailid' => $emailid,
				'contactno' => $contactno,
				'txtcomment' => $txtcomment);
			
			
			$this->contact_model->addItem($data,'alumni_contact');

			$to="info@sspis.org";
			
			$subject = 'Contact Us';
			// message
			 $message = '<html><head></head>
						<body>
							<table> 
							<tr> <td>Name</td><td>:</td><td>'.$name.'</td></tr>
							<tr> <td>Contact No</td><td>:</td><td>'.$contact.'</td></tr>
							<tr> <td>Email</td><td>:</td><td>'.$email.'</td></tr>
							<tr> <td>Date</td><td>:</td><td>'.$date.'</td></tr>
							<tr> <td>Message</td><td>:</td><td>'.$txtcomment.'</td></tr>
							</table>
						</body>
						</html>';
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:'.$email.'' . "\r\n";
			
			//mail($to, $subject, $message, $headers);
			
			
			//echo $this->email->print_debugger();
			//exit;
			echo '<script>alert("Your Detail Submited!");</script>';
            //redirect(base_url(), 'refresh');
			
			header('Location: '.base_url().'index.php/contact/');	
			exit;
		}
	//google captcha testing for localhost
	//Site key: 6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI
	//Secret key: 6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe

	//live seceret key : 6LeH6ckUAAAAAKEgQA2wC0luxAtmOZABd5ZR4XVm
	//Site key: 6LeH6ckUAAAAAAGVKForcXBBVfrqCJLsP5AMWEgA
	
	function check_google_validate_captcha() {
		
		$google_captcha = $this->input->post('g-recaptcha-response');
		
		$google_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe&response=" . $google_captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
		
		if ($google_response . 'success' == false) {
			
			$this->form_validation->set_message('check_google_validate_captcha', 'Please check the the captcha form');
			
			return FALSE;
			
		} else {
			
			return TRUE;
		}
	}
	
}


