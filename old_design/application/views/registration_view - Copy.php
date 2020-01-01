<div id="header_img">
 <a href="#"><img src="<?=base_url();?>admin/upload/img/<?=$header_img[0]['img_path']?>" alt="img01"/></a>
</div>

		<section id="content">
			<div class="container">
				<div class="row">

					<!-- ==== SIDEBAR START == -->

					<div class="col-sm-3">
                    	<div class="bluebox">
                            <div id="yellow"></div>
                            <div id="green"></div>
                            <div id="red"></div>
                            <div id="conbox">
                            <h3>Registration</h3>
							</div>
						</div>
					</div>
					<div class="col-sm-1"></div>

					<!-- ==== COURSES START == -->
					<div class="col-sm-8">
                        <h3>Please fill up below details to register as Alumni.</h3>
                        <form action="<?=base_url()?>index.php/page/insertrecord" id="form1" method="post">

                            <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">Enrollment Number</label>
                               </div>
                               <div class="col-sm-6">
                                    <input type="text" class="form-control" id="enrolment_no" name="enrolment_no">
                                </div>
                            </div>
                            
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">Year of Admission</label>
                               </div>
                               <div class="col-sm-6">
                                    <input type="text" class="form-control" id="admission_year" name="admission_year">
                                </div>
                            </div>
                            
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">Month & Year of Program Completion</label>
                               </div>
                               <div class="col-sm-6">
                                    <input type="text" class="form-control" id="program_complete" name="program_complete">
                                </div>
                            </div>
                            
                             <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">Name</label>
                                </div>
                               <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">Address</label>
                               </div>
                               <div class="col-sm-6">
                                    <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">City</label>
                               </div>
                               <div class="col-sm-6">
                                     <input type="text" class="form-control" id="city" name="city">
                                </div>
                            </div>
    
    
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">Pin code</label>
                               </div>
                               <div class="col-sm-6">
                                     <input type="text" class="form-control" id="pin_code" name="pin_code">
                                </div>
                            </div>	    
                            
                            <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">E mail ID</label>
                               </div>
                               <div class="col-sm-6">
                                     <input type="text" class="form-control" id="email" name="email">
                                </div>
                            </div>	  
                            
                             <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">Current Organization/University</label>
                               </div>
                               <div class="col-sm-6">
                                     <input type="text" class="form-control" id="current_university" name="current_university">
                                </div>
                            </div>	                            
                           
                           <div class="col-sm-12 form-group">
                               <div class="col-sm-3">
                                    <label for="contact-input-name">Current Position</label>
                               </div>
                               <div class="col-sm-6">
                                     <input type="text" class="form-control" id="current_position" name="current_position">
                                </div>
                            </div>	 
                           
                           	<div class="g-recaptcha" data-sitekey="6Lf3-AMTAAAAAJJnf2rOruLcF5xH_13c8TJl2ztO"></div>
                            <div class="col-sm-12 form-group">
                                <div class="col-sm-3">
                                <button id="regbtn" type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </form>
                       
					</div>
				</div>
			</div>
		</section>