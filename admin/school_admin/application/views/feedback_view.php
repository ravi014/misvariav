<!-- page heading start-->

<div class="page-heading">
            <h4>
                FEEDBACK 
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a>
                </li>
                <li class="active"> Feedback</li>
               
            </ul>
            
        </div>

<script>
	 $(document).ready(function(e) {
				list_data();		
		<!---------This Method is use for change status-------------->
		$(document).on('click', '.delrcd', function (e) {
				e.preventDefault();
				
				var url = $(this).attr('value');
				var id = $(this).attr('id');
				//alert(url);
				bootbox.confirm("Do you really want to delete ?", "Cancel", "Yes, remove", function (r) {
            		if (r){
   						$('#'+id).parent().parent().remove();
						$.ajax({url:url,success:function(result){
							list_data();
						}});
            		}
					
        		});
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
		
		var oTable = $('#data-list').dataTable();
  		oTable.fnDestroy();
		
		var url = '<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/listing/<?=$this->uri->segment(3)?>';
		$.ajax({url:url,success:function(result){
				
			$('#data-list').dataTable().fnClearTable();
				$('#data-list tbody').html(result);
				$('#data-list').dataTable( {
        			"bProcessing": true,
					"iDisplayLength": 25,
					"responsive": true,
					"bDestroy": true
				});
        }});
	
	}//**Listing**//
	
	 
	 $(document).on('change', '#status_chk', function (e) {
	
			 var value = $(this).val();
			var url='<?=base_url()?>index.php/<?=$this->uri->segment(1)?>/view/'+value;
			window.location.href=url;
  });
	 
    $(document).on('click', '.btn_delete', function (e) {
		var id='';
		var coun=0;
			$('.wall_chk').each( function( i , e ) {
					if(e.checked==true){
						coun++;
						id+=e.value+',';
					}
			 });
			var url ='<?php echo base_url();?>index.php/feedback/delete_feedback?id='+id;
			//alert (url); 
			var con=confirm('Are You Sure Delete '+coun+' Record');
			if(con){
				$.ajax({url:url,success:function(result){
					list_data();
					
					 }});
				 $('.wall_chk').each( function( i , e ) {if(e.checked==true){$(this).parent().parent().remove()} });
				
			}
			
	});
	$(document).on('click', '#selecctall', function (e) {
			var chk='';
		
			   if($(this).hasClass('sel_all')) {
        			$(this).removeClass('sel_all');$(this).addClass('unselect_all');
					chk=true;
					$(this).html('Unselect All');
					
    			}
				else{
        			$(this).removeClass('unselect_all');$(this).addClass('sel_all');
					chk=false;
					$(this).html('Select All');
					
				}
				
			$('.wall_chk').each( function( i , e ) {
					e.checked=chk;
			 });
	});
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
        <header class="panel-heading">Feedback Master 
       
   
        </header>
        
        <div class="panel-body" >
        
          <div class="row">
    <div class="col-md-12">
      <div class="panel panel-gradient" data-collapsed="0"> 
        <!-- panel head -->
        <div class="panel-heading">
          <div class="panel-title">Filter </div>
          <div class="panel-options"> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> </div>
        </div>
        
        <!-- panel body -->
        <div class="panel-body">
         <div class="form-group" style="width:30%">
            <label class="control-label"></label>
            <div>
              <select name="status_chk" class="form-control" id="status_chk" style="width:50%">
              		<option value="">Select</option>
                    <option value="">All</option>
                    <option value="replay">Replied</option>
                    <option value="noreplay">Un-Replied</option>
               </select>
            </div>
       </div>
       
        <a href="#"><button type="button" class="btn btn-success btn_delete">Delete All</button></a>
            </div>
      </div>
      <!---panel-body-----> 
    </div>
  </div>
         <div class="adv-table">
          
            <table class="display table table-bordered table-striped cus_tbl_css" id="data-list" style="width:100%;">
          
    
      <thead>
            <tr >
            <th><input type="checkbox" id = "selecctall" class="btn btn-success sel_all"></th>
            <th>Sr. No.</th>
       		<th width="10%">User Type</th>
            <th width="20%">User Name</th>
            <th width="10%">Mobile No</th>
            <th width="30%">Feedback</th>
            <th width="30%">Replay</th>
            <th>Action</th>
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