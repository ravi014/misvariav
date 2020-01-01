<!-- page heading start-->
<div class="page-heading">
            <h4>
               EXAM SCHEDULE
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li  class="active">Exam Schedule</li>
              
            </ul>
            
        </div>
<?php
	if($this->uri->segment(3)==""){
		$btn_style='style="display:none;"';
	}
	else{
		$btn_style='style=""';
	}
?>
<script>
	 $(document).ready(function(e) {
			get_listing();		
	
     });
	 
	function get_listing(){
				var url='<?=base_url()?>index.php/<?=$this->uri->segment(1)?>/listing_two/<?=$this->uri->segment(3)?>';
				$.ajax({url:url,
				success:function(result){	
					var oTable = $('#example').dataTable(); 	
					oTable.fnDestroy();						
					$('#example tbody').html(result);	
					$('#example').dataTable( {
						"bProcessing": true,
						"iDisplayLength": 50,
						"bDestroy": true
					});
					 oTable.fnAdjustColumnSizing();
            }});
	
			
		$(document).on('click', '.addnewbtn', function (e) {	
		
			var standard_code = $("#standard_code").val();
			var url='<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/addnew/Add/'+standard_code;
			
			window.location.href=url;	
		});
		
		$(document).on('click', '.detailbtn', function (e) {	
				var value  =  $(this).attr('value');
				$('#tbl1').hide();
				$('#tbl2').show();
					var oTable = $('#example2').dataTable(); 	
					oTable.fnDestroy();	
				$("#example2 tbody").html('<tr><td colspan="6"><h3 class="clsmsg">Loading..</h3></td></tr>');
			var url="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/listing/"+value;
				//alert(url);
				
			$.ajax({url:url,
				success:function(result){	
			//alert(result);
				
				 	$('#example2 tbody').html(result);	
		
					$('#example2').dataTable( {
						"bProcessing": true,
						"iDisplayLength": 50,
						"bDestroy": true
					});
					 oTable.fnAdjustColumnSizing();
					
                }});				
		});
		
		$(document).on('change','#standard_code', function (e) {
				$('#tbl2').hide();
				$('#tbl1').show();
				
			var value=$('#standard_code').val();
			if(value!=''){ $('.btn_submit').show(500);}
			else{$('.btn_submit').hide(500);}
			$("#example tbody").html('<tr><td colspan="6"><h3 class="clsmsg">Loading..</h3></td></tr>');
			var url="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/listing_two/"+value;
			//alert(url);
			var oTable = $('#example').dataTable(); 	
					oTable.fnDestroy();		
			$.ajax({url:url,
				success:function(result){	
			//	alert(result);
			
				 	$('#example tbody').html(result);	
		
					$('#example').dataTable( {
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
	EXAM SCHEDULE 
        </header>
        
        <div class="panel-body">

 <div class="row">
     <div id="tbl1"> 
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
              <label class="col-sm-2 control-label">Standard</label>
              <div class="col-sm-4">
                <select id="standard_code" name="standard_code" class="form-control ddl_list">
                 	<option value="">---Select---</option>
                        <?php for($i=0;$i<count($standard);$i++){ 
							$sel='';
							if($this->uri->segment(3)==$standard[$i]['standard_code']){
								$sel='selected="selected"';
							}
						?>
							<option <?=$sel?> value="<?=$standard[$i]['standard_code']?>"><?=$standard[$i]['standard_name']?></option>	
						<?php }?>
                        </select>
        
               </div>
                          
             </div>
            
             <br/><br/>
              <div class="form-group">
                <div class="col-sm-8" align="center">
                          <input type="submit" value="ADD NEW" class="cpl btn btn-success btn_submit addnewbtn" <?=$btn_style?> />
</div>
</div>
            <!--------------> 
          </div>
        </div>
      </div>
      <!---panel-body-----> 
    </div>
 


 	 <div class="adv-table">
    <table class="display table table-bordered table-striped cus_tbl_css" id="example" style="width:100%;">
              <thead>
              <tr>
              <th width="10%"> Sr. No</th>
        <th width="25%">Year</th>
           <th width="25%">Exam Name</th>
        <th width="25%">Operation</th>
      </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    </div>
    </div>
    
    
     <div id="tbl2" style="display:none;">
     
      <div class="col-sm-12">
  
      <section class="panel">
        <header class="panel-heading">View Details 
        
         <!--<div class="btn-group pull-right">
              <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>/view/" class="addnewlink"><button class="btn btn-primary">Add New  <i class="fa fa-plus"></i></button></a>
            </div>-->
        </header>
        
        <div class="panel-body" >

      <div class="adv-table">
    <table class="display table table-bordered table-striped cus_tbl_css" id="example2" style="width:100%;">
    <thead>
      <tr >
            <th width="5%">No</th>
            <th >Standard</th>
              <th >Exam</th>
                <th >Subject Name</th>
            <th >Exam Date</th>
            <th>Start Time</th>
            <th >End Time</th>
            <th >Min Marks</th>
             <th >Max Marks</th>
            <th >Operation</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  </div>
   </div>
      </section>
    </div><!----col-sm
</div>      
  </div>
   </div>

    
      </section>
    </div><!----col-sm-12------->
  </div><!----row------->
</div>
<style>
.ddl_list {
	width: 250px;
	height: 30px;
	font-weight: bold;
	border: #999 solid 1px;
}
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
