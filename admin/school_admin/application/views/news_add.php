<!-- page heading start-->

<div class="page-heading">
            <h4>
                NEWS 
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li > <a href="<?php echo base_url(); ?>index.php/news">News</a></li>
               <li class="active"><?=$segment['mode']?> News</li>
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
  <div class="row">
   <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading"> NEWS
          <?=$segment['mode']?>
        </header>
        <div class="panel-body">
  <form class="cmxform form-horizontal" id="frm-vali" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" enctype="multipart/form-data">

   <?php if($this->session->flashdata('show_msg')!=''){?>
  <div class="alert alert-danger fade in">
    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
    <?=$this->session->flashdata('show_msg');?>
  </div>
  <?php } ?>
   
        <?php if($er=='er'){ ?>
			<!--<p id="msg">error: Image size 450*400</p>	-->
	<?php }?>
    
          <div class=" form">
        <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
         <input class="form-control"  name="old_name" id="old_name" type="hidden" value="<?=$result[0]['news_title']?>" />

              <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
              <input type="hidden" name="eid" id="eid" 	 value="<?=$segment['eid']?>" />
                 <div class="form-group ">
               
                <label for="cname" class="control-label col-lg-2"><strong>Date</strong></label>
                 <div class="col-lg-3">
        <input type="text" class="form-control default-date-picker" name="news_dt" id="news_dt" value="<?php echo set_value('news_dt', ''.$result[0]['news_dt'].''); ?>" />
         <?php echo form_error('news_dt', '<p class="error">', '</p>'); ?>

</div>

  <label for="cname" class="control-label col-lg-2"><strong>Title</strong></label>
                 <div class="col-lg-3">
                  <input class="form-control" required  name="news_title" id="news_title" type="text"value="<?php echo set_value('news_title', ''.$result[0]['news_title'].''); ?>" />
                              <?php echo form_error('news_title', '<p class="error">', '</p>'); ?>

                </div>
               
              </div>
              <div class="form-group ">
              
                <label for="cname" class="control-label col-lg-2"><strong>Cover Image</strong></label>
                <div class="col-lg-3">
 <input class="form-control" name="cover_img" id="cover_img" onChange="Checkfiles();" value="<?=$result[0]['cover_img']?>"  type="file"  />
                   <input class="form-control"  name="old_path" type="hidden" value="<?=$result[0]['cover_img']?>" />
               </div>
               <label for="cname" class="control-label col-lg-2"><strong>Description</strong></label>
                 <div class="col-lg-3">
                  <textarea class="form-control"  name="news_desc" id="news_desc" type="text"><?php echo set_value('news_desc', ''.$result[0]['news_desc'].''); ?></textarea>
                        <?php echo form_error('news_desc', '<p class="error">', '</p>'); ?>

               </div>
               
                 </div>
              <?php
					if($this->uri->segment(3)=='Edit'){
                ?>         
                 <div class="form-group ">
                 <?php if($result[0]['cover_img']!=''){ ?>
                     <label for="cname" class="control-label col-lg-2"><strong>Current Cover Image </strong></label>
                   <div class="col-md-3"> <img src="<?=main_url()?>upload/img_thum/<?=$result[0]['cover_img']?>" height="50" /></div>
             
                <?php } 
				else {  ?>
                 <label for="cname" class="control-label col-lg-2"><strong>Current Cover Image </strong></label>
             <div class="col-lg-3">      <?php echo "<span style='height:10px;color:#a94442;'> <strong>Not available</strong> </span>"; ?></div> 
			<?php	 } ?>   
                 
                </div>
                	<?php	 } ?>   
             <br/>
          <div class="form-group" align="center">
             <button type="submit" class="btn btn-primary">
              <?=$btnlable?>
              </button>
              <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>">
              <button class="btn btn-default" type="button">Cancel</button>
              </a> </div>
         
          </div>
          </form>
        </div>
      </section>
</div>
</div>
</div>
    <!-------End col-sm-12------------>
   
 
<!--body wrapper end--> 

<style>
.error{
	font-weight:bold;
	color:#F00;
}
#err{
	color:#F00;
}
#msg{
	color:#F00;
	font-size:16px;
}
</style>

<script>
	$(document).ready(function(e) {
		
		////////////
			$("#frm-vali").validate({
				rules: {
					news_title: "required",
					
					
				},
				messages: {
					news_title: "News title is required",
				
		
				}
        	});
		 		///////////
 
    });
</script> 
  
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
