<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sendmail_test extends CI_Controller {

	function __construct()
 	{
   		parent::__construct(); 
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('email');
		$this->load->helper('bradecrume');
 	}
	
	function index(){
		
	
			$date=date("d-m-Y");
			
			
			 $name='Hardik';
			 $email='hap1994@gmail.com';
			 $contact='9727566941';
			 $comment='Hello';
			
			 $to="hardikpatel8155@gmail.com";
			
			$subject = 'Contact Us';
			// message
			 $message = '<html><head></head>
						<body>
							<table> 
							<tr> <td>Name</td><td>:</td><td>'.$name.'</td></tr>
							<tr> <td>Contact No</td><td>:</td><td>'.$contact.'</td></tr>
							<tr> <td>Email</td><td>:</td><td>'.$email.'</td></tr>
							<tr> <td>Date</td><td>:</td><td>'.$date.'</td></tr>
							<tr> <td>Message</td><td>:</td><td>'.$comment.'</td></tr>
							</table>
						</body>
						</html>';
			
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:'.$email.'' . "\r\n";
			echo $to;
			echo $subject;
			echo $message;
			echo $headers;
			
			mail($to, $subject, $message, $headers);
			
			
			echo $this->email->print_debugger();
			exit;
		
			 
	}
	
	
	
}


