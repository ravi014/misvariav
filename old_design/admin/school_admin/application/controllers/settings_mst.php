<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class settings_mst extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('settings_mst_model','ObjM',TRUE);
   		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		$this->load->library('upload');
		$this->load->library('image_lib');
	   $this->load->library('form_validation');

 	}
	
	public function index()
	{
		
		$data['result']=$this->ObjM->getall();
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('settings_mst_view',$data);
		$this->load->view('comman/footer');	
	}
	
	
	
	public function insert()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
	
	
		$this->form_validation->set_rules('lecture', 'Lecture', 'required|numeric');
		$this->form_validation->set_rules('mobile', 'Mobile No.', 'regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('name', 'School name', 'required|trim');
	 	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
	 	$this->form_validation->set_rules('phone', 'Phone No.', 'numeric');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
	 	$this->form_validation->set_rules('url', 'URL', 'required|prep_url');
	 
		if ($this->form_validation->run() == FALSE)
	 	{
		 
			$this->view();
		
		}else{
			
			$data['name']			=	data_filter($this->input->post('name'));
			$data['email']			=	data_filter($this->input->post('email'));
			$data['mobile']			=	$this->input->post('mobile');
			$data['phone']			=	data_filter($this->input->post('phone'));
			$data['address']		=	data_filter($this->input->post('address'));	
			$data['lecture']		=	data_filter($this->input->post('lecture'));
			$data['url']			=	$this->input->post('url');	
		
	
$master_code=$this->session->userdata['logged_in_school']['master_code'];

			$data['master_code']	=	$master_code;
			
		if($_FILES['school_img']['name']!=''){
				$data['school_img']   =	$this->upload_img($_FILES['school_img']);
				
				 $old_path=$this->input->post('old_path');

			$path_to_file1 	=	'../upload/img/'.$old_path;
		$path_to_file2 	= 	'../upload/img_thum/'.$old_path;
		unlink($path_to_file1);
		unlink($path_to_file2);
		
			}
			
			
				
		if($_FILES['school_logo']['name']!=''){
				$data['school_logo']   =	$this->upload_img1($_FILES['school_logo']);
			
			 $old_path1=$this->input->post('old_path1');

			$path_to_file1 	=	'../upload/img/'.$old_path1;
		$path_to_file2 	= 	'../upload/img_thum/'.$old_path1;
		unlink($path_to_file1);
		unlink($path_to_file2);
		
			}
			
			
				
				$res=$this->ObjM->getall();
if(count($res)==0){
				$data['create_by']		=	$this->session->userdata['logged_in_school']['usercode'];
				$data['create_date']	=	$nowdt;	
		$id=$this->ObjM->addItem($data,'settings');

	} 
	else{
		
				$data['update_by']		=	$this->session->userdata['logged_in_school']['usercode'];
				$data['update_date']	=	$nowdt;	
		
				$this->ObjM->update($data,'settings','master_code',$master_code);
		$this->session->set_flashdata("show_msg", " <b>Sucess</b> settings_mst Updated successfully.....");
	
	}
	header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'');
			exit;
		}
		
	}
	
	
	}
	
	protected function upload_img($file){
					$config = array();
					$config['upload_path'] 				= 	'../upload/img/';
					$config['allowed_types'] 			= 	'gif|jpg|png|jpeg';
					$config['max_size']      			= 	'0';
					$config['overwrite']     			= 	TRUE;
					$_FILES['userfile']['name'] 		= 	$file['name'];
					$_FILES['userfile']['type'] 		= 	$file['type'];
					$_FILES['userfile']['tmp_name']		= 	$file['tmp_name'];
					$_FILES['userfile']['error']		= 	$file['error'];
					$_FILES['userfile']['size']			= 	$file['size'];
					$rand=rand(100000,10000000);
					$fileName=$rand.$file['name'];
					$fileName = str_replace(" ","",$fileName);
					
				$fileName='school_img_'.$this->session->userdata['logged_in_school']['master_code'].'_'.$fileName;
					
					
					$config['file_name'] = $fileName;
					$this->upload->initialize($config);
					$this->upload->do_upload();
				$data['school_img']	=	$fileName;

					$upload_data = $this->upload->data();
					$image_config["image_library"] = "gd2";
					 $image_config["source_image"] = $upload_data["full_path"];
				$image_config['create_thumb'] = FALSE;
					$image_config['maintain_ratio'] = TRUE;
					$image_config['new_image'] = '../upload/img_thum/'.$fileName;
					$image_config['quality'] = "80%";
					$image_config['width'] = 140;
					$image_config['height'] = 140;
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$this->image_lib->resize();
					return	$fileName;		
				
	}

	protected function upload_img1($file){
					$config = array();
					$config['upload_path'] 				= 	'../upload/img/';
					$config['allowed_types'] 			= 	'gif|jpg|png|jpeg';
					$config['max_size']      			= 	'0';
					$config['overwrite']     			= 	TRUE;
					$_FILES['userfile']['name'] 		= 	$file['name'];
					$_FILES['userfile']['type'] 		= 	$file['type'];
					$_FILES['userfile']['tmp_name']		= 	$file['tmp_name'];
					$_FILES['userfile']['error']		= 	$file['error'];
					$_FILES['userfile']['size']			= 	$file['size'];
					$rand=rand(100000,10000000);
					$fileName=$rand.$file['name'];
					$fileName = str_replace(" ","",$fileName);
					
				$fileName='school_logo_'.$this->session->userdata['logged_in_school']['master_code'].'_'.$fileName;
					
					
					$config['file_name'] = $fileName;
					$this->upload->initialize($config);
					$this->upload->do_upload();
				$data['school_logo']	=	$fileName;

					$upload_data = $this->upload->data();
					$image_config["image_library"] = "gd2";
					 $image_config["source_image"] = $upload_data["full_path"];
				$image_config['create_thumb'] = FALSE;
					$image_config['maintain_ratio'] = TRUE;
					$image_config['new_image'] = '../upload/img_thum/'.$fileName;
					$image_config['quality'] = "80%";
					$image_config['width'] = 140;
					$image_config['height'] = 140;
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					$this->image_lib->resize();
					return	$fileName;		
				
	}
}


