<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class President extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('president_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
	
		
 	}
	public function index()
	{
		$data['header_img']=$this->president_model->get_header_img();
		$data['result']=$this->president_model->get_contain();
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('president_view',$data);
		$this->load->view('comman/footer');
	}
	
	
}

