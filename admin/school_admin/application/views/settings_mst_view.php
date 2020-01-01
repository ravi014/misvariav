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
                SETTINGS  
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li class="active">Settings</li>
              
            </ul>
            
        </div>
<!-- page heading end-->

<!--body wrapper start-->
<form class="cmxform form-horizontal" id="frm-vali" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insert" enctype="multipart/form-data">
<div class="wrapper">
  <div class="row">
   <?php if($this->session->flashdata('show_msg')!=''){?>
  <div class="alert alert-success fade in">
    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
    <?=$this->session->flashdata('show_msg');?>
  </div>
  <?php } ?>
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading">SETTINGS 
        <?php echo $segment['mode'] ?>
          
        </header>
        <div class="panel-body">
          <div class=" form">
            <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
                 <input type="hidden" name="base_url" id="base_url" value=" <?php echo base_url();?>" />
            <input class="form-control"  name="mode" id="mode" type="hidden" value="<?=$segment['mode']?>" />

            <input class="form-control"  name="eid" id="eid" type="hidden" value="<?=$segment['eid']?>" />

<input class="form-control"  name="master_code" id="master_code" type="hidden" value="<?=$result[0]['master_code']?>" />
<div class="form-group">
<div class="col-md-6" >
<h5> NOTIFICATION SETTINGS </h5>
<hr/>
            <div class="form-group ">
                 <label for="cname" class="control-label col-lg-4"><strong>SMS Gateway URL</strong><span class="error"> * </span></label>
                 <div class="col-lg-8">
                  <textarea class="form-control"  name="url" required id="url" type="url" ><?php echo set_value('url', ''.$result[0]['url'].''); ?></textarea>
                    <?php echo form_error('url', '<p class="error">', '</p>'); ?>

                </div>
                
           
                
              </div>
           
         </div>     
   <div class="col-md-6">
<h5> TIMETABLE SETTINGS </h5>
<hr/>           
             <div class="form-group ">
                 <label for="cname" class="control-label col-lg-5"><strong>No. Of Lecture Per Day</strong><span class="error"> * </span></label>
                 <div class="col-lg-4">
                  <input class="form-control"  name="lecture" required id="lecture" type="number" value="<?php echo set_value('lecture', ''.$result[0]['lecture'].''); ?>"/>
                    <?php echo form_error('lecture', '<p class="error">', '</p>'); ?>

                </div>
                
           
                
              </div> 
              </div>
                            

              </div>
      
           <div>
           <br/>
  <hr/>        
<h5> APP PAGES SETTINGS </h5>
<hr/>
                 
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"><strong>School Name</strong><span class="error"> * </span></label>
                <div class="col-lg-3">
                  <input class="form-control" name="name"  id="name" required value="<?php echo set_value('name', ''.$result[0]['name'].''); ?>"  type="text" />
                  <?php echo form_error('name', '<p class="error">', '</p>'); ?>

                </div>
                
           
                   <label for="cname" class="control-label col-lg-2"><strong>Email Id</strong><span class="error"> * </span></label>
                 <div class="col-lg-3">
                  <input class="form-control" name="email" id="email"  type="email"value="<?php echo set_value('email', ''.$result[0]['email'].''); ?>" />
                    <?php echo form_error('email', '<p class="error">', '</p>'); ?>
                </div>
             
   </div>
   <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"><strong>School Address</strong><span class="error"> * </span></label>
                <div class="col-lg-8">
                  <textarea class="form-control" rows="3" name="address"  id="address" required  ><?php echo set_value('address', ''.$result[0]['address'].''); ?></textarea>
                  <?php echo form_error('name', '<p class="error">', '</p>'); ?>

                </div>
                
                </div>
              <div class="form-group ">
                   <label for="cname" class="control-label col-lg-2"><strong>Mobile No.</strong><span class="error"> * </span></label>
                 <div class="col-lg-3">
                  <input class="form-control" name="mobile" id="mobile"  type="number"value="<?php echo set_value('mobile', ''.$result[0]['mobile'].''); ?>"  />
                    <?php echo form_error('mobile', '<p class="error">', '</p>'); ?>
                </div>
                 <label for="cname" class="control-label col-lg-2"><strong>Phone No.</strong><span class="error"> * </span></label>
                 <div class="col-lg-3">
                  <input class="form-control" name="phone" id="phone"  type="number" value="<?php echo set_value('phone', ''.$result[0]['phone'].''); ?>" />
                    <?php echo form_error('phone', '<p class="error">', '</p>'); ?>
                </div>
                
          
              </div>
              <div class="form-group ">
                    <label for="cname" class="control-label col-lg-2"><strong>School Image</strong><span class="error"> * </span></label>
                <div class="col-lg-3">
                  <input class="form-control"  name="school_img" id="school_img" onChange="Checkfiles();" value="<?=$result[0]['school_img']?>"  type="file" />
                   <input class="form-control"  name="old_path" type="hidden" value="<?=$result[0]['school_img']?>" />
                </div>
               
                    <label for="cname" class="control-label col-lg-2"><strong>School Logo</strong><span class="error"> * </span></label>
                <div class="col-lg-3">
                  <input class="form-control"  name="school_logo" id="school_logo" onChange="Checkfiles();" value="<?=$result[0]['school_logo']?>"  type="file" />
                   <input class="form-control"  name="old_path1" type="hidden" value="<?=$result[0]['school_logo']?>" />
                </div>
               
               
              </div>
             
             <?php if(count($result)!=0){ ?>
             
             <div class="form-group ">
                 <?php if($result[0]['school_img']!=''){ ?>
                     <label for="cname" class="control-label col-lg-2"><strong>Current School Image </strong></label>
                   <div class="col-md-3"> <img src="<?=main_url()?>upload/img_thum/<?=$result[0]['school_img']?>" height="50" /></div>
             
                <?php } 
				else {  ?>
                 <label for="cname" class="control-label col-lg-2"><strong>Current School Image </strong></label>
             <div class="col-lg-3">      <?php echo "<span style='height:10px;color:#a94442;'> <strong>Not available</strong> </span>"; ?></div> 
			<?php	 } ?>  
            
            
             <?php if($result[0]['school_logo']!=''){ ?>
                     <label for="cname" class="control-label col-lg-2"><strong>Current School Logo </strong></label>
                   <div class="col-md-3"> <img src="<?=main_url()?>upload/img_thum/<?=$result[0]['school_logo']?>" height="50" /></div>
             
                <?php } 
				else {  ?>
                 <label for="cname" class="control-label col-lg-2"><strong>Current School Logo </strong></label>
             <div class="col-lg-3">      <?php echo "<span style='height:10px;color:#a94442;'> <strong>Not available</strong> </span>"; ?></div> 
			<?php	 } ?>  
             
                 
                </div>
              
              <?php } ?>
                
            <hr/>
            </div>
          <div class="form-group" align="center">
              <button class="btn btn-primary" type="submit">Save</button>
              <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>">
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
