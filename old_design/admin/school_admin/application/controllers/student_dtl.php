<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class student_dtl extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
	if(!$this->session->userdata('logged_in_school')){
			header('Location: '.main_url().'index.php/login');
			exit;
		}
		$this->load->model('student_dtl_model','ObjM',TRUE);
		$this->load->library('upload');
		$this->load->library('image_lib');
			$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
			
 	}
	public function view($eid)
	{
		
		$data['result']			=	$this->ObjM->get_record($eid);	
		$data['yearly_info']	=	$this->ObjM->get_student_yearly_info($data['result'][0]['student_code']);
		//$data['user_detail']	=	$this->ObjM->get_user_detail($data['result'][0]['student_code']);
		
		$data['g_country_code']		=	$this->ObjM->show_where1("country",array('countryid'=>$data['result'][0]['g_country_code']));

		$data['g_state_code']		=	$this->ObjM->show_where1("state",array('stateid'=>$data['result'][0]['g_state_code']));

		$data['g_city_code']		=	$this->ObjM->show_where1("city",array('cityid'=>$data['result'][0]['g_city_code']));
		
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('student_dtl_view',$data);
		$this->load->view('comman/footer');
	}
	

}


