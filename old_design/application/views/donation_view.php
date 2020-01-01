<script src='https://www.google.com/recaptcha/api.js'></script>

<section id="content">
	<div class="container">
		<div class="row">

			<!-- /.col-md-5 -->

			<div class="col-md-12">
				<div class="contact-page-content">
					<div class="contact-heading">
						<h3>Donate</h3>
						<p>Someone finds it difficult to understand your creative idea? There is a better visualisation. Share your views with me...</p>
					</div>
					<form action="<?=base_url()?>index.php/<?=$this->uri->rsegment(1)?>/insertrecord" id="form111" method="post">
						<div class="contact-form clearfix">
							<p class="full-row"> <span class="contact-label">
              <label for="name-id">Donation Type <span class="star">*</span>
								</label>
								</span>
								<select name="donationtype" id="donationtype" required>
									<option value="">Please Select</option>
									<option value="Domestic">Domestic</option>
									<option value="International">International</option>
								</select>
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="surname-id">Donation Amount <span class="star">*</span>
								</label>
								</span>
								<?php $form_value = set_value('donate_amount',$_POST['donate_amount']); ?>
								<input type="number" id="donate_amount" name="donate_amount" value="<?=$form_value?>" min="1" maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="txtbox1 txtrq" required>
								<span style="color:red;font-size: 12px;"> ALL AMOUNT IN INR</span>
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="message">Description</label></span>
								<?php $form_value = set_value('description',$_POST['description']); ?>
								<textarea id="description" name="description" value="" class="txtarea txtrq" onkeypress="return blockSpecialChar(event);"><?=$form_value?></textarea>
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="email-id">Donor’s Name <span class="star">*</span>
								</label>
								</span>
								<?php $form_value = set_value('donors_name',$_POST['donors_name']); ?>
								<input type="text"  onkeypress="return blockSpecialChar(event);" id="donors_name" name="donors_name" value="<?=$form_value?>" max="128" class="txtbox1 txtrq" required>
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="message">Donor’s Organization</label></span>
							<?php $form_value = set_value('donors_organization',$_POST['donors_organization']); ?>
								<input type="text" id="donors_organization"  onkeypress="return blockSpecialChar(event);" name="donors_organization" value="<?=$form_value?>" class="txtbox1 txtrq">
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="message">Street Address <span class="star"></span>
								</label>
								</span>
								<?php $form_value = set_value('street_address',$_POST['street_address']); ?>
								<input type="text" id="street_address" name="street_address" value="<?=$form_value?>" maxlength="255" class="txtbox1 txtrq" onkeypress="return blockSpecialChar(event);">
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="message">Address (cont.) <span class="star"></span>
								</label>
								</span>
								<?php $form_value = set_value('address',$_POST['address']); ?>
								<input type="text" id="address" name="address" value="<?=$form_value?>" class="txtbox1 txtrq"  onkeypress="return blockSpecialChar(event);">
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="message">City <span class="star">*</span>
								</label>
								</span>
								<?php $form_value = set_value('city',$_POST['city']); ?>
								<input type="text" id="city" name="city" value="<?=$form_value?>"  onkeypress="return blockSpecialChar(event);" maxlength="32" class="txtbox1 txtrq" required>
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="message">State <span class="star">*</span>
								</label>
								</span>
								<?php $form_value = set_value('state',$_POST['state']); ?>
								<input type="text" id="state" onkeypress="return blockSpecialChar(event);" name="state" value="<?=$form_value?>" maxlength="32" class="txtbox1 txtrq" required>
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="message">Zip Code <span class="star">*</span>
								</label>
								</span>
								<?php $form_value = set_value('zip_code',$_POST['zip_code']); ?>
								<input type="text" id="zip_code" onkeypress="return blockSpecialChar(event);" name="zip_code" value="<?=$form_value?>" maxlength="10" class="txtbox1 txtrq" required>
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="message">Country</label></span>
							<?php $form_value = set_value('country',$_POST['country']); ?>
								<input type="text" id="country" name="country" onkeypress="return blockSpecialChar(event);" value="<?=$form_value?>" class="txtbox1 txtrq" required>
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="message">Phone <span class="star">*</span>
								</label>
								</span>
								 <?php $form_value = set_value('phone',$_POST['phone']); ?>
								<input type="text" id="phone" onkeypress="return blockSpecialChar(event);" name="phone" value="<?=$form_value?>" maxlength="20" class="txtbox1 txtrq" required>
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="message">Mobile</label></span>
							<?php $form_value = set_value('mobile',$_POST['mobile']); ?>
								<input type="text" id="mobile" name="mobile" value="<?=$form_value?>" onkeypress="return blockSpecialChar(event);" class="txtbox1 txtrq">
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="message">Fax</label></span>
							<?php $form_value = set_value('fax',$_POST['fax']); ?>
								<input type="text" id="fax" name="fax" onkeypress="return blockSpecialChar(event);" value="<?=$form_value?>" class="txtbox1 txtrq">
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="message">E-mail <span class="star">*</span>
								</label>
								</span>
								 <?php $form_value = set_value('email',$_POST['email']); ?>
								<input type="email" id="email" name="email" value="<?=$form_value?>" onkeypress="return blockSpecialChar(event);" maxlength="100" class="txtbox1 txtrq" required>
							</p>

							<p class="full-row"> <span class="contact-label">
              <label for="message">Comment</label></span>
							<?php $form_value = set_value('comment',$_POST['comment']); ?>
								<textarea id="comment" name="comment" class="txtarea txtrq" onkeypress="return blockSpecialChar(event);"><?=$form_value?></textarea>
							</p>
							<div style="margin-left:30%;">
								<!--<div class="g-recaptcha" data-sitekey="6LcYnzAUAAAAAO2BLDnFx8mNKQEbu6UGxaqesmsP"></div>-->

							</div>
							<p class="full-row">
								<input class="mainBtn" type="submit" name="" value="Send Message">
							</p>
						</div>
					</form>
					<?php echo validation_errors(); ?>
				</div>
			</div>
			<!-- /.col-md-7 -->

		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</section>
<script>
	$(document).ready(function(e) {

		var cap_count = 0;
		$('form#form1').on('submit',function (e) {
			$('#donate_amount').val(Math.round($('#donate_amount').val() ) );
			if ( $('#donate_amount').val() > 250000 ) {
				$("#donate_amount").focus();
				alert('You can donate maximum 250000 INR.');
				return false;
			}
		} );
		//Start to Disable CUT COPY PASTE
		$('input[type=text], textarea').bind("cut copy paste", function (e) {
			e.preventDefault();
		} );
		//End to Disable CUT COPY PASTE

	} );
	$("#donationtype").change(function () {

		if ($("#donationtype").val() == "Domestic") {
			$("#country").val("IND" );
			$("#country").prop("readonly", true);
		} else {
			$("#country").val("");
			$("#country").prop("readonly", false);
		}
	} );

	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && ( charCode < 48 || charCode > 57) )
			return false;

		return true;
	}

	function blockSpecialChar(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		var blockChar = [ 126, 96, 33, 37, 94, 38, 42, 45, 43, 124, 92, 47, 63, 123, 125, 91, 93, 58, 59, 39, 34, 60, 62, 40, 41 ];
		if (jQuery.inArray(charCode, blockChar) !== -1) {
			alert("Special Character is not allowed.");
			return false;
		}
		return true;
	}
</script>
<style>
	.form-control {
		margin-bottom: 10px;
	}
	
	.contact-form textarea {
		width: 45%!important;
	}
	
	.contact-form .mainBtn {
		margin-top: 10px;
	}
	
	.contact-form select {
		height: 36px;
		width: 45%;
		border: 1px solid;
		border-color: #d5dbe0 !important;
	}
	
	.star {
		color: red;
		font-size: 12px;
	}
</style>