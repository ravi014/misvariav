<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admission extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('admission_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
	
		
 	}
	public function index()
	{
		$data['header_img']=$this->admission_model->get_header_img();
		$data['result']=$this->admission_model->get_contain();
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('admission_view',$data);
		$this->load->view('comman/footer');
	}
	function downloadpdf(){
	$basename = basename($this->uri->segment(3));
	$filename = ''.base_url().'asset/images/'.$basename; // don't accept other directories
	$buffer = file_get_contents($filename);
	/* Force download dialog... */
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");
	header("Content-Type: application/image");
	/* Don't allow caching... */
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	/* Set data type, size and filename */
	header("Content-Type: application/octet-stream");
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: " . strlen($buffer));
	header("Content-Disposition: attachment; filename=$basename");
	echo $buffer; 
	readfile($buffer);
	exit();
	
	}
	
}


