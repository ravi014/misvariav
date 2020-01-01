<!-- page heading start-->

<div class="page-heading">
            <h4>
                SMS 
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li > <a href="<?php echo base_url(); ?>index.php/sms">Send normal sms</a></li>
               <li class="active">SMS Send</li>
            </ul>
            
        </div>

<script>
	$(document).ready(function(e) {
		
        $(document).on('change','#receiver_code',function(e){ 
			var eid=$(this).val();
			if(eid=='Selected_Standard' || eid=='Selected_Student'){
				$('.student_div').removeClass('dis-none');
			}else{
				$('.student_div').addClass('dis-none');
			}
			get_data_list();
		});
		
		
		$(document).on('change','#standard_code',function(e){ 
			
			get_data_list();	
		});
		$(document).on('change','#checkall',function(e){ 
			$('.endcode').each( function( i , e ) {
				$(this).prop( "checked", $('#checkall').is(':checked') );
			 });
		});
		$(document).on('keyup', '.numbersOnly', function (e) {
			this.value = this.value.replace(/[^0-9\.]/g,''); 
		});
		
		$(document).on('submit','#form1',function(e){ 
				var receiver_code=$('#receiver_code').val();
				var msg_desc=$('#msg_desc').val();
				var standard_code=$('#standard_code').val();
				if(receiver_code==''){
					alert('Select Receiver Code');
					$('#receiver_code').focus();
					return false;
				}
				
				
				
				if(msg_desc==''){
					alert('Enter SMS Description');
					$('#msg_desc').focus();
					return false;
				}
				
				
				if(receiver_code=='Selected_Standard'){
					if(standard_code==''){
						alert('Select Standard');
						$('#standard_code').focus();
						return false;
					}	
				}
				
				if(receiver_code=='Selected_Student'){
					if(standard_code==''){
						alert('Select Standard');
						$('#standard_code').focus();
						return false;
					}	
					if(!check_selected_list()){
						alert('Please Select Record');
						return false;
					}
				}
			
				if(receiver_code=='Other'){
					var other_no=$('#other_no').val();
					if(other_no==''){
						alert('Enter Mobile Number');
						$('#other_no').focus();
						return false;
					}
					if(other_no.length!=10){
						alert('Enter Valid Number');
						$('#other_no').focus();
						return false;
					}
					if (isNaN( $("#other_no").val() )) {
    					$('#other_no').focus();
						return false;
					}
				}
				
				
		});
		
		
    });
	
	function check_selected_list(){
		var tot_select=false;
		$('.endcode').each( function( i , e ) {
			if($(this).is(':checked')){
				tot_select=true;
			}
		});
		return tot_select;
	}
	
	function get_data_list()
	{
		var receiver_code=$('#receiver_code').val();
		var standard_code=$('#standard_code').val();
		
		if(receiver_code=='All_Student'){
			$('.data-table-div').html('<h2 class="show_msg">SMS Send to All Students</h2>');
			return;	
		}
		if(receiver_code=='Selected_Standard'){
			$('.data-table-div').html('<h2 class="show_msg">SMS Send to Selected Standard</h2>');
			return;	
		}
	
		$('.data-table-div').html('<h2 class="show_msg">loading</h2>');
		
		var url='<?=base_url()?>index.php/<?=$this->uri->segment(1)?>/get_data_list/'+receiver_code+'/'+standard_code;
		$.ajax({url:url,
		success:function(result){	 
		
			$('.data-table-div').html(result);
		}});
	}
	
	 
</script>

<!-- page heading end-->


 <?php 
		   if(count($url)==0) {
		    ?>
    	
        <div class="wrapper">
  <div class="row">
 
    <div class="col-sm-12">
  
      <section class="panel">
        <header class="panel-heading">SMS
        
       
        </header>
        
        <div class="panel-body">

        <div >
        <p id="msg">You must have to set sms gateway url to send sms from the system. </p>
              <a href="<?=base_url();?>index.php/sms_gateway/addnew/Add" class="addnewlink"><button class="btn btn-primary"><i class="fa fa-cog"></i> SET SMS GATEWAY</button></a>
            </div>
     
      <?php }else{ ?>
      <form role="form" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" id="form1" method="post" class="form-horizontal form-groups-bordered validate">

<div class="wrapper">
  <div class="row">
   <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading"> SMS Send      </header>
        <div class="panel-body">
    
        <div class=" form">
        <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
     
   	   <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
   
          
            <div class="form-group ">
     
            <label class="col-sm-2 control-label">Select Receiver <span class="req">*</span></label>
              <div class="col-sm-4">
                <select id="receiver_code" name="receiver_code" class="form-control txtselect">
                  <option value="">Select</option>
                  <option value="All_Student">All Student</option>
                  <option value="Selected_Standard">Selected Standard</option>
                  <option value="Selected_Student">Selected Student</option>
                 <option value="Other">Other</option>
                </select>
                    <?php echo form_error('receiver_code', '<p class="error">', '</p>'); ?>
        
              </div>
           </div>
            <div class="student_div dis-none">
              <div class="form-group">
                <label class="col-sm-2 control-label">Standard</label>
                <div class="col-sm-4">
                  <select id="standard_code" name="standard_code" class="form-control txtselect">
                    <option value="">---All Student---</option>
                    <?php
                  	for($i=0;$i<count($standard);$i++){
						$sel=($standard[$i]['id']==$standard_seleced) ? "selected='selected'" : "";
						echo'<option '.$sel.' value="'.$standard[$i]['id'].'">'.$standard[$i]['name'].'</option>';
					}
				  ?>
                  </select>
                </div>
              </div>
            </div>
             
          
                 <div class="form-group">
                      <label class="col-sm-2 control-label">Message <span class="req">*</span></label>
                      <div class="col-sm-4">
                        <textarea class="form-control" id="msg_desc" name="msg_desc" rows="4"></textarea>
                     <?php echo form_error('msg_desc', '<p class="error">', '</p>'); ?>

                      </div>
           	 	</div>
      
          <div class="form-group">
            <div class="col-sm-6" align="center">
              <button type="submit" class="btn btn-success">Send SMS</button>
             
          </div>
        </div>
          
          
 </div>            
   </div>
      
      </section>
</div>
</div>

    <!-------End col-sm-12------------>
  
   <div class="row">
   <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading">List 
        
       </header>
        
        <div class="panel-body">

          <div class="adv-table">
          
     <!-------------->
           	<div class="data-table-div"></div>
            
            <!--------------> 
        
          </div>
        </div>
      </section>
  </div>  
  </div>
  <!----row------->
</div>
<!--body wrapper end--> 

</form> 
 <?php } ?>

<style>
	.dis-none{
		display:none;
	}
	.show_msg{
		text-align:center;
		font-size:16px;
		color:#F00;
	}
	#noti_desc{
		height:85px;
		resize:none;
	}
	.req{
		color:#F00;
	}
	#other_no{
		width:200px;
		border:#CCC solid 1px;
		padding:2px;
	}
	.cls_msg{
		color:#B15252;
	}

.error{
	font-weight:bold;
	color:#F00;
}
#msg{
	color:#F00;
	font-size:16px;
}
</style>

<script>
	$(document).ready(function(e) {
		
		////////////
			$("#form1").validate({
				rules: {
					receiver_code: "required",
					
					msg_desc: "required",
				},
				messages: {
					receiver_code: "Receiver is required",
				msg_desc: "Message is required",
				
		
				}
        	});
		 		///////////
 
    });
</script> 