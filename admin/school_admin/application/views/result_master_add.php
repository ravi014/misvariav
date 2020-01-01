<!-- page heading start-->
<script src="<?php echo asset_path();?>asset/bootstrap-timepicker.min.js"></script>
<script src="<?php echo asset_path();?>asset/moment.js"></script>
<div class="page-heading">
            <h4>
               RESULT
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li  class="active">Result</li>
              
            </ul>
            
        </div>
<?php
	if($this->uri->segment(3)!=''){
		$btn_style='';
		$defoult_call=true;	
	}
	else{
		$btn_style='style="display:none;"';
	}
?>

<script type="text/javascript" charset="utf-8">//
	$(document).ready(function() {
		
		
			
			$(document).on('change', '#standard_code', function (e) {
				var eid = $('#standard_code').val();
				var url='<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_exm_det/'+eid;
				
				//alert(url);
				$.ajax({url:url,
				success:function(result){	
				//alert(result);
					var data = $.parseJSON(result);
			$('#division_code').html(data['division_code']);
			$('#subject_code').html(data['subject_code']);
			$('#exam_type_code').html(data['exam_type_code']);
			
				}});
		});
			

		$(document).on('change', '#year', function (e) {
				var eid = $('#year').val();
				var url='<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_standard/'+eid;
				$.ajax({url:url,
				success:function(result){	 	
				
					$("#standard_code").html(result);
                }});
		});
		
		
	
		
		
	 	$(document).on('change','#subject_code', function (e) {
			
			var subject=$(this).val();
			var standard= document.getElementById("standard_code").value;
			var division= document.getElementById("division_code").value;
			var exam= document.getElementById("exam_type_code").value;
			var year= document.getElementById("year").value;
			
				
		
			if(subject!=''){ $('.btn_submit').show(500);
		
			$("#main-table tbody").html('<tr><td colspan="8"><h3 class="clsmsg">Loading..</h3></td></tr>');
			var url="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_result/"+standard+"/"+division+"/"+subject+"/"+exam+"/"+year;
	//	alert(url);
			$.ajax({url:url,success:function(result){
				if(result!=' ') {
				 	$("#main-table tbody").html(result);
				
					
					}else{
							$("#main-table tbody").html(result);
					
				}
				$('.timepicker').timepicker({
                		template: false,
                		showInputs: false,
                		minuteStep: 5
            		});
			}});
			}
			else{$('.btn_submit').hide(500);
			
			$("#main-table tbody").html('<tr><td colspan="8"><h3 class="clsmsg">**SELECT SUBJECT**</h3></td></tr>');}
     	 }); 
		 	 
	});	
	

	
</script>

<script>
function gettt1(id){


var mk= $("#marks"+id).val();	
var mi= $("#min").val();
var ma= $("#max").val();

//alert(mk);
//alert(mi);
//alert(ma);
 if(mk > ma || mk < mi) {
      
	   alert("Please Enter marks between " + mi + " and " + ma);
         document.getElementById("marks"+id).focus();
         return false;
	   
	     
    }
		
}
</script>
<!--body wrapper start-->
<div class="wrapper">
  <div class="row">
 
    <div class="col-sm-12">
  
      <section class="panel">
        <header class="panel-heading">
	Result
    
        </header>
        
        <div class="panel-body">

<!------------------->
<form role="form" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" id="form1" method="post" class="form-horizontal form-groups-bordered validate">
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
 
 
  <?php if($this->session->flashdata('show_msg')!=''){?>
  <div class="alert alert-success fade in">
    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
    <?=$this->session->flashdata('show_msg');?>
  </div>
  <?php } ?>
 
          <div class="col-md-6"> 
               <!-------------->
       <div class="form-group">
              <label class="col-sm-4 control-label">Year</label>
              <div class="col-sm-5">
                <select id="year" name="year" class="ddl_list">
                  <option value="">---Select---</option>
                  <?php
                  	for($i=0;$i<count($year);$i++){
						$sel=($year[$i]['account_year_code']==$this->uri->segment(7)) ? "selected='selected'" : "";
						echo'<option '.$sel.'  '.set_select('year', ''.$year[$i]['account_year_code'].'').' value="'.$year[$i]['account_year_code'].'">'.$year[$i]['yeanm'].'</option>';
					}
				  ?>
                </select>
                         <?php echo form_error('year', '<p class="error">', '</p>'); ?>
 
              </div>
            </div>
      <div class="form-group">
        <label class="col-sm-4 control-label">Standard</label>
        <div class="col-md-5">
            <select id="standard_code" name="standard_code" class="ddl_list">
            	<option value="">--Select--</option>
            	<?php
            		for($i=0;$i<count($standard);$i++){
            			$sel=($this->uri->segment(3)==$standard[$i]['standard_code'] ? "selected='selected'" : "");
            			echo  "<option ".$sel." ".set_select('standard_code', ''.$standard[$i]['standard_code'].'')." value='".$standard[$i]['standard_code']."'>".$standard[$i]['standard_name']."</option>";	
            		}
            ?>
            </select>
                <?php echo form_error('standard_code', '<p class="error">', '</p>'); ?>

        </div>
       </div>
        
       <div class="form-group">
              <label class="col-sm-4 control-label">Exam</label>
              <div class="col-sm-5">
                <select id="exam_type_code" name="exam_type_code" class="ddl_list">
                  <option value="">---Select---</option>
                  <?php
                  	for($i=0;$i<count($exam_type);$i++){
						$sel=($exam_type[$i]['exam_type_code']==$this->uri->segment(6)) ? "selected='selected'" : "";
						echo'<option '.$sel.'  '.set_select('exam_type_code', ''.$exam_type[$i]['exam_type_code'].'').'  value="'.$exam_type[$i]['exam_type_code'].'">'.$exam_type[$i]['exam_title'].'</option>';
					}
				  ?>
                </select>
                         <?php echo form_error('exam_type_code', '<p class="error">', '</p>'); ?>
 
              </div>
            </div>
        <!------------->
       
        
         <div class="form-group">
              <label class="col-sm-4 control-label">Division</label>
              <div class="col-sm-5">
                <select id="division_code" name="division_code" class="ddl_list">
                <?php if(count($division)==0){?>
                
                  <option value="0">---NO DIVISION---</option>
                  
                  
                <?php } else{ ?>
                  <option value="">---All---</option>
                  <?php
                  	for($i=0;$i<count($division);$i++){
						$sel=($division[$i]['id']==$this->uri->segment(4)) ? "selected='selected'" : "";
						echo'<option '.$sel.' '.set_select('division_code', ''.$division[$i]['id'].'').' value="'.$division[$i]['id'].'">'.$division[$i]['name'].'</option>';
					}
				}?>
                 <?php echo form_error('division_code', '<p class="error">', '</p>'); ?>

                </select>
              </div>
            </div>
            
            
            
        <div class="form-group">
              <label class="col-sm-4 control-label">Subject</label>
              <div class="col-sm-5">
                <select id="subject_code" name="subject_code" class="ddl_list">
                  <option value="">---All---</option>
                  <?php
                  	for($i=0;$i<count($subject);$i++){
						$sel=($subject[$i]['subject_code']==$this->uri->segment(5)) ? "selected='selected'" : "";
						echo'<option '.$sel.' '.set_select('subject_code', ''.$subject[$i]['subject_code'].'').' value="'.$subject[$i]['subject_code'].'">'.$subject[$i]['subject_name'].'</option>';
					}
				  ?>
                </select>
                      <?php echo form_error('subject_code', '<p class="error">', '</p>'); ?>
    
              </div>
            </div>
            
       
        
         <br/>
                     <div class="form-group">
                <div class="col-sm-10" align="center">
          
                 <input type="submit" value="Save All" class="cpl btn btn-success btn_submit" <?=$btn_style?> />
          
      
              </div>
            </div>
        
     </div>
        </div>
      </div>
      <!---panel-body-----> 
    </div>
 

 <div class="adv-table">	

 <table class="display table table-bordered table-striped cus_tbl_css" id="main-table" >
   	<thead>
    	<tr>
    	<th >Sr.No.</th>
        <th>Name</th>
        <th  >Marks</th>
      <tr>
    </thead>
    <tbody>
    	<?= $html ?>
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


<script>
	$(document).ready(function(e) {
		
		////////////
			$("#form1").validate({
				rules: {
					year: "required",
					standard_code: "required",
					exam_type_code: "required",
					division_code: "required",
					subject_code: "required",
					
					
				},
				messages: {
					year: "Year is required",
					standard_code: "Standard is required",
					exam_type_code: "Exam is required",
					division_code: "Division is required",
					subject_code: " Subject is required",
		
				}
        	});
		 		///////////
 
    });
</script> 
<style>
.sel2{
	width: 100%;
	height: 25px;
	background: none;
	border: #999 solid 1px;
	margin-top:10px;
}
select option {
	padding: 3px;
}
.ddl_list {
	width: 250px;
	height: 30px;
	font-weight: bold;
	border: #999 solid 1px;
}
.disabled_tr{
	background-color:#CCC !important;
}
.txt2{
	width:36%;
	height: 30px;
	border: #999 solid 1px;
	font-size:11px;
}
.txt3{
	width:50%;
	height: 30px;
	border: #999 solid 1px;
	font-size:11px;
}
.table-bordered > tbody > tr > td{
	border-collapse:separate !important; 
	border-spacing:5em !important;
}
.separate{
	padding:1px !important;
}
.clsmsg{
	color:#F00;
	text-align:center;
}
	
.error{
	font-weight:bold;
	color:#F00;
}
</style>