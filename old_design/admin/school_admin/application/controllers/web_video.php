<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class web_video extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('web_video_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('upload');
		$this->load->library('image_lib');
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
 	}
	public function index()
	{
		$data['result']		=	$this->web_video_model->getAll();
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('web_video_view',$data);
		$this->load->view('comman/footer');
	}
	
	
	function addnew(){
		
		if($this->uri->segment(3)=='Edit'){
			$data['result']		=	$this->web_video_model->get_record($this->uri->segment(4));
		}
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		
		$this->load->view('web_video_add',$data);
		$this->load->view('comman/footer');	
	}
	function insertrecord(){
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
    		$data['video_name']=$this->input->post('video_name');
			$data['video_desc']=$this->input->post('video_desc');	
			$new_date = date('Y-m-d', strtotime($this->input->post('timedt')));
			$data['video_dt']=$new_date;
			$data['video_url']=$this->input->post('video_url');	
			$timestamp = strtotime($new_date);
			$data['year']		=	date('Y', $timestamp);	
			
			
			if($_FILES['cover_img']['name'])
			{
					$config = array();
    				$config['upload_path'] 		= '../upload/img';
    				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
    				$config['max_size']      	= '0';
    				$config['overwrite']     	= FALSE;
				
					$_FILES['userfile']['name'] 		= 	$_FILES['cover_img']['name'];
        			$_FILES['userfile']['type'] 		= 	$_FILES['cover_img']['type'];
        			$_FILES['userfile']['tmp_name']		= 	$_FILES['cover_img']['tmp_name'];
        			$_FILES['userfile']['error']		= 	$_FILES['cover_img']['error'];
        			$_FILES['userfile']['size']			= 	$_FILES['cover_img']['size'];
					$image_info = getimagesize($_FILES['userfile']['tmp_name']);
					
					$image_width = $image_info[0];
					$image_height = $image_info[1];

					if($image_width > 400 || $image_height > 400){
						header('Location: '.base_url().'index.php/web_video/addnew/'.$this->input->post('mode').'/'.$this->input->post('eid').'/er');
						exit;
					} 
					
					$rand=rand(100000,10000000);
					$fileName=$rand.$_FILES['cover_img']['name'];
					$string = $fileName;
					$lastDot = strrpos($string, ".");
					$fileName12 = str_replace(".", "", substr($string, 0, $lastDot)) . substr($string, $lastDot);
					$fileName=str_replace(" ","",$fileName12);
					
        			$config['file_name'] = $fileName;
    				$this->upload->initialize($config);
    				$this->upload->do_upload();
					$data['cover_img']	=	$fileName;
					
				////resize image code////////
					$upload_data = $this->upload->data();
					$image_config["image_library"] = "gd2";
					$image_config["source_image"] = $upload_data["full_path"];
					$image_config['create_thumb'] = FALSE;
					$image_config['maintain_ratio'] = TRUE;
					$image_config['new_image'] = '../upload/img_thum/'.$fileName;
					$image_config['quality'] = "100%";
					$image_config['width'] = 200;
					$image_config['height'] = 200;
					
					//$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
					//$image_config['master_dim'] = ($dim > 0)? "height" : "width";
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					if(!$this->image_lib->resize()){ //Resize image
    					$this->image_lib->display_errors('<p>', '</p>');
					}
			}		
				
			if($this->input->post('mode')=="Add"){
				$data['create_date']	=	$nowdt;	
				$data['create_by']=$this->session->userdata['logged_in_school']['usercode'];	
				$video_code		=	$this->web_video_model->addItem($data,'video_master');
			}
			if($this->input->post('mode')=="Edit"){
				$data['update_date']	=	$nowdt;	
				$data['update_by']=$this->session->userdata['logged_in_school']['video_code'];
				$this->web_video_model->update($data,'video_master','video_code',$this->input->post('eid'));	
				
			}
			
			
			
			
		}
		header('Location: '.base_url().'index.php/web_video');
		exit;
	}
	
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->web_video_model->update($data,'video_master','video_code',$this->uri->segment(4));	
		
		header('Location: '.base_url().'index.php/web_video');
		exit;
		
	}
	
	
	
	
	

}


