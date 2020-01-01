<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class video_list extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('video_list_model','ObjM',TRUE);
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('upload');
		$this->load->library('image_lib');
		   		$this->load->library('form_validation');

		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
 	}
	public function index()
	{
		$data['result']		=	$this->ObjM->getAll();
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('video_list_view',$data);
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
		$result2	=	$this->ObjM->get_record_dt($result[$i]['video_id']);	
			
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
						<td>'.$result[$i]['video_title'].'</td>	
						<td>'.$t.'<br/></td>
						<td>
							<div class="btn-group">
								<a href="#" data-toggle="dropdown" class="btn '.$btn.' dropdown-toggle"><i class="icon-cog"></i> '.$currentst.' <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-primary">
										<li><a class="statuschange" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/'.$nm.'/'.$result[$i]['video_id'].'">'.$nm.'</a></li>
										<li><a href="'.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$result[$i]['video_id'].'">Edit</a></li>
										<li><a class="delrcd" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/Delete/'.$result[$i]['video_id'].'">Delete</a></li>
									</ul>
							</div>
							
							<a class="btn btn-primary" href="'.base_url().'index.php/video/view/'.$result[$i]['video_id'].'">Videos</a>
							<div>
							
							
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
		$this->load->view('video_list_add',$data);
		$this->load->view('comman/footer');	
	}
	
		public function name_check($str)
	{
		
		$result = $this->ObjM->get_video_list_name();
		
		for($i=0;$i<count($result);$i++) {
			
   		if ($str == $result[$i]['video_title'])
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
	
	if($this->input->post('video_title') != $original_value) {
   	
			  $is_unique =  '|callback_name_check';
	
	} else {
	 	
			  $is_unique =  '';
	}
		$this->form_validation->set_rules('video_title', 'Video Gallery Name', 'required|trim|xss_clean'.$is_unique );
	 
		
		if ($this->form_validation->run() == FALSE)
	 	{
		 	
		//$data['error']='Required';
		$this->addnew($this->input->post('mode'),$this->input->post('eid'));

		}
		
		else{
			$data['video_title']=data_filter($this->input->post('video_title'));
			$data['master_code']		=	$this->session->userdata['logged_in_school']['master_code'];
		
			$files = $_FILES;
			$config = array();
    		$config['upload_path'] = '../upload/img';
    		$config['allowed_types'] = 'gif|jpg|png';
    		$config['max_size']      = '0';
    		$config['overwrite']     = FALSE;
				
			if($files['img']['name']!=''){
				$_FILES['userfile']['name'] = $files['img']['name'];
        		$_FILES['userfile']['type'] = $files['img']['type'];
        		$_FILES['userfile']['tmp_name']= $files['img']['tmp_name'];
        		$_FILES['userfile']['error']= $files['img']['error'];
        		$_FILES['userfile']['size']= $files['img']['size']; 
				$image_info = getimagesize($_FILES['userfile']['tmp_name']);
				$image_width = $image_info[0];
				$image_height = $image_info[1];
				
				
				
				$rand=rand(100000,100000000);
				$fileName=$rand.$_FILES['img']['name'];
				$string = $fileName;
				$lastDot = strrpos($string, ".");
				$fileName12 = str_replace(".", "", substr($string, 0, $lastDot)) . substr($string, $lastDot);
				$fileName=str_replace(" ","",$fileName12);
				
				$string = data_filter($this->input->post('video_title'));
					$nma=substr($string, 0, 2);    
					$fileName='video_'.$this->session->userdata['logged_in_school']['master_code'].'_'.$nma.'_'.$fileName;
					
				
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
				$image_config['width'] = 230;
				$image_config['height'] = 230;
					
				$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
				$image_config['master_dim'] = ($dim > 0)? "height" : "width";
				$this->load->library('image_lib');
				$this->image_lib->initialize($image_config);
				if(!$this->image_lib->resize()){ //Resize image
    				$this->image_lib->display_errors('<p>', '</p>');
				}		
			}	
        	
				
		if($this->input->post('mode')=="Add"){	
		$data['create_date']	=	$nowdt;	
				$data['create_by']=$this->session->userdata['logged_in_school']['usercode'];	
			
			$video_id		=	$this->ObjM->addItem($data,'web_video_list');
		}
		if($this->input->post('mode')=="Edit"){
	if($_FILES['img']['name']!=''){
 $old_cover_img=data_filter($this->input->post('old_path'));
		
		$path_to_file1 	=	'../upload/img/'.$old_cover_img;
		$path_to_file2 	= 	'../upload/img_thum/'.$old_cover_img;
		unlink($path_to_file1);
		unlink($path_to_file2);	
	}
			
				$data['update_date']	=	$nowdt;	
				$data['update_by']=$this->session->userdata['logged_in_school']['usercode'];
				
			$this->ObjM->update($data,'web_video_list','video_id',$this->input->post('eid'));	
			
			$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Updated successfully.....");

			$video_id		=	$this->input->post('eid');
		}
				if($this->input->post('mode')=="Add")
			{
			
			header('Location: '.base_url().'index.php/'.$this->uri->segment(1));
			exit;
			}
			if($this->input->post('mode')=="Edit")
			{
			header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$video_id);
			exit;
			}	
		}
	}
		
	}
	function record_update($status,$eid){
		$data=array();
		$data['status']=$status;
		
		
		$this->ObjM->update($data,'web_video_list','video_id',$eid);	
		if($this->uri->segment(3)=="Delete"){
		$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Deleted successfully.....");
		}
		header('Location: '.base_url().'index.php/video_list');
		exit;
	}
	function deleterecord(){
		$result			=	$this->ObjM->get_image_name($this->uri->segment(3));
		$path_to_file1 	=	'./upload/img/'.$result[0]['cover_img'];
		$path_to_file2 	= 	'./upload/img_thum/'.$result[0]['cover_img'];
		unlink($path_to_file1);
		unlink($path_to_file2);
		$this->ObjM->deletercd($this->uri->segment(3));
	}
	
}


