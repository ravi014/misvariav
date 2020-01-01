<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class exam_mst extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('exam_mst_model','ObjM',TRUE);
   		
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
   		$this->load->helper('url');
		$this->load->helper('date');
			$this->load->library('form_validation');
		
 	}
	public function view($eid)
	{
		
		$data['standard']	=	$this->ObjM->get_stadard();
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('exam_mst_view',$data);
		$this->load->view('comman/footer');
	}
	
	function listing($val){
		
		$result=$this->ObjM->getAll();
		
		$det= $this->ObjM->getdet($val);
		for($i=0;$i<count($result);$i++)
		{	
			$r=$i+1;
           
			 if($result[$i]['status']=='Active'){
                   $currentst='Active';
                   $nm='Inactive';
            }
            else{
                   $currentst='Inactive';
                   $nm='Active';
            }
				
		$html.='<tr>
		
						<td>'.$r.'</td>
						<td>'.$det[0]['standard_name'].'</td> 
						<td>'.$det[0]['exam_title'].'</td> 
						<td>'.$result[$i]['subject_name'].'</td> 
						<td>'.$result[$i]['date_dt'].'</td> 
						<td>'.$result[$i]['start_time'].'</td> 
						<td>'.$result[$i]['end_time'].'</td>
						 <td>'.$result[$i]['min_marks'].'</td> 
					 <td>'.$result[$i]['max_marks'].'</td> 

						<td>
						<a href="'.base_url().'index.php/exam_mst/addnew/Edit/'.$result[$i]['id'].'/'.$det[0]['standard_code'].'" class="btn btn-info btn-sm" rel="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
								</td></tr>';
		}
		echo $html;
		
	}
	
	
	function listing_two($eid){
		
	$account_year_code=$this->ObjM->get_current_year();
		 $ac_yr=  $account_year_code[0]['account_year_code']; 
		
		$result=$this->ObjM->get_exam_detail($eid);
	
		$html=''; 
		for($i=0;$i<count($result);$i++)
		{	
			$r=$i+1;
           
			
		$html.='<tr>
		
						<td>'.$r.'</td>
						<td>'.$account_year_code[0]['yeanm'].'</td> 
						<td>'.$result[$i]['exam_title'].'</td> 
						
						<td><a href="#" value="'.$result[$i]['exam_code'].'" value1="'.$result[$i]['exam_type_code'].'" class="btn btn-primary detailbtn"  rel="tooltip" title="Detail">Detail</a> &nbsp;&nbsp;&nbsp;	
			<a class="btn btn-danger delrcd" rel="tooltip" title="Delete"  href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/Delete/'.$result[$i]['exam_code'].'/'.$result[$i]['standard_code'].'">Delete</a>
			</td></tr>';
		}
		echo $html;
		
	}
	
	
	function addnew($mode, $eid){
	
			$data['segment']=array('mode'=>$mode,'eid'=>$eid);
		
		if($mode=='Add'){
			$data['standard']	 =	$this->ObjM->get_standardnm($eid);
			$data['exam_type']	 =	$this->ObjM->get_exam_type();
			$data['subject']	 =  $this->ObjM->get_standard_subject($eid);
		}
		if($mode=='Edit'){
			$data['result']=$this->ObjM->get_record($eid);
		}
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('exam_mst_add',$data);
		$this->load->view('comman/footer');	
	}
	function insertrecord(){
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
		
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // 
			$stcode	 = $this->input->post('standard_code');	
			$this->form_validation->set_rules('subject_code', 'Subject', 'required');
			$this->form_validation->set_rules('date_dt', 'Exam Date', 'required');
			$this->form_validation->set_rules('start_time', 'Start Time', 'required');
			$this->form_validation->set_rules('end_time', 'End Time', 'required');
			$this->form_validation->set_rules('min_marks', 'Min Marks', 'required');
			$this->form_validation->set_rules('max_marks', 'Max MArks', 'required');
		
			if($this->input->post('mode')=="Add")
			{
				
				$this->form_validation->set_rules('exam_type_code', 'Exam Name', 'required');
			}
			
		if ($this->form_validation->run() == FALSE)
	 	{
		 	
	
		$this->addnew($this->input->post('mode'),$this->input->post('eid'));
	
		}
		
		else{
			
			$subject_code			=	$this->input->post('subject_code');
			$exam_date				=	$this->input->post('date_dt');
			$start_time				=	$this->input->post('start_time');
			$end_time				=	$this->input->post('end_time');
			$min_marks				=	$this->input->post('min_marks');
			$max_marks				=	$this->input->post('max_marks');
			$account_year_code=$this->ObjM->get_current_year();
			
			if($this->input->post('mode')=="Add")
			{
				$data=array();
				$data['standard_code']		=	$this->input->post('standard_code');
				$data['exam_type_code']		=	$this->input->post('exam_type_code');
				$data['account_year_code']	=   $account_year_code[0]['account_year_code']; 
				$data['create_date']		=	$nowdt;	
				$data['create_by']			=	$this->session->userdata['logged_in_school']['usercode'];	
				$data['master_code']		=	$this->session->userdata['logged_in_school']['master_code'];	
	
				$exam_code					=	$this->ObjM->addItem($data,'exam_master');
				$stcode	 					=	$this->input->post('eid');
					for($i=0;$i<count($subject_code);$i++){
						$data=array();
						$data['exam_code']			=	$exam_code;	
						$data['subject_code']		=	$subject_code[$i];
						$data['date_dt']			=	$exam_date[$i];
						$data['start_time']			=	$start_time[$i];
						$data['end_time']			=	$end_time[$i];
						$data['min_marks']			=	$min_marks[$i];
						$data['max_marks']			=	$max_marks[$i];
						$data['master_code']				=	$this->session->userdata['logged_in_school']['master_code'];	
						if($data['date_dt'] != ''){
						$id=$this->ObjM->addItem($data,'exam_details');
						}
					}
					/////////////////////////////////
			}
			if($this->input->post('mode')=="Edit")
			{
				
				$data['date_dt']			=	$exam_date;
				$data['start_time']			=	$this->input->post('start_time');
				$data['end_time']			=	$this->input->post('end_time');
				$data['min_marks']				=	$this->input->post('min_marks');
				$data['max_marks']				=	$this->input->post('max_marks');
				$this->ObjM->update($data,'exam_details','id',$this->input->post('eid'));	
				
			//exit;	
			}
			
	
			
		header('Location: '.base_url().'index.php/exam_mst/view/'.$stcode);
		exit;
			}
		
		}
	}
	
	function record_update(){
		$data=array();
			$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'exam_master','exam_code',$this->uri->segment(4));	
		
		header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/view/'.$this->uri->segment(5));
	}
	


}


