<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcement extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('announcement_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
		//$this->load->helper('breadcrumb');
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
 	}
	public function index()
	{
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('announcement_view');
		$this->load->view('comman/footer');
	}
	function listing(){
		
		$result=$this->announcement_model->getAll();
		
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
			
			
			$p="<a href='".base_url()."index.php/announcement/addnew/Edit/".$result[$i]['gen_cms_code']."' class='btn btn-default btn-sm' rel='tooltip' title='Edit'><i class='fa fa-pencil-square-o'></i></a>&nbsp;&nbsp;&nbsp;";
            $p.="<a href='index.php' class='btn btn-danger btn-sm delrcd' rel='tooltip' title='Delete' value='".base_url()."index.php/announcement/deleterecord/".$result[$i]['gen_cms_code']."'><i class='fa fa-trash'></i></a>";
			$sta="".$currentst."&nbsp;|&nbsp;<a href='#' class='statuschange' value='".base_url()."index.php/announcement/record_update/".$nm."/".$result[$i]['gen_cms_code']."'>".$nm."</a>";
			$rowcount=$i+1;	
			$data.='["'.$rowcount.'","'.trim($result[$i]['page_title']).'","'.$sta.'","'.$p.'"],';
		}
		echo substr($data,0,-1);
		echo "] }";	 
		
		
	}
	
	function addnew(){
		
		
		
		if($this->uri->segment(3)=='Edit'){
			$data['result']=$this->announcement_model->get_record($this->uri->segment(4));
		}
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('announcement_add',$data);
		$this->load->view('comman/footer');	
	}
	function insertrecord(){
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
    		$data['contain']=$this->input->post('contain');	
			$data['page_title']		=	$this->input->post('page_title');
			$data['page_type']='announcement';
			$new_date = date('Y-m-d', strtotime($this->input->post('timedt')));
			$data['date']=$new_date;
			if($this->input->post('mode')=="Add")
			{
				$data['create_date']	=	$nowdt;	
				$data['create_by']		=	$this->session->userdata['logged_in_school']['usercode'];	
				$country_code			=	$this->announcement_model->addItem($data,'gen_cms');
			}
			if($this->input->post('mode')=="Edit")
			{
				$data['update_date']	=	$nowdt;	
				$data['update_by']		=	$this->session->userdata['logged_in_school']['usercode'];
				$this->announcement_model->update($data,'gen_cms','gen_cms_code',$this->input->post('eid'));	
			}
			
		}
		header('Location: '.base_url().'index.php/announcement');
		exit;
	}
	
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->announcement_model->update($data,'gen_cms','gen_cms_code',$this->uri->segment(4));	
		
	}
	function deleterecord(){
		$this->announcement_model->deletercd($this->uri->segment(3));
	}


}


