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
                            <a href="<?=base_url()?>index.php/about_hostel"><div class="gdlr-core-tab-item-title" data-tab-id="1">ABOUT HOSTEL</div></a>
                            <a href="<?=base_url()?>index.php/daily_routine"><div class="gdlr-core-tab-item-title gdlr-core-active" data-tab-id="1">Daily Routine</div></a>
                            <a href="<?=base_url()?>index.php/hostel_activity"><div class="gdlr-core-tab-item-title " data-tab-id="1">Hostel Activity
                            </div></a>
                            
                        </div>
                        <div class="gdlr-core-tab-item-content-wrap clearfix">
                            <div class="gdlr-core-tab-item-content  gdlr-core-active align" data-tab-id="1" >
                               <p><?php 
                               for($i=0;$i<count($result);$i++)
                               {
                                if($result[$i]['page_title'] == 'daily_routine')
                                {
                                    ?>
                                    <?=$result[$i]['contain']?>
                                <?php }
                            }
                            ?>
                        </p>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
