<!-- page heading start-->

<div class="page-heading">
            <h4>
                SMS 
            </h4>
            <ul class="breadcrumb">
                <li> <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a> </li>
                <li class="active">Send normal sms</li>
          </ul>
            
        </div>
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
 
    <div class="col-sm-12">
  
      <section class="panel">
        <header class="panel-heading">SMS
        
         <div class="btn-group pull-right">
              <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>/addnew/Add" class="addnewlink"><button class="btn btn-primary">Send SMS <i class="fa fa-plus"></i></button></a>
            </div>
        </header>
        
        <div class="panel-body">

          <div class="adv-table">
          
            <table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
              <thead>
                <tr >
            <th>Sr. No.</th>
            <th>Description</th>
            <th>Send To</th>
            <th>Option</th>
            <th>Date</th>
            <th>Opration</th>
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

 <style>
	.dataTables_wrapper{
		border:none;
	}
 
 </style>   