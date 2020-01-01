<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
 	{

   		parent::__construct();
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		$this->load->model('home_model','ObjM',TRUE); 
 	   		$this->load->library('form_validation');

	}
	
	public function index()
	{
		$data['result']=$this->ObjM->tot_events();
		$data['result1']=$this->ObjM->tot_news();
		$data['result2']=$this->ObjM->tot_photo();
		$data['result3']=$this->ObjM->tot_video();
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('home_view',$data);
		$this->load->view('comman/footer');
	}
	
	function excel_report(){
		
		
		
		$result	=	$this->ObjM->get_all_student();
		
		
		ob_start();
		$outstr = '';
		$outstr .='"Sr No",';
		$outstr .='"Student Name",';
		$outstr .='"Username",';
		$outstr .='"Password",';
		$outstr .="\n";
		
		for($i=0;$i<count($result);$i++){
			$r=$i+1;
			$outstr .='"'.$r.'",';
			$outstr .='"'.$result[$i]['name'].'",';
			$outstr .='"'.$result[$i]['username'].'",';
			$outstr .='"'.$result[$i]['password'].'",';
			$outstr .="\n";	
		}
		
		ob_end_clean(); //ending output buffering. 
		
		$filename = 'Student_Data'.date('d-m-Y').'.csv';
		
		
		
		header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
		header('Content-disposition: attachment;filename='.$filename.'');
		header("Content-Transfer-Encoding: binary" );
		
		
		echo $outstr;
		
		
	}
	
	
}

