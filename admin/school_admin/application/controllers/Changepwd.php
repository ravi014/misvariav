<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Changepwd extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('change_pwd_model','ObjM',TRUE);
   		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
	   		$this->load->library('form_validation');

 	}
	
	public function index()
	{
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('change_pwd');
		$this->load->view('comman/footer');	
	}
	
	
	public function view()
	{
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('change_pwd');
		$this->load->view('comman/footer');	
	}
	
	
	
	public function insert()
	{
		
		
		if($this->input->server('REQUEST_METHOD') === 'POST'){	
		
			$this->form_validation->set_rules('old_password', 'Old Password', 'required|trim|callback_old_password_check');
        	$this->form_validation->set_rules('new_password', 'New password', 'required|trim|min_length[5]');
        	$this->form_validation->set_rules('retypepwd', 'Confirm Password', 'required|trim|matches[new_password]');
      
        	if($this->form_validation->run() == FALSE)
        	{
            	$this->view();
        	}
        	else
        	{
            	$this->_insert();
				$this->session->set_flashdata("show_msg", " <b>Sucess</b> Password changed successfully.....");
				redirect( base_url()."index.php/".$this->uri->segment(1)."/view");
       	 	}
		}else
		{
			$this->view();
		}
		
	}
	
	function old_password_check()
	{
		
   		$result = $this->ObjM->get_old_password();
		
   		if($result[0]['password'] != $_POST['old_password'])
   		{
      		$this->form_validation->set_message('old_password_check', 'Old password not match');
      		return FALSE;
   		} 
   		return TRUE;	
	}
	
	protected function _insert()
	{
		$result = $this->ObjM->get_old_password();
		$data=array();
		$data['password']=data_filter($this->input->post('new_password'));
		$this->ObjM->update($data,'user_master','usercode',$result[0]['usercode']);
	$this->ObjM->update($data,'school_master','school_code',$result[0]['master_code']);

	}
	
	
}


