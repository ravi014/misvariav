<!-- Being Page Title -->
<?php 

	$date1 	= new DateTime($event_dt[0]['event_dt']);
	$dt		=	date_format($date1, "j,  M  Y");

?>
<div class="course-image">
	<img src="<?=base_url();?>admin/upload/img/<?=$header_img[0]['img_path']?>" alt="">
</div> <!-- /.course-image -->
<div class="container">
        <div class="row">

          
           
            <!-- Here begin Sidebar -->
          	<div class="col-md-12">
				<div class="row">
                    <div class="col-md-12">
                        <div class="course-post">
                        <div class="course-details clearfix">
                                <h3 class="course-post-title">Gallery</h3>
                                
                                
                                
                                <section id="content">
	<div class="container1">
    	<a class="btn btn-success" href="<?php echo base_url();?>index.php/image_gallery" style="margin-bottom:5px;">Back</a><br>
    	<ul class="gallery" style="list-style:none;padding:0px;margin:0px;">
        <?php for($i=0;$i<count($result);$i++){ ?>
			<li class="col-sm-3 col-xs-6">
				<!--<a href="<?=base_url();?>admin/upload/event/<?=$result[$i]['image']?>" class="fancybox" data-fancybox-group="group">-->
                <a href="<?=base_url();?>admin/upload/img/<?=$result[$i]['photopath']?>" class="fancybox" data-fancybox-group="group">
				<!--<img src="<?=base_url();?>admin/upload/event_thum/<?=$result[$i]['image']?>" class="img-responsive" alt="" />-->
                <img src="<?=base_url();?>admin/upload/img_thum/<?=$result[$i]['photopath']?>" class="img-responsive g_im" alt="" />
			
                </a>
			</li>
           
        <?php } ?>
        
         <div style="clear:both;overflow:hidden;"></div>
    		<!--<div class="gallerytilte">
   	 		<h3 style="font-size:20px;"><?=$event_dt[0]['event_name']?> - <?=$dt?></h3>
            </div>-->
         </ul>
    </div>
</section>
                                
                                
                                
                                
                        </div> <!-- /.course-details -->
                        </div> <!-- /.course-post -->
					 </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->


               

            </div> <!-- /.col-md-8 -->
    
        </div> <!-- /.row -->
    </div> 

<!-- /.container -->
<style>
.course-details p {
    text-align: justify;
}
	.g_im{
		    width: 245px;
    		height: 162px;
		    margin: 5px;
	}
</style>