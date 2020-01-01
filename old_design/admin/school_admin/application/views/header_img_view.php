
<div class="page-heading">
            <h4>
                <!--Header Image -->
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home" >Dashboard</a>
                </li>
                <li>Website Management</li>
                 <li class="active"> <a  href="<?php echo base_url(); ?>index.php/header_img">Header Image</a> </li>
            </ul>
            
        </div>
   
<div class="wrapper">
  <div class="row">
  

    <div class="col-sm-12">
  
      <section class="panel">
        <header class="panel-heading"> Header Image
    <div class="btn-group pull-right">
             
     
      
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
                        	<h2 id="title"><?=ucwords($result[$i]['page_title'])?></h2>
                        	<div id="videofrm">
    						
                                <img src="<?php echo upload_path();?>img_thum/<?=$result[$i]['img_path']?>" style="width:100%;height:120px;" />
    						</div>
                           
                            <h2>
                            	<a href="<?php echo base_url();?>index.php/header_img/addnew/Edit/<?=$result[$i]['gen_cms_code']?>" class="btn" rel="tooltip" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;
                            	
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
	width:250px;
	margin-left:10px;
}
#videofrm{
	width:230px;
	height:100px;
}
#title{
	font-size:14px;
}
#ab {
   color: #65CEA7;
}
</style>
