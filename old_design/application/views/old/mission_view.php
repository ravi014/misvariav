<?php

if($this->uri->segment(1)=='about'){$m_about='selected="selected"';$f_about='sel_menu';}
elseif($this->uri->segment(1)=='mission'){$m_mission='selected="selected"';$f_mission='sel_menu';}
elseif($this->uri->segment(1)=='inspirer'){$m_inspirer='selected="selected"';$f_inspirer='sel_menu';}
elseif($this->uri->segment(1)=='school'){$m_school='selected="selected"';$f_school='sel_menu';}

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
                            <li><a class="<?=$f_about?>" href="<?=base_url();?>index.php/about">About us</a></li>
                          	<li><a class="<?=$f_inspirer?>" href="<?=base_url();?>index.php/inspirer">Inspirer</a></li>
                            <li><a class="<?=$f_mission?>" href="<?=base_url();?>index.php/mission">Mission</a></li>
                          	<li><a class="<?=$f_school?>" href="<?=base_url();?>index.php/school">The School</a></li>
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