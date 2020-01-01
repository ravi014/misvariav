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
                             <li><a href="#">Curricular</a></li>
                             <li><a href="#">Affiliation</a></li>
                             <li><a href="#">Staff</a></li>
                            </ul>
							</div>
						</div>
					</div>


					<!-- ==== COURSES START == -->

					<div class="col-sm-9">
						<div class="courses">
                        	<?php for($i=0;$i<count($result);$i++){?>
                            <?=$result[$i]['contain']?>
                            <?php }?>
                           
						</div>
					</div>

					<!-- ==== COURSES END == -->

				</div>
			</div>
		</section>