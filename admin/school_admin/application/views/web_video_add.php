
<div class="page-heading">
            <h4>
              
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                
                <li>Website Management</li>
                
               <li class="active"><?php echo $this->uri->segment(3); ?> Video </li>
            </ul>
            
        </div>

<?php
	if($this->uri->segment(3)=='Add'){
		$btnlable="Insert";
		$er			=	$this->uri->segment(4);
		$img_req='data-validate="required"';
	}
	else{
		$btnlable="Update";
		$new_date = date('d-m-Y', strtotime($result[0]['video_dt']));
		$er			=	$this->uri->segment(5);
		$img_req='';
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
  
  
   
  <div class="row">
  
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading"> VIDEO <?=$this->uri->segment(3)?>
         
        </header>
        <div class="panel-body">
       <?php if($er=='er'){ ?>
			<p id="err">errar: Image size 400*400</p>	
<?php }?>
    
           <div class=" form">
            <form action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" method="POST" class='form-horizontal form-validate' id="ff" enctype="multipart/form-data">
          	<input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
              <input type="hidden" name="mode" id="mode" value="<?=$this->uri->segment(3)?>" />
        	<input type="hidden" name="eid" id="eid"  value="<?=$this->uri->segment(4)?>" />
         
           
            <div class="form-group ">
             <label for="cname" class="control-label col-lg-2"><strong>Video Name</strong></label>
                <div class="col-lg-4"> 
              		
               	<input type="text" name="video_name" id="video_name" value="<?=$result[0]['video_name']?>" class="form-control" data-validate="required" data-message-required="enter video name" placeholder="Video Name" />

              </div>
            </div>
            
            <div class="form-group ">
             <label for="cname" class="control-label col-lg-2"><strong>Description</strong></label>
                <div class="col-lg-4"> 
              		
               	<textarea name="video_desc" id="video_desc" class="form-control txtarea"><?=$result[0]['video_desc']?></textarea>

              </div>
            </div>
            
            
            
           <div class="form-group">
           <label for="cname" class="control-label col-lg-2"><strong>Select Cover Image</strong></label>
             <div class="col-lg-3">
               
                <input type="file" name="cover_img" id="cover_img" <?=$img_req?> />
               <p id="err">Image Size 400*400</p>
                <!--  <!--<p id="err">Image Size 300*300</p>-->
              </div>
           
              <?php
					if($this->uri->segment(3)=='Edit'){
               if($result[0]['cover_img']!=''){ ?>
                     <label for="cname" class="control-label col-lg-2"><strong>Current Cover Image </strong></label>
                   <div class="col-md-4"> <img src="<?=main_url()?>upload/img_thum/<?=$result[0]['cover_img']?>" height="50" /></div>
               <?php } 
				else {  ?>
                
                 <label for="cname" class="control-label col-lg-2"><strong>Current Cover Image </strong></label>
                <div class="col-lg-4">      <?php echo "<span style='height:10px;color:#a94442;'> <strong>Not available</strong> </span>";?> </div> 
			<?php	 } ?>   
                 
              
               
                 <?php } 
				  ?>
                  </div>
            <div class="form-group">
             <label for="cname" class="control-label col-lg-2"><strong>Date</strong></label>
             <div class="col-lg-4">
       <input type="text" class="default-date-picker form-control " name="timedt" id="timedt" value="<?=$new_date?>" />
               

</div>
              </div>
          
            
            <div class="form-group">
              <label for="cname" class="control-label col-lg-2"><strong>Video Url</strong></label>
             <div class="col-lg-4">
               <input type="text"  name="video_url" id="video_url" value="<?=$result[0]['video_url']?>"  class="form-control" data-validate="required" data-message-required="enter video url" placeholder="//www.youtube.com/embed/xyz"/>
              
              </div>
            </div>
               <div class="form-group" style="margin-left:100px">
              <button type="submit" class="btn btn-primary">
              <?=$btnlable?>
              </button>
         
               <a href="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>">
              <button type="button" class="btn btn-danger">Cancel</button>
              </a> 
              
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
