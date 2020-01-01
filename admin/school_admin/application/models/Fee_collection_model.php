<?php
Class Fee_collection_model extends CI_Model
{
 	
 	function getAll_standard()
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
 
 	function get_division($eid){
		$this -> db -> select('*');
   		$this -> db -> from('division_master');
   		$this -> db -> where('standard_code', ''.$eid.'');
		$this -> db -> where('status','Active');
		$this -> db -> where('create_by', ''.$this->session->userdata['logged_in_school']['usercode'].'');
     	$this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

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
	
	function getAll()
 	{	
		$this -> db -> select('student_yearly_acccount.student_yearly_code');
		
		$this -> db -> select('student_yearly_acccount.student_yearly_code');
   		$this -> db -> select('student_master.*');
		$this -> db -> select('standard_master.standard_name');
		//$this -> db -> select('division_master.name as division_name');
	
   		$this -> db -> from('student_yearly_acccount');
		
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		$this -> db -> join('standard_master','standard_master.standard_code = student_yearly_acccount.current_standard','left');
		//$this -> db -> join('division_master','division_master.division_code = student_yearly_acccount.division_code','left');
	
		if($this->uri->segment(3)!=''){
			
			$this -> db -> where('student_yearly_acccount.current_standard',''.$this->uri->segment(3).'');
		}
		
		if($this->uri->segment(4)!='')
		{
			$this -> db -> where('student_yearly_acccount.division_code',''.$this->uri->segment(4).'');
		}
   		$this->db->where('student_master.status !=','Delete');
		
		$this->db->order_by('student_master.sur_name','asc');
		
		$this->db->order_by('student_master.first_name','asc');
		
		$this->db->order_by('student_master.middle_name','asc');
		
		//$this -> db -> where('student_yearly_acccount.status','Active');
	    $this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	    $this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
	function get_student_info($eid)
	{
		
		$this -> db -> select('student_yearly_acccount.student_yearly_code,student_yearly_acccount.account_year_code,student_yearly_acccount.current_standard as standard_code');
   		$this -> db -> select('student_master.*');
		$this -> db -> select('standard_master.standard_name');
		$this -> db -> select('division_master.name as division_name');
	 	$this -> db -> from('student_yearly_acccount');
		
		$this -> db -> join('student_master','student_master.student_code = student_yearly_acccount.student_code','left');
		$this -> db -> join('standard_master','standard_master.standard_code = student_yearly_acccount.current_standard','left');
		$this -> db -> join('division_master','division_master.division_code = student_yearly_acccount.division_code','left');
	
   		$this->db->where('student_master.status !=','Delete');
		//-------
		$this -> db -> where('student_master.student_code',''.$eid.'');	
		//---------		
	    $this -> db -> where('student_yearly_acccount.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
	    $this -> db -> where('student_master.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;



	}
	
	function get_student_fee_dt($eid)
	{
		
		$this -> db -> select('*');
   		$this -> db -> from('fee_income_account');
   		$this -> db -> where('student_code', ''.$eid.'');
		$this -> db -> where('status','Active');
		$this -> db -> where('create_by', ''.$this->session->userdata['logged_in_school']['usercode'].'');
     	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;

	}
	
	function get_student_fee_edit($eid)
	{
		
		$this -> db -> select('*');
   		$this -> db -> from('fee_income_account');
   		$this -> db -> where('id', ''.$eid.'');
		$this -> db -> where('status','Active');
		$this -> db -> where('create_by', ''.$this->session->userdata['logged_in_school']['usercode'].'');
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
	
	function fee_installment_detail($eid){
	
		$this -> db -> select('fee_installment_detail.*');
		
		$this -> db -> select('fee_installment_term.name');
		
   		$this -> db -> from('fee_installment_detail');
		
		$this -> db -> join('fee_installment_term','fee_installment_term.id = fee_installment_detail.term_id','left');
		
   		$this -> db -> where('fee_installment_detail.standard_code', ''.$eid.'');
				
		$this -> db -> order_by('fee_installment_detail.term_id','ASC');
		
     	$query = $this -> db -> get();
		
    	$the_content = $query->result_array();
		
    	return $the_content;	
	
	}
	
	
	function total_fee_paid($eid){
	
		$this -> db -> select('SUM(amount) as tot');
		
   		$this -> db -> from('fee_income_account');
		
   		$this -> db -> where('student_yearly_code', ''.$eid.'');
				
		$this -> db -> where('status', 'Active');
		
     	$query = $this -> db -> get();
		
    	$the_content = $query->result_array();
		
    	return (float)$the_content[0]['tot'];	
	
	}
	
	
	
	function get_current_installment(){
		
		$this -> db -> select('*');
		
   		$this -> db -> from('fee_installment_term');
			
		$this -> db -> where('to_date <=', strtotime(date('d-m-Y')));
		
		$this -> db -> where('from_date >=', strtotime(date('d-m-Y')));
		
     	$query = $this -> db -> get();
		
    	$the_content = $query->result_array();
		
    	return $the_content[0]['id'];	
		
	}
	
	
	function tot_fees($arr){
		
		$CI =& get_instance();
		
		$CI -> db -> select('SUM(fee_installment_detail.amount) as tot');
		
		$CI -> db -> from('fee_installment_detail');
		
		$CI -> db -> where('fee_installment_detail.standard_code',''.$arr['standard_code'].'');
		
		$query = $CI -> db -> get();
		
    	$the_content = $query->result_array();
		
    	return  (float)$the_content[0]['tot'];
	}
	
	function tot_paid_fees($arr){
		
		$CI =& get_instance();
		
		$CI -> db -> select('SUM(fee_income_account.amount) as tot');
		
		$CI -> db -> from('fee_income_account');
		
		$CI -> db -> where('fee_income_account.student_code',''.$arr['student_code'].'');
		
		$CI -> db -> where('fee_income_account.account_year_code',''.$arr['account_year_code'].'');
		
		$CI -> db -> where('fee_income_account.student_yearly_code',''.$arr['student_yearly_code'].'');
		
		$query = $CI -> db -> get();
		
    	$the_content = $query->result_array();
		
    	return  (float)$the_content[0]['tot'];
	}
	
}
?>
