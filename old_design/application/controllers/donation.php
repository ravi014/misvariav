<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class donation extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('donation_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Calcutta');
		
 	}
	public function index()
	{
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('donation_view');
		$this->load->view('comman/footer');
	}
	
	
	
	function insertrecord(){
		
			if($this->input->server('REQUEST_METHOD') === 'POST'){
				
				$this->form_validation->set_rules('donationtype','Donation Type', 'required|trim');
				
				$this->form_validation->set_rules('donate_amount','Donate Amount', 'required|trim|callback_check_amount');
				
				$this->form_validation->set_rules('donors_name','Donors Name', 'required|trim');
				
				//$this->form_validation->set_rules('street_address','Street Address', 'required|trim');
				
				//$this->form_validation->set_rules('address','Address', 'required|trim');
				
				$this->form_validation->set_rules('city','City', 'required|trim');
				
				$this->form_validation->set_rules('state','state', 'required|trim');
				
				$this->form_validation->set_rules('zip_code','zip code', 'required|trim');
				
				$this->form_validation->set_rules('phone','phone', 'required|trim');
				
				$this->form_validation->set_rules('email','Email', 'required|trim');
				
				//$this->form_validation->set_rules('g-recaptcha-response','Captcha', 'required|trim|callback_check_recaptcha');
				
				
				
				if ($this->form_validation->run() === FALSE){
					
						$this->index();
				
				}else{
					
					$donate_code = $this->_insertrecord();
					
					
					if($_POST['donationtype']=='Domestic'){
						
						header('Location: '.base_url().'index.php/money_transfer/sample/trsfer/'.$donate_code);
						//header('Location: http://172.16.16.20/sspis_new/index.php/money_transfer/sample');
						//echo "Domestic";
						exit;	
						
					}else{
						
						header('Location: '.base_url().'index.php/money_transfer/sample/trsfer/'.$donate_code);
						//echo "International";
						exit;	
					
					}
					
					
				}
				
			}else{
				header('Location: '.base_url().'index.php/donation');
			}
	}
	
	function check_amount(){
		
		if((float)$_POST['donate_amount'] > 250000){
			$this->form_validation->set_message('check_recaptcha', 'Invaild Donate Amount');
			return false;	
		}	
	}
	
	function check_recaptcha(){
		$captcha=$_POST['g-recaptcha-response'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeZORAUAAAAAI2lKqOk0PjvO4uBXUnHGvd2YUKK&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        $res = json_decode($response);	
		if(isset($res->success) && $res->success == true) {
			return true;
		}else{
			$this->form_validation->set_message('check_recaptcha', 'Invaild captcha code');
			return false;
		}
	}
	
	 protected function _insertrecord(){
		
			$data = array();
			$data["donationtype"] = $this->input->post('donationtype');	
			$data['donate_amount']			=	$this->input->post('donate_amount');	
    		$data['description']			=	$this->input->post('description');	
			$data['donors_name']			=	$this->input->post('donors_name');	
    		$data['donors_organization']	=	$this->input->post('donors_organization');	
			$data['street_address']			=	$this->input->post('street_address');
			$data['address']				=	$this->input->post('address');	
    		$data['city']					=	$this->input->post('city');	
			$data['state']					=	$this->input->post('state');
			$data['zip_code']				=	$this->input->post('zip_code');	
    		$data['country']				=	$this->input->post('country');	
			$data['phone']					=	$this->input->post('phone');
			$data['mobile']					=	$this->input->post('mobile');	
    		$data['fax']					=	$this->input->post('fax');	
			$data['email']					=	$this->input->post('email');
			$data['comment']				=	$this->input->post('comment');	
    		$data['date']					=	date('Y-m-d h:i:s');	
			$data['status']					=	'Active';
			
			
			
			$donate_code=$this->donation_model->addItem($data,'donation_master');	
			return $donate_code;
	
	}
	
	
	
}


