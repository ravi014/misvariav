
<div class="kingster-page-wrapper" id="kingster-page-wrapper">
                <div class="gdlr-core-page-builder-body">
                   <!--  <div class="gdlr-core-pbf-wrapper " style="margin: 0px 0px 0px 0px;padding: 180px 150px 0px 0px;">
                        <div class="gdlr-core-pbf-background-wrap">
                            <img src="<?=base_url();?>admin/upload/img/<?=$header_img[0]['img_path']?>" alt="">
                        </div>
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js " data-gdlr-animation="fadeIn" data-gdlr-animation-duration="600ms" data-gdlr-animation-offset="0.8">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
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
                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 25px ;">REGISTRATION</h3></div><span class="gdlr-core-title-item-caption gdlr-core-info-font gdlr-core-skin-caption" style="font-size: 15px ;font-style: normal ;text-transform: uppercase ;">Please fill up below details to register as Alumni.</span></div>
                        </div>
                        <div class="gdlr-core-pbf-element">
                            <div class="gdlr-core-contact-form-7-item gdlr-core-item-pdlr gdlr-core-item-pdb ">
                                <div role="form" class="wpcf7" id="wpcf7-f1979-p1964-o1" lang="en-US" dir="ltr">
                                    <div class="screen-reader-response"></div>
                                    <?php echo validation_errors(); ?>
                                    <form class="quform" action="<?=base_url()?>index.php/registration/insertReg" method="post" enctype="multipart/form-data" onclick="">

                                        <div class="quform-elements">
                                            <div class="quform-element">
                                                <p>Enrollment Number (required)
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input type="text" id="enrolment_no" name="enrolment_no"  size="40" class="input1" aria-required="true" aria-invalid="false">
                                                    </span> 
                                                </p>
                                            </div>
                                            <div class="quform-element">
                                                <p>Year of Admission (required)
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-email">
                                                        <input type="text" id="admission_year" name="admission_year" size="40" class="input1" aria-required="true" aria-invalid="false">
                                                    </span> 
                                                </p>
                                            </div>
                                            <div class="quform-element">
                                                <p>Month & Year of Program Completion
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input type="text" id="program_complete" name="program_complete" size="40" class="input1" aria-required="true" aria-invalid="false">
                                                    </span> 
                                                </p>
                                            </div>
                                            <div class="quform-element">
                                                <p>Name (required)
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input type="text" id="name" name="name"  size="40" class="input1" aria-required="true" aria-invalid="false" required>
                                                    </span> 
                                                </p>
                                            </div>
                                            <div class="quform-element">
                                                <p>Address (required)
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-message">
                                                        <textarea class="input1" id="address" name="address" rows="5"  aria-invalid="false" required></textarea>
                                                    </span> 
                                                </p>
                                            </div>
                                            <div class="quform-element">
                                                <p>City (required)
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input type="text" id="city" name="city"  size="40" class="input1" aria-required="true" aria-invalid="false" required>
                                                    </span> 
                                                </p>
                                            </div>
                                            <div class="quform-element">
                                                <p>Pin code (required)
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input type="text" id="pin_code" name="pin_code" size="40" class="input1" aria-required="true"  aria-invalid="false">
                                                    </span> 
                                                </p>
                                            </div>
                                            <div class="quform-element">
                                                <p>E mail ID (required)
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input type="text" id="email" name="email" size="40" class="input1" aria-required="true" aria-invalid="false">
                                                    </span> 
                                                </p>
                                            </div>
                                            <div class="quform-element">
                                                <p>Current Organization/University (required)
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input type="text" id="current_university" name="current_university" size="40" class="input1" aria-required="true" aria-invalid="false">
                                                    </span> 
                                                </p>
                                            </div>
                                            <div class="quform-element">
                                                <p>Current Position (required)
                                                    <br>
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input type="text" id="current_position" name="current_position" size="40" class="input1" aria-required="true" aria-invalid="false">
                                                    </span> 
                                                </p>
                                            </div>
                                            <div class="g-recaptcha" data-sitekey="6Lf3-AMTAAAAAJJnf2rOruLcF5xH_13c8TJl2ztO"></div>
                                            <p>
                                                <!-- Begin Submit button -->
                                                <div class="quform-submit">
                                                    <div class="quform-submit-inner">
                                                        <button type="submit" class="submit-button"><span>Register</span></button>
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
<style type="text/css">
@media only screen and (max-width: 1000px) and (min-width: 768px)
{
.gdlr-core-pbf-wrapper { padding: 10px 0px 0px 0px !important;}
}
@media only screen and (max-width: 765px) and (min-width: 425px)
{
.gdlr-core-pbf-wrapper {padding: 10px 0px 0px 0px !important;}
}
@media only screen and (max-width: 424px) and (min-width: 375px)
{
    .gdlr-core-pbf-wrapper {
    padding: 10px 0px 0px 0px !important;}
}
</style>