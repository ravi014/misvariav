<script src='https://www.google.com/recaptcha/api.js'></script>


<div class="kingster-page-wrapper" id="kingster-page-wrapper">
                <div class="gdlr-core-page-builder-body">
                    <div class="gdlr-core-pbf-wrapper " style="padding: 10px 0px 0px 0px;">
                        <div class="gdlr-core-pbf-background-wrap"></div>
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                <div class="gdlr-core-pbf-column gdlr-core-column-60 gdlr-core-column-first">
                                    <div class="gdlr-core-pbf-column-content-margin gdlr-core-js ">
                                        <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js " style="max-width: 760px ;">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 22px ;">
                                                    <div class="gdlr-core-title-item-title-wrap clearfix">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 25px ;">Donate</h3></div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 15px ;font-style: normal ;text-transform: uppercase ;">Someone finds it difficult to understand your creative idea? There is a better visualisation. Share your views with me...</span></div>
                                            </div>
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-contact-form-7-item gdlr-core-item-pdlr gdlr-core-item-pdb ">
                                                    <div role="form" class="wpcf7" id="wpcf7-f1979-p1964-o1" lang="en-US" dir="ltr">
                                                        <div class="screen-reader-response"></div>
                                                        <form id="form111" class="quform"  action="<?=base_url()?>index.php/<?=$this->uri->rsegment(1)?>/insertrecord" method="post" enctype="multipart/form-data" onclick="">
                                                        	<div class="quform-elements">
                                                                <div class="quform-element">
                                                                    <p>Donation Type (required)
                                                                        <br>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                        	<select class="input1" name="donationtype" id="donationtype" required>
                                                                        		<option value="">Please Select</option>
                                                                        		<option value="Domestic">Domestic</option>
                                                                        		<option value="International">International</option>
                                                                        	</select>
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>Donation Amount (required)
                                                                        <br>
                                                                        <?php $form_value = set_value('donate_amount',$_POST['donate_amount']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-email">
                                                                            <input class="input1" type="number" id="donate_amount" name="donate_amount" pattern="(?=.*\d)" value="<?=$form_value?>" min="1" maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="txtbox1 txtrq" required>
                                                                            <span style="color:red;font-size: 12px;"> ALL AMOUNT IN INR</span>
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>Description
                                                                        <br>
                                                                        <?php $form_value = set_value('description',$_POST['description']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                            <textarea id="description" name="description" value="" class="input1" onkeypress="return blockSpecialChar(event);"><?=$form_value?></textarea>
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>Donor’s Name (required)
                                                                        <br>
                                                                        <?php $form_value = set_value('donors_name',$_POST['donors_name']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                           <input type="text"  onkeypress="return blockSpecialChar(event);" id="donors_name" name="donors_name" value="<?=$form_value?>" max="128" class="input1" required>
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>Donor’s Organization (required)
                                                                        <br>
                                                                        <?php $form_value = set_value('donors_organization',$_POST['donors_organization']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-message">
                                                                            <input type="text" id="donors_organization"  onkeypress="return blockSpecialChar(event);" name="donors_organization" value="<?=$form_value?>" class="input1">
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>Street Address
                                                                        <br>
                                                                        <?php $form_value = set_value('street_address',$_POST['street_address']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                           <input type="text" id="street_address" name="street_address" value="<?=$form_value?>" maxlength="255" class="input1" onkeypress="return blockSpecialChar(event);">
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>Address (cont.)
                                                                        <br>
                                                                        <?php $form_value = set_value('address',$_POST['address']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                            <input type="text" id="address" name="address" value="<?=$form_value?>" class="input1"  onkeypress="return blockSpecialChar(event);">
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>City(required)
                                                                        <br>
                                                                        <?php $form_value = set_value('city',$_POST['city']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                            <input type="text" id="city" name="city" value="<?=$form_value?>"  onkeypress="return blockSpecialChar(event);" maxlength="32" class="txtbox1 txtrq" required>
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>State(required)
                                                                        <br>
                                                                        <?php $form_value = set_value('state',$_POST['state']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                            <input type="text" id="state" onkeypress="return blockSpecialChar(event);" name="state" value="<?=$form_value?>" maxlength="32" class="input1" required>
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>Zip Code (required)
                                                                        <br>
                                                                        <?php $form_value = set_value('zip_code',$_POST['zip_code']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                            <input type="text" id="zip_code" onkeypress="return blockSpecialChar(event);" name="zip_code" value="<?=$form_value?>" maxlength="10" class="input1" required>
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>Country (required)
                                                                        <br>
                                                                        <?php $form_value = set_value('country',$_POST['country']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                            <input type="text" id="country" name="country" onkeypress="return blockSpecialChar(event);" value="<?=$form_value?>" class="input1" required>
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>Phone (required)
                                                                        <br>
                                                                        <?php $form_value = set_value('phone',$_POST['phone']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                            <input type="text" id="phone" onkeypress="return blockSpecialChar(event);" name="phone" value="<?=$form_value?>" maxlength="20" class="input1">
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>Mobile
                                                                        <br>
                                                                        <?php $form_value = set_value('mobile',$_POST['mobile']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                            <input type="text" id="mobile" name="mobile" value="<?=$form_value?>" onkeypress="return blockSpecialChar(event);" class="input1" pattern="^\d{7,13}$" required>
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>Fax
                                                                        <br>
                                                                       <?php $form_value = set_value('fax',$_POST['fax']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                            <input type="text" id="fax" name="fax" onkeypress="return blockSpecialChar(event);" value="<?=$form_value?>" class="input1">
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>E-mail
                                                                        <br>
                                                                        <?php $form_value = set_value('email',$_POST['email']); ?>
                                                                         <span class="wpcf7-form-control-wrap your-name">
                                                                        <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?=$form_value?>" onkeypress="return blockSpecialChar(event);" maxlength="100" class="input1" required> 
                                                                    	</span>
                                                                    </p>
                                                                </div>
                                                                <div class="quform-element">
                                                                    <p>Comment
                                                                        <br>
                                                                       <?php $form_value = set_value('comment',$_POST['comment']); ?>
                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                            <textarea id="comment" name="comment" class="input1" onkeypress="return blockSpecialChar(event);"><?=$form_value?></textarea>
                                                                        </span> 
                                                                    </p>
                                                                </div>
                                                                <!-- recapcha -->
                                                                <!-- <div class="g-recaptcha" data-sitekey="6Lf3-AMTAAAAAJJnf2rOruLcF5xH_13c8TJl2ztO"></div> -->
                                                                <!-- end recapcha -->
                                                                <p>
                                                                    <!-- Begin Submit button -->
                                                                    <div class="quform-submit">
                                                                        <div class="quform-submit-inner">
                                                                            <button type="submit" name="" class="submit-button"><span>Send Message</span></button>
                                                                        </div>
                                                                        <div class="quform-loading-wrap"><span class="quform-loading"></span></div>
                                                                    </div>
                                                                </p>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
  
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