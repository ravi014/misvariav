
<div id="header_img">
 <a href="#"><img src="<?=base_url();?>admin/upload/img/<?=$header_img[0]['img_path']?>" alt="img01"/></a>
</div>
<?php
			//$brade_item=array("Home","Gallery","Image Gallery",$event_dt[0]['year'],$event_dt[0]['event_name']);
			//$brade_code=array(base_url(),base_url()."index.php/image_gallery",base_url()."index.php/image_gallery",base_url()."index.php/image_gallery/view/".$event_dt[0]['year'],"");
			//echo get_bradecrume($brade_item,$brade_code);
$date1 = new DateTime($event_dt[0]['event_dt']);
$dt=date_format($date1, "j,  M  Y");
?>

<section id="content">
	<div class="container">
    	<a class="btn btn-success" href="<?php echo base_url();?>index.php/image_gallery" style="margin-bottom:5px;">Back</a>
    	<ul class="gallery">
        <?php for($i=0;$i<count($result);$i++){ ?>
			<li class="col-sm-3 col-xs-6">
				<!--<a href="<?=base_url();?>admin/upload/event/<?=$result[$i]['image']?>" class="fancybox" data-fancybox-group="group">-->
                <a href="<?=base_url();?>admin/upload/img/<?=$result[$i]['image']?>" class="fancybox" data-fancybox-group="group">
				<!--<img src="<?=base_url();?>admin/upload/event_thum/<?=$result[$i]['image']?>" class="img-responsive" alt="" />-->
                <img src="<?=base_url();?>admin/upload/img_thum/<?=$result[$i]['image']?>" class="img-responsive" alt="" />
			
                </a>
			</li>
        <?php } ?>
    		<!--<div class="gallerytilte">
   	 		<h3 style="font-size:20px;"><?=$event_dt[0]['event_name']?> - <?=$dt?></h3>
            </div>-->
         </ul>
    </div>
</section>

<!--------cbp-fwslider-------------> 

