<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms_login_dt extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('sms_login_dt_model','ObjM',TRUE);
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
 	}
	public function index()
	{
		$data['url']=$this->ObjM->get_url();
		
		$data['standard']		=	$this->ObjM->get_standard_all();
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('sms_login_dt_view',$data);
		$this->load->view('comman/footer');
	}
	
	
	
	function send_msg(){
		
		
		$result		=	$this->ObjM->getAll();
		
		for($i=0;$i<count($result);$i++){
			
			$check_msg=$this->ObjM->check_student($result[$i]['student_code']);
			
			if(!isset($check_msg[0]))
			{
				
				if(strlen($result[$i]['phone'])==10)
				{
					$number		=	'91'.$result[$i]['phone'];
					$message	=	'Vatsalya International School\nUsername: '.$result[$i]['username'].'\nPassword: '.$result[$i]['password'].'\nDownlaod App https://goo.gl/zGFNEY';
					$message	=	urlencode($message);
						$url_a=$this->ObjM->get_url();					
					$a= $url_a[0]['url'];
		$url_b = str_replace('{number}',$number,$a);
		$url = str_replace('{message}',$message,$url_b);

					
					if($this->run_url($url))
					{
						$msg_status='OK';
					}else
					{
						$msg_status='FALSE';
					}
					
				}
				else
				{
					$msg_status='Invalid number';
				}
			
			
				$msg=array(
					'number'=>$number,
					'message'=>$message,
					'url'=>$url
				);
			
				$data['student_code']	=	$result[$i]['student_code'];
				$data['status']			=	$msg_status;
				$data['standard_code']	=	data_filter($this->input->post('standard_code'));
			$data['master_code']=$this->session->userdata['logged_in_school']['master_code'];	

				$data['message']	    =	json_encode($msg);
			
				$this->ObjM->addItem($data,'sms_send_login_dt');	
				sleep(1);
			}//end if
			
			
		}
		header('Location: '.base_url().'index.php/sms_login_dt');
		exit;	
	}
	
	
	protected function run_url($url=null)
	{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
		if(curl_exec($ch)){
			$req=true;
		}else{
			$req=false;
		}
		curl_close($ch);
		return $req;
	}
	
	function report()
	{
	
		$data['standard']		=	$this->ObjM->get_standard_send_login();		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('sms_login_dt_report',$data);
		$this->load->view('comman/footer');
		
	}
	
	function get_send_report($eid=null, $return=null)
	{
		$html='';
		$result=$this->ObjM->get_msg_dt($eid);
		
	
		
		for($i=0;$i<count($result);$i++){
			$row=$i+1;
			
			$msg_dt=json_decode($result[$i]['message'],true);
			if(is_array($msg_dt))
			{
				$message = 'Number :'.$msg_dt['number'].'<br><br><br>';
				$message.= str_replace('\n','<br>',urldecode($msg_dt['message']));
			}else{
				$message = str_replace('\n','<br>',urldecode($result[$i]['message']));
			}
			
			$html.='<tr>
						<td>'.$row.'</td>
						<td>'.$result[$i]['name'].'</td>
						<td>'.$result[$i]['status'].'</td>
						<td>'.date('d-m-Y h:i a',strtotime($result[$i]['timedt'])).'</td> 
						<td>'.$message.'</td>
				  </tr>';
		}
		
		echo $html;
		
	}
	
	function get_r($i=null)
	{
		$result=$this->ObjM->getAll_st($i);
		
		echo 'Count '.count($result);
		
	}

}


