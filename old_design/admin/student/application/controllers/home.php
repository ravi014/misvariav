<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
		if(!$this->session->userdata('logged_in_student')){header('Location: '.main_url().'index.php/login');exit;}
		$this->load->model('home_model','ObjM',TRUE); 
 	   		$this->load->library('form_validation');

	}
	
	public function index()
	{

		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('home_view');
		$this->load->view('comman/footer');
	}
	
	
}

