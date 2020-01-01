<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fee_mgt extends CI_Controller {

	function __construct()
 	{
   		parent::__construct();
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		$this->load->model('fee_mgt_model','ObjM',TRUE); 
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
	
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('fee_mgt_view');
		$this->load->view('comman/footer');
	}
	
	
	function listing(){
		$result=$this->ObjM->getAll();
		
		$html='';
		for($i=0;$i<count($result);$i++)
		{	
			$r=$i+1;
            
			
		$html.='<tr>
		
						<td>'.$r.'</td>
						<td>'.$result[$i]['standard_name'].'</td> 
						<td>'.$result[$i]['standard_name'].'</td>						
						
						<td>
							<div class="btn-group">
								<a href="'.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$result[$i]['standard_code'].'"  class="btn btn-success"> Manage Fees </a>
									
							</div>
						</td>
						
					</tr>';
		}
		
		echo $html;
		 	
	}
	
	function addnew($mode,$eid)
	{
		$data['segment']=array('mode'=>$mode,'eid'=>$eid);
		if($mode=='Edit')
		{
			$data['acount_yr']	=	$this->ObjM->get_account_year();
			$data['standard']	=	$this->ObjM->get_standard($eid);
			$data['fee_head']	=	$this->ObjM->get_fee_head();
			$data['total_fee']  =   $this->ObjM->get_total_fee_by_type(array('standard_code'=>''.$eid.'','account_year_code'=>$data['acount_yr'][0]['account_year_code']));
			$data['fee_install']=	$this->ObjM->get_fee_installments($eid);
			$data['total_fee_install']  =   $this->ObjM->get_total_fee_install(array('standard_code'=>''.$eid.''));
			//echo $this->db->last_query();exit;
			
			
		}
	   
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('fee_mgt_add',$data);
		$this->load->view('comman/footer');
	}
	
function insertrecord()
	{
		if($this->input->server('REQUEST_METHOD') === 'POST'){	
			
			$this->_insert();
			header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$_POST['standard_code'].'');
			exit;
       	 	
		}else
		{
			$this->view();
		}	
	}	
	
function _insert(){
		
		$data=array();
		
		$fee_head	=	$this->ObjM->get_fee_head();
		
		$amount=$_POST['amount'];
		
		for($i=0;$i<count($fee_head);$i++)
		{
				
			$this->comman_fun->delete('erp_fee_master',array('standard_code'=>''.$_POST['standard_code'].'','head_code'=>''.$fee_head[$i]['id'].'','account_year_code'=>''.$_POST['account_year_code'].''));
			
			$data['standard_code']			=	$_POST['standard_code'];
			
			
			$data['head_code']				=	$fee_head[$i]['id'];
			
			$data['amount']					=	$amount[$i];
			
			$data['account_year_code']		=	$_POST['account_year_code'];
			
			$data['create_by']				=	$this->session->userdata['logged_in_school']['usercode'];
			
			$data['create_date']			=	date('Y-m-d h:i:s');
		
			$id=$this->comman_fun->additem($data,'erp_fee_master');
			
		}
		
		$this->session->set_flashdata('show_msg',array('class'=>'true','msg'=>' Fee Update Successfully...!!'));
			
		
		
	}	
	
function insert_installment()
	{
		if($this->input->server('REQUEST_METHOD') === 'POST'){	
			
			$this->_insertinstallment();
			header('Location: '.base_url().'index.php/'.$this->uri->segment(1).'/addnew/Edit/'.$_POST['standard_code'].'');
			exit;
       	 	
		}else
		{
			$this->view();
		}	
	}	
	
function _insertinstallment(){
		
		$data=array();
		
		$fee_install	=	$this->ObjM->get_fee_install();
		//var_dump($fee_install);exit;
		for($i=0;$i<count($fee_install);$i++)
		{
				
			$this->comman_fun->delete('fee_installment_detail',array('standard_code'=>''.$_POST['standard_code'].'','term_id'=>''.$fee_install[$i]['id'].''));
			
			//echo $this->db->last_query();exit;
			
			$data['term_id']			=	$fee_install[$i]['id'];
			
			$data['standard_code']		=	$_POST['standard_code'];
			
			if($fee_install[$i]['id']=="1"){
				
				$data['amount']		=	$_POST['apr_amount'];
				
			}elseif($fee_install[$i]['id']=="2"){
				
				$data['amount']		=	$_POST['july_amount'];
				
			}elseif($fee_install[$i]['id']=="3"){
				
				$data['amount']		=	$_POST['oct_amount'];
				
			}elseif($fee_install[$i]['id']=="4"){
				
				$data['amount']		=	$_POST['jan_amount'];
			}
			
			
			
			$id=$this->comman_fun->additem($data,'fee_installment_detail');
			
		}
		
		$this->session->set_flashdata('show_msg',array('class'=>'true','msg'=>' Fees Update Successfully...!!'));
			
		
		
	}		
	

	
		//To Change Status (Inactive or Delete)
function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'web_news_master','news_code',$this->uri->segment(4));	
		$sts=$this->uri->segment(3);
		
		if($this->uri->segment(3)=="Delete"){
			$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Deleted successfully.....");
		}
		header('Location: '.base_url().'index.php/'.$this->uri->segment(1));
	}
	
}

