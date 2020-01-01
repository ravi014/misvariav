<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('profile_model','ObjM',TRUE);
   		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		$this->load->library('upload');
		$this->load->library('image_lib');
	   $this->load->library('form_validation');

 	}
	
	public function view()
	{
		$usercode=$this->session->userdata['logged_in_school']['usercode'];
		$where=array("usercode"=>$usercode);
		$data['country']		=	$this->ObjM->show_where1("country",array('status !=' => 'Delete'));

		$data['state']		=	$this->ObjM->show_where1("state",array('status !=' => 'Delete'));

		$data['city']		=	$this->ObjM->show_where1("city",array('status !=' => 'Delete'));

		$data['result']=$this->ObjM->show_where("user_master",$where);
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('profile',$data);
		$this->load->view('comman/footer');	
	}
	
	
	
	public function insert()
	{
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
		$this->form_validation->set_rules('mobile', 'Mobile No.', 'regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('name', 'School name', 'required|trim');
	 	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
	 	$this->form_validation->set_rules('phone', 'Phone No.', 'numeric');
		$this->form_validation->set_rules('country', 'Country', 'required|trim|is_natural_no_zero');
	 	$this->form_validation->set_rules('state', 'State', 'required|trim|is_natural_no_zero');
	 	$this->form_validation->set_rules('city', 'City', 'required|trim|is_natural_no_zero');
	 
		if ($this->form_validation->run() == FALSE)
	 	{
		 
			$this->view();
		
		}else{
			
			$data['name']				=	data_filter($this->input->post('name'));
	
	
			$data['emailid']			=	data_filter($this->input->post('email'));
			$data['mobileno']			=	data_filter($this->input->post('mobile'));
			$data['phone_no']			=	data_filter($this->input->post('phone'));
			$data['country']			=data_filter($this->input->post('country'));	
			$data['state']				=	data_filter($this->input->post('state'));
			$data['city']				=data_filter($this->input->post('city'));	
			$data['username']				=data_filter($this->input->post('username'));	
			
		if($_FILES['user_img']['name']!=''){
				$data['user_img']   =	$this->upload_img($_FILES['user_img']);
			
			$path_to_file1 	=	'../upload/img/'.$old_path;
		$path_to_file2 	= 	'../upload/img_thum/'.$old_path;
		unlink($path_to_file1);
		unlink($path_to_file2);
		
			}
			
	
			$check_email=$this->check_username($this->input->post('username'),$this->input->post('eid'),TRUE);
			
			if($check_email['vali']=='false'){
				$this->session->set_flashdata('show_msg','username is already exist');
			
			header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/view');
		
				exit;	
			}
			
		$data['update_by']		=	$this->session->userdata['logged_in_school']['usercode'];
				$data['update_date']	=	$nowdt;	
				
				
				$this->ObjM->update($data,'user_master','usercode',$this->input->post('eid'));
				$this->ObjM->update($data,'school_master','school_code',$this->input->post('master_code'));		
		$this->session->set_flashdata("show_msg", " <b>Sucess</b> Profile Updated successfully.....");
	header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/view');
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
					
				$fileName='Admin_'.$this->session->userdata['logged_in_school']['master_code'].'_'.$fileName;
					
					
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
	
	function check_username($username, $eid, $return){
		$arr=array('username'=>$username);
	
		$usercode=$this->session->userdata['logged_in_school']['usercode'];
		$where=array("usercode"=>$usercode);
		$login_record=$this->ObjM->show_where("user_master",$where);
		$arr['eid']=$login_record[0]['usercode'];
		
		$r=$this->ObjM->check_user_code($arr);
		
		
		if(isset($r[0])){
			$r_json['vali']='false';
			$r_json['msg']='"'.$username.'"  Username Is Exist';
		}
		else{
			$r_json['vali']='true';
			$r_json['msg']='Valid';
		}
		if($return){
			return $r_json;
		}
		
		echo json_encode($r_json);
	}
	
	
}


