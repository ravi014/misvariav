<!-- page heading start-->

<div class="page-heading">
            <h4>
               PHOTO GALLERY
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li > <a href="<?php echo base_url(); ?>index.php/photo_gallery">Photo Gallery</a></li>
               <li class="active"> <?=$segment['mode']?> Photo Gallery</li>
            </ul>
            
        </div>

<?php
	if($segment['mode']=='Add'){
		$btnlable	=	"Insert";
		$img_rq		=	'data-rule-required="true"';
		$er			=	$this->uri->segment(4);
	}
	else{
		$btnlable="Update";
		$img_rq		= 	"";
		$er			=	$this->uri->segment(5);
	}
	
?>
<link rel="stylesheet" type="text/css" href="<?php echo asset_path();?>asset/css/datepicker-custom.css" />
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

<!--body wrapper start-->
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
        <header class="panel-heading"> PHOTO GALLERY
           <?=$segment['mode']?>
        </header>
        <div class="panel-body">
        <?php if($er=='er'){ ?>
			<!--<p id="msg">error: Image size 450*400</p>	-->
	<?php }?>
    
          <div class=" form">
          <form class="cmxform form-horizontal" id="frm-vali" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" enctype="multipart/form-data">

 	<input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
          <input class="form-control"  name="old_name" id="old_name" type="hidden" value="<?=$result[0]['gallery_name']?>" />
  
              <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
              <input type="hidden" name="eid" id="eid" 	 value="<?=$segment['eid']?>" />
                 <div class="form-group ">
                 <label for="cname" class="control-label col-lg-2"><strong>Gallery Name</strong></label>
                 <div class="col-lg-3">
                  <input class="form-control" required  type="text"  name="gallery_name" id="gallery_name"value="<?php echo set_value('gallery_name', ''.$result[0]['gallery_name'].''); ?>" />
               <?php echo form_error('gallery_name', '<p class="error">', '</p>'); ?>

                </div>
                <label for="cname" class="control-label col-lg-2"><strong>Date</strong></label>
                 <div class="col-lg-3">
        <input type="text" class="form-control default-date-picker" name="gallery_dt" id="gallery_dt"value="<?php echo set_value('gallery_dt', ''.$result[0]['gallery_dt'].''); ?>"/>
                        <?php echo form_error('gallery_dt', '<p class="error">', '</p>'); ?>

</div>
               
              </div>
                 <div class="form-group ">
                 <label for="cname" class="control-label col-lg-2"><strong>Gallery Description</strong></label>
                 <div class="col-lg-8">
                  <textarea class="form-control" rows="4"  type="text"  name="gallery_desc" id="gallery_desc" ><?php echo set_value('gallery_desc', ''.$result[0]['gallery_desc'].''); ?></textarea>
               <?php echo form_error('gallery_desc', '<p class="error">', '</p>'); ?>

                </div>
                
                </div>
              <div class="form-group ">
                <label for="cname" class="control-label col-lg-2"><strong> Gallery Cover Image</strong></label>
                <div class="col-lg-3">
 <input class="form-control"  name="gallery_cover_img" id="gallery_cover_img"  onChange="Checkfiles();" value="<?=$result[0]['gallery_cover_img']?>"  type="file"  />
                   <input class="form-control"  name="old_path" type="hidden" value="<?=$result[0]['gallery_cover_img']?>" />
                </div>
               
                    <label for="cname" class="control-label col-lg-2"><strong>All Images</strong></label>
                <div class="col-lg-3">
                <input type="file" multiple name="img[]" class="imgsel form-control " />
                </div>
       
              </div>
              <?php
					if($segment['mode']=='Edit'){
                	
				?>         
                 <div class="form-group ">
                 <?php if($result[0]['gallery_cover_img']!=''){ ?>
                     <label for="cname" class="control-label col-lg-2"><strong>Current Cover Image </strong></label>
                   <div class="col-lg-3"> <img src="<?=main_url()?>upload/img_thum/<?=$result[0]['gallery_cover_img']?>" height="50" /></div>
             
                <?php } 
				else {  ?>
                
                 <label for="cname" class="control-label col-lg-2"><strong>Current Cover Image </strong></label>
             <div class="col-lg-3">   <?php echo "<span ' style='height:10px;color:#a94442;'> <strong>Not available</strong> </span>"; ?></div>
			<?php	 } ?>   
                 
                 <label for="cname" class="control-label col-lg-2"><strong>No. Of Images </strong></label>
 <label for="cname" class="control-label"><?php echo count($result2); ?></label>
           </div>
                 <?php } 
				  ?>
             <br/>
          <div class="form-group" align="center">
             <button type="submit" class="btn btn-primary">
              <?=$btnlable?>
              </button>
              <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>">
              <button class="btn btn-default" type="button">Cancel</button>
              </a> </div>
          </form>
          </div>
        </div>
      </section>
    </div>
    <!-------End col-sm-12------------>
  
 </div>
 
   <?php if($segment['mode']=='Edit'){?>
     <?php 
							if(count($result2)>"0") {
							?>
   <div class="row">
   
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading"> Images List 

         </header>
        
        <div class="panel-body">
     
                     <ul id="img_ul" style="float:left;">	
                			<?php for($i=0;$i<count($result2);$i++){ ?>
                    		<li>
                            	<img src="<?php echo main_url();?>upload/img_thum/<?=$result2[$i]['photopath']?>" style="width:100%;height:100px;" />
                    				<h2><a href="<?php echo base_url();?>index.php/photo_gallery/deleterecord/<?=$result2[$i]['gallery_dt_code']?>" class="btn delrcd" rel="tooltip" title="Delete"><i class="fa fa-times"></i></a></h2>
                        	</li>
                             
                		 <?php } ?>
                         </ul>  
                           
              		</div>
              </section>
     </div>
            </div>
         
    	<?php } ?>
		
        
	<?php			} ?>     
 
   <div style="clear:both;overflow:hidden;"></div>
               			
 </div>

<!--body wrapper end--> 

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

<script>
	$(document).ready(function(e) {
		
		////////////
			$("#frm-vali").validate({
				rules: {
					gallery_name: "required",
					
					
				},
				messages: {
					gallery_name: "Gallery Name is required",
				
		
				}
        	});
		 		///////////
 
    });
</script>
  
<script>
	function Checkfiles()
    {
		
        var fup = document.getElementById('gallery_cover_img');
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
