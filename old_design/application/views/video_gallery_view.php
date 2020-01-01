<link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/css/demo_tab.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/css/component_tab.css" />
<link  rel="stylesheet" type="text/css" href="<?=base_url();?>asset/popup/css/lightbox.css">
<script src="<?=base_url();?>asset/popup/js/lightbox.js"></script>
<script src="<?=base_url();?>asset/popup/js/jquery.carouFredSel-5.5.0-packed.js"></script>
<script src="<?=base_url();?>asset/popup/js/jquery.magnific-popup.js"></script>

<script data-cfasync="false">
  	$(document).ready(function(e) {
        $(document).on('click', '#openform', function (e) {
				var value = $(this).attr('value');
				e.preventDefault();
				$.magnificPopup.open({items: { src: '<?php echo base_url();?>index.php/video_gallery/view/'+value},type: 'ajax',modal: true,preloader: false}, 0);
		});
		$(document).on('click', '.popup-modal-dismiss', function (e) {
					e.preventDefault();
					$.magnificPopup.close();
		});
    });
</script>
<div class="course-image">
	<img src="<?=base_url();?>admin/upload/img/<?=$header_img[0]['img_path']?>" alt="">
</div> <!-- /.course-image -->
<div class="container">
        <div class="row">

            <!-- Here begin Main Content -->
            <div class="col-md-4">

                <div class="widget-main">
                    <div class="widget-main-title">
                        <h4 class="widget-title">Pages</h4>
                    </div> <!-- /.widget-main-title -->
                    <div class="widget-inner">
                   		 <div class="event-small-list clearfix">
                           <div class="event-small-details">
                                <h5 class="event-small-title"><a href="<?=base_url();?>index.php/image_gallery">Image Gallery</a></h5>
                            </div>
                            
                        </div>
                         <div class="event-small-list clearfix">
                           <div class="event-small-details">
                                <h5 class="event-small-title"><a href="<?=base_url();?>index.php/video_gallery">Video Gallery</a></h5>
                            </div>
                        </div>
                         
                        
                        
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->
			</div> <!-- /.col-md-4 -->
           
            <!-- Here begin Sidebar -->
          	<div class="col-md-8">
				<div class="row">
                    <div class="col-md-12">
                        <div class="course-post">
                        <div class="course-details clearfix">
                                <h3 class="course-post-title">Video Gallery</h3>
                                	
                                  <!----------------->
                                  <div class="col-sm-9">
				<div id="tabs" class="tabs">
					<div id="tabdiv">
						<ul>
                         <?php if(count($video10)>0){?>
                        	<li><a href="#section-10"><span>2020</span></a></li>
                            <?php } if(count($video9)>0){?>
                            <li><a href="#section-9"><span>2019</span></a></li>
                            <?php } if(count($video8)>0){?>
                            <li><a href="#section-8"><span>2018</span></a></li>
                            <?php } if(count($video7)>0){?>
                            <li><a href="#section-7"><span>2017</span></a></li>
                            <?php } if(count($video6)>0){?>
                            <li><a href="#section-6"><span>2016</span></a></li>
                            <?php } if(count($video5)>0){?>
                            <li><a href="#section-5"><span>2015</span></a></li>
                            <?php } if(count($video4)>0){?>
                            <li><a href="#section-4"><span>2014</span></a></li>
                            <?php } if(count($video3)>0){?>
                            <li><a href="#section-3"><span>2013</span></a></li>
                            <?php } ?>
						</ul>
					</div>

					<div class="content">
                        
                        <?php if(count($video10)>0){?>
                        <section id="section-10">
                            <div id="freewall10" class="free-wall">
                                <ul id="event_ul">
									<?php for($i=0;$i<count($video10);$i++){?>
                                    <li> 
                                    	<a href="#" id="openform" value="<?=$video10[$i]['video_code']?>">
                                        <div id="imgdiv" style="background-image:url(<?=base_url();?>admin/upload/image_thum/<?=$video10[$i]['cover_img']?>)">
                                        <img class="imgplay" src="" width="170" /> </div>
                                        <div id="event_title">
                                        <h2 style="color:#FFF;"><?=$video10[$i]['video_name']?></h2>
                                        </div>
                                    	</a>
                                    </li>
                                    <?php } ?>
                               </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                            	<ul class="paginati">
                                    <?php 
                                    $act='activeli';
                                    if($pageno10>=2){
                                    for($i=1;$i<=$pageno10; $i++){ ?>
                                    <li class="<?=$act?>" url="<?=base_url()?>index.php/video_gallery/get_event_page/2020/<?=$i?>" divnm="freewall10"><?=$i?></li>
                                    <?php 
                                    $act='';
                                    } 
                                    }
                                    ?>
                                </ul>
                            	<div style="clear:both;overflow:hidden;"></div>
                            </div>
                       </section>
                       	<?php } if(count($video9)>0){?>
                       	<section id="section-9">
                            <div id="freewall9" class="free-wall">
                                <ul id="event_ul">
									<?php for($i=0;$i<count($video9);$i++){?>
                                    <li> 
                                    	<a href="#" id="openform" value="<?=$video9[$i]['video_code']?>">
                                        <div id="imgdiv" style="background-image:url(<?=base_url();?>admin/upload/image_thum/<?=$video9[$i]['cover_img']?>)">
                                        <img class="imgplay" src="" width="170" /> </div>
                                        <div id="event_title">
                                        <h2 style="color:#FFF;"><?=$video9[$i]['video_name']?></h2>
                                        </div>
                                    	</a>
                                    </li>
                                    <?php } ?>
                               </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                            	<ul class="paginati">
                                    <?php 
                                    $act='activeli';
                                    if($pageno9>=2){
                                    for($i=1;$i<=$pageno9; $i++){ ?>
                                    <li class="<?=$act?>" url="<?=base_url()?>index.php/video_gallery/get_event_page/2019/<?=$i?>" divnm="freewall9"><?=$i?></li>
                                    <?php 
                                    $act='';
                                    } 
                                    }
                                    ?>
                                </ul>
                            	<div style="clear:both;overflow:hidden;"></div>
                            </div>
                       </section>
                       <?php } if(count($video8)>0){?>
                       	<section id="section-8">
                            <div id="freewall8" class="free-wall">
                                <ul id="event_ul">
									<?php for($i=0;$i<count($video8);$i++){?>
                                    <li> 
                                    	<a href="#" id="openform" value="<?=$video8[$i]['video_code']?>">
                                        <div id="imgdiv" style="background-image:url(<?=base_url();?>admin/upload/image_thum/<?=$video8[$i]['cover_img']?>)">
                                        <img class="imgplay" src="" width="170" /> </div>
                                        <div id="event_title">
                                        <h2 style="color:#FFF;"><?=$video8[$i]['video_name']?></h2>
                                        </div>
                                    	</a>
                                    </li>
                                    <?php } ?>
                               </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                            	<ul class="paginati">
                                    <?php 
                                    $act='activeli';
                                    if($pageno8>=2){
                                    for($i=1;$i<=$pageno8; $i++){ ?>
                                    <li class="<?=$act?>" url="<?=base_url()?>index.php/video_gallery/get_event_page/2018/<?=$i?>" divnm="freewall8"><?=$i?></li>
                                    <?php 
                                    $act='';
                                    } 
                                    }
                                    ?>
                                </ul>
                            	<div style="clear:both;overflow:hidden;"></div>
                            </div>
                       </section>
                       <?php } if(count($video7)>0){?>
                       	<section id="section-7">
                            <div id="freewall7" class="free-wall">
                                <ul id="event_ul">
									<?php for($i=0;$i<count($video7);$i++){?>
                                    <li> 
                                    	<a href="#" id="openform" value="<?=$video7[$i]['video_code']?>">
                                        <div id="imgdiv" style="background-image:url(<?=base_url();?>admin/upload/image_thum/<?=$video7[$i]['cover_img']?>)">
                                        <img class="imgplay" src="" width="170" /> </div>
                                        <div id="event_title">
                                        <h2 style="color:#FFF;"><?=$video7[$i]['video_name']?></h2>
                                        </div>
                                    	</a>
                                    </li>
                                    <?php } ?>
                               </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                            	<ul class="paginati">
                                    <?php 
                                    $act='activeli';
                                    if($pageno7>=2){
                                    for($i=1;$i<=$pageno7; $i++){ ?>
                                    <li class="<?=$act?>" url="<?=base_url()?>index.php/video_gallery/get_event_page/2017/<?=$i?>" divnm="freewall7"><?=$i?></li>
                                    <?php 
                                    $act='';
                                    } 
                                    }
                                    ?>
                                </ul>
                            	<div style="clear:both;overflow:hidden;"></div>
                            </div>
                       </section>
                       <?php } if(count($video6)>0){?>
                       	<section id="section-6">
                            <div id="freewall6" class="free-wall">
                                <ul id="event_ul">
									<?php for($i=0;$i<count($video6);$i++){?>
                                    <li> 
                                    	<a href="#" id="openform" value="<?=$video6[$i]['video_code']?>">
                                        <div id="imgdiv" style="background-image:url(<?=base_url();?>admin/upload/image_thum/<?=$video6[$i]['cover_img']?>)">
                                        <img class="imgplay" src="" width="170" /> </div>
                                        <div id="event_title">
                                        <h2 style="color:#FFF;"><?=$video6[$i]['video_name']?></h2>
                                        </div>
                                    	</a>
                                    </li>
                                    <?php } ?>
                               </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                            	<ul class="paginati">
                                    <?php 
                                    $act='activeli';
                                    if($pageno6>=2){
                                    for($i=1;$i<=$pageno6; $i++){ ?>
                                    <li class="<?=$act?>" url="<?=base_url()?>index.php/video_gallery/get_event_page/2016/<?=$i?>" divnm="freewall6"><?=$i?></li>
                                    <?php 
                                    $act='';
                                    } 
                                    }
                                    ?>
                                </ul>
                            	<div style="clear:both;overflow:hidden;"></div>
                            </div>
                       </section>
                        <?php } if(count($video5)>0){?>
                        <section id="section-5">
                            <div id="freewall5" class="free-wall">
                                <ul id="event_ul">
									<?php for($i=0;$i<count($video5);$i++){?>
                                    <li> 
                                    	<a href="#" id="openform" value="<?=$video5[$i]['video_code']?>">
                                        <div id="imgdiv" style="background-image:url(<?=base_url();?>admin/upload/image_thum/<?=$video5[$i]['cover_img']?>)">
                                        <img class="imgplay" src="" width="170" /> </div>
                                        <div id="event_title">
                                        <h2 style="color:#FFF;"><?=$video5[$i]['video_name']?></h2>
                                        </div>
                                    	</a>
                                    </li>
                                    <?php } ?>
                               </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                            	<ul class="paginati">
                                    <?php 
                                    $act='activeli';
                                    if($pageno5>=2){
                                    for($i=1;$i<=$pageno5; $i++){ ?>
                                    <li class="<?=$act?>" url="<?=base_url()?>index.php/video_gallery/get_event_page/2015/<?=$i?>" divnm="freewall5"><?=$i?></li>
                                    <?php 
                                    $act='';
                                    } 
                                    }
                                    ?>
                                </ul>
                            	<div style="clear:both;overflow:hidden;"></div>
                            </div>
                       </section>
                       <?php } if(count($video4)>0){?>
                        <section id="section-4">
                            <div id="freewall4" class="free-wall">
                                <ul id="event_ul">
									<?php for($i=0;$i<count($video4);$i++){?>
                                    <li> 
                                    	<a href="#" id="openform" value="<?=$video4[$i]['video_code']?>">
                                        <div id="imgdiv" style="background-image:url(<?=base_url();?>admin/upload/image_thum/<?=$video4[$i]['cover_img']?>)">
                                        <img class="imgplay" src="" width="170" /> </div>
                                        <div id="event_title">
                                        <h2 style="color:#FFF;"><?=$video4[$i]['video_name']?></h2>
                                        </div>
                                    	</a>
                                    </li>
                                    <?php } ?>
                               </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                            	<ul class="paginati">
                                    <?php 
                                    $act='activeli';
                                    if($pageno4>=2){
                                    for($i=1;$i<=$pageno4; $i++){ ?>
                                    <li class="<?=$act?>" url="<?=base_url()?>index.php/video_gallery/get_event_page/2014/<?=$i?>" divnm="freewall4"><?=$i?></li>
                                    <?php 
                                    $act='';
                                    } 
                                    }
                                    ?>
                                </ul>
                            	<div style="clear:both;overflow:hidden;"></div>
                            </div>
                       </section>
                       <?php } if(count($video3)>0){?>
                        <section id="section-3">
                            <div id="freewall3" class="free-wall">
                                <ul id="event_ul">
									<?php for($i=0;$i<count($video3);$i++){?>
                                    <li> 
                                    	<a href="#" id="openform" value="<?=$video3[$i]['video_code']?>">
                                        <div id="imgdiv" style="background-image:url(<?=base_url();?>admin/upload/image_thum/<?=$video3[$i]['cover_img']?>)">
                                        <img class="imgplay" src="" width="170" /> </div>
                                        <div id="event_title">
                                        <h2  style="color:#FFF;"><?=$video3[$i]['video_name']?></h2>
                                        </div>
                                    	</a>
                                    </li>
                                    <?php } ?>
                               </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                            	<ul class="paginati">
                                    <?php 
                                    $act='activeli';
                                    if($pageno3>=2){
                                    for($i=1;$i<=$pageno3; $i++){ ?>
                                    <li class="<?=$act?>" url="<?=base_url()?>index.php/video_gallery/get_event_page/2013/<?=$i?>" divnm="freewall3"><?=$i?></li>
                                    <?php 
                                    $act='';
                                    } 
                                    }
                                    ?>
                                </ul>
                            	<div style="clear:both;overflow:hidden;"></div>
                            </div>
                       </section>
                       <?php } ?>
					</div>
            	</div>
        	</div>  
                                  <!----------------->
                                    
                        </div> <!-- /.course-details -->
                        </div> <!-- /.course-post -->
					 </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->


               <!-- <div class="row">
                    <div class="col-md-12">
                        <div id="disqus_thread"></div>
                        <script type="text/javascript">
                                /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                                var disqus_shortname = 'esmeth'; // required: replace example with your forum shortname

                                /* * * DON'T EDIT BELOW THIS LINE * * */
                                (function() {
                                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
                    </div>--> <!-- /.col-md-12 -->
               <!-- </div>--> <!-- /.row -->

            </div> <!-- /.col-md-8 -->
    
        </div> <!-- /.row -->
    </div> 

<!-- /.container -->
<script data-cfasync="false" src="<?=base_url();?>asset/js/cbpFWTabs.js"></script> 
<script data-cfasync="false">
			new CBPFWTabs( document.getElementById( 'tabs' ) );
		</script> 
<script data-cfasync="false" type="text/javascript" charset="utf-8">//
	$(document).ready(function() {
		
		$(".imgplay").attr("src","<?=base_url();?>asset/img/play.png");
		$(document).on('click', 'ul.paginati li', function (e) {
			e.preventDefault();
			var url 	= $(this).attr('url');
			var divname = $(this).attr('divnm');
		
			$("#"+divname).html("Loading..");
			$(this).siblings().removeClass('activeli');
			$(this).addClass('activeli');
			$.ajax({url:url,success:function(result){
				$("#"+divname).html(result);
            }});
				
			
		});
	});		
</script>
<style>
    	.paginationdiv{
		text-align:right;
	}
	.paginati{
		margin:0px;
		padding:0px;	
		list-style:none;
		float:right;
	}
	.paginati li{
		float:left;
		padding:15px;
		background-color:#32c8fa;
		margin-right:5px;
		cursor:pointer;
		color:#FFF;
	}
	.paginati li:hover{
		background-color:#F97F43;
	}
	.paginati .activeli{
		background-color:#F97F43;
	}
	
	#freewall2{
		margin-top:15px;
	}
	#event_ul{
		margin:0px;
		padding:0px;
		list-style:none;
		margin-top:15px;
	}
	#event_ul li{
		float:left;
		border:#03F solid 1px;
		padding:10px;	
		margin-right:20px;
		margin-bottom:30px;
		margin:20px 10px 30px 10px;
		width:177px;
		height:177px;
	}
	#event_ul li a{
		text-decoration:none;
	}
	#imgdiv{
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
		
	}
	#imgdiv img{
		width:100%;
		height:100%;
		
	}
	#event_title {
    color: #FFF;
    background: #000;
    padding: 0px 0px 0px 4px;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
    filter: alpha(opacity=50);
    -moz-opacity: 0.5;
    -khtml-opacity: 0.5;
    opacity: 0.5;
    font-size: 14px;
    position: relative;
    margin-top: -62px;
    height: 40px;
    }
	#event_title h2
	{
		font-size:14px;
		padding:3px;
	}
	@media(max-width:770px) {
	
	#imgdiv img{
	width:100%;
	height:100%;
	}	
	#event_ul li{
	margin:10px 5px 10px 5px;	
	width:110px;
	height:110px;
		
	}
	#event_title{
		font-size:13px;
	}
	
}
</style>