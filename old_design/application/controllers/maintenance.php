<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class maintenance extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->helper('url');
		
	
		
 	}
	public function index()
	{	
		
		//var_dump($data['latest_event']);
		$this->load->view('comman/top_header_maintenance');
		$this->load->view('comman/header_menu_maintenance');
		$this->load->view('maintenance');
		$this->load->view('comman/footer_maintenance');
	}
	

	
	
}


