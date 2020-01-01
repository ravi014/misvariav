<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notification extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('notification_model','ObjM',TRUE);
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
			
 	}
	public function index()
	{
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('notification_view');
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
			$std=$this->ObjM->get_table_data("standard_master",array("standard_code"=>$result[$i]['standard_code']));
			
			$row=$i+1;
			$html.='<tr>
					<td>'.$row.'</td>
					<td>'.$result[$i]['noti_title'].'</td>
					<td>'.$result[$i]['noti_desc'].'</td>
					<td>'.$send_type.'</td>
					<td>'.$std[0]['standard_name'].'</td>
					<td>'.$result[$i]['noti_date'].'</td>
					<td><a class="delrcd btn btn-danger" href="'.base_url().'index.php/'.$this->uri->segment(1).'/record_update/Delete/'.$result[$i]['noti_code'].'">Delete</a>
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
		//var_dump($data);exit;
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('notification_add',$data);
		$this->load->view('comman/footer');	
	}
	function insertrecord()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
			$this->form_validation->set_rules('noti_title', 'Notification title', 'required|trim|xss_clean');
			$this->form_validation->set_rules('noti_desc', 'Notification Description', 'required|trim|xss_clean');
			$this->form_validation->set_rules('receiver_code', 'Send Receiver', 'required');
	
		if ($this->form_validation->run() == FALSE)
	 	{
		$this->addnew($this->input->post('mode'));
		}
		
		else{
	
	 		$data['send_type'] 		= 	$this->input->post('receiver_code');
			$data['noti_title'] 	= 	data_filter($this->input->post('noti_title'));
			$data['noti_desc'] 		= 	data_filter($this->input->post('noti_desc'));
			
		
			$data['standard_code'] 	= 	data_filter($this->input->post('standard_code'));
		
			$data['noti_date'] 		= 	date('d-m-Y');
			$data['create_date']	=	$nowdt;	
			$data['create_by']=$this->session->userdata['logged_in_school']['usercode'];	
			$data['master_code']=$this->session->userdata['logged_in_school']['master_code'];	
			$data['with_sms']	=	data_filter($this->input->post('noti_with_sms'));	
			
			$noti_code = $this->ObjM->addItem($data,'notification');
			
			$endcode=$this->input->post('endcode');
				
			if($this->input->post('receiver_code')=='Selected_Student' ){
				for($i=0;$i<count($endcode);$i++){
					$info=array();
					$info['noti_code'] = $noti_code;
					$info['EndCode'] = $endcode[$i];
					$this->ObjM->addItem($info,'notification_dt');
				}
			}
			
			$list=$this->ger_gcm_id();
			
			$listChunk=array_chunk($list,1000);
			foreach($listChunk as $clist){
				$message=array('data'=>data_filter($this->input->post('noti_desc')));
				
				
				$this->send_notification($clist,$message);	
			}
		
			//**Send SMS**///
			if($this->input->post('noti_with_sms')=='Y'){
				$this->send_sms();
			}
			
			
		
		echo '<script>window.location.href="'.base_url().'index.php/notification"</script>';
		header('Location: '.base_url().'index.php/notification');
		exit;
		}
		}
	
	}
	
	protected function send_sms()
	{
		$list	=	$this->ger_number();
		$listChunk=array_chunk($list,100);
		
		foreach($listChunk as $msg_list){
				
				$message=urlencode(data_filter($this->input->post('noti_desc')));
				$number=implode(',',$msg_list);
					$url_a=$this->ObjM->get_url();					
					$a= $url_a[0]['url'];
		$url_b = str_replace('{number}',$number,$a);
		$url = str_replace('{message}',$message,$url_b);

				$msg_status=$this->run_url($url);
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
		
	
	}
	
	 function get_student_list($standard_code){
		$result=$this->ObjM->get_student_new($standard_code);
		//echo $this->db->last_query();
		//var_dump($result);
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
		$this->ObjM->update($data,'notification','noti_code',$this->uri->segment(4));	
		
	}
	
	//****Fun For GET All Number List*****//
	protected function ger_gcm_id(){
		$student_list=array();
		
		
		if($this->input->post('receiver_code')=='All_Student' || $_POST['receiver_code']=='Selected_Standard' || $_POST['receiver_code']=='Selected_Student'){
			$student_list	=	$this->get_student_gcm();
		
		}	
		
		
		$list = $student_list;
		
		return $list;
		
	}
	
	//****Fun For GET Student Number List*****//
	 function get_student_gcm(){
		$list=array();
		$arr=array();
		$receiver_code=data_filter($this->input->post('receiver_code'));
		if($receiver_code=='Selected_Standard'){
			$arr=array('standard_code'=>data_filter($this->input->post('standard_code')));
		}
		if($receiver_code=='Selected_Student')
		{
			$arr=array('list'=>data_filter($this->input->post('endcode')));
		}
	
		$result	=	$this->ObjM->get_student_gcm($arr);
		//echo $this->db->last_query();
		//var_dump($result);
		for($i=0;$i<count($result);$i++){
			
			$list[]=$result[$i]['reg_id'];
			
		}
		return $list;
	}
	
	function test_notification1()
	{
		
		$message=array('data'=>'Hello Phoenix Binary System 8155  s simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');
		//$clist=array('APA91bH5C_BfwdKBFw-7muNfYBdqYVlI4NE5AFcCPutkcjBZVin5ypdlNLaAEG4-HUhwVTzix_7QOwaJgkz8E7TEynVaCRz_o6TCL5IqcgeEidJIOMvX15SCe1gN-8zjovTDoKJWSQk6');
		
	 	$registatoin_ids=array('APA91bG0fftSPBlXEr_ui8xJk0DtyK2SQQOcAGVHJv3eZf11k5j9hSLJd-GT2S3wL8A-KwUdE17e8o8L7qiR7QkjrLmJRjQ-8UyDApn-aN3fPFdVNe1QxTobcVngRvNj9hiFAyU74JA0');

		$this->send_notification($registatoin_ids,$message);		
		
	
	}
	
	protected function send_notification($registatoin_ids, $message) {
			
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
		
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
       // echo $result;
    }
	
	
	
	
	
	
	
	
	
	
	//****Fun For GET All Number List*****//
	protected function ger_number(){
		$student_list=array();
		$receiver_code=$this->input->post('receiver_code');
		if($receiver_code=='All_Student' || $receiver_code=='Selected_Standard' || $receiver_code=='Selected_Student'){
			$student_list	=	$this->get_student_number();
		
		return $student_list;
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


