<?php
Class Ajax_model extends CI_Model
{
 	
	function getstate($eid)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('state');
		$this->db->order_by("stateid","desc");
		$array = array('status !=' => 'Delete','countryid'=>$eid);
		$this->db->where($array);
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	function getcity($eid)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('city');
		$this->db->order_by("cityid","desc");
		$array = array('status !=' => 'Delete','stateid'=>$eid);
		$this->db->where($array);
		$query = $this -> db -> get();
		$the_content = $query->result_array();
    	return $the_content;
 	}
	
	
}
?>
