<!-- page heading start-->

<div class="page-heading">
            <h4>
                Fee Management 
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a>
                </li>
                <li class="active"> Fee Head</li>
            <?php  	if($this->uri->segment(3)=='Edit'){ ?>
                 <li class="active"><?=$segment['mode']?> Fee Management</li>
                 <?php } ?>
            </ul>
            
        </div>
<?php
	if($this->uri->segment(3)=='Edit'){
	$btnlable="Update";
		
	}
	else{
		
		$btnlable	=	"Insert";
		
	}
	
?>
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
		
		
		
	});		
	
	
</script>
<script>
	$(document).on('change','.cls_amount',function(e){
		var total=0;
		$('.cls_amount').each(function(index, obj){
			if($(this).val()!=''){
				total+=parseFloat($(this).val());
			}
		});	
		$('.total_val').html(total);
		$('total_val').number( true, 2 ); 
		
	});
</script>
<script>
	$(document).on('change','.install_amount',function(e){
		var total_fees = document.getElementById("total_val").innerText;
		var fees_inst = document.getElementById("total_install").innerText;
		var buttn = document.getElementById("myBtn");
		
		//alert(total_fees+"  "+fees_inst );
		var total=0;
		$('.install_amount').each(function(index, obj){
			if($(this).val()!=''){
				total+=parseFloat($(this).val());
			}
		});	
		
		//if (fees_inst != total_fees){
//			alert("1");
//            buttn.setAttribute("disabled", "disabled");
//        }else if(fees_inst >= total_fees){
//			alert("2");
//			 buttn.setAttribute("disabled", "disabled");
//		}else if(fees_inst <= total_fees){
//			alert("3");
//			 buttn.setAttribute("disabled", "disabled");
//		}
//		else{
//			alert("4");
//			buttn.removeAttribute("disabled");
//		} 
		
		
		$('.total_install').html(total);
		$('total_install').number( true, 2 ); 
		
		
	});
</script>


<link rel="stylesheet" type="text/css" href="<?php echo asset_path();?>asset/css/datepicker-custom.css" />
<script type="text/javascript" src="<?php echo asset_path();?>asset/js/bootstrap-datepicker.js"></script>
<!-- page heading end--> 


  <?php if($this->session->flashdata('show_msg')!=''){?>
  <div class="alert alert-success fade in">
    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
    <?php $flash=$this->session->flashdata('show_msg');
	  
		echo $flash['msg'];
	  
	  ?>
  </div>
  <?php } ?>
<!--body wrapper start-->
<div class="wrapper">
  <div class="row">

  
   
    <div class="col-sm-5">
  
      <section class="panel">
       <!-- <header class="panel-heading">Details 
        
       
        </header>-->
        
        <div class="panel-body">

          <div class="adv-table">
          
            <table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
              <thead>
                
              </thead>
              <tbody>
				  <tr>
					  <td>Standard</td>
					  <td><?=$standard[0]['standard_name']?></td>
				  </tr>
				 <tr>
					  <td>Year</td>
					  <td><?=$acount_yr[0]['yeanm']?></td>
				  </tr>
              </tbody>
            </table>
           
          </div>
          
          <form class="cmxform form-horizontal" id="frm" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insert_installment">
          
           <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash();?>" />
              <input type="hidden" name="standard_code" id="standard_code" value="<?=$standard[0]['standard_code']?>" />
              
          <div class="adv-table">
          
            <table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
              <thead>
				  <tr><th colspan="2">Fees Installments</th></tr>
              </thead>
              <tbody>
				  <tr>
					  <td>April</td>
					  <td><input type="number" name="apr_amount" id="apr_amount" min="0" value="<?=$fee_install[0]['amount'];?>" class="form-control txt1 install_amount" required /></td>
				  </tr>
				 <tr>
					  <td>July</td>
					  <td><input type="number" name="july_amount" id="july_amount" min="0" value="<?=$fee_install[1]['amount'];?>" class="form-control txt1 install_amount" required/></td>
				  </tr>
             	<tr>
					  <td>October</td>
					  <td><input type="number" name="oct_amount" id="oct_amount" min="0" value="<?=$fee_install[2]['amount'];?>" class="form-control txt1 install_amount" required /></td>
				  </tr>
             	<tr>
					  <td>January</td>
					  <td><input type="number" name="jan_amount" id="jan_amount" min="0" value="<?=$fee_install[3]['amount'];?>" class="form-control txt1 install_amount" required /></td>
				  </tr>
             	<tr>
					  <td>Total</td>
					  <td><label class="total_install" id="total_install">
                      <?=number_format($total_fee_install,2)?>
                    </label></td>
				  </tr>
              </tbody>
            </table>
           
          </div>
          <div class="form-group" align="center">
             <button type="submit" id="myBtn" class="btn btn-primary">
              <?=$btnlable?>
              </button>
               </div>
          </form>
        </div>
      </section>
    </div>
    
     <div class="col-sm-7">
     
      <section class="panel">
     
       <?php /*?> <header class="panel-heading"> Fee Management 
           <?=$segment['mode']?>
        </header><?php */?>
        <div class="panel-body">
      
          
           <form class="cmxform form-horizontal" id="frm" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord">
          <input class="form-control"  name="old_name" id="old_name" type="hidden" value="<?=$result[0]['head_name']?>" />

           <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
              <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
              <input type="hidden" name="eid" id="eid" 	 value="<?=$segment['eid']?>" />
              <input type="hidden" name="account_year_code" id="account_year_code" 	 value="<?=$acount_yr[0]['account_year_code']?>" />
              <input type="hidden" name="account_yr_name" id="account_yr_name" 	 value="<?=$acount_yr[0]['yeanm']?>" />
              <input type="hidden" name="standard_code" id="standard_code" 	 value="<?=$standard[0]['standard_code']?>" />
               <!--<div class="form-group ">
                 <label for="cname" class="control-label col-lg-2"><strong>Name</strong></label>
                 <div class="col-lg-8">
                  <input class="form-control"  name="name" required id="name" type="text"  value=""/>
                 
                </div>
             </div>-->
              
             <br/>
             <div class="adv-table">
          
            <table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
              <thead>
                
                <tr>
                  <th>SrNo</th>
                  <th>Fee Name</th>
                  <th>Amount</th>
                </tr>
              
              </thead>
              <tbody>
				  <?php 
					
				for($i=0;$i<count($fee_head);$i++) {
						$row=$i+1;
						$arr_amount=$this->ObjM->get_fee_amount_by_id(array('standard_code'=>$standard[0]['standard_code'],'account_year_code'=>$acount_yr[0]['account_year_code'],'eid'=>$fee_head[$i]['id']));
						
					?>
                <tr>
                  <td width="2%"><?=$row?></td>
                  <td><?=$fee_head[$i]['head_name']?></td>
                  <td><input type="number" name="amount[]" id="amount[]" min="0" value="<?=$arr_amount[0]['amount']?>" class="form-control txt1 cls_amount" /></td>
                </tr>
                <?php }  ?>
                <tr>
                  <td></td>
                  <td>Total</td>
                  <td><label class="total_val" id="total_val">
                      <?=number_format($total_fee,2)?>
                    </label></td>
                </tr>
              </tbody>
            </table>
           
          </div>
             
             
          <div class="form-group" align="center">
             <button type="submit" class="btn btn-primary">
              <?=$btnlable?>
              </button>
              <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>">
              <button class="btn btn-default" type="button">Cancel</button>
              </a> </div>
          </form>
    
         
        </div>
      </section>
   
    <!-------End col-sm-12------------>
  
    </div>
    
    <!----col-sm-12------->
  </div><!----row------->
</div>
<!--body wrapper end--> 
<script>
	$(document).ready(function(e) {
		
		////////////
			$("#frm").validate({
				rules: {
					name: "required",
					
				},
				messages: {
					name: "Name is required",
				
				}
        	});
		 		///////////
  		
    });
</script> 
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
