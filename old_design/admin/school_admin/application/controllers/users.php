<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		$this->load->model('users_model','ObjM',TRUE); 
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
		$this->load->view('users_view');
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
			
			if($result[$i]['user_img']!=''){
				$user_photo ="<img src='".main_url()."upload/img_thum/".$result[$i]['user_img']."' width='50' height='50'  class='img img-circle'>";
			}
			else{
				$user_photo ="<img src='".main_url()."upload/userimage/student.png' width='50' height='50'>";
			}
			
			$result1=$this->ObjM->get_user_type_by_id($result[$i]['end_code']);
	
	$result1=$this->ObjM->show_where("country",array('status !=' => 'Delete','countryid'=> ''.$result[$i]['country'].''));
			$result2=$this->ObjM->show_where("state",array('status !=' => 'Delete','stateid'=> ''.$result[$i]['state'].''));
			$result3=$this->ObjM->show_where("city",array('status !=' => 'Delete','cityid'=> ''.$result[$i]['city'].''));

			$html .='<tr class="">
			<td>'.$r.'</td>
						<td>'.$user_photo.'</td>
						<td>'.$result1[0]['name'].'</td>
						<td>'.$result[$i]['name'].'</td>
						<td>'.$result[$i]['emailid'].'</td>
						<td>'.$result[$i]['mobileno'].'<br>
						'.$result[$i]['phone_no'].'
						</td>
						<td>'.$result1[0]['name'].'<br>
						'.$result2[0]['name'].'<br>
						'.$result3[0]['name'].'
						</td>
						<td>'.$result[$i]['username'].'</td>
						
						<td>'.$result[$i]['password'].'</td>
						<td>
				
				
				<div class="btn-group">
								<a href="#" data-toggle="dropdown" class="btn '.$btn.' dropdown-toggle"><i class="icon-cog"></i> '.$currentst.' <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-primary">
										<li><a class="statuschange" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/'.$nm.'/'.$result[$i]['usercode'].'">'.$nm.'</a></li>
										<li><a href="'.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$result[$i]['usercode'].'">Edit</a></li>
										<li><a class="delrcd" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/Delete/'.$result[$i]['usercode'].'">Delete</a></li>
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
		$data['user_type']		=	$this->ObjM->get_user_type();
		
		$data['country']		=	$this->ObjM->show_where("country",array('status !=' => 'Delete'));

		$data['state']		=	$this->ObjM->show_where("state",array('status !=' => 'Delete'));

		$data['city']		=	$this->ObjM->show_where("city",array('status !=' => 'Delete'));

		
		if($mode=='Edit')
		{
		
			$data['result']		=	$this->ObjM->get_record($eid);

		}
	   
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('users_add',$data);
		$this->load->view('comman/footer');
	}
	
	//To Add or Edit data
function insertrecord(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();



	$original_value=$this->input->post('old_username');
	if($this->input->post('username') != $original_value) {
	
   $is_unique =  '|is_unique[user_master.username]';
	} else {
	   $is_unique =  '';
	}
		$this->form_validation->set_rules('username', 'User Name', 'required|trim|xss_clean'.$is_unique);
	 $this->form_validation->set_rules('user_type', 'User Type', 'required|trim|is_natural_no_zero');
	 	$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');
	 	$this->form_validation->set_rules('mobile', 'Mobile No.', 'regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('name', 'School name', 'required|trim');
	 	//$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
	 	$this->form_validation->set_rules('phone', 'Phone No.', 'numeric');
		$this->form_validation->set_rules('country', 'Country', 'required|trim');
	 	$this->form_validation->set_rules('state', 'State', 'required|trim');
	 	$this->form_validation->set_rules('city', 'City', 'required|trim');
	 	
		
		if ($this->form_validation->run() == FALSE)
	 	{
		 	
	
		$this->addnew($this->input->post('mode'),$this->input->post('eid'));

		
		}
		
		else{
		
		$data['master_code']		=	$this->session->userdata['logged_in_school']['master_code'];
		$data['end_code']		=	data_filter($this->input->post('user_type'));
		//$data['user_type_id']		=	"4";
		$data['user_type_id']		=data_filter($this->input->post('user_type'));
		$data['name']				=	data_filter($this->input->post('name'));
		
			$data['emailid']			=	data_filter($this->input->post('email'));
			$data['mobileno']			=	data_filter($this->input->post('mobile'));
			$data['phone_no']			=	data_filter($this->input->post('phone'));
			$data['country']			=data_filter($this->input->post('country'));	
			$data['state']				=	data_filter($this->input->post('state'));
			$data['city']				=data_filter($this->input->post('city'));	
			$data['username']				=data_filter($this->input->post('username'));	
			$data['password']				=	data_filter($this->input->post('password'));
		
		
		if($_FILES['user_img']['name']!=''){
				$data['user_img']   =	$this->upload_img($_FILES['user_img']);
			$img=$data['user_img'];
			}
			
	
			if($this->input->post('mode')=="Add")
			{
				$data['create_by']			=	$this->session->userdata['logged_in_school']['usercode'];
				$data['create_date']		=	$nowdt;	
				$news_code		=	$this->ObjM->addItem($data,'user_master');	
			}
			if($this->input->post('mode')=="Edit")
			{
				
				if($_FILES['user_img']['name']!='')
			{
				
				 $old_cover_img=$this->input->post('old_path');
		
		$path_to_file1 	=	'../upload/img/'.$old_cover_img;
		$path_to_file2 	= 	'../upload/img_thum/'.$old_cover_img;
		unlink($path_to_file1);
		unlink($path_to_file2);	
			}
			
		$data['update_by']		=	$this->session->userdata['logged_in_school']['usercode'];
		$data['update_date']	=	$nowdt;	
				 $this->ObjM->update($data,'user_master','usercode',$this->input->post('eid'));		
		$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Updated successfully.....");
		$usercode		=	$this->input->post('eid');
			}
			
			header('Location: '.base_url().'index.php/'.$this->uri->segment(1));
			exit;
		}
			
			
		}
		
	}
	
	
protected function upload_img($file){
			if($file['name']!=''){
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
					
					$vid = data_filter($this->input->post('user_type'));
					$fileName='user_'.$this->session->userdata['logged_in_school']['master_code'].'_'.$vid.'_'.$fileName;
					
					$config['file_name'] = $fileName;
					$this->upload->initialize($config);
					$this->upload->do_upload();
					$data['user_img']	=	$fileName;
					
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

		//To Change Status (Inactive or Delete)
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'user_master','usercode',$this->uri->segment(4));	
		$sts=$this->uri->segment(3);
		
		if($this->uri->segment(3)=="Delete"){
		$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Deleted successfully.....");
		}
	header('Location: '.base_url().'index.php/'.$this->uri->segment(1));
	}
	
}

