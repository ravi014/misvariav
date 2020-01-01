<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sendmail extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('email');
		$this->load->helper('bradecrume');
		$this->load->model('contact_model','',TRUE);
 	}
	
	function send(){
		
		
		$captcha=$_POST['g-recaptcha-response'];
       	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcDqA8UAAAAAHDVl3tQ1r3WikcwnCPpH1yPduWn&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
       	$data = json_decode($response);
		
		//Return true or false, based on users input
		// if(isset($data->success) && $data->success == true) {
			$date=date("d-m-Y");
			
			
			 $name=$_POST["first_nm"];
			 $email=$_POST["emailid"];
			 $contact=$_POST["contactno"];
			 $txtcomment=$_POST["txtcomment"];
				
			$data = array(
			'first_nm' => $name,
			'emailid' => $email,
			'contactno' => $contact,
			'txtcomment' => $txtcomment);
			
			$this->contact_model->addItem($data,'alumni_contact');
			
			$to="info@sspis.org";
			
			$subject = 'Contact Us';
			// message
			 $message = '<html><head></head>
						<body>
							<table> 
							<tr> <td>Name</td><td>:</td><td>'.$name.'</td></tr>
							<tr> <td>Contact No</td><td>:</td><td>'.$contact.'</td></tr>
							<tr> <td>Email</td><td>:</td><td>'.$email.'</td></tr>
							<tr> <td>Date</td><td>:</td><td>'.$date.'</td></tr>
							<tr> <td>Message</td><td>:</td><td>'.$txtcomment.'</td></tr>
							</table>
						</body>
						</html>';
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:'.$email.'' . "\r\n";
			
			mail($to, $subject, $message, $headers);
			
			
			//echo $this->email->print_debugger();
			//exit;
			echo '<script>alert("Your Detail Submited!");</script>';
            redirect(base_url(), 'refresh');
			 
		//}
		// else{
		// 	echo '0';
		// 	exit;
		// }
	}
	
	
	
}


