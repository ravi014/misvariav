<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sms extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('sms_model','ObjM',TRUE);
	if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
			
 	}
	public function index()
	{
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('sms_view');
		$this->load->view('comman/footer');
	}
	
	
	function listing(){
		$result=$this->ObjM->getAll();
		for($i=0;$i<count($result);$i++){
			
			
			if($result[$i]['status']=='Active'){
                   $currentst='Active';
                   $nm='Inactive';
				   $btn_class="btn-success";
				   
            }
            else{
                   $currentst='Inactive';
                   $nm='Active';
				   $btn_class="btn-danger";
            }
			$send_type=str_replace('_',' ',$result[$i]['send_type']);
			
			$row=$i+1;
			$html.='<tr>
					<td>'.$row.'</td>
					<td>'.$result[$i]['msg_desc'].'</td>
					<td>'.$send_type.'</td>
					<td>'.$result[$i]['standard_name'].'</td>
					<td>'.$result[$i]['msg_date'].'</td>
					<td><a class="delrcd btn btn-danger" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/Delete/'.$result[$i]['msg_code'].'">Delete</a>
						</td>
						
			</tr>';
		}
		echo $html; 	 	
	}
	
	function addnew($mode){
		
		$data['url']=$this->ObjM->get_url();
		
		$data['segment']=array('mode'=>$mode);
		
		$data['standard']	=	$this->ObjM->get_standard_all();
		$data['division']	=	$this->ObjM->get_division();
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('sms_add',$data);
		$this->load->view('comman/footer');	
	}
	function insertrecord(){
			if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
		

	$this->form_validation->set_rules('msg_desc', 'Message Description', 'required|trim|xss_clean');
	$this->form_validation->set_rules('receiver_code', 'Send Receiver', 'required');
	
		if ($this->form_validation->run() == FALSE)
	 	{
		$this->addnew($this->input->post('mode'));
		}
		
		else{
	
	 		$data['send_type'] 		= 	data_filter($this->input->post('receiver_code'));
			$data['msg_desc'] 		= 	data_filter($this->input->post('msg_desc'));
			$data['standard_code'] 		= 	data_filter($this->input->post('standard_code'));
			$data['other_mobile_no'] 	= 	data_filter($this->input->post('other_no'));
					
			$data['msg_date'] 		= 	date('d-m-Y');
			$data['create_date']	=	$nowdt;	
			$data['create_by']=$this->session->userdata['logged_in_school']['usercode'];	
			$data['master_code']=$this->session->userdata['logged_in_school']['master_code'];	
	
			$msg_code = $this->ObjM->addItem($data,'send_msg_master');
			
				$endcode=$this->input->post('endcode');
			
		
			if($this->input->post('receiver_code')=='Selected_Student'){
			
				for($i=0;$i<count($endcode);$i++){
					$info=array();
					$info['msg_code'] = $msg_code;
					$info['EndCode'] = $endcode[$i];
					$this->ObjM->addItem($info,'send_msg_dt');
				}
			}
			//****Fun For GET All Number*****//
		
			$list=$this->ger_number();
			
			//****Array slot fo 100*****//
			$listChunk=array_chunk($list,100);
			
			foreach($listChunk as $msg_list){
				
				$message=urlencode(data_filter($this->input->post('msg_desc')));
				$number=implode(',',$msg_list);
					//var_dump($number);
				$url_a=$this->ObjM->get_url();
				$a= $url_a[0]['url'];
		$url_b = str_replace('{number}',$number,$a);
		$url = str_replace('{message}',$message,$url_b);

				$msg_status=$this->run_url($url);
			}
			
		
		header('Location: '.base_url().'index.php/sms');
		exit;
		}
	
		}
	}
	

	protected function run_url($url){
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
		
		
	}
	
	function get_data_list($receiver_code,$standard_code)
	{
		if($receiver_code=='Selected_Student'){
			$html=$this->get_student_list($standard_code);	
			echo $html;
		}
		
	
		if($receiver_code=='Other'){
			$html='<table  class="table " id="data-table">
					 <tr>
					 	<td width="19%">Enter Mobile Number</td>
						<td width="1%">:</td>
						<td width="80%"><input type="text" id="other_no" name="other_no" class="numbersOnly"><br>
							<span class="cls_msg">10 Digit Number  Ex.(7878787878)</span>
						</td>
					</tr>
				   </table>';	
			echo $html;
		}
				
	}
	
	protected function get_student_list($standard_code){
		$result=$this->ObjM->get_student_new($standard_code);
	
		$html='<table class="table table-bordered" id="data-table">
				<thead>
					<tr class="thefilter"">
						<th><input type="checkbox"  id="checkall" class="checkall" value=""></th>
						<th>Name</th>
						<th>Standard</th>
						<th>Contact No.</th>
					</tr>
				</thead>
		<tbody>';
		
		for($i=0;$i<count($result);$i++){
			$name=$this->string_lower($result[$i]['first_name']).' '.$this->string_lower($result[$i]['middle_name']).' '.$this->string_lower($result[$i]['sur_name']);
			$html.='<tr>
						<td><input type="checkbox" name="endcode[]" class="endcode" value="'.$result[$i]['student_code'].'"></td>
						<td>'.$name.'</td>
						<td>'.$result[$i]['standard_name'].'</td>
						<td>'.$result[$i]['phone'].'</td>
				  </tr>';
		}
			
		$html.='</tbody>
    			</table>';
			return $html;
	}
	

	
	function string_lower($string){
		return ucfirst(strtolower($string));
	}
	
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'send_msg_master','msg_code',$this->uri->segment(4));	
		
	}
	//****Fun For GET All Number List*****//
	protected function ger_number(){
		$student_list=array();
		$receiver_code=$this->input->post('receiver_code');
		if($receiver_code=='All_Student' || $receiver_code=='Selected_Standard' || $receiver_code=='Selected_Student'){
			$student_list	=	$this->get_student_number();
		
		return $student_list;
		}	
		
	elseif($receiver_code=='Other')
		{
			$list[0]		=	'91'.$_POST['other_no'];	
			return $list;
		}
	
	}
	
	//****Fun For GET Student Number List*****//
	protected function get_student_number(){
		$list=array();
		$arr=array();
		$receiver_code=$this->input->post('receiver_code');
		if($receiver_code=='Selected_Standard'){
			$arr=array('standard_code'=>$this->input->post('standard_code'));
		
		}
		else if($receiver_code=='Selected_Student')
		{
			$endcode=$this->input->post('endcode');
			$arr=array('list'=>$endcode );
		
		}
	
		$result	=	$this->ObjM->get_student_number($arr);
		
		for($i=0;$i<count($result);$i++){
			if(strlen($result[$i]['phone'])==10)
			{
				$list[]='91'.$result[$i]['phone'];
			}
		}
		return $list;
	}
	
	
	


}


