<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax extends CI_Controller {

function __construct()
 	{
		
   		parent::__construct();
		if(!$this->session->userdata('logged_in_user')){header('Location: '.base_url().'index.php/login');exit;}
		$this->load->model('ajax_model','ObjM',TRUE); 
	
	
 	}

	//Get all state by country id using ajax
	function getstate($eid){
		$result=$this->ObjM->getstate($eid);
		
		if(count($result)>0){
		echo '<option value="">--Select State--</option>';

		for($i=0;$i<count($result);$i++){
			echo '<option value="'.$result[$i]['stateid'].'">'.$result[$i]['name'].'</option>';
			}
		}else{
		echo '<option value="">-Please Select Country-</option>';	
		}
		 	
	}
	
	//Get all city by state id using ajax
	function getcity($eid){
		$result=$this->ObjM->getcity($eid);
		
		if(count($result)>0){
		echo '<option value="">--Select City--</option>';

		for($i=0;$i<count($result);$i++){
			echo '<option value="'.$result[$i]['cityid'].'">'.$result[$i]['name'].'</option>';
			}
		}else{
		echo '<option value="">-Please Select State-</option>';	
		}
		 	
	}
	
	
	
}

