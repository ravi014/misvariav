<!-- page heading start-->

<div class="page-heading">
            <h4>
                STUDENT ADMISSION
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li > <a href="<?php echo base_url(); ?>index.php/student_admission">Student Admission</a></li>
               <li class="active"><?=$segment['mode']?> Student</li>
            </ul>
               
        </div>

<?php
	if($segment['mode']=='Add'){
		$btnlable	=	"Insert";
	$admission_dt=date('d-m-Y');
	}
	else{
		$btnlable="Update";
	
		$disabled="disabled='disabled'";
		$admission_dt = date('d-m-Y', strtotime($result[0]['admission_dt']));
		$birthdt = date('d-m-Y', strtotime($result[0]['birthdt']));
		$style='';
	}
	
?>

<link rel="stylesheet" type="text/css" href="<?php echo asset_path();?>asset/css/datepicker-custom.css" />
<script type="text/javascript" src="<?php echo asset_path();?>asset/js/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function(e) {
         $('.default-date-picker').datepicker({
       		 format: 'dd-mm-yyyy',
			  autoclose: true
    	 });
    });
</script>

<!-- page heading end-->

<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
	
		$(document).on('change', '#standard_code', function (e) {
				var eid = $('#standard_code').val();
				var url='<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_division_by_standard/'+eid;
				$.ajax({url:url,
				success:function(result){	 	
					$("#division_code").html(result);
                }});
		});
		 
		 $(document).on('change', '#country_code', function (e) {
				var eid = $('#country_code').val();
				
				var url='<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_state_by_country/'+eid;
				$.ajax({url:url,
				success:function(result){	 	
					$("#state_code").html(result);
                }});
		}); 
		  $(document).on('change', '#state_code', function (e) {
				var eid = $('#state_code').val();
			
				var url='<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_city/'+eid;
				$.ajax({url:url,
				success:function(result){	 	
					$("#city_code").html(result);
                }});
		  });
		  
		
		
		  $(document).on('change', '#g_country_code', function (e) {
				var eid = $('#g_country_code').val();
				var url='<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_state_by_country/'+eid;
				$.ajax({url:url,
				success:function(result){	 	
					$("#g_state_code").html(result);
                }});
		   });
		  
		  $(document).on('change', '#g_state_code', function (e) {
				var eid = $('#g_state_code').val();
				var url='<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_city/'+eid;

				$.ajax({url:url,
				success:function(result){	 	
					$("#g_city_code").html(result);
                }});
		  });
		  
		
		 
		  
	});		
</script>

<!--body wrapper start-->

<form  role="form" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" id="frm1" method="post" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
 
 
<div class="wrapper">
  <div class="row">
 
   <?php if($this->session->flashdata('show_msg')!=''){?>
  <div class="alert alert-danger fade in">
    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
    <?=$this->session->flashdata('show_msg');?>
  </div>
  <?php } ?>
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading"><h3> STUDENT
          <?=$segment['mode']?></h3>
          
        </header>
        <div class="panel-body">
      
          <div class=" form">
 
 	<input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
              <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
              <input type="hidden" name="eid" id="eid" 	 value="<?=$segment['eid']?>" />
              <input type="hidden" name="student_yearly_code" id="student_yearly_code"   value="<?=$yearly_info[0]['student_yearly_code']?>" />

  <!------Admission detail------->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-gradient" data-collapsed="0"> 
        <!-- panel head -->
        <div class="panel-heading">
          <div class="panel-title">Admission Detail </div>
          <div class="panel-options"> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> </div>
        </div>
        
        <!-- panel body -->
        <div class="panel-body">
          <div class="col-md-12"> 
          
            <!-------------->
            <div class="form-group">
              <label class="col-sm-2 control-label">Standard <samp class="req">*</samp></label>
              <div class="col-sm-2">
                <select id="standard_code" name="standard_code" required  class="form-control txtselect" data-rule-required="true">
                  <option value="">---Select---</option>
                  <?php
                  	for($i=0;$i<count($standard);$i++){
						$sel=($standard[$i]['id']==$yearly_info[0]['current_standard']) ? "selected='selected'" : "";
						echo"<option ".$sel." ".set_select('standard_code', ''.$standard[$i]['id'].'')." value='".$standard[$i]['id']."' >".$standard[$i]['name']."</option>";
					}
				  ?>
                </select>
              <?php echo form_error('standard_code', '<p class="error">', '</p>'); ?>

              </div>
          
              <label class="col-sm-2 control-label">Division</label>
              <div class="col-sm-2">
                <select id="division_code" name="division_code" class="form-control txtselect">
                  <option value="">---Select---</option>
                  <?php
                  	for($i=0;$i<count($division);$i++){
						$sel=($division[$i]['id']==$yearly_info[0]['division_code']) ? "selected='selected'" : "";
						echo"<option ".$sel." ".set_select('division_code', ''.$division[$i]['id'].'')." value='".$division[$i]['id']."'>".$division[$i]['name']."</option>";
					}
				  ?>
                </select>
              </div>
         
              <label class="col-sm-2 control-label">Admission Date <samp class="req">*</samp></label>
              <div class="col-sm-2">
                <input type="text" name="admission_dt" required id="admission_dt" value="<?=$admission_dt?>" class="form-control default-date-picker" data-validate="required" data-format="dd-mm-yyyy" data-message-required="Admission Date Is Required"  />
              <?php echo form_error('admission_dt', '<p class="error">', '</p>'); ?>

              </div>
            </div>
            <!-------------> 
       
          </div>
          
        </div>
        <!---panel-body-----> 
      </div>
    </div>
  </div>
  <!------Addmition detail End------->
  
   <!------Student detail------->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-gradient" data-collapsed="0"> 
        <!-- panel head -->
        <div class="panel-heading">
          <div class="panel-title">Student Detail </div>
          <div class="panel-options"> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> </div>
        </div>
        
        <!-- panel body -->
        <div class="panel-body" <?=$style?>>
          <div class="col-md-6"> 
            <!-------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">Surname <samp class="req">*</samp></label>
              <div class="col-sm-8">
                <input type="text" name="sur_name" id="sur_name" required value="<?php echo set_value('sur_name', ''.$result[0]['sur_name'].''); ?>" class="form-control cls_cap" data-validate="required" data-message-required="Surname Is Required" placeholder="SURNAME"  />
         <?php echo form_error('sur_name', '<p class="error">', '</p>'); ?>
              </div>
            </div>
            <!-------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">First Name <samp class="req">*</samp></label>
              <div class="col-sm-8">
                <input type="text" name="first_name" id="first_name" required value="<?php echo set_value('first_name', ''.$result[0]['first_name'].''); ?>" class="form-control cls_cap" data-validate="required" data-message-required="First Name Is Required" placeholder="FIRST NAME"  />
         <?php echo form_error('first_name', '<p class="error">', '</p>'); ?>
              </div>
            </div>
            <!--------------> 
            <!-------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">Middle Name <samp class="req">*</samp></label>
              <div class="col-sm-8">
                <input type="text" name="middle_name" id="middle_name" required value="<?php echo set_value('middle_name', ''.$result[0]['middle_name'].''); ?>" class="form-control cls_cap" data-validate="required" data-message-required="Middle Name Is Required" placeholder="MIDDLE NAME"  />
         <?php echo form_error('middle_name', '<p class="error">', '</p>'); ?>
              </div>
            </div>
            <!------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">DOB<samp class="req">*</samp></label>
              <div class="col-sm-8">
                <input type="text" name="birthdt" id="birthdt" required value="<?php echo set_value('birthdt', ''.$birthdt.''); ?>" class="form-control default-date-picker" data-validate="required" data-format="dd-mm-yyyy" data-message-required="Birth Date Is Required" placeholder="BIRTH DATE"  />
         <?php echo form_error('birthdt', '<p class="error">', '</p>'); ?>
              </div>
            </div>
            <!------------->
           
           <!-------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">Contact No.<samp class="req">*</samp></label>
              <div class="col-sm-8">
                <input type="phone" name="phone" id="phone" value="<?php echo set_value('phone', ''.$result[0]['phone'].''); ?>" class="form-control" number="true" placeholder="CONTACT NO" required/>
         <?php echo form_error('phone', '<p class="error">', '</p>'); ?>
              </div>
            </div>
            <!--------------> 
             <!------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">Email Id</label>
              <div class="col-sm-8">
                <input type="email" name="email" id="email"value="<?php echo set_value('email', ''.$result[0]['emailid'].''); ?>"  class="form-control"  placeholder="EMAIL ID"   />
          <?php echo form_error('email', '<p class="error">', '</p>'); ?>
             </div>
            </div>
            <!------------->
            <!-------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">Address</label>
              <div class="col-sm-8">
                <textarea id="student_address" name="student_address" class="form-control txt-area cls_cap" placeholder="STUDENT ADDRESS"><?php echo set_value('student_address', ''.$result[0]['student_address'].''); ?></textarea>
         <?php echo form_error('student_address', '<p class="error">', '</p>'); ?>
              </div>
            </div>
            <!-------------> 
          </div>
          <div class="col-md-6"> 
           
          
            <div class="form-group">
              <label class="col-sm-4 control-label">Blood Group</label>
              <div class="col-sm-8">
                <select id="bloodgrop" name="bloodgrop" class="form-control txtselect">
                <option value="">---Select---</option>
                  <?php
						for($i=0;$i<count($bloodgrop);$i++){
							$sel="";
							if($bloodgrop[$i]['id']==$result[0]['bloodgrop']){$sel="selected='selected'";}
							echo"<option ".$sel." ".set_select('bloodgrop', ''.$bloodgrop[$i]['id'].'')." value='".$bloodgrop[$i]['id']."'>".$bloodgrop[$i]['name']."</option>";
                    }?>
                </select>
              </div>
            </div>
            <!------------->  
         
            <div class="form-group">
              <label class="col-sm-4 control-label">Gender</label>
              <div class="col-sm-8"> 
                <!------------->
                <select id="gender" name="gender" class="form-control txtselect" >
                  <?php
                	$sel1=($result[0]['gender']=='M') ? "selected='selected'" : "";
					$sel2=($result[0]['gender']=='F') ? "selected='selected'" : "";
				?>
                 <option value="">---Select---</option>
                  <option <?=$sel1?> <?php echo set_select('gender', 'M') ?> value="M">Male</option>
                  <option <?=$sel2?> <?php echo set_select('gender', 'F') ?> value="F">Female</option>
                </select>
              </div>
            </div>
            
          
            <!--------------> 
          
             <!------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">Country</label>
              <div class="col-sm-8">
                <select id="country_code" name="country_code" class="form-control txtselect">
                  <option value="">---Select---</option>
                  <?php
						for($i=0;$i<count($country);$i++){
							$sel="";
							if($country[$i]['countryid']==$result[0]['country_code']){ $sel="selected='selected'" ;}
							echo"<option ".$sel." ".set_select('country_code', ''.$country[$i]['countryid'].'')." value='".$country[$i]['countryid']."'>".$country[$i]['name']."</option>";
                    }?>
                </select>
              </div>
            </div>
            <!-------------> 
             <!------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">State</label>
              <div class="col-sm-8">
                <select id="state_code" name="state_code" class="form-control txtselect">
                  <option value="">---Select---</option>
                  <?php
						for($i=0;$i<count($state_code);$i++){
							$sel="";
							if($state_code[$i]['stateid']==$result[0]['state_code']){ $sel="selected='selected'" ;}
								echo"<option ".$sel." ".set_select('state_code', ''.$state_code[$i]['stateid'].'')." value='".$state_code[$i]['stateid']."'>".$state_code[$i]['name']."</option>";
                    }?>
                </select>
              </div>
            </div>
            <!-------------> 
            
            <!------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">City</label>
              <div class="col-sm-8">
                <select id="city_code" name="city_code" class="form-control txtselect">
                  <option value="">---Select---</option>
                  <?php
						for($i=0;$i<count($city_code);$i++){
							$sel="";
							if($city_code[$i]['cityid']==$result[0]['city_code']){ $sel="selected='selected'" ;}
							echo"<option ".$sel." ".set_select('city_code', ''.$city_code[$i]['cityid'].'')." value='".$city_code[$i]['cityid']."'>".$city_code[$i]['name']."</option>";
                    }?>
                </select>
              </div>
            </div>
            
            
              <!------------>
            
            <div class="form-group">
              <label class="col-sm-4 control-label">Student Photo</label>
              <div class="col-sm-8">
                <input type="file" name="student_photo" id="student_photo" value="<?php echo set_value('student_photo', ''.$result[0]['student_photo'].''); ?>" class="form-control"   />
         <input class="form-control"  name="old_path" type="hidden" value="<?=$result[0]['student_photo']?>" />

              </div>
            </div>
              <!------------>
          <?php
	if($segment['mode']=='Edit'){ ?>
	
           <div class="form-group">
            <label class="col-sm-4 control-label">Current Student Photo</label>
              <div class="col-sm-8">
                   <?php
	
                	if($result[0]['student_photo']!=''){
				?>
                <div class="col-lg-2"><img src="<?=main_url()?>upload/img_thum/<?=$result[0]['student_photo']?>" height="50" /></div>
                <?php } 
				else { echo "<span style='height:10px;color:#a94442;'> <strong>Image not available</strong> </span>"; 
				 }?>    
             </div>
            
            </div>
            
            
            <?php } ?>
            <!------------>
          </div>
        </div>
        <!---panel-body-----> 
      </div>
    </div>
  </div>
   <!------Student detail End------->
 
  
    <!--------Guardian Detail-------->
    <div class="row">
    <div class="col-md-12">
      <div class="panel panel-gradient" data-collapsed="0"> 
        <!-- panel head -->
        <div class="panel-heading">
          <div class="panel-title">Guardian Detail</div>
          <div class="panel-options"> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a></div>
        </div>
        
        <!-- panel body -->
        <div class="panel-body" <?=$style?>>
          <div class="col-md-6"> 
            
             <!-------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">Surname</label>
              <div class="col-sm-8">
                <input type="text" name="guardian_sur_name" id="guardian_sur_name"value="<?php echo set_value('guardian_sur_name', ''.$result[0]['guardian_sur_name'].''); ?>"  class="form-control cls_cap"  placeholder="GUARDIAN SURNAME"  />
               </div>
            </div>
            <!--------------> 
            <!-------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">First Name</label>
              <div class="col-sm-8">
                <input type="text" name="guardian_first_name" id="guardian_first_name" value="<?php echo set_value('guardian_first_name', ''.$result[0]['guardian_first_name'].''); ?>"class="form-control cls_cap"  placeholder="GUARDIAN FIRST NAME"  />
              </div>
            </div>
            <!--------------> 
            <!-------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">Middle Name</label>
              <div class="col-sm-8">
                <input type="text" name="guardian_middle_name" id="guardian_middle_name"value="<?php echo set_value('guardian_middle_name', ''.$result[0]['guardian_middle_name'].''); ?>"  class="form-control cls_cap"  placeholder="GUARDIAN LAST NAME"  />
              </div>
            </div>
            <!-------------> 
            
             <!------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">Email Id</label>
              <div class="col-sm-8">
                <input type="text" name="guardian_email" id="guardian_email" value="<?php echo set_value('guardian_email', ''.$result[0]['guardian_email'].''); ?>" class="form-control"  placeholder="GUARDIAN EMAIL ID"   />
         <?php echo form_error('guardian_email', '<p class="error">', '</p>'); ?>
              </div>
            </div>
            <!------------->
           
            <div class="form-group">
              <label class="col-sm-4 control-label">Address</label>
              <div class="col-sm-8">
                <textarea id="guardian_address" name="guardian_address" class="form-control txt-area cls_cap" placeholder="GUARDIAN ADDRESS"><?php echo set_value('guardian_address', ''.$result[0]['guardian_address'].''); ?></textarea>
              </div>
            </div>
            <!-------------> 
         
          </div>
          <div class="col-md-6"> 
          
           <!-------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">Phone No.</label>
              <div class="col-sm-8">
                <input type="number" name="guardian_phone_no" id="guardian_phone_no" value="<?php echo set_value('guardian_phone_no', ''.$result[0]['guardian_phone_no'].''); ?>" class="form-control" number="true" placeholder="GUARDIAN PHONE NO"  />
              </div>
            </div>
            <!--------------> 
            <!-------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">Mobile No.</label>
              <div class="col-sm-8">
                <input type="number" name="guardian_mobile_no" id="guardian_mobile_no" value="<?php echo set_value('guardian_mobile_no', ''.$result[0]['guardian_mobile_no'].''); ?>" class="form-control" number="true" placeholder="GUARDIAN MOBILE NO"  />
         <?php echo form_error('guardian_mobile_no', '<p class="error">', '</p>'); ?>
              </div>
            </div>
            
           
          <!------------->
            
            <!------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">Country</label>
              <div class="col-sm-8">
                <select id="g_country_code" name="g_country_code" class="form-control ">
                  <option value="">---Select---</option>
                  <?php
						for($i=0;$i<count($country);$i++){
							$sel="";
							if($country[$i]['countryid']==$result[0]['g_country_code']){ $sel="selected='selected'" ;}
						echo"<option ".$sel." ".set_select('g_country_code', ''.$country[$i]['countryid'].'')." value='".$country[$i]['countryid']."'>".$country[$i]['name']."</option>";
                    }?>
                </select>
              </div>
            </div>
            <!-------------> 
             <!------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">State</label>
              <div class="col-sm-8">
                <select id="g_state_code" name="g_state_code" class="form-control ">
                  <option value="">---Select---</option>
                  <?php
						for($i=0;$i<count($g_state_code);$i++){
							$sel="";
							if($g_state_code[$i]['stateid']==$result[0]['g_state_code']){ $sel="selected='selected'" ;}
							echo "<option ".$sel." ".set_select('g_state_code', ''.$g_state_code[$i]['stateid'].'')." value='".$g_state_code[$i]['stateid']."'>".$g_state_code[$i]['name']."</option>";
                    }?>
                </select>
              </div>
            </div>
            <!-------------> 
            
            <!------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">City</label>
              <div class="col-sm-8">
                <select id="g_city_code" name="g_city_code" class="form-control ">
                  <option value="">---Select---</option>
                  <?php
						for($i=0;$i<count($g_city_code);$i++){
							$sel="";
							if($g_city_code[$i]['cityid']==$result[0]['g_city_code']){ $sel="selected='selected'" ;}
							echo "<option ".$sel."  ".set_select('g_city_code', ''.$g_city_code[$i]['cityid'].'')." value='".$g_city_code[$i]['cityid']."'>".$g_city_code[$i]['name']."</option>";
                    }?>
                </select>
              </div>
            </div>
            
            
              <!------------> 
          </div>
        </div>
        <!---panel-body-----> 
      </div>
    </div>
    </div>
    <!--------Guardian Detail End--------> 
    
    
  
  
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-gradient" data-collapsed="0"> 
        <!-- panel head --> 
        
        <!-- panel body -->
        <div class="panel-body">
          <div class="col-md-12" align="center">
            <input type="submit" class="btn btn-primary" value="<?=$btnlable?>" />
               <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>">
              <button class="btn btn-default" type="button">Cancel</button>
              </a>
          </div>
        </div>
        <!---panel-body-----> 
      </div>
    </div>
  </div>
  </div>
   </div>
      </section>
    </div>
    <!-------End col-sm-12------------>
  
  </div>

 </div>
  </form>
<!--body wrapper end--> 

<script>
	$(document).ready(function(e) {
		
		////////////
			$("#frm1").validate({
				rules: {
					standard_code: "required",
					first_name: "required",
					sur_name: "required",
					middle_name: "required",
					admission_dt: "required",
					birthdt: "required",
				},
				messages: {
					standard_code  : "Standard is required",
					first_name: "First name is required",
					sur_name: " Surname is required",
					middle_name: "Middle name required",
					admission_dt: " Admission date is required",
					birthdt: "Birth date is required",
		
				}
        	});
		 		///////////
				
 
		 		
		 $(document).on('change', '#guardian_mobile_no', function (e) {
		 var mobile=$("#guardian_mobile_no");
			
			if(mobile_vali(mobile)==false){
				$("#guardian_mobile_no").focus();
				$("#guardian_mobile_no").val('');
				return false;
				}
		 });
			 function mobile_vali(mobile) {
        var pattern = /^\d{10}$/;
		//alert(mobile.val());
        if (!pattern.test(mobile.val())) {
           alert("It is not valid mobile number. input 10 digits number!");
        return false;
        }else{
				return true;
			}
        
     }
		/////////////
		
		
 
    });
	
	/////////////
	function Checkfiles()
    {
		
        var fup = document.getElementById('student_photo');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		var ext = ext.toLowerCase();
    	if(ext =="jpeg" ||  ext=="png"  || ext=="jpg")
    	{
        	return true;
   		}
    	else
    	{
        	alert("Upload jpeg,png,jpg Images only");
			fup.value="";
        	return false;
    	}
    }
	/////////////
</script>
</form>
<style>
	.req{
		color:#F00;
	}
	
	#msg{
	color:#F00;
	font-size:16px;
	}
	
	.error{
	font-weight:bold;
	color:#F00;
	}
	.txt-area{
	
		height:70px !important;
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
