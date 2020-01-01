<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class food extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('food_model','ObjM',TRUE);
		
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
   		$this->load->helper('url');
		$this->load->helper('date');
			$this->load->library('form_validation');
	
		date_default_timezone_set("Asia/Calcutta");
		
 	}
	public function index()
	{
	
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('food_view');
		$this->load->view('comman/footer');
	}
	
	function addnew($mode,$eid)
	{
			$data['segment']=array('mode'=>$mode,'eid'=>$eid);
		if($mode=='Edit')
		{
			$data['result']		=	$this->ObjM->get_record($eid);
		}
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('food_add',$data);
		$this->load->view('comman/footer');	
	}
	
	function insertrecord(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
			
			$this->ObjM->row_delete($this->input->post('month'),$this->input->post('year'));
		//echo $this->db->last_query(); exit;
			$food_date = $this->input->post('date');
		
			for($f=0;$f<count($food_date);$f++){
				$data        		=	array();
				$data['date'] 		= 	$food_date[$f];
				if($_POST['food_name'.$f]=="")
				{
					$food=' ';
					}
				else{
			$food=	implode(',',$_POST['food_name'.$f]);
				}
				
				
				if($_POST['dinner_name'.$f]=="")
				{
					$dinner_food=' ';
					}
				else{
					
		$dinner_food=	implode(',',$_POST['dinner_name'.$f]);
			
				}
				
				$data['food_name']  = 	$food;
				$data['dinner_name']  = $dinner_food;
				$data['month']		=	$this->input->post('month');
				$data['year']		=	$this->input->post('year');
				$data['day']		=	date('l', strtotime($food_date[$f]));
				$data['create_date']=	$nowdt;
			  	$data['master_code']		=	$this->session->userdata['logged_in_school']['master_code'];
				$data['create_by']			=	$this->session->userdata['logged_in_school']['usercode'];
				
				$food_code=$this->ObjM->addItem($data,'food_master');
			}
		header('Location: '.base_url().'index.php/food');
		exit;
		
		}
	}
	
	
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'food_master','food_code',$this->uri->segment(4));	
		
	}
	
	function get_food_menu($month,$year)
	{
	   
	  $data = cal_days_in_month(CAL_GREGORIAN,$month,$year);
	  
	  for ($i=0; $i<$data; $i++)
		{
			$kk=$i+1;
 		  $date1 = $kk.'-'.$month.'-'.$year;
		  $date=date('d-m-Y',strtotime($date1));
		  $food_day = date('l', strtotime($date));
		  $food_date = $date;
		  
		
		  $html.='<tr>
		            <td width="15%"> <label class="control-label">'.$date.'</label></td>
		               <input type="hidden" id="date" name="date[]"  value="'.$date.'" class="txt2" readonly="readonly"/>
					<td width="10%"> <label class="col-sm-4 control-label">'.$food_day.'</label></td>
					  <input type="text" id="day" name="day[]"  value="'.$food_day.'" class="txt2" readonly="readonly"/>
					<td width="35%">
					 
					<select  data-placeholder="Choose Food" style="width:350px;" multiple class="chosen-select" tabindex="8"  name="food_name'.$i.'[]">
						<option value="" disabled>--Select Food-- </option>';
						
					$result1=$this->ObjM->get_food_list('Lunch');	
						
						for($j=0;$j<count($result1);$j++){
			
					$html.=	'<option value="'.$result1[$j]['id'].'"';    
		
			  $result=$this->ObjM->get_food_by_date($date);
					
					for($p=0;$p<count($result);$p++){
					$fd=explode(',',$result[$p]['food_name']);
					foreach($fd as $row){
					if($row==$result1[$j]['id'])
					{
					$html.='selected';	
					}
					}
					}
					$html.='>'.$result1[$j]['name'].'</option>';
						
						}
						$html.='</select></td>
					<td width="35%">
					
					<select  data-placeholder="Choose Food" style="width:350px;" multiple class="chosen-select" tabindex="8"   name="dinner_name'.$i.'[]">
						<option value="">--Select Food-- </option>';
						
					$result2=$this->ObjM->get_food_list('Dinner');	
						
						for($k=0;$k<count($result2);$k++){
			
			 
					$html.=	'<option value="'.$result2[$k]['id'].'"';
					
					 $result3=$this->ObjM->get_food_by_date($date);
			for($pp=0;$pp<count($result3);$pp++){
				
						$dd=explode(',',$result3[$pp]['dinner_name']);
					foreach($dd as $row1){
					if($row1==$result2[$k]['id'])
					{
					$html.='selected';	
					}
					}
					
			}
				$html.='>'.$result2[$k]['name'].'</option>';
						
						}
						$html.='</select></td> </tr>';
		
		}
	echo $html;
		
	}

}
