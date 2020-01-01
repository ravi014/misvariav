<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class feedback extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('feedback_model','ObjM',TRUE);
   		
	if(!$this->session->userdata('logged_in_school')){
			header('Location: '.main_url().'index.php/login');
			exit;
		}
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('date');
 	}
	public function view()
	{
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('feedback_view');
		$this->load->view('comman/footer');
	}
	
	
	function listing($st){
		$result=$this->ObjM->getAll($st);
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
			
			$row=$i+1;
			if($result[$i]['user_type_id']==3){ $usertype='Student'; }
			
			if($result[$i]['feedback_replay']==''){
			
			 $btn ='<div class="btn-group">
						<button data-toggle="dropdown" type="button" class="btn '.$btn_class.' btn-xs dropdown-toggle">
						   Opration <span class="caret"></span>
						</button>
						<ul role="menu" class="dropdown-menu">
						 <li><a href="'.base_url().'index.php/'.$this->uri->segment(1).'/feedback_replay/'.$result[$i]['id'].'">Replay</a></li>
						</ul>
					</div>';
				}
				else{
					$btn = '';
					}	
					
			$html.='<tr>
			        <td><input type="checkbox" class="wall_chk" name="checkbox[]" value="'.$result[$i]['id'].'"></td>
					<td>'.$row.'</td>
					<td>'.$usertype.'</td>
					<td>'.$result[$i]['name'].'</td>
					<td>'.$result[$i]['phone_no'].' '.$result[$i]['mobileno'].'</td>
					<td>'.$result[$i]['feedback'].'</td>
					<td>'.$result[$i]['feedback_replay'].'</td>
					<td>'.$btn.'</td>
				   </tr>';
		}
		echo $html; 
			 	
	}
	
	function  feedback_replay($eid)
	{
		$data['segment']=array('eid'=>$eid);
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('feedback_replay_add',$data);
		$this->load->view('comman/footer');
		
	}
	function insertrecord()
	{
	  	if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
	
		$this->form_validation->set_rules('feedback_replay', 'Feedback Reply', 'required');
	
		if ($this->form_validation->run() == FALSE)
	 	{
		 	
	
		$this->feedback_replay($this->input->post('eid'));
	
		}
		
		else{
		
	
		$data['feedback_replay']		=	data_filter($this->input->post('feedback_replay'));	
    	$data['master_code']		=$this->session->userdata['logged_in_school']['master_code'];
$id=$this->ObjM->update($data,'feedback','id',$this->input->post('eid'));
			//echo $this->db->last_query(); exit;
			
		
		header('Location: '.base_url().'index.php/feedback/view');
		exit;
		}
		}
	}
	
	
	
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->ObjM->update($data,'feedback','id',$this->uri->segment(4));	
		
	}
	
	function delete_feedback(){
		$id=$_REQUEST['id'];
	    $id=explode(',',$id);
		$data['status']= 'Delete';
		for($i=0;$i<count($id);$i++)
		 {
	 	  if($id[$i]!='')
		   {
		     $this->ObjM->update($data,'feedback','id',$id[$i]);	
		   }
		}
		header('Location: '.base_url().'index.php/feedback/view');
		exit;
	  }

}


