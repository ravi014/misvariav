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


if ( ! function_exists('asset_path'))
{
	function asset_path( ) 
	{
		$url = base_url();
		$url = str_replace('school_user','u_asset',$url);
		return $url;
	}
}

if ( ! function_exists('asset_web'))
{
	function asset_web( ) 
	{
		$url = base_url();
		$url = str_replace('school_user','asset',$url);
		return $url;
	}
}

if ( ! function_exists('main_url'))
{
	function main_url( ) 
	{
		$url = base_url();
		$url = str_replace('school_user/','',$url);
		return $url;
	}
}

if ( ! function_exists('upload_path'))
{
	function upload_path( ) 
	{
		$url = base_url();
		$url = str_replace('school_user','upload',$url);
		return $url;
	}
}

if ( ! function_exists('file_path'))
{
	function upload_file_path( ) 
	{
		$url = FCPATH;
		$url = str_replace('school_user\\','',$url);
		return $url;
	}
}
	
	
	








