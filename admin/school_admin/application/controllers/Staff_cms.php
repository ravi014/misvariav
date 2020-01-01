<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_cms extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('staff_cms_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->helper('breadcrumb');
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
 	}
	public function index()
	{
		
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('staff_cms_view');
		$this->load->view('comman/footer');
	}
	function listing(){
		
		$result=$this->staff_cms_model->getAll();
		
		//echo $this->db->last_query();
		echo '{ "aaData":[';
		$data = "";
		
		$rowno=0;
		for($i=0;$i<count($result);$i++)
		{	
			$rowno++;
            if($result[$i]['status']=='Active'){
                   $currentst='Active';
                   $nm='Inactive';
				   
            }
            else{
                   $currentst='Inactive';
                   $nm='Active';
            }
			

			$p="";
			
			
			$p="<a href='".base_url()."index.php/staff_cms/addnew/Edit/".$result[$i]['staff_code']."' class='btn btn-default btn-sm' rel='tooltip' title='Edit'><i class='fa fa-pencil-square-o'></i></a>&nbsp;&nbsp;&nbsp;";
            $p.="<a href='index.php' class='btn btn-danger btn-sm delrcd' rel='tooltip' title='Delete' value='".base_url()."index.php/staff_cms/record_update/Delete/".$result[$i]['staff_code']."'><i class='fa fa-trash'></i></a>";
			$sta="".$currentst."&nbsp;|&nbsp;<a href='#' class='statuschange' value='".base_url()."index.php/staff_cms/record_update/".$nm."/".$result[$i]['staff_code']."'>".$nm."</a>";
			$rowcount=$i+1;	
			$data.='["'.$rowcount.'","'.$result[$i]['staff_type'].'","'.$result[$i]['name'].'","'.$result[$i]['designation'].'","'.$result[$i]['qualification'].'","'.$result[$i]['subject'].'","'.$sta.'","'.$p.'"],';
		
		}
		
		echo substr($data,0,-1);
		echo "] }";	 	 	
	}
	
	function addnew(){
		
		
		
		if($this->uri->segment(3)=='Edit'){
			$data['result']		=	$this->staff_cms_model->get_record($this->uri->segment(4));
		}
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('staff_cms_add',$data);
		$this->load->view('comman/footer');	
	}
	function insertrecord(){
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
			///Student data Data///
			$data['staff_type']			=	$this->input->post('staff_type');
			$data['subject']			=	$this->input->post('subject');
			$data['name']				=	$this->input->post('name');
			$data['designation']		=	$this->input->post('designation');
			$data['qualification']		=	$this->input->post('qualification');
				
			if($this->input->post('mode')=="Add"){
				
				$staff_code			=	$this->staff_cms_model->addItem($data,'cms_staff_master');				
			}
			if($this->input->post('mode')=="Edit"){
				$this->staff_cms_model->update($data,'cms_staff_master','staff_code',$this->input->post('eid'));
			}
			
		}
		header('Location: '.base_url().'index.php/staff_cms');
		exit;
	}
	
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->staff_cms_model->update($data,'cms_staff_master','staff_code',$this->uri->segment(4));	
		
	}

}


