<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('registration_model','',TRUE);
		$this->load->library('form_validation');
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
	
		
 	}
	public function index()
	{
		$data['header_img']=$this->registration_model->get_header_img();
		$data['result']=$this->registration_model->get_contain();
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('registration_view',$data);
		$this->load->view('comman/footer');
	}
	
	function insertReg(){

		   	 $this->form_validation->set_rules('enrolment_no','Enrolment No', 'xss_clean|numeric|required|trim');
			
			 $this->form_validation->set_rules('admission_year','Admission_year', 'xss_clean|required|trim');
			
			 $this->form_validation->set_rules('program_complete','Program_complete', 'xss_clean|required|trim'); 
			
			 $this->form_validation->set_rules('name','Name', 'xss_clean|required|trim');

			 $this->form_validation->set_rules('address','Address', 'xss_clean|required|trim');

			 $this->form_validation->set_rules('city','City', 'xss_clean|required|trim');

			 $this->form_validation->set_rules('pin_code','Pin code', 'xss_clean|numeric|required|trim');

			$this->form_validation->set_rules('email','E-mail', 'xss_clean|valid_email|required|trim');

			 $this->form_validation->set_rules('current_university','Current University', 'xss_clean|required|trim');

			 $this->form_validation->set_rules('current_position','current_position', 'xss_clean|required|trim');

				if ($this->form_validation->run() == FALSE)
			    {
			        	$this->index();   
			    }
			    else
			    {
			                   
			    //$this->form_validation->set_rules('g-recaptcha-response','Captcha', 'required|callback_check_recaptcha');
				$enrolment_no = $this->input->post('enrolment_no');
				$admission_year = $this->input->post('admission_year');
				$program_complete = $this->input->post('program_complete');
				$name = $this->input->post('name');
				$address = $this->input->post('address');
				$city = $this->input->post('city');
				$pin_code = $this->input->post('pin_code');
				$email = $this->input->post('email');
				$current_university = $this->input->post('current_university');
				$current_position = $this->input->post('current_position');
				$created_date = date('y-m-d');
			
				$data = array(
					'enrolment_no' => $enrolment_no,
					'admission_year' => $admission_year,
					'program_complete' => $program_complete,
					'name' => $name,
					'address' => $address,
					'city' => $city,
					'pin_code' => $pin_code,
					'email' => $email,
					'current_university' => $current_university,
					'current_position' => $current_position,
					'created_date' => $created_date);
					
					
					$this->registration_model->addItem($data,'alumni_reg');
					
				header('Location: '.base_url().'index.php');	
				exit;
		}
	}
}

