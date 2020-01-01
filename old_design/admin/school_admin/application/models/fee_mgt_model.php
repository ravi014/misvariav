<?php
Class fee_mgt_model extends CI_Model
{
 	
 	function getAll()
 	{
		$this->db->select('standard_master.*');
    	$this->db->from('standard_master');
		$this->db->order_by("standard_master.standard_code","Asc");
		$this->db->where('standard_master.status','Active');
   		$this->db->where('standard_master.create_by',''.$this->session->userdata['logged_in_school']['usercode'].'');		
		$this->db->where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	 
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
 
	
	
	function get_standard($eid){
		$this -> db -> select('*');
   		$this -> db -> from('standard_master');
   		$this -> db -> where('standard_code', ''.$eid.'');
		$this -> db -> where('status','Active');
		$this -> db -> where('create_by', ''.$this->session->userdata['logged_in_school']['usercode'].'');
     	$this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_account_year(){
		$this -> db -> select('*');
   		$this -> db -> from('account_year_mst');
		$this -> db -> where('status', 'Active');

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function get_fee_head(){
		$this -> db -> select('*');
   		$this -> db -> from('erp_fee_head');
		$this -> db -> where('status', 'Active');

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
  	
	function get_fee_amount_by_id($arr){
		$CI =& get_instance();
		$CI -> db -> select('*');
		$CI -> db -> from('erp_fee_master');
		$CI -> db -> where('standard_code',''.$arr['standard_code'].'');
		$CI -> db -> where('account_year_code',''.$arr['account_year_code'].'');
		$CI -> db -> where('head_code',''.$arr['eid'].'');
    	$query = $CI -> db -> get();
    	$the_content = $query->result_array();
    	return  $the_content;
	}
	
	function get_total_fee_by_type($arr){
		$CI =& get_instance();
		$CI -> db -> select('SUM(erp_fee_master.amount) as tot');
		$CI -> db -> from('erp_fee_master');
		$CI -> db -> where('erp_fee_master.standard_code',''.$arr['standard_code'].'');
		$CI -> db -> where('erp_fee_master.account_year_code',''.$arr['account_year_code'].'');
		$CI -> db -> join('erp_fee_head','erp_fee_head.id = erp_fee_master.head_code','left');
		$CI -> db -> where('erp_fee_head.status !=','Delete');
    	$query = $CI -> db -> get();
    	$the_content = $query->result_array();
    	return  (float)$the_content[0]['tot'];
	}
	function get_fee_install(){
		$this -> db -> select('*');
   		$this -> db -> from('fee_installment_term');

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_fee_installments($arr){
		$this -> db -> select('*');
   		$this -> db -> from('fee_installment_detail');
		$this -> db -> where('fee_installment_detail.standard_code',''.$arr.'');
		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return  $the_content;
	}
	function get_total_fee_install($arr){
		$CI =& get_instance();
		$CI -> db -> select('SUM(fee_installment_detail.amount) as tot');
		$CI -> db -> from('fee_installment_detail');
		$CI -> db -> where('fee_installment_detail.standard_code',''.$arr['standard_code'].'');
		$query = $CI -> db -> get();
    	$the_content = $query->result_array();
    	return  (float)$the_content[0]['tot'];
	}
	
}
?>
