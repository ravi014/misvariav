
<div class="page-heading">
            <h4>
                <!--Slider Image -->
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a>
                </li>
                <li >Website Management</li>
                 <li class="active"> <a  href="<?php echo base_url(); ?>index.php/slider_img"> Slider Image</a> </li>
            </ul>
            
        </div>
   
<div class="wrapper">
  <div class="row">
  
  <?php if($this->session->flashdata('show_msg')!=''){?>
  <div class="alert alert-success fade in">
    <button type="button" class="close close-sm" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
    <?=$this->session->flashdata('show_msg');?>
  </div>
  <?php } ?>
    <div class="col-sm-12">
  
      <section class="panel">
        <header class="panel-heading"> Slider Image
    <div class="btn-group pull-right">
             
     <a href="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/addnew/Add">
      <button class="btn btn-danger">Add New</button>
      </a> 
      
        </div>
        </header>
        
        <div class="panel-body">
  <?php if(count($result)=="0") { ?>
  <div> no data available</div>
  <?php } else{ ?>
				<div class="grids">
                	<ul id="video_ul">
                    	<?php for($i=0;$i<count($result);$i++) { ?>
                    	<li>
                        	<h2 id="title"></h2>
                        	<div id="videofrm">
    						
                                <img src="<?php echo upload_path();?>img_thum/<?=$result[$i]['img_path']?>" style="width:100%;height:200px;" />
    						</div>
                            
                            <h2>
                            	
                            	<a href="<?php echo base_url();?>index.php/<?=$this->uri->segment(1)?>/deleterecord/<?=$result[$i]['gen_cms_code']?>" class="btn delrcd" rel="tooltip" onClick=" return confirm('Are Your Sure You Want To Delete');" title="Delete"><i class="fa fa-remove"></i></a>
                            </h2>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
      </section>
    </div><!----col-sm-12------->
  </div><!----row------->
</div>
<!--body wrapper end--> 

<style>
#video_ul{
	margin:0px;
	padding:0px;
	list-style:none;
}
#video_ul li{
	float:left;
	width:295px;
	margin-left:10px;
}
#videofrm{
	width:295px;
	height:200px;
}
#title{
	font-size:14px;
}
#ab {
   color: #65CEA7;
}
</style>
