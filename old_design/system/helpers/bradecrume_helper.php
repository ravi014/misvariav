<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_bradecrume'))
{
	function get_bradecrume($cls="",$clscode="")
	{
		$count=count($cls);
		$html='<div class="bradecrume outer">
  				<div class="work_section">
    			<ul>';
				for($i=0;$i<count($cls);$i++){
					if($clscode[$i]!=""){$url=$clscode[$i];}
					else{$url="";}
					
					if($i==(count($cls)-1)){
						$html.='<li style="color:#09F">'.$cls[$i].'</li>';
					}
					elseif($i==0){
						$html.='<li><a href="'.$url.'">'.$cls[$i].'</a></li>
      							<li><font style="color:#F97F43;"><i class="fa fa-angle-right"></i></font></li>';
					}
					else{
						$html.='<li><a href="'.$url.'">'.$cls[$i].'</a></li>
      							<li><font style="color:#F97F43;"><i class="fa fa-angle-right"></i></font></li>';
					}
			
		}		
      	$html.='</ul></div></div><div style="clear:both; overflow:hidden;"></div>';
		return $html;
	}
}

if ( ! function_exists('get_bradecrume_two'))
{
	function get_bradecrume_two($cls,$clscode="")
	{
		$html='<div class="bradecrume outer">
    			<ul>';
				for($i=0;$i<count($cls);$i++){
				
					if($clscode[$i]!=""){$url=$clscode[$i];}
					else{$url="";}
					$mm="";
					if($i==(count($cls)-1)){
						$html.='<li style="color:#09F">'.$cls[$i].'</li>';
					}
					elseif($i==0){
						$html.='<li><a href="'.$url.'">'.$cls[$i].'</a></li>
      							<li><font style="color:#F97F43;"><i class="fa fa-angle-right"></i></font></li>';
					}
					else{
						$html.='<li><a href="'.$url.'">'.$cls[$i].'</a></li>
      							<li><font style="color:#F97F43;"><i class="fa fa-angle-right"></i></font></li>';
					}
			
		}		
      	$html.='</ul></div><div style="clear:both; overflow:hidden;"></div>';
		return $html;
	}
}


// ------------------------------------------------------------------------

