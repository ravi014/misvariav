
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
<!-- Being Page Title -->

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
                                <h5 class="event-small-title"><a href="<?=base_url();?>index.php/curricular">Curricular</a></h5>
                            </div>
                            
                        </div>
                         <div class="event-small-list clearfix">
                           <div class="event-small-details">
                                <h5 class="event-small-title"><a href="<?=base_url();?>index.php/affiliation">Affiliation</a></h5>
                            </div>
                        </div>
                         <div class="event-small-list clearfix">
                           <div class="event-small-details">
                                <h5 class="event-small-title"><a href="<?=base_url();?>index.php/staff">Staff</a></h5>
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
                        <div class="course-details clearfix studtbl component">
                                <h3 class="course-post-title">Staff</h3>
                               <table>
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name of the Employee</th>
                                        <th>Designation</th>
                                        <th>Qualification</th>
                                       <?php /*?> <th>Taching Subject</th><?php */?>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $no=1; for($i=0;$i<count($all);$i++){?>
                                   <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?=$all[$i]['name']?></td>
                                        <td><?=$all[$i]['designation']?></td>
                                        <td><?=$all[$i]['qualification']?></td>
                                        <?php /*?><td><?=$all[$i]['subject']?></td><?php */?>
                                    </tr>
                                <?php }?> 
                            </table>
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