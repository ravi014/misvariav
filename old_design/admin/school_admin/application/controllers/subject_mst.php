<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class subject_mst extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('subject_mst_model','ObjM',TRUE);
   		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
	
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('form_validation');
	}
	
	public function view($eid,$eid1)
	{
		
		$data['standard']		=	$this->ObjM->get_standard_all();
	
		
		$data['result']=$this->ObjM->get_record($eid1);
		
		$data['result1']=$this->ObjM->get_standard_by_id($eid);
			
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('subject_mst_view',$data);
		$this->load->view('comman/footer');
	}
	
	function listing($eid){
		
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
					<td>'.$result[$i]['subject_id'].'</td>
					<td>'.$result[$i]['subject_name'].'</td>
					
							<td>
							<div class="btn-group">
								<a href="#" data-toggle="dropdown" class="btn '.$btn.' dropdown-toggle"><i class="icon-cog"></i> '.$currentst.' <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-primary">
										<li><a class="statuschange" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/'.$nm.'/'.$result[$i]['subject_code'].'">'.$nm.'</a></li>
										<li><a href="'.base_url().'index.php/'.$this->uri->segment(1).'/view/'.$result[$i]['standard_code'].'/'.$result[$i]['subject_code'].'">Edit</a></li>

										<li><a class="delrcd" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/Delete/'.$result[$i]['subject_code'].'">Delete</a></li>

									</ul>
							</div>
</td>
						
					</tr>';
		}
		
		echo $html;
		 	
	}
	
	

	//To Add or Edit data
function insertrecord(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();


$this->form_validation->set_rules('standard_code', 'Standard', 'required|trim|xss_clean');
$this->form_validation->set_rules('subject_name', 'Subject', 'required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE)
	 	{
		 	
			$this->view($this->input->post('eid'));
		
		}
		else{
	
		$data['standard_code']=$this->input->post('standard_code');
			$data['subject_id']=$this->input->post('subject_id');	
    		$data['subject_name']=$this->input->post('subject_name');	
		$data['master_code']=$this->session->userdata['logged_in_school']['master_code'];	

		if($this->input->post('sc')!='') {
			
		$data['update_by']		=	$this->session->userdata['logged_in_school']['usercode'];
		$data['update_date']	=	$nowdt;	
		 $this->ObjM->update($data,'subject_master','subject_code',$this->input->post('sc'));		
			
			$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Updated successfully.....");

			$subject_code		=	$this->input->post('sc');	
			
			}
			else{
				
				
				$data['create_date']	=	$nowdt;	
				$data['create_by']=$this->session->userdata['logged_in_school']['usercode'];	
		
			$subject_code=$this->ObjM->addItem($data,'subject_master');
		
				}
		
		
		
		header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/view/'.$_POST['standard_code']);
			exit;
			}
		
	}	
	}
			//To Change Status (Inactive or Delete)
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'subject_master','subject_code',$this->uri->segment(4));	
	

	}
	

}


