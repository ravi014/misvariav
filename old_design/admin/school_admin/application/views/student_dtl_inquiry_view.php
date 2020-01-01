<!-- page heading start-->

<div class="page-heading">
            <h4>
                STUDENT DETAIL
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li > <a href="<?php echo base_url(); ?>index.php/student_admission_inquiry">Student Admission Inquiry</a></li>
               <li class="active">Student detail</li>
            </ul>
               
        </div>


<div class="wrapper">
  <div class="row">
 
   
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading"><h3> STUDENT DETAILS</h3>
          
        </header>
        <div class="panel-body">
      		<div class="btn-group pull-right">
              <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>/" class="addnewlink"><button class="btn btn-primary">Back</button></a>
            </div>
          <div class=" form">
  
 
 
 <div class="row">
    <div class="col-md-12">
      <div class="panel panel-gradient" data-collapsed="0"> 
        <!-- panel head -->
        
        
        <div class="panel-body"> <!-- panel body -->
       <div class="col-md-6">
			<table>
         		<tr>
                    <td valign="top" width="70%">
                        <table class="table">
                            <tr>
                                <td>Full Name</td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['name_of_stud'])?></td>
                            </tr>
                           
                         	<tr>
                                <td>Residential Address  </td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['residential_address'])?></td>
                            </tr>
                            <tr>
                                <td>Seeking STD</td>
                                <td>:</td>
                                <td><?=$result[0]['admission_class']?></td>
                            </tr>
                			<tr>
                                <td>Birth Date</td>
                                <td>:</td>
                                <td><?=date('d-m-Y', strtotime($result[0]['dob']))?></td>
                            </tr>
                           
                            <tr>
                                <td>Age as on 01 April 2017</td>
                                <td>:</td>
                                <td><?=$result[0]['age_on_april']?></td>
                            </tr>
                            <tr>
                                <td>Current School</td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['current_school'])?></td>
                            </tr>
                            <tr>
                                <td>Place </td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['place'])?></td>
                            </tr>
                            <tr>
                                <td>Current Class </td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['current_class'])?></td>
                            </tr>
                            <tr>
                                <td>Medium  </td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['medium'])?></td>
                            </tr>
                            <tr>
                                <td>Board  </td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['board'])?></td>
                            </tr>
                            <tr>
                                <td>Mother Tongue </td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['mother_tongue'])?></td>
                            </tr>
                           
                            
                        </table>
                    </td>
                </tr>
         </table>
        
        </div>
           
       <div class="col-md-6"> 
            <table>
         		<tr>
                    <td valign="top" width="70%">
                        <table class="table">
                         	<tr>
                                <td>Father's Name </td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['father_name'])?></td>
                            </tr>
                            <tr>
                                <td>Occupation</td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['father_occupation'])?></td>
                            </tr>
                           
                            <tr>
                                <td>Mother's Name</td>
                                <td>:</td>
                                <td><?=$result[0]['mother_name']?></td>
                            </tr>
                            <tr>
                                <td>Occupation</td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['mother_occupation'])?></td>
                            </tr>
                            <tr>
                                <td>STD Code</td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['std_code'])?></td>
                            </tr>
                            <tr>
                                <td>Land-Line Number</td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['contact_no_r'])?></td>
                            </tr>
                         	<tr>
                                <td>Mobile Number </td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['mobile_no'])?></td>
                            </tr>
                            <tr>
                                <td>Email Id</td>
                                <td>:</td>
                                <td><?=$result[0]['email_id']?></td>
                            </tr>
                			
                            <tr>
                                <td>Guardian's Name </td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['guardian_name'])?></td>
                            </tr>
                            <tr>
                                <td>Occupation </td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['guardian_occupation'])?></td>
                            </tr>
                            <tr>
                                <td>Intrested For Hostel Facilities ?</td>
                                <td>:</td>
                                <td><?=ucwords($result[0]['intrest_in_hostel'])?></td>
                            </tr>
                            
                           
                            
                        </table>
                    </td>
                </tr>
         </table>
       </div>
    </div> <!---panel-body-----> 
     </div>
   </div>
 </div>  <!-----Student Basic Info----->
 
 </div>
     </div>
      </section>
    </div>
    <!-------End col-sm-12------------>
  
  </div>

 </div>
<style>
	.req{
		color:#F00;
	}
	.dis_none{
		display:none;
	}
	.txt-area{
		resize:none;
		height:90px !important;
	}
	.txtbox{
		display: block;
		width: 90%;
		height: 31px;
		padding: 6px 12px;
		font-size: 12px;
		line-height: 1.42857;
		color: #555;
		background-color: #FFF;
		background-image: none;
		border: 1px solid #AAA;
		border-radius: 3px;
		transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
	}
	.txtsel{
		display: block;
		width: 90%;
		height: 31px;
		padding: 6px 12px;
		font-size: 12px;
		line-height: 1.42857;
		color: #555;
		background-color: #FFF;
		background-image: none;
		border: 1px solid #AAA;
		border-radius: 3px;
		transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
		height:50px;
		resize:none;
	}
	.cls_cap{
		text-transform:uppercase;
	}
	.font12{
		font-size:11px !important;
	}
	.panel-title{
		font-weight:bold;
	}

</style>
