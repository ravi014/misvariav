
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/buttons.print.min.js"></script>

<!-- page heading start-->

<div class="page-heading">
	<h4>
                Fee Collection 
            </h4>

	<ul class="breadcrumb">
		<li>
			<a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
		</li>
		<li class="active"> <a id="ab" href="<?php echo base_url(); ?>index.php/fee_report">Fee Report</a>
		</li>

	</ul>

</div>


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
				<header class="panel-heading">Fee Report

					<div class="btn-group pull-right">
						<!--<a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>/addnew/Add" class="addnewlink"><button class="btn btn-primary">Add New  <i class="fa fa-plus"></i></button></a>-->
					</div>
				</header>

				<div class="panel-body">

					<div class="adv-table">
						
                       
                        
						<table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
							<thead>
                            
								<tr>
								
                                   	<th>Std</th>
                                    <th>Expected Amt April</th>
                                    <th>Received Fees</th>
									<th>Expected Amt July</th>
                                    <th>Received Fees</th>
									<th>Expected Amt October</th>
                                    <th>Received Fees</th>
									<th>Expected Amt January</th>
                                    <th>Received Fees</th>
                                     <th>Outstanding Fee</th>
                                    
                                    <th>#</th>
									
								</tr>
							</thead>
							<tbody>
                            	
                             
                                
                                <?php for($i=0;$i<count($result);$i++){ ?>
                                		
                                        <?php 
											
											$expected_1  =  (int)$result[$i]['total_student'] * $result[$i]['installment'][0]['amount'];
											$expected_2  =  (int)$result[$i]['total_student'] * $result[$i]['installment'][1]['amount'];
											$expected_3  =  (int)$result[$i]['total_student'] * $result[$i]['installment'][2]['amount'];
											$expected_4  =  (int)$result[$i]['total_student'] * $result[$i]['installment'][3]['amount'];
											
											$current_inst = (int)$run_inst;
											
											$total_expected = 0;
											
											$total_paid = 0;
											
											for($m=0;$m<$current_inst;$m++){
												
												$row = $i+1;
												
												$total_expected+=$result[$i]['installment'][$m]['amount'] * (int)$result[$i]['total_student'];
												
												$total_paid+=get_value($result[$i]['paid_fee'],$row);
												
											}
											
											$outstanding = $total_paid - $total_expected;
										
										?>
                                        
                                            <tr>
                                            
                                                <td><?=$result[$i]['standard_name']?></td>
                                                
                                                <td><span class="font1"><?=number_format($expected_1,2)?></span></td>
                                                
                                                <td><span class="font2"><?=get_value($result[$i]['paid_fee'],1)?></span></td>
                                                
                                                <td><span class="font1"><?=number_format($expected_2,2)?></span></td>
                                                
                                                <td><span class="font2"><?=get_value($result[$i]['paid_fee'],2)?></span></td>
                                                
                                                <td><span class="font1"><?=number_format($expected_3,2)?></span></td>
                                                
                                                <td><span class="font2"><?=get_value($result[$i]['paid_fee'],3)?></span></td>
                                                
                                                <td><span class="font1"><?=number_format($expected_4,2)?></span></td>
                                                
                                                <td><span class="font2"><?=get_value($result[$i]['paid_fee'],4)?></span></td>
                                                
                                                <td><span class="font1"><?=number_format($outstanding,2)?></span></td>
                                                
                                                <td><a href="<?=base_url()?>index.php/<?=$this->uri->rsegment(1)?>/standard_detail2/<?=$result[$i]['standard_code']?>">View</a></td>
                                            
                                            </tr>
                                        
                                <?php } ?>
                            
							</tbody>
						</table>

					</div>
				</div>
			</section>
		</div>
	
   </div>

  
  
  
</div>

<?php 

	function get_value($result,$term_id){
		
		for($i=0;$i<count($result);$i++){
			
			if($result[$i]['term_id']==$term_id){
			
				return number_format($result[$i]['tot'],2);
			
			}
			
		}
		
		return '0.00';
		
	}

?>

<!--body wrapper end--> 

<style>
	#ab {
		color: #65CEA7;
	}
	.font1{
		color:#E74144 !important;
		font-weight:bold;
	}
	.font2{
		color:#4a8a2b !important;
		font-weight:bold;
	}
</style>
<script>
      
        $(document).ready(function() {
			
			$('#data-table').DataTable( {
				
				dom: 'Bfrtip',
				
				buttons: [
					{
						extend: 'excel',
						
						text: 'Excel Export',
						
						filename: 'fee_report_<?=date('d-m-2017')?>',
						
						exportOptions: {
							
								columns: [ 0, 1, 2,3,4,5,6,7,8 ]
							}
						
						
						
					}
					
				],
								
				paging: false,
				
				iDisplayLength: -1,
				
				"bPaginate": false,
				 
        		"bFilter": false,
		
        		"bInfo": false
		
				
			});
        });
       
        </script>
        
        
        
        <style>
        	.buttons-excel{
				float:right;
				font-weight:bold;
				padding:5px 0px;
			}
        </style>