<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('data_filter'))
{
	function data_filter($data){
	
		$data = trim($data);
   		$data = stripslashes($data);
   		$data = htmlspecialchars($data);
	return $data;
	}
}


