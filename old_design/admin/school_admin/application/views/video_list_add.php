
<div class="page-heading">
            <h4>
              VIDEO GALLERY
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li > <a href="<?php echo base_url(); ?>index.php/video_list">Video Gallery</a></li>
               <li class="active"><?=$segment['mode']?> Video Gallery </li>
            </ul>
            
        </div>

<?php
if($segment['mode']=='Add'){
		$btnlable	=	"Insert";
		
	}
	else{
		$btnlable="Update";
		
		
	}
?><link rel="stylesheet" type="text/css" href="<?php echo asset_path();?>asset/css/datepicker-custom.css" />
<script type="text/javascript" src="<?php echo asset_path();?>asset/js/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function(e) {
         $('.default-date-picker').datepicker({
       		 format: 'dd-mm-yyyy',
			  autoclose: true
    	 });
    });
</script>

<!-- page heading end-->
<div class="wrapper">
  <?php if($this->session->flashdata('show_msg')!=''){?>
  <div class="alert alert-danger fade in">
    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
    <?=$this->session->flashdata('show_msg');?>
  </div>
  <?php } ?>
   
  <div class="row">
  
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading"> VIDEO GALLERY
          <?=$segment['mode']?>
        </header>
        <div class="panel-body">
       
           <div class=" form">

          <form action="<?php echo base_url();?>index.php/video_list/insertrecord" method="POST" class='form-horizontal form-validate' id="ff" enctype="multipart/form-data">
          <input class="form-control"  name="old_name" id="old_name" type="hidden" value="<?=$result[0]['video_title']?>" />
    
    	<input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
        <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
              <input type="hidden" name="eid" id="eid" 	 value="<?=$segment['eid']?>" />
             <div class="form-group">
             <label for="cname" class="control-label col-lg-2"><strong>Video Gallery Title</strong></label>
              <div class="col-lg-3">
                <input type="text" name="video_title" required id="video_title" value="<?php echo set_value('video_title', ''.$result[0]['video_title'].''); ?>" class="form-control">
                          <?php echo form_error('video_title', '<p class="error">', '</p>'); ?>

              </div>
            </div>
                <div class="form-group">
             <label for="cname" class="control-label col-lg-2"><strong>Cover Image</strong></label>
              <div class="col-lg-3">
                <input type="file"  name="img" class="imgsel" />
               <input class="form-control"  name="old_path" type="hidden" value="<?=$result[0]['cover_img']?>" />
               <!--<p id="err">Image Size 300*300</p>-->
              </div>
            </div>
             <?php
					if($segment['mode']=='Edit'){
                    	
				?>         
                 <div class="form-group ">
                 <?php if($result[0]['cover_img']!=''){ ?>
                     <label for="cname" class="control-label col-lg-2"><strong>Current Cover Image </strong></label>
                   <div class="col-md-3"> <img src="<?=main_url()?>upload/img_thum/<?=$result[0]['cover_img']?>" height="50" /></div>
               <?php } 
				else {  ?>
                
                 <label for="cname" class="control-label col-lg-2"><strong>Current Cover Image </strong></label>
                <div class="col-lg-3">      <?php echo "<span style='height:10px;color:#a94442;'> <strong>Not available</strong> </span>";?> </div> 
			<?php	 } ?>   
                 
              
               </div>
                 <?php } 
				  ?>
           
           <br/>
            <div class="form-group" style="margin-left:100px">
              <button type="submit" class="btn btn-primary">
              <?=$btnlable?>
              </button>
              <a href="<?php echo base_url();?>index.php/video_list">
              <button type="button" class="btn btn-danger">Cancel</button>
              </a> </div>
          </form>
        </div>
      </div>
      <!-------------box box-color box-bordered------------------> 
 
  </section>
 </div>
    </div>
  </div>

<!--------Close container-fluid---------->
<script>
	$(document).ready(function(e) {
		
		////////////
			$("#ff").validate({
				rules: {
					video_title: "required",
					
					
				},
				messages: {
					video_title: "Video Gallery Name is required",
				
		
				}
        	});
		 		///////////
 
    });
</script>
  
<style>

#img_ul{
	margin:0px;
	padding:0px;
	list-style:none;
}
#img_ul li{
	width:165px;
	float:left;
	margin-left:8px;
}
#err{
	color:#F00;
}
#msg{
	color:#F00;
	font-size:16px;
}
.error{
	font-weight:bold;
	color:#F00;
}
</style>

