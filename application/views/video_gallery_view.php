<script src="<?=base_url();?>asset/popup/js/jquery.magnific-popup.js"></script>

<link  rel="stylesheet" type="text/css" href="<?=base_url();?>asset/popup/css/lightbox.css">

<script src="<?=base_url();?>asset/popup/js/jquery.magnific-popup.js"></script>

<script data-cfasync="false">

    $(document).ready(function(e) {
        $(document).on('click', '#openform', function (e) {
            var value = $(this).attr('value');

            e.preventDefault();
            $.magnificPopup.open({items: { src: '<?php echo base_url();?>index.php/Video_gallery/view/'+value},type: 'ajax',modal: true,preloader: false}, 0);
        });
        $(document).on('click', '.popup-modal-dismiss', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
    });
</script>
<div class="gdlr-core-pbf-wrapper " id="div_1dd7_79">
    <div class="gdlr-core-pbf-background-wrap" id="div_1dd7_80"></div>
    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
            <div class="gdlr-core-pbf-element">
                <div class="gdlr-core-tab-item gdlr-core-js gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-tab-style1-horizontal gdlr-core-item-pdlr">
                    <div class="gdlr-core-tab-item-wrap">
                        <div class="gdlr-core-tab-item-title-wrap clearfix gdlr-core-title-font">
                            <a href="<?=base_url()?>index.php/Image_gallery"><div class="gdlr-core-tab-item-title  " data-tab-id="1">Image Gallery</div></a>
                            <a href="<?=base_url()?>index.php/Video_gallery"><div class="gdlr-core-tab-item-title gdlr-core-active" data-tab-id="1">Video Gallery</div></a>


                        </div>
                        <div class="gdlr-core-tab-item-content-wrap clearfix">
                            <div class="gdlr-core-tab-item-content  gdlr-core-active" data-tab-id="1" >
                               <!--code  -->
                               <div class="gdlr-core-portfolio-item gdlr-core-item-pdb clearfix  gdlr-core-portfolio-item-style-grid">


                                <div class="filter light-filter clearfix gdlr-core-filterer-wrap gdlr-core-js  gdlr-core-item-pdlr gdlr-core-style-text gdlr-core-center-align" style="margin-bottom: 0px;">
                                    <ul>
                                        <li><a href="#" class="active" data-filter="*">All</a></li>
                                        <?php if(count($video10)>0) { ?>
                                            <li><a href="#" data-filter=".class1" >2020</a></li>
                                        <?php } ?>
                                        <?php if(count($video9)>0) { ?>
                                            <li><a href="#" data-filter=".class2" >2019</a></li>
                                        <?php } ?>
                                        <?php if(count($video8)>0) { ?>
                                            <li><a href="#" data-filter=".class3" >2018</a></li>
                                        <?php } ?>
                                        <?php if(count($video7)>0) { ?>
                                            <li><a href="#" data-filter=".class3" >2017</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>   


                                <div class="gdlr-core-portfolio-item-holder gdlr-core-js-2  filter-container clearfix" data-layout="fitrows">
                                  <?php if(count($video10)>0){?>
                                    <?php for($i=0;$i<count($video10);$i++){?>
                                        <div class="gdlr-core-item-list class1 gdlr-core-item-pdlr gdlr-core-column-20 gdlr-core-column-first">
                                            <div class="gdlr-core-portfolio-grid  gdlr-core-center-align gdlr-core-style-normal">
                                                <div class="gdlr-core-portfolio-thumbnail gdlr-core-media-image  gdlr-core-style-icon">
                                                    <div class="gdlr-core-portfolio-thumbnail-image-wrap  gdlr-core-zoom-on-hover">

                                                        <a href="#" id="openform" value="<?=$video10[$i]['video_code']?>">
                                                            <div id="imgdiv" style="background-image:url(<?=base_url();?>admin/upload/image_thum/<?=$video10[$i]['cover_img']?>)">
                                                                <img class="imgplay" src="" width="170" /> </div>
                                                                <div id="event_title">
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="gdlr-core-portfolio-content-wrap gdlr-core-skin-divider">
                                                        <h3 class="gdlr-core-portfolio-title gdlr-core-skin-title" style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;"><a href="#" ><?=$video10[$i]['video_name']?></a></h3></div>
                                                    </div>
                                                </div>
                                            <?php } } ?>
                                            <div style="clear:both;overflow:hidden;"></div>
                                            <?php if(count($video9)>0){?>
                                                <?php for($i=0;$i<count($video9);$i++){?>
                                                    <div class="gdlr-core-item-list class2 gdlr-core-item-pdlr gdlr-core-column-20 gdlr-core-column-first">
                                                        <div class="gdlr-core-portfolio-grid  gdlr-core-center-align gdlr-core-style-normal">
                                                            <div class="gdlr-core-portfolio-thumbnail gdlr-core-media-image  gdlr-core-style-icon">
                                                                <div class="gdlr-core-portfolio-thumbnail-image-wrap  gdlr-core-zoom-on-hover">
                                                                    <a href="#" id="openform" value="<?=$video9[$i]['video_code']?>">
                                                                        <div id="imgdiv" style="background-image:url(<?=base_url();?>admin/upload/image_thum/<?=$video9[$i]['cover_img']?>)">
                                                                            <img class="imgplay" src="" width="170" /> </div>
                                                                            <div id="event_title">

                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="gdlr-core-portfolio-content-wrap gdlr-core-skin-divider">
                                                                    <h3 class="gdlr-core-portfolio-title gdlr-core-skin-title" style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;"><a href="#" ><?=$video9[$i]['video_name']?></a></h3></div>
                                                                </div>
                                                            </div>
                                                        <?php } } ?>
                                                        <?php if(count($video8)>0){?>
                                                            <?php for($i=0;$i<count($video8);$i++){?>
                                                                <div class="gdlr-core-item-list class3 gdlr-core-item-pdlr gdlr-core-column-20 gdlr-core-column-first">
                                                                    <div class="gdlr-core-portfolio-grid  gdlr-core-center-align gdlr-core-style-normal">
                                                                        <div class="gdlr-core-portfolio-thumbnail gdlr-core-media-image  gdlr-core-style-icon">
                                                                            <div class="gdlr-core-portfolio-thumbnail-image-wrap  gdlr-core-zoom-on-hover">
                                                                                <a href="#" id="openform" value="<?=$video8[$i]['video_code']?>">
                                                                                    <div id="imgdiv" style="background-image:url(<?=base_url();?>admin/upload/image_thum/<?=$video8[$i]['cover_img']?>)">
                                                                                        <img class="imgplay" src="" width="170" /> </div>
                                                                                        <div id="event_title">

                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="gdlr-core-portfolio-content-wrap gdlr-core-skin-divider">
                                                                                <h3 class="gdlr-core-portfolio-title gdlr-core-skin-title" style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;"><a href="#" ><?=$video8[$i]['video_name']?></a></h3></div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } } ?>
                                                                    <div style="clear:both;overflow:hidden;"></div>
                                                                    <?php if(count($video7)>0){?>
                                                                        <?php for($i=0;$i<count($video7);$i++){?>
                                                                            <div class="gdlr-core-item-list class4 gdlr-core-item-pdlr gdlr-core-column-20 gdlr-core-column-first">
                                                                                <div class="gdlr-core-portfolio-grid  gdlr-core-center-align gdlr-core-style-normal">
                                                                                    <div class="gdlr-core-portfolio-thumbnail gdlr-core-media-image  gdlr-core-style-icon">
                                                                                        <div class="gdlr-core-portfolio-thumbnail-image-wrap  gdlr-core-zoom-on-hover">
                                                                                            <a href="#" id="openform" value="<?=$video7[$i]['video_code']?>">
                                                                                                <div id="imgdiv" style="background-image:url(<?=base_url();?>admin/upload/image_thum/<?=$video7[$i]['cover_img']?>)">
                                                                                                    <img class="imgplay" src="" width="170" /> </div>
                                                                                                    <div id="event_title">

                                                                                                    </div>
                                                                                                </a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="gdlr-core-portfolio-content-wrap gdlr-core-skin-divider">
                                                                                            <h3 class="gdlr-core-portfolio-title gdlr-core-skin-title" style="font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;"><a href="#" ><?=$video7[$i]['video_name']?></a></h3></div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } } ?>
                                                                            </div>
                                                                        </div>
                                                                        <!-- code end -->


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




<style type="text/css">
    /*#imgdiv{
        width:176px;
        height:176px;
        }*/
        #imgdiv img{
            width:250px;
            height:250px;
            border:#000 solid 1px;
        }
        
        #imgdiv img{
            width:110px;
            height:110px;
        }  

 @media(max-width:320px){
.mfp-inline-holder .mfp-content, .mfp-ajax-holder .mfp-content {
    width: 294px;
    margin: 20px auto;
    cursor: auto;
}
iframe#video_frame {
    width: 252px;
}
 }   
    

</style>


<script data-cfasync="false" type="text/javascript" charset="utf-8">

    $(document).ready(function() {

        $(".imgplay").attr("src","<?=base_url();?>asset/new_design/image_stat/play.png");
        
    });     
</script>

