<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
		$this->load->model('home_model','ObjM',TRUE); 
			if(!$this->session->userdata('logged_in_user')){header('Location: '.base_url().'index.php/login');exit;}
		$this->load->model('home_model','',TRUE); 
 	}
	
	public function index()
	{
		$data['result']=$this->ObjM->getAll();
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('home_view',$data);
		$this->load->view('comman/footer');
	}
	
	
}

