<link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/css/componenttbl.css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/css/demo_tab.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/css/component_tab.css" /> 
<!--[if !IE]><!-->
<style>
	/* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	
	#subject {
		background-color: #93e4ff;
		letter-spacing: 1px;
		font-weight: 400
	}
	
	@media only screen and (max-width: 770px),
	{
		/* Force table to not be like tables anymore */
		.studtbl table,
		thead,
		tbody,
		th,
		td,
		tr {
			display: block;
		}
		/* Hide table headers (but not display: none;, for accessibility) */
		.studtbl thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}
		.studtbl tr {
			border: 1px solid #ccc;
		}
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
		.studtbl td:nth-of-type(1):before {
			content: "S.No";
		}
		.studtbl td:nth-of-type(2):before {
			content: "SLC No";
		}
		.studtbl td:nth-of-type(3):before {
			content: "Student Name";
		}
		.studtbl td:nth-of-type(3):before {
			content: "View";
		}
	}
	/* Smartphones (portrait and landscape) ----------- */
	
	@media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
		body {
			padding: -0.01;
			margin: 0;
		}
	}
	/* iPads (portrait and landscape) ----------- */
	
	@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
		.studtbl body {
			width: auto;
		}
	}
	
	.content section {
		font-size: 16px;
	}
</style>
<!-- Being Page Title -->

<div class="container">
	<div class="row">



		<!-- Here begin Sidebar -->
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="course-post">
						<div class="course-details clearfix studtbl component">

							<div id="tabs" class="tabs">
								<div id="tabdiv">
									<ul>

										<li><a href="#section-9"><span>2019</span></a>
										</li>

										<li><a href="#section-8"><span>2018</span></a>
										</li>

									</ul>
								</div>
								<div class="content">

									<section id="section-9">
										<h3 class="course-post-title">Scanned copies of the Transfer Certificate Issued</h3>
										<table>
											<thead>
												<tr>
													<th>S.No</th>
													<th>SLC No</th>
													<th>Student Name</th>
													<th>View</th>

												</tr>
											</thead>
											<tbody>
												<?php $no=1; for($i=0;$i<count($all_2019);$i++){
									
										$path=base_url().'admin/upload/slc/'.$all_2019[$i]['file_path'];
									?>
												<tr>
													<td>
														<a href="<?php echo $path;?>" target="_blank">
															<?php echo $no++; ?>
														</a>
													</td>
													<td>
														<a href="<?php echo $path;?>" target="_blank">
															<?=$all_2019[$i]['slc_no']?>
														</a>
													</td>
													<td>
														<a href="<?php echo $path;?>" target="_blank">
															<?=$all_2019[$i]['f_name']?>
															<?=$all_2019[$i]['m_name']?>
															<?=$all_2019[$i]['l_name']?>
														</a>
													</td>
													<td><a href="<?php echo $path;?>" target="_blank">View </a>
													</td>
												</tr>
												<?php }?>
										</table>


									</section>

									<section id="section-8">

										<h3 class="course-post-title">Scanned copies of the Transfer Certificate Issued</h3>
										<table>
											<thead>
												<tr>
													<th>S.No</th>
													<th>SLC No</th>
													<th>Student Name</th>
													<th>View</th>

												</tr>
											</thead>
											<tbody>
												<?php $no=1; for($i=0;$i<count($all_2018);$i++){
									
										$path=base_url().'admin/upload/slc/'.$all_2018[$i]['file_path'];
									?>
												<tr>
													<td>
														<a href="<?php echo $path;?>" target="_blank">
															<?php echo $no++; ?>
														</a>
													</td>
													<td>
														<a href="<?php echo $path;?>" target="_blank">
															<?=$all_2018[$i]['slc_no']?>
														</a>
													</td>
													<td>
														<a href="<?php echo $path;?>" target="_blank">
															<?=$all_2018[$i]['f_name']?>
															<?=$all_2018[$i]['m_name']?>
															<?=$all_2018[$i]['l_name']?>
														</a>
													</td>
													<td><a href="<?php echo $path;?>" target="_blank">View </a>
													</td>
												</tr>
												<?php }?>
										</table>

									</section>


								</div>
							</div>

						</div>
						<!-- /.course-details -->
					</div>
					<!-- /.course-post -->
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->


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
                    </div>-->
			<!-- /.col-md-12 -->
			<!-- </div>-->
			<!-- /.row -->

		</div>
		<!-- /.col-md-8 -->

	</div>
	<!-- /.row -->
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