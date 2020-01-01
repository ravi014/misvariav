<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
		
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
		$this->load->model('event_model','ObjM',TRUE); 
   		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('upload');
		$this->load->library('image_lib');
			
 	}
	
	public function index()
	{
	
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('event_view');
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
		
			$result2	=	$this->ObjM->get_record_dt($result[$i]['event_code']);	
			
			$t=count($result2);
			
			if($result[$i]['cover_img']!=''){ 
				$img_path='<img src="'.main_url().'upload/img_thum/'.$result[$i]['cover_img'].'" height="50" class="img img-circle" />';
			}
			else{
			$img_path='';
			}
			
		$html.='<tr>
		
						<td>'.$r.'</td>
						<td>'.$img_path.'</td>
						<td>'.$result[$i]['event_title'].'</td>						
						<td>'.$result[$i]['event_dt'].'</td> 
						<td>'.$t.'<br/></td>
						<td>
							<div class="btn-group">
								<a href="#" data-toggle="dropdown" class="btn '.$btn.' dropdown-toggle"><i class="icon-cog"></i> '.$currentst.' <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-primary">
										<li><a class="statuschange" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/'.$nm.'/'.$result[$i]['event_code'].'">'.$nm.'</a></li>
										<li><a href="'.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$result[$i]['event_code'].'">Edit</a></li>
										<li><a class="delrcd" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/Delete/'.$result[$i]['event_code'].'">Delete</a></li>
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
			$data['result2']	=	$this->ObjM->get_record_dt($eid);

		}
	 
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('event_add',$data);
		$this->load->view('comman/footer');
	}
	

	//To Add or Edit data
function insertrecord(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
		
	$original_value=$this->input->post('old_name');
	
	if($this->input->post('event_title') != $original_value) {
   	
			  $is_unique =  '|callback_username_check';
	
	} else {
	 	
			  $is_unique =  '';
	}
	
	$this->form_validation->set_rules('event_title', 'Event Title', 'required|trim|xss_clean'.$is_unique);
	$this->form_validation->set_rules('event_dt', 'Event Date', 'required');
	
		if ($this->form_validation->run() == FALSE)
	 	{
		 	
	
		$this->addnew($this->input->post('mode'),$this->input->post('eid'));
	
		}
		
		else{
		
			$data['event_title']		=	data_filter($this->input->post('event_title'));
			$data['event_dt']			= strftime('%d-%m-%Y',strtotime($this->input->post('event_dt')));	
			$data['master_code']		=	$this->session->userdata['logged_in_school']['master_code'];
			$data['year'] 				=	strftime('%Y',strtotime($this->input->post('event_dt')));
			if($_FILES['cover_img']['name']!='')
			{
					$config = array();
    				$config['upload_path'] 				= 		'../upload/img';
    				$config['allowed_types'] 			= 		'gif|jpg|png';
    				$config['max_size']      			= 		'0';
    				$config['overwrite']     			= 		TRUE;
				
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
					
				
					
					$string = data_filter($this->input->post('event_title'));
					$nma=substr($string, 0, 2);    
					$fileName='event_'.$this->session->userdata['logged_in_school']['master_code'].'_'.$nma.'_'.$fileName;
					
					
        			$config['file_name'] = $fileName;
    				$this->upload->initialize($config);
    				$this->upload->do_upload();
					$data['cover_img']	=	$fileName;
					
					////////////
						$upload_data = $this->upload->data();
						$image_config["image_library"] = "gd2";
						$image_config["source_image"] = $upload_data["full_path"];
						$image_config['create_thumb'] = FALSE;
						$image_config['maintain_ratio'] = TRUE;
						$image_config['new_image'] = '../upload/img_thum/'.$fileName;
						$image_config['quality'] = "100%";
						$image_config['width'] = 120;
						$image_config['height'] = 120;
						
						$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
						$image_config['master_dim'] = ($dim > 0)? "height" : "width";
						$this->load->library('image_lib');
						$this->image_lib->initialize($image_config);
						if(!$this->image_lib->resize()){ //Resize image
							$this->image_lib->display_errors('<p>', '</p>');
						}
					////////////
			
		}
	
			if($this->input->post('mode')=="Add")
			{
				//add ny hardik
				
				$data['create_by']			=	$this->session->userdata['logged_in_school']['usercode'];
				$data['create_date']		=	$nowdt;	
				$event_code		=	$this->ObjM->addItem($data,'web_event_master');	
			}
			if($this->input->post('mode')=="Edit")
			{
				if($_FILES['cover_img']['name']!='')
			{
				
				 $old_cover_img=$this->input->post('old_path');
		
		$path_to_file1 	=	'../upload/img/'.$old_cover_img;
		$path_to_file2 	= 	'../upload/img_thum/'.$old_cover_img;
		unlink($path_to_file1);
		unlink($path_to_file2);	
			}
			
				$data['update_by']		=	$this->session->userdata['logged_in_school']['usercode'];
				$data['update_date']	=	$nowdt;	
				 $this->ObjM->update($data,'web_event_master','event_code',$this->input->post('eid'));		
			
			$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Updated successfully.....");

			$event_code		=	$this->input->post('eid');
			}
			
			if($this->input->post('mode')=="Edit" || $this->input->post('mode')=="Add"){
				ini_set("allow_url_fopen = On");
				ini_set('max_file_uploads', 300);
				ini_set('memory_limit', '700M' );
				ini_set('upload_max_filesize', '700M');  
				ini_set('post_max_size', '700M');  
				ini_set('max_input_time', 3600);  
				ini_set('max_execution_time', 3600);
				$cpt = count($_FILES['img']['name']);
				$files = $_FILES;
				$config = array();
    			$config['upload_path'] = '../upload/img';
    			$config['allowed_types'] = 'gif|jpg|png';
    			$config['max_size']      = '0';
    			$config['overwrite']     = TRUE;
				$config['quality'] = "100%";
				$config['height'] = 700;
			
			for($i=0; $i<$cpt; $i++)
    			{
					if($files['img']['name'][$i])
					{
						$_FILES['userfile']['name'] = $files['img']['name'][$i];
						$_FILES['userfile']['type'] = $files['img']['type'][$i];
						$_FILES['userfile']['tmp_name']= $files['img']['tmp_name'][$i];
						$_FILES['userfile']['error']= $files['img']['error'][$i];
						$_FILES['userfile']['size']= $files['img']['size'][$i]; 
						$rand=rand(100000,10000000);
						$fileName=$rand.$_FILES['img']['name'][$i];
						
						$string = $fileName;
						$lastDot = strrpos($string, ".");
						$fileName12 = str_replace(".", "", substr($string, 0, $lastDot)) . substr($string, $lastDot);
						$fileName=str_replace(" ","",$fileName12);
						
						
						$string = data_filter($this->input->post('event_title'));
						$nma=substr($string, 0, 2);    
						$fileName='event_'.$this->session->userdata['logged_in_school']['master_code'].'_'.$nma.'_'.$fileName;
					
						
						$config['file_name'] = $fileName;
						$this->upload->initialize($config);
						$this->upload->do_upload();
						$data=array();
						$data['master_code']		=	$this->session->userdata['logged_in_school']['master_code'];
						$data['event_code']	=	$event_code;
						$data['image']	=	$fileName;
						$this->ObjM->addItem($data,'web_event_detail');
						
						$upload_data = $this->upload->data();
						$config_img["image_library"] = "gd2";
						$config_img["source_image"] = $upload_data["full_path"];
						$config_img['create_thumb'] = FALSE;
						$config_img['maintain_ratio'] = TRUE;
						$config_img['new_image'] = '../upload/img/'.$fileName;
						$config_img['quality'] = "100%";
						$config_img['height'] = 700;
						$this->load->library('image_lib');
						$this->image_lib->initialize($config_img);
						$this->image_lib->resize();
						
						////resize image code////////
						$upload_data = $this->upload->data();
						$image_config["image_library"] = "gd2";
						$image_config["source_image"] = $upload_data["full_path"];
						$image_config['create_thumb'] = FALSE;
						$image_config['maintain_ratio'] = TRUE;
						$image_config['new_image'] = '../upload/img_thum/'.$fileName;
						$image_config['quality'] = "100%";
						$image_config['width'] = 250;
						$image_config['height'] = 250;
						
						
						$this->load->library('image_lib');
						$this->image_lib->initialize($image_config);
						$this->image_lib->resize();
						
						if($i==0){
										$config['file_name'] = $fileName;
										$this->upload->initialize($config);
										$this->upload->do_upload();
			
										$upload_data = $this->upload->data();
										$config_img["image_library"] = "gd2";
										$config_img["source_image"] = $upload_data["full_path"];
										$config_img['create_thumb'] = FALSE;
										$config_img['maintain_ratio'] = TRUE;
										$config_img['new_image'] = '../upload/img/'.$fileName;
										$config_img['quality'] = "100%";
										$config_img['height'] = 700;
										$this->load->library('image_lib');
										$this->image_lib->initialize($config_img);
										$this->image_lib->resize();
										
										
										////resize image code////////
										$upload_data = $this->upload->data();
										$image_config["image_library"] = "gd2";
										$image_config["source_image"] = $upload_data["full_path"];
										$image_config['create_thumb'] = FALSE;
										$image_config['maintain_ratio'] = TRUE;
										$image_config['new_image'] = '../upload/img_thum/'.$fileName;
										$image_config['quality'] = "100%";
										$image_config['height'] = 250;
										$this->load->library('image_lib');
										$this->image_lib->initialize($image_config);
										$this->image_lib->resize();
						}//if====0
					////
					}
				}
			
			}
			if($this->input->post('mode')=="Add")
			{
			
			header('Location: '.base_url().'index.php/'.$this->uri->segment(1));
			exit;
			}
			if($this->input->post('mode')=="Edit")
			{
			header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$event_code);
			exit;
			}
		}
		
		}
			
			
		}
	// To check unique name in db for particular school
		public function username_check($str=null)
	{
		
		$result = $this->ObjM->get_event_title();
		
		for($i=0;$i<count($result);$i++) {
			
   		if ($str == $result[$i]['event_title'])
		{
			
			$this->form_validation->set_message('username_check', 'The %s field can not be the word "'.$str.'". It must contain a unique value.');
			return FALSE;
			}
			
		}
		return true;
		
	}
	
//To Change Status (Inactive or Delete)
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'web_event_master','event_code',$this->uri->segment(4));	
	if($this->uri->segment(3)=="Delete"){
		$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Deleted successfully.....");
	}
	header('Location: '.base_url().'index.php/'.$this->uri->segment(1));
	exit;	
	}
	
	function deleterecord($eid=null){
		$result			=	$this->ObjM->get_image_name($eid);
		$event_code=$result[0]['event_code'];
		$path_to_file1 	=	'../upload/img/'.$result[0]['image'];
		$path_to_file2 	= 	'../upload/img_thum/'.$result[0]['image'];
		unlink($path_to_file1);
		unlink($path_to_file2);
		$this->ObjM->deletercd($this->uri->segment(3));
			$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Deleted successfully.....");
		header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$event_code);
	exit;
	}
	
}

