<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tci extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('tci_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
	
		
 	}
	public function index()
	{
		
		$data['all_2019']				=	$this->tci_model->get_all('2019');
		
		$data['all_2018']				=	$this->tci_model->get_all('2018');
		
		//echo $this->db->last_query();exit;
	
		$this->load->view('comman/top_header');
		
		$this->load->view('comman/header_menu');
		
		$this->load->view('tci_view',$data);
		
		$this->load->view('comman/footer');
	}
	
	
}


