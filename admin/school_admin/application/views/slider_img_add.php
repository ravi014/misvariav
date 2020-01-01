<!-- page heading start-->

<div class="page-heading">
            <h4>
                <!--Slider Image-->
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li > <a href="<?php echo base_url(); ?>index.php/slider_img">Slider Image</a></li>
               <li class="active"> Slider Add</li>
            </ul>
            
        </div>




<!-- page heading end-->

<!--body wrapper start-->
<div class="wrapper">
  <div class="row">
   <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading"> Slider Image
          
        </header>
        <div class="panel-body">
  <form class="cmxform form-horizontal" id="frm-vali" method="post" action="<?php echo base_url();?>index.php/slider_img/insertrecord" enctype="multipart/form-data">
		<input type="hidden" name="page_type" id="page_type" value="slider_img" />
   		<input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
   
 <?php if($this->uri->segment(4)=='er'){ ?>
		<p id="err">errar: Image size 1000*700</p>	
<?php }?>
    
          <div class=" form">
        
            <div class="form-group ">
              
                <label for="cname" class="control-label col-lg-2"><strong>Select Image</strong></label>
                <div class="col-lg-3">
 					<input class="form-control" name="img" id="img" onChange="Checkfiles();" data-validate="required" data-message-required="Select Silder Image (1400 * 550)" placeholder="Slider Image"  type="file"  />
                   <p id="err">errar: Image size 1000*700</p>
               </div>
               
                 
               
                 </div>
             
          <div class="form-group" align="center">
             <button type="submit" class="btn btn-primary">
              	Submit
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
