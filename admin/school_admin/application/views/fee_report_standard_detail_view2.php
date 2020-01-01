
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/jszip.min.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/pdfmake.min.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/vfs_fonts.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?php echo asset_path();?>asset/datatable2/buttons.print.min.js"></script>



<div class="page-heading">
  <h4> Fee Collection </h4>
  <ul class="breadcrumb">
    <li> <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a> </li>
    <li class="active"> <a id="ab" href="<?php echo base_url(); ?>index.php/fee_report">Fee Report</a> </li>
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

<!--body wrapper start-->
<div class="wrapper">
  <div class="row">
    <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading">
          <?=$standard[0]['standard_name']?>
        </header>
        <div class="panel-body">
          <div class="adv-table">
            <table class="display table table-bordered table-striped cus_tbl_css" id="data-table2" style="width:100%;">
              <thead>
                <tr>
                  <th>Term</th>
                  <th>Month</th>
                  <th>Amount</th>
                  <th>Expected Amount</th>
                  <th>Paid</th>
                  <th>Outstanding Fee</th>
                </tr>
              </thead>
              <tbody>
                <?php for($i=0;$i<count($installment);$i++){ ?>
                <?php 
						
							$paid = get_value($paid_fee,$installment[$i]['term_id']); 
							
							$expected_amount  =  $installment[$i]['amount'] * count($result);
							
							$balance = $expected_amount - $paid;
						?>
                <tr>
                  <td><?=$installment[$i]['term_id']?></td>
                  <td><?=$installment[$i]['name']?></td>
                  <td><?=number_format($installment[$i]['amount'],2)?></td>
                  <td><?=number_format($expected_amount,2)?></td>
                  <td><?=number_format($paid,2)?></td>
                  <td><?=number_format($balance,2)?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>
  </div>
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
            <?php 
							
							$total_expected = 0;
							$run_inst = (int)$run_inst;
							
							for($i=1;$i<=$run_inst;$i++){
								$row = $i-1;
								$total_expected+= $installment[$row]['amount'];
							}
							
						
						
							
						?>
            <table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
              <thead>
                <tr>
                  <th>Code</th>
                  <th>Name</th>
                  <th>Contact No</th>
                  <th>City</th>
                  <th>Received (April) <br>
                    <?=$installment[0]['amount']?>
                  </th>
                  <th>Received (July) <br>
                    <?=$installment[1]['amount']?></th>
                  <th>Received (October) <br>
                    <?=$installment[2]['amount']?></th>
                  <th>Received (January) <br>
                    <?=$installment[3]['amount']?></th>
                  <th>Outstanding Fee </th>
                </tr>
              </thead>
              <tbody>
                <?php for($i=0;$i<count($result);$i++){ ?>
                <?php 
											
											
											
											$row =$i+1;
											
											
											
											$paid_1 	= 	get_value($result[$i]['paid_fee'],1);
											$paid_2 	= 	get_value($result[$i]['paid_fee'],2);
											$paid_3 	= 	get_value($result[$i]['paid_fee'],3);
											$paid_4 	= 	get_value($result[$i]['paid_fee'],4);
											
											$balance_1 	= 	$installment[0]['amount'] -  $paid_1;
											$balance_2 	= 	$installment[1]['amount'] -  $paid_2;
											$balance_3 	= 	$installment[2]['amount'] -  $paid_3;
											$balance_4 	= 	$installment[3]['amount'] -  $paid_4;
											
											$outstanding =  $result[$i]['tot_fee_paid'] - $total_expected;
											
											if($outstanding > 0){
												
												$out_class = 'cls_plus';
												
											}else{	
											
												$out_class = 'cls_minus'; 
												
											}
										
										?>
                <tr>
                  <td><?=$row?></td>
                  <td><?=$result[$i]['first_name']?>
                    <?=$result[$i]['middle_name']?>
                    <?=$result[$i]['sur_name']?></td>
                  <td><?=$result[$i]['phone']?></td>
                  <td><?=$result[$i]['city_name']?></td>
                  <td><span class="<?=($installment[0]['amount'] <= $paid_1) ? "font2" : "font1"?>">
                    <?=number_format($paid_1,2)?>
                    </span></td>
                  <td><span class="<?=($installment[1]['amount'] <= $paid_2) ? "font2" : "font1"?>">
                    <?=number_format($paid_2,2)?>
                    </span></td>
                  <td><span class="<?=($installment[2]['amount'] <= $paid_3) ? "font2" : "font1"?>">
                    <?=number_format($paid_3,2)?>
                    </span></td>
                  <td><span class="<?=($installment[3]['amount'] <= $paid_4) ? "font2" : "font1"?>">
                    <?=number_format($paid_4,2)?>
                    </span></td>
                  <td><span class="<?=$out_class?>">
                    <?=$sing?>
                    <?=number_format($outstanding,2)?>
                    </span></td>
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
			
				return (float)$result[$i]['tot'];
			
			}
			
		}
		
		return 0;
		
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
	
	.cls_plus{
		color:#4a8a2b !important;
		font-weight:bold;

	}
	.cls_minus{
		color:#E74144 !important;
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
						
						filename: 'fee_report_<?=$standard[0]['standard_name']?>_<?=date('d-m-2017')?>'
						
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

