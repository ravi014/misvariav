<!-- page heading start-->

<div class="page-heading">
            <h4>
                 
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li>Website Management</li>
               <li class="active"> Achievement</li>
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
        <header class="panel-heading"> Announcement <?=$this->uri->segment(3)?>
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
                 <label for="cname" class="control-label col-lg-2"><strong>Name</strong></label>
               
                 <div class="col-lg-4">
                  <input class="form-control" required  name="achievement_name" id="achievement_name" type="text" value="<?=$result[0]['achievement_name']?>"  data-validate="required" data-message-required="Enter Name" placeholder="Name"  />
                  </div>
                
              </div>
               
               <div class="form-group ">
                 <label for="cname" class="control-label col-lg-2"><strong>Date</strong></label>
               
                 <div class="col-lg-4">
                  <input type="text" class="form-control default-date-picker" name="timedt" id="timedt"  value="<?=$new_date?>" placeholder="date" data-validate="required" data-message-required="select date" />
                  </div>
                
               
              </div>
               
               <div class="form-group ">
                 
                <label for="cname" class="control-label col-lg-2"><strong>Image</strong></label>
                 <div class="col-lg-4">
                	<?php if($this->uri->segment(3)=='Edit'){?>
                    <input type="file" name="img_path" id="img_path" value="<?=$result[0]['img_path']?>"/>
                    <?php }elseif($this->uri->segment(3)=='Add'){?> 
                    <input type="file" name="img_path" id="img_path" required/>
					<?php } ?>
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


 

