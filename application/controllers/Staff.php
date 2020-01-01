<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('staff_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
	
		
 	}
	public function index()
	{
		$data['header_img']			=	$this->staff_model->get_header_img();
		$data['all']				=	$this->staff_model->get_all();
		//$data['facilitator']		=	$this->staff_model->get_facilitator();
//		$data['administration']		=	$this->staff_model->get_administration();
//		$data['hospitality']		=	$this->staff_model->get_hospitality();
//		$data['other']				=	$this->staff_model->get_other();
		
		//$data['result']=$this->staff_model->get_contain();
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('staff_view',$data);
		$this->load->view('comman/footer');
	}
	
	
}


