<?php
	
	$arr_home		=	array('home');
	$seg_one=$this->uri->segment(1);
	 if(in_array($this->uri->segment(1),$arr_home)){
		switch($seg_one){
			case "home":
				$sub_home='active';break;
		}
	}
	
	
?>

<section>
<!-- left side start-->
<div class="left-side sticky-left-side"> 
  
  <!--logo and iconic logo start-->
  <div class="logo" align="center"> <a href="#"> 
  <?php if($this->session->userdata['logged_in_school_user']['image']!='') { ?>
  <img src="<?php echo main_url();?>upload/img_thum/<?php echo $this->session->userdata['logged_in_school_user']['image']?>" alt="" width="70" height="70" class="img img-circle"/></a>
  
  <?php }else { ?>
    <img src="<?php echo main_url();?>asset/images/student.png" alt="" width="70" height="70" class="img img-circle"></a>

  <?php } ?>
  </div>
  <div class="logo-icon text-center"> 
  
  <a href="#">
   <?php if($this->session->userdata['logged_in_school_user']['image']!='') { ?>
  <img src="<?php echo main_url();?>upload/img_thum/<?php echo $this->session->userdata['logged_in_school_user']['image']?>" width="44" height="70" class="img img-circle" alt=""/></a>
  <!--logo and iconic logo end-->
  <?php }else { ?>
   <img src="<?php echo main_url();?>asset/images/student.png" width="44" height="70" class="img img-circle" alt=""></a>

  <?php } ?>
   </div>
  <div class="left-side-inner"> 
    
    <!-- visible to small devices only -->
    <div class="visible-xs hidden-sm hidden-md hidden-lg">
      <div class="media logged-user"> <!--<img alt="" src="<?php echo main_url();?>asset/images/photos/user-avatar.png" class="media-object">-->
        <div class="media-body">
          <h4><a href="#">        <?php echo $this->session->userdata['logged_in_school_user']['name']?>
</a></h4>
          <span>"Hello There..."</span> </div>
      </div>
     <h5 class="left-nav-title">Account Information</h5>
      <ul class="nav nav-pills nav-stacked custom-nav">
      <li><a href="<?php echo main_url();?>index.php/login/schooluser_logout"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
      </ul>
    </div>
    
    <!--sidebar nav start-->
     <br>
    <br/> 
    <ul class="nav nav-pills nav-stacked custom-nav">
   
      <li class="<?=$sub_home?>"><a href="<?=base_url()?>index.php/home"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
   
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
<strong>Welcome,</strong>  <?=$this->session->userdata['logged_in_school_user']['emailid']?>
  </p>

  <!--notification menu start -->
  <div class="menu-right">
    <ul class="notification-menu">
      <li> <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        <?=$this->session->userdata['logged_in_school_user']['name']?>
        <span class="caret"></span> </a>
        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
          <!--<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>--> 
          <!--<li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>-->
           <li><a href="<?php echo main_url();?>index.php/login/schooluser_logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
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
