<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inquiry extends CI_Controller {

	function __construct()
 	{
		
   		parent::__construct(); 
		$this->load->model('inquiry_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('form_validation');
		
	
		
 	}
	public function index()
	{
		//$data['header_img']=$this->contact_model->get_header_img();
		//$data['result']=$this->contact_model->get_contain();
		$this->load->view('inquiry_view',$data);
		
	}
	function insert()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$data['admission_class']		=	$this->input->post('admission_seeking');
			$data['name_of_stud']			=	$this->input->post('childname');
			$data['dob']					=	date('Y-m-d',strtotime($this->input->post('dob')));
			
			$yrs=$this->input->post('yrs');
			$mon=$this->input->post('months');
			
			$data['age_on_april']			=	$yrs.' / '.$mon;
			
			$data['current_school']			=	$this->input->post('presentschool');
			$data['place']					=	$this->input->post('place');
			$data['current_class']			=	$this->input->post('pclass');
			$data['medium']					=	$this->input->post('medium');
			$data['board']					=	$this->input->post('board');
			$data['mother_tongue']			=	$this->input->post('mtongue');
			$data['residential_address']	=	$this->input->post('address');
			$data['std_code']				=	$this->input->post('stdcode');
			$data['contact_no_r']			=	$this->input->post('residence');
			$data['mobile_no']				=	$this->input->post('mobile');
			$data['email_id']				=	$this->input->post('emailid');
			$data['father_name']			=	$this->input->post('fathername');
			$data['father_occupation']		=	$this->input->post('fatheroccu');
			
			$data['mother_name']			=	$this->input->post('mothername');
			$data['mother_occupation']		=	$this->input->post('motheroccu');
			$data['guardian_name']			=	$this->input->post('guardianname');
			$data['guardian_occupation']	=	$this->input->post('guardianoccu');
			$data['intrest_in_hostel']		=	$this->input->post('hostel');
			$data['create_date']			=	date('Y-m-d');
			
			$id								=	$this->comman_fun->addItem($data,'inquiry_data');
			$this->session->set_flashdata('show_msg',array('class'=>'true','msg'=>'Your Inquiry Submitted Successfully.....'));
			header('Location: '.base_url().'index.php');	
			exit;
		}
	}
	
	
}


