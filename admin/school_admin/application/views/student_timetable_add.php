<!-- page heading start-->
<script src="<?php echo asset_path();?>asset/bootstrap-timepicker.min.js"></script>
<script src="<?php echo asset_path();?>asset/moment.js"></script>
<div class="page-heading">
            <h4>
                TIME TABLE
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li  class="active">Time Table</li>
              
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
		var url="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_time_tbl/<?=$this->uri->segment(3)?>";
		
		$.ajax({url:url,success:function(result){
			$("#main-table tbody").html(result);
				$('.timepicker').timepicker({
					template: false,
					showInputs: false,
					minuteStep: 5
				});
		}});
		
	  $(document).on('change', '#standard_code', function (e) {
				var eid = $('#standard_code').val();
				var url='<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_division_by_standard/'+eid;
				$.ajax({url:url,
				success:function(result){	
				
				if(result=='0') {
					$("#division_code").html("<option value='0'>--No Division--</option>");
					
				var value= $('#standard_code').val();
				var value2='';
			if(value!=''){ 
			$('.btn_submit').show(500);
			}
			else{
				$('.btn_submit').hide(500);
				}
			$("#main-table tbody").html('<tr><td colspan="8"><h3 class="clsmsg">Loading..</h3></td></tr>');
			var url1="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_time_tbl/"+value+"/"+value2;
			$.ajax({url:url1,success:function(result1){
			 	$("#main-table tbody").html(result1);
				$('.timepicker').timepicker({
                		template: false,
                		showInputs: false,
                		minuteStep: 5
            		});
			}});
				
			}	else{
				
					$("#division_code").html(result);
						$('.btn_submit').hide(500);
						$("#main-table tbody").html('');
					}
                }});
				
		
				
		});
		
	 	$(document).on('change','#division_code', function (e) {
			var value2=$(this).val();
			var value= document.getElementById("standard_code").value;
			if(value!='' && value2!=''){ $('.btn_submit').show(500);
			
			$("#main-table tbody").html('<tr><td colspan="8"><h3 class="clsmsg">Loading..</h3></td></tr>');
			
			var url="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/get_time_tbl/"+value+"/"+value2;
			$.ajax({url:url,success:function(result){
			 	$("#main-table tbody").html(result);
				$('.timepicker').timepicker({
                		template: false,
                		showInputs: false,
                		minuteStep: 5
            		});
			}});
			
			}
			else{ 
			$('.btn_submit').hide();
			$("#main-table tbody").html('');
			alert("Select Division");
			
			}
			
     	 });
		 	 
	});	
	 $(document).on('keydown','.txtminute', function (event) {	
			if(event.shiftKey)
				return false;
				var keyCode = event.which;
				if(!((keyCode > 47 && keyCode < 58) ||  (keyCode > 95 && keyCode < 106) ||  keyCode == 08)){
				event.preventDefault();
			    }
	});
	
	$(document).on('change','#recess_status', function (e) {
		var val=$(this).val();
		if(val=='Y'){
			$(this).closest('td').find('.recess_div').show();
		}
		else{
			$(this).closest('td').find('.recess_div').hide();
		}
		
	});
	
	$(document).on('change','.time_re_set', function (e) {
		var day_no=$(this).closest('td').find('#day_no').val();
		var clsnm='td_'+day_no+'';
		
		$('.'+clsnm).each(function(e) {
			var totime=$(this).find('#totime').val();
			var lec_minute=$(this).find('.lec_minute').val();
			var recess_status=$(this).find('#recess_status').val();
			var lec_no=$(this).find('#lec_no').val();
			lec_no=parseInt(lec_no)+1;
			if(totime!='' && lec_minute!=''){
				var time_get=moment(totime, 'h:mm A').add('minutes', lec_minute).format('h:mm A');
				$(this).find('#fromtime').val(time_get);
				$('#'+clsnm+'_'+lec_no).find('#totime').val(time_get);
				
				if(recess_status=='Y'){
					$(this).find('#to_recess').val(time_get);
					var rec_minute=$(this).find('.rec_minute').val();
					var time_get=moment(time_get, 'h:mm A').add('minutes', rec_minute).format('h:mm A');
					$(this).find('#from_recess').val(time_get);
					$('#'+clsnm+'_'+lec_no).find('#totime').val(time_get);
				}
			}
			else{
				$(this).find('.lec_minute').val('');
			}
			
			
		});
	});
	
	

	
	
</script>
<!--body wrapper start-->
<div class="wrapper">
  <div class="row">
 
    <div class="col-sm-12">
  
      <section class="panel">
        <header class="panel-heading">
	TIME TABLE
    
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
        <label class="col-sm-4 control-label">Standard</label>
        <div class="col-md-5">
            <select id="standard_code" name="standard_code" class="form-control txtselect">
            	<option value="">--Select--</option>
            	<?php
            		for($i=0;$i<count($standard);$i++){
            			$sel=($this->uri->segment(3)==$standard[$i]['standard_code'] ? "selected='selected'" : "");
            			echo  "<option ".$sel." value='".$standard[$i]['standard_code']."'>".$standard[$i]['standard_name']."</option>";	
            		}
            ?>
            </select>
         
        </div>
       </div>
      
        <div class="form-group">
              <label class="col-sm-4 control-label">Division</label>
              <div class="col-sm-5">
                <select id="division_code" name="division_code" class="form-control txtselect">
             <?php if($this->uri->segment(4)==0){ ?>
              <option value="0">---NO DIVISION---</option>
			 <?php } else{?>
                  <option value="">---All---</option>
            	<?php
            		for($i=0;$i<count($division);$i++){
            			$sel=($this->uri->segment(4)==$division[$i]['id'] ? "selected='selected'" : "");
            			echo  "<option ".$sel." value='".$division[$i]['id']."'>".$division[$i]['name']."</option>";	
            		} }
            ?>
                </select>
                </div>
                </div>
                <br/>
                     <div class="form-group">
                <div class="col-sm-10" align="center">
          
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
<?php
	$day = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');	
?>
  <table class="display table table-bordered table-striped cus_tbl_css" id="main-table" width="100%">
   	<thead>
    	<tr>
    	<th></th>
        <?php for($i=0;$i<count($day);$i++){ 
			echo '<th>'.$day[$i].'</th>';
		}?>
        <tr>
    </thead>
    <tbody>
    	<tr><td colspan="8"><h3 class="clsmsg">Loading..</h3></td></tr>
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
	width:22%;
	height: 30px;
	border: #999 solid 1px;
	font-size:11px;
}
.table-bordered > tbody > tr > td{
	border-collapse:separate !important; 
	border-spacing:5em !important;
}
.septer{
	padding:2px !important;
}
.clsmsg{
	color:#F00;
	text-align:center;
}
input[readonly='readonly'] {
	background-color:#EDE1E1;
	cursor:no-drop;
}
</style>