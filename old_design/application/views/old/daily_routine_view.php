<?php

if($this->uri->segment(1)=='about'){$m_about='selected="selected"';$f_about='sel_menu';}
elseif($this->uri->segment(1)=='mission'){$m_mission='selected="selected"';$f_mission='sel_menu';}
?>
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
                           	<li><a class="<?=$f_about?>" href="<?=base_url();?>index.php/about_hostel">About Hostel</a></li>
                          	<li><a class="<?=$f_mission?>" href="<?=base_url();?>index.php/daily_routine">Daily Routine</a></li>
                            <li><a href="#">Hostel Activity</a></li>
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