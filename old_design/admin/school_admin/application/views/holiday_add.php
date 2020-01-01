<!-- page heading start-->

<div class="page-heading">
            <h4>
                HOLIDAY LIST 
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li > <a href="<?php echo base_url(); ?>index.php/holiday">Holiday List</a></li>
               <li class="active"><?=$segment['mode']?> Holiday</li>
            </ul>
            
        </div>

<link rel="stylesheet" type="text/css" href="<?php echo asset_path();?>asset/css/datepicker-custom.css" />
<script type="text/javascript" src="<?php echo asset_path();?>asset/js/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function(e) {
         $('.default-date-picker').datepicker({
       		 format: 'dd-mm-yyyy',
			  autoclose: true
    	 });
 
		$(document).on('change','#type', function (e) {
			var value=$(this).val();
			if(value=='single'){
				$('.singledate').show(500);
				$('.multidate').hide(500);
			}
			else{
				$('.singledate').hide(500);
				$('.multidate').show(500);
			}
     	 });
		 	
	});		
</script>
<?php
	if($segment['mode']=='Add'){
		$btnlable = "Insert";
		$start_date  = date('d-m-Y');
		$end_date 	 = date('d-m-Y', strtotime("+3 days"));
		$multidate_css='style="display:none"';
		$singledate_css="";
	}
	else{
		$btnlable="Update";
		$start_date = $result[0]['start_date'];
		$end_date = $result[0]['end_date']; 	
		if($result[0]['type']=='multi'){
			$singledate_css='style="display:none"';
		}
		else{
			$multidate_css='style="display:none"';
		}
	}
?>

<style>
.req {color: #F00; padding-left: 2px;}
</style>
<form role="form" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" id="form1" method="post" class="form-horizontal form-groups-bordered validate">
    
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
        <header class="panel-heading"> HOLIDAY
          <?=$segment['mode']?>
        </header>
        <div class="panel-body">
      
          <div class=" form">
           
            	<input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
              <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
              <input type="hidden" name="eid" id="eid" 	 value="<?=$segment['eid']?>" />
        
         
         <div class="form-group">
           <label class="col-sm-3 control-label">Type</label>
           <div class="col-sm-5">
			<?php
                if($result[0]['type']=='multi'){
                    $sel_multi='selected="selected"';
                }else{
                    $sel_single='selected="selected"';
                }
            ?>
             <select id="type" name="type" class="form-control">
                <option <?=$sel_single?>  value="single">Single Day</option>
                <option <?=$sel_multi?> value="multi">Multi Day</option>
            </select>
         </div>
       </div>
        
       <div class="form-group singledate" <?=$singledate_css?>>
          <label class="col-sm-3 control-label">Date<samp class="req">*</samp></label>
          <div class="col-sm-5">
            <input type="text" name="start_date" id="start_date" value="<?php echo set_value('start_date', ''.$start_date.''); ?>"class="form-control default-date-picker" data-validate="required" data-message-required="Select Date" data-format="dd-mm-yyyy" />
                <?php echo form_error('start_date', '<p class="error">', '</p>'); ?>

          </div>
       </div>
       
         
        <div class="form-group multidate"  <?=$multidate_css?>>
          <label class="col-sm-3 control-label">Select Range<samp class="req">*</samp></label>
          <div class="col-sm-5"> 
          
                <div class="input-group input-large custom-date-range" data-date="13-07-2013" data-date-format="dd-mm-yyyy">
                                            <input type="text" class="form-control dpd1 default-date-picker" name="from" value="<?php echo set_value('from', ''.$start_date .''); ?>">
                                            <span class="input-group-addon">To</span>
                                            <input type="text" class="form-control dpd2 default-date-picker" name="to"  value="<?php echo set_value('to', ''.$end_date .''); ?>">
                                        </div>
                                        <span class="help-block">Select date range</span>
                       <?php echo form_error('from', '<p class="error">', '</p>'); ?>
           <?php echo form_error('to', '<p class="error">', '</p>'); ?>

          </div>
        </div>
    
        <div class="form-group">
          <label class="col-sm-3 control-label">Title<samp class="req">*</samp></label>
          <div class="col-sm-5">
            <input type="text" name="title" required id="title"value="<?php echo set_value('title', ''.$result[0]['title'].''); ?>"  class="form-control" data-validate="required" data-message-required="Enter Title" placeholder="Title" />
                 <?php echo form_error('title', '<p class="error">', '</p>'); ?>

          </div>
        </div>
    
        <div class="form-group">
          <label class="col-sm-3 control-label">Description</label>
          <div class="col-sm-5">
            <textarea name="description" id="description" class="form-control"  placeholder="Holiday Description"><?php echo set_value('description', ''.$result[0]['description'].''); ?></textarea>
          </div>
        </div>
    
   		 <div class="form-group" align="center">
          <div class="col-sm-8">
            <button type="submit" class="btn btn-primary">
            <?=$btnlable?>
            </button>
            <a href="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>" class="btn btn-danger">Reset</a> </div>
        </div>
          
          
         </div>
        </div>
      </section>
    </div>
    <!-------End col-sm-12------------>
  
  </div>

   
 </div>
  </form>
 


<style>
	textarea{
		resize:none;
	}
	.error{
	font-weight:bold;
	color:#F00;
}
</style>