<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class transfer_certificate_issued extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
		
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
		$this->load->model('transfer_certificate_issued_model','ObjM',TRUE); 
		
   		$this->load->helper('url');
		
		$this->load->helper('date');
		
		$this->load->library('upload');
		
		$this->load->library('image_lib');
		
		$this->load->library('form_validation');
		
 	}
	
public function index()
{
	
		$this->load->view('comman/topheader');
		
		$this->load->view('comman/header');
		
		$this->load->view('transfer_certificate_issued_view');
		
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
		
			if($result[$i]['file_path']!=''){ 
				$slc='<a href="'.main_url().'upload/slc/'.$result[$i]['file_path'].'" target="_blank">View</a>';
			}
			else{
				$slc='';
			}
			
		$html.='<tr>
		
						<td>'.$r.'</td>
						<td>'.$result[$i]['slc_no'].'</td> 
						<td>'.$result[$i]['f_name'].' '.$result[$i]['m_name'].' '.$result[$i]['l_name'].'</td>						
						<td>'.$slc.'</td>
						<td>
							<div class="btn-group">
								<a href="#" data-toggle="dropdown" class="btn '.$btn.' dropdown-toggle"><i class="icon-cog"></i> '.$currentst.' <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-primary">
										<li><a class="statuschange" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/'.$nm.'/'.$result[$i]['id'].'">'.$nm.'</a></li>
										<li><a class="delrcd" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/Delete/'.$result[$i]['id'].'">Delete</a></li>
									</ul>
							</div>
</td>
						
					</tr>';
		}
		
		echo $html;
		 	
}
	
	function addnew($mode,$eid)
	{
		$data['segment']=array('mode'=>$mode,'eid'=>$eid);
		
		if($mode=='Edit')
		{
		
			$data['result']		=	$this->ObjM->get_record($eid);

		}
	   
		$this->load->view('comman/topheader');
		
		$this->load->view('comman/header');
		
		$this->load->view('transfer_certificate_issued_add',$data);
		
		$this->load->view('comman/footer');
	}
	
	
	

	//To Add or Edit data
function insertrecord(){
	
if ($this->input->server('REQUEST_METHOD') === 'POST')
{
			
			$data = array();
	
			$this->form_validation->set_rules('f_name', 'First Name','required|trim|xss_clean');
			
			$this->form_validation->set_rules('m_name', 'Middle Name','required|trim|xss_clean');
			
			$this->form_validation->set_rules('l_name', 'Last Name','required|trim|xss_clean');
			
			$this->form_validation->set_rules('slc_no', 'SLC No','required|trim|xss_clean');
		
			if ($this->form_validation->run() == FALSE)
			{


				$this->addnew($this->input->post('mode'),$this->input->post('eid'));


			}else{
		
				$data['f_name']		=	data_filter($this->input->post('f_name'));

				$data['m_name']		=	data_filter($this->input->post('m_name'));

				$data['l_name']		=	data_filter($this->input->post('l_name'));

				$data['slc_no']		=	data_filter($this->input->post('slc_no'));
			
					$files = $_FILES;
					$config = array();
					$config['upload_path'] 	 = '../upload/slc';
					$config['allowed_types'] = 'pdf';
					$config['max_size']      = '0';
					$config['overwrite']     = FALSE;

					if($files['file']['name']){
						
						$_FILES['userfile']['name'] = $files['file']['name'];

						$_FILES['userfile']['type'] = $files['file']['type'];
						
						$_FILES['userfile']['tmp_name']= $files['file']['tmp_name'];
						
						$_FILES['userfile']['error']= $files['file']['error'];
						
						$_FILES['userfile']['size']= $files['file']['size']; 


						$fileName="slc_".date('Y')."_".$_FILES['file']['name'];
						
						$fileName = str_replace(" ","_",$fileName);
						
						$config['file_name'] = $fileName;
						
						$this->upload->initialize($config);
						
						$this->upload->do_upload();
						
						$data['file_path']	=	$fileName;

					}	
				
				
				
			if($this->input->post('mode')=="Add")
			{
				
				$data['create_date']		=	date('Y-m-d');	
				
				$id		=	$this->ObjM->addItem($data,'slc_mater');	
			}
				
			if($this->input->post('mode')=="Edit")
			{
				
				$data['update_date']	=	$date('Y-m-d');	
				
				$this->ObjM->update($data,'slc_mater','id',$this->input->post('eid'));	
				
				$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Updated successfully.....");
				
				$id		=	$this->input->post('eid');
				
			}
				
			if($this->input->post('mode')=="Add")
			{

				header('Location: '.base_url().'index.php/'.$this->uri->segment(1));
				exit;
			}

			if($this->input->post('mode')=="Edit")
			{
				header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$id);
				exit;
			}
			
		}
			
			
	}
}
	
	

		//To Change Status (Inactive or Delete)
	function record_update(){
		
		$data=array();
		
		$data['status']=$this->uri->segment(3);
		
		$this->ObjM->update($data,'slc_mater','id',$this->uri->segment(4));
		
		$sts=$this->uri->segment(3);
		
		if($this->uri->segment(3)=="Delete"){
			
			$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Deleted successfully.....");
			
		}
		
		header('Location: '.base_url().'index.php/'.$this->uri->segment(1));
		
	}
	
}

