<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class achievements extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('achievements_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
	
		
 	}
	public function index()
	{
		$data['header_img']=$this->achievements_model->get_header_img();
		$data['result']=$this->achievements_model->get_contain();
		$data['achievement']=$this->achievements_model->get_achievement();
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('achievements_view',$data);
		$this->load->view('comman/footer');
	}
	
	
}


