<!-- Being Page Title -->
<!-- <div class="kingster-page-title-wrap  kingster-style-medium kingster-left-align">
    <img src="<?=base_url();?>admin/upload/img/<?=$header_img[0]['img_path']?>" alt="">
        <div class="kingster-header-transparent-substitute"></div>
        <div class="kingster-page-title-overlay"></div>
            </div> -->
<div class="gdlr-core-pbf-wrapper " id="div_1dd7_79">
                        <div class="gdlr-core-pbf-background-wrap" id="div_1dd7_80"></div>
                        <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                            <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                <div class="gdlr-core-pbf-element">
                                    <div class="gdlr-core-tab-item gdlr-core-js gdlr-core-item-pdb  gdlr-core-left-align gdlr-core-tab-style1-horizontal gdlr-core-item-pdlr">
                                        
                                        <div class="gdlr-core-tab-item-content-image-wrap clearfix">
                                            <div class="gdlr-core-tab-item-image  gdlr-core-active" data-tab-id="1">
                                                <img src="<?=base_url();?>admin/upload/img/<?=$header_img[0]['img_path']?>" alt="">
                                            </div>
                                           
                                        </div>

                                        <div class="gdlr-core-tab-item-wrap">
                                            <div class="gdlr-core-tab-item-title-wrap clearfix gdlr-core-title-font">
                                                <a href="<?=base_url()?>index.php/about"><div class="gdlr-core-tab-item-title" data-tab-id="1">About Us</div></a>
                                                <a href="<?=base_url()?>index.php/mission"><div class="gdlr-core-tab-item-title " data-tab-id="1">Mission</div></a>
                                                <a href="<?=base_url()?>index.php/methodology"><div class="gdlr-core-tab-item-title " data-tab-id="1">Methodology</div></a>
                                                <a href="<?=base_url()?>index.php/Principall"><div class="gdlr-core-tab-item-title gdlr-core-active" data-tab-id="1">Principal's Desk</div></a>
                                                 <a href="<?=base_url()?>index.php/admission_fees"><div class="gdlr-core-tab-item-title " data-tab-id="1">Admission & Fees</div></a>
                                                <!-- <a href="<?=base_url()?>index.php/school"><div class="gdlr-core-tab-item-title " data-tab-id="1">The School</div></a> -->
                                            </div>
                                            <div class="gdlr-core-tab-item-content-wrap clearfix">
                                                <div class="gdlr-core-tab-item-content  gdlr-core-active align" data-tab-id="1" >
                                                     <p align="justify"><?php 
                                                            for($i=0;$i<count($result);$i++)
                                                            {
                                                            if($result[$i]['page_title'] == 'principall')
                                                            {
                                                            ?>
                                                            <?=$result[$i]['contain']?>
                                                            <?php }
                                                            }
                                                            ?>
                                                       
                                                        </p>
                                                        </div>
                                                <!-- <div class="gdlr-core-tab-item-content " data-tab-id="2" >
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top">
                                                        <div class="gdlr-core-title-item-title-wrap ">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " id="h3_1dd7_25">Inspirer<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span></h3></div>
                                                    </div>
                                                    <p>
                                                        <?php 
                                                            for($i=0;$i<count($result);$i++)
                                                            {
                                                            if($result[$i]['page_title'] == 'inspirer')
                                                            {
                                                            ?>
                                                            <?=$result[$i]['contain']?>
                                                            <?php }
                                                            }
                                                            ?>
                                                    </p>
                                                </div> -->
                                                <!-- <div class="gdlr-core-tab-item-content " data-tab-id="3" >
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top">
                                                        <div class="gdlr-core-title-item-title-wrap ">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " id="h3_1dd7_26">Mission<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span></h3></div>
                                                    </div>
                                                    <p>
                                                        <p>
                                                        <?php 
                                                            for($i=0;$i<count($result);$i++)
                                                            {
                                                            if($result[$i]['page_title'] == 'mission')
                                                            {
                                                            ?>
                                                            <?=$result[$i]['contain']?>
                                                            <?php }
                                                            }
                                                            ?>
                                                    </p>
                                                    </p>
                                                </div> -->
                                                <!-- <div class="gdlr-core-tab-item-content " data-tab-id="4" >
                                                    <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top">
                                                        <div class="gdlr-core-title-item-title-wrap ">
                                                            <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " id="h3_1dd7_27">The School<span class="gdlr-core-title-item-title-divider gdlr-core-skin-divider" ></span></h3></div>
                                                    </div>
                                                    <p>
                                                        <p>
                                                        <?php 
                                                            for($i=0;$i<count($result);$i++)
                                                            {
                                                            if($result[$i]['page_title'] == 'school')
                                                            {
                                                            ?>
                                                            <?=$result[$i]['contain']?>
                                                            <?php }
                                                            }
                                                            ?>
                                                    </p>
                                                    </p>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
