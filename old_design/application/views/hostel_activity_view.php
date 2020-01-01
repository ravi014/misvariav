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
                                <h5 class="event-small-title"><a href="<?=base_url();?>index.php/about_hostel">About Hostel</a></h5>
                            </div>
                            
                        </div>
                         <div class="event-small-list clearfix">
                           <div class="event-small-details">
                                <h5 class="event-small-title"><a href="<?=base_url();?>index.php/daily_routine">Daily Routine</a></h5>
                            </div>
                        </div>
                         <div class="event-small-list clearfix">
                           <div class="event-small-details">
                                <h5 class="event-small-title"><a href="<?=base_url();?>index.php/hostel_activity">Hostel Activity</a></h5>
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
                                <h3 class="course-post-title">Hostel Activity</h3>
                                <?php for($i=0;$i<count($result);$i++){?>
									<?=$result[$i]['contain']?>
                                <?php }?>
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