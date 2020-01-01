<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class header_img extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('header_img_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->helper('breadcrumb');
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
 	}
	public function index()
	{
		
		
		$data['result']		=	$this->header_img_model->getAll();
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('header_img_view',$data);
		$this->load->view('comman/footer');
	}
	
	
	function addnew(){
		
		
		
		if($this->uri->segment(3)=='Edit'){
			$data['result']		=	$this->header_img_model->get_record($this->uri->segment(4));
			
		}
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('header_img_add',$data);
		$this->load->view('comman/footer');	
	}
	function insertrecord(){
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds 
			$data = array();
			
			$files = $_FILES;
			$config = array();
    		$config['upload_path'] = '../upload/img';
    		$config['allowed_types'] = 'gif|jpg|png|jpeg';
    		$config['max_size']      = '0';
    		$config['overwrite']     = FALSE;
				
			if($files['img']['name']){
				$_FILES['userfile']['name'] = $files['img']['name'];
        		$_FILES['userfile']['type'] = $files['img']['type'];
        		$_FILES['userfile']['tmp_name']= $files['img']['tmp_name'];
        		$_FILES['userfile']['error']= $files['img']['error'];
        		$_FILES['userfile']['size']= $files['img']['size']; 
				$image_info = getimagesize($_FILES['userfile']['tmp_name']);
				$image_width = $image_info[0];
				$image_height = $image_info[1];
				
				if($image_width < 1400 || $image_height < 300){
					header('Location: '.base_url().'index.php/header_img/addnew/Add/er');
					exit;
				}
				
				$rand=rand(100000,100000000);
				$fileName		=	$rand.$_FILES['img']['name'];
				$fileName 		= 	str_replace(" ","",$fileName);
        		$config['file_name'] = $fileName;
    			$this->upload->initialize($config);
    			$this->upload->do_upload();
				$data['img_path']	=	$fileName;
					
				
    				
					////resize image code////////
				$upload_data = $this->upload->data();
				$image_config["image_library"] = "gd2";
				$image_config["source_image"] = $upload_data["full_path"];
				$image_config['create_thumb'] = FALSE;
				$image_config['maintain_ratio'] = TRUE;
				$image_config['new_image'] = '../upload/img_thum/'.$fileName;
				$image_config['quality'] = "100%";
				$image_config['width'] = 250;
				$image_config['height'] = 200;
					
				//$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
				//$image_config['master_dim'] = ($dim > 0)? "height" : "width";
				
				$this->load->library('image_lib');
				$this->image_lib->initialize($image_config);
				if(!$this->image_lib->resize()){ //Resize image
    				$this->image_lib->display_errors('<p>', '</p>');
				}		
			}	
 
			$data['create_date']	=	$nowdt;	
			$data['create_by']		=	$this->session->userdata['logged_in_school']['usercode'];	
			$this->header_img_model->update($data,'gen_cms','gen_cms_code',$this->input->post('eid'));		
				
		}
		header('Location: '.base_url().'index.php/header_img');
		exit;
	}
	
	function deleterecord(){
		$result			=	$this->header_img_model->get_image_name($this->uri->segment(3));
		$path_to_file1 	=	'./upload/img/'.$result[0]['img_path'];
		$path_to_file2 	= 	'./upload/img_thum/'.$result[0]['img_path'];
		unlink($path_to_file1);
		unlink($path_to_file2);
		$this->header_img_model->deletercd($this->uri->segment(3));
	}
	
	
	
	

}


