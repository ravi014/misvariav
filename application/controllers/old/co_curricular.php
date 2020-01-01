<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class co_curricular extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('co_curricular_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
	
		
 	}
	public function index()
	{
		$data['header_img']=$this->co_curricular_model->get_header_img();
		$data['result']=$this->co_curricular_model->get_contain();
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('co_curricular_view',$data);
		$this->load->view('comman/footer');
	}
	
	
}


