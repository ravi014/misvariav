<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('breadcrumb_view'))
{
	function breadcrumb_view($text,$value)
	{
		$html= '<ol class="breadcrumb bc-3">';
		for($i=0;$i<count($text);$i++){
			
			if($i==count($text)-1){
				$html.='<li><strong>'.$text[$i].'</strong></li>';
			}
			else{
				$html.='<li class="active"><a href="'.$value[$i].'">'.$text[$i].'</a></li>';
			}
		}
		$html.= '</ol>';
		return $html;
	}
}

