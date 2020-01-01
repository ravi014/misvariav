<?php
Class tci_model extends CI_Model
{
 	
	function get_all($year){
		
		$this -> db -> select('*');
		
   		$this -> db -> from('slc_mater');
		
   		$this -> db -> where('status','Active');
		
		$this -> db -> where('year(create_date)', $year);
		
		$query = $this -> db -> get();
		
    	$the_content = $query->result_array();
		
    	return $the_content;
	}
	
	
}
?>
