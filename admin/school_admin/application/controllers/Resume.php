<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('resume_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->helper('breadcrumb');
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
 	}
	public function index()
	{
		$text=array('<i class="entypo-home"></i>Home',"Resume");
		$value=array( base_url(),base_url());
		$data['breadcrumb']=breadcrumb_view($text,$value);
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('resume_view',$data);
		$this->load->view('comman/footer');
	}
	function listing(){
		
		$result=$this->resume_model->getAll();
		
		//echo $this->db->last_query();
		echo '{ "aaData":[';
		$data = "";
		
		$rowno=0;
		for($i=0;$i<count($result);$i++)
		{	
			$rowno++;
            if($result[$i]['status']=='Active'){
                   $currentst='Active';
                   $nm='Inactive';
            }
            else{
                   $currentst='Inactive';
                   $nm='Active';
            }
	

			$p="";
			
			

			//$p="<a href='".base_url()."index.php/resume/addnew/View/".$result[$i]['resume_code']."' class='btn btn-default btn-sm' rel='tooltip' title='Edit'>View</a>&nbsp;&nbsp;&nbsp;";
            $p.="<a href='index.php' class='btn btn-danger btn-sm delrcd' rel='tooltip' title='Delete' value='".base_url()."index.php/resume/record_update/Delete/".$result[$i]['resume_code']."'><i class='fa fa-trash'></i></a>";
			$sta="".$currentst."&nbsp;|&nbsp;<a href='#' class='statuschange' value='".base_url()."index.php/resume/record_update/".$nm."/".$result[$i]['resume_code']."'>".$nm."</a>";
			$rowcount=$i+1;	
			$data.='["'.$rowcount.'","'.$this->json_fromat_string($result[$i]['post_applied_for']).'","'.$this->json_fromat_string($result[$i]['timedt']).'","'.$sta.'","'.$p.'"],';
		}
		echo substr($data,0,-1);
		echo "] }";	 	 	
	}
	
	function json_fromat_string($string)
	{
		$search = array("\n", "\r", "\u", "\t", "\f", "\b", "/", '"');
		$replace = array("\\n", "\\r", "\\u", "\\t", "\\f", "\\b", "\/", "\"");
		$encoded_string = str_replace($search, $replace, $string);
		return $encoded_string;
	}
	
	
	function addnew(){
		
		
		
		if($this->uri->segment(3)=='View'){
			$data['result']=$this->resume_model->get_record($this->uri->segment(4));
			$data['languages_name']=$this->resume_model->get_languages_name();
			$data['language']=$this->resume_model->get_languages($this->uri->segment(4));
			$data['academic']=$this->resume_model->get_academic($this->uri->segment(4));
			$data['professional']=$this->resume_model->get_professional($this->uri->segment(4));
			$data['experience']=$this->resume_model->get_experience($this->uri->segment(4));
		
		}
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('resume_mst_view',$data);
		$this->load->view('comman/footer');	
	}
	
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->resume_model->update($data,'resume_master','resume_code',$this->uri->segment(4));	
		
	}
	


}


