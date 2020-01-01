<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter XML Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/xml_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Convert Reserved XML characters to Entities
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('get_mail_html'))
{
	function get_mail_html($name='',$contain='')
	{
		$facebook='https://www.facebook.com/pages/Vatsalya-International-School-Borsad/734667513261025?ref=hl';
		$html='<table bgcolor="#FAC800" style="width:100%;">
			  <tr>
				<td></td>
				<td class="header container" ><div class="content" style="padding: 15px;width: 700px;margin: 0px auto;display: block;">
					<table bgcolor="#FAC800" width="100%">
					  <tr>
						<td><div><h2 style="letter-spacing:1px;color:#0A11AD;text-align:center;">Vatsalya International School</h2></div></td>
						<td align="right"></td>
					  </tr>
					</table>
				  </div></td>
				<td></td>
			  </tr>
		</table>


<table class="body-wrap" width="100%">
  <tr>
    <td></td>
    <td class="container" bgcolor="#FFFFFF" style="display: block !important;width: 700px !important;margin: 0px auto !important;clear: both !important;"><div class="content" style="padding: 15px;width: 700px;margin: 0px auto;display: block;">
        <table width="100%">
          <tr>
            <td><h3 style="font-weight: 500;font-size: 27px;margin:0px;padding:0px;font-family:Verdana, Geneva, sans-serif;">Hi, '.$name.'</h3>
              <p style="margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;font-family:Verdana, Geneva, sans-serif;">'.$contain.'</p>
              <table width="100%" style="background-color: #EBEBEB;">
                <tr>
                  <td><h4>
                    </h4>
						<table align="left" style="width: 350px;float: left;margin:0px;padding:0px">
						  <tr>
							<td style="padding: 15px;"><h5 style="font-weight:900;font-size: 17px;margin:0px;padding:0px;line-height: 1.1;margin-bottom: 15px;color: #000;font-family:Verdana, Geneva, sans-serif;">Connect with Us:</h5>
							  <p style="margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;"> 
								<a href="'.$facebook.'" style="padding: 3px 7px;font-size: 12px;margin-bottom: 10px;text-decoration: none;color: #FFF;font-weight: bold;display: block;text-align: center;background-color: #3B5998 !important;font-family:Verdana, Geneva, sans-serif;">Facebook</a> 
								<a href="#" style="padding: 3px 7px;font-size: 12px;margin-bottom: 10px;text-decoration: none;color: #FFF;font-weight: bold;display: block;text-align: center;background-color: #1DACED  !important;font-family:Verdana, Geneva, sans-serif;">Twitter</a> 
								<a href="#" style="padding: 3px 7px;font-size: 12px;margin-bottom: 10px;text-decoration: none;color: #FFF;font-weight: bold;display: block;text-align: center;background-color: #DB4A39  !important;font-family:Verdana, Geneva, sans-serif;">Google+</a></p>
								</td>
						  </tr>
						</table>
						<table align="left" style="width: 350px;float: left;margin:0px;padding:0px">
						  <tr>
							<td style="padding: 15px;font-family:Verdana, Geneva, sans-serif;"><h5 style="font-weight:900;font-size: 17px;margin:0px;padding:0px;line-height: 1.1;margin-bottom: 15px;color: #000;">Contact Info:</h5>
							  <p style="font-size:14px;">Phone: <strong>02692 224217</strong><br/>
								Web: <strong><a style="text-decoration:none;color:#2BA6CB" href="http://www.vatsalyainternational.org/">www.vatsalyainternational.org</a></strong><br/>
								Email: <strong><a style="text-decoration:none;color:#2BA6CB" href="#">shreeviemsorg@yahoo.co.in</a></strong><br/>
								Email: <strong><a style="text-decoration:none;color:#2BA6CB" href="#">principalvatsalya@gmail.com</a></strong>
								</p></td>
						  </tr>
						</table>
                    <span class="clear"></span></td>
                </tr>
              </table>
             </td>
          </tr>
        </table>
      </div>
     </td>
    <td></td>
  </tr>
</table>
';
	return $html;
	}
}

// ------------------------------------------------------------------------

/* End of file xml_helper.php */
/* Location: ./system/helpers/xml_helper.php */