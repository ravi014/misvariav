<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Division_mst extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
		$this->load->model('division_mst_model','ObjM',TRUE);
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('form_validation');
	
		
 	}
	
	
	public function view($eid=null)
	{
		
		$data['standard']		=	$this->ObjM->get_standard_all();
		
		$tot_div=$this->ObjM->get_countdiv($eid);
		
		$arr=array('Division A','Division A','Division B','Division C','Division D','Division E','Division F','Division G','Division H');
		$data['div_name']=$arr[$tot_div];
			
		$data['result']=$this->ObjM->get_standard_by_id($eid);
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('division_mst_view',$data);
		$this->load->view('comman/footer');
	}

	function listing($eid=null){
		
		$result=$this->ObjM->getAll($eid);
		
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
			
			$row=$i+1;
			
			$result1=$this->ObjM->get_standard_by_id($result[$i]['standard_code']);
			
			$html.='<tr>
					<td>'.$row.'</td>
					<td>'.$result1[0]['standard_name'].'</td>
					<td>'.$result[$i]['name'].'</td>
					
					<td>
					<div class="btn-group">
								<a href="#" data-toggle="dropdown" class="btn '.$btn.' dropdown-toggle"><i class="icon-cog"></i> '.$currentst.' <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-primary">
										<li><a class="statuschange" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/'.$nm.'/'.$result[$i]['division_code'].'">'.$nm.'</a></li>
										<li><a class="delrcd" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/Delete/'.$result[$i]['division_code'].'">Delete</a></li>

									</ul>
							</div>
					</td>
						
			</tr>';
		}
		echo $html; 	 	
	}
	
		
	function insertrecord(){
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
		
		$this->form_validation->set_rules('standard_code', 'Standard', 'required|trim|xss_clean');
		$this->form_validation->set_rules('name', 'Division', 'required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE)
	 	{
		 	
			$this->view($this->input->post('eid'));
		
		}
		else{
		
			$result		=	$this->ObjM->get_division_record(data_filter($this->input->post('standard_code')));
			$tot_div	=	$this->ObjM->get_countdiv(data_filter($this->input->post('standard_code')));
			$arr=array('Division A','Division A','Division B','Division C','Division D','Division E','Division F','Division G','Division H');
			$data['name']				=	$arr[$tot_div];
			
		
			$data['standard_code']	=	data_filter($this->input->post('standard_code'));
		
			$data['master_code']		=	$this->session->userdata['logged_in_school']['master_code'];
		
			
			$data['create_date']		=	$nowdt;	
			$data['create_by']			=	$this->session->userdata['logged_in_school']['usercode'];
				
			$division_code=$this->ObjM->addItem($data,'division_master');
					
	
		header('Location: '.base_url().'index.php/division_mst/view/'.$_POST['standard_code']);
		exit;
		}
			
		}
	}
	
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'division_master','division_code',$this->uri->segment(4));	
		
	}
	


}


