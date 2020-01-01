<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Achievement extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('achievement_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('upload');
		$this->load->library('image_lib');
		//$this->load->helper('breadcrumb');
		if(!$this->session->userdata('logged_in_school')){header('Location: '.main_url().'index.php/login');exit;}
		
 	}
	public function index()
	{
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('achievement_view',$data);
		$this->load->view('comman/footer');
	}
	function listing(){
		
		$result=$this->achievement_model->getAll();
		
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
			
			
			$p="<a href='".base_url()."index.php/achievement/addnew/Edit/".$result[$i]['achievement_code']."' class='btn btn-default btn-sm' rel='tooltip' title='Edit'><i class='fa fa-pencil-square-o'></i></a>&nbsp;&nbsp;&nbsp;";
            $p.="<a href='index.php' class='btn btn-danger btn-sm delrcd' rel='tooltip' title='Delete' value='".base_url()."index.php/achievement/deleterecord/".$result[$i]['achievement_code']."'><i class='fa fa-trash'></i></a>";
			$sta="".$currentst."&nbsp;|&nbsp;<a href='#' class='statuschange' value='".base_url()."index.php/achievement/record_update/".$nm."/".$result[$i]['achievement_code']."'>".$nm."</a>";
			$rowcount=$i+1;	
			$data.='["'.$rowcount.'","'.$result[$i]['achievement_name'].'","'.$sta.'","'.$p.'"],';
		}
		echo substr($data,0,-1);
		echo "] }";	 	 	
	}
	
	function addnew(){
		
		if($this->uri->segment(3)=='Edit'){
			$data['result']=$this->achievement_model->get_record($this->uri->segment(4));
		}
		$this->load->view('comman/topheader');
		$this->load->view('comman/header');
		$this->load->view('achievement_add',$data);
		$this->load->view('comman/footer');	
	}
	function insertrecord(){
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{	
			$now = time();
			$nowdt=unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
			$data = array();
			$data['achievement_name']		=	$this->input->post('achievement_name');
			$new_date = date('Y-m-d', strtotime($this->input->post('timedt')));
			$data['date']=$new_date;
			
			if($_FILES['img_path']['name'])
			{
					$config = array();
    				$config['upload_path'] 		= '../upload/img';
    				$config['allowed_types'] 	= 'gif|jpg|png';
    				$config['max_size']      	= '0';
    				$config['overwrite']     	= TRUE;
				
					$_FILES['userfile']['name'] 		= 	$_FILES['img_path']['name'];
        			$_FILES['userfile']['type'] 		= 	$_FILES['img_path']['type'];
        			$_FILES['userfile']['tmp_name']		= 	$_FILES['img_path']['tmp_name'];
        			$_FILES['userfile']['error']		= 	$_FILES['img_path']['error'];
        			$_FILES['userfile']['size']			= 	$_FILES['img_path']['size'];
					$image_info = getimagesize($_FILES['userfile']['tmp_name']);
					
					$image_width = $image_info[0];
					$image_height = $image_info[1];
					
					//if($image_width > 460 || $image_width < 460){
						//header('Location: '.base_url().'index.php/event/addnew/'.$this->input->post('mode').'/'.$this->input->post('eid').'/er');
						//exit;
					//} 
					$rand=rand(100000,10000000);
					$fileName=$rand.$_FILES['img_path']['name'];
					
					$string = $fileName;
					$lastDot = strrpos($string, ".");
					$fileName12 = str_replace(".", "", substr($string, 0, $lastDot)) . substr($string, $lastDot);
					$fileName=str_replace(" ","",$fileName12);
					
					
        			$config['file_name'] = $fileName;
    				$this->upload->initialize($config);
    				$this->upload->do_upload();
					$data['img_path']	=	$fileName;
					
					////////////
						$upload_data = $this->upload->data();
						$image_config["image_library"] = "gd2";
						$image_config["source_image"] = $upload_data["full_path"];
						$image_config['create_thumb'] = FALSE;
						$image_config['maintain_ratio'] = TRUE;
						$image_config['new_image'] = '../upload/img_thum/'.$fileName;
						$image_config['quality'] = "100%";
						$image_config['width'] = 200;
						$image_config['height'] = 200;
						
						$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
						$image_config['master_dim'] = ($dim > 0)? "height" : "width";
						$this->load->library('image_lib');
						$this->image_lib->initialize($image_config);
						if(!$this->image_lib->resize()){ //Resize image
							$this->image_lib->display_errors('<p>', '</p>');
						}
					////////////
			}	
			if($this->input->post('mode')=="Add")
			{
				//$data['create_date']	=	$nowdt;	
				//$data['create_by']		=	$this->session->userdata['logged_in']['usercode'];	
				$country_code			=	$this->achievement_model->addItem($data,'achievement_master');
			}
			if($this->input->post('mode')=="Edit")
			{
				//$data['update_date']	=	$nowdt;	
				//$data['update_by']		=	$this->session->userdata['logged_in']['usercode'];
				$this->achievement_model->update($data,'achievement_master','achievement_code',$this->input->post('eid'));	
			}
			
		}
		header('Location: '.base_url().'index.php/achievement');
		exit;
	}
	
	function record_update(){
		$data=array();
		$data['status']=$this->uri->segment(3);
		$this->achievement_model->update($data,'achievement_master','achievement_code',$this->uri->segment(4));	
		
	}
	function deleterecord(){
		$this->achievement_model->deletercd($this->uri->segment(3));
	}


}


