
<?php
if($this->uri->segment(1)== '')
{

    $active1 = 'menu-item-home current-menu-item';
}
else if($this->uri->segment(1) == 'about' || $this->uri->segment(1) == 'methodology' || $this->uri->segment(1) == 'mission' || $this->uri->segment(1) == 'principall' || $this->uri->segment(1) == 'admission_fees' )
{
    $active2 = 'menu-item-home current-menu-item';
}

else if($this->uri->segment(1) == 'founder' || $this->uri->segment(1) == 'president' || $this->uri->segment(1) == 'secretary' || $this->uri->segment(1) == 'director' || $this->uri->segment(1) == 'advisors')
{
    $active3 = 'menu-item-home current-menu-item';
}
else if($this->uri->segment(1) == 'curricular' || $this->uri->segment(1) == 'affiliation' || $this->uri->segment(1) == 'staff')
{
    $active4 = 'menu-item-home current-menu-item';
}
else if($this->uri->segment(1) == 'extracurricular' || $this->uri->segment(1) == 'sports' || $this->uri->segment(1) == 'achievements')
{
    $active5 = 'menu-item-home current-menu-item';
}
else if($this->uri->segment(1) == 'facilities' || $this->uri->segment(1) == 'classes' || $this->uri->segment(1) == 'library')
{
    $active6 = 'menu-item-home current-menu-item';
}
else if($this->uri->segment(1) == 'about_hostel' || $this->uri->segment(1) == 'daily_routine' || $this->uri->segment(1) == 'hostel_activity')
{
    $active7 = 'menu-item-home current-menu-item';
}
else if($this->uri->segment(1) == 'image_gallery' || $this->uri->segment(1) == 'video_gallery' || $this->uri->segment(1) == 'donation')
{
    $active8 = 'menu-item-home current-menu-item';
}
else if($this->uri->segment(1) == 'registration')
{
    $active9 = 'menu-item-home current-menu-item';
}
else
{
    $active10 = 'menu-item-home current-menu-item';
}

?>
<body class="home page-template-default page page-id-2039 gdlr-core-body woocommerce-no-js tribe-no-js kingster-body kingster-body-front kingster-full  kingster-with-sticky-navigation  kingster-blockquote-style-1 gdlr-core-link-to-lightbox">
    <div class="kingster-mobile-header-wrap">
        <div class="kingster-mobile-header kingster-header-background kingster-style-slide kingster-sticky-mobile-navigation " id="kingster-mobile-header">
            <div class="kingster-mobile-header-container kingster-container clearfix">
                <div class="kingster-logo  kingster-item-pdlr">
                    <div class="kingster-logo-inner">
                        <a class="" href="<?=base_url()?>"><img src="<?= base_url();?>asset/new_design/image_stat/mis-name.png" alt="" /></a>
                    </div>
                </div>
                <div class="kingster-mobile-menu-right">
                    <div class="kingster-main-menu-search" id="kingster-mobile-top-search"></div>
                    <div class="kingster-top-search-wrap">
                        <div class="kingster-top-search-close"></div>
                        <div class="kingster-top-search-row">
                            <div class="kingster-top-search-cell">
                                <form role="search" method="get" class="search-form" action="#">
                                    <input type="text" class="search-field kingster-title-font" placeholder="Search..." value="" name="s">
                                    <div class="kingster-top-search-submit"><i class="fa fa-search"></i></div>
                                    <input type="submit" class="search-submit" value="Search">
                                    <div class="kingster-top-search-close"><i class="icon_close"></i></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="kingster-mobile-menu"><a class="kingster-mm-menu-button kingster-mobile-menu-button kingster-mobile-button-hamburger" href="#kingster-mobile-menu"><span></span></a>
                        <div class="kingster-mm-menu-wrap kingster-navigation-font" id="kingster-mobile-menu" data-slide="right">
                            <ul id="menu-main-navigation" class="m-menu">
                                
                                <li class="menu-item menu-item-home current-menu-item menu-item-has-children"><a href="<?=base_url();?>">Home</a>
                                </li>
                                <li class="menu-item menu-item-has-children"><a href="#">The School</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/about">About Us</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/mission">Mission</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/methodology">Methodology</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/Principall">Principal's Desk</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/admission_fees">Admission & Fees</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children"><a href="#">Administration</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/Founder">Founder's Message</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/president">President's Message</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/secretary">Secretary's Message</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/director">Director' Message</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/advisors">Advisor's Desk</a></li>
                                    </ul>
                                </li>
                                
                           <!--      <li class="menu-item menu-item-has-children"><a href="apply-to-kingster.html">Education</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/curricular">Curricular</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/affiliation">Affiliation</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/staff">Staff</a></li>
                                    </ul>
                                </li> -->
                                <li class="menu-item menu-item-has-children"><a href="#">Activities</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/extracurricular">Extracurricular</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/sports">Sports</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/achievements">Achievements</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children"><a href="#">Campus</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/facilities">Facilities</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/classes">Classes</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/library">Library</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children"><a href="#">Gallery</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/image_gallery">Image Gallery</a></li>
                                        <li class="menu-item"><a href="<?=base_url();?>index.php/video_gallery">Video Gallery</a></li>
                                        <!-- <li class="menu-item"><a href="#">Media Gallery</a></li> -->

                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children"><a href="<?=base_url();?>index.php/registration">Registration</a>
                                </li>
                                <li class="menu-item menu-item-has-children"><a href="<?=base_url();?>index.php/contact">Contact</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="kingster-body-outer-wrapper ">
        <div class="kingster-body-wrapper clearfix  kingster-with-frame">
            <div class="kingster-top-bar">
                <div class="kingster-top-bar-background"></div>
                <div class="kingster-top-bar-container kingster-container ">
                    <div class="kingster-top-bar-container-inner clearfix">
                        <div class="kingster-top-bar-left kingster-item-pdlr"><i class="fa fa-envelope-open-o" id="i_fd84_0"></i> misvariav@gmail.com <i class="fa fa-phone" id="i_fd84_1"></i> +91 73599 80097 <i class="fa fa-phone" id="i_fd84_1"></i> +91 73599 80098</div>
                        <div class="kingster-top-bar-right kingster-item-pdlr">
                            <!-- <ul id="kingster-top-bar-menu" class="sf-menu kingster-top-bar-menu kingster-top-bar-right-menu">
                                <li class="menu-item kingster-normal-menu"><a href="#">CBSE Affiliation No : 430195</a></li>
                                <li class="menu-item kingster-normal-menu"><a href="#">School Code : 13161</a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
            <header class="kingster-header-wrap kingster-header-style-plain  kingster-style-menu-right kingster-sticky-navigation kingster-style-fixed" data-navigation-offset="75px">
                <div class="kingster-header-background"></div>
                <div class="kingster-header-container  kingster-container">
                    <div class="kingster-header-container-inner clearfix">
                        <div class="kingster-logo  kingster-item-pdlr">
                            <div class="kingster-logo-inner" >
                                <a class="" href="<?= base_url();?>"><img src="<?= base_url();?>asset/new_design/image_stat/mis-name.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="kingster-navigation kingster-item-pdlr clearfix ">
                            <div class="kingster-main-menu" id="kingster-main-menu">
                                <ul id="menu-main-navigation-1" class="sf-menu">
                                    <!-- menu-item-home current-menu-item  -->
                                    <li id="hello" class="menu-item <?=$active1;?> menu-item-has-children kingster-normal-menu"><a href="<?=base_url();?>" class="sf-with-ul-pre">Home</a>
                                    </li>
                                    <li class="menu-item <?=$active2;?> menu-item-has-children kingster-normal-menu"><a href="#" class="sf-with-ul-pre">The School</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/about">About Us</a></li>
                                            <!-- <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/inspirer">Inspirer</a></li> -->
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/mission">Mission</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/methodology">Methodology</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/Principall">Principal's Desk</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/admission_fees">Admission & Fees</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item <?=$active3;?> menu-item-has-children kingster-normal-menu"><a href="#" class="sf-with-ul-pre">Administration</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/founder">Founder's Message</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/president">Presindent's Message</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/secretary">Secretary's Message</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/director">Director's Message</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/advisors">ADVISOR'S DESK</a></li>




                                            <!-- <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/management">Management</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/chairman">Chairman's Message</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/principal">Principal's Desk</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/admission">Admission & Fees</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/tci">Scanned Transfer Certificates</a></li> -->
                                        </ul>
                                    </li>
                                   <!--  <li class="menu-item <?=$active4;?> menu-item-has-children kingster-normal-menu"><a href="#" class="sf-with-ul-pre">Education</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"data-size="60"><a href="<?=base_url();?>index.php/curricular">Curricular</a></li>
                                            <li class="menu-item"data-size="60"><a href="<?=base_url();?>index.php/affiliation">Affiliation</a></li>
                                            <li class="menu-item"data-size="60"><a href="<?=base_url();?>index.php/staff">Staff</a></li>
                                        </ul>
                                    </li> -->
                                    <li class="menu-item <?=$active5;?> menu-item-has-children kingster-normal-menu"><a href="#" class="sf-with-ul-pre">Activities</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/extracurricular">Extracurricular</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url()?>index.php/sports">Sports</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/achievements"> Our Achievements</a></li>
                                            <!-- <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/co_curricular">Co-curricular</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/sports">Sports</a></li>
                                             -->
                                        </ul>
                                    </li>
                                    <li class="menu-item <?=$active6;?> menu-item-has-children kingster-normal-menu"><a href="#" class="sf-with-ul-pre">Campus</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/facilities">Facilities</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/classes">Classes</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/library">Library</a></li>
                                        </ul>
                                    </li>
                                  <!--   <li class="menu-item <?=$active7;?> menu-item-has-children kingster-normal-menu"><a href="#" class="sf-with-ul-pre">Hostel</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/about_hostel">About Hostel</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/daily_routine">Daily Routine</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/hostel_activity">Hostel Activity</a></li>
                                         </ul>
                                    </li> -->
                                    <li class="menu-item <?=$active8;?> menu-item-has-children kingster-normal-menu"><a href="#" class="sf-with-ul-pre">Gallery</a>
                                        <ul class="sub-menu">
                                           <!--  <li class="menu-item" data-size="60"><a href="#">Media Gallery</a></li> -->
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/image_gallery">Image Gallery</a></li>
                                            <li class="menu-item" data-size="60"><a href="<?=base_url();?>index.php/video_gallery">Video Gallery</a></li>
                                        </ul>
                                    </li>
                                    
                                    
                                            <li class="menu-item <?=$active9;?> menu-item-has-children" data-size="60"><a href="<?=base_url();?>index.php/registration">Registration</a>
                                            </li>
                                            <li class="menu-item <?=$active10;?> menu-item-has-children" data-size="60"><a href="<?=base_url();?>index.php/contact">Contact</a>
                                            </li>
                                </ul>
                                <div class="kingster-navigation-slide-bar" id="kingster-navigation-slide-bar"></div>
                            </div>
                            <div class="kingster-main-menu-right-wrap clearfix ">
                                <div class="kingster-top-search-wrap">
                                    <div class="kingster-top-search-close"></div>
                                    <div class="kingster-top-search-row">
                                        <div class="kingster-top-search-cell">
                                            <form role="search" method="get" class="search-form" action="#">
                                                <input type="text" class="search-field kingster-title-font" placeholder="Search..." value="" name="s">
                                                <div class="kingster-top-search-submit"><i class="fa fa-search"></i></div>
                                                <input type="submit" class="search-submit" value="Search">
                                                <div class="kingster-top-search-close"><i class="icon_close"></i></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
<!-- sticky -->
<div class="jumplinks-menu-wrapper">
  <div>
    <div>
      <div class="jlinks-menu">
        <div class="jumplinks-container">
          <ul>
            <li><a href="<?= base_url()?>index.php/enquiry">
              <div class="jumplinks-documents"><span style="color:#ffffff;font-size: 15px;font-weight: 600;">Enquiry 20-21</span></div>
              </a></li>
          </ul>
        </div>
      </div>
      <div class="menu-button">
        <div class="menu-cross">
          <div class="line"> </div>
          <div class="line"> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
.jumplinks-menu-wrapper {
    position: fixed;
    right: 0;
    z-index: 99;
    padding-top: 29px;
}
#jLinkSliderContainer .swiper-slide {
    text-align: center;
    font-size: 18px;
}
.jlinks-menu {
    width: 200px;
}
.jlinks-menu a {
    color: #444;
    text-decoration: none;
}
.jlinks-menu-hidden {
    right: -200px;
}
.toggle-position {
    right: 30px;
}
.menu-button {
    position: absolute;
    top: 0;
    right: 185px;
    padding: 0;
    transform: scale(.5);
    cursor: pointer;
    -webkit-transition: .3s;
    transition: .3s;
    border-style: solid;
    border-width: 60px 60px 60px 0;
    border-color: transparent #00989d transparent transparent;
    height: 0;
    width: 0;
    top: 0;
}

.menu-button .bar:nth-of-type(1) {
    margin-top: 0;
    opacity: 0;
}
.menu-button .bar:nth-of-type(2) {
    opacity: 0;
}
.menu-button .bar:nth-of-type(3) {
    margin-bottom: 0;
    opacity: 0;
}
.line {
    position: relative;
    display: block;
    width: 50px;
    height: 5px;
    background-color: #ccc;
    border-radius: 10px;
    -webkit-transition: .3s;
    transition: .3s;
}
.menu-cross {
    margin-top: -15px;
    margin-left: 15px;
    -webkit-transform: scale(.8);
            -ms-transform: scale(.8);
            transform: scale(.8);
}
.menu-cross .line:nth-of-type(1) {
        -webkit-transform: translateY(15px) rotate(-45deg);
            -ms-transform: translateY(15px) rotate(-45deg);
            transform: translateY(15px) rotate(-45deg);
            opacity: 1;
}
.menu-cross .line:nth-of-type(2) {
    -webkit-transform: translateY(-15px) rotate(45deg);
    -ms-transform: translateY(-15px) rotate(45deg);
    transform: translateY(-15px) rotate(45deg);
    opacity: 1;
    margin-top: 25px;
}
.menu-cross .line:nth-of-type(1):hover,
.menu-cross .line:nth-of-type(2):hover{
    color: #a6b4c4;
        }
.cross-hidden {
    display: none;
}
.jumplinks-container {
    /*background-color: white;*/
    background-color: darkseagreen;
    font-size: .75em;
    border: 1px solid darkseagreen;
    text-align: left;
    color: #333;
}
.jumplinks-container ul li a {
  border-bottom: 0;
}
.jumplinks-container ul {
    margin: 0;
    padding: 0;
}
.jumplinks-container ul li {
    list-style: none;
    width: 100%;
    height: 60px;
    border-bottom: 1px solid #ccc;
    margin: 0;
    padding: 0;
}
.jumplinks-container ul li:last-of-type {
    border-bottom: 0;
}
.jumplinks-container img {
    height: 30px;
    width: auto;
}
/*.jumplinks-container ul li:hover {
    background-color: white;
    background-color: white;
    cursor: pointer;
}*/
.jumplinks-container ul li span {
    position: relative;
  top: -22px;
}
.jumplinks-container ul li a:visited {
  color: #777;
}
/*-------------------------------------------------
Icons
-------------------------------------------------*/

.jumplinks-documents:before {
    content: url(https://evoq-eval.siam.org/Portals/0/Images/jumplinks-documents.png);
}

 </style>
<script type="text/javascript">
   
    $('.menu-button').on('click', function(){
    $('.menu-cross').toggleClass('cross-hidden');
        $('.jumplinks-menu-wrapper').toggleClass('jlinks-menu-hidden');
});
</script> 
<!-- sticky end -->