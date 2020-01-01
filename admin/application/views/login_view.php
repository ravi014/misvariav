<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="ThemeBucket">
<link rel="shortcut icon" href="#" type="image/png">
<title>Login</title>

<link href="<?php echo base_url();?>u_asset/asset/css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>u_asset/asset/css/style-responsive.css" rel="stylesheet">

</head>


<body class="login-body">
<style>
.error{
	font-weight:bold !important;
	color:#F00 !important;
}
	.msg{
		color:#F00 !important;
		font-weight:bold !important;
	}
</style>
<div class="container">
  <form class="form-signin" method="post" id="frm" action="<?=base_url()?>index.php/login/login_submit">
    <div class="form-signin-heading text-center">
      <h1 class="sign-title">Sign In</h1>
    </div>
    <div class="login-wrap">
      <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
     <?php /*?> <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" /><?php */?>
      <input type="text" class="form-control" name="username" id="username"placeholder="Username" required autofocus>
      <?php echo form_error('username', '<p class="error">', '</p>'); ?>
      <input type="password" class="form-control" placeholder="Password"  name="password" required id="password">
      <?php echo form_error('password', '<p class="error">', '</p>'); ?>
      <p class="msg">
        <!-- <?=$error?> -->
      </p>
      
  
            
      <button class="login-btn btn btn-lg btn-login btn-block " type="submit"> <i class="fa fa-check"></i> </button>
      <div class="registration"> <span id="msgsttus"> </span>  </div>
     <label >
          <!-- <input type="checkbox" value="remember-me"> Remember me-->
                <span class="pull-right">
<!--      <a data-toggle="modal" href="#myModal"> Forgot Password?</a>-->
                </span>
            </label> 
      
    </div>
    </form>
    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form  method="post" id="frm1" action="">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Forgot Password ?</h4>
          </div>
          <div class="modal-body">
            <p>Enter your e-mail address below to reset your password.</p>
            <input type="email" name="email" id="email" placeholder="Email" required autocomplete="off" class="form-control ">
            <span class="msgsttus"> </span> </div>
          <div class="modal-footer">
            <button class="frgt_btn btn btn-primary" type="button" >Submit</button>
             <button data-dismiss="modal" class="btn btn-default" type="button" >Cancel</button>
             
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- modal -->
    

</div>
<!-- Placed js at the end of the document so the pages load faster --> 
<script src="<?php echo base_url();?>u_asset/asset/js/jquery-migrate-1.2.1.min.js"></script> 
<script src="<?php echo base_url();?>u_asset/asset/js/validation-init.js"></script>
<script src="<?php echo base_url();?>u_asset/asset/js/jquery-1.10.2.min.js"></script> 
<script src="<?php echo base_url();?>u_asset/asset/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url();?>u_asset/asset/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>u_asset/asset/js/scripts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>u_asset/asset/js/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(e) {
			
			$("#frm").validate({
				rules: {
					username: "required",
					password: "required",
					
				},
				messages: {
					username: "Username is required",
					password: "Password is required",
					
				}
        	});
			
		$(document).on('click', '.frgt_btn', function (e) {
			//alert("dffd");
			 
      var   email= $('#email').val();
    
	alert(email);
	var url = '<?php echo base_url(); ?>index.php/login/forget_pwd/'+email;
	alert(url);
	 $.ajax({url: url,
	success: function(msg) {
		     if (msg == "YES")
                {
			    $('.msgsttus').html('<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
				}else if (msg == "NO") {
                $('.msgsttus').html('<div class="alert alert-danger text-center">Error in sending your message! Please try again later.</div>');
				}else if (msg == "0"){
                $('.msgsttus').html('<div class="alert alert-danger text-center">Please enter your registered email id!!</div>');
        
				}
				}
    });
    return false;
});
});

</script>
</body>
</html>
