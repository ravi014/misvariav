<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_gallery extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('video_gallery_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		//$this->load->helper('bradecrume');
		
 	}
	public function index()
	{
		$data['header_img']	=	$this->video_gallery_model->get_header_img();
		
		$data['video10']	=	$this->video_gallery_model->get_video('0','15','2020');
		$data['video9']		=	$this->video_gallery_model->get_video('0','15','2019');
		$data['video8']		=	$this->video_gallery_model->get_video('0','15','2018');
		$data['video7']		=	$this->video_gallery_model->get_video('0','15','2017');
		$data['video6']		=	$this->video_gallery_model->get_video('0','15','2016');
		$data['video5']		=	$this->video_gallery_model->get_video('0','15','2015');
		$data['video4']		=	$this->video_gallery_model->get_video('0','15','2014');
		$data['video3']		=	$this->video_gallery_model->get_video('0','15','2013');		
			
		$count			=	$this->video_gallery_model->count_row('2020');
		$pageno			=	$count[0]['tot']/15;
		if($count[0]['tot']%15!=0){$pageno++;}
		$data['pageno10']=	$pageno;
		
		$count			=	$this->video_gallery_model->count_row('2019');
		$pageno			=	$count[0]['tot']/15;
		if($count[0]['tot']%15!=0){$pageno++;}
		$data['pageno9']=	$pageno;
		
		$count			=	$this->video_gallery_model->count_row('2018');
		$pageno			=	$count[0]['tot']/15;
		if($count[0]['tot']%15!=0){$pageno++;}
		$data['pageno8']=	$pageno;
		
		$count			=	$this->video_gallery_model->count_row('2017');
		$pageno			=	$count[0]['tot']/15;
		if($count[0]['tot']%15!=0){$pageno++;}
		$data['pageno7']=	$pageno;
		
		$count			=	$this->video_gallery_model->count_row('2016');
		$pageno			=	$count[0]['tot']/15;
		if($count[0]['tot']%15!=0){$pageno++;}
		$data['pageno6']=	$pageno;
		
		$count			=	$this->video_gallery_model->count_row('2015');
		$pageno			=	$count[0]['tot']/15;
		if($count[0]['tot']%15!=0){$pageno++;}
		$data['pageno5']=	$pageno;

		$count		=	$this->video_gallery_model->count_row('2014');
		$pageno		=	$count[0]['tot']/15;
		if($count[0]['tot']%15!=0){$pageno++;}
		$data['pageno4']	=	$pageno;
		
		$count		=	$this->video_gallery_model->count_row('2013');
		$pageno		=	$count[0]['tot']/15;
		if($count[0]['tot']%15!=0){$pageno++;}
		$data['pageno3']=$pageno;
		
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('video_gallery_view',$data);
		$this->load->view('comman/footer');
	}
	public function view(){
		$data['video']		=	$this->video_gallery_model->get_record($this->uri->segment(3));
		$this->load->view('video_view',$data);
	}
	function get_event_page(){
		$b	=	15;
		$a	=	($this->uri->segment(4)-1)*15;
		$video		=	$this->video_gallery_model->get_video($a,$b,$this->uri->segment(3));
		echo'<ul id="event_ul">';
		for($i=0;$i<count($video);$i++){
							echo'<li>
									<a href="#" id="openform" value="'.$video[$i]["video_code"].'">
									<div id="imgdiv" style="background-image:url('.base_url().'admin/upload/image_thum/'.$video[$i]["cover_img"].')">
										<img src="'.base_url().'asset/img/play.png" width="170" />
									</div>
									<div id="event_title"><h2>'.$video[$i]["video_name"].'</h2></div>
									</a>
								</li>';
							 } 
		echo'</ul>';
	}
	
	
}


