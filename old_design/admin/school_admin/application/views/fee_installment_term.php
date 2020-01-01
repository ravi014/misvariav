<!-- page heading start-->

<div class="page-heading">
  <h4> Fee Head </h4>
  <ul class="breadcrumb">
    <li> <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a> </li>
    <li class="active"> Fee Installment Term </li>
  </ul>
</div>

<?php

	if($mode=='Edit'){	$btnlable="Update";}
	
	else{$btnlable	=	"Insert";}
	
	
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
  
    <div class="col-sm-5">
    
      <section class="panel">
      
        <header class="panel-heading"> Fee Installment Term </header>
        
        <div class="panel-body">
        
          <div class=" form">
          	
            <?php if($mode=='Edit'){ ?>
            
           			 <form class="cmxform form-horizontal" id="frm" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insert">
            
              <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
              
              <input type="hidden" name="eid" id="eid" 	 value="<?=$record[0]['id']?>" />
              
              <div class="form-group ">
              
                <label for="cname" class="control-label col-lg-3"><strong>ID</strong></label>
                
                <div class="col-lg-9">
                
                  <input type="text" required value="1" class="form-control" readonly disabled />
                  
                </div>
                
              </div>
              
              <div class="form-group ">
              
                <label for="cname" class="control-label col-lg-3"><strong>To Date</strong></label>
                
                <div class="col-lg-9">
                
                  <input type="text" name="to_date" id="to_date" required value="<?=date('d-m-Y',$record[0]['to_date'])?>" class="form-control default-date-picker"  data-format="dd-mm-yyyy"  placeholder="To Date"  />
                  
                  
                  
                  <?php echo form_error('name', '<p class="to_date">', '</p>'); ?> </div>
                  
              </div>
              
              
              <div class="form-group ">
              
                <label for="cname" class="control-label col-lg-3"><strong>From Date</strong></label>
                
                <div class="col-lg-9">
                
                  <input type="text" name="from_date" id="from_date" required value="<?=date('d-m-Y',$record[0]['from_date'])?>" class="form-control default-date-picker"  data-format="dd-mm-yyyy"  placeholder="From Date"   />
                  
                  <?php echo form_error('from_date', '<p class="error">', '</p>'); ?> </div>
                  
              </div>
              
              <br/>
              
              <div class="form-group" align="center">
              
                <button type="submit" class="btn btn-primary">Update</button>
                
              </div>
              
            </form>
            
            <?php } ?>
            
          </div>
          
        </div>
        
      </section>
      
      <!-------End col-sm-12------------> 
      
    </div>
    
    
    
    <div class="col-sm-7">
    
      <section class="panel">
      
        <header class="panel-heading">Fee Installment Term List </header>
        
        <div class="panel-body">
        
          <div class="adv-table">
          
            <table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
            
              <thead>
              
                <tr >
                
                  <th>No</th>
                  
                  <th>Month</th>
                  
                  <th>Date</th>
                  
                  <th>Upadte</th>
                  
                </tr>
                
              </thead>
              
              <tbody>
              
                <?php for($i=0;$i<count($result);$i++){ ?>
                
                <?php $row = $i+1; ?>
                
                <tr>
                
                  <td><?=$row?></td>
                  
                  <td><?=date('F',$result[$i]['to_date'])?></td>
                  
                  <td><?=date('d-m-Y',$result[$i]['to_date'])?>
                    -
                    <?=date('d-m-Y',$result[$i]['from_date'])?></td>
                    
                  <td><a href="<?=base_url()?>index.php/<?=$this->uri->rsegment(1)?>/index/<?=$result[$i]['id']?>" class="btn btn-default" >Edit</a></td>
                  
                </tr>
                
                <?php } ?>
                
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
#msg{
	color:#F00;
	font-size:16px;
}

.error{
	font-weight:bold;
	color:#F00;
}
</style>
