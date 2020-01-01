<?php
Class division_mst_model extends CI_Model
{
 	function getAll($eid)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('division_master');
		$this -> db -> where('standard_code',''.$eid.'');
   		$this -> db -> where('status !=', 'Delete');
        $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
 
 
	
	function get_standard_all(){
		$this -> db -> select('standard_code, standard_name');
   		$this -> db -> from('standard_master');
   		$this -> db -> where('status', 'Active');
		$this -> db -> where('division', 'Y');
		$this -> db -> order_by('standard_code', 'desc');
		    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_standard_by_id($eid)
	{
		$this -> db -> select('*');
   		$this -> db -> from('standard_master');
   		$this -> db -> where('standard_code', ''.$eid.'');
    	    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_countdiv($eid)
	{
		$this -> db -> select('count(*) as tot');
   		$this -> db -> from('division_master');
		$this -> db -> where('standard_code',''.$eid.'');
		$this -> db -> where('status !=','Delete');
        $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return ((int)$the_content[0]['tot'])+1;
	}
	
	function get_division_record($eid)
	{
		$this -> db -> select('division_master.*');
		$this -> db -> select('standard_master.standard_name');
   		$this -> db -> from('division_master');
		
		$this -> db -> join('standard_master','standard_master.standard_code = division_master.standard_code','left');
		
		$this -> db -> where('division_master.division_code',''.$eid.'');		
        $this -> db -> where('standard_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
        $this -> db -> where('division_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
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
