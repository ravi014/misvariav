<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change_password extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		
		if(!$this->session->userdata('logged_in_school')){
			header('Location: '.main_url().'index.php/login');
			exit;
		}
		
		$this->load->model('change_password_model','ObjM',TRUE);
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
			
 	}
	public function index()
	{
		//$data['result']=$this->ObjM->get_all();
		$result=$this->ObjM->get_all();
		//var_dump($result);
		
		
		for($i=0;$i<count($result);$i++){
			//echo 'hi';
			$data['username']=$result[$i]['phone_no'];
			$this->ObjM->update($data,'user_master','usercode',$result[$i]['usercode']);
			//echo $this->$db->last_query();
			//exit;
		}
		
		
	}
	//function listing(){
//		
//		
//		$result=$this->ObjM->getAll();
//		
//		
//		//for($i=0;$i<count($result);$i++){
////			
////			$r=$i+1;
////			if($result[$i]['status']=='Active'){
////                   $currentst='Active';
////                   $nm='Inactive';
////				   $btn="btn-success";
////				   
////            }
////            
////		}
         


}
