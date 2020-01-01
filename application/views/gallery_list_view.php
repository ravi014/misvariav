<!-- Being Page Title -->
<?php 

$date1 	= new DateTime($event_dt[0]['event_dt']);
$dt		=	date_format($date1, "j,  M  Y");

?>
<!-- <div class="course-image">
	<img src="<?=base_url();?>admin/upload/img/<?=$header_img[0]['img_path']?>" alt="">
</div> --> <!-- /.course-image -->
<div class="gdlr-core-pbf-wrapper " style="padding: 20px 20px 30px 20px;">
    <div class="gdlr-core-pbf-background-wrap"></div>
    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-pbf-wrapper-full">
            <div class="gdlr-core-pbf-element">
                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-center-align gdlr-core-title-item-caption-bottom gdlr-core-item-pdlr" style="padding-bottom: 60px ;">
                    <div class="gdlr-core-title-item-title-wrap clearfix">
                        <a class="gdlr-core-button gdlr-core-button-shortcode  gdlr-core-button-gradient gdlr-core-button-no-border" href="<?=base_url()?>index.php/image_gallery" style="float: left;padding: 8px 20px 8px;border-radius: 2px;-moz-border-radius: 2px;-webkit-border-radius: 2px;"><span class="gdlr-core-content">Back</span></a>
                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="text-transform: none ;font-size:25px;">Gallery</h3></div></div>
                    </div>

                    <ul class="gallery" style="list-style:none;padding:0px;margin:0px;">
                        <?php for($i=0;$i<count($result);$i++){ ?>
                            <li class="col-sm-2">
                             <div class="gdlr-core-gallery-list gdlr-core-media-image">
                                <a class="gdlr-core-lightgallery gdlr-core-js " href="<?=base_url();?>admin/upload/img/<?=$result[$i]['photopath']?>" data-lightbox-group="gdlr-core-img-group-1">
                                    <img src="<?=base_url();?>admin/upload/img/<?=$result[$i]['photopath']?>" alt="" class="g_im" /><span class="gdlr-core-image-overlay "><i class="gdlr-core-image-overlay-icon gdlr-core-size-22 fa fa-search"  ></i></span></a>
                                </div>  
                            </li>

                        <?php } ?>
                    </ul>        
                        </div>
                    </div>
                    </div>
                    

<!-- /.container -->
<style>
    .course-details p {
        text-align: justify;
    }
    .g_im{
      width: 180px;
      height: 152px;
      margin: 5px;
  }
</style>