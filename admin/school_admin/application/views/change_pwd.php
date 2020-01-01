

<script language="javascript" type="text/javascript">
	$(document).on('submit','#form1',function(e){
		if($('#old_password').val()==''){
			$('#old_password').focus();
			return false;
		}
		
		if($('#new_password').val()==''){
			$('#new_password').focus();
			return false;
		}
		
		if($('#new_password').val().length <5){
			alert('Password Minimum length 5 Characters');
			$('#new_password').focus();
			return false;
		}
		
		if($('#retypepwd').val() != $('#new_password').val()){
			alert('Confirm Password Not Match');
			$('#retypepwd').focus();
			return false;
		}	
	});
</script>
<style>
#ab {
   color: #65CEA7;
}	   
</style>    

<div class="page-heading">
            <h4>
                CHANGE PASSWORD
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li class="active" > <a id="ab" href="<?php echo base_url(); ?>index.php/changepwd/view">Change password</a></li>
             
            </ul>
            
        </div>

<div class="wrapper">
  <div class="row">
  <form class="cmxform form-horizontal" name="passfrm" id="form1"  method="post" action="<?=base_url()?>index.php/<?=$this->uri->segment(1)?>/insert" >
    <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />

   <?php if($this->session->flashdata('show_msg')!=''){?>
  <div class="alert alert-success fade in">
    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
    <?=$this->session->flashdata('show_msg');?>
  </div>
  <?php } ?>
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading"> CHANGE PASSWORD
        </header>
        <div class="panel-body">
       
          <div class=" form">
           
               <div class="form-group">
      <label class="col-md-2 control-label"><strong>Old Password</strong></label> 
      <div class="col-sm-5">
        	 <input type="password" name="old_password" id="old_password"  class="form-control"  required   data-validate="required" data-message-required="Enter Old Password" placeholder="Old Password" / ></td>
              <?php echo form_error('old_password', '<p class="error">', '</p>'); ?>
      </div>
    </div>
     <div class="form-group">
      <label class="col-md-2 control-label"><strong>New Password</strong></label> 
      <div class="col-sm-5">
        	<input type="password" name="new_password" id="new_password"  required class="form-control" data-validate="required" data-message-required="Enter New Password" placeholder="New Password" />
              <?php echo form_error('new_password', '<p class="error">', '</p>'); ?> 
      </div>
    </div>
     <div class="form-group">
      <label class="col-md-2 control-label"><strong>Confirm New Password</strong></label> 
      <div class="col-sm-5">
        	<input type="password" name="retypepwd"  id="retypepwd" required   class="form-control" data-validate="required" data-message-required="Enter Confirm Password" placeholder="Confirm Password" />
     		<?php echo form_error('retypepwd', '<p class="error">', '</p>'); ?> 
      </div>
    </div>
    
    
    
    <div class="form-group">
    <div class="col-sm-4" align="center">
      		<input type="submit" class="btn btn-primary" name="update" value="Change Password"/>
      		<a href="<?php echo base_url();?>" class="btn btn-default">Cancel</a>
      </div>
    </div>

     
         
          </div>
        </div>
      </section>
    </div>
    <!-------End col-sm-12------------>
   </form>
  </div>
</div>
<style>


.error{
	font-weight:bold;
	color:#F00;
}
</style>