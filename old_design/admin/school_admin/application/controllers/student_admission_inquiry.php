<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class student_admission_inquiry extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		
		if(!$this->session->userdata('logged_in_school')){
			header('Location: '.main_url().'index.php/login');
			exit;
		}
		
		$this->load->model('student_admission_inquiry_model','ObjM',TRUE);
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
			
 	}
	public function index()
	{
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('student_admission_inquiry_view');
		$this->load->view('comman/footer');
	}
	function listing(){
		
		$html='';
		$result=$this->ObjM->getAll();
		
		for($i=0;$i<count($result);$i++){
			
			$r=$i+1;
			
			
			$html.='<tr>
					<td>'.$r.'</td>
					<td>'.$result[$i]['name_of_stud'].'</td>
					<td>'.$result[$i]['mobile_no'].'</td>
					
					<td >
					 '.$result[$i]['admission_class'].'
					</td>	
					
					<td>'.date("d-m-Y", strtotime($result[$i]['create_date'])).'</td>
					
					<td>'.date("d-m-Y", strtotime($result[$i]['dob'])).'</td>
					
					<td>
						<div class="btn-group"><a href="'.base_url().'index.php/student_admission_inquiry/view/'.$result[$i]['id'].'" style="text-decoration:none;">View</a>
									
							</div>
						</td>
			</tr>';
		}
		echo $html;
		 	 	
	}
	
	
		function view($eid)
		{
		
		$data['result']	=	$this->ObjM->get_record($eid);	
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('student_dtl_inquiry_view',$data);
		$this->load->view('comman/footer');	
	}
	
	

}


