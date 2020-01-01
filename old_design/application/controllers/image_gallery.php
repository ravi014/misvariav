<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class image_gallery extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
		$this->load->model('image_gallery_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
	
		
 	}
	public function index()
	{
		$data['header_img']			=	$this->image_gallery_model->get_header_img();
		$data['result_2020']		=	$this->get_event_load('2020');
		$data['result_2019']		=	$this->get_event_load('2019');
		$data['result_2018']		=	$this->get_event_load('2018');
		$data['result_2017']		=	$this->get_event_load('2017');
		$data['result_2016']		=	$this->get_event_load('2016');
		$data['result_2015']		=	$this->get_event_load('2015');
		$data['result_2014']		=	$this->get_event_load('2014');
		$data['result_2013']		=	$this->get_event_load('2013');
		$data['result_2012']		=	$this->get_event_load('2012');
		
		$count_2020	=	$this->image_gallery_model->count_row('2020');
		$pageno10=$count_2020[0]['tot']/15;
		if($count_2020[0]['tot']%15!=0){$pageno10++;}
		$data['pageno10']=$pageno10;
		
		$count_2019	=	$this->image_gallery_model->count_row('2019');
		$pageno9=$count_2019[0]['tot']/15;
		if($count_2019[0]['tot']%15!=0){$pageno9++;}
		$data['pageno9']=$pageno9;
		
		$count_2018	=	$this->image_gallery_model->count_row('2018');
		$pageno8=$count_2018[0]['tot']/15;
		if($count_2018[0]['tot']%15!=0){$pageno8++;}
		$data['pageno8']=$pageno8;
		
		$count_2017	=	$this->image_gallery_model->count_row('2017');
		$pageno7=$count_2017[0]['tot']/15;
		if($count_2017[0]['tot']%15!=0){$pageno7++;}
		$data['pageno7']=$pageno7;
		
		$count_2016	=	$this->image_gallery_model->count_row('2016');
		$pageno6=$count_2016[0]['tot']/15;
		if($count_2016[0]['tot']%15!=0){$pageno6++;}
		$data['pageno6']=$pageno6;
		
		$count_2015	=	$this->image_gallery_model->count_row('2015');
		$pageno5=$count_2015[0]['tot']/15;
		if($count_2015[0]['tot']%15!=0){$pageno5++;}
		$data['pageno5']=$pageno5;
		
		$count_2014	=	$this->image_gallery_model->count_row('2014');
		$pageno4=$count_2014[0]['tot']/15;
		if($count_2014[0]['tot']%15!=0){$pageno4++;}
		$data['pageno4']=$pageno4;
		
		$count_2013	=	$this->image_gallery_model->count_row('2013');
		$pageno3=$count_2013[0]['tot']/15;
		if($count_2013[0]['tot']%15!=0){$pageno3++;}
		$data['pageno3']=$pageno3;
				
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('image_gallery_view',$data);
		$this->load->view('comman/footer');
	}
	
	public function view()
	{
		$data['header_img']	=	$this->image_gallery_model->get_header_img();

		$data['result_2016']		=	$this->get_event_load('2016');
		$data['result_2015']		=	$this->get_event_load('2015');
		$data['result_2014']		=	$this->get_event_load('2014');
		$data['result_2013']		=	$this->get_event_load('2013');
		
	
		$count_2016	=	$this->image_gallery_model->count_row('2016');
		$pageno6=$count_2016[0]['tot']/15;
		if($count_2016[0]['tot']%15!=0){$pageno6++;}
		$data['pageno6']=$pageno6;
	
		$count_2015	=	$this->image_gallery_model->count_row('2015');
		$pageno5=$count_2015[0]['tot']/15;
		if($count_2015[0]['tot']%15!=0){$pageno5++;}
		$data['pageno5']=$pageno5;
		
		
		$count_2014	=	$this->image_gallery_model->count_row('2014');
		$pageno4=$count_2014[0]['tot']/15;
		if($count_2014[0]['tot']%15!=0){$pageno4++;}
		$data['pageno4']=$pageno4;
		
		$count_2013	=	$this->image_gallery_model->count_row('2013');
		$pageno3=$count_2013[0]['tot']/15;
		if($count_2013[0]['tot']%15!=0){$pageno3++;}
		$data['pageno3']=$pageno3;
				
		$this->load->view('comman/top_header');
		$this->load->view('comman/header_menu');
		$this->load->view('image_gallery_view',$data);
		$this->load->view('comman/footer');
	}
	
	function get_event(){
		//echo $this->db->last_query();
		//var_dump($result);
		$result=$this->image_gallery_model->get_eventname($this->uri->segment(3));
		
		for($i=0;$i<count($result);$i++){
			
			$dt=$this->image_gallery_model->get_eventimage($result[$i]['event_code']);
			$res[] = array(
				'event_code'=>$result[$i]['event_code'],
				'photopath'=>$dt[0]['photopath'],
				'cover_img'=>$result[$i]['cover_img'],
				'event_name'=>$result[$i]['event_name']
			);
		
		}
	echo json_encode($res);
		
		
	}
	
	function get_event_load($year){
		$result=$this->image_gallery_model->get_eventname('0','15',$year);
		//echo $this->db->last_query();
		return $result;
	}
	
	function get_event_page(){
		$b	=	15;
		$a	=	($this->uri->segment(4)-1)*15;
		$result		=	$this->image_gallery_model->get_eventname($a,$b,$this->uri->segment(3));
		
		
		echo'<ul id="event_ul">';
		for($i=0;$i<count($result);$i++){	
			echo '<li>
					<a href="'.base_url().'index.php/gallery_list/view/'.$result[$i]["gallery_code"].'">
						<div id="imgdiv"><img src="'.base_url().'admin/upload/event_thum/'.$result[$i]["gallery_cover_img"].'" /><div id="event_title"><h2>'.$result[$i]["gallery_name"].'</h2></div></div>
					</a>
				</li>';
		 } 
		echo '</ul>';
	}
	

}




