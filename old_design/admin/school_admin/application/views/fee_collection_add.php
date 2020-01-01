<!-- page heading start-->

<div class="page-heading"><h4>

               Student Fee Collect
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a>
                </li>
                <li class="active">Fee Collect</li>
            <?php  	if($this->uri->segment(4)=='Edit'){ ?>
                 <li class="active"><?=$segment['mode']?>Student Fee Collect</li>
                 <?php } ?>
            </ul>
            
        </div>
<?php
	if($this->uri->segment(4)=='Edit'){
	$btnlable="Update";
		
	}
	else{
		
		$btnlable	=	"Insert";
		
	}
	
?>

<link rel="stylesheet" type="text/css" href="<?php echo asset_path();?>asset/css/datepicker-custom.css" />
<script type="text/javascript" src="<?php echo asset_path();?>asset/js/bootstrap-datepicker.js"></script>
<script>
	$(document).ready(function(e) {
         $('.default-date-picker').datepicker({
       		 format: 'dd-mm-yyyy',
			  autoclose: true
    	 });
		
		
		
    });
	 
		$(document).on('change','#pay_type',function(e){
			
			if($(this).val()=='cash'){
				$('.payment_div').addClass('dis_none');	
				$('.gen_req').prop('required',false);
			}else{
				$('.payment_div').removeClass('dis_none');
				$('.gen_req').prop('required',true);
			}
		}); 
		
		 
	
</script>


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

  
    <div class="col-sm-6">
     
      <section class="panel">
     
        <header class="panel-heading"> Student Details   </header>
        <div class="panel-body">
      		
             <table>
         		<tr>
                    <td valign="top" width="70%">
                        <table class="table">
                            <tr>
                                <td>Full Name</td>
                                <td>:</td>
                                <td><?=$student_dt[0]['first_name']?>  <?=$student_dt[0]['middle_name']?> <?=$student_dt[0]['sur_name']?></td>
                            </tr>
                         
                            <tr>
                                <td>Standard</td>
                                <td>:</td>
                                <td><?=$student_dt[0]['standard_name']?></td>
                            </tr>
                			<tr>
                                <td>Division</td>
                                <td>:</td>
                                <td><?=$student_dt[0]['division_name']?></td>
                            </tr>
                           
                            
                        </table>
                    </td>
                </tr>
         </table>
          
        </div>
      </section>
   		
      <section class="panel">
        <header class="panel-heading">Fee </header>
        
        <div class="panel-body">

          <div class="adv-table">
          
            <div class=" form">
            <?php if($this->uri->segment(4)=="Edit"){ ?>
					<form class="cmxform form-horizontal" id="frm" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord">
         	 
              <input class="form-control"  name="old_name" id="old_name" type="hidden" value="<?=$result[0]['head_name']?>" />

           	  <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
              <input type="hidden" name="mode" id="mode" value="<?=$this->uri->segment(4)?>" />
              <input type="hidden" name="eid" id="eid" value="<?=$this->uri->segment(5)?>" />
              
              <input type="hidden" name="student_code" id="student_code"  value="<?=$this->uri->segment(3)?>" />
              <input type="hidden" name="student_yearly_code" id="student_yearly_code"  value="<?=$student_dt[0]['student_yearly_code']?>" />
              <input type="hidden" name="account_year_code" id="account_year_code"  value="<?=$student_dt[0]['account_year_code']?>" />
              
               
             
              <div class="form-group ">
               <label for="cname" class="control-label col-lg-2"><strong>Date</strong></label>
               <div class="col-lg-8">
                   <?php $form_value = set_value('fee_date', isset($result[0]['date_info']) ? date('d-m-Y',strtotime($result[0]['date_info'])) : ''); ?>
                    <input type="text" class="form-control default-date-picker" required="required" name="fee_date" id="fee_date" value="<?=$form_value?>" />
                   <?php echo form_error('fee_date', '<p class="error_p">', '</p>'); ?>
            
                </div>
             </div>
             
              <div class="form-group">
                 <label for="cname" class="control-label col-lg-2" ><strong>Fee Type</strong></label>
                 <div class="col-lg-8">
                 <select id="pay_type" name="pay_type" required class="form-control txtselect">
                 <?php if($result[0]['pay_type']=="cash"){
						$sel1="selected";
					}elseif($result[0]['pay_type']=="cheque"){
						$sel2="selected";
					}elseif($result[0]['pay_type']=="dd"){
						$sel3="selected";
					}  
					 ?>
                  <option value="">---Select---</option>
                  <option <?=$sel1?> value="cash">Cash</option>
                  <option <?=$sel2?> value="cheque">Cheque</option>
                  <option <?=$sel3?> value="dd">DD</option>
                  
                </select>
                 <?php echo form_error('pay_type', '<p class="error_p">', '</p>'); ?>
                </div>
             </div>
             
             <div class="form-group">
              <label class="control-label col-lg-2"><strong>Amount</strong></label>
              <div class="col-lg-8">
              <?php $form_value = set_value('amount', isset($result[0]['amount']) ? $result[0]['amount'] : ''); ?>
             	<input type="number" name="amount" id="amount" value="<?=$form_value?>"   class="form-control" placeholder="Amount" required="required"   title="Amount" />
                <?php echo form_error('amount', '<p class="error_p">', '</p>'); ?>
               
              </div>
            </div>
             
             
             <?php 
				if($pay_type=='cheque' || $pay_type=='dd'){
					 $cls='';
					 $req='required="required"';
				}else{
					$cls='dis_none';
				}
				
				if($result[0]['pay_type']=="cash"){
					$cls='dis_none';
				}else{
					$cls='';
				}
				
			 ?>
           	<div class="payment_div <?=$cls?>">
              <div class="form-group">
                <label class="control-label col-lg-2"><strong>Cheque/DD No.</strong></label>
                <div class="col-lg-8">
                  <?php $form_value = set_value('cheque_dd_no', isset($result[0]['cheque_dd_no']) ? $result[0]['cheque_dd_no'] : ''); ?>
                  <input type="text" name="cheque_dd_no" id="cheque_dd_no" value="<?=$form_value?>" class="form-control gen_req" <?=$req?> placeholder="Cheque/DD No."  title="Cheque/DD No." />
                  <?php echo form_error('cheque_dd_no', '<p class="error_p">', '</p>'); ?> </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-2"><strong>Bank Name</strong></label>
                <div class="col-lg-8">
                  <?php $form_value = set_value('bank_name', isset($result[0]['bank_name']) ? $result[0]['bank_name'] : ''); ?>
                  <input type="text" name="bank_name" id="bank_name" value="<?=$form_value?>" class="form-control gen_req" <?=$req?> placeholder="Bank Name"  title="Bank Name" />
                  <?php echo form_error('bank_name', '<p class="error_p">', '</p>'); ?> </div>
              </div>
             
              <div class="form-group ">
               <label for="cname" class="control-label col-lg-2"><strong>Cheque/DD Date</strong></label>
               <div class="col-lg-8">
               	  <?php $form_value = set_value('cheque_dd_date', isset($result[0]['cheque_dd_date']) ? date('d-m-Y',strtotime($result[0]['cheque_dd_date'])) : ''); ?>
                  <input type="text" name="cheque_dd_date" id="cheque_dd_date" value="<?=$form_value?>" class="form-control default-date-picker gen_req" <?=$req?> placeholder="Cheque/DD Date"  title="Cheque/DD Date" />
                  <?php echo form_error('cheque_dd_date', '<p class="error_p">', '</p>'); ?> 
            
                </div>
             </div>
              
              
            </div>
            
            
            <div class="form-group ">
               <label for="cname" class="control-label col-lg-2"><strong>Description</strong></label>
               <div class="col-lg-8">
                  <?php $form_value = set_value('discrpt', isset($result[0]['discrpt']) ? $result[0]['discrpt'] : ''); ?>
                  <textarea name="discrpt" id="discrpt" class="form-control"><?=$form_value?></textarea>
                  
                </div>
             </div>
              
           <br/>
           
           
          <div class="form-group" align="center">
             <button type="submit" class="btn btn-primary">
              <?=$btnlable?>
              </button>
              <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/<?=$this->uri->segment(3)?>">
              <button class="btn btn-default" type="button">Cancel</button>
              </a> </div>
          </form>
			<?php }else{ ?>
					 <?php   if($total_fee==$total_paid_fee){?>
						<div class="form-group ">
						   <label for="cname" class="control-label col-lg-12"><strong>Total fees has been paid.</strong></label>
						</div>
						<?php }else{ ?>
					   <form class="cmxform form-horizontal" id="frm" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord">

						  <input class="form-control"  name="old_name" id="old_name" type="hidden" value="<?=$result[0]['head_name']?>" />

						  <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
						  <input type="hidden" name="mode" id="mode" value="<?=$this->uri->segment(4)?>" />
						  <input type="hidden" name="eid" id="eid" 	 value="<?=$this->uri->segment(5)?>" />

						  <input type="hidden" name="student_code" id="student_code"  value="<?=$this->uri->segment(3)?>" />
						  <input type="hidden" name="student_yearly_code" id="student_yearly_code"  value="<?=$student_dt[0]['student_yearly_code']?>" />
						  <input type="hidden" name="account_year_code" id="account_year_code"  value="<?=$student_dt[0]['account_year_code']?>" />



						  <div class="form-group ">
						   <label for="cname" class="control-label col-lg-2"><strong>Date</strong></label>
						   <div class="col-lg-8">
							   <?php $form_value = set_value('fee_date', isset($result[0]['date_info']) ? date('d-m-Y',strtotime($result[0]['date_info'])) : ''); ?>
								<input type="text" class="form-control default-date-picker" required="required" name="fee_date" id="fee_date" value="<?=$form_value?>" />
							   <?php echo form_error('fee_date', '<p class="error_p">', '</p>'); ?>

							</div>
						 </div>

						  <div class="form-group">
							 <label for="cname" class="control-label col-lg-2" ><strong>Fee Type</strong></label>
							 <div class="col-lg-8">
							 <select id="pay_type" name="pay_type" required class="form-control txtselect">

							  <option value="">---Select---</option>
							  <option value="cash">Cash</option>
							  <option value="cheque">Cheque</option>
							  <option value="dd">DD</option>

							</select>
							 <?php echo form_error('pay_type', '<p class="error_p">', '</p>'); ?>
							</div>
						 </div>

						 <div class="form-group">
						  <label class="control-label col-lg-2"><strong>Amount</strong></label>
						  <div class="col-lg-8">
						  <?php $form_value = set_value('amount', isset($result[0]['amount']) ? $result[0]['amount'] : ''); ?>
							<input type="number" name="amount" id="amount" value="<?=$form_value?>"   class="form-control" placeholder="Amount" required="required"   title="Amount" />
							<?php echo form_error('amount', '<p class="error_p">', '</p>'); ?>

						  </div>
						</div>


						 <?php 
							if($pay_type=='cheque' || $pay_type=='dd'){
								 $cls='';
								 $req='required="required"';
							}else{
								$cls='dis_none';
							}


						 ?>
						<div class="payment_div <?=$cls?>">
						  <div class="form-group">
							<label class="control-label col-lg-2"><strong>Cheque/DD No.</strong></label>
							<div class="col-lg-8">
							  <?php $form_value = set_value('cheque_dd_no', isset($result[0]['cheque_dd_no']) ? $result[0]['cheque_dd_no'] : ''); ?>
							  <input type="text" name="cheque_dd_no" id="cheque_dd_no" value="<?=$form_value?>" class="form-control gen_req" <?=$req?> placeholder="Cheque/DD No."  title="Cheque/DD No." />
							  <?php echo form_error('cheque_dd_no', '<p class="error_p">', '</p>'); ?> </div>
						  </div>
						  <div class="form-group">
							<label class="control-label col-lg-2"><strong>Bank Name</strong></label>
							<div class="col-lg-8">
							  <?php $form_value = set_value('bank_name', isset($result[0]['bank_name']) ? $result[0]['bank_name'] : ''); ?>
							  <input type="text" name="bank_name" id="bank_name" value="<?=$form_value?>" class="form-control gen_req" <?=$req?> placeholder="Bank Name"  title="Bank Name" />
							  <?php echo form_error('bank_name', '<p class="error_p">', '</p>'); ?> </div>
						  </div>

						  <div class="form-group ">
						   <label for="cname" class="control-label col-lg-2"><strong>Cheque/DD Date</strong></label>
						   <div class="col-lg-8">
							  <?php $form_value = set_value('cheque_dd_date', isset($result[0]['cheque_dd_date']) ? date('d-m-Y',strtotime($result[0]['cheque_dd_date'])) : ''); ?>
							  <input type="text" name="cheque_dd_date" id="cheque_dd_date" value="<?=$form_value?>" class="form-control default-date-picker gen_req" <?=$req?> placeholder="Cheque/DD Date"  title="Cheque/DD Date" />
							  <?php echo form_error('cheque_dd_date', '<p class="error_p">', '</p>'); ?> 

							</div>
						 </div>


						</div>


						<div class="form-group ">
						   <label for="cname" class="control-label col-lg-2"><strong>Description</strong></label>
						   <div class="col-lg-8">
							  <?php $form_value = set_value('discrpt', isset($result[0]['discrpt']) ? $result[0]['discrpt'] : ''); ?>
							  <textarea name="discrpt" id="discrpt" class="form-control"><?=$form_value?></textarea>

							</div>
						 </div>

					   <br/>


					  <div class="form-group" align="center">
						 <button type="submit" class="btn btn-primary">
						  <?=$btnlable?>
						  </button>
						  <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/<?=$this->uri->segment(3)?>">
						  <button class="btn btn-default" type="button">Cancel</button>
						  </a> </div>
					  </form>
    			<?php } ?>
		<?php	} 	?>
            
           
          </div>
           
          </div>
        </div>
      </section>  
        
        
    <!-------End col-sm-12------------>
  
    </div>
    
    <div class="col-sm-6">
  
      <section class="panel">
        <header class="panel-heading">Installment Detail  </header>
        
        <div class="panel-body">

          <div class="adv-table">
          		
               
                
                <table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
                
                <thead>
                
                <tr>
                
                    <th>Term</th>
                    
                    <th>Month</th>
                    
                    <th>Total Amount</th>
                    
                    <th>Paid</th>
                    
                    <th>Outstanding Amt</th>
                
                </tr>
                
                </thead>
                
                <tbody>
                
              
                
                <?php for($i=0;$i<count($installment);$i++) {?>
                		
                        <?php 
							$paid_inst = $this->comman_fun->get_table_data('fee_income_dt',array('student_yearly_code'=>$student_dt[0]['student_yearly_code'],'term_id'=>$installment[$i]['term_id'])); 
							
							$paid_amt = (float)$paid_inst[0]['amt'];
							
							$balance  =  (float)$installment[$i]['amount'] - $paid_amt;
							
							$tr_class = '';
							
							if($installment[$i]['term_id'] < $run_inst){
								
								$tr_class = 'close_tr';
								
							}
							
							if($installment[$i]['term_id'] == $run_inst){
								
								$tr_class = 'active_tr';
								
							}
							
							
						?>
                        
                    	<tr class="<?=$tr_class?>">
                        	
                            <td><?=$installment[$i]['term_id']?></td>
                            <td><?=$installment[$i]['name']?></td>
                            <td><?=$installment[$i]['amount']?></td>
                            <td><?=number_format($paid_amt,2)?></td>
                            <td><?=number_format($balance,2)?></td>
                            
                        </tr>
                    
                <?php } ?>
                
                </tbody>
                
                </table>
           
          </div>
        </div>
      </section>
    </div><!----col-sm-12------->
   
   	
    
    
    
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
                                    <th width="15%">Fee Date</th>
                                    <th width="10%">Amount</th>
									<th width="10%">Type</th>
									<th width="10%">Description</th>
                                    <th width="10%">Bank Name</th>
                                    <th width="10%">Cheque/DD Date</th>
                                    <th width="10%">#</th>
								</tr>
							</thead>
							<tbody>
                            <?php 
							
            				for($i=0;$i<count($list);$i++){
								
								$row=$i+1;
								
								$cheque_dd_no =($list[$i]['pay_type']=='cash')? "-" : $list[$i]['cheque_dd_no'];
								
								$bank_name =($list[$i]['pay_type']=='cash')? "-" : $list[$i]['bank_name'];
								
								$discrpt =($list[$i]['discrpt']=='')? "-" : $list[$i]['discrpt'];
								
								$cheque_dd_date =($list[$i]['pay_type']=='cash')? "-" : date('d-m-Y',strtotime($list[$i]['cheque_dd_date']));
								
								echo '<tr>
								
								<td>'.$row.'</td>
								
								<td>'.date('d-m-Y',strtotime($list[$i]['date_info'])).'</td>
								
								<td>'.$list[$i]['amount'].'</td>
								
								<td>'.$list[$i]['pay_type'].'</td>
								
								<td>'.$discrpt.'</td>
								
								<td>'.$bank_name.'</td>
								
								<td>'.$cheque_dd_date.'</td>
								
								<td><a class="edit_rpt" href="'.base_url().'index.php/'.$this->uri->segment(1).'/addnew/'.$this->uri->segment(3).'/Edit/'.$list[$i]['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a><a class="print_rpt" target="_blank" href="#"><i class="fa fa-print"></i></a></td>';
								
										
							}
							?>
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
.print_rpt{
		font-size:24px;
		color:#333;
	}
.edit_rpt{
		font-size:20px;
		color:#333;
		margin-right: 10px;
		margin-left: 10px;
	}	
	
#ab {
   color: #65CEA7;
}	
#msg{
	color:#F00;
	font-size:16px;
}

.error{
	font-weight:bold;
	color:#F00;
}

.dis_none{
	
	display:none;
}

.close_tr td{
	color:#c59091 !important;
	font-weight:bold !important;
}

.active_tr{
	color:#4c8635 !important;
	font-weight:bold !important;
}

</style>
