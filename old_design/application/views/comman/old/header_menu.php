<body id="homepage">
<header>

			<!-- ==== TOOLS START ==== -->
			<div class="tools">
				<div class="container">
					<ul class="pull-left">
						
					</ul>
					<ul class="pull-right">
                    	<li><a href="tel:91 2692 283845"><i class="fa fa-phone"></i><span>91 2692 283845</span></a></li>
						<li><a href="mailto:info@sspis.org"><i class="fa fa-envelope"></i><span>info@sspis.org</span></a></li>
						<li>&nbsp;&nbsp;<span>CBSE Affiliation No:430195</span></a></li>
						<li>&nbsp;&nbsp;<span>School Code:13161</span></a></li>
						<li><a href="#"><i class="fa fa-user"></i><span>Inquire</span></a></li>
						<!--<li><a href="login.html"><i class="fa fa-lock"></i><span>Log In</span></a></li>-->
					</ul>
				</div>
			</div>
            <div class="headerline"></div>
			<!-- ==== TOOLS END ==== -->

			<!-- ==== NAVBAR START ==== -->
			<div class="navbar navbar-default navbar-static-top" role="navigation">
				<div class="container_menu">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="<?=base_url();?>" class="navbar-brand"><img src="<?=base_url();?>asset/images/ssp-logo.png" class="img-responsive logo" /></a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right" style="margin-right:10px!important;">
							<li><a href="<?=base_url();?>">Home</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">THE SCHOOL<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?=base_url();?>index.php/about">About Us</a></li>
									<li><a href="<?=base_url();?>index.php/inspirer">Inspirer</a></li>
                                    <li><a href="<?=base_url();?>index.php/mission">Mission</a></li>
                                    <li><a href="<?=base_url();?>index.php/school">The School</a></li>
                                   
								</ul>
							</li>
                             <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">ADMINISTRATION<b class="caret"></b></a>
								<ul class="dropdown-menu">
									
									<li><a href="<?=base_url();?>index.php/chairman">Chairman's Message</a></li>
									<li><a href="<?=base_url();?>index.php/principal">Principal's Desk</a></li>
                                    <li><a href="<?=base_url();?>index.php/admission">Admission & Fees</a></li>
                                    <!--<li><a href="<?=base_url();?>index.php/management">Management</a></li>-->

								</ul>
							</li>
                             <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">EDUCATION<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?=base_url();?>index.php/curricular">Curricular</a></li>
									<li><a href="<?=base_url();?>index.php/affiliation">Affiliation</a></li>
									<li><a href="<?=base_url();?>index.php/staff">Staff</a></li>
								</ul>
							</li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">ACTIVITIES<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?=base_url();?>index.php/co_curricular">Co-curricular</a></li>
									<li><a href="<?=base_url();?>index.php/sports">Sports</a></li>
									<li><a href="<?=base_url();?>index.php/achievements">Achievements</a></li>
								</ul>
							</li>
                             <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Campus<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?=base_url();?>index.php/facilities">Facilities</a></li>
                                    <li><a href="<?=base_url();?>index.php/classes">Classes</a></li>
                                    <li><a href="<?=base_url();?>index.php/library">Library</a></li>
								</ul>
							</li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Hostel<b class="caret"></b></a>
                            <ul class="dropdown-menu">
									<li><a href="<?=base_url();?>index.php/about_hostel">About Hostel</a></li>
                                    <li><a href="<?=base_url();?>index.php/daily_routine">Daily Routine</a></li>
                                    <li><a href="<?=base_url();?>index.php/hostel_activity">Hostel Activity</a></li>
								</ul>
                            </li>
                             <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Gallery<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?=base_url();?>index.php/image_gallery">Image Gallery</a></li>
                                    <li><a href="<?=base_url();?>index.php/video_gallery">Video Gallery</a></li>
								</ul>
							</li>
                            <!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Registration<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?=base_url();?>index.php/registration">Registration</a></li>
								</ul>
							</li>-->
                            <li class="dropdown"><a href="<?=base_url();?>index.php/registration">Registration</a></li>
                            <li class="dropdown"><a href="<?=base_url();?>index.php/contact">CONTACT</a></li>							
						</ul>
					</div>
				</div>
			</div>
			<!-- ==== NAVBAR END ==== -->
			 <!---STIKER DIV---->
            <style>
                .stiker-fix{
                    position:fixed;
                    left:1px;
                    top:150px;
                    z-index:9999;
                }
                .stiker-fix ul{
                    list-style:none;
                }
                .stiker-fix ul li{
                    margin-bottom:10px;
                }
				
				.stiker-fix2{
                    position:fixed;
                    right:5px;
                    bottom:100px;
                    z-index:9999;
                }
                .stiker-fix2 ul{
                    list-style:none;
                }
                .stiker-fix2 ul li{
                    margin-bottom:10px;
                }
            </style>
            <div class="stiker-fix">
            	<a href="<?=base_url();?>index.php/inquiry" ><img src="<?=base_url();?>asset/images/sspis-admissions-open-tag.png" alt="admission-open-sspis-navli" width="150"></a>
            </div>
            <!--<div class="stiker-fix2">
            <ul>
                <li><a href="#"><img src="<?=base_url();?>asset/images/fb-icon.jpg" alt="Facebook" width="40"></a></li>
                <li><a href="#"><img src="<?=base_url();?>asset/images/youtube.jpg" alt="YouTube" width="40"></a></li>
                <li><a href="#"><img src="<?=base_url();?>asset/images/ggle-pls.png" alt="Google Plus" width="40"></a></li>
                <li><a href="#"><img src="<?=base_url();?>asset/images/twitter.jpg" alt="Twitter" width="40"></a></li>
            </ul>
            </div>-->
            <!---STIKER DIV END---->
		</header>