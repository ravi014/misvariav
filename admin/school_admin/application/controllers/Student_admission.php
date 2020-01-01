<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_admission extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		
		if(!$this->session->userdata('logged_in_school')){
			header('Location: '.main_url().'index.php/login');
			exit;
		}
		
		$this->load->model('student_admission_model','ObjM',TRUE);
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
			
 	}
	public function index()
	{
		
		$data['standard']		=	$this->ObjM->get_standard_all();
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('student_admission_view',$data);
		$this->load->view('comman/footer');
	}
	function listing(){
		
		$html='';
		$result=$this->ObjM->getAll();
		for($i=0;$i<count($result);$i++){
			
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
			
		
			if($result[$i]['student_photo']!=''){ 
				
			$student_photo ="<img src='".main_url()."upload/img_thum/".$result[$i]['student_photo']."' width='70' height='70' class='img img-circle'>";
			}
			else{
			$student_photo='';
			}
			$name=$result[$i]['sur_name'].' '.$result[$i]['first_name'].' '.$result[$i]['middle_name'];
			//$father_name=$result[$i]['father_first_name'].' '.$result[$i]['father_last_name'];
			$html.='<tr>
					<td>'.$r.'</td>
					<td>'.$student_photo.'</td>
					<td>'.$name.'</td>
					
					<td >
					 '.$result[$i]['phone'].'
					</td>	
						
					<td>'.$result[$i]['standard_name'].'</td>
					
					<td>
						<div class="btn-group">
								<a href="#" data-toggle="dropdown" class="btn '.$btn.' dropdown-toggle"><i class="icon-cog"></i> '.$currentst.' <span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-primary">
										<li><a class="statuschange" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/'.$nm.'/'.$result[$i]['student_code'].'">'.$nm.'</a></li>
										<li><a href="'.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$result[$i]['student_code'].'">Edit</a></li>
										<li><a class="delrcd" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/Delete/'.$result[$i]['student_code'].'">Delete</a></li>
									<li><a href="'.base_url().'index.php/student_dtl/view/'.$result[$i]['student_code'].'">View</a></li>
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
		$data['result']			=	$this->ObjM->get_record($eid);	
		
		$data['state_code']		=	$this->ObjM->get_state($data['result'][0]['country_code']);

		$data['city_code']		=	$this->ObjM->get_city($data['result'][0]['state_code']);
		
		$data['g_state_code']		=	$this->ObjM->get_state($data['result'][0]['g_country_code']);

		$data['g_city_code']		=	$this->ObjM->get_city($data['result'][0]['g_state_code']);
		
		
		$data['yearly_info']	=	$this->ObjM->get_student_yearly_info($data['result'][0]['student_code']);
		
		$data['division']		=	$this->ObjM->get_division_by_standard($data['yearly_info'][0]['current_standard']);
		
		}
		
		$data['standard']		=		$this->ObjM->get_standard_all();
		$data['bloodgrop']		=		$this->ObjM->get_gen_option('blood_group');
		$data['country']		=	$this->ObjM->get_country();
	
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('student_admission_add',$data);
		$this->load->view('comman/footer');	
	}
	
	function insertrecord(){
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
		
		
	$this->form_validation->set_rules('first_name', 'First Name', 'trim|xss_clean');
	$this->form_validation->set_rules('middle_name', 'Middle Name', 'trim|xss_clean');
	$this->form_validation->set_rules('sur_name', 'Surname', 'trim|xss_clean');
	//$this->form_validation->set_rules('admission_dt', 'Admission Date', 'required');
	//$this->form_validation->set_rules('birthdt', 'Birth Date', 'required');
	$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
	$this->form_validation->set_rules('guardian_phone_no', 'Phone No.', 'numeric');

	$this->form_validation->set_rules('guardian_mobile_no', 'Mobile No.', 'regex_match[/^[0-9]{10}$/]');
	$this->form_validation->set_rules('phone', 'Mobile No.', 'regex_match[/^[0-9]{10}$/]');
	$this->form_validation->set_rules('guardian_phone_no', 'Phone No.', 'numeric');
	$this->form_validation->set_rules('country_code', 'Country', 'trim|is_natural_no_zero');
	$this->form_validation->set_rules('state_code', 'State', 'trim|is_natural_no_zero');
	$this->form_validation->set_rules('city_code', 'City', 'trim|is_natural_no_zero');
	 
	
	$this->form_validation->set_rules('guardian_email', 'Email', 'trim|valid_email');

		if ($this->form_validation->run() == FALSE)
	 	{
		 	
	
		$this->addnew($this->input->post('mode'),$this->input->post('eid'));
	
		}
		
		else{
		
			$data['admission_dt']			=	date('d-m-Y',strtotime($this->input->post('admission_dt')));

			
			$data['first_name']				=	data_filter($this->input->post('first_name'));	
			$data['middle_name']			=	data_filter($this->input->post('middle_name'));
			$data['sur_name']				=	data_filter($this->input->post('sur_name'));
			$data['birthdt']				=	date('d-m-Y',strtotime($this->input->post('birthdt')));
			$data['phone']					=	data_filter($this->input->post('phone'));
			$data['emailid']				=	data_filter($this->input->post('email'));
			$data['student_address']		=	data_filter($this->input->post('student_address'));
			$data['bloodgrop']				=	data_filter($this->input->post('bloodgrop'));
			$data['gender']					=	data_filter($this->input->post('gender'));
			$data['country_code']			=	data_filter($this->input->post('country_code'));
			$data['state_code']				=	data_filter($this->input->post('state_code'));
			$data['city_code']				=	data_filter($this->input->post('city_code'));
			
		
			if($_FILES['student_photo']['name']!=''){
				$data['student_photo']   =	$this->upload_img($_FILES['student_photo']);
			$img=$data['student_photo'];
			}
			
			
		
			//***Guardian Detail****//
			$data['guardian_sur_name']		=	data_filter($this->input->post('guardian_sur_name'));
			$data['guardian_first_name']	=	data_filter($this->input->post('guardian_first_name'));
			$data['guardian_middle_name']	=	data_filter($this->input->post('guardian_middle_name'));
			$data['guardian_mobile_no']		=	data_filter($this->input->post('guardian_mobile_no'));
			$data['guardian_phone_no']		=	data_filter($this->input->post('guardian_phone_no'));
			$data['guardian_email']			=	data_filter($this->input->post('guardian_email'));
			$data['guardian_address']		=	data_filter($this->input->post('guardian_address'));
			$data['g_country_code']			=	data_filter($this->input->post('g_country_code'));
			$data['g_state_code']			=	data_filter($this->input->post('g_state_code'));
			$data['g_city_code']			=	data_filter($this->input->post('g_city_code'));
			$data['master_code']			=	$this->session->userdata['logged_in_school']['master_code'];

 			//***Guardian Detail****//
		
		
			if($this->input->post('mode')=="Add")
			{	
				///**********Insert Student Record***********///
				
				$data['create_by']			=	$this->session->userdata['logged_in_school']['usercode'];
				
				$data['create_date']		=	$nowdt;	
				
				$student_code 				= 	$this->ObjM->addItem($data,'student_master');
				
				
				///**********Insert student Yearly Acccount***********///
				
				$yearly_info['student_code']		=	$student_code;
				
				$yearly_info['current_standard']	=	data_filter($this->input->post('standard_code'));
				
				$ac_year	=	$this	->	ObjM->get_current_year();
				
				$master_code =	$this->session->userdata['logged_in_school']['master_code'];
				
				$yearly_info['master_code']=$master_code;
				
				$yearly_info['account_year_code']		=	$ac_year[0]['account_year_code'];	
				
				$yearly_info['division_code']		=	data_filter($this->input->post('division_code'));
				
				$yearly_info['timedt']				=	date('d-m-Y');
				
				$yearly_info['status']				=	'Active';
				
				$this->ObjM->addItem($yearly_info,'student_yearly_acccount');
				
				$user_arr=array('end_code'=>$student_code,'student_photo'=>$img,'master_code'=>$master_code);
				
				///This function is used for insert user recodr in user master ///////
				
				$this->insert_user($user_arr);
			
			}
			if($this->input->post('mode')=="Edit"){
				
				if($_FILES['student_photo']['name']!='')
				{
					$user_info['user_img']		= 	$img;
					$old_cover_img=$this->input->post('old_path');
					$path_to_file1 	=	'../upload/img/'.$old_cover_img;
					$path_to_file2 	= 	'../upload/img_thum/'.$old_cover_img;
					unlink($path_to_file1);
					unlink($path_to_file2);	
				}
					
				
				///**********Update Student Record***********///
				$this->ObjM->update($data,'student_master','student_code',$this->input->post('eid'));
			
				$yearly_info['current_standard']	=	data_filter($this->input->post('standard_code'));
				$ac_year=$this->ObjM->get_current_year();
				$yearly_info['account_year_code']	=$ac_year[0]['account_year_code'];	
				$yearly_info['division_code']		=	data_filter($this->input->post('division_code'));

				///**********Update Student Yearly Acccount***********///
				$this->ObjM->update($yearly_info,'student_yearly_acccount','student_yearly_code',$this->input->post('student_yearly_code'));
					
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds

			$name						=	data_filter($this->input->post('first_name').' '.$this->input->post('middle_name').' '.$this->input->post('sur_name'));
			$user_info['name']			=	$name;
			$user_info['emailid']		= 	data_filter($this->input->post('email'));
			$user_info['phone_no']		= 	data_filter($this->input->post('phone'));
			$user_info['country']		= 	data_filter($this->input->post('country_code'));
			$user_info['state']			= 	data_filter($this->input->post('state_code'));
			$user_info['city']			= 	data_filter($this->input->post('city_code'));
			$user_info['username']		=   data_filter($this->input->post('phone'));
			$user_info['update_by']		=	$this->session->userdata['logged_in_school']['usercode'];
			$user_info['update_date']	=	$nowdt;


				///**********Update user master***********///
			$this->ObjM->update($user_info,'user_master',array('user_type_id'=>'3','end_code'=>$this->input->post('eid')));

		}
		
	
		header('Location: '.base_url().'index.php/student_admission');
		exit;
	}
	}
		}
	
	
	function get_division_by_standard($eid=null){
	$result=$this->ObjM->get_division_by_standard($eid);
		if(count($result)==0){
			echo 0;
			
			}
			else{
		
		for($i=0;$i<count($result);$i++){
				$html='<option value="">---Select---</option>';
		
			$sel=($result[$i]['id']==$selected) ? "selected='selected'" : "";
			$html.='<option '.$sel.' value="'.$result[$i]['id'].'">'.$result[$i]['name'].'</option>';
		}
		echo $html;
		
			}
	}
	
	
	function get_state_by_country($eid=null){
		$html='<option value="">---Select---</option>';
		$result=$this->ObjM->get_state($eid);
		for($i=0;$i<count($result);$i++){
			$sel=($result[$i]['stateid']==$selected) ? "selected='selected'" : "";
			$html.="<option ".$sel." ".set_select('state_code', ''.$result[$i]['stateid'].'')." value='".$result[$i]['stateid']."'>".$result[$i]['name']."</option>";
		}
		echo $html;
	}
	
	function get_city($eid=null){ 
		$html='<option value="">---Select---</option>';
		$result		=	 $this->ObjM->get_city($eid);
		for($i=0;$i<count($result);$i++){
		$sel=($result[$i]['cityid']==$selected) ? "selected='selected'" : "";
			$html.="<option ".$sel." ".set_select('city_code', ''.$result[$i]['cityid'].'')." value='".$result[$i]['cityid']."'>".$result[$i]['name']."</option>";
		}
		echo $html;

		
	}
	
	protected function insert_user($user_arr=null){
		
		$now = time();
		$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			
		$name						=	data_filter($this->input->post('first_name').' '.$this->input->post('middle_name').' '.$this->input->post('sur_name'));
		$user_info['name']			=	$name;
		$user_info['emailid']		= 	data_filter($this->input->post('email'));
		$user_info['phone_no']		= 	data_filter($this->input->post('phone'));
		$user_info['country']		= 	data_filter($this->input->post('country_code'));
		$user_info['state']			= 	data_filter($this->input->post('state_code'));
		$user_info['city']			= 	data_filter($this->input->post('city_code'));
		$user_info['username']		=   data_filter($this->input->post('phone'));
		$user_info['password']		=   '123';
		$user_info['user_type_id'] 	=   '3';
		$user_info['create_by']		=	$this->session->userdata['logged_in_school']['usercode'];
		$user_info['create_date']	=	$nowdt;	
		$user_info['status']		=	'Active';
		$user_info['master_code'] 	= 	$user_arr['master_code'];
		$user_info['end_code'] 		= 	$user_arr['end_code'];
		$user_info['user_img'] 	= 	$user_arr['student_photo'];
		
		$this->ObjM->addItem($user_info,'user_master');
		
	}
	
	

	function record_update(){
	
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'student_master','student_code',$this->uri->segment(4));	
	
		$this->ObjM->update($data,'student_yearly_acccount','student_code',$this->uri->segment(4));	

		$this->ObjM->update($data,'user_master',array('user_type_id'=>'3','end_code'=>$this->uri->segment(4)));	

		if($this->uri->segment(3)=="Delete"){
			$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Deleted successfully.....");
		}
	header('Location: '.base_url().'index.php/'.$this->uri->segment(1));
	exit;
		
	}
	
	
	protected function upload_img($file=null){
			if($file['name']!=''){
					$config = array();
					$config['upload_path'] 				= 	'../upload/img';
					$config['allowed_types'] 			= 	'gif|jpg|png';
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
				
					$fileName='stud_'.$this->session->userdata['logged_in_school']['master_code'].'_'.$fileName;
					
					$config['file_name'] = $fileName;
					$this->upload->initialize($config);
					$this->upload->do_upload();
					
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
	
	
 public function export_student_details()
	{
	   	
		$result=$this->ObjM->getAll_export();
		
		header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
        header('Content-disposition: attachment;filename=student_details_'.date('d-m-Y').'.csv');
		header('Content-Transfer-Encoding: binary' );
		$outstr = '';
		
		echo "Sn,Name,Mobile No,Standard,Username,Password".PHP_EOL;
		$no=1;
			for($i=0;$i<count($result);$i++)
			{
				
				$eid=$result[$i]['student_code'];
				$user_master	=	$this->ObjM->get_user_master($eid);
				$name=$result[$i]['first_name'].' '.$result[$i]['middle_name'].' '.$result[$i]['sur_name'];
				
				 $outstr .='"'.$no.'",';
				 $outstr .='"'.$name.'",';
				 $outstr .='"'.$result[$i]['phone'].'",';
				 $outstr .='"'.$result[$i]['standard_name'].'",';
				 $outstr .='"'.$user_master[0]['username'].'",';
				 $outstr .='"'.$user_master[0]['password'].'",';
				 $outstr .="\n";
				 $no++;
			}
		echo $outstr; 
		
	 }
	 
	 // end export to excel	
	
	function change_username(){
		$result=$this->ObjM->all_user_cng_user();
			for($i=0;$i<count($result);$i++)
			{
				$data['username']=$result[$i]['phone_no'];
				$this->ObjM->update($data,'user_master',array('user_type_id'=>'3','status'=>'Active','usercode'=>$result[$i]['usercode']));
				//echo $this->db->last_query();
				//exit;
			}
		
	}
	
	

}


