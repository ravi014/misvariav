<div id="header_img">
 <a href="#"><img src="<?=base_url();?>admin/upload/img/<?=$header_img[0]['img_path']?>" alt="img01"/></a>
</div>

		<section id="content">
			<div class="container">
				<div class="row">

					<!-- ==== SIDEBAR START == -->

					<div class="col-sm-3">
                    	<div class="bluebox">
                            <div id="yellow"></div>
                            <div id="green"></div>
                            <div id="red"></div>
                            <div id="conbox">
                                <ul>
                                 <li><a href="#">Co Curricular</a></li>
                                 <li><a href="#">Sports</a></li>
                                 <li><a href="#">Achievements</a></li>
                                </ul>
							</div>
						</div>
					</div>

					<div class="col-sm-9">
                        <ul class="gallery">
                         <?php for($i=0;$i<count($achievement);$i++){ 
						  	$date1 = new DateTime($achievement[$i]['date']);
                            $dt=date_format($date1,  "j, M  Y");?>
                            <li class="col-sm-4 achievement">
                                    <h2><?=$achievement[$i]['achievement_name']?></h2>
                                     <h4><?=$dt?></h4>
                                    <img src="<?=base_url();?>admin/upload/img_thum/<?=$achievement[$i]['img_path']?>" />
                            </li>
                          <?php }?>
                        </ul>
					</div>

				</div>
			</div>
		</section>