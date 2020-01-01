<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class response extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('response_model','',TRUE);
		date_default_timezone_set('Asia/Calcutta');
		require APPPATH .'third_party/TransactionResponse.php';
 	}
	function view($id){
		
		

		$transactionResponse = new TransactionResponse();
		$transactionResponse->setRespHashKey("KEYRESP123657234");

		if($transactionResponse->validateResponse($_POST)){
		
		//print_r($_POST);
		
		$data = array();
			$data['mmp_txn'] 		= 	$_POST['mmp_txn'];	
			$data['mer_txn']		=	$_POST['mer_txn'];	
    		$data['amt']			=	$_POST['amt'];	
			$data['prod']			=	$_POST['prod'];	
    		$data['date']			=	$_POST['date'];	
			$data['bank_txn']		=	$_POST['bank_txn'];
			$data['f_code']			=	$_POST['f_code'];	
    		$data['clientcode']		=	$_POST['clientcode'];	
			$data['bank_name']		=	$_POST['bank_name'];
			$data['merchant_id']	=	$_POST['merchant_id'];	
    		$data['udf9']			=	$_POST['udf9'];	
			$data['discriminator']	=	$_POST['discriminator'];
			$data['surcharge']		=	$_POST['surcharge'];	
    		$data['CardNumber']		=	$_POST['CardNumber'];	
			$data['udf1']			=	$_POST['udf1'];
			$data['udf2']			=	$_POST['udf2'];	
			$data['udf3']			=	$_POST['udf3'];	
			$data['udf4']			=	$_POST['udf4'];	
			$data['udf5']			=	$_POST['udf5'];	
			$data['udf6']			=	$_POST['udf6'];	
			$data['signature']		=	$_POST['signature'];	
			$data['create_date']	=	date('Y-m-d h:i:s');	
			$data['donate_code']	=	$id;	
			
			
			$donate_code=$this->response_model->addItem($data,'transaction_response');	
			
			if($_POST['f_code']=="Ok"){
				$upadte_data=array();
				$upadte_data['transaction_status']="Success";
				$this->response_model->update($upadte_data,'donation_master','donate_code',$id);	
			}else{
				$upadte_data=array();
				$upadte_data['transaction_status']="Not Success";
				$this->response_model->update($upadte_data,'donation_master','donate_code',$id);
			}
			
			if($_POST['f_code']=="Ok"){
				
				$sts_arr['res_sts']= "Transaction Processed Successfully. Thank You to Donate us.";
				
			}else{
				$sts_arr['res_sts']= "Transaction Not Processed Successfully. Please Try Again OR Contact SSPIS.";
				//exit;
			}

			
			
		} else {
		echo "Invalid Signature";
		}
		var_dump($sts_arr['res_sts']);
				exit;
			
		
	}
	
	function test(){
		
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		//$this->load->view('response_view_new');
		$this->load->view('comman/footer');
	}

//print_r($_POST);
}