<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_timetable extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
			$this->load->model('student_timetable_model','ObjM',TRUE); 
	
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('form_validation');
	
		
 	}
	public function index()
	{
		$data['standard']	=	$this->ObjM->getstandard();
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('student_timetable_add',$data);
		$this->load->view('comman/footer');
	}
	
	
	function addnew($eid=null,$eid1=null){
			
		$data['standard']=$this->ObjM->getstandard();
		
		$data['division']=$this->ObjM->get_division_by_standard($eid);
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('student_timetable_add',$data);
		$this->load->view('comman/footer');	
	}
	function insertrecord(){
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
			
			
			$this->ObjM->row_delete($this->input->post('standard_code'),$this->input->post('division_code'));
			
    		for($i=1;$i<=6;$i++){
				$data = array();
				$day		=	$_POST['day_'.$i];
				$lec		=	$_POST['lac_'.$i];
				$s_time		=	$_POST['s_time_'.$i];
				$e_time		=	$_POST['e_time_'.$i];
				$subject	=	$_POST['subject_'.$i];
				$recess		=	$_POST['recess_'.$i];
				$recess_to	=	$_POST['recess_to_'.$i];
				$recess_from=	$_POST['recess_from_'.$i];
				$lec_min	=	$_POST['lec_min_'.$i];
				$rec_min	=	$_POST['rec_min_'.$i];
				
				
				
				$data		=	array();
				$data['standard_code']=$this->input->post('standard_code');	
				$data['division_code']=$this->input->post('division_code');	
				
				
		  	 for($p=0;$p<count($day);$p++){
				$data['day']	  		=	$day[$p];
				$data['lecture']  	    =	$lec[$p];
				$data['s_time']	 		=	$s_time[$p];
				$data['e_time']	 		=	$e_time[$p];
				$data['lecture_minutes']=	$lec_min[$p];
				$data['subject_code']	=	$subject[$p];
				$data['create_date']	=	$nowdt;
				if($recess[$p]=='Y'){
					$data['recess']	 		=	'Y';
					$data['recess_to']	 	=	$recess_to[$p];
					$data['recess_from']	=	$recess_from[$p];
					$data['recess_minutes']	=	$rec_min[$p];
				}
				else{
					$data['recess']	 		=	'N';
					$data['recess_to']	 	=	"";
					$data['recess_from']	=	"";
					$data['recess_minutes']	=	 0;
				}
				
				$data['master_code']=$this->session->userdata['logged_in_school']['master_code'];
				$data['create_by']=$this->session->userdata['logged_in_school']['usercode'];	
				
				
				$standard_code=$this->ObjM->addItem($data,'timetable_master');
			  	
				
			  }
		   
		
			
		 }
		 
		$this->session->set_flashdata("show_msg", " <b>Sucess</b> Record Saved successfully.....");
		header('Location: '.base_url().'index.php/student_timetable/addnew/'.$this->input->post('standard_code').'/'.$this->input->post('division_code').'');
		exit;
		 
		}
	}
	
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'timetable_master','timetable_code',$this->uri->segment(4));	
		
	}
	
	
	
	
	function get_time_tbl($standard_code=null,$division_code=null){
	
		$chk	= $this->ObjM->get_standard_by_code($standard_code);
		
		if(!isset($chk[0])){
			exit;
		}
		$html='';
		$subject		=	$this->ObjM->getsubject($standard_code);
		
		$timepicker='timepicker';
		
		$lecture		=	$this->ObjM->get_lecture();
		for($lec=1;$lec<=$lecture[0]['lecture'];$lec++){
			$html.='<tr>';
			$html.='<td><strong>'.$lec.'</strong></td>';
			
			for($day=1;$day<=6;$day++){
				
				$arr=array('day'=>$day,'lecture'=>$lec,'standard_code'=>$standard_code,'division_code'=>$division_code);
				$result		=	$this->ObjM->get_time_table_record($arr);
	
			if($result[0]['recess']!='Y'){
					$style='style="display:none;"';
					$recess_sel="";
				}
				else{
					$style='';
					$recess_sel	= "selected='selected'";
				}
			
				$sel=($result[0]['subject_code']=='-1' ? "selected='selected'" : "");
				
				$html.='<td id="td_'.$day.'_'.$lec.'" class="td_'.$day.'">
						<input type="hidden"  id="day_no" name="day_'.$day.'[]" value="'.$day.'" />
                        <input type="hidden" id="lec_no" name="lac_'.$day.'[]" value="'.$lec.'" />
						<input type="text" id="totime" name="s_time_'.$day.'[]"  value="'.$result[0]['s_time'].'"  class="txt2  '.$timepicker.'" '.$from_readonly.'  />
						<input type="text" name="lec_min_'.$day.'[]"  value="'.$result[0]['lecture_minutes'].'"  class="txt3 txtminute lec_minute time_re_set" />
						<input type="text" id="fromtime" name="e_time_'.$day.'[]"  value="'.$result[0]['e_time'].'"  class="txt2" readonly="readonly" />
						<select class="sel2" name="subject_'.$day.'[]">
                    		<option value="">Select subject </option>
							<option '.$sel.' value="-1">Free </option>";
							'.$this->get_subject($subject,$result[0]['subject_code']).'
						</select>
						
					
						<select id="recess_status" class="sel2 time_re_set" name="recess_'.$day.'[]">
                    		<option value="N">No Recess</option>
							<option '.$recess_sel.' value="Y">Set Recess</option>
						</select>
						
						<div class="recess_div" '.$style.'>
							<input type="text" id="to_recess" name="recess_to_'.$day.'[]"  value="'.$result[0]['recess_to'].'"  class="txt2 control-field" readonly="readonly" />
							<input type="text" name="rec_min_'.$day.'[]"  value="'.$result[0]['recess_minutes'].'" placeholder="Min." class="txt3 rec_minute time_re_set txtminute" />
							<input type="text" id="from_recess" name="recess_from_'.$day.'[]"  value="'.$result[0]['recess_from'].'" class="txt2 control-field" readonly="readonly"/>
						</div>
				</td>';	
				
			}//day	
			$timepicker='';
			$from_readonly='readonly="readonly"';
			$html.='</tr><tr><td colspan="6" class="septer">&nbsp;</td></tr>';
		}//lec
		
		echo $html;
	}
	
	
	protected function get_subject($data=null,$id=null){
		$html='';
		for($i=0;$i<count($data);$i++){
			$sel=($data[$i]['subject_code']==$id	?  "selected='selected'"	:	"");
			$html.='<option '.$sel.' value="'.$data[$i]['subject_code'].'">'.$data[$i]['subject_name'].'</option>';	
		}
		return $html;
	}
	
	//// Report Detail //////
	public function report()
	{ 
		$timetable=$this->ObjM->getAll();
		//var_dump($timetable); exit;
		header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
        header('Content-disposition: attachment;filename=Time-Table.csv');
		$outstr = '';
		echo "Sn,Standard Name,Day,Lecture,Time,Subject Name,Note".PHP_EOL;
		$no=1;
			foreach($timetable as $data)
			{
			 $standard_name2		=	$data['standard_name'];
			 $day					=	$data['day'];
			 $lecture				=	$data['lecture'];
			 $time					=	$data['time'];
			 $subject_name 			=	$data['subject_name'];
			 $note		=	$data['note'];
			 
			 $outstr .='"'.$no.'",';
			 $outstr .='"'.$standard_name.'",';
			 $outstr .='"'.$day.'",';
			 $outstr .='"'.$lecture.'",';
			 $outstr .='"'.$time.'",';
			 $outstr .='"'.$subject_name.'",';
			 $outstr .='"'.$note.'",';
			 $outstr .="\n";
			 $no++;
			}
		echo $outstr; 
	 }
	 
	 function get_time_set()
	 {
		$totime = strtotime($_REQUEST['totime']);
		$fromtime=$totime+(60*$_REQUEST['minute']);
		$fromtime=date('g:iA', $fromtime);
		$arr=array('fromtime'=>$fromtime);
		echo json_encode($arr);
	 }
	
	function get_division_by_standard($eid=null){
		$html='<option value="">--All--</option>';
		$result=$this->ObjM->get_division_by_standard($eid);
		
		if(count($result)==0){
			echo 0;
			
			}
			else{
		for($i=0;$i<count($result);$i++){
			$sel=($result[$i]['id']==$selected) ? "selected='selected'" : "";
			$html.='<option '.$sel.' value="'.$result[$i]['id'].'">'.$result[$i]['name'].'</option>';
		}
		echo $html;
			}
	}


}


