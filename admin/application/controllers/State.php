<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State extends CI_Controller {

function __construct()
 	{
   		parent::__construct();
		if(!$this->session->userdata('logged_in_user')){header('Location: '.base_url().'index.php/login');exit;}
		$this->load->model('state_model','ObjM',TRUE); 
		$this->load->library('form_validation');

 	}
	
public function index()
	{
	
	$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('state_view');
		$this->load->view('comman/footer');
	}
	
//To list all active and Inactive data	
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
	
			$result1=$this->ObjM->show_where("country",array('status !=' => 'Delete','countryid'=> ''.$result[$i]['countryid'].''));
	
			
		$html.='<tr>
		
						<td>'.$r.'</td>
						<td>'.$result1[0]['name'].'</td> 
						<td>'.$result[$i]['name'].'</td> 
						<td>
							<div class="btn-group">
								<a href="#" data-toggle="dropdown" class="btn '.$btn.' dropdown-toggle"><i class="icon-cog"></i> '.$currentst.' <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-primary">
										<li><a class="statuschange" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/'.$nm.'/'.$result[$i]['stateid'].'">'.$nm.'</a></li>
										<li><a href="'.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$result[$i]['stateid'].'">Edit</a></li>
										<li><a class="delrcd" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/Delete/'.$result[$i]['stateid'].'">Delete</a></li>
									</ul>
							</div>
</td>
						
					</tr>';
		}
		
		echo $html;
		 	
	}
	
//To display Add or Edit form
	function addnew($mode=null,$eid=null)
	{
			$data['segment']	=	array('mode'=>$mode,'eid'=>$eid);
		
			$data['country']	=	$this->ObjM->show_where("country",array('status !=' => 'Delete'));
		
		if($mode=='Edit')
		{
			
			$data['result']		=	$this->ObjM->get_record($eid);
			
		}
	   
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('state_view',$data);
		$this->load->view('comman/footer');
	}
	
	
//To submit Add or Edit data into database
function insertrecord(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$now		 =	time();
			$nowdt		 =	unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data 		 =	array();

$original_value=$this->input->post('old_name');
	
	if($this->input->post('name') != $original_value) {
   	
			  $is_unique =  '|is_unique[state.name]';
	
	} else {
	 	
			  $is_unique =  '';
	}
	

	 	

			$this->form_validation->set_rules('name', 'Name', 'required|trim'.$is_unique);
 	 $this->form_validation->set_rules('countryid', 'Country', 'required|trim|is_natural_no_zero');
	
		
		if ($this->form_validation->run() == FALSE)
	 	{
		 	
			$this->addnew($this->input->post('mode'),$this->input->post('eid'));
		
		}
		else{
	
			$data['name']				=	data_filter($this->input->post('name'));
			
			$data['countryid']			=	data_filter($this->input->post('countryid'));
		
		if($this->input->post('mode')=="Add")
			{
			$data['create_date']		=	$nowdt;	
			$stateid					=	$this->ObjM->addItem($data,'state');	
			}
			if($this->input->post('mode')=="Edit")
			{
			$data['update_date']		=	$nowdt;	
			$this->ObjM->update($data,'state','stateid',$this->input->post('eid'));		
			
			$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Updated successfully.....");

			$stateid		=	$this->input->post('eid');
			}
			
			header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Add');
			exit;
		}
		}
			
		}
	
		//To Change Status (Inactive or Delete)
	function record_update(){
		$data				=	array();
		$data['status']		=	$this->uri->segment(3);
		$this->ObjM->update($data,'state','stateid',$this->uri->segment(4));	
		
		if($this->uri->segment(3)=="Delete"){
		$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Deleted successfully.....");
		}
	header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Add');
		exit;
	}
	
}

