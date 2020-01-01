<script src='https://www.google.com/recaptcha/api.js'></script>
<div id="header_img">
 <a href="#">
 <img src="<?=base_url();?>admin/upload/img/<?=$header_img[0]['img_path']?>" alt="img01"/>
 </a>
 
</div>

		<section id="content">
			<div class="container">
            	
				<div class="row">
                	<div class="col-sm-12">
                      	<p>&nbsp;</p>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d921.4782108365305!2d72.95169699999995!3d22.507453000000016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xc536896878ad3b0c!2sSwaminarayan+Sankir+Pith-international+School!5e0!3m2!1sen!2sin!4v1433332939584" width="100%" height="450" frameborder="0" style="border:0"></iframe>
                    </div>
                   
                </div>
                
                <div class="row">
					<div class="col-sm-5">
						<div class="row">
							<div class="col-xs-12">
								<h1>Contact Details</h1>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2 col-xs-3">
								<i class="fa fa-map-marker fa-5x primary-color"></i>
							</div>
							<div class="col-lg-10 col-xs-9">
								<h3 class="no-margin">Address</h3>
								Swaminarayan Sanskar Pith<br>
								Anand - Borsad Road<br>
                                Navli <br>
								Gujarat, 388355	
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2 col-xs-3">
								<i class="fa fa-phone fa-5x primary-color"></i>
							</div>
							<div class="col-lg-10 col-xs-9">
								<h3 class="no-margin">Phone &amp; Fax</h3>
								Phone: <a href="tel:1800123456">+91 2692 283845</a><br>
								Fax: <a href="tel:1800123456">02692-283645</a>
                               
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2 col-xs-3">
								<i class="fa fa-envelope fa-4x primary-color"></i>
							</div>
							<div class="col-lg-10 col-xs-9">
								<h3 class="no-margin">Email</h3>
								Email: <a href="mailto:info@smartway.com">principal@sspis.org</a><br>
								Email: <a href="mailto:courses@smartway.com">admin@sspis.org</a>
							</div>
						</div>
					</div>
                    
                    <div class="col-sm-7">
						<div class="row">
							<div class="col-xs-12">
								<h1>Contact Form</h1>
							</div>
						</div>
						<div class="row">
							 <form action="<?=base_url()?>index.php/sendmail/send" id="contactfrm" method="post">
    
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">Your Name: (*)</label>
                               </div>
                               <div class="col-sm-8">
                                    <input type="text" class="form-control txtrq" id="first_nm" name="first_nm">
                                </div>
                            </div>
                            
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">Your Email:(*)</label>
                               </div>
                               <div class="col-sm-8">
                                    <input type="text" class="form-control txtrq" id="emailid" name="emailid">
                                </div>
                            </div>
                            
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">Your Contact:(*)</label>
                               </div>
                               <div class="col-sm-8">
                                    <input type="text" class="form-control txtrq" id="contactno" name="contactno">
                                </div>
                            </div>
                            
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">Your message:(*)</label>
                               </div>
                               <div class="col-sm-8">
                                   <textarea class="form-control txtrq" id="txtcomment" name="txtcomment" rows="5"></textarea>
                                </div>
                            </div>
                            
                             <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                </div>
                                 <div class="col-sm-8">
                                 	<div class="g-recaptcha" data-sitekey="6LcDqA8UAAAAAIXhafQXcXYNC_m8zQLYOPMNU_I-"></div>
                                 </div>
                            </div>
                          
                            <div class="col-sm-12 form-group" style="text-align:center!important;">
                               
                                <button id="regbtn" type="submit" class="btn btn-primary">Register</button>
                               
                            </div>
                </form>	
						</div>
						
					</div>
					
						
					
				</div>
                
                
			</div>
		</section>
        
  <script data-cfasync="false">
	$(document).ready(function(e) {
		var cap_count=0;
        $('form#contactfrm').on('submit', function (e) {
			cap_count++;
			var cp=cap_count%2;
			var first_nm	=	$("#first_nm").val();	 if(first_nm=="")  	{ $("#first_nm").focus(); return false; }
			var emailid		=	$("#emailid").val();	 if(emailid=="")   	{ $("#emailid").focus(); return false; }
			if(IsEmail(emailid)==false){ $("#emailid").focus(); $("#emailid").val('');return false;}
			var contactno	=	$("#contactno").val();	 if(contactno=="")  { $("#contactno").focus(); return false; }
			if(contactno_vali(contactno)==false){$("#contactno").focus();$("#contactno").val('');return false;}
			var txtcomment	=	$("#txtcomment").val();	 if(txtcomment=="")  { $("#txtcomment").focus(); return false; }
			
			
		
			var form = $(this);
			var post_url = form.attr('action');
			$.ajax({
        		type: 'post',
				url: post_url,
				data: $(this).serialize(),
       			success: function (result) 
				{	
					if(result=='0')	{
						alert('Captcha Is Require');
					}
					if(result=='1')	{
						alert('Your Message Send sussesfully');
						$(".txtrq").val('');
					}
          		}
      		});
			return false;
						
		});
		function IsEmail(email) {
			var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(!regex.test(email)) {
				alert("Enter valid email id..!");
				return false;
				
			}else{
				return true;
			}
      }
	  
	  function contactno_vali(contactno) {
        var pattern = /^\d{10}$/;
        if (pattern.test(contactno)) {
            return true;
        }
        alert("It is not valid mobile number. Enter 10 digits number!");
        return false;
     }
	
	
    });
</script>      