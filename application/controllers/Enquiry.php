<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enquiry extends CI_Controller {

	function __construct()
 	{
	
   		parent::__construct(); 
		$this->load->model('enquiry_model','',TRUE);
   		$this->load->helper('form');
   		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->library('email');
		$this->load->library('form_validation');
		
 	}
	public function index()
	{		
		$this->load->view('enquiry_view',$data);	
	}

	public function insert()
    {    
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {                  
                  
	        $data['fname']=$this->input->post('fname');
	        $data['midname']=$this->input->post('midname');
	        $data['surname']=$this->input->post('surname');
	        $data['dob']=$this->input->post('dob');
	        $data['gender']=$this->input->post('gender');
	        $data['address']=$this->input->post('address');
	        $data['city']=$this->input->post('city');
	        $data['state']=$this->input->post('state');
	        $data['contact']=$this->input->post('contact');
	        $data['emailid']=$this->input->post('emailid');
	        $data['fatheroccu']=$this->input->post('fatheroccu');
	        $data['motheroccu']=$this->input->post('motheroccu');
	        $data['childname']=$this->input->post('childname');
	        $data['scity']=$this->input->post('scity');
	        $data['country']=$this->input->post('country');
	        $data['reason']=$this->input->post('reason');
	        $data['prmot']=$this->input->post('prmot');
	        $data['prmotdetal']=$this->input->post('prmotdetal');
                                
            $activities_code = $this->enquiry_model->addenquiry($data);
            if ($activities_code == '') {
               
            ?><script type="text/javascript">
					alert('Your Inquiry Submitted Successfully.....');window.location.href="<?php echo base_url();?>index.php";
				</script><?php   	
	 		exit();	
	
            } else {
            	?><script type="text/javascript">
					alert('Data not Inserted');window.location.href="<?php echo base_url();?>enquiry";
				</script><?php                  
            }
        }
    }    
    






	// function insert()
	// {
	// 	if ($this->input->server('REQUEST_METHOD') === 'POST')
	// 	{
	// 		$data['admission_class']		=	$this->input->post('admission_seeking');
	// 		$data['name_of_stud']			=	$this->input->post('childname');
	// 		$data['dob']					=	date('Y-m-d',strtotime($this->input->post('dob')));
			
	// 		$yrs=$this->input->post('yrs');
	// 		$mon=$this->input->post('months');
			
	// 		$data['age_on_april']			=	$yrs.' / '.$mon;
			
	// 		$data['current_school']			=	$this->input->post('presentschool');
	// 		$data['place']					=	$this->input->post('place');
	// 		$data['current_class']			=	$this->input->post('pclass');
	// 		$data['medium']					=	$this->input->post('medium');
	// 		$data['board']					=	$this->input->post('board');
	// 		$data['mother_tongue']			=	$this->input->post('mtongue');
	// 		$data['residential_address']	=	$this->input->post('address');
	// 		$data['std_code']				=	$this->input->post('stdcode');
	// 		$data['contact_no_r']			=	$this->input->post('residence');
	// 		$data['mobile_no']				=	$this->input->post('mobile');
	// 		$data['email_id']				=	$this->input->post('emailid');
	// 		$data['father_name']			=	$this->input->post('fathername');
	// 		$data['father_occupation']		=	$this->input->post('fatheroccu');
			
	// 		$data['mother_name']			=	$this->input->post('mothername');
	// 		$data['mother_occupation']		=	$this->input->post('motheroccu');
	// 		$data['guardian_name']			=	$this->input->post('guardianname');
	// 		$data['guardian_occupation']	=	$this->input->post('guardianoccu');
	// 		$data['intrest_in_hostel']		=	$this->input->post('hostel');
	// 		$data['create_date']			=	date('Y-m-d');
			
	// 		$id								=	$this->comman_fun->addItem($data,'inquiry_data');
			
			
	// 		$to="info@sspis.org";
			
	// 		$subject = 'Admission Inquiry';
	// 		// message
	// 		$message = '<html><head></head>
	// 					<body>
	// 						<table> 
	// 						<tr> <td>Student Name</td><td>:</td><td>'.$this->input->post('childname').'</td></tr>
	// 						<tr> <td>Father Name</td><td>:</td><td>'.$this->input->post('fathername').'</td></tr>
	// 						<tr> <td>Mother Name</td><td>:</td><td>'.$this->input->post('mothername').'</td></tr>
	// 						<tr> <td>Contact No</td><td>:</td><td>'.$this->input->post('mobile').'</td></tr>
	// 						<tr> <td>Email</td><td>:</td><td>'.$this->input->post('emailid').'</td></tr>
	// 						<tr> <td>Birth Date</td><td>:</td><td>'.date('Y-m-d',strtotime($this->input->post('dob'))).'</td></tr>
	// 						<tr> <td>Admission Seeking in Class</td><td>:</td><td>'.$this->input->post('admission_seeking').'</td></tr>
	// 						</table>
	// 					</body>
	// 					</html>';
			
	// 		$headers  = 'MIME-Version: 1.0' . "\r\n";
	// 		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// 		$headers .= 'From:'.$this->input->post('emailid').'' . "\r\n";
			
	// 		mail($to, $subject, $message, $headers);
			
			
	// 		$this->session->set_flashdata('show_msg',array('class'=>'true','msg'=>'Your Inquiry Submitted Successfully.....'));
	// 		header('Location: '.base_url().'index.php');	
	// 		exit;
	// 	}
	// }
	
	
}


