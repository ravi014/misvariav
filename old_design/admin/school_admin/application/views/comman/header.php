<?php

$arr_home = array( 'home' );
$seg_one = $this->uri->segment( 1 );
if ( in_array( $this->uri->segment( 1 ), $arr_home ) ) {
	switch ( $seg_one ) {
		case "home":
			$sub_home = 'active';
			break;
	}
}


$arr_master = array( 'settings_mst', 'year_mst', 'standard_mst', 'division_mst', 'subject_mst', 'exam_list' );
$seg_one = $this->uri->segment( 1 );
if ( in_array( $this->uri->segment( 1 ), $arr_master ) ) {
	$main_master = 'nav-active';
	switch ( $seg_one ) {

		case "settings_mst":
			$sub_settings_mst = 'active';
			break;

		case "year_mst":
			$sub_year_mst = 'active';
			break;

		case "standard_mst":
			$sub_standard_mst = 'active';
			break;

		case "division_mst":
			$sub_division_mst = 'active';
			break;

		case "subject_mst":
			$sub_subject_mst = 'active';
			break;

		case "exam_list":
			$sub_exam_list = 'active';
			break;



	}
}


$arr_master = array( 'fee_head', 'fee_mgt','fee_collection','fee_report','fee_installment_term' );
$seg_one = $this->uri->segment( 1 );
if ( in_array( $this->uri->segment( 1 ), $arr_master ) ) {
	$main_fees = 'nav-active';
	switch ( $seg_one ) {

		case "fee_head":
			$sub_fee_head = 'active';
			break;

		case "fee_mgt":
			$sub_fee_mgt = 'active';
			break;
		case "fee_collection":
			$sub_fee_collection = 'active';
			break;	
			
		case "fee_report":
			$sub_fee_report = 'active';
			break;
			
			case "fee_installment_term":
			$sub_fee_installment_term = 'active';
			break;

		

		



	}
}

$arr_master = array( 'hostel_admission', 'hostel_fee_mgt' );
$seg_one = $this->uri->segment( 1 );
if ( in_array( $this->uri->segment( 1 ), $arr_master ) ) {
	$main_hostel_management = 'nav-active';
	switch ( $seg_one ) {

		case "hostel_fee_mgt":
			$sub_hostel_fee_mgt = 'active';
			break;

		case "hostel_admission":
			$sub_hostel_admission = 'active';
			break;
	}
}



$arr_user_management = array( 'user_type', 'users' );
$seg_one = $this->uri->segment( 1 );
if ( in_array( $this->uri->segment( 1 ), $arr_user_management ) ) {
	$main_user_management = 'nav-active';
	switch ( $seg_one ) {
		case "user_type":
			$sub_user_type = 'active';
			break;

		case "users":
			$sub_users = 'active';
			break;


	}
}


$arr_student_management = array( 'student_admission', '' );
$seg_one = $this->uri->segment( 1 );
if ( in_array( $this->uri->segment( 1 ), $arr_student_management ) ) {
	$main_student_management = 'nav-active';
	switch ( $seg_one ) {
		case "student_admission":
			$sub_student_admission = 'active';
			break;


	}
}
$arr_media = array( 'event', 'news', 'photo_gallery', 'video_list' );
$seg_one = $this->uri->segment( 1 );
if ( in_array( $this->uri->segment( 1 ), $arr_media ) ) {
	$main_media = 'nav-active';
	switch ( $seg_one ) {
		case "event":
			$sub_event = 'active';
			break;

		case "news":
			$sub_news = 'active';
			break;

		case "photo_gallery":
			$sub_p_gallery = 'active';
			break;

		case "video_list":
			$sub_v_gallery = 'active';
			break;
	}
}




$arr_notification = array( 'sms', 'notification', 'sms_login_dt' );

if ( in_array( $this->uri->segment( 1 ), $arr_notification ) ) {
	$main_notification = 'nav-active';
	switch ( $seg_one ) {
		case "sms":
			$sub_sms = 'active';
			break;

		case "notification":
			$sub_notification = 'active';
			break;

		case "sms_login_dt":
			$sub_sms_login_dt = 'active';
			break;
	}
}



$arr_food = array( 'food_menu', 'food' );

if ( in_array( $this->uri->segment( 1 ), $arr_food ) ) {
	$main_food = 'nav-active';
	switch ( $seg_one ) {
		case "food_menu":
			$sub_food_menu = 'active';
			break;

		case "food":
			$sub_food = 'active';
			break;
	}
}

$arr_timetable = array( 'timetable' );

if ( in_array( $this->uri->segment( 1 ), $arr_timetable ) ) {
	$main_timetable = 'nav-active';
	switch ( $seg_one ) {
		case "timetable":
			$sub_timetable = 'active';
			break;
	}
}

$arr_exam_result = array( 'exam_result' );

if ( in_array( $this->uri->segment( 1 ), $arr_exam_result ) ) {
	$main_exam_result = 'nav-active';
	switch ( $seg_one ) {
		case "exam_result":
			$sub_exam_result = 'active';
			break;
	}
}

$arr_exam_schedule = array( 'exam_schedule' );

if ( in_array( $this->uri->segment( 1 ), $arr_exam_schedule ) ) {
	$main_exam_schedule = 'nav-active';
	switch ( $seg_one ) {
		case "exam_schedule":
			$sub_exam_schedule = 'active';
			break;
	}
}



$arr_feedback = array( 'feedback' );

if ( in_array( $this->uri->segment( 1 ), $arr_feedback ) ) {
	$main_feedback = 'nav-active';
	switch ( $seg_one ) {
		case "feedback":
			$sub_feedback = 'active';
			break;
	}
}


$arr_web = array( 'slider_img', 'header_img', 'announcement', 'achievement', 'cms_page', 'staff_cms', 'web_video', 'resume' );
$seg_web = $this->uri->segment( 1 );
if ( in_array( $this->uri->segment( 1 ), $arr_web ) ) {
	$main_web = 'nav-active';
	switch ( $seg_web ) {

		case "slider_img":
			$slider_img = 'active';
			break;

		case "header_img":
			$header_img = 'active';
			break;

		case "announcement":
			$announcement = 'active';
			break;

		case "achievement":
			$achievement = 'active';
			break;

		case "cms_page":
			$cms_page = 'active';
			break;

		case "staff_cms":
			$staff_cms = 'active';
			break;

		case "web_video":
			$web_video = 'active';
			break;

		case "resume":
			$resume = 'active';
			break;

	}
}

if ( $this->uri->segment( 1 ) == "student_admission_inquiry" ) {
	$main_inquiry_ad = 'active';
}

if ( $this->uri->segment( 1 ) == "transfer_certificate_issued" ) {
	$main_tci = 'active';
}

?>

<section>
	<!-- left side start-->
	<div class="left-side sticky-left-side">

		<!--logo and iconic logo start-->
		<div class="logo" align="center">
			<a href="#">
				<?php if($this->session->userdata['logged_in_school']['image']!='') { ?>
				<img src="<?php echo main_url();?>upload/img_thum/<?php echo $this->session->userdata['logged_in_school']['image']?>" alt="" width="70" height="70" class="img img-circle"/>
			</a>

			<?php }else { ?>
			<img src="<?php echo main_url();?>asset/images/student.png" alt="" width="70" height="70" class="img img-circle">
			</a>

			<?php } ?>
		</div>
		<div class="logo-icon text-center">

			<a href="#">
				<?php if($this->session->userdata['logged_in_school']['image']!='') { ?>
				<img src="<?php echo main_url();?>upload/img_thum/<?php echo $this->session->userdata['logged_in_school']['image']?>" width="44" height="70" class="img img-circle" alt=""/>
			</a>
			<!--logo and iconic logo end-->
			<?php }else { ?>
			<img src="<?php echo main_url();?>asset/images/student.png" width="44" height="70" class="img img-circle" alt="">
			</a>

			<?php } ?>
		</div>
		<div class="left-side-inner">

			<!-- visible to small devices only -->
			<div class="visible-xs hidden-sm hidden-md hidden-lg">
				<div class="media logged-user">
					<!--<img alt="" src="<?php echo main_url();?>asset/images/photos/user-avatar.png" class="media-object">-->
					<div class="media-body">
						<h4><a href="#">        <?php echo $this->session->userdata['logged_in_school']['name']?>
</a></h4>
						<span>"Hello There..."</span> </div>
				</div>
				<h5 class="left-nav-title">Account Information</h5>
				<ul class="nav nav-pills nav-stacked custom-nav">
					<!--<li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
        <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
        -->
					<li><a href="<?php echo base_url();?>index.php/profile/view"><i class="fa fa-cog"></i> <span>Profile</span></a>
					</li>

					<li><a href="<?php echo base_url();?>index.php/changepwd/view"><i class="fa fa-cog"></i> <span>Change Password</span></a>
					</li>

					<li><a href="<?php echo main_url();?>index.php/login/schooladmin_logout"><i class="fa fa-sign-out"></i> <span>Log Out</span></a>
					</li>
				</ul>
			</div>

			<!--sidebar nav start-->
			<br>
			<br/>
			<ul class="nav nav-pills nav-stacked custom-nav">

				<li class="<?=$sub_home?>"><a href="<?=base_url()?>index.php/home"><i class="fa fa-home"></i> <span>Dashboard</span></a>
				</li>



				<li class="menu-list <?=$main_master?>"><a href=""> <i class="fa fa-maxcdn"></i><span>Master</span></a>
					<ul class="sub-menu-list">

						<li class="<?=$sub_settings_mst?>"><a href="<?=base_url()?>index.php/settings_mst"><i class="fa fa-cog"></i><span>Settings</span></a>
						</li>
						<li class="<?=$sub_year_mst?>"><a href="<?=base_url()?>index.php/year_mst/addnew/Add"><i class="fa fa-calendar"></i><span>Current Year</span></a>
						</li>
						<li class="<?=$sub_standard_mst?>"><a href="<?=base_url()?>index.php/standard_mst/addnew/Add"><i class="fa fa-university "></i><span>Standard</span></a>
						</li>
						<li class="<?=$sub_division_mst?>"><a href="<?=base_url()?>index.php/division_mst/view"><i class="fa fa-cubes"></i><span>Division</span></a>
						</li>
						<li class="<?=$sub_subject_mst?>"><a href="<?=base_url()?>index.php/subject_mst/view"><i class="fa fa-book"></i><span>Subject</span></a>
						</li>
						<li class="<?=$sub_exam_list?>"><a href="<?=base_url()?>index.php/exam_list/addnew/Add"><i class="fa fa-list-alt"></i><span>Exam List</span></a>
						</li>

					</ul>
				</li>

				
				<li class="menu-list <?=$main_fees?>"><a href=""> <i class="fa fa-inr"></i><span>Fee Management</span></a>
					<ul class="sub-menu-list">

						<li class="<?=$sub_fee_head?>"><a href="<?=base_url()?>index.php/fee_head"><span>Fee Head</span></a>
						</li>
						<li class="<?=$sub_fee_mgt?>"><a href="<?=base_url()?>index.php/fee_mgt"><span>Fee Management</span></a>
						</li>
                        <li class="<?=$sub_fee_collection?>"><a href="<?=base_url()?>index.php/fee_collection"><span>Fee Collection</span></a>
						</li>
						<li class="<?=$sub_fee_report?>"><a href="<?=base_url()?>index.php/fee_report"><span>Fee Report</span></a>
						</li>
						<li class="<?=$sub_fee_installment_term?>"><a href="<?=base_url()?>index.php/fee_installment_term"><span>Fee Installment Term</span></a>
						</li>

					</ul>
				</li>
				
				<li class="<?=$main_tci?>"><a href="<?=base_url()?>index.php/transfer_certificate_issued"><span><i class="fa fa-user"></i><span>Transfer Certificate</span></a>
					
				</li>
				
				<li class="menu-list <?=$main_web?>"><a href=""> <i class="fa fa-desktop"></i><span>Website Management</span></a>
					<ul class="sub-menu-list">

						<li class="<?=$slider_img?>"><a href="<?=base_url()?>index.php/slider_img"><i class="fa fa-image"></i><span>Slider Image</span></a>
						</li>
						<li class="<?=$header_img?>"><a href="<?=base_url()?>index.php/header_img"><i class="fa fa-calendar"></i><span>Page Header Iamge</span></a>
						</li>
						<li class="<?=$announcement?>"><a href="<?=base_url()?>index.php/announcement"><i class="fa fa-list-alt"></i><span>Annoucement</span></a>
						</li>
						<li class="<?=$achievement?>"><a href="<?=base_url()?>index.php/achievement"><i class="fa fa-archive"></i><span>Achivements</span></a>
						</li>
						<li class="<?=$cms_page?>"><a href="<?=base_url()?>index.php/cms_page"><i class="fa fa-navicon"></i><span>CMS Pages</span></a>
						</li>
						<li class="<?=$staff_cms?>"><a href="<?=base_url()?>index.php/staff_cms"><i class="fa fa-users"></i><span>Staff</span></a>
						</li>
						<li class="<?=$web_video?>"><a href="<?=base_url()?>index.php/web_video"><i class="fa fa-film"></i><span>Video</span></a>
						</li>
						<li><a href="<?=base_url()?>index.php/registration"><i class="fa fa-film"></i><span>Alumni Registration</span></a>
						</li>
						<!--<li class="<?=$resume?>"><a href="<?=base_url()?>index.php/resume"><i class="fa fa-file"></i><span>Resume</span></a></li>-->

						<!--<li class=""><a href="<?=base_url()?>index.php/standard_mst/addnew/Add"><i class="fa fa-university "></i><span>Event Management</span></a></li>
            <li class=""><a href="<?=base_url()?>index.php/division_mst/view"><i class="fa fa-cubes"></i><span>Video Management</span></a></li>
        	<li class=""><a href="<?=base_url()?>index.php/subject_mst/view"><i class="fa fa-book"></i><span>Resume</span></a></li>-->

					</ul>
				</li>


				<li class="menu-list <?=$main_user_management?>"><a href=""> <i class="fa fa-users"></i>    <span>User Management</span></a>
					<ul class="sub-menu-list">

						<li class="<?=$sub_users?>"><a href="<?=base_url()?>index.php/users"><i class="fa fa-users"></i><span>Users</span></a>
						</li>
						<li class="<?=$sub_user_type?>"><a href="<?=base_url()?>index.php/user_type/addnew/Add"><i class="fa fa-user-md"></i><span>User Type Master</span></a>
						</li>
					</ul>
				</li>


				<li class="menu-list <?=$main_student_management?>"><a href=""> <i class="fa fa-user"></i><span>Student Management</span></a>
					<ul class="sub-menu-list">
						<li class="<?=$sub_student_admission?>"><a href="<?=base_url()?>index.php/student_admission"><i class="fa fa-male  "></i><span>Students</span></a>
						</li>

					</ul>
				</li>
				
				<li class="menu-list <?=$main_hostel_management?>"><a href=""> <i class="fa fa-user"></i><span>Hostel Management</span></a>
					<ul class="sub-menu-list">
						<li class="<?=$sub_hostel_fee_mgt?>"><a href="<?=base_url()?>index.php/hostel_fee_mgt"><span>Fee Management</span></a>
						</li>
						<li class="<?=$sub_hostel_admission?>"><a href="<?=base_url()?>index.php/hostel_admission"><span>Hostel Students</span></a>
						</li>
						

					</ul>
				</li>

				<li class="<?=$main_inquiry_ad?>"><a href="<?=base_url()?>index.php/student_admission_inquiry"> <i class="fa fa-user"></i><span>Admission Inquiry</span></a>
				</li>


				<li class="menu-list <?=$main_media?>"><a href=""> <i class="fa fa-film"></i><span>Web Media</span></a>
					<ul class="sub-menu-list">

						<li class="<?=$sub_event?>"><a href="<?=base_url()?>index.php/event"><i class="fa fa-calendar"></i><span>  Events</span></a>
						</li>
						<li class="<?=$sub_news?>"><a href="<?=base_url()?>index.php/news"><i class="fa fa-newspaper-o"></i><span> News</span></a>
						</li>
						<li class="<?=$sub_p_gallery?>"><a href="<?=base_url()?>index.php/photo_gallery"><i class="fa fa-camera"></i><span> Photo Gallery</span></a>
						</li>
						<li class="<?=$sub_v_gallery?>"><a href="<?=base_url()?>index.php/video_list"><i class="fa fa-youtube-play"></i><span> Video Gallery</span></a>
						</li>

					</ul>
				</li>



				<li class="menu-list <?=$main_notification?>"><a href=""><i class="fa fa-bell-o"></i> <span>Notification Alert</span></a>
					<ul class="sub-menu-list">

						<li class="<?=$sub_sms?>"><a href="<?=base_url()?>index.php/sms"><i class="fa fa-mobile"></i> <span>Send Normal SMS</span></a>
						</li>
						<li class="<?=$sub_notification?>"><a href="<?=base_url()?>index.php/notification"><i class="fa fa-mobile"></i> <span>Mobile Notification</span></a>
						</li>
						<li class="<?=$sub_sms_login_dt?>"><a href="<?=base_url()?>index.php/sms_login_dt"><i class="fa fa-mobile"></i> <span>Send Login Details</span></a>
						</li>

					</ul>
				</li>


				<li class="menu-list <?=$main_food?>"><a href=""><i class="fa fa-cutlery"></i> <span>Food Menu</span></a>
					<ul class="sub-menu-list">

						<li class="<?=$sub_food_menu?>"><a href="<?=base_url()?>index.php/food_menu"><i class="fa fa-list"></i> <span>Food Menu Master</span></a>
						</li>
						<li class="<?=$sub_food?>"><a href="<?=base_url()?>index.php/food"><i class="fa fa-cutlery"></i> <span>Food Menu</span></a>
						</li>

					</ul>
				</li>
				<li class="<?=$main_holiday?>"><a href="<?=base_url()?>index.php/holiday"><i class="fa fa-list"></i> <span>Holiday List</span></a>
				</li>

				<li class="<?=$main_student_timetable?>"><a href="<?=base_url()?>index.php/student_timetable"><i class="fa fa-table"></i> <span>Timetable </span></a>
				</li>

				<li class="<?=$main_exam_mst?>"><a href="<?=base_url()?>index.php/exam_mst/view"><i class="fa fa-clock-o"></i> <span>Exam Schedule</span></a>
				</li>

				<li class="<?=$main_result_master?>"><a href="<?=base_url()?>index.php/result_master"><i class="fa fa-file-text-o"></i> <span>Exam Result </span></a>
				</li>

				<li class="<?=$sub_feedback?>"><a href="<?=base_url()?>index.php/feedback/view"><i class="fa fa-comment"></i> <span>Feedback </span></a>
				</li>



			</ul>
			<!--sidebar nav end-->

		</div>
	</div>
	<!-- left side end-->

	<!-- main content start-->
	<div class="main-content">

		<!-- header section start-->
		<div class="header-section">

			<!--toggle button start-->
			<a class="toggle-btn"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->
			<p class="top-title">
				<strong>Welcome,</strong>
				<?=$this->session->userdata['logged_in_school']['emailid']?>
			</p>

			<!--notification menu start -->
			<div class="menu-right">
				<ul class="notification-menu">
					<li> <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        <?=$this->session->userdata['logged_in_school']['name']?>
        <span class="caret"></span> </a>
					
						<ul class="dropdown-menu dropdown-menu-usermenu pull-right">
							<!--<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>-->
							<!--<li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>-->
							<li><a href="<?php echo base_url();?>index.php/profile/view"><i class="fa fa-cog"></i> <span>Profile</span></a>
							</li>

							<li><a href="<?php echo base_url();?>index.php/changepwd/view"><i class="fa fa-edit"></i> <span>Change Password</span></a>
							</li>

							<li><a href="<?php echo main_url();?>index.php/login/schooladmin_logout"><i class="fa fa-sign-out"></i> Log Out</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!--notification menu end -->

		</div>
		<!-- header section end-->
		<style>
			.top-title {
				float: left;
				padding: 14px 10px 10px 10px;
				margin: 0px;
				color: #333;
			}
		</style>