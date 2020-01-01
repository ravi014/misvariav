<!--	<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
-->
<!-- page heading start-->

<div class="page-heading">
  <h4> DASHBOARD </h4>
  <ul class="breadcrumb">
    <li> <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a> </li>
    <li class="active"> My Dashboard </li>
  </ul>
</div>
<!-- page heading end--> 

<!--body wrapper start-->
<div class="wrapper">
  <div class="row">
    <div class="col-md-6"> 
      <!--statistics start-->
      <div class="row state-overview">
        <div class="col-md-6 col-xs-12 col-sm-6">
          <div class="panel purple">
            <div class="symbol"> <i class="fa fa-users"></i> </div>
            <div class="state-value">
              <div class="value" align="center">
                <?=$result[0]['tot']; ?>
              </div>
              <div class="title">Total Active Schools</div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xs-12 col-sm-6">
          <div class="panel red">
            <div class="symbol"> <i class="fa fa-tags"></i> </div>
            <div class="state-value">
              <div class="value">3490</div>
              <div class="title">Copy Sold</div>
            </div>
          </div>
        </div>
      </div>
      <div class="row state-overview">
        <div class="col-md-6 col-xs-12 col-sm-6">
          <div class="panel green">
            <div class="symbol"> <i class="fa fa-eye"></i> </div>
            <div class="state-value">
              <div class="value">390</div>
              <div class="title"> Unique Visitors</div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xs-12 col-sm-6">
          <div class="panel blue">
            <div class="symbol"> <i class="fa fa-money"></i> </div>
            <div class="state-value">
              <div class="value">22014</div>
              <div class="title"> Total Revenue</div>
            </div>
          </div>
        </div>
      </div>
      <!--statistics end--> 
    </div>
    <div class="col-md-6" style="">
      <div class="panel">
        <div class="panel-body">
          <div class="calendar-block ">
            <div class="cal1"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--body wrapper end-->
<style>
  
    .cal1 .clndr .clndr-controls .month {
    color: #fff;
}
</style>
