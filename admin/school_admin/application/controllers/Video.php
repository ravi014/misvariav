<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('video_model','ObjM',TRUE);
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('upload');
		$this->load->library('image_lib');
		   		$this->load->library('form_validation');

		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
 	}
	
	public function view($vid=null)
	{
		$data['result']		=	$this->ObjM->get_video_by_id($vid);
	
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('video_view',$data);
		$this->load->view('comman/footer');
	}
	
	
function addnew($mode=null,$eid=null)
	{
		$data['segment']=array('mode'=>$mode,'eid'=>$eid);
		
		$data['video']		=	$this->ObjM->get_video();
		if($mode=='Edit')
		{
			$data['result']		=	$this->ObjM->get_record($eid);
		}
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('video_add',$data);
		$this->load->view('comman/footer');	
	}
	
		// To check unique name in db for particular school
		public function name_check($str=null)
	{
		
		$result = $this->ObjM->get_video_name();
		
		for($i=0;$i<count($result);$i++) {
			
   		if ($str == $result[$i]['video_name'])
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
	
	if($this->input->post('video_name') != $original_value) {
   	
			  $is_unique =  '|callback_name_check';
	
	} else {
	 	
			  $is_unique =  '';
	}
		
			$this->form_validation->set_rules('video_name', 'Video Name', 'required|trim|xss_clean'.$is_unique);
	 $this->form_validation->set_rules('video_id', 'Video Gallery Name', 'required|trim|is_natural_no_zero');
	  $this->form_validation->set_rules('video_url', 'Video Url', 'required|prep_url|valid_url_format|url_exists');
	$this->form_validation->set_rules('video_dt', 'Video Date', 'required');
		$this->form_validation->set_rules('video_desc', 'Video Description','trim|xss_clean');
	

	
		if ($this->form_validation->run() == FALSE)
	 	{
		 	
		
		$this->addnew($this->input->post('mode'),$this->input->post('eid'));

		}
		
		else{
		
			$data['master_code']		=	$this->session->userdata['logged_in_school']['master_code'];
			$data['video_id']=data_filter($this->input->post('video_id'));	
    		$data['video_name']=data_filter($this->input->post('video_name'));
			$data['video_desc']=data_filter($this->input->post('video_desc'));	
			$new_date = strftime('%d-%m-%Y',strtotime($this->input->post('video_dt')));
			$data['video_dt']=$new_date;
			$data['video_url']=data_filter($this->input->post('video_url'));	
			
			$video_id=data_filter($this->input->post('video_id'));		
			$date1 = new DateTime($new_date);
			$data['year']	=	$date1->format('Y');
			$data['month']		=	$date1->format('m');
			if($_FILES['cover_img']['name']!='')
			{
					$config = array();
    				$config['upload_path'] 		= '../upload/img';
    				$config['allowed_types'] 	= 'gif|jpg|png';
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

					
					
					$rand=rand(100000,10000000);
					$fileName=$rand.$_FILES['cover_img']['name'];
					$string = $fileName;
					$lastDot = strrpos($string, ".");
					$fileName12 = str_replace(".", "", substr($string, 0, $lastDot)) . substr($string, $lastDot);
					$fileName=str_replace(" ","",$fileName12);
						
					
					
        			
					$vid = data_filter($this->input->post('video_id'));
					
					$string = data_filter($this->input->post('video_name'));
					$nma=substr($string, 0, 2);    
					$fileName='video_'.$this->session->userdata['logged_in_school']['master_code'].'_'.$vid.'_'.$nma.'_'.$fileName;
				
					
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
					
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					if(!$this->image_lib->resize()){ //Resize image
    					$this->image_lib->display_errors('<p>', '</p>');
					}
			}		
				
			if($this->input->post('mode')=="Add"){
				$data['create_date']	=	$nowdt;	
				$data['create_by']=$this->session->userdata['logged_in_school']['usercode'];	
			
				$video_code		=	$this->ObjM->addItem($data,'web_video_master');
				
				header('Location: '.base_url().'index.php/video/view/'.$video_id.'');
		exit;
		
			}
			if($this->input->post('mode')=="Edit"){
			
			$eid=data_filter($this->input->post('eid'));
		
		if($_FILES['cover_img']['name']!='')
			{
				 $old_cover_img=data_filter($this->input->post('old_path'));
		
		$path_to_file1 	=	'../upload/img/'.$old_cover_img;
		$path_to_file2 	= 	'../upload/img_thum/'.$old_cover_img;
		unlink($path_to_file1);
		unlink($path_to_file2);	
			}
			
				$data['update_date']	=	$nowdt;	
				$data['update_by']=$this->session->userdata['logged_in_school']['usercode'];
				$this->ObjM->update($data,'web_video_master','video_code',$eid);	
				$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Updated successfully.....");
				$video_code		=	$eid;	
			
			}
				header('Location: '.base_url().'index.php/video/view/'.$video_id.'');
				exit;
		}
			
			
		}
		
	}
	
		//To Change Status (Inactive or Delete)
	function record_update(){
		$data=array();
		
		$data['status']=$this->uri->segment(3);
		$video_id=$this->uri->segment(5);
		$this->ObjM->update($data,'web_video_master','video_code',$this->uri->segment(4));	
		if($this->uri->segment(3)=="Delete"){
		$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Deleted successfully.....");
		}
			header('Location: '.base_url().'index.php/video/view/'.$video_id.'');
		exit;
	}
	
	
	
	
	

}


