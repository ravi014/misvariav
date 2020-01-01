<!-- page heading start-->

<div class="page-heading">
  <h4> Student Registraion </h4>
  <ul class="breadcrumb">
    <li> <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a> </li>
    <li class="active"> <a id="ab" href="<?php echo base_url(); ?>index.php/">Admission Inquiry</a></li>
  </ul>
</div>
<script type="text/javascript" charset="utf-8">//
	$(document).ready(function() {
		list_data();		
		
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

<div class="wrapper">
  <div class="row">
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading">Student Registration List
          <div class="btn-group pull-right"> </div>
        </header>
        <div class="panel-body" >
          <div class="adv-table">
            <table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
              <thead>
                <tr class='thefilter'>
                  <th width="3%">No</th>
                  <th width="20%">Name</th>
                  <th width="25%">Address</th>
                  <th width="10%">Contact Details</th>
                  <th width="15%">Birth Date</th>
                  <th width="15%">Parents Occu.</th>
                 <!-- <th width="10%">Registration Date</th>-->
                  <th width="5%">Action</th>
                </tr>
              </thead>
              <tbody>
                </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>
    <!----col-sm-12-------> 
  </div>
  <!----row-------> 
</div>
<!--body wrapper end-->

<style>


#ab {
   color: #65CEA7;
}	
</style>