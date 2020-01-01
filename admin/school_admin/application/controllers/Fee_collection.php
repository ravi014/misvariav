<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fee_collection extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		$this->load->model('fee_collection_model','ObjM',TRUE); 
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->load->library('form_validation');
		$this->load->library('comman_fun');
 	}
	
	public function index()
	{
		$this->view();
	}
	
	public function view()
	{
		
		$data['standard']	=	$this->ObjM->getAll_standard();
		
		
		//var_dump($data);
		//exit;
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('fee_collection_view',$data);
		$this->load->view('comman/footer');
	}
	
	
	function listing(){
		
		$result=$this->ObjM->getAll();
	
		
		for($i=0;$i<count($result);$i++){
			
			$r=$i+1;
			
			$name=$result[$i]['sur_name'].' '.$result[$i]['first_name'].' '.$result[$i]['middle_name'];
			
			$html.='<tr>
					<td>'.$r.'</td>
					<td>'.$name.'</td>
					
					<td >
					 '.$result[$i]['phone'].'
					</td>	
						
					<td>'.$result[$i]['standard_name'].'</td>
					
					
					<td>
						<div class="btn-group">
								<a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle"><i class="icon-cog"></i>Opration<span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-primary">
										<li><a href="'.base_url().'index.php/'.$this->uri->segment(1).'/addnew/'.$result[$i]['student_code'].'">Collect Fee</a></li>
										
									</ul>
							</div>
						</td>
			</tr>';
		}
		echo $html;
		 	 	
	}

	//-----------------------------------------------------
	
	function dropdown_division($eid=null)
	{
		$division	=	$this->ObjM->get_division($eid);
		
		for($i=0;$i<count($division);$i++){
		
			$html.='<option '.$sel.' value="'.$division[$i]['division_code'].'">'.$division[$i]['name'].'</option>';
		}
				 
		echo $html;
	}
	
	//-----------------------------------------------------
	
	
	function addnew($eid=null){
		
		if($this->uri->segment(4)=='Edit'){
			$data['result']		 =	$this -> ObjM->get_student_fee_edit($this->uri->segment(5));
			//var_dump($data['result']);exit;
		}
		
		$data['student_dt']	 =	$this -> ObjM->get_student_info($eid);
		
		$data['list']		 =	$this -> ObjM->get_student_fee_dt($eid);
		
		$data['installment'] = $this -> ObjM->fee_installment_detail($data['student_dt'][0]['standard_code']); 
		
		$data['run_inst']	=  $this -> ObjM->get_current_installment();
		
		$data['total_fee']  =   $this->ObjM->tot_fees(array('standard_code'=>''.$data['student_dt'][0]['standard_code']));
		
		$data['total_paid_fee']  =   $this->ObjM->tot_paid_fees(array('student_code'=>''.$data['student_dt'][0]['student_code'],'account_year_code'=>''.$data['student_dt'][0]['account_year_code'],'student_yearly_code'=>''.$data['student_dt'][0]['student_yearly_code']));
		
		$this->load->view('comman/topheader');
		
		$this->load->view('comman/header');
		
		$this->load->view('fee_collection_add',$data);
		
		$this->load->view('comman/footer');
		
	}
	
	
	function insertrecord()
	{
		if($this->input->server('REQUEST_METHOD') === 'POST'){	
		
			$this->form_validation->set_rules('fee_date', 'Fee Date', 'required|trim');
			$this->form_validation->set_rules('pay_type', 'Pyament Type', 'required|trim');
			
			if($_POST['pay_type']!='cash'){
				
				$this->form_validation->set_rules('cheque_dd_no', 'Cheque / DD No.', 'required|trim');
				$this->form_validation->set_rules('bank_name', 'Back Name', 'required|trim');
				$this->form_validation->set_rules('cheque_dd_date', 'Cheque / DD Date', 'required|trim');
			}
			
			if($this->form_validation->run() == FALSE){
				
            	$this->addnew($_POST['student_code']);
        	}
        	else
        	{
            	$this->_insert();
				
       	 	}
			
				
		}
		
	}
	
	
	protected function _insert(){
		
		$data=array();
		
		$data['amount']					=	$_POST['amount'];
		
		$data['date_info']				=	date('Y-m-d',strtotime($_POST['fee_date']));
		
		$data['student_code']			=	$_POST['student_code'];
		
		$data['student_yearly_code']	=	$_POST['student_yearly_code'];
		
		$data['account_year_code']		=	$_POST['account_year_code'];
		
		$data['pay_type']				=	$_POST['pay_type'];
		
		$data['cheque_dd_no']			=	($_POST['pay_type']=='cash') ? "" : $_POST['cheque_dd_no']; 
		
		$data['bank_name']				=	($_POST['pay_type']=='cash') ? "" : $_POST['bank_name'];
		
		$data['cheque_dd_date']			=	($_POST['pay_type']=='cash') ? "" :date('Y-m-d',strtotime($_POST['cheque_dd_date'])); 
		
		$data['discrpt']				=	$_POST['discrpt']; 
		
		$data['create_date']			=	date('Y-m-d h:i:s');
		
		$data['create_by']				=	$this->session->userdata['logged_in_school']['usercode'];
		
		$data['status']					=	'Active'; 	
		
		$data['timedt']					=	 time(); 
		
		if($_POST['mode']=="Edit"){
			
			$this->comman_fun->update($data,'fee_income_account',array('id'=>$_POST['eid']));	
			
		}else{
		
			$fee_id		=	$this->ObjM->addItem($data,'fee_income_account');	
		
		}
		
		$this->insert_fee_dt($_POST['student_yearly_code']);
		
		
		header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/addnew/'.$_POST['student_code']);
		
		exit;
		
	}
	
	
	function insert_fee_dt($student_yearly_code=null){
		
		
		$this->comman_fun->delete('fee_income_dt',array('student_yearly_code'=>$student_yearly_code));	
		
		$result = $this->comman_fun->get_table_data('student_yearly_acccount',array('student_yearly_code'=>$student_yearly_code));	
		
		$fee_term = $this->ObjM->fee_installment_detail($result[0]['current_standard']);
		
		$total_paid = $this->ObjM->total_fee_paid($student_yearly_code);
		
		$total  = $total_paid;
		
		for($i=0;$i<count($fee_term);$i++){
			
			$term_amt = (float)$fee_term[$i]['amount'];
			
			if($total < 1){
				
				break;
				
			}
			
			if($total > $term_amt){
				
				$data = array(
					
						'term_id'  => $fee_term[$i]['term_id'],
					
						'student_code'  => $result[0]['student_code'],
						
						'student_yearly_code'  => $result[0]['student_yearly_code'],
						
						'standard_code'  => $result[0]['current_standard'],
						
						'amt'  => $term_amt,
					
				);
				
				
				
				$this->ObjM->addItem($data,'fee_income_dt');	
				
				$total = $total - $term_amt;
				
			}else{
						
				$data = array(
					
						'term_id'  => $fee_term[$i]['term_id'],
						
						'student_code'  => $result[0]['student_code'],
						
						'student_yearly_code'  => $result[0]['student_yearly_code'],
						
						'standard_code'  => $result[0]['current_standard'],
						
						'amt'  => $total,
					
				);
				
				$total = $total - $term_amt;
				
				$this->ObjM->addItem($data,'fee_income_dt');	
			
			}	
			
		}
		
		
	
	}
	
	
	
}

