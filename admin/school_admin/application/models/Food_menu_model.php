<?php
Class Food_menu_model extends CI_Model
{
 	
 	function getAll()
 	{
		$this -> db -> select('food_menu.*');
    	$this->db->from('food_menu');
		$this->db->order_by("food_menu.id","desc");
		$this->db->where('food_menu.status !=','Delete');
    $this -> db -> where('food_menu.master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			
    	 
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
 
	function get_food_menu_name(){
		$this -> db -> select('name');
   		$this -> db -> from('food_menu');
   $this->db->where('status !=','Delete');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

		$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	function get_record($eid){
		$this -> db -> select('*');
   		$this -> db -> from('food_menu');
   		$this -> db -> where('id', ''.$eid.'');
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
  
  
	function get_food_menu()
 	{
		$this -> db -> select('*');
    	$this->db->from('food_menu');
		$this -> db -> where('food_menu.status','Active');
    $this -> db -> where('master_code',''.$this->session->userdata['logged_in_school']['master_code'].'');			

    	$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
}
?>
