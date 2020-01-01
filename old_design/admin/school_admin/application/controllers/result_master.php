<?php 
ob_start();

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class result_master extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('result_master_model','ObjM',TRUE);
	if(!$this->session->userdata('logged_in_school')){
			header('Location: '.main_url().'index.php/login');
			exit;
		}
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
 	}
	public function index()
	{
		/*$data['standard']	=	$this->ObjM->getstandard();
		$data['exam_type']	=	$this->ObjM->get_exam_type();*/
		$data['year']	=	$this->ObjM->get_year();
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('result_master_add',$data);
		$this->load->view('comman/footer');
	}
	
	
	function addnew($standard_code,$division_code,$subject_code,$exam,$year){
		$data['year']	=	$this->ObjM->get_year();
		$data['standard']	=	$this->ObjM->get_standard_by_year($year);
		$data['exam_type']	=	$this->ObjM->get_exam_by_standard($standard_code);
	
		$data['division']	=	$this->ObjM->get_division_by_standard($standard_code);
	$data['subject']	=	$this->ObjM->getsubject($standard_code);
	$data['html']=$this->get_result1($standard_code,$division_code,$subject_code,$exam,$year);
	
	$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('result_master_add',$data);
		$this->load->view('comman/footer');	
	}
	
	function insertrecord(){
			if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
			
		//	var_dump($_POST); exit;
			$this->form_validation->set_rules('standard_code', 'Standard ', 'required');
	 
	$this->form_validation->set_rules('exam_type_code', 'Exam', 'required');
	 $this->form_validation->set_rules('subject_code', 'Subject', 'required');
	  $this->form_validation->set_rules('year', 'year', 'required');
	  $this->form_validation->set_rules('marks', 'marks', 'required');
	  $this->form_validation->set_rules('division_code', 'Division', 'required');

		if ($this->form_validation->run() == FALSE)
	 	{
			
		$this->index();
	
		}
		
		else{
		
			$this->ObjM->row_delete($this->input->post('standard_code'),$this->input->post('division_code'),$this->input->post('subject_code'),$this->input->post('exam_type_code'));
			$student_yearly_code  = $this->input->post('student_yearly_code');	
		
			$account_year_code=$this->input->post('year');	
		
			$exam_type_code	=	$this->input->post('exam_type_code');	
			$marks	=	$this->input->post('marks');
			
			for($r=0;$r<count($student_yearly_code);$r++){
				$data        		=	array();
				$data['student_yearly_code']  = 	$student_yearly_code[$r];
				$data['standard_code'] 		  = 	$this->input->post('standard_code');
				$data['division_code'] 		  = 	$this->input->post('division_code');	
				$data['subject_code']  		  = 	$this->input->post('subject_code');
				$data['exam_type_code']		  =     $exam_type_code; 
				$data['marks']				  =     $marks[$r]; 
				
				$data['account_year_code']	  =     $account_year_code; 
				$data['create_date']=	$nowdt;
				$data['create_by']=	$this->session->userdata['logged_in_school']['usercode'];
				$data['master_code']=$this->session->userdata['logged_in_school']['master_code'];
				//var_dump($data); exit;
			    $food_code=$this->ObjM->addItem($data,'result_master');
			}
		}
		
		}
		
		header('Location: '.base_url().'index.php/result_master/addnew/'.$this->input->post('standard_code').'/'.$this->input->post('division_code').'/'.$this->input->post('subject_code').'/'.$this->input->post('exam_type_code').'/'.$this->input->post('year').'');
		exit;
		//$this->addnew($this->input->post('standard_code'),$this->input->post('division_code'),$this->input->post('subject_code'),$this->input->post('exam_type_code'),$this->input->post('year'));
		
	}
	
	
  function get_result($standard_code,$division_code,$subject_code,$exam,$year){
	
		$chk	= $this->ObjM->get_standard_by_code($standard_code);
		if(!isset($chk[0])){
			exit;
		}
		$html='';
		$subject		=	$this->ObjM->getsubject($standard_code);
		$all_student = $this -> ObjM -> getAll($standard_code,$division_code);
		//echo $this->db->last_query(); exit;
		$get_record = $this -> ObjM -> get_student_by_division($standard_code,$division_code,$subject_code);
	//echo $this->db->last_query(); exit;
		
		//$exam_type	=	$this->ObjM->get_exam_type();
		//echo $this->db->last_query(); exit;
		$get_marks=$this -> ObjM -> get_marks($standard_code,$subject_code,$exam,$year);
		if(count($all_student)==0){
			$html1.='<tr><td colspan="10"><h3 class="clsmsg">No data available</h3></td></tr>';
	echo $html1;
	
			}
			else{
	for($i=0;$i<count($all_student);$i++){
			$row=$i+1;
			
			$html.='<tr>';
			$html.='<td><strong>'.$row.'</strong></td>
					<td><strong>'.$all_student[$i]['student_name'].'</strong></td>
					<input type="hidden" name="student_yearly_code[]"  value="'.$all_student[$i]['student_yearly_code'].'"  class="txt3" />
			
			<input type="hidden" name="min" id="min" value="'.$get_marks[0]['min_marks'].'"  class="txt3" />
			<input type="hidden" name="max" id="max"   value="'.$get_marks[0]['max_marks'].'"  class="txt3" />
			
				<td> &nbsp; &nbsp;<input type="text" name="marks[]"  id="marks'.$row.'" onChange="gettt1('.$row.')"  value="'.$get_record[$i]['marks'].'"  class="txt3" /></td></tr>';
			
			//$html.='</tr><tr><td colspan="8" class="septer">&nbsp;</td></tr>';
		}
		echo $html;
		
		}
	}
	
	
	
	 function get_result1($standard_code,$division_code,$subject_code,$exam,$year){
	
		$chk	= $this->ObjM->get_standard_by_code($standard_code);
		if(!isset($chk[0])){
			exit;
		}
		$html='';
		$subject		=	$this->ObjM->getsubject($standard_code);
		$all_student = $this -> ObjM -> getAll($standard_code,$division_code);
		//echo $this->db->last_query(); exit;
		$get_record = $this -> ObjM -> get_student_by_division($standard_code,$division_code,$subject_code);
	//echo $this->db->last_query(); exit;
		
		//$exam_type	=	$this->ObjM->get_exam_type();
		//echo $this->db->last_query(); exit;
		$get_marks=$this -> ObjM -> get_marks($standard_code,$subject_code,$exam,$year);
		if(count($all_student)==0){
			$html1.='<tr><td colspan="10"><h3 class="clsmsg">No data available</h3></td></tr>';
	return $html1;
	
			}
			else{
	for($i=0;$i<count($all_student);$i++){
			$row=$i+1;
			
			$html.='<tr>';
			$html.='<td><strong>'.$row.'</strong></td>
					<td><strong>'.$all_student[$i]['student_name'].'</strong></td>
					<input type="hidden" name="student_yearly_code[]"  value="'.$all_student[$i]['student_yearly_code'].'"  class="txt3" />
			
			<input type="hidden" name="min" id="min" value="'.$get_marks[0]['min_marks'].'"  class="txt3" />
			<input type="hidden" name="max" id="max"   value="'.$get_marks[0]['max_marks'].'"  class="txt3" />
			
				<td><input type="text" name="marks[]" id="marks'.$row.'" onChange="gettt1('.$row.')"  value="'.$get_record[$i]['marks'].'"  class="txt3" /></td></tr>';
			
			//$html.='</tr><tr><td colspan="8" class="septer">&nbsp;</td></tr>';
		}
		return $html;
		
		}
	}
	
function get_exm_det($eid){
	$data=array();
	$data['division_code']			=	$this->get_division_by_standard($eid);
	$data['subject_code']			=	$this->get_subject_by_standard($eid);
	$data['exam_type_code']			=	$this->get_exam($eid);
			echo json_encode($data);
	
}
////  GET All Division by Standard ////
	
	
	function get_division_by_standard($eid){
		$html='<option value="">--Select--</option>';
		$result=$this->ObjM->get_division_by_standard($eid);
		
		if(count($result)==0){
			$html1.='<option '.$sel.' value="0">--NO DIVISION--</option>';
	return $html1;
			}
			else{
		for($i=0;$i<count($result);$i++){
			$sel=($result[$i]['id']==$selected) ? "selected='selected'" : "";
			$html.='<option '.$sel.' value="'.$result[$i]['id'].'">'.$result[$i]['name'].'</option>';
		}
			return $html;
			}
		
	}
	
////  GET All Subject by Standard ////
	function get_subject_by_standard($eid){
		$html1='<option value="">--Select--</option>';
		$result=$this->ObjM->get_subject_by_standard($eid);
		for($i=0;$i<count($result);$i++){
			$sel=($result[$i]['subject_code']==$selected) ? "selected='selected'" : "";
			$html1.='<option '.$sel.' value="'.$result[$i]['subject_code'].'">'.$result[$i]['subject_name'].'</option>';
		}
		return $html1;
	}



function get_standard($eid){
		$html1='<option value="">--Select--</option>';
		$result=$this->ObjM->get_standard_by_year($eid);
		for($i=0;$i<count($result);$i++){
			$sel=($result[$i]['standard_code']==$selected) ? "selected='selected'" : "";
			$html1.='<option '.$sel.' value="'.$result[$i]['standard_code'].'">'.$result[$i]['standard_name'].'</option>';
		}
		echo $html1;
	}
	
	
	function get_exam($eid){
		$html1='<option value="">--Select--</option>';
		$result=$this->ObjM->get_exam_by_standard($eid);
		for($i=0;$i<count($result);$i++){
			$sel=($result[$i]['exam_type_code']==$selected) ? "selected='selected'" : "";
			$html1.='<option '.$sel.' value="'.$result[$i]['exam_type_code'].'">'.$result[$i]['exam_title'].'</option>';
		}
		return $html1;
	}


}


