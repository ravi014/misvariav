<div class="course-image">
	<img src="<?=base_url();?>admin/upload/img/<?=$header_img[0]['img_path']?>" alt="">
</div> <!-- /.course-image -->
<div class="container">
        <div class="row">

            <!-- Here begin Main Content -->
            <div class="col-md-4">

                <div class="widget-main">
                    <div class="widget-main-title">
                        <h4 class="widget-title">Pages</h4>
                    </div> <!-- /.widget-main-title -->
                    <div class="widget-inner">
                   		 <div class="event-small-list clearfix">
                           <div class="event-small-details">
                                <h5 class="event-small-title"><a href="<?=base_url();?>index.php/registration">Registration</a></h5>
                            </div>
                            
                        </div>
                         
                         
                        
                        
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->
			</div> <!-- /.col-md-4 -->
           
            <!-- Here begin Sidebar -->
          	<div class="col-md-8">
				<div class="row">
                    <div class="col-md-12">
                        <div class="course-post">
                        <div class="course-details clearfix">
                                <h3 class="course-post-title">Registration</h3>
                                	
                                  <!----------------->
                                	
                        <h4 style="margin-bottom:25px;">Please fill up below details to register as Alumni.</h4>
                        <form action="<?=base_url()?>index.php/registration/insertReg" id="form1" method="post">

                            <div class="col-sm-12 form-group">
                               <div class="col-sm-5">
                                    <label for="contact-input-name">Enrollment Number</label>
                               </div>
                               <div class="col-sm-6">
                                    <input type="text" class="form-control" id="enrolment_no" name="enrolment_no">
                                </div>
                            </div>
                            
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-5">
                                    <label for="contact-input-name">Year of Admission</label>
                               </div>
                               <div class="col-sm-6">
                                    <input type="text" class="form-control" id="admission_year" name="admission_year">
                                </div>
                            </div>
                            
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-5">
                                    <label for="contact-input-name">Month & Year of Program Completion</label>
                               </div>
                               <div class="col-sm-6">
                                    <input type="text" class="form-control" id="program_complete" name="program_complete">
                                </div>
                            </div>
                            
                             <div class="col-sm-12 form-group">
                               <div class="col-sm-5">
                                    <label for="contact-input-name">Name</label>
                                </div>
                               <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-5">
                                    <label for="contact-input-name">Address</label>
                               </div>
                               <div class="col-sm-6">
                                    <textarea class="form-control" id="address" name="address" rows="5" required></textarea>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-5">
                                    <label for="contact-input-name">City</label>
                               </div>
                               <div class="col-sm-6">
                                     <input type="text" class="form-control" id="city" name="city" required>
                                </div>
                            </div>
    
    
                            <div class="col-sm-12 form-group">
                                <div class="col-sm-5">
                                    <label for="contact-input-name">Pin code</label>
                               </div>
                               <div class="col-sm-6">
                                     <input type="text" class="form-control" id="pin_code" name="pin_code">
                                </div>
                            </div>	    
                            
                            <div class="col-sm-12 form-group">
                                <div class="col-sm-5">
                                    <label for="contact-input-name">E mail ID</label>
                               </div>
                               <div class="col-sm-6">
                                     <input type="text" class="form-control" id="email" name="email">
                                </div>
                            </div>	  
                            
                             <div class="col-sm-12 form-group">
                               <div class="col-sm-5">
                                    <label for="contact-input-name">Current Organization/University</label>
                               </div>
                               <div class="col-sm-6">
                                     <input type="text" class="form-control" id="current_university" name="current_university">
                                </div>
                            </div>	                            
                           
                           <div class="col-sm-12 form-group">
                               <div class="col-sm-5">
                                    <label for="contact-input-name">Current Position</label>
                               </div>
                               <div class="col-sm-6">
                                     <input type="text" class="form-control" id="current_position" name="current_position">
                                </div>
                            </div>	 
                           
                           	<div class="g-recaptcha" data-sitekey="6Lf3-AMTAAAAAJJnf2rOruLcF5xH_13c8TJl2ztO"></div>
                            
                            <div class="col-sm-12 form-group">
                                
                               <div class="col-sm-5"></div>
                               <div class="col-sm-6">
                                    <button id="regbtn" type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </form>
                       
				
                                  <!----------------->
                                    
                        </div> <!-- /.course-details -->
                        </div> <!-- /.course-post -->
					 </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->


               <!-- <div class="row">
                    <div class="col-md-12">
                        <div id="disqus_thread"></div>
                        <script type="text/javascript">
                                /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                                var disqus_shortname = 'esmeth'; // required: replace example with your forum shortname

                                /* * * DON'T EDIT BELOW THIS LINE * * */
                                (function() {
                                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
                    </div>--> <!-- /.col-md-12 -->
               <!-- </div>--> <!-- /.row -->

            </div> <!-- /.col-md-8 -->
    
        </div> <!-- /.row -->
    </div> 
    
  <style>
  	.form-control {
		margin-bottom:10px;
	}
  </style>  