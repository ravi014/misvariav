<!-- page heading start-->

<div class="page-heading">
	<h4>
                Fee Collection 
            </h4>

	<ul class="breadcrumb">
		<li>
			<a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
		</li>
		<li class="active"> <a id="ab" href="<?php echo base_url(); ?>index.php/news">Fee Collection</a>
		</li>

	</ul>

</div>
<script type="text/javascript" charset="utf-8">

	
	$(document).on('change','#standard',function(e){
			e.preventDefault();
			var eid=$(this).val();
			var url = '<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/dropdown_division/'+eid;
			$.ajax({url:url,
				beforeSend: function(){
     				$('.process1').append('<span class="loding_process"> <i class="fa fa-spinner fa-spin"></i></span>');	
   				},
   				complete: function(){
     				$('.loding_process').remove();
   				},
				success:function(result){
					$('#division').html(result);
				},
      			error: function( jqXHR, textStatus, errorThrown) {
         			alert(textStatus);
      			}
			});	
	});
	
	$(document).on('submit','#frm',function(e){
			e.preventDefault();
		var oTable = $('#data-table').dataTable();
  			oTable.fnDestroy();
			
			var form = $(this);
			
			var standard_code=$('#standard').val();
			var division_code=$('#division').val();
			
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

	
</script>

<link rel="stylesheet" type="text/css" href="<?php echo asset_path();?>asset/css/datepicker-custom.css"/>
<script type="text/javascript" src="<?php echo asset_path();?>asset/js/bootstrap-datepicker.js"></script>





<!-- page heading end--> 

<style>
	.show_msg {
		color: #F00;
		margin-left: 50px;
	}
</style>
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
     
        <header class="panel-heading"> Fee Head 
           <?=$segment['mode']?>
        </header>
        <div class="panel-body">
      
          <div class=" form">
           <form class="cmxform form-horizontal" id="frm" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord">
          <input class="form-control"  name="old_name" id="old_name" type="hidden" value="<?=$result[0]['head_name']?>" />

           <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
              <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
              <input type="hidden" name="eid" id="eid" 	 value="<?=$segment['eid']?>" />
              
              <div class="col-sm-6">
              
                <div class="form-group ">
                 <label for="cname" class="control-label col-lg-2"><strong>Standard</strong></label>
                 <div class="col-lg-8">
                 <select id="standard" name="standard" class="form-control txtselect">
                  <option value="">---Select---</option>
                  <?php
                  	for($i=0;$i<count($standard);$i++){
						$sel=($this->uri->segment(3)==$standard[$i]['standard_code']) ? "selected='selected'" : "";
						echo'<option '.$sel.' value="'.$standard[$i]['standard_code'].'">'.$standard[$i]['standard_name'].'</option>';
					}
				  ?>
                </select>
                </div>
             	</div>
             
                <div class="form-group ">
                 <label for="cname" class="control-label col-lg-2"><strong>Division</strong></label>
                 <div class="col-lg-8">
                 <select id="division" name="division" class="form-control txtselect">
                  <option value="">---Select---</option>
                 </select>
                </div>
                </div>
                
                <br/>
                
                <div class="form-group" align="center">
                <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            
            </div>
            
           
          </form>
    
          </div>
        </div>
      </section>
   	
     
    
    <!-------End col-sm-12------------>
  
    </div>
    
  </div><!----row------->
  
  <div class="row">

		<div class="col-sm-12">

			<section class="panel">
				<header class="panel-heading">Fee Colletion List

					<div class="btn-group pull-right">
						<!--<a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>/addnew/Add" class="addnewlink"><button class="btn btn-primary">Add New  <i class="fa fa-plus"></i></button></a>-->
					</div>
				</header>

				<div class="panel-body">

					<div class="adv-table">

						<table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
							<thead>
								<tr>
									<th width="5%">No</th>
                                    <th width="15%">Name</th>
                                    <th width="10%">Mobile</th>
									<th width="10%">Standard</th>
									<th width="10%">Opration</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>

					</div>
				</div>
			</section>
		</div>
	
   </div>
  

  
  
  
</div>
<!--body wrapper end--> 

<style>
	#ab {
		color: #65CEA7;
	}
</style>