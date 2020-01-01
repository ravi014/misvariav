<link rel="stylesheet" href="<?=base_url();?>asset/slider/responsiveslides.css">
<link rel="stylesheet" href="<?=base_url();?>asset/slider/demo.css">
<script src="<?=base_url();?>asset/slider/responsiveslides.js"></script>
<script src="<?=base_url();?>asset/js/ticker.js"></script>

<ul class="rslides" id="slider1">
    <?php for($i=0;$i<count($slider_img);$i++){?>
  <li><img src="<?=base_url();?>admin/upload/img/<?=$slider_img[$i]['img_path']?>"/></li>
  <? } ?>

</ul>

        <!-- SLIDER OFFERS START -->

<!-- SLIDER OFFERS END -->

<!--<a class="arrow" href="#welcome">
    <i class="fa fa-arrow-down fa-2x"></i>
</a>-->
</div>

<!-- ========== BANNER END ========== -->
<section id="homcontent">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h1>WELCOME TO SWAMINARAYAN SANSKAR PITH INTERNATIONAL SCHOOL</h1>
                    <p> Swaminarayan Sanskar Pith International School (SSPIS) will work with the Aim of providing opportunities of education of international standards to the students irrespective of their caste, creed and religion and thereby turn out students who are global citizens of tomorrow who will not think for the self but for the rest of the globe.
Swaminarayan Sanskar Pith will follow a 5 point agenda, identified after deep study and introspection about what constitutes a great school.</p>
                    <ul>
                        <li>EXCELLENCE IN CURRICULUM</li>
                        <li>PROFICIENCY IN SPORTS</li>
                        <li>LIFE SKILL KNOWLEDGE FOR SURVIVAL AND GROWTH</li>
                        <li>KNOWLEDGE OF DIVINE</li>
                        <li>AND ABOVE ALL, AN IMPECCABLE MORAL CHARACTER</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h1>TAKE VIDEO TOUR</h1>
                    <div class="video-wrapper">
                        <!--<iframe src="https://www.youtube.com/embed/L2LNK2MW_xQ?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>-->
                       <iframe src="https://www.youtube.com/embed/xjzqlnBqGX4" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                
                <div class="col-sm-8 whitebox">
                    <div class="col-sm-1">
                    <img src="asset/images/latest-event.jpg" alt="" />
                    </div>
                    <div class="col-sm-11 eventcon">
                     <?php for($i=0;$i<count($latest_event);$i++){ 
                                $date1 = new DateTime($latest_event[$i]['event_dt']);
                                $day=date_format($date1, "D");
                                $month=date_format($date1, "M  d");
                                $dt=date_format($date1,  "l , j  M  Y");
								
					?>
                    <a href="<?=base_url();?>index.php/gallery_list/view/<?=$latest_event[$i]['event_code']?>">
                        <div class="eventdt"><?=$day?><br><?=$month?></div>
                        <div class="col-sm-5">
                       <?php /*?> <h3><?=$latest_event[$i]['event_name']?></h3><?php */?>
                        <h3><?=$latest_event[$i]['event_title']?></h3>
                        <p>When : <?=$dt?></p>
                        </div>
                   </a>
					<?php  } ?>

				 </div> 
                </div>
                
                <div class="col-sm-4">
                    <div id="hometicker">
                        <div id="yellow"></div>
                        <div id="green"></div>
                        <div id="red"></div>
                        <div id="news-container">
                           <ul>
                            <?php for($i=0;$i<count($announcement);$i++){ 
                                $date1 = new DateTime($announcement[$i]['date']);
                                $day=date_format($date1, "D");
                                $month=date_format($date1, "M  d");
                                $dt=date_format($date1,  "l , j  M  Y");
                                if($announcement[$i]['contain']!=''){
                                    $link_a =	'<a href="'.$announcement[$i]['contain'].'" value="'.$announcement[$i]['gen_cms_code'].'" target="_blank" >'.$announcement[$i]['page_title'].'</a>';
                                    }
                                    else{
                                    $link_a		=	'<a href="#">'.$announcement[$i]['page_title'].'</a>';
                                    }
                                    ?>
                                   <li>
                                   		
                                            <div id="eventdt"><?=$day?><br><?=$month?></div>
                                            <div id="news_title">
												<?=$link_a?>
                                               <p> When : <?=$dt?></p>
                                            
                                            </div>
                                         
                                      		   
                                   </li>
                            <?php } ?>
                              
                            </ul>
                        </div>
                        <div id="white"><h3>ANNOUNCEMENT</h3></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--<section id="gallery_content">
        <div class="container">
               <div id="border"><span>FACILITIES</span></div>

         <div class="inner_gallery">
            <ul class="gallery">
                <li class="col-sm-3 col-xs-6">
                    <a href="asset/images/fac-img-1.jpg" class="fancybox" data-fancybox-group="group">
                        <img src="asset/images/fac-img-1.jpg" class="img-responsive" alt="" />
                    </a>
                </li>
                <li class="col-sm-3 col-xs-6">
                    <a href="asset/images/fac-img-2.jpg" class="fancybox" data-fancybox-group="group">
                        <img src="asset/images/fac-img-2.jpg" class="img-responsive" alt="" />
                    </a>
                </li>
                <li class="col-sm-3 col-xs-6">
                    <a href="asset/images/fac-img-3.jpg" class="fancybox" data-fancybox-group="group">
                        <img src="asset/images/fac-img-3.jpg" class="img-responsive" alt="" />
                    </a>
                </li>
                <li class="col-sm-3 col-xs-6">
                    <a href="asset/images/fac-img-4.jpg" class="fancybox" data-fancybox-group="group">
                        <img src="asset/images/fac-img-4.jpg" class="img-responsive" alt="" />
                    </a>
                </li>
                <li class="col-sm-3 col-xs-6">
                    <a href="asset/images/fac-img-5.jpg" class="fancybox" data-fancybox-group="group">
                        <img src="asset/images/fac-img-5.jpg" class="img-responsive" alt="" />
                    </a>
                </li>
                <li class="col-sm-3 col-xs-6">
                    <a href="asset/imagesimages/fac-img-6.jpg" class="fancybox" data-fancybox-group="group">
                        <img src="asset/images/fac-img-6.jpg" class="img-responsive" alt="" />
                    </a>
                </li>
                <li class="col-sm-3 col-xs-6">
                    <a href="asset/images/fac-img-7.jpg" class="fancybox" data-fancybox-group="group">
                        <img src="asset/images/fac-img-7.jpg" class="img-responsive" alt="" />
                    </a>
                </li>
                <li class="col-sm-3 col-xs-6">
                    <a href="asset/images/fac-img-8.jpg" class="fancybox" data-fancybox-group="group">
                        <img src="asset/images/fac-img-8.jpg" class="img-responsive" alt="" />
                    </a>
                </li>
                
            </ul>
        </div>
        </div>
    </section>-->
    <div id="links">
        <div class="container">
            <div class="row" style="margin-top:30px!important;margin-bottom: 15px!important;">

                <!-- ==== QUICK LINKS START == -->
                <div class="col-sm-3">
                    <h3>QUICK LINKS</h3>
                    <ul>
                        <li><a href="<?=base_url();?>"><i class="fa fa-angle-right"></i>Home</a></li>
                        <li><a href="<?=base_url();?>index.php/about"><i class="fa fa-angle-right"></i>About</a></li>
                        <li><a href="<?=base_url();?>index.php/contact"><i class="fa fa-angle-right"></i>Contact</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i>Privacy Policy</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i>Terms &amp; Conditions</a></li>
                        <li><a href="http://www.theswaminarayan.org/" target="_blank"><i class="fa fa-angle-right"></i>Swaminarayan Gurukul Kandari</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h3>SOCIAL MEDIA</h3>
                    <ul>
                    <li>
                    <img src="asset/images/ico-facebook.png" alt="" class="pull-left" />
                    <h3><a href="#">Facebook</a></h3>
                    </li>
                    <li>
                    <img src="asset/images/ico-google.png" alt="" class="pull-left" />
                    <h3><a href="#">Google+</a></h3>
                    </li>
                    <li>
                    <img src="asset/images/ico-youtube.png" alt="" class="pull-left" />
                    <h3><a href="#">Youtube</a></h3>
                    </li>
                    </ul>
                </div>		
                
                <div class="col-sm-3">
                    <h3>CONTACT</h3>
                    <p>At. Navli - 388355,  Anand<br>
                    Phone: +91 2692 283845<br>
                    principal@sspis.org<br>
                    admin@sspis.org</p>
                </div>
                
                 <div class="col-sm-3">
                    <h3>SCHOOL VISITING HOURS</h3>
                    <p><b>Principal:</b><br />
                     10.00 am to 3.00 pm <br/>
                    (with prior appointment only)<br />
                    <b>Office: 8.00 am to 3.30 pm</b><br>
                    <b>Subject Teachers & Co-ordinator:</b><br />
                    (with prior appointment only)<br />
                    For Prior Appointment Parents Call<br />
                    +91-2692 283845,+91-7405466555</p>
                   
                </div>
                
             </div>
         </div>
      </div>
             
<script>
$(function() {
$('#news-container').vTicker({
        speed: 800,
        pause: 2000,
        height: 271,
        showItems: 3,
        animation: 'fade',
        mousePause: true,
        
        
  });
});

</script>	
<script type="text/javascript">
      $("#slider1").responsiveSlides({
        maxwidth: 2560,
        speed: 800
  });
    </script> 