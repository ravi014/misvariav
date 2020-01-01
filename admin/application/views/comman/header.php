<?php
	$arr_home		=	array('home');
	$seg_one=$this->uri->segment(1);
	 if(in_array($this->uri->segment(1),$arr_home)){
		switch($seg_one){
			case "home":
				$sub_home='active';break;
		}
	}

	$arr_admin		=	array('school_admin');
	$seg_one=$this->uri->segment(1);
	 if(in_array($this->uri->segment(1),$arr_admin)){
		$main_admin='nav-active';
		switch($seg_one){
			case "school_admin":
				$sub_school_admin='active';break;
		}
	}
	
	$arr_master		=	array('country','state','city');
	$seg_one=$this->uri->segment(1);
	 if(in_array($this->uri->segment(1),$arr_master)){
		$main_master='nav-active';
		switch($seg_one){
			case "country":
				$sub_country='active';break;
				case "state":
				$sub_state='active';break;
				case "city":
				$sub_city='active';break;
		}
	}
	

?>

<section>
<!-- left side start-->
<div class="left-side sticky-left-side"> 
  
  <!--logo and iconic logo start-->
  <div class="logo" align="center"> <a href="#"><img src="<?php echo base_url();?>asset/images/student.png" alt="" width="60" class="img img-round"></a> </div>
  <div class="logo-icon text-center"> <a href="#"><img src="<?php echo base_url();?>asset/images/student.png" width="44" alt=""></a> </div>
  <!--logo and iconic logo end-->
  
  <div class="left-side-inner"> 
    
    <!-- visible to small devices only -->
    <div class="visible-xs hidden-sm hidden-md hidden-lg">
      <div class="media logged-user"> <!--<img alt="" src="<?php echo base_url();?>asset/images/student.png" class="media-object">-->
        <div class="media-body">
          <h4><a href="#">        <?=$this->session->userdata['logged_in_user']?>
</a></h4>
          <span>"Hello There..."</span> </div>
      </div>
      <h5 class="left-nav-title">Account Information</h5>
      <ul class="nav nav-pills nav-stacked custom-nav">
        <!--<li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
        <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
        --><li><a href="<?php echo base_url();?>index.php/login/logout"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
      </ul>
    </div>
    
    <!--sidebar nav start-->
    <ul class="nav nav-pills nav-stacked custom-nav">
    <br>
     <li class="<?=$sub_home?>"><a href="<?=base_url()?>index.php/home"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
    
     <li class="menu-list <?=$main_master?>"><a href=""> <i class="fa fa-maxcdn"></i><span>Master</span></a>
        <ul class="sub-menu-list">
          <li class="<?=$sub_country?>"><a href="<?=base_url()?>index.php/country/addnew/Add"><i class="fa fa-plus"></i><span>Country</span></a></li>
          <li class="<?=$sub_state?>"><a href="<?=base_url()?>index.php/state/addnew/Add"><i class="fa fa-plus"></i><span>State</span></a></li>
          <li class="<?=$sub_city?>"><a href="<?=base_url()?>index.php/city/addnew/Add"><i class="fa fa-plus"></i><span>City</span></a></li>

        </ul>
      </li>
      
     
      <li class="menu-list <?=$main_admin?>"><a href=""><i class="fa fa-users"></i> <span>School </span></a>
        <ul class="sub-menu-list">
          <li class="<?=$sub_school_admin?>"><a href="<?=base_url()?>index.php/school_admin">School View</a></li>
        </ul>
      </li>
     
    </ul>
    <!--sidebar nav end--> 
    
  </div>
</div>
<!-- left side end--> 

<!-- main content start-->
<div class="main-content" >

<!-- header section start-->
<div class="header-section"> 
  
  <!--toggle button start--> 
  <a class="toggle-btn"><i class="fa fa-bars"></i></a> 
  <!--toggle button end-->
  <p class="top-title">
 <strong>Welcome,</strong>    <?=$this->session->userdata['logged_in_user']?>
  </p>

  <!--notification menu start -->
  <div class="menu-right">
    <ul class="notification-menu">
      <li> <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        <?=$this->session->userdata['logged_in_user']?>
        <span class="caret"></span> </a>
        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
          <!--<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>--> 
          <!--<li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>-->
          <li><a href="<?php echo base_url();?>index.php/login/logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <!--notification menu end --> 
  
</div>
<!-- header section end-->
<style>
	.top-title
	{
		float:left;		
		padding:14px 10px 10px 10px;
		margin:0px;
		color:#333;
	}
</style>
