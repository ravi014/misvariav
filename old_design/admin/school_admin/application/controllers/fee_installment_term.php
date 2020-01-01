<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class fee_installment_term extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
		
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
		$this->load->model('fee_head_model','ObjM',TRUE); 
	
   		$this->load->helper('url');
		
		$this->load->helper('date');
		
		$this->load->library('form_validation');
	
 	}
	
	public function index($id = '')
	{
		
		if($id!=''){
			$data['record']		=	$this->comman_fun->get_table_data('fee_installment_term',array('id'=>$id));
			$data['mode']  = 'Edit';
		}
		
		$data['result']		=	$this->comman_fun->get_table_data('fee_installment_term');
		
		$this->load->view('comman/topheader');
		
		$this->load->view('comman/header');
		
		$this->load->view('fee_installment_term',$data);
		
		$this->load->view('comman/footer');
		
	}
	
	
	

	//To Add or Edit data
		function insert(){
			
	
			
			if ($this->input->server('REQUEST_METHOD') === 'POST'){
				
				$data  = array();
				
				$data['name'] 		= 	date('F',strtotime($_POST['to_date']));
				
				$data['to_day'] 	= 	date('d',strtotime($_POST['to_date']));
				
				$data['to_month'] 	= 	date('m',strtotime($_POST['to_date']));
				
				$data['from_day'] 	= 	date('d',strtotime($_POST['from_date']));
				
				$data['from_month'] = 	date('m',strtotime($_POST['from_date']));
				
				$data['to_date'] 	= 	strtotime($_POST['to_date']);
				
				$data['from_date'] 	= 	strtotime($_POST['from_date']);
				
			
				
				$this->ObjM->update($data,'fee_installment_term','id',$_POST['eid']);		
				
				$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Updated successfully.....");
				
			}
			
			
			header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'');
			
			exit;
			
		
		}
	
		//To Change Status (Inactive or Delete)
	
	
}

