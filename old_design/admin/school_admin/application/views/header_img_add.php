
<div class="page-heading">
            <h4>
              <!--Header Image-->
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                
                <li>Website Management</li>
                <li class="active"><?php echo $this->uri->segment(3); ?> Header Image </li>
            </ul>
            
        </div>


<?php
	if($this->uri->segment(3)=='Add'){
		$btnlable="Insert";
	}
	else{
		$btnlable="Update";
	}
?>

<!-- page heading end-->
<div class="wrapper">
  
   
  <div class="row">
  
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading"> Header Image
          
        </header>
        <div class="panel-body">
        <?php if($this->uri->segment(4)=='er'){ ?>
		<p id="err">errar: Image size 1400*300</p>	
	<?php }?>
    
           <div class=" form">
            <form action="<?php echo base_url();?>index.php/header_img/insertrecord" method="POST" class='form-horizontal form-validate' id="ff" enctype="multipart/form-data">
                <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
                <input type="hidden" name="mode" id="mode" value="<?=$this->uri->segment(3)?>" />
                <input type="hidden" name="eid" id="eid" 	 value="<?=$this->uri->segment(4)?>" />
         
           <div class="form-group">
           <label for="cname" class="control-label col-lg-2"><strong>Select Image</strong></label>
             <div class="col-lg-3">
                <input type="file" name="img" value="<?=$result[0]['img_path']?>" data-validate="required"  onChange="Checkfiles();" id="img"  />
                <p id="err">Image size 1400*300</p>
                <!--  <!--<p id="err">Image Size 300*300</p>-->
              </div>
           </div>
            
               <div class="form-group" style="margin-left:100px">
              <button type="submit" class="btn btn-primary">
              <?=$btnlable?>
              </button>
         
               <a href="<?php echo base_url();?>index.php/header_img">
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
<script>
	function Checkfiles()
    {
		
        var fup = document.getElementById('img');
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
