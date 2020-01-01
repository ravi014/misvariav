<!-- page heading start-->

<div class="page-heading">
            <h4>
                USER TYPE 
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a>
                </li>
                <li class="active"> User Type</li>
            <?php  	if($this->uri->segment(3)=='Edit'){ ?>
                 <li class="active"><?=$segment['mode']?> User Type</li>
                 <?php } ?>
            </ul>
            
        </div>
<?php
	if($this->uri->segment(3)=='Edit'){
	$btnlable="Update";
		
	}
	else{
		
		$btnlable	=	"Insert";
		
	}
	
?>
<script type="text/javascript" charset="utf-8">//
	$(document).ready(function() {
		list_data();		
		<!---------This Method is use for change status-------------->
		$(document).on('click', '.delrcd', function (e) {
			e.preventDefault();
			var con=confirm('Are Your Sure You Want To Delete');
			if(!con){
				return false;
			}
			var url = $(this).attr('href');
			$.ajax({url:url,success:function(result){
				list_data();	 	
            }});
		});
		<!---------This Method is use for change status-------------->
		$(document).on('click', '.statuschange', function (e) {
			e.preventDefault();
			var url = $(this).attr('href');
			$.ajax({url:url,success:function(result){
				list_data();	 	
            }});	
		});
		
	});		
	
	
	function list_data(){
		
		var oTable = $('#data-table').dataTable();
  		oTable.fnDestroy();
		
		var url = '<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/listing';
		$.ajax({url:url,success:function(result){
				
			$('#data-table').dataTable().fnClearTable();
				$('#data-table tbody').html(result);
				$('#data-table').dataTable( {
        			"bProcessing": true,
					"iDisplayLength": 25,
					"responsive": true,
					"bDestroy": true
    			});		 	
            }});
       
	}//**Listing**//
	
</script>
	
<link rel="stylesheet" type="text/css" href="<?php echo asset_path();?>asset/css/datepicker-custom.css" />
<script type="text/javascript" src="<?php echo asset_path();?>asset/js/bootstrap-datepicker.js"></script>
<!-- page heading end--> 


  <?php if($this->session->flashdata('show_msg')!=''){?>
  <div class="alert alert-success fade in">
    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
    <?=$this->session->flashdata('show_msg');?>
  </div>
  <?php } ?>
<!--body wrapper start-->
<div class="wrapper">
  <div class="row">

  
    <div class="col-sm-5">
     
      <section class="panel">
     
        <header class="panel-heading"> USER TYPE 
           <?=$segment['mode']?>
        </header>
        <div class="panel-body">
      
          <div class=" form">
           <form class="cmxform form-horizontal" id="frm" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord">
          <input class="form-control"  name="old_name" id="old_name" type="hidden" value="<?=$result[0]['name']?>" />

           <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
              <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
              <input type="hidden" name="eid" id="eid" 	 value="<?=$segment['eid']?>" />
               <div class="form-group ">
                 <label for="cname" class="control-label col-lg-2"><strong>Name</strong></label>
                 <div class="col-lg-8">
                  <input class="form-control"  name="name" required id="name" type="text"  value="<?php echo set_value('name', ''.$result[0]['name'].''); ?>"/>
                 <?php echo form_error('name', '<p class="error">', '</p>'); ?>
                </div>
             </div>
              
             <br/>
          <div class="form-group" align="center">
             <button type="submit" class="btn btn-primary">
              <?=$btnlable?>
              </button>
              <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>/addnew/Add">
              <button class="btn btn-default" type="button">Cancel</button>
              </a> </div>
          </form>
    
          </div>
        </div>
      </section>
   
    <!-------End col-sm-12------------>
  
    </div>
    <div class="col-sm-7">
  
      <section class="panel">
        <header class="panel-heading">User type List 
        
       
        </header>
        
        <div class="panel-body">

          <div class="adv-table">
          
            <table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
              <thead>
                <tr >
                  <th width="7%">No</th>	
                    <th width="20%">Type Name</th>
                  <th width="10%">Opration</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
           
          </div>
        </div>
      </section>
    </div><!----col-sm-12------->
  </div><!----row------->
</div>
<!--body wrapper end--> 
<script>
	$(document).ready(function(e) {
		
		////////////
			$("#frm").validate({
				rules: {
					name: "required",
					
				},
				messages: {
					name: "Name is required",
				
				}
        	});
		 		///////////
  		
    });
</script> 
<style>

#ab {
   color: #65CEA7;
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
