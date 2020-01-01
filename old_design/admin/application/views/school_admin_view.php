<!-- page heading start-->
<style>
#ab {
	color: #65CEA7;
}
</style>
<div class="page-heading">
  <h4> SCHOOL </h4>
  <ul class="breadcrumb">
    <li> <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a> </li>
    <li class="active"> <a id="ab" href="<?php echo base_url(); ?>index.php/school_admin">School</a></li>
  </ul>
</div>

<!-- page heading end--> 
<script>
		var base_url='<?=base_url();?>';
   		$(document).ready(function(e) {
            bind_table();
			
			
			$(document).on('click', '.delrcd', function (e) {
			e.preventDefault();
			var con=confirm('Are Your Sure You Want To Delete');
			//alert(con);
			if(!con){
				return false;
			}
			var url = $(this).attr('href');
			$.ajax({url:url,success:function(result){
				bind_table();	 	
            }});
		});
		<!---------This Method is use for change status-------------->
		$(document).on('click', '.statuschange', function (e) {
			e.preventDefault();
			var url = $(this).attr('href');
			$.ajax({url:url,success:function(result){
				bind_table();	 	
            }});	
		});
		
	});		
	
       
		function bind_table()
		{
			
			var url='<?=base_url()?>index.php/<?=$this->uri->segment(1)?>/listing';
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
			
			
		}
		
		$(document).on('click','.cls_update',function(e){
			e.preventDefault();
			var url=$(this).attr('href');
			$.ajax({url:url,success:function(result){
				bind_table();
			}});
		})
		
			
		
		
			
		
		
   </script>
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
        <header class="panel-heading">School List
          <div class="btn-group pull-right"> <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>/addnew/Add" class="addnewlink">
            <button class="btn btn-primary">Add New <i class="fa fa-plus"></i></button>
            </a> </div>
        </header>
        <div class="panel-body">
          <div class="adv-table">
            <table  class="display table table-bordered table-striped cus_tbl_css" id="data-table">
              <thead>
                <tr>
                  <th width="7%">No</th>
                  <th width="10%">Picture</th>
                  <th width="15%">Name</th>
                  <th width="20%">Email</th>
                  <th width="15%">Contact </th>
                  <th width="15%">Address </th>
                  <th width="15%">Username </th>
                  <th width="15%">Password </th>
                  <th width="8%">Opration</th>
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
 .hide-section{
	display:none;	
}
.due_date_line{
	text-decoration:line-through !important;
}
</style>
