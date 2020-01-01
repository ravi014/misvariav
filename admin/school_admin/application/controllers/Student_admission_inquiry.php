<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_admission_inquiry extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		
		if(!$this->session->userdata('logged_in_school')){
			header('Location: '.main_url().'index.php/login');
			exit;
		}
		
		$this->load->model('student_admission_inquiry_model','',TRUE);
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
			
 	}
	public function index()
	{
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('student_admission_inquiry_view');
		$this->load->view('comman/footer');
	}
	function listing(){
		
		$result=$this->student_admission_inquiry_model->getAll();
		
		$data="";
		
		$rowno=0;
		for($i=0;$i<count($result);$i++)
		{
			$rowno++;

			$r=$i+1;
			
			$p="";

			$p.='<tr>
					<td>'.$r.'</td>
					<td>'.$result[$i]['fname'].'  '.$result[$i]['midname'].' '.$result[$i]['surname'].'</td>
					<td>'.$result[$i]['address'].'</td>
					
					<td >'.$result[$i]['contact'].'</td>	
					
					<td >'.$result[$i]['dob'].'</td>

					<td >'.$result[$i]['fatheroccu'].'</td>

					<td >'."<a href='".base_url()."index.php/student_admission_inquiry/deleterecord/".$result[$i]['e_id']."' class='btn btn-danger btn-sm delrcd' rel='tooltip' title='Delete' ><i class='fa fa-trash'></i></a>".'</td>		

					</tr>';

			$rowcount=$i+1;	
			
			$data.='["'.$rowcount.'","'.$result[$i]['e_id'].'","'.$p.'","'.$r.'"],';
		}
		echo substr($data,0,-1);
		 	 	
	}

	
		function view($eid)
		{
		
		$data['result']	=	$this->ObjM->get_record($eid);	
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('student_dtl_inquiry_view',$data);
		$this->load->view('comman/footer');	
	}
	

	function deleterecord(){
		
		$this->student_admission_inquiry_model->deletercd($this->uri->segment(3));
		
	}
	
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'student_registration','sid',$this->uri->segment(4));	
		
	}

}


