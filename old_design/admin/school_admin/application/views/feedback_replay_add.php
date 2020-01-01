<?php
	if($this->uri->segment(3)=='Add'){
		$btnlable="Insert";
	}
	else{
		$btnlable="Replay";
	}
?>
<form role="form" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" id="form1" method="post" class="form-horizontal form-groups-bordered validate">
        <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />

<input type="hidden" name="eid" id="eid" 	 value="<?=$segment['eid']?>" />
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
        <header class="panel-heading"> FEEDBACK REPLY
         
        </header>
        <div class="panel-body">
      
   
          <div class=" form">
              <!-------------->
            <div class="form-group">
            <label class="col-sm-3 control-label">Feedback Replay<samp class="req">*</samp></label>
            <div class="col-sm-7">
               <textarea id="feedback_replay" name="feedback_replay" class="form-control txt-area cls_cap" placeholder="Enter Your Text" data-validate="required" data-message-required="Enter Your Text"><?php echo set_value('feedback_replay', ''.$result[0]['feedback_replay'].''); ?></textarea>
                        <?php echo form_error('feedback_replay', '<p class="error">', '</p>'); ?>
   </div>
          </div>
          
            
          
            <div class="form-group">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-7">
              <button type="submit" class="btn btn-success"><?=$btnlable?></button>
              <a href="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/view" class="btn btn-danger">Reset</a> </div>
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
	.req{
		color:#F00;
	}
</style>
