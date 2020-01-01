<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_type extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		$this->load->model('user_type_model','ObjM',TRUE); 
	
   		$this->load->helper('url');
		$this->load->helper('date');
			$this->load->library('form_validation');
	
 	}
	
	public function index()
	{
	
	$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('user_type_view');
		$this->load->view('comman/footer');
	}
	
	
	function listing(){
		$result=$this->ObjM->getAll();
		
		$html='';
		for($i=0;$i<count($result);$i++)
		{	
			$r=$i+1;
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
		
			
		$html.='<tr>
		
						<td>'.$r.'</td>
						<td>'.$result[$i]['name'].'</td> 
						<td>
							<div class="btn-group">
								<a href="#" data-toggle="dropdown" class="btn '.$btn.' dropdown-toggle"><i class="icon-cog"></i> '.$currentst.' <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-primary">
										<li><a class="statuschange" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/'.$nm.'/'.$result[$i]['user_type_id'].'">'.$nm.'</a></li>
										<li><a href="'.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$result[$i]['user_type_id'].'">Edit</a></li>
										<li><a class="delrcd" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/Delete/'.$result[$i]['user_type_id'].'">Delete</a></li>
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
		$this->load->view('user_type_view',$data);
		$this->load->view('comman/footer');
	}
	
		public function name_check($str)
	{
		
		$result = $this->ObjM->get_user_type_name();
		
		for($i=0;$i<count($result);$i++) {
			
   		if ($str == $result[$i]['name'])
		{
			
			$this->form_validation->set_message('name_check', 'The %s field can not be the word "'.$str.'". It must contain a unique value.');
			return FALSE;
			}
			
		}
		return true;
		
	}	
	//To Add or Edit data
function insertrecord(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();

$original_value=$this->input->post('old_name');
	
	if($this->input->post('name') != $original_value) {
   	
			  $is_unique =  '|callback_name_check';
	
	} else {
	 	
			  $is_unique =  '';
	}
$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean'.$is_unique);
	 	
		
		if ($this->form_validation->run() == FALSE)
	 	{
		 	
			$this->addnew($this->input->post('mode'),$this->input->post('eid'));
		
		}
		else{
	
			$data['name']				=	data_filter($this->input->post('name'));
			$data['master_code']		=	$this->session->userdata['logged_in_school']['master_code'];
		
		
			if($this->input->post('mode')=="Add")
			{
				$data['create_by']			=	$this->session->userdata['logged_in_school']['usercode'];
				$data['create_date']		=	$nowdt;	
				$user_type_id		=	$this->ObjM->addItem($data,'user_custom_type_master');	
			}
			if($this->input->post('mode')=="Edit")
			{
				$data['update_by']		=	$this->session->userdata['logged_in_school']['usercode'];
				$data['update_date']	=	$nowdt;	
				 $this->ObjM->update($data,'user_custom_type_master','user_type_id',$this->input->post('eid'));		
			
			$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Updated successfully.....");

			$user_type_id		=	$this->input->post('eid');
			}
			
			header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Add');
			exit;
		}
		}
			
		}
	
		//To Change Status (Inactive or Delete)
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'user_custom_type_master','user_type_id',$this->uri->segment(4));	
	if($this->uri->segment(3)=="Delete"){
		$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Deleted successfully.....");
	}
	header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Add');
		
	}
	
}

