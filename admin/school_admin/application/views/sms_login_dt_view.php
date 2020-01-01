
<!-- page heading start-->

<div class="page-heading">
            <h4>
                SEND LOGIN DETAILS

            </h4>
            <ul class="breadcrumb">
                <li> <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a> </li>
                <li class="active">Send login details</li>
          </ul>
            
        </div>
        

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
<!---------Filter------------>
 <div class="wrapper">
  <div class="row">
   <div class="col-sm-6">
      <section class="panel">
        <header class="panel-heading"> SMS Send 
          <div class="btn-group pull-right">
     <a href="<?=base_url();?>index.php/<?=$this->uri->segment(1)?>/report" class="addnewlink"><button class="btn btn-primary">Report </button></a>
            </div>   
             </header>
        <div class="panel-body">
        
<form role="form" action="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/send_msg" id="form1" method="post" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
    
        <div class=" form">
        <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>"  value="<?=$this->security->get_csrf_hash();?>" />
     
   	   <input type="hidden" name="mode" id="mode" value="<?=$segment['mode']?>" />
         
            <!-------------->
            <div class="form-group">
              <label class="col-sm-2 control-label">Standard</label>
              <div class="col-sm-8">
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
           <div class="form-group">
              <label class="col-sm-4 control-label"></label>
              <div class="col-sm-4">
                <input type="submit" class="btn btn-success" value="Send" />
                <p class="proccsing_div"></p>
              </div>
            </div>
            </div>
         </form>
      </div>            
  
      </section>
</div>
</div>
</div>

<!-----------Filter---------->
<?php }?>
<style>
	.proccsing_div{
		color:#F00;
		font-weight:bold;
	}
	.dataTables_wrapper{
		border:none;
	}
</style>
