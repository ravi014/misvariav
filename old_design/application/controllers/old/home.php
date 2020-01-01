<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('home_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
	
		
 	}
	public function index()
	{	
		$data['slider_img']=$this->home_model->get_slider_img();
		$data['announcement']=$this->home_model->get_announcement();
		$data['latest_event']=$this->home_model->get_latest_event();
		//var_dump($data['latest_event']);
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('home_view',$data);
		$this->load->view('comman/footer');
	}
	
	
}


