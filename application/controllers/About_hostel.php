<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_hostel extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('about_hostel_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
	
		
 	}
	public function index()
	{
		$data['header_img']=$this->about_hostel_model->get_header_img();
		$data['result']=$this->about_hostel_model->get_contain();
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('about_hostel_view',$data);
		$this->load->view('comman/footer');
	}
	
	
}


