<!-- page heading start-->

<div class="page-heading">
            <h4>
                FOOD MENU
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li  class="active">Food menu</li>
              
            </ul>
            
        </div>
<?php
	
		$btn_style='style="display:none;"';

?>
<script>
	 $(document).ready(function(e) {
			get_listing();		
	$('.chosen-select').chosen();
		
		$(document).on('click', '.statuschange', function (e) {
				e.preventDefault();
				var url = $(this).attr('href');
				$.ajax({url:url,success:function(result){
					get_listing();
				}});	
			});
     });
	 
	function get_listing(){
				var url='<?=base_url()?>index.php/<?=$this->uri->segment(1)?>/get_food_menu/';
			//alert(url);
				$.ajax({url:url,
				success:function(result){	
					var oTable = $('#data-list').dataTable(); 	
					oTable.fnDestroy();						
					$('#data-list tbody').html(result);	
					$('#data-list').dataTable( {
						"bProcessing": true,
						"iDisplayLength": 50,
						"bDestroy": true
					});
					 oTable.fnAdjustColumnSizing();
            }});
	
		
		$(document).on('change','#year', function (e) {
			var value=$('#month').val();
			var value2=$('#year').val();
			if(value!=''){ $('.btn_submit').show(500);}
			else{$('.btn_submit').hide(500);}
			$("#data-list tbody").html('<tr><td colspan="6"><h3 class="clsmsg">Loading..</h3></td></tr>');
			var url="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_food_menu/"+value+"/"+value2;
			//alert(url);
			$.ajax({url:url,
				success:function(result){	
				 	$('#data-list tbody').html(result);	
				$('.chosen-select').chosen();
	
					$('#data-list2').dataTable( {
						"bProcessing": true,
						"iDisplayLength": 50,
						"bDestroy": true
					});
					 oTable.fnAdjustColumnSizing();
					
                }});
     	 });
		
		
		
		
		$(document).on('change','#month', function (e) {
			var value=$('#month').val();
			var value2=$('#year').val();
			if(value2!=''){ $('.btn_submit').show(500);}
			else{$('.btn_submit').hide(500);}
			$("#data-list tbody").html('<tr><td colspan="6"><h3 class="clsmsg">Loading..</h3></td></tr>');
			var url="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_food_menu/"+value+"/"+value2;
			//alert(url);
			$.ajax({url:url,
				success:function(result){	
				 	$('#data-list tbody').html(result);	
				$('.chosen-select').chosen();
	
					$('#data-list2').dataTable( {
						"bProcessing": true,
						"iDisplayLength": 50,
						"bDestroy": true
					});
					 oTable.fnAdjustColumnSizing();
					
                }});
     	 });
	  } 
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
        <header class="panel-heading">
	FOOD MENU
    
        </header>
        
        <div class="panel-body">

<form role="form" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" id="form1" method="post" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
         <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
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
          <div class="col-md-6"> 
               <!-------------->
            <div class="form-group">
              <label class="col-sm-2 control-label">Month</label>
              <div class="col-sm-4">
               <?php
					echo '<select id="month" name="month" class="form-control txtselect">';
					echo "<option value=''>Select Month</option>";
					for($m = 1;$m <= 12; $m++){
    					$month =  date("F", mktime(0, 0, 0, $m, 1));
    					echo "<option value='$m'>$month</option>";
						}
					echo "</select>";
					?> 
              </div>
            </div>
            <!-------------->
            <div class="form-group">
              <label class="col-sm-2 control-label">Year</label>
              <div class="col-sm-4">
                <select id="year" name="year" class="form-control txtselect">
                 <option value="">Select Year</option>
                  <?php
                  	for($i=date('Y'); $i>2010; $i--) {
   					$selected = '';
    				if ($Year == $i) $selected = ' selected="selected"';
    				print('<option value="'.$i.'"'.$selected.'>'.$i.'</option>'."\n");
					}
				  ?> 
                </select>
            
               </div>
             </div>
              <div class="form-group">
                <div class="col-sm-8" align="center">
                          <input type="submit" value="Save All" class="cpl btn btn-success btn_submit" <?=$btn_style?> />
</div>
</div>
            <!--------------> 
          </div>
        </div>
      </div>
      <!---panel-body-----> 
    </div>
 

 <div class="adv-table">	
    <table class="display table table-bordered table-striped cus_tbl_css" id="data-list" style="width:100%;">
              <thead>
                <tr >
                
             <th>Date</th>
             <th>Day</th>
             <th>Lunch Food</th>
             <th>Dinner Food</th>
           </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
   </div>
</form>
        </div>
      </section>
    </div><!----col-sm-12------->
  </div><!----row------->
</div>
<style>
	.proccsing_div{
		color:#F00;
		font-weight:bold;
	}
	.dataTables_wrapper{
		border:none;
	}

#ab {
   color: #65CEA7;
}	
.show_msg{
		color:#F00;
		margin-left: 50px;
	}
	

</style>
