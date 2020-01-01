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

<div id="header_img">
 <a href="#"><img src="<?=base_url();?>admin/upload/img/<?=$header_img[0]['img_path']?>" alt="img01"/></a>
</div>

<section id="content">
    <div class="container">
        <div class="row">
        
            <div class="col-sm-3">
                <div class="bluebox">
                    <div id="yellow"></div>
                    <div id="green"></div>
                    <div id="red"></div>
                    <div id="conbox">
                    <h3>Gallery</h3>
                   	 <ul>
                           <li><a href="<?=base_url();?>index.php/image_gallery">Image Gallery</a></li>
                           <li><a href="<?=base_url();?>index.php/video_gallery">Video Gallery</a></li>
                           
                      </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-9">
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
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2020[$i]['event_code']?>">
                                           <!-- <img src="<?=base_url();?>admin/upload/event_thum/<?=$result_2020[$i]['cover_img']?>" />-->
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2020[$i]['cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2020[$i]['event_title']?></h2></div>
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
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2019[$i]['event_code']?>">
                                           <!-- <img src="<?=base_url();?>admin/upload/event_thum/<?=$result_2019[$i]['cover_img']?>" />-->
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2019[$i]['cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2019[$i]['event_title']?></h2></div>
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
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2018[$i]['event_code']?>">
                                           <!-- <img src="<?=base_url();?>admin/upload/event_thum/<?=$result_2018[$i]['cover_img']?>" />-->
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2018[$i]['cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2018[$i]['event_title']?></h2></div>
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
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2017[$i]['event_code']?>">
                                           <!-- <img src="<?=base_url();?>admin/upload/event_thum/<?=$result_2017[$i]['cover_img']?>" />-->
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2017[$i]['cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2017[$i]['event_title']?></h2></div>
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
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2016[$i]['event_code']?>">
                                           <!-- <img src="<?=base_url();?>admin/upload/event_thum/<?=$result_2016[$i]['cover_img']?>" />-->
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2016[$i]['cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2016[$i]['event_title']?></h2></div>
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
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2015[$i]['event_code']?>">
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2015[$i]['cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2015[$i]['event_title']?></h2></div>
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
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2014[$i]['event_code']?>">
                                            <img src="<?=base_url();?>admin/upload/img_thum/<?=$result_2014[$i]['cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2014[$i]['event_title']?></h2></div>
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
                                            <a href="<?=base_url();?>index.php/gallery_list/view/<?=$result_2013[$i]['event_code']?>">
                                            <img src="<?=base_url();?>admin/upload/event_thum/<?=$result_2013[$i]['cover_img']?>" />
                                            <div id="event_title"><h2 style="color:#FFF"><?=$result_2013[$i]['event_title']?></h2></div>
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
        	</div>
   		</div>
	</div>
</section>
        
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
