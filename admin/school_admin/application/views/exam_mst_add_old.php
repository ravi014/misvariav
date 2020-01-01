

<!-- page heading start-->
<div class="page-heading">
            <h4>
               EXAM SCHEDULE
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                 <li > <a href="<?php echo base_url(); ?>index.php/exam_mst/view">Exam Schedule</a></li>
               <li class="active"><?=$segment['mode']?> Exam</li>
            </ul>
            
        </div>
		<?php
	if($segment['mode']=='Add'){
		$btnlable="Insert";
		$standard_name = $standard[0]['standard_name'];
		$exam_name     = $exam_type[0]['exam_title'];
	}
	else{
		$standard_name = $result[0]['standard_name'];
		$exam_date = $result[0]['date_dt'];
		$btnlable="Update";
	}
?>
 <script src="<?php echo asset_path();?>asset/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo asset_path();?>asset/js/bootstrap-timepicker/css/timepicker.css">

<link rel="stylesheet" type="text/css" href="<?php echo asset_path();?>asset/css/datepicker-custom.css" />
<script type="text/javascript" src="<?php echo asset_path();?>asset/js/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function(e) {
         $('.default-date-picker').datepicker({
       		 format: 'dd-mm-yyyy',
			  autoclose: true
    	 });
		 
		 		$('.timepicker-default').timepicker({
				    minuteStep: 5,
 				   showInputs: false,
  				 disableFocus: true,
  			
					});
					
					
       
				
    });
</script>


<!-- page heading end-->

<!--body wrapper start-->
 <form class="cmxform form-horizontal" id="frm1" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" enctype="multipart/form-data">

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
        <header class="panel-heading"> EXAM SCHEDULE
          <?=$segment['mode']?>
        </header>
        <div class="panel-body">
      
   
          <div class=" form">
                 
            	<input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
              <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
              <input type="hidden" name="eid" id="eid" 	 value="<?=$segment['eid']?>" />
  	  	
 <?php if($segment['mode']=='Add') { ?>
 <input type="hidden" name="standard_code" id="standard_code" 	 value="<?=$this->uri->segment(4)?>" />
 
      <div class="form-group">
      <label class="col-sm-3 control-label">Standard Name</label>
      <div class="col-sm-3">
        	<input type="text" name="standard_name" id="standard_name" data-validate="required" value="<?php echo set_value('standard_name', ''.$standard_name.'');?>" class="form-control ddl_list" readonly />
                  <?php echo form_error('standard_name', '<p class="error">', '</p>'); ?>

      </div>
    </div>
    
      <div class="form-group">
      <label class="col-sm-3 control-label">Exam Name</label>
      <div class="col-sm-5">
        <select id="exam_type_code" name="exam_type_code" required data-validate="required" class="form-control ddl_list">
                    	<option value="">---Select---</option>
                        <?php for($i=0;$i<count($exam_type);$i++){ 
							$sel='';
							if($result[0]['exam_type_code']==$exam_type[$i]['exam_type_code']){
								$sel='selected="selected"';
							}
						?>
							<option <?=$sel?><?php echo set_select('exam_type_code', ''.$exam_type[$i]['exam_type_code'].'') ?> value="<?=$exam_type[$i]['exam_type_code']?>"><?=$exam_type[$i]['exam_title']?></option>	
						<?php }?>
                    </select>
                   <?php echo form_error('exam_type_code', '<p class="error">', '</p>'); ?>

      </div>
    </div>
    <br/>

    <!----************------->
  
    <table class="table table-bordered" id="example2">
    <thead>
      <tr class='thefilter'>
            <th>Subject</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Marks</th>
      </tr>
    </thead>
    <tbody>
       <?php for($i=0;$i<count($subject);$i++){ ?>
    		<tr>
            	<td><div class="form-group">
      					<label class="col-sm-10 control-label"><?=$subject[$i]['subject_name']?></label>
                         <input class="examdate form-control" size="16" type="hidden" value="<?=$subject[$i]['subject_code']?>" required name="subject_code[]">
              	</div>
                </td>
                <td>
                	<div class="form-group">
      					<div class="col-sm-10">
        					<input type="text" name="date_dt[]"  value="<?php echo set_value('date_dt', ''.$result[0]['date_dt'].'');?>" class="form-control default-date-picker" required data-validate="required" data-message-required="Select Exam Date" placeholder="Exam Date" data-format="dd-mm-yyyy"/>
               <?php echo form_error('date_dt[]', '<p class="error">', '</p>'); ?>
      					</div>
    				</div>
                </td>
                <td>
                	<div class="form-group">
      					<div class="col-sm-10">
                 			<input type="text" name="start_time[]"  value="<?php echo set_value('start_time', ''.time().'');?>" class="form-control timepicker-default" required data-validate="required" data-message-required="Enter start time" placeholder="Start time" />
               <?php echo form_error('start_time', '<p class="error">', '</p>'); ?>
                                  
      					</div>
    				</div>
                </td>
                
                <td>
                	<div class="form-group">
      					<div class="col-sm-10">
        					<input type="text" name="end_time[]"   value="<?php echo set_value('end_time', ''.time().'');?>" class="form-control timepicker-default" required data-validate="required" data-message-required="Enter end time" placeholder="End time" />
               <?php echo form_error('end_time', '<p class="error">', '</p>'); ?>
      					</div>
    				</div>
                </td>
                
                <td>
                	<div class="form-group">
      					<div class="col-sm-5">
        					<input type="text" name="min_marks[]"  value="<?php echo set_value('min_marks', ''.$subject[0]['min_marks'].'');?>" class="form-control " required data-validate="required" data-message-required="Enter Min  Marks" placeholder="Enter Min Marks" />
                <?php echo form_error('min_marks', '<p class="error">', '</p>'); ?>
     					</div>
                        <div class="col-sm-5">
        					<input type="text" name="max_marks[]"  value="<?php echo set_value('max_marks', ''.$subject[0]['max_marks'].'');?>" class="form-control" required data-validate="required" data-message-required="Enter Max Marks" placeholder="Enter Max Marks" />
                <?php echo form_error('max_marks', '<p class="error">', '</p>'); ?>
     					</div>
                        
    				</div>
                </td>
            </tr>
             <?php } ?>	
    </tbody>
    
  </table>
   <?php } ?>
   
   
    <?php if($segment['mode']=='Edit') { ?>
    
    <input type="hidden" name="standard_code" id="standard_code" 	 value="<?=$this->uri->segment(5)?>" />
 
    <?php for($i=0;$i<count($result);$i++){ ?>
    
    	<div class="form-group">
          <label class="col-sm-3 control-label">Subject Name<samp class="req"></samp></label>
          <div class="col-sm-5">
          <input type="text" name="subject_code" required  value="<?php echo set_value('subject_code', ''.$result[0]['subject_name'].'');?>" class="form-control requr" data-validate="required"  readonly />
                       <?php echo form_error('subject_code', '<p class="error">', '</p>'); ?>

          </div>
        </div><!----SUBJECT--->
       
       <div class="form-group">
          <label class="col-sm-3 control-label">Exam Date<samp class="req"></samp></label>
          <div class="col-sm-5">
          <input type="text" name="date_dt" required  value="<?php echo set_value('date_dt', ''.$result[0]['date_dt'].'');?>" class="form-control default-date-picker" data-validate="required" data-message-required="Select Exam Date" placeholder="Exam Date" data-format="dd-mm-yyyy"/>
               <?php echo form_error('date_dt', '<p class="error">', '</p>'); ?>
          </div>
        </div><!----DATE--->
        
       <div class="form-group">
          <label class="col-sm-3 control-label">Start Time<samp class="req">*</samp></label>
          <div class="col-sm-5">
           <input type="text" name="start_time" required id="start_time" value="<?php echo set_value('start_time', ''.$result[0]['start_time'].'');?>" data-default-time="<?php echo set_value('start_time', ''.$result[0]['start_time'].'');?>" class="form-control timepicker-default" data-validate="required" data-message-required="Enter Start Time" placeholder="Start Time" />
               <?php echo form_error('start_time', '<p class="error">', '</p>'); ?>
          </div>
        </div><!----START TIME--->
        
       <div class="form-group">
          <label class="col-sm-3 control-label">End Time<samp class="req">*</samp></label>
          <div class="col-sm-5">
           <input type="text" name="end_time" required  value="<?php echo set_value('end_time', ''.$result[0]['end_time'].'');?>" data-default-time="<?php echo set_value('end_time', ''.$result[0]['end_time'].'');?>" class="form-control timepicker-default" data-validate="required" data-message-required="Enter End Time" placeholder="End Time" />
               <?php echo form_error('end_time', '<p class="error">', '</p>'); ?>
          </div>
        </div><!----END TIME--->
        
       <div class="form-group">
          <label class="col-sm-3 control-label">Min Marks<samp class="req">*</samp></label>
          <div class="col-sm-5">
          <input type="text" name="min_marks" required  value="<?php echo set_value('min_marks', ''.$result[0]['min_marks'].''); ?>" class="form-control requr" data-validate="required" data-message-required="Enter Min Marks" placeholder="Enter Subject Marks" />
               <?php echo form_error('min_marks', '<p class="error">', '</p>'); ?>
          </div>
        </div>
        
        
           <div class="form-group">
          <label class="col-sm-3 control-label">Max Marks<samp class="req">*</samp></label>
          <div class="col-sm-5">
          <input type="text" name="max_marks" required  value="<?php echo set_value('max_marks', ''.$result[0]['max_marks'].''); ?>" class="form-control requr" data-validate="required" data-message-required="Enter Max Marks" placeholder="Enter Subject Marks" />
               <?php echo form_error('max_marks', '<p class="error">', '</p>'); ?>
          </div>
        </div>
        
        <!----MARKS--->
    		
            	
    <?php } ?>	
   
   <?php } ?>
   
  
    <!----************------->
    <div class="form-group">
    <div class="col-sm-8" align="center">
      		<button type="submit" class="btn btn-success"><?=$btnlable?></button>
      		<a href="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>" class="btn btn-danger">Reset</a>
      </div>
    </div>
    
     </div>
        </div>
      </section>
    </div>
    <!-------End col-sm-12------------>
  
  </div>
   </div>
	    
  </form>

<script>
	$(document).ready(function(e) {
		
		////////////
			$("#frm1").validate({
				rules: {
					subject_code: "required",
					date_dt: "required",
					start_time: "required",
					end_time: "required",
					min_marks: "required",
					max_marks: "required",
					
					
				},
				messages: {
				
				subject_code: " Subject is required",
					date_dt: "Exam date is required",
					start_time: "Start time is required",
					end_time: "End time is required",
					min_marks: "Min marks is required",
					max_marks: "Max marks is required",
		
				}
        	});
		 		///////////
 
    });
</script>
  
<style>
.ddl_list {
	width: 250px;
	height: 30px;
	font-weight: bold;
	border: #999 solid 1px;
}
.error{
	font-weight:bold;
	color:#F00;
}
</style>