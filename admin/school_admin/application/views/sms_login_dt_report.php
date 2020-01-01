<!-- page heading start-->

<div class="page-heading">
            <h4>
            LOGIN DETAIL REPORT
            </h4>
            <ul class="breadcrumb">
                <li> <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a> </li>
                <li class="active">Login Details Report</li>
          </ul>
            
        </div>
<script>
	$(document).ready(function(e) {
        $(document).on('change','#standard_code',function(e){
		
		var oTable = $('#data-table').dataTable();
  		oTable.fnDestroy();
		
			var url='<?=base_url()?>index.php/<?=$this->uri->segment(1)?>/get_send_report/'+$(this).val();
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
		});
    });
</script>


<!---------Filter------------>
<form role="form" action="#" id="form1" method="post" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
  <div class="wrapper">
  <div class="row">
   <div class="col-sm-12">
      <section class="panel">
        <header class="panel-heading">Send Login Details     </header>
        <div class="panel-body">
    
        <div class=" form">
        <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
     
   	   <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
   
          
                    <!-------------->
            <div class="form-group">
              <label class="col-sm-2 control-label">Standard</label>
              <div class="col-sm-4">
                <select id="standard_code" name="standard_code" class="form-control txtselect">
                  <option value="">---Select---</option>
                  <?php
                  	for($i=0;$i<count($standard);$i++){
						$sel=($standard[$i]['id']==$standard_seleced) ? "selected='selected'" : "";
						echo'<option '.$sel.' value="'.$standard[$i]['id'].'">'.$standard[$i]['name'].'</option>';
					}
				  ?>
                </select>
              </div>
            </div>
            <!-------------->
            
          
       </div>            
   </div>
      
      </section>
</div>
</div>

<!-----------Filter---------->

  <div class="row">
 
    <div class="col-sm-12">
  
      <section class="panel">
        <header class="panel-heading">SMS
      </header>
        
        <div class="panel-body">

          <div class="adv-table">
          
            <table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
              <thead>
                <tr >
            <th width="10%">Sr. No.</th>
       		<th>Name</th>
            <th>Message Status</th>
            <th>Date</th>
            <th>Message</th>
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

<!--body wrapper end--> 

<style>
	.proccsing_div{
		color:#F00;
		font-weight:bold;
	}
	.dataTables_wrapper{
		border:none;
	}
</style>
