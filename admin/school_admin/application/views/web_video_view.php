
<div class="page-heading">
            <h4>
                VIDEO GALLERY 
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a>
                </li>
                <li >Website Management</li>
                 <li class="active">Video </li>
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
        <header class="panel-heading"> Video
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
                        	<h2 id="title"><?=$result[$i]['video_name']?></h2>
                        	<div id="videofrm">
    						
                                <iframe width="295" height="200" src="<?=$result[$i]['video_url']?>" frameborder="0" title="<?=$result[$i]['video_desc']?>" allowfullscreen></iframe>
    						</div>
                            
                            <h2>
                            	<a href="<?php echo base_url();?>index.php/web_video/addnew/Edit/<?=$result[$i]['video_code']?>" class="btn" rel="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
                            	<a href="<?php echo base_url();?>index.php/web_video/record_update/Delete/<?=$result[$i]['video_code']?>" class="btn delrcd" rel="tooltip" onClick=" return confirm('Are Your Sure You Want To Delete');" title="Delete"><i class="fa fa-remove"></i></a>
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
