<!-- page heading start-->


<link rel="stylesheet" type="text/css" href="<?php echo asset_path();?>asset/css/datepicker-custom.css" />
<script type="text/javascript" src="<?php echo asset_path();?>asset/js/bootstrap-datepicker.js"></script>
<style>
	
.error{
	font-weight:bold;
	color:#F00;
}
#ab {
   color: #65CEA7;
}
</style>
 <div class="page-heading">
            <h4>
                PROFILE  
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li class="active"> <a id="ab" href="<?php echo base_url(); ?>index.php/profile/view">Profile</a></li>
              
            </ul>
            
        </div>
<!-- page heading end-->

<!--body wrapper start-->
<form class="cmxform form-horizontal" id="frm-vali" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insert" enctype="multipart/form-data">
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
        <header class="panel-heading">EDIT PROFILE
          
        </header>
        <div class="panel-body">
          <div class=" form">
            <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
                 <input type="hidden" name="base_url" id="base_url" value=" <?php echo base_url();?>" />

            <input class="form-control"  name="eid" id="eid" type="hidden" value="<?=$this->session->userdata['logged_in_school']['usercode']?>" />

<input class="form-control"  name="master_code" id="master_code" type="hidden" value="<?=$result[0]['master_code']?>" />
<input class="form-control"  name="old_username" id="old_username" type="hidden" value="<?=$result[0]['username']?>" />

            <div class="form-group ">
                 <label for="cname" class="control-label col-lg-2"><strong>Username</strong></label>
                 <div class="col-lg-3">
                  <input class="form-control"  name="username" required id="username" type="text" value="<?php echo set_value('username', ''.$result[0]['username'].''); ?>"/>
                    <?php echo form_error('username', '<p class="error">', '</p>'); ?>

                </div>
                
           
                <label for="cname" class="control-label col-lg-2"><strong>School Name</strong></label>
                <div class="col-lg-3">
                  <input class="form-control" name="name"  id="name" required value="<?php echo set_value('name', ''.$result[0]['name'].''); ?>"  type="text" />
                  <?php echo form_error('name', '<p class="error">', '</p>'); ?>

                </div>
                
              </div>
              <div class="form-group ">
                   <label for="cname" class="control-label col-lg-2"><strong>Email Id</strong></label>
                 <div class="col-lg-3">
                  <input class="form-control" name="email" id="email"  type="email"value="<?php echo set_value('email', ''.$result[0]['emailid'].''); ?>" />
                    <?php echo form_error('email', '<p class="error">', '</p>'); ?>
                </div>
                
           
                <label for="cname" class="control-label col-lg-2"><strong>Mobile No.</strong></label>
                 <div class="col-lg-3">
                  <input class="form-control" name="mobile" id="mobile"  type="text"value="<?php echo set_value('mobile', ''.$result[0]['mobileno'].''); ?>"  />
                    <?php echo form_error('mobile', '<p class="error">', '</p>'); ?>
                </div>
                
   </div>
              <div class="form-group ">
                 <label for="cname" class="control-label col-lg-2"><strong>Phone No.</strong></label>
                 <div class="col-lg-3">
                  <input class="form-control" name="phone" id="phone"  type="text"value="<?php echo set_value('phone', ''.$result[0]['phone_no'].''); ?>" />
                    <?php echo form_error('phone', '<p class="error">', '</p>'); ?>
                </div>
                
          
                <label for="cname" class="control-label col-lg-2"><strong>Country</strong></label>
                 <div class="col-lg-3">
<select class="form-control"  id="country" name="country" required data-rule-required="true">
                    	<option value="" >--Select--</option>
                        <?php
                        	for($i=0;$i<count($country);$i++){
								$sel="";
								if($country[$i]['countryid']==$result[0]['country']){
									$sel='selected="selected"';	
								}
								echo  "<option ".$sel." ".set_select('country', ''.$country[$i]['countryid'].'')." value='".$country[$i]['countryid']."'>".$country[$i]['name']."</option>";	
							}
						?>
                    </select>                  
                      <?php echo form_error('country', '<p class="error">', '</p>'); ?>
              
              
                    
              </div>
              <div class="form-group ">
                       </div>
                        <label for="cname" class="control-label col-lg-2"><strong>State</strong></label>
                 <div class="col-lg-3">
<select class="form-control"  id="state" name="state" required data-rule-required="true">
                    	<option value="" >--Select--</option>
                        <?php
                        	for($i=0;$i<count($state);$i++){
								$sel="";
								if($state[$i]['stateid']==$result[0]['state']){
									$sel='selected="selected"';	
								}
								echo  "<option ".$sel." ".set_select('state', ''.$state[$i]['stateid'].'')." value='".$state[$i]['stateid']."'>".$state[$i]['name']."</option>";	
							}
						?>
                    </select>      
                        <?php echo form_error('state', '<p class="error">', '</p>'); ?>
        
                           
                       </div>
           
                <label for="cname" class="control-label col-lg-2"><strong>City</strong></label>
                 <div class="col-lg-3">
<select class="form-control"  id="city" name="city" required data-rule-required="true">
                    	<option value="" >--Select--</option>
                        <?php
                        	for($i=0;$i<count($city);$i++){
								$sel="";
								if($city[$i]['cityid']==$result[0]['city']){
									$sel='selected="selected"';	
								}
								echo  "<option ".$sel." ".set_select('city', ''.$city[$i]['cityid'].'')." value='".$city[$i]['cityid']."'>".$city[$i]['name']."</option>";	
							}
						?>
                    </select> 
                      <?php echo form_error('city', '<p class="error">', '</p>'); ?>
               
                       </div>
                          </div>
              <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2"><strong>Profile Picture</strong></label>
                <div class="col-lg-3">
                  <input class="form-control" name="user_img" id="user_img" onChange="Checkfiles();" value="<?=$result[0]['user_img']?>"  type="file" />
                   <input class="form-control"  name="old_path" type="hidden" value="<?=$result[0]['user_img']?>" />
                </div>
               
               
                  <label for="cname" class="control-label col-lg-2"><strong>Current Profile Picture</strong></label>
                <div class="col-lg-3">
                <?php
	
                	if($result[0]['user_img']!=''){
				?>
                <div class="col-lg-2"><img src="<?=main_url()?>upload/img_thum/<?=$result[0]['user_img']?>" height="50" /></div>
                <?php } 
				else { echo "<span style='height:10px;color:#a94442;'> <strong>Image not available</strong> </span>"; 
				 }?>    
             </div>
              </div>
             
             <br/>
          <div class="form-group" align="center">
              <button class="btn btn-primary" type="submit">Save</button>
              <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>/view">
              <button class="btn btn-default" type="button">Cancel</button>
              </a> </div>
         
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
        var base_url=$("#base_url").val();
		$("#country").change(function(e) {
            var cty=$(this).val();
		
			$.ajax({
					url:base_url+"index.php/ajax/getstate/"+cty,
					success: function(result)
					{
						
						$("#state").html(result);	
					},
			     });
		
		});
		
		$("#state").change(function(e) {
             var state=$(this).val();
			//alert(base_url+"index.php/ajax/getcity/"+state);
			$.ajax({
					url:base_url+"index.php/ajax/getcity/"+state,
					success: function(res)
					{
						$("#city").html(res);	
					}
			     });
        });
		
		  });
		  
		</script>
<script>
	$(document).ready(function(e) {
		
		////////////
			$("#frm-vali").validate({
				rules: {
					name: "required",
					username: "required",
					password: "required",
					email: "required",
					country: "required",
					state:"required";
					city:"required";
				},
				messages: {
					name: "Name is required",
					username: "Username is required",
					password: "Password is required",
					email: "email is required",
					country: "country is required",
					state:"state is required",
					city:"city is required",	
				}
        	});
		 		///////////
 
		 		
		 $(document).on('change', '#mobile', function (e) {
		 var mobile=$("#mobile");
			
			if(mobile_vali(mobile)==false){
				$("#mobile").focus();
				$("#mobile").val('');
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
</script> 
  
<script>
	function Checkfiles()
    {
		
        var fup = document.getElementById('user_img');
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
</script>
