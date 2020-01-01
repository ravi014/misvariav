<!-- page heading start-->

<div class="page-heading">
            <h4>
        SUBJECT
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a>
                </li>
                <li class="active"> Subject</li>
           
            </ul>
            
        </div>
<?php
	if($this->uri->segment(4)!=''){
		$btnlable	=	"Update";
	
	}
	else{
			$btnlable	=	"Insert";
		
		}
?>
<?php
	if($this->uri->segment(4)==''){
?>
<script>
	$(document).on('change','#standard_code',function(e){
		var value=$(this).val();
		var url='<?=base_url()?>index.php/<?=$this->uri->segment(1)?>/view/'+value;
		window.location.href=url;
	});
</script>
<?php } ?>
 
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
	
	
	function list_data(){
		
		var oTable = $('#data-table').dataTable();
  		oTable.fnDestroy();
		
		var url = '<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/listing/<?=$this->uri->segment(3)?>';
		$.ajax({url:url,success:function(result){
				
			$('#data-table').dataTable().fnClearTable();
				$('#data-table tbody').html(result);
				$('#data-table').dataTable( {
        			"bProcessing": true,
					"iDisplayLength": 25,
					"responsive": true,
					"bDestroy": true
    			});		 	
            }});
       
	}//**Listing**//
	
</script>
	
	
<link rel="stylesheet" type="text/css" href="<?php echo asset_path();?>asset/css/datepicker-custom.css" />
<script type="text/javascript" src="<?php echo asset_path();?>asset/js/bootstrap-datepicker.js"></script>
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
     
        <header class="panel-heading">Subject Add
        </header>
        <div class="panel-body">
      
          <div class=" form">
           <form class="cmxform form-horizontal" id="frm" method="post" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/insertrecord" >
          	 <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
			 <input type="hidden" name="standard_code" id="standard_code" 	value="<?=$result[0]['standard_code']?>" />
             <input type="hidden" name="eid" id="eid" 	 value="<?=$this->uri->segment(3)?>" />
                          <input type="hidden" name="sc" id="sc" 	 value="<?=$this->uri->segment(4)?>" />

               <div class="form-group ">
                 <label for="cname" class="control-label col-lg-4"><strong> Standard</strong></label>
                 <div class="col-lg-6">

<?php
	if($this->uri->segment(4)==''){
?>
                <select id="standard_code" name="standard_code" class="form-control txtselect" <?= $rd ?>>
                  <option value="">---Select---</option>
                  <?php
                  	for($i=0;$i<count($standard);$i++){
						$sel=($this->uri->segment(3)==$standard[$i]['standard_code']) ? "selected='selected'" : "";
						echo'<option '.$sel.' value="'.$standard[$i]['standard_code'].'">'.$standard[$i]['standard_name'].'</option>';
					}
				  ?>
                   
                </select>
  <?php } else{ ?>
               <input type="text"   readonly class="form-control txtselect"	 value="<?=$result1[0]['standard_name']?>" />

  <?php } ?>
               <?php echo form_error('standard_code', '<p class="error">', '</p>'); ?>
                </div>
                
                 </div>
               
               <?php if($this->uri->segment(3)!=''){?>
         
         <div class="form-group">
            <label class="col-lg-4 control-label"><strong> Subject ID</strong></label>
            <div class="col-sm-6">
              <input type="text" name="subject_id" id="subject_id" value="<?php echo  set_value('subject_id',''.$result[0]['subject_id'].''); ?>" class="form-control" />
             <?php echo form_error('subject_id', '<p class="error">', '</p>'); ?>
            </div>
          </div>
          
              <div class="form-group">
            <label class="col-lg-4 control-label"><strong>Subject Name</strong></label>
            <div class="col-sm-6">
              <input type="text" name="subject_name" id="subject_name" value="<?php echo  set_value('subject_name',''.$result[0]['subject_name'].''); ?>" class="form-control" />
             <?php echo form_error('subject_name', '<p class="error">', '</p>'); ?>
            </div>
          </div>
        <?php } ?>
             <br/>
          <div class="form-group" align="center">
             <button type="submit" class="btn btn-primary" >
              <?=$btnlable?>
              </button>
              <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>/view">
              <button class="btn btn-default" type="button">Cancel</button>
              </a> </div>
          </form>
    
          </div>
        </div>
      </section>
   
    <!-------End col-sm-12------------>
  
    </div>
    <div class="col-sm-7">
  
      <section class="panel">
        <header class="panel-heading">Subject List 
        
       
        </header>
        
        <div class="panel-body">

          <div class="adv-table">
          
            <table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
              <thead>
                <tr >
                  <th width="7%">No</th>	
                    <th width="20%">Standard</th>
                     <th width="20%">Subject Id</th>
                     <th width="50%">Subject name</th>
                  <th width="10%">Opration</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
           
          </div>
        </div>
      </section>
    </div><!----col-sm-12------->
  </div><!----row------->
</div>
<!--body wrapper end--> 
<script>
	$(document).ready(function(e) {
		
		////////////
			$("#frm").validate({
				rules: {
					subject_name: "required",
					standard_code:"required";
				},
				messages: {
					subject_name: "Subject Name is required",
				standard_code: "Standard Name is required",
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
