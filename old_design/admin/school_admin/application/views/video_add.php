
<div class="page-heading">
            <h4>
              VIDEO GALLERY
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                
                <li > Video Gallery</li>
                
                <?php if($segment['mode']=='Edit'){ ?>
                <li ><a href="<?php echo base_url();?>index.php/video/view/<?php echo $result[0]['video_id'] ?>">View video </a></li>
              
              <?php } ?>
               <li class="active"><?php echo $segment['mode']; ?> Video </li>
            </ul>
            
        </div>

<?php
if($segment['mode']=='Add'){
		$btnlable	=	"Insert";
		$er			=	$this->uri->segment(4);
	}
	else{
		$btnlable="Update";
		$er			=	$this->uri->segment(5);
	}
?>
<script>
	$(document).ready(function(e) {
         $('.default-date-picker').datepicker({
       		 format: "dd-mm-yyyy",
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
        <?php if($er=='er'){ ?>
			<!--<!--<p id="msg">error: Image size 450*400</p>	-->
	<?php }?>
    
           <div class=" form">
            <form action="<?php echo base_url();?>index.php/video/insertrecord" method="POST" class='form-horizontal form-validate' id="ff" enctype="multipart/form-data">
          	<input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
              <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
              <input type="hidden" name="eid" id="eid" 	 value="<?=$segment['eid']?>" />
         <input type="hidden" name="video_id" id="video_id" 	 value="<?= $result[0]['video_id']?>" />
          <input class="form-control"  name="old_name" id="old_name" type="hidden" value="<?=$result[0]['video_name']?>" />
            
           
             <div class="form-group ">
             <label for="cname" class="control-label col-lg-2"><strong>Video Gallery</strong></label>
                <div class="col-lg-3"> 
              		<select class="form-control"  id="video_id" name="video_id" required data-rule-required="true">
                    	<option value="" disabled>--Select--</option>
                        <?php
                        	for($i=0;$i<count($video);$i++){
								$sel="";
								if($video[$i]['video_id']==$result[0]['video_id']){
									$sel='selected="selected"';	
								} ?>
								<option <?=$sel?>   value="<?php echo $video[$i]['video_id']?>" <?php echo set_select('video_id', ''.$video[$i]['video_id'].'') ?>><?php echo $video[$i]['video_title']?></option>	
							<?php }
						?>
                    </select>
               <?php echo form_error('video_id', '<p class="error">', '</p>'); ?>

              </div>
            </div>
            <div class="form-group">
              <label for="cname" class="control-label col-lg-2"><strong>video Name</strong></label>
               <div class="col-lg-3"> 
                <input type="text" name="video_name" id="video_name" required value="<?php echo set_value('video_name', ''.$result[0]['video_name'].''); ?>" class="form-control" data-rule-required="true">
             <?php echo form_error('video_name', '<p class="error">', '</p>'); ?>
              </div>
            </div>
            <div class="form-group">
             <label for="cname" class="control-label col-lg-2"><strong>Description</strong></label>
                <div class="col-lg-3"> 
                <textarea name="video_desc" id="video_desc" rows="4" class="form-control"><?php echo set_value('video_desc', ''.$result[0]['video_desc'].''); ?></textarea>
                            <?php echo form_error('video_desc', '<p class="error">', '</p>'); ?>

              </div>
            </div>
            
           <div class="form-group">
           <label for="cname" class="control-label col-lg-2"><strong>Select Cover Image</strong></label>
             <div class="col-lg-3">
                <input type="file" name="cover_img" value="<?=$result[0]['cover_img']?>"  onChange="Checkfiles();" id="cover_img"  />
                <input class="form-control"  name="old_path" type="hidden" value="<?=$result[0]['cover_img']?>" />
                <!--  <!--<p id="err">Image Size 300*300</p>-->
              </div>
           
              <?php
					if($segment['mode']=='Edit'){
               if($result[0]['cover_img']!=''){ ?>
                     <label for="cname" class="control-label col-lg-2"><strong>Current Cover Image </strong></label>
                   <div class="col-md-3"> <img src="<?=main_url()?>upload/img_thum/<?=$result[0]['cover_img']?>" height="50" /></div>
               <?php } 
				else {  ?>
                
                 <label for="cname" class="control-label col-lg-2"><strong>Current Cover Image </strong></label>
                <div class="col-lg-3">      <?php echo "<span style='height:10px;color:#a94442;'> <strong>Not available</strong> </span>";?> </div> 
			<?php	 } ?>   
                 
              
               
                 <?php } 
				  ?>
                  </div>
            <div class="form-group">
             <label for="cname" class="control-label col-lg-2"><strong>Date</strong></label>
             <div class="col-lg-3">
       <input type="text" class="default-date-picker form-control " name="video_dt" id="video_dt" value="<?php echo set_value('video_dt', ''.$result[0]['video_dt'].''); ?>" />
               <?php echo form_error('video_dt', '<p class="error">', '</p>'); ?>

</div>
              </div>
          
            
            <div class="form-group">
              <label for="cname" class="control-label col-lg-2"><strong>Video Url</strong></label>
             <div class="col-lg-3">
               <input type="url"  name="video_url" id="video_url" required  class="form-control" data-rule-required="true" value="<?php echo set_value('video_url', ''.$result[0]['video_url'].''); ?>"/>
              <?php echo form_error('video_url', '<p class="error">', '</p>'); ?>
              </div>
            </div>
               <div class="form-group" style="margin-left:100px">
              <button type="submit" class="btn btn-primary">
              <?=$btnlable?>
              </button>
         <?php   if($segment['mode']=='Edit'){ ?>
              <a href="<?php echo base_url();?>index.php/video/view/<?php echo $result[0]['video_id'] ?>">
              <button type="button" class="btn btn-danger">Cancel</button>
              </a> 
              <?php } else{ ?>
               <a href="<?php echo base_url();?>index.php/video_list">
              <button type="button" class="btn btn-danger">Cancel</button>
              </a> 
              <?php } ?>
              </div>
          </form>
        </div>
      </div>
      </section>
      </div>
      <!-------------box box-color box-bordered------------------> 
    </div>
  </div>

<!--------Close container-fluid---------->


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

<!--<script>
	$(document).ready(function(e) {
		
		////////////
			$("#ff").validate({
				rules: {
					video_name: "required",
					video_id: "required",
					video_url: "required",
					
					
				},
				messages: {
					video_name: "Video Name is required",
				video_id: "Video Id is required",
					video_url: "Video Url is required",
		
				}
        	});
		 		///////////
 
    });
</script>
  -->
<script>
	function Checkfiles()
    {
		
        var fup = document.getElementById('cover_img');
        var fileName = fup.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		var ext = ext.toLowerCase();
    	if(ext =="jpeg" ||  ext=="png"  || ext=="jpg")
    	{
        	return true;
   		}
    	else
    	{
        	alert("Upload jpeg,png,jpg Images only");
			fup.value="";
        	return false;
    	}
    }
</script>
