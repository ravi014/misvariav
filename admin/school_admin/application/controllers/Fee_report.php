<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fee_report extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
		
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
		$this->load->model('fee_report_model','ObjM',TRUE); 
		
		$this->load->model('fee_collection_model','',TRUE); 
		
		
		
   		$this->load->helper('url');
		
		$this->load->helper('date');
		
		$this->load->library('form_validation');
	
 	}
	
	public function index()
	{
		
		$data['result'] = $this->get_standard_detail();
		
		$this->load->view('comman/topheader');
		
		$this->load->view('comman/header');
		
		$this->load->view('fee_report_view',$data);
		
		$this->load->view('comman/footer');
	}
	
	
	function listing(){
		
		$result=$this->ObjM->getStd();
		//var_dump($result);exit;
		$html='';
		
		for($i=0;$i<count($result);$i++)
		{	
			$r=$i+1;
			
			$html.='<tr>
			
			
			<td>'.$result[$i]['standard_code'].'</td> 
			
			<td>'.$result[$i]['standard_name'].'</td> 
			
			<td>'.$result[$i]['standard_name'].'</td> 
			
			<td>'.$result[$i]['standard_name'].'</td> 
			
			<td>'.$result[$i]['standard_name'].'</td> 
			
			<td>'.$result[$i]['standard_name'].'</td> 
			
			<td>'.$result[$i]['standard_name'].'</td> 
			
			<td>'.$result[$i]['standard_name'].'</td> 
			
			<td>'.$result[$i]['standard_name'].'</td> 
			
			<td>'.$result[$i]['standard_name'].'</td> 
			
			
			
			</tr>';
		}
		
		echo $html;
		 	
	}
	
	function get_standard_detail(){
		
			$result	=	$this->ObjM->getStd();
			
			for($i=0;$i<count($result);$i++){
				
			
				$result[$i]['installment']   = 	$this->fee_collection_model->fee_installment_detail($result[$i]['standard_code']);
				
				$result[$i]['total_student'] = 	$this->comman_fun->count_record('student_yearly_acccount',array('current_standard'=>$result[$i]['standard_code'],'status'=>'Active'));
				
				$result[$i]['paid_fee']   	 = 	$this->ObjM->total_fee_term_standard($result[$i]['standard_code']);
					
			}
			
			return $result;
		
	
	}
	
	
	
	function standard_detail($eid){
		
		
		
		$data['standard'] 		= 	$this->comman_fun->get_table_data('standard_master',array('standard_code'=>$eid,'status'=>'Active'));
		
		$data['installment']   	= 	$this->fee_collection_model->fee_installment_detail($eid);
	
		$data['paid_fee']   	= 	$this->ObjM->total_fee_term_standard($eid);
		
		$data['result']  		= 	$this->get_student_detail($eid);
		
	
		$this->load->view('comman/topheader');
		
		$this->load->view('comman/header');
		
		$this->load->view('fee_report_standard_detail_view',$data);
		
		$this->load->view('comman/footer');
	
	}
	
	
	function standard_detail2($eid){
		
		
		
		$data['standard'] 		= 	$this->comman_fun->get_table_data('standard_master',array('standard_code'=>$eid,'status'=>'Active'));
		
		$data['installment']   	= 	$this->fee_collection_model->fee_installment_detail($eid);
	
		$data['paid_fee']   	= 	$this->ObjM->total_fee_term_standard($eid);
		
		$data['result']  		= 	$this->get_student_detail($eid);
		
		$data['run_inst']		=  $this -> fee_collection_model->get_current_installment();
		

		$this->load->view('comman/topheader');
		
		$this->load->view('comman/header');
		
		$this->load->view('fee_report_standard_detail_view2',$data);
		
		$this->load->view('comman/footer');
	
	}
	
	
	function get_student_detail($eid){
		
		$result  		= 	$this->ObjM->get_student(array('standard'=>$eid));
		
		for($i=0;$i<count($result);$i++){
			
			$paid_fee 	= 	$this->ObjM->total_fee_term_student($result[$i]['student_yearly_code']);
			
			$tot_fee_paid = 0;
			
			for($m=0;$m<count($paid_fee);$m++){
				$tot_fee_paid+=$paid_fee[$m]['tot'];
			}
			
			$result[$i]['paid_fee'] = $paid_fee;
			$result[$i]['tot_fee_paid'] = $tot_fee_paid;
		
		}
		
		return $result;
		
	}
	
	
	
}

