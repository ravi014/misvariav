<!-- page heading start-->

<div class="page-heading">
            <h4>
                STUDENT DETAIL
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li > <a href="<?php echo base_url(); ?>index.php/student_admission">Student Admission</a></li>
               <li class="active">Student detail</li>
            </ul>
               
        </div>

<?php
	
		$admission_dt = date('d-m-Y', strtotime($result[0]['admission_dt']));
		$birthdt = date('d-m-Y', strtotime($result[0]['birthdt']));
		
	
?>
<div class="wrapper">
  <div class="row">
 
   
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading"><h3> STUDENT DETAILS</h3>
          
        </header>
        <div class="panel-body">
      
          <div class=" form">
  
 
 
 <div class="row">
    <div class="col-md-12">
      <div class="panel panel-gradient" data-collapsed="0"> 
        <!-- panel head -->
        <div class="panel-heading">
          <div class="panel-title">Admission Detail </div>
          <div class="panel-options"> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> </div>
        </div>
        
        <div class="panel-body"> <!-- panel body -->
       <div class="col-md-6">
		<?php
        	if($result[0]['student_photo']!=''){
				$userimg	=	$result[0]['student_photo'];
			}
			else{
				$userimg	=	'student.png';
		 	}
		 	$student_photo ="<img class='profile-img' src='".main_url()."upload/img_thum/".$userimg."' width='200' height='200'>";
		
		 ?>
         <table>
         		<tr>
                	<td valign="top" width="30%"><?=$student_photo?></td>
                </tr>
         </table>
        </div>
           
       <div class="col-md-6"> 
            <table>
         		<tr>
                    <td valign="top" width="70%">
                        <table class="table">
                            <tr>
                                <td>Full Name</td>
                                <td>:</td>
                                <td><?=$result[0]['first_name']?>  <?=$result[0]['middle_name']?> <?=$result[0]['sur_name']?></td>
                            </tr>
                         
                            <tr>
                                <td>Standard</td>
                                <td>:</td>
                                <td><?=$yearly_info[0]['standard_name']?></td>
                            </tr>
                
                
            
          
                      		<tr>
                                <td>Division</td>
                                <td>:</td>
                                <td><?=$yearly_info[0]['division_name']?></td>
                            </tr>
                           
                            <tr>
                                <td>Admission Date</td>
                                <td>:</td>
                                <td><?=$admission_dt?></td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td>:</td>
                                <td><?=$user_detail[0]['username']?></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td><?=$user_detail[0]['password']?></td>
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
 
 <div class="row">
    <div class="col-md-12">
      <div class="panel panel-gradient" data-collapsed="0"> 
        <!-- panel head -->
        <div class="panel-heading">
          <div class="panel-title">Student Detail</div>
          <div class="panel-options"> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> </div>
        </div>
        
      <div class="panel-body"> <!-- panel body -->
      
       <div class="col-md-6"> 
            <table>
         		<tr>
                    <td valign="top" width="70%">
                        <table class="table">
                            <tr>
                                <td>Date Of Birth</td>
                                <td>:</td>
                                <td><?=$birthdt?></td>
                            </tr>
                            <tr>
                                <td>Contact No</td>
                                <td>:</td>
                                <td><?=$result[0]['phone']?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?=$result[0]['emailid']?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><?=$result[0]['student_address']?></td>
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
                                <td>Gender</td>
                                <td>:</td>
                                <td><?=$result[0]['gender']?></td>
                            </tr>
                            <tr>
                                <td>Blood Group</td>
                                <td>:</td>
                                <td><?=$result[0]['bloodgrop']?></td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>:</td>
                                <td><?=$result[0]['country_name']?></td>
                            </tr>
                            <tr>
                                <td>State</td>
                                <td>:</td>
                                <td><?=$result[0]['state_name']?></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>:</td>
                                <td><?=$result[0]['city_name']?></td>
                            </tr>
                            
                        </table>
                    </td>
                </tr>
         </table>
       </div>
     </div> <!---panel-body-----> 
     </div>
   </div>
 </div>  <!-----Student All Info----->

 
 <div class="row">
    <div class="col-md-12">
      <div class="panel panel-gradient" data-collapsed="0"> 
        <!-- panel head -->
        <div class="panel-heading">
          <div class="panel-title">Guardian Detail</div>
          <div class="panel-options"> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> </div>
        </div>
        
      <div class="panel-body"> <!-- panel body -->
      
       <div class="col-md-6"> 
            <table>
         		<tr>
                    <td valign="top" width="70%">
                        <table class="table">
                            <tr>
                                <td>Surname</td>
                                <td>:</td>
                                <td><?=$result[0]['guardian_sur_name']?></td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td>:</td>
                                <td><?=$result[0]['guardian_first_name']?></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>:</td>
                                <td><?=$result[0]['guardian_middle_name']?></td>
                            </tr>
                            <tr>
                                <td>Mobile No</td>
                                <td>:</td>
                                <td><?=$result[0]['guardian_mobile_no']?></td>
                            </tr>
                            <tr>
                                <td>Phone No</td>
                                <td>:</td>
                                <td><?=$result[0]['guardian_phone_no']?></td>
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
                                <td>Email Id</td>
                                <td>:</td>
                                <td><?=$result[0]['guardian_email']?></td>
                            </tr>
                            
                            <tr>
                                <td>Country</td>
                                <td>:</td>
                                <td><?=$g_country_code[0]['name']?></td>
                            </tr>
                            <tr>
                                <td>State</td>
                                <td>:</td>
                                <td><?=$g_state_code[0]['name']?></td>
                            </tr>
                             <tr>
                                <td>City</td>
                                <td>:</td>
                                <td><?=$g_city_code[0]['name']?></td>
                            </tr>
                           <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><?=$result[0]['guardian_address']?></td>
                            </tr>
                          </table>
                    </td>
                </tr>
         </table>
       </div>
     </div> <!---panel-body-----> 
     </div>
   </div>
 </div>  <!-----Gardian All Info----->
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
