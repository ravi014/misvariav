<?php
Class home_model extends CI_Model
{
 
	function tot_events()
 	{
		$this -> db -> select('count(*) as tot');
    	$this->db->from('web_event_master');
		$this->db->where('status','Active');
   	     $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	function tot_news()
 	{
		$this -> db -> select('count(*) as tot');
    	$this->db->from('web_news_master');
		$this->db->where('status','Active');
         $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	function tot_photo()
 	{
		$this -> db -> select('count(*) as tot');
    	$this->db->from('web_photo_gallery_master');
		$this->db->where('status','Active');
        $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	function tot_video()
 	{
		$this -> db -> select('count(*) as tot');
    	$this->db->from('web_video_list');
		$this->db->where('status','Active');
        $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_all_student()
 	{
		$this->db->select('name,username,password');
    	$this->db->from('user_master');
		$this->db->where('status','Active');
        
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	
 
}
?>
