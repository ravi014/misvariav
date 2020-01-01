<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms_page extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('cms_page_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->helper('breadcrumb');
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
 	}
	public function index()
	{
		$text=array('<i class="entypo-home"></i>Home',"CMS");
		$value=array( base_url(),base_url().'index.php/cms');
		$data['breadcrumb']=breadcrumb_view($text,$value);
		
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('cms_page_view',$data);
		$this->load->view('comman/footer');
	}
	
	function listing(){
		
		$result=$this->cms_page_model->getAll();
		
		//echo $this->db->last_query();
		echo '{ "aaData":[';
		$data = "";
		
		$rowno=0;
		for($i=0;$i<count($result);$i++)
		{	
			$rowno++;
            if($result[$i]['status']=='Active'){
                   $currentst='Active';
                   $nm='Inactive';
            }
            else{
                   $currentst='Inactive';
                   $nm='Active';
            }

			$p="";
			
			
			$p="<a href='".base_url()."index.php/cms_page/addnew/Edit/".$result[$i]['gen_cms_code']."' class='btn btn-default btn-sm' rel='tooltip' title='Edit'><i class='fa fa-pencil-square-o'></i></a>&nbsp;&nbsp;&nbsp;";
            //$p.="<a href='index.php' class='btn btn-danger btn-sm delrcd' rel='tooltip' title='Delete' value='".base_url()."index.php/achievement/deleterecord/".$result[$i]['achievement_code']."'><i class='fa fa-trash'></i></a>";
			$sta="".$currentst."&nbsp;|&nbsp;<a href='#' class='statuschange' value='".base_url()."index.php/cms_page/record_update/".$nm."/".$result[$i]['gen_cms_code']."'>".$nm."</a>";
			$rowcount=$i+1;	
			$data.='["'.$rowcount.'","'.$result[$i]['page_name'].'","'.$sta.'","'.$p.'"],';
		}
		echo substr($data,0,-1);
		echo "] }";	 	 	
	}
	
	
	function addnew(){
		
		
		
		if($this->uri->segment(3)=='Edit'){
			$data['result']		=	$this->cms_page_model->get_record($this->uri->segment(4));
		}
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('cms_page_add',$data);
		$this->load->view('comman/footer');	
	}
	function insertrecord(){
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds		
			$data = array();
    		//$data['page_type']='cms_page';
			$data['contain']=$this->input->post('contain');
			//$data['page_title']=$data['page_title'];
		
			if($this->input->post('mode')=="Add"){
				$data['create_date']	=	$nowdt;	
				//$data['create_by']=$this->session->userdata['logged_in']['usercode'];	
				$gen_cms_code		=	$this->cms_page_model->addItem($data,'gen_cms');
			}
			if($this->input->post('mode')=="Edit"){
				$data['update_date']	=	$nowdt;	
				//$data['update_by']=$this->session->userdata['logged_in']['gen_cms_code'];
				$this->cms_page_model->update($data,'gen_cms','gen_cms_code',$this->input->post('eid'));	
				$gen_cms_code		=	$this->input->post('eid');
			}
			
		}
		header('Location: '.base_url().'index.php/cms_page');
		exit;
	}
	
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->cms_page_model->update($data,'gen_cms','gen_cms_code',$this->uri->segment(4));	
		
	}
	function deleterecord(){
		//$result			=	$this->cms_page_model->get_image_name($this->uri->segment(3));
		//$path_to_file1 	=	'./upload/cms_page/'.$result[0]['photopath'];
		//$path_to_file2 	= 	'./upload/cms_page_thum/'.$result[0]['photopath'];
		//unlink($path_to_file1);
		//unlink($path_to_file2);
		$this->cms_page_model->deletercd($this->uri->segment(3));
	}
	
	function listing11(){
		$result=$this->cms_page_model->getAll();
		//var_dump($result);
		//echo $this->db->last_query();
	//	echo '{ "aaData":[';
		$data = "";
		
		$rowno=0;
		for($i=0;$i<count($result);$i++)
		{	
			$rowno++;
            if($result[$i]['status']=='Active'){
                   $currentst='Active';
                   $nm='Inactive';
            }
            else{
                   $currentst='Inactive';
                   $nm='Active';
            }
			$date1 = new DateTime($result[$i]['date']);
			$dt=date_format($date1, "j,  M  Y");

			$p="";
			
			
			$p="<a href='".base_url()."index.php/cms_page/addnew/Edit/".$result[$i]['gen_cms_code']."' class='btn btn-default btn-sm' rel='tooltip' title='Edit'><i class='entypo-pencil'></i></a>&nbsp;&nbsp;&nbsp;";
           // $p.="<a href='index.php' class='btn btn-danger btn-sm delrcd' rel='tooltip' title='Delete' value='".base_url()."index.php/cms_page/record_update/Delete/".$result[$i]['gen_cms_code']."'><i class='entypo-cancel'></i></a>";
			$sta="".$currentst."&nbsp;|&nbsp;<a href='#' class='statuschange' value='".base_url()."index.php/cms_page/record_update/".$nm."/".$result[$i]['gen_cms_code']."'>".$nm."</a>";
			$rowcount=$i+1;	
			//$data.='["'.$result[$i]['gen_cms_code'].'","'.$result[$i]['cms_page_name'].'","'.$result[$i]['cms_page_desc'].'","'.$dt.'","'.$sta.'","'.$p.'"],';
			echo '<tr>
			<td>'.$rowno.'</td>
			<td>'.$result[$i]['page_name'].'</td>
			<td>'.$sta.'</td>
			<td>'.$p.'</td>
			</tr>
			';
		}
		//echo substr($data,0,-1);
		//echo "] }";	 	 	
	}
	
	
	

}


