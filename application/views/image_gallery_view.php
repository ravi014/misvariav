
<div class="gdlr-core-pbf-wrapper " id="div_1dd7_79">
    <div class="gdlr-core-pbf-background-wrap" id="div_1dd7_80"></div>
    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
            <div class="gdlr-core-pbf-element">
                <div class="gdlr-core-tab-item gdlr-core-js gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-tab-style1-horizontal gdlr-core-item-pdlr">
                    <div class="gdlr-core-tab-item-wrap">
                        <div class="gdlr-core-tab-item-title-wrap clearfix gdlr-core-title-font">
                            <a href="<?=base_url()?>index.php/image_gallery"><div class="gdlr-core-tab-item-title  gdlr-core-active" data-tab-id="1">Image Gallery</div></a>
                            <a href="<?=base_url()?>index.php/video_gallery"><div class="gdlr-core-tab-item-title " data-tab-id="1">Video Gallery</div></a>


                        </div>
                        <div class="gdlr-core-tab-item-content-wrap clearfix">
                            <div class="gdlr-core-tab-item-content  gdlr-core-active" data-tab-id="1" >
                             <!--code  -->
                             <div class="gdlr-core-portfolio-item gdlr-core-item-pdb clearfix  gdlr-core-portfolio-item-style-grid" style="padding-bottom:0px;">


                                        <div class="filter light-filter clearfix gdlr-core-filterer-wrap gdlr-core-js  gdlr-core-item-pdlr gdlr-core-style-text gdlr-core-center-align" style="margin-bottom: 0px;">
                                            <ul>
                                                <li><a href="#" class="active" data-filter="*">All</a></li>
                                                <?php if(count($result_2020)>0) { ?>
                                                <li><a href="#" data-filter=".class1" >2020</a></li>
                                                <?php } ?>
                                                <?php if(count($result_2019)>0) { ?>
                                                <li><a href="#" data-filter=".class2" >2019</a></li>
                                                <?php } ?>
                                                <?php if(count($result_2018)>0) { ?>
                                                <li><a href="#" data-filter=".class3" >2018</a></li>
                                                <?php } ?>
                                                <?php if(count($result_2017)>0) { ?>
                                                <li><a href="#" data-filter=".class4" >2017</a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>   


                                        <div class="gdlr-core-portfolio-item-holder gdlr-core-js-2  filter-container clearfix"  data-layout="fitrows">
                                             <?php if(count($result_2020)>0){?>
                                            <?php for($i=0;$i<count($result_2020);$i++){
                                                ?>
                                            <div class="gdlr-core-item-list class1 gdlr-core-item-pdlr gdlr-core-column-10 gdlr-core-column-first">
                                                <div class="gdlr-core-portfolio-grid  gdlr-core-center-align gdlr-core-style-normal">
                                                    <div class="gdlr-core-portfolio-thumbnail gdlr-core-media-image  gdlr-core-style-icon">
                                                        <div class="gdlr-core-portfolio-thumbnail-image-wrap  gdlr-core-zoom-on-hover">
                                                            <div id="imgdiv">
                                                                <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2020[$i]['gallery_code']?>">
                                                                    <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2020[$i]['gallery_cover_img']?>"/></a>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="gdlr-core-portfolio-content-wrap gdlr-core-skin-divider">
                                                        <h3 class="gdlr-core-portfolio-title gdlr-core-skin-title" style="height:10px;font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;"><a href="#" ><?=$result_2020[$i]['gallery_name']?></a></h3></div>
                                                </div>
                                            </div>
                                        <?php } } ?>
                                             <?php if(count($result_2019)>0){?>
                                            <?php for($i=0;$i<count($result_2019);$i++){
                                                ?>
                                            <div class="gdlr-core-item-list class2 gdlr-core-item-pdlr gdlr-core-column-10">
                                                <div class="gdlr-core-portfolio-grid  gdlr-core-center-align gdlr-core-style-normal">
                                                    <div class="gdlr-core-portfolio-thumbnail gdlr-core-media-image  gdlr-core-style-icon">
                                                        <div class="gdlr-core-portfolio-thumbnail-image-wrap  gdlr-core-zoom-on-hover">
                                                             <div id="imgdiv">
                                                                <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2019[$i]['gallery_code']?>">
                                                                    <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2019[$i]['gallery_cover_img']?>"/></a>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="gdlr-core-portfolio-content-wrap gdlr-core-skin-divider">
                                                        <h3 class="gdlr-core-portfolio-title gdlr-core-skin-title" style="height:10px;font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;"><a href="#" ><?=$result_2019[$i]['gallery_name']?></a></h3></div>
                                                </div>
                                            </div>
                                            <?php } } ?>
                                             <?php if(count($result_2018)>0){?>
                                            <?php for($i=0;$i<count($result_2018);$i++){
                                                ?>
                                            <div class="gdlr-core-item-list class3 gdlr-core-item-pdlr gdlr-core-column-10">
                                                <div class="gdlr-core-portfolio-grid  gdlr-core-center-align gdlr-core-style-normal">
                                                    <div class="gdlr-core-portfolio-thumbnail gdlr-core-media-image  gdlr-core-style-icon">
                                                        <div class="gdlr-core-portfolio-thumbnail-image-wrap  gdlr-core-zoom-on-hover">
                                                            <div id="imgdiv">
                                                                <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2018[$i]['gallery_code']?>">
                                                                    <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2018[$i]['gallery_cover_img']?>"/></a>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="gdlr-core-portfolio-content-wrap gdlr-core-skin-divider">
                                                        <h3 class="gdlr-core-portfolio-title gdlr-core-skin-title" style="height:10px;font-size: 15px ;font-weight: 500 ;letter-spacing: 0px ;text-transform: none ;"><a href="#" ><?=$result_2018[$i]['gallery_name']?></a></h3></div>
                                                </div>
                                            </div>
                                             <?php } } ?>
                                              <?php if(count($result_2017)>0){?>
                                            <?php for($i=0;$i<count($result_2017);$i++){
                                                ?>
                                            <div class="gdlr-core-item-list class4 gdlr-core-item-pdlr gdlr-core-column-10">
                                                <div class="gdlr-core-portfolio-grid  gdlr-core-center-align gdlr-core-style-normal">
                                                    <div class="gdlr-core-portfolio-thumbnail gdlr-core-media-image  gdlr-core-style-icon">
                                                        <div class="gdlr-core-portfolio-thumbnail-image-wrap  gdlr-core-zoom-on-hover">
                                                            <div id="imgdiv">
                                                                <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2017[$i]['gallery_code']?>">
                                                                    <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2017[$i]['gallery_cover_img']?>"/></a>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="gdlr-core-portfolio-content-wrap gdlr-core-skin-divider">
                                                        <h3 class="gdlr-core-portfolio-title gdlr-core-skin-title" style="height:10px;font-size: 15px ;font-weight:500 ;letter-spacing: 0px ;text-transform: none ;"><a href="#" ><?=$result_2017[$i]['gallery_name']?></a></h3></div>
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
            height:140px;
            border:#000 solid 1px;
        }
        @media(max-width:770px) {
  /*  #imgdiv{
    width:110px;
    height:110px;
    }*/
    #imgdiv img{
        width:110px;
        height:110px;
    }  

    
}
@media only screen and (max-width:319px)
{
    .gdlr-core-item-pdlr {
    padding-left: 16px;
    }
    
}
</style>


