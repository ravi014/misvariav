<?php
Class response_model extends CI_Model
{
 	
	function addItem($data,$table){
    	$this->db->insert($table , $data);
    	return $this->db->insert_id();
	}
	
	function update($data,$table,$wherefield,$wherevalue){
			$this->db->where($wherefield, $wherevalue);
			$this->db->update($table, $data); 
	}
	
		
	function get_donation($donateid)
 	{	
   		$this -> db -> select('*');
   		$this -> db -> from('donation_master');
		$this->db->where('donate_code =',$donateid);
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
 	}
  	
  	function getBOBdetails(){
		$this -> db -> select('*');
   		$this -> db -> from('bobdetail');
		$this->db->where('id =',1);
    	$query = $this -> db -> get();
    	$the_content = $query->result_array();
    	return $the_content;
	}
	
	function getBOBResponse($id){
		$query="SELECT d.donors_name,d.email , r . * 
		FROM donation_master AS d
		INNER JOIN bob_response AS r ON d.donate_code = r.ResTrackID WHERE 
		r.ResTrackID= '".$id."'";
		$query = $this->db->query($query);
		$the_content = $query->result_array();
         
	}
        //Start for Domestic Payment Gateway INTEGRATION
        function dsecurehash($secret_key,$dataArray)
        {
            //$secret_key = 'ea70f2c73d07bd829673992c4faf2be9'; //Provide your HDFC Account’s Secret Key   
  
            $hashData = $secret_key;  // Intialise with Secret Key  
            ksort ($dataArray);  // Sort the post parameters in alphabetical order of parameter names.  

            //Append the posted values to $hashData  

            foreach($dataArray as $key => $value) {   

            //create the hashing input leaving out any fields that has no value and by concatenating the      values using a ‘|’ symbol.  

            if (strlen($value) > 0) {  
                                    $hashData .= '|'.$value;  

            }   
            }    
            // Create the secure hash and append it to the Post data  

            if (strlen($hashData) > 0) {   
                $hashvalue = strtoupper(md5($hashData));   
            }   

            return $SecureHash = $hashvalue;  
            
        }
        function selectquery($select,$from,$where){
                $this->db->select($select);
                $this->db->from($from);
                $this->db->where($where);
                $query=$this->db->get();
                $result=$query->result_array(); 
                return $result;
        }
        //End for Domestic Payment Gateway INTEGRATION
	
}
?>
