<?php
	if($this->uri->segment(3)=='2014'){
		$dcl='0';
	}
	elseif($this->uri->segment(3)=='2013'){
		$dcl='1';
	}
	elseif($this->uri->segment(3)=='2012'){
		$dcl='2';
	}
	else{
		$dcl='0';
	}
?>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/css/demo_tab.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/css/component_tab.css" />   

<style>
	#freewall{
		margin-top:10px;
		
	}
	.free-wall{
		min-height: 100px;
	}
	
</style>
<script data-cfasync="false" type="text/javascript" src="<?=base_url();?>asset/js/freewall.js"></script>
<input type="hidden" id="curr_li" value="<?=$dcl?>" />

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
                                <h3 class="course-post-title">Image Gallery</h3>
                                	
                                  <!----------------->
                                  <div id="tabs" class="tabs">
                    <div id="tabdiv">
                        <ul>
                        	<?php if(count($result_2020)>0){?>
                            <li><a href="#section-10"><span>2020</span></a></li>
							<?php } if(count($result_2019)>0){?>
                            <li><a href="#section-9"><span>2019</span></a></li>
                            <?php } if(count($result_2018)>0){?>
                            <li><a href="#section-8"><span>2018</span></a></li>
                           <?php } if(count($result_2017)>0){?>
                            <li><a href="#section-7"><span>2017</span></a></li>
                           <?php } if(count($result_2016)>0){?>
                            <li><a href="#section-6"><span>2016</span></a></li>
                            <?php } if(count($result_2015)>0){?>
                            <li><a href="#section-5"><span>2015</span></a></li>
                            <?php } if(count($result_2014)>0){?>
                            <li><a href="#section-4"><span>2014</span></a></li>
                            <?php } if(count($result_2013)>0){?>
                            <li><a href="#section-3"><span>2013</span></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="content">
                        <?php if(count($result_2020)>0){?>
                        <section id="section-10">
                            <div id="freewall10" class="free-wall">
                                <ul id="event_ul">
                                    <?php for($i=0;$i<count($result_2020);$i++){?>
                                    <li>
                                        <div id="imgdiv">
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2020[$i]['gallery_code']?>">
                                           <!-- <img src="<?=base_url();?>admin/upload/event_thum/<?=$result_2020[$i]['gallery_cover_img']?>" />-->
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2020[$i]['gallery_cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2020[$i]['gallery_name']?></h2></div>
                                            </a>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                                <ul class="paginati">
                                    <?php 
                                        $act='activeli';
                                        if($pageno10 >= 2){	
                                        for($i=1;$i<=$pageno10; $i++){ ?>
                                        <li class="<?=$act?>" url="<?=base_url()?>index.php/image_gallery/get_event_page/2020/<?=$i?>" divnm="freewall10"><?=$i?></li>
                                        <?php 
                                        $act='';
                                        } 
                                        }
                                    ?>
                                </ul>
                                <div style="clear:both;overflow:hidden;"></div>
                            </div>
                        </section>
						<?php } if(count($result_2019)>0){?>
                        <section id="section-9">
                            <div id="freewall9" class="free-wall">
                                <ul id="event_ul">
                                    <?php for($i=0;$i<count($result_2019);$i++){?>
                                    <li>
                                        <div id="imgdiv">
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2019[$i]['gallery_code']?>">
                                           <!-- <img src="<?=base_url();?>admin/upload/event_thum/<?=$result_2019[$i]['gallery_cover_img']?>" />-->
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2019[$i]['gallery_cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2019[$i]['gallery_name']?></h2></div>
                                            </a>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                                <ul class="paginati">
                                    <?php 
                                        $act='activeli';
                                        if($pageno9 >= 2){	
                                        for($i=1;$i<=$pageno9; $i++){ ?>
                                        <li class="<?=$act?>" url="<?=base_url()?>index.php/image_gallery/get_event_page/2019/<?=$i?>" divnm="freewall9"><?=$i?></li>
                                        <?php 
                                        $act='';
                                        } 
                                        }
                                    ?>
                                </ul>
                                <div style="clear:both;overflow:hidden;"></div>
                            </div>
                        </section>
						<?php } if(count($result_2018)>0){?>
                        <section id="section-8">
                            <div id="freewall8" class="free-wall">
                                <ul id="event_ul">
                                    <?php for($i=0;$i<count($result_2018);$i++){?>
                                    <li>
                                        <div id="imgdiv">
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2018[$i]['gallery_code']?>">
                                           <!-- <img src="<?=base_url();?>admin/upload/event_thum/<?=$result_2018[$i]['gallery_cover_img']?>" />-->
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2018[$i]['gallery_cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2018[$i]['gallery_name']?></h2></div>
                                            </a>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                                <ul class="paginati">
                                    <?php 
                                        $act='activeli';
                                        if($pageno8 >= 2){	
                                        for($i=1;$i<=$pageno8; $i++){ ?>
                                        <li class="<?=$act?>" url="<?=base_url()?>index.php/image_gallery/get_event_page/2018/<?=$i?>" divnm="freewall8"><?=$i?></li>
                                        <?php 
                                        $act='';
                                        } 
                                        }
                                    ?>
                                </ul>
                                <div style="clear:both;overflow:hidden;"></div>
                            </div>
                        </section>
                        <?php } if(count($result_2017)>0){?>
                        <section id="section-7">
                            <div id="freewall7" class="free-wall">
                                <ul id="event_ul">
                                    <?php for($i=0;$i<count($result_2017);$i++){?>
                                    <li>
                                        <div id="imgdiv">
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2017[$i]['gallery_code']?>">
                                           <!-- <img src="<?=base_url();?>admin/upload/event_thum/<?=$result_2017[$i]['gallery_cover_img']?>" />-->
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2017[$i]['gallery_cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2017[$i]['gallery_name']?></h2></div>
                                            </a>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                                <ul class="paginati">
                                    <?php 
                                        $act='activeli';
                                        if($pageno7 >= 2){	
                                        for($i=1;$i<=$pageno7; $i++){ ?>
                                        <li class="<?=$act?>" url="<?=base_url()?>index.php/image_gallery/get_event_page/2017/<?=$i?>" divnm="freewall7"><?=$i?></li>
                                        <?php 
                                        $act='';
                                        } 
                                        }
                                    ?>
                                </ul>
                                <div style="clear:both;overflow:hidden;"></div>
                            </div>
                        </section>
                        <?php } if(count($result_2016)>0){?>
                        <section id="section-6">
                            <div id="freewall6" class="free-wall">
                                <ul id="event_ul">
                                    <?php for($i=0;$i<count($result_2016);$i++){?>
                                    <li>
                                        <div id="imgdiv">
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2016[$i]['gallery_code']?>">
                                           <!-- <img src="<?=base_url();?>admin/upload/event_thum/<?=$result_2016[$i]['gallery_cover_img']?>" />-->
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2016[$i]['gallery_cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2016[$i]['gallery_name']?></h2></div>
                                            </a>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                                <ul class="paginati">
                                    <?php 
                                        $act='activeli';
                                        if($pageno6 >= 2){	
                                        for($i=1;$i<=$pageno6; $i++){ ?>
                                        <li class="<?=$act?>" url="<?=base_url()?>index.php/image_gallery/get_event_page/2016/<?=$i?>" divnm="freewall6"><?=$i?></li>
                                        <?php 
                                        $act='';
                                        } 
                                        }
                                    ?>
                                </ul>
                                <div style="clear:both;overflow:hidden;"></div>
                            </div>
                        </section>
                        <?php } if(count($result_2015)>0){?>
                        <section id="section-5">
                            <div id="freewall5" class="free-wall">
                                <ul id="event_ul">
                                    <?php for($i=0;$i<count($result_2015);$i++){?>
                                    <li>
                                        <div id="imgdiv">
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2015[$i]['gallery_code']?>">
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2015[$i]['gallery_cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2015[$i]['gallery_name']?></h2></div>
                                            </a>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                                <ul class="paginati">
                                    <?php 
                                        $act='activeli';
                                        if($pageno5 >= 2){	
                                        for($i=1;$i<=$pageno5; $i++){ ?>
                                        <li class="<?=$act?>" url="<?=base_url()?>index.php/image_gallery/get_event_page/2015/<?=$i?>" divnm="freewall5"><?=$i?></li>
                                        <?php 
                                        $act='';
                                        } 
                                        }
                                    ?>
                                </ul>
                                <div style="clear:both;overflow:hidden;"></div>
                            </div>
                        </section>
                        <?php } if(count($result_2014)>0){?>
                        <section id="section-4">
                            <div id="freewall4" class="free-wall">
                                <ul id="event_ul">
                                    <?php for($i=0;$i<count($result_2014);$i++){?>
                                    <li>
                                        <div id="imgdiv">
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2014[$i]['gallery_code']?>">
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2014[$i]['gallery_cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2014[$i]['gallery_name']?></h2></div>
                                            </a>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                                <ul class="paginati">
                                    <?php 
                                        $act='activeli';
                                        if($pageno4 >= 2){	
                                        for($i=1;$i<=$pageno4; $i++){ ?>
                                        <li class="<?=$act?>" url="<?=base_url()?>index.php/image_gallery/get_event_page/2014/<?=$i?>" divnm="freewall4"><?=$i?></li>
                                        <?php 
                                        $act='';
                                        } 
                                        }
                                    ?>
                                </ul>
                                <div style="clear:both;overflow:hidden;"></div>
                            </div>
                        </section>
                        <?php } if(count($result_2013)>0){?>
                        <section id="section-3">
                            <div id="freewall3" class="free-wall">
                                <ul id="event_ul">
                                    <?php for($i=0;$i<count($result_2013);$i++){?>
                                    <li>
                                        <div id="imgdiv">
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2013[$i]['gallery_code']?>">
                                            <img src="<?=base_url();?>admin/upload/event_thum/<?=$result_2013[$i]['gallery_cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2013[$i]['gallery_name']?></h2></div>
                                            </a>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div style="clear:both;overflow:hidden;"></div>
                            <div class="paginationdiv">
                                <ul class="paginati">
                                    <?php 
                                        $act='activeli';
                                        if($pageno3 >= 2){	
                                        for($i=1;$i<=$pageno3; $i++){ ?>
                                        <li class="<?=$act?>" url="<?=base_url()?>index.php/image_gallery/get_event_page/2013/<?=$i?>" divnm="freewall3"><?=$i?></li>
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
<style>
.course-details p {
    text-align: justify;
}
</style>

<script data-cfasync="false" src="<?=base_url();?>asset/js/cbpFWTabs.js"></script> 
<script data-cfasync="false">
	var p=2;
	new CBPFWTabs( document.getElementById( 'tabs' ) );
	CBPFWTabs.prototype.options={
		start : 1
	}
</script> 
        
   <script data-cfasync="false" type="text/javascript" charset="utf-8">//
	$(document).ready(function() {
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

	#event_title h2{
		font-size:14px;
		padding:3px;
	}	

	#event_ul{
		margin:0px;
		padding:0px;
		list-style:none;
		margin-top:10px;
	}
	#event_ul li{
		float:left;
		border:#1D3261 solid 1px;
		padding:10px;
		margin:20px 10px 10px 11px;	
		
	}
	#event_ul li a {
    text-decoration: none;
	}
	#imgdiv{
		width:176px;
		height:176px;
	}
	#imgdiv img{
		width:100%;
		height:100%;
		border:#000 solid 1px;
	}
	#event_title{
		color:#FFF;
		background:#000;
		padding:0px 0px 0px 2px;
		background: rgba(0, 0, 0, .5);
		position:relative;
		margin-top:-54px;
		width:100%;
		height:30px;
	}

@media(max-width:770px) {
	#imgdiv{
	width:110px;
	height:110px;
	}
	#imgdiv img{
	width:110px;
	height:110px;
	}	
	#event_ul li{
	margin:10px 5px 10px 5px;	
		
	}
	#event_title{
		font-size:13px;
	}
	
}

</style>
