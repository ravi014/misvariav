<!-- page heading start-->

<div class="page-heading">
            <h4>
                 
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a>
                </li>
                <li>Website Management</li>
                <li class="active">CMS Page</li>
            </ul>
            
        </div>
<script type="text/javascript" charset="utf-8">//
	$(document).ready(function() {
		
		var oTable = $('#data-table').dataTable( {
					"bProcessing": true,
               		 sPaginationType: "full_numbers",
					"sAjaxSource": '<?php echo base_url();?>index.php/cms_page/listing',
					"iDisplayLength": 25,
  					"bDestroy": true
		});
  		
		//list_data();
		<!---------This Method is use for delete record-------------->
		
		
		$(document).on('click', '.delrcd', function (e) {
			e.preventDefault();
			var con=confirm('Are Your Sure You Want To Delete');
			if(!con){
				return false;
			}
			var url = $(this).attr('value');
			$.ajax({url:url,success:function(result){
				
					var oTable = $('#data-table').dataTable( { 
						"bProcessing": true,sPaginationType: "full_numbers","sAjaxSource": '<?php echo base_url();?>index.php/cms_page/listing',"iDisplayLength": 25,"bDestroy": true
			  		});
					 	
            }});
		});
		
		<!---------This Method is use for change status-------------->
		
		$(document).on('click', '.statuschange', function (e) {
			e.preventDefault();
			var url = $(this).attr('value');
			$.ajax({url:url,success:function(result){
					var oTable = $('#data-table').dataTable( { 
						"bProcessing": true,sPaginationType: "full_numbers","sAjaxSource": '<?php echo base_url();?>index.php/cms_page/listing',"iDisplayLength": 25,"bDestroy": true
			  		});	 	
            }});
		});
		
	
	
	//function list_data(){
//		
//		var oTable = $('#data-table').dataTable();
//  		oTable.fnDestroy();
//		
//		var url = '<?php echo base_url();?>index.php/announcement/listing';
//		alert(url);
//		$.ajax({url:url,success:function(result){
//				
//			$('#data-table').dataTable().fnClearTable();
//				$('#data-table tbody').html(result);
//				$('#data-table').dataTable( {
//        			"bProcessing": true,
//					"iDisplayLength": 25,
//					"responsive": true,
//					"bDestroy": true
//    			});		 	
//            }});
//       
//	}//**Listing**//
	

		});		
	
</script>

	

<!-- page heading end--> 

<style>
	
	.show_msg{
		color:#F00;
		margin-left: 50px;
	}
</style>

<!--body wrapper start-->
<div class="wrapper">
  <div class="row">
  
    <div class="col-sm-12">
  
      <section class="panel">
        <header class="panel-heading">CMS Pages List 
        
        
        </header>
        
        <div class="panel-body">

          <div class="adv-table">
          
            <table class="display table table-bordered table-striped cus_tbl_css" id="data-table" style="width:100%;">
              <thead>
                <tr >
                    <th width="10%">No</th>
                    <th width="30%">Name</th>
                    <th width="20%">Status</th>
                    <th width="5%">Operation</th>
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

<style>
 

#ab {
   color: #65CEA7;
}	
</style>

