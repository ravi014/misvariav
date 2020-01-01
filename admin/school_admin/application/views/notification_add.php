<!-- page heading start-->

<div class="page-heading">
            <h4>
                NOTIFICATION 
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
                <li > <a href="<?php echo base_url(); ?>index.php/sms">Mobile Notification</a></li>
               <li class="active">Notification Send</li>
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
		
		$(document).on('submit','#form1',function(e){ 
				var receiver_code=$('#receiver_code').val();
				var noti_title=$('#noti_title').val();
				var noti_desc=$('#noti_desc').val();
				var standard_code=$('#standard_code').val();
				if(receiver_code==''){
					alert('Select Receiver Code');
					$('#receiver_code').focus();
					return false;
				}
				
				if(noti_title==''){
					alert('Enter Notification Title');
					$('#noti_title').focus();
					return false;
				}
				
				if(noti_desc==''){
					alert('Enter Notification Description');
					$('#noti_desc').focus();
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
			
			
				if($('#noti_with_sms').is(':checked')){
					var msg='Notification With SMS ?';		
				}	
				else{
					var msg='Are You Sure ?';		
				}
				
				var con=confirm(msg);
				if(!con){
					return false;
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
			$('.data-table-div').html('<h2 class="show_msg">Notification Send to All Students</h2>');
			return;	
		}
		if(receiver_code=='Selected_Standard'){
			$('.data-table-div').html('<h2 class="show_msg">Notification Send to Selected Standard</h2>');
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

 <?php 
		   if(count($url)==0) {
		    ?>
    	
        <div class="wrapper">
  <div class="row">
 
    <div class="col-sm-12">
  
      <section class="panel">
        <header class="panel-heading">NOTIFICATION
        
       
        </header>
        
        <div class="panel-body">

        <div >
        <p id="msg">You must have to set sms gateway url to send Notification from the system. </p>
              <a href="<?=base_url();?>index.php/sms_gateway/addnew/Add" class="addnewlink"><button class="btn btn-primary"><i class="fa fa-cog"></i> SET SMS GATEWAY</button></a>
            </div>
     
      <?php }else{ ?>
<form role="form" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" id="form1" method="post" class="form-horizontal form-groups-bordered validate">
  <div class="wrapper">
  <div class="row">
   <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading"> NOTIFICATION SEND      </header>
        <div class="panel-body">
    
        <div class=" form">
        <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
     
   	   <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
   
           <div class="form-group">
              <label class="col-sm-2 control-label">Select Receiver <span class="req">*</span></label>
              <div class="col-sm-4">
                <select id="receiver_code" name="receiver_code" class="form-control txtselect" required>
                  <option value="">Select</option>
                  <option value="All_Student">All Student</option>
                  <option value="Selected_Standard">Selected Standard</option>
                  <option value="Selected_Student">Selected Student</option>
               </select>
             <?php echo form_error('receiver_code', '<p class="error">', '</p>'); ?>

              </div>
          
             <label class="col-sm-2 control-label">Notification Title <span class="req">*</span></label>
                      <div class="col-sm-4">
                        <input type="text" name="noti_title" id="noti_title" class="form-control"  required="required" />
                      </div>
             <?php echo form_error('noti_title', '<p class="error">', '</p>'); ?>

            
            </div>
            <div class="form-group">
               
                <div class="student_div dis-none">
              
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
               
                    
                      <label class="col-sm-2 control-label">Notification <span class="req">*</span></label>
                      <div class="col-sm-4">
                        <textarea class="form-control" id="noti_desc" name="noti_desc" required></textarea>
                     <?php echo form_error('noti_desc', '<p class="error">', '</p>'); ?>
                     </div>
           	 	</div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Send Normally SMS</label>
                <div class="col-sm-4">
                  	<input type="checkbox" name="noti_with_sms" id="noti_with_sms" value="Y" style="margin-top:8px;" /> <label class="text-cls">Send Normally SMS If Application Is Not Install</label>
                </div>
              </div>
           
            
             <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-4">
              <button type="submit" class="btn btn-success">Send Circular</button>
             
          </div>
        </div>
            
           
         
          		 
         </div>            
   </div>
      
      </section>
</div>
</div>

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-gradient" data-collapsed="0"> 
        <!-- panel head -->
        <div class="panel-heading">
          <div class="panel-title">List
          </div>
          <div class="panel-options"> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> </div>
        </div>
        
        <!-- panel body -->
        <div class="panel-body">
         
            <!-------------->
           	<div class="data-table-div"></div>
            
            <!--------------> 
        
        </div>
        <!---panel-body-----> 
      </div>
    </div>
  </div>
  </div>
</form>
<?php } ?>
<style>
	.text-cls{
		color:#F00;
		font-weight:bold;
	}
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
					noti_title: "required",
					noti_desc: "required",
				},
				messages: {
					receiver_code: "Receiver is required",
				noti_desc: "Notification is required",
				noti_title: "Notification title is required",
				
		
				}
        	});
		 		///////////
 
    });
</script> 