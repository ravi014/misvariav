<?php
Class resume_model extends CI_Model
{
 	function getAll()
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('resume_master');
   		$this -> db -> where('status !=', 'Delete');
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
 
	function get_record($eid)
 	{
		$this -> db -> select('*');
   		$this -> db -> from('resume_master');
		$this -> db -> where('resume_code', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_languages_name()
 	{
		$this -> db -> select('*');
   		$this -> db -> from('languages_master');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_languages($eid)
 	{
		$this -> db -> select('resume_languages.*,resume_master.*,languages_master.*');
   		$this -> db -> from('resume_languages');
		$this -> db -> join('resume_master','resume_languages.resume_code = resume_master.resume_code','left');	
		$this -> db -> join('languages_master','resume_languages.languages = languages_master.language_code','left');
		$this -> db -> where('resume_master.resume_code', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	function get_academic($eid)
 	{
		$this -> db -> select('resume_qualification.*,resume_master.*');
   		$this -> db -> from('resume_qualification');
		$this -> db -> join('resume_master','resume_qualification.resume_code = resume_master.resume_code','left');	
		$this -> db -> where('resume_qualification.type','Academic');
		$this -> db -> where('resume_master.resume_code', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	function get_professional($eid)
 	{
		$this -> db -> select('resume_qualification.*,resume_master.*');
   		$this -> db -> from('resume_qualification');
		$this -> db -> join('resume_master','resume_qualification.resume_code = resume_master.resume_code','left');	
		$this -> db -> where('resume_qualification.type','Professional');
		$this -> db -> where('resume_master.resume_code', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function get_experience($eid)
 	{
		$this -> db -> select('resume_works_experience.*,resume_master.*');
   		$this -> db -> from('resume_works_experience');
		$this -> db -> join('resume_master','resume_works_experience.resume_code = resume_master.resume_code','left');	
		$this -> db -> where('resume_master.resume_code', ''.$eid.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	function addItem($data,$table){
    	$this->db->insert($table , $data);
    	return $this->db->insert_id();
	}
	
	function update($data,$table,$wherefield,$wherevalue){
		$this->db->where($wherefield, $wherevalue);
		$this->db->update($table, $data); 
	}
  	
  
	
}
?>
