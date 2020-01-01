<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sample extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('response_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
//		$this->load->helper('date');
//		$this->load->library('form_validation');
		require APPPATH .'third_party/TransactionRequest.php';
		date_default_timezone_set('Asia/Calcutta');
 	}
	
	function trsfer($donateid){
		//$donateid=$this->uri->rsegment(2);
		$result=$this->response_model->get_donation($donateid);
		
		
		$amt=$result[0]['donate_amount'];
		$result[0]['donate_amount'];
		$nm=$result[0]['donors_name'];
		$email=$result[0]['email'];
		$phone=$result[0]['phone'];
		$address=$result[0]['address'];
		
		//var_dump($result);exit();
		$datenow = date("d/m/Y h:m:s");
		$transactionDate = str_replace(" ", "%20", $datenow);

		$transactionId = rand(1,1000000);

		$transactionRequest = new TransactionRequest();

		//Setting all values here
		$transactionRequest->setMode("test");
		$transactionRequest->setLogin(197);
		$transactionRequest->setPassword("Test@123");
		$transactionRequest->setProductId("NSE");
		$transactionRequest->setAmount($amt);
		$transactionRequest->setTransactionCurrency("INR");
		$transactionRequest->setTransactionAmount($amt);
		$transactionRequest->setReturnUrl("".base_url()."index.php/money_transfer/response/view/".$donateid);
		$transactionRequest->setClientCode(123);
		$transactionRequest->setTransactionId($transactionId);
		$transactionRequest->setTransactionDate($transactionDate);
		$transactionRequest->setCustomerName($nm);
		$transactionRequest->setCustomerEmailId($email);
		$transactionRequest->setCustomerMobile($phone);
		$transactionRequest->setCustomerBillingAddress("Mumbai");
		$transactionRequest->setCustomerAccount("639827");
		$transactionRequest->setReqHashKey("KEY123657234");

			
		
		
		
		$url = $transactionRequest->getPGUrl();

		header("Location: $url");
	}
	
}