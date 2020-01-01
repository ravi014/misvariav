<?php
Class Year_mst_model extends CI_Model
{
 	
 	function getAll()
 	{
		$this -> db -> select('account_year_mst.*');
    	$this->db->from('account_year_mst');
		$this->db->order_by("account_year_mst.account_year_code","desc");
		$this->db->where('account_year_mst.status !=','Delete');
    $this -> db -> where('account_year_mst.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	 
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
 
	function get_year_mst_name(){
		$this -> db -> select('yeanm');
   		$this -> db -> from('account_year_mst');
   $this->db->where('status !=','Delete');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('account_year_mst');
   		$this -> db -> where('account_year_code', ''.$eid.'');
	 $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

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
  
  
	function get_year_mst()
 	{
		$this -> db -> select('*');
    	$this->db->from('account_year_mst');
		$this -> db -> where('account_year_mst.status','Active');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

    	$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
}
?>
