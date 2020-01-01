<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Holiday extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('holiday_model','ObjM',TRUE);
   		
	if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
 		
		
 	}
	public function index()
	{
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('holiday_view');
		$this->load->view('comman/footer');
	}
	function listing(){
		$result=$this->ObjM->getAll();
		for($i=0;$i<count($result);$i++){
			
			
			if($result[$i]['status']=='Active'){
                   $currentst='Active';
                   $nm='Inactive';
				   $btn="btn-success";
				   
            }
            else{
                   $currentst='Inactive';
                   $nm='Active';
				   $btn="btn-danger";
            }
			
			$start_date =$result[$i]['start_date'];
			if($result[$i]['type']=='multi'){
				$end_date = $result[$i]['end_date']; 
			}
			else{
				$end_date = '-'; 
			}
			
			
			$row=$i+1;
			$html.='<tr>
					<td>'.$row.'</td>
					<td>'.$result[$i]['title'].'</td>
					<td>'.$result[$i]['type'].'</td>
					<td>'.$start_date.'</td>
					<td>'.$end_date.'</td>
					<td>'.$result[$i]['description'].'</td>
					<td>		
					<div class="btn-group">
								<a href="#" data-toggle="dropdown" class="btn '.$btn.' dropdown-toggle"><i class="icon-cog"></i> '.$currentst.' <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-primary">
										<li><a class="statuschange" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/'.$nm.'/'.$result[$i]['holiday_code'].'">'.$nm.'</a></li>
										<li><a href="'.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$result[$i]['holiday_code'].'">Edit</a></li>
										<li><a class="delrcd" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/Delete/'.$result[$i]['holiday_code'].'">Delete</a></li>
									</ul>
							</div>
							
							
							</td>
						
			</tr>';
		}
		echo $html; 	 	
	}
	
	function addnew($mode=null,$eid=null)
	{
		$data['segment']=array('mode'=>$mode,'eid'=>$eid);
		if($mode=='Edit')
		{
		
		$data['result']		=	$this->ObjM->get_record($eid);
			
		}
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('holiday_add',$data);
		$this->load->view('comman/footer');	
	}
	
	function insertrecord(){
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
			
	$this->form_validation->set_rules('title', 'Title', 'required|trim|xss_clean');
	$this->form_validation->set_rules('start_date', 'Date', 'required');
		if($this->input->post('type')=='multi'){
	$this->form_validation->set_rules('from', 'Date', 'required');
	$this->form_validation->set_rules('to', 'Date', 'required');

		}
		if ($this->form_validation->run() == FALSE)
	 	{
		$this->addnew($this->input->post('mode'),$this->input->post('eid'));
		}
		
		else{
			
			$data['title']			=		data_filter($this->input->post('title'));
			$data['description']	=		data_filter($this->input->post('description'));
			$data['type']			=		data_filter($this->input->post('type'));
		$data['master_code']		=	$this->session->userdata['logged_in_school']['master_code'];
				
		if($this->input->post('type')=='multi'){
				$data['start_date']		=	data_filter($this->input->post('from'));
				$data['end_date']		=	data_filter($this->input->post('to'));
			}
			else{
				$data['start_date']		=	data_filter($this->input->post('start_date'));
				$data['end_date']		=	'';
			}
			
			if($this->input->post('mode')=="Add"){
				$data['create_date']	=	$nowdt;	
				$data['create_by']=$this->session->userdata['logged_in_school']['usercode'];	
				$hostel_stud_code=$this->ObjM->addItem($data,'holiday_master');
			}
			if($this->input->post('mode')=="Edit"){
				$data['update_date']	=	$nowdt;	
				$data['update_by']=$this->session->userdata['logged_in_school']['usercode'];
				$this->ObjM->update($data,'holiday_master','holiday_code',$this->input->post('eid'));	
				
			}
			
		
		header('Location: '.base_url().'index.php/holiday');
		exit;
	}
		}
	}
	
//To Change Status (Inactive or Delete)
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'holiday_master','holiday_code',$this->uri->segment(4));	
	if($this->uri->segment(3)=="Delete"){
		$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Deleted successfully.....");
	}
	header('Location: '.base_url().'index.php/'.$this->uri->segment(1));
	exit;	
	}
	
}


