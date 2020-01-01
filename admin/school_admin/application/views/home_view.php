<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
-->
    <!-- page heading start-->
     <div class="page-heading">
            <h4>
                DASHBOARD 
            </h4>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/home">Dashboard</a>
                </li>
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
                                <div class="symbol">
                                    <i class="fa fa-calendar"></i>
                                  
                                </div>
                                <div class="state-value">
                                    <div class="value"  align="center"><?=$result[0]['tot']; ?></div>
                                    <div class="title">Total Active Events</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel red">
                                <div class="symbol">
                                    <i class="fa fa-newspaper-o"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value"  align="center"><?=$result1[0]['tot']; ?></div>
                                    <div class="title">Total Active News</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row state-overview">
                        
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel green">
                                <div class="symbol">
                                    <i class="fa fa-camera"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value"  align="center"><?=$result2[0]['tot']; ?></div>
                                    <div class="title">Total Active Photo Gallery</div>
                                </div>
                            </div>
                        </div>
                    
                       <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel blue">
                                <div class="symbol">
                                    <i class="fa fa-youtube-play"></i>
                                </div>
                                <div class="state-value">
                                  <div class="value"  align="center"><?=$result3[0]['tot']; ?></div>
                                    <div class="title"> Total Active Video Gallery</div>
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
                                <div class="cal1">

                                </div>
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