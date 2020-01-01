<!-- page heading start-->

<div class="page-heading">
            <h4>
                STUDENT MANAGEMENT 
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a>
                </li>
                <li class="active"> <a id="ab" href="<?php echo base_url(); ?>index.php/student_admission">Student Admission</a></li>
               
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
		<!---------This Method is use for change status-------------->
		$(document).on('click', '.statuschange', function (e) {
			e.preventDefault();
			var url = $(this).attr('href');
			$.ajax({url:url,success:function(result){
				list_data();	 	
            }});	
		});

	$(document).on('change', '#standard_code', function (e) {
				var eid = $('#standard_code').val();
				var url='<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_division_by_standard/'+eid;
				$.ajax({url:url,
				success:function(result){
				//alert(result);	
				if(result=='0') {
					$("#division_code").html("<option value='0'>--No Division--</option>");
				}else{
					$("#division_code").html(result);
				}
				}});
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
	
$(document).on('submit','#form1',function(e){
			e.preventDefault();
		var oTable = $('#data-table').dataTable();
  			oTable.fnDestroy();
			
			var form = $(this);
			
			var standard_code=$('#standard_code').val();
			var division_code=$('#division_code').val();
			
			var post_url = '<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/listing/'+standard_code+'/'+division_code;	
		
			$('.proccsing_div').html('processing...');		
			$.ajax({
				url: post_url, 
				success: function (result) {
				$('.proccsing_div').html('');							
				$('#data-table').dataTable().fnClearTable();
				$('#data-table tbody').html(result);
				$('#data-table').dataTable( {
        			"bProcessing": true,
					"iDisplayLength": 25,
					"responsive": true,
					"bDestroy": true
    			});		 	
				}
			});
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
        <header class="panel-heading">
        Student List
      <div class="btn-group pull-right">
              <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>/addnew/Add" class="addnewlink"><button class="btn btn-primary">Add New  <i class="fa fa-plus"></i></button></a>
            </div>
        </header>
        
        <div class="panel-body">

<!---------Filter------------>
<form role="form" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/listing" id="form1" method="post" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
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
              <label class="col-sm-4 control-label">Standard</label>
              <div class="col-sm-8">
                <select id="standard_code" name="standard_code" class="form-control txtselect">
                  <option value="">---Select---</option>
                  <?php
                  	for($i=0;$i<count($standard);$i++){
						$sel=($standard[$i]['id']==$standard_seleced) ? "selected='selected'" : "";
						echo'<option '.$sel.' value="'.$standard[$i]['id'].'">'.$standard[$i]['name'].'</option>';
					}
				  ?>
                </select>
              </div>
            </div>
            <!-------------->
            <div class="form-group">
              <label class="col-sm-4 control-label">Division</label>
              <div class="col-sm-8">
                <select id="division_code" name="division_code" class="form-control txtselect">
                  <option value="">---Select---</option>
                  <?php
                  	for($i=0;$i<count($division);$i++){
						$sel=($division[$i]['id']==$division_seleced) ? "selected='selected'" : "";
						echo'<option '.$sel.' value="'.$division[$i]['id'].'">'.$division[$i]['name'].'</option>';
					}
				  ?>
                </select>
              </div>
            </div>
            
            <!--------------> 
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="col-sm-4 control-label"></label>
              <div class="col-sm-8">
                <input type="submit" class="btn btn-success" value="Filter" />
                <p class="proccsing_div"></p>
              </div>
            </div>
            
            <!--------------> 
          </div>
        </div>
      </div>
      <!---panel-body-----> 
    </div>
  </div>
</form>
<!-----------Filter---------->


          <div class="adv-table">	

    <table class="display table table-bordered table-striped cus_tbl_css" id="data-table" >
              <thead>
                <tr >
           <th>No</th>
          <th>Image</th>
          <th>Name</th>
          <th>Mobile No</th>
          <th>Standard</th>
         <!-- <th>Division</th>-->
          <th>Operation</th>
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
	.proccsing_div{
		color:#F00;
		font-weight:bold;
	}
	

#ab {
   color: #65CEA7;
}	
.show_msg{
		color:#F00;
		margin-left: 50px;
	}
</style>
