<script src="<?php echo asset_path();?>ckeditor/ckeditor.js"></script>

<script type="text/javascript" charset="utf-8">//
	$(document).ready(function() {
	
		<!---------This Method is use for change status-------------->
		$(".sel").select2({
			minimumResultsForSearch: -1
	 });
		<!---------This Method is use for change status-------------->
		$(document).on('click', '.delrcd', function (e) {
			e.preventDefault();
			var td = $(this).parent();
        	var tr = td.parent();
        		//change the background color to red before removing
        	tr.css("background-color","#FF3700");
        	tr.fadeOut(400, function(){
            	tr.remove();
        	});
			
			var url = $(this).attr('value');
			
			$.ajax({url:url,success:function(result){
						 	
            }});
				
		});
		
	});		
</script>
<!-- page heading start-->

<div class="page-heading">
            <h4>
                 
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li>Website Management</li>
               <li class="active"> CMS Page</li>
            </ul>
            
        </div>

<?php
	if($this->uri->segment(3)=='Add'){
		$btnlable="Insert";
	}
	else{
		$btnlable="Update";
		$new_date = date('m/d/Y', strtotime($result[0]['date']));
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
 <form class="cmxform form-horizontal" id="frm1" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" enctype="multipart/form-data">

<div class="wrapper">
  <div class="row">
 
  
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading"> CMS Page <?=$this->uri->segment(3)?>
        </header>
        <div class="panel-body">
        <?php if($er=='er'){ ?>
			<!--<p id="msg">error: Image size 450*400</p>	-->
	<?php }?>
   
          <div class="form">
                 
                <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
                <input type="hidden" name="mode" id="mode" value="<?=$this->uri->segment(3)?>" />
        		<input type="hidden" name="eid" id="eid" 	 value="<?=$this->uri->segment(4)?>" />
                
               <div class="form-group ">
                 <label for="cname" class="control-label col-lg-2"><strong>Select Page Type</strong></label>
               
                 <div class="col-lg-4">
                  
                  <input type="text" name="page_title" id="page_title" value="<?=$result[0]['page_name']?>" class="form-control" data-validate="required" data-message-required="Enter Contain" placeholder="Title"  readonly/>
                  </div>
                
              </div>
               
               
               
               <div class="form-group ">
                 
                <label for="cname" class="control-label col-lg-2"><strong>Description</strong></label>
                 <div class="col-lg-8">
                	<textarea id="discrpt" name="contain" class="form-control txtarea" data-validate="required" data-message-required="Enter Description" placeholder="Description" style="height:150px;"><?=$result[0]['contain']?></textarea>
					  <script>
                        CKEDITOR.replace( 'contain' );
                     </script>
                </div>
               
              </div>
              
             
          <div class="form-group" align="center">
             <button type="submit" class="btn btn-primary">
              <?=$btnlable?>
              </button>
              <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>">
              <button class="btn btn-default" type="button">Cancel</button>
              </a> </div>
         
          </div>
        </div>
      </section>
    </div>
    <!-------End col-sm-12------------>
  
  </div>

  
 </div>
  </form>
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

#msg{
	color:#F00;
	font-size:16px;
}
	
.error{
	font-weight:bold;
	color:#F00;
}
</style>


 

