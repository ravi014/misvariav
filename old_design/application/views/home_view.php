<script src="<?=base_url();?>asset/js/ticker.js"></script>

<div class="container">
  <div class="row">
    <div class="col-md-8">
    
      <div class="stiker-fix">
        <a href="<?=base_url();?>index.php/inquiry">
        <img src="<?=base_url();?>asset/images/admission-2.png" alt="admission-open-sspis-navli" width="150">
        </a>
      </div>	
    
      <div class="main-slideshow">
        <div class="flexslider">
          <ul class="slides">
            <!--<li> <img src="<?=base_url();?>asset/new_design/images/slide1.jpg" /> 
              <!--<div class="slider-caption">
                                    <h2><a href="blog-single.html">When a Doctor’s Visit Is a Guilt Trip</a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                                </div>
            </li>
            <li> <img src="<?=base_url();?>asset/new_design/images/slide2.jpg" /> </li>
            <li> <img src="<?=base_url();?>asset/new_design/images/slide3.jpg" /> </li>-->
            
            
            <?php for($i=0;$i<count($slider_img);$i++){?>
              <li><img src="<?=base_url();?>admin/upload/img/<?=$slider_img[$i]['img_path']?>"/></li>
            <?php } ?>
            
          </ul>
          
          
          <!-- /.slides --> 
        </div>
        <!-- /.flexslider --> 
      </div>
      <!-- /.main-slideshow --> 
    </div>
    <!-- /.col-md-12 -->
    
    <div class="col-md-4">
      <div class="widget-main">
        <div class="widget-main-title">
          <h4 class="widget-title">Announcement</h4>
        </div>
        <!-- /.widget-main-title -->
        <div class="widget-inner" id="news-container">
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
              <div class="event-small-list clearfix">
                <div class="calendar-small"> <span class="s-month">
                  <?=$month?>
                  </span> <span class="s-date">
                  <?=$day?>
                  </span> </div>
                <div class="event-small-details">
                  <h5 class="event-small-title">
                    <?=$link_a?>
                  </h5>
                  <!-- <p class="event-small-meta small-text">Cramton Auditorium 9:00 AM to 1:00 PM</p>--> 
                </div>
              </div>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
    <!-- /.col-md-4 --> 
  </div>
</div>
<div class="container">
  <div class="row"> 
    
    <!-- Here begin Main Content -->
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-12">
          <div class="widget-item">
            <h2 class="welcome-text">Welcome To Swaminarayan Sanskar Pith International School</h2>
            <p style="text-align:justify"><strong>Swaminarayan Sanskar Pith International School (SSPIS) will work with the Aim of providing opportunities of education of international standards to the students irrespective of their caste, creed and religion and thereby turn out students who are global citizens of tomorrow who will not think for the self but for the rest of the globe.
              Swaminarayan Sanskar Pith will follow a 5 point agenda, identified after deep study and introspection about what constitutes a great school.</strong></p>
            <b>
            <iframe width="350" height="170" src="https://www.youtube.com/embed/-Gaq1ttNFrA" frameborder="0" allowfullscreen></iframe>
            <ul style="width: 50%;float: right;">
              <li>EXCELLENCE IN CURRICULUM</li>
              <li>PROFICIENCY IN SPORTS</li>
              <li>LIFE SKILL KNOWLEDGE FOR SURVIVAL AND GROWTH</li>
              <li>KNOWLEDGE OF DIVINE</li>
              <li>AND ABOVE ALL, AN IMPECCABLE MORAL CHARACTER</li>
            </ul>
            </b> <br />
            <br />
          </div>
          <!-- /.widget-item --> 
        </div>
        <!-- /.col-md-12 --> 
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.col-md-8 --> 
    
    <!-- Here begin Sidebar -->
    <div class="col-md-4">
      <div class="widget-main">
        <div class="widget-main-title">
          <h4 class="widget-title">Events</h4>
        </div>
        <!-- /.widget-main-title -->
        <div class="widget-inner">
          <?php for($i=0;$i<count($latest_event);$i++){ 
                            $date1 = new DateTime($latest_event[$i]['event_dt']);
                            $day=date_format($date1, "D");
                            $month=date_format($date1, "M  d");
                            $dt=date_format($date1,  "l , j  M  Y");
                        ?>
          <div class="event-small-list clearfix">
            <div class="calendar-small"> <span class="s-month">
              <?=$month?>
              </span> <span class="s-date">
              <?=$day?>
              </span> </div>
            <div class="event-small-details">
              <h5 class="event-small-title"> <a href="<?=base_url();?>index.php/gallery_list/view/<?=$latest_event[$i]['event_code']?>">
                <?=$latest_event[$i]['event_title']?>
                </a> </h5>
              <!--<p class="event-small-meta small-text">Cramton Auditorium 9:00 AM to 1:00 PM</p>--> 
            </div>
          </div>
          <?php }?>
        </div>
        <!-- /.widget-inner --> 
      </div>
      <!-- /.widget-main --> 
    </div>
  </div>
</div>
<script>
$(function() {
$('#news-container').vTicker({
        speed: 800,
        pause: 2000,
        height: 290,
        showItems: 3,
        animation: 'fade',
        mousePause: true,
        
        
  });
});

</script>
<style>
 #news-container ul
 {
	 list-style:none;
 }
 .widget-title {
 	font-size:17px;
 }
 .stiker-fix {
    position: fixed;
    left: 1px;
    top: 170px;
    z-index: 9999;
}



 </style>
