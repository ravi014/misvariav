
<link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/css/componenttbl.css" />
<!--[if !IE]><!-->
	<style>
	
	/* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	#subject{
		background-color:#93e4ff;
		letter-spacing:1px;
		font-weight:400
	}
	
	@media 
	only screen and (max-width: 770px),
	{
	
		/* Force table to not be like tables anymore */
		.studtbl table, thead, tbody, th, td, tr { 
			display: block;
		}
		
		/* Hide table headers (but not display: none;, for accessibility) */
		.studtbl thead tr { 
			position: absolute;
			top: -9999px;
			left: -9999px;
		}
		
		.studtbl tr { border: 1px solid #ccc; }
		
		.studtbl td { 
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee; 
			position: relative;
			padding-left: 50%; 
		}
		
		.studtbl td:before { 
			/* Now like a table header 
			position: absolute;*/
			/* Top/left values mimic padding */
			left: 3px;
			width: 45%; 
			padding-right: 0px; 
		}
		
		/*
		Label the data
		*/
		.studtbl td:nth-of-type(1):before { content: "S.No"; }
		.studtbl td:nth-of-type(2):before { content: "Name of the Employee"; }
		.studtbl td:nth-of-type(3):before { content: "Designation"; }
		.studtbl td:nth-of-type(4):before { content: "Qualification"; }
		
	}
	
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen
	and (min-device-width : 320px)
	and (max-device-width : 480px) {
		 body { 
			padding:-0.01; 
			margin: 0; 
			 }
		}
	
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
		.studtbl body { 
			width:auto;
		}
	}
	.content section {
		font-size:16px;
	}
	</style>
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
                        	<div class="free-wall">
        		<div class="studtbl">
    			<div class="component">
        		<label>Staff List</label>
				<table>
					<thead>
						<tr>
							<th>S.No</th>
							<th>Name of the Employee</th>
							<th>Designation</th>
							<th>Qualification</th>
                            <th>Taching Subject</th>
						</tr>
					</thead>
					<tbody>
                     <?php $no=1; for($i=0;$i<count($all);$i++){?>
                       <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?=$all[$i]['name']?></td>
                            <td><?=$all[$i]['designation']?></td>
                            <td><?=$all[$i]['qualification']?></td>
                            <td><?=$all[$i]['subject']?></td>
                        </tr>
					<?php }?> 
				</table>
              </div>
              </div>
              </div>
                           
						</div>
					</div>

					<!-- ==== COURSES END == -->

				</div>
			</div>
		</section>