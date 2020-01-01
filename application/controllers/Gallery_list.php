<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_list extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('gallery_list_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		//$this->load->helper('bradecrume');
			
 	}
	
	public function view()
	{
		$data['header_img']		=	$this->gallery_list_model->get_header_img();
		$data['event_dt']		=	$this->gallery_list_model->get_event_dt($this->uri->segment(3));
		$data['result']			=	$this->gallery_list_model->get_eventimg($this->uri->segment(3));
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('gallery_list_view',$data);
		$this->load->view('comman/footer');
	}
	
	function get_event(){
		$dt=$this->gallery_list_model->get_eventname($this->uri->segment(3));
		
		$result=$this->gallery_list_model->get_eventimg($this->uri->segment(3));
		
		for($i=0;$i<count($result);$i++){
	
			$res[] = array(
				
				'photopath'=>$result[$i]['photopath'],
				
			);
		
		}
		echo json_encode($res);
		
		
	}
	

}


